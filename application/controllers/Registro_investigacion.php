<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : JZDP AND LEAS
 * */
class Registro_investigacion extends MY_Controller {

    const LISTA = 'lista', NUEVA = 'agregar', EDITAR = 'editar',
            CREAR = 'crear', LEER = 'leer', ACTUALIZAR = 'actualizar', ELIMINAR = 'eliminar',
            EXPORTAR = 'exportar';

    function __construct() {
        parent::__construct();
        $this->load->model('Trabajo_model', 'trabajo');
        $this->load->model('Catalogo_model', 'catalogo');
        $this->load->model('Convocatoria_model', 'convocatoria');
    }
    
    public function index()
    {
    	$output = [];
        $datos_sesion = $this->get_datos_sesion();
        $id_informacion_usuario = $datos_sesion['id_informacion_usuario'];

        $lang = $this->obtener_idioma();
        $output['language_text'] = $this->obtener_grupos_texto(array('listado_trabajo'),$lang);
        $output['listado'] = $this->trabajo->listado_trabajos_autor($id_informacion_usuario,$lang);

    	$this->template->setTitle('Trabajos de investigación registrados');
        $main_content = $this->load->view('trabajo/index.tpl.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    public function nuevo()
    {
    	$this->load->library('form_complete');
    	$this->load->library('form_validation');
    	$post = $this->input->post(null,true);
    	$output = [];

        $output['language_text'] = $this->obtener_grupos_texto(array('registro_trabajo','template_general'),$this->obtener_idioma());

		$output['tipos_metodologias'] = dropdown_options($this->trabajo->tipo_metodologia(),"id_tipo_metodologia","lang",$this->obtener_idioma());
        $output['paises'] = dropdown_options($this->catalogo->get_paises(), "clave_pais", "lang", $this->obtener_idioma()); //Obtiene el idioma

    	if($post)
    	{
    		//pr($post);
    		$this->config->load('form_validation'); //Cargar archivo 
    		$validations = $this->config->item('form_registro_investigacion'); //Obtener validaciones de archivo general
    		//pr($validations);
            $this->form_validation->set_rules($validations); //Añadir validaciones

            $post_metodologia = $post['metodologia'];
            $post_antecedentes = $post['antecedentes'];
            $post_problema = $post['problema'];
            $post_justificacion = $post['justificacion'];
            $post_pregunta = $post['pregunta_investigacion'];
            $post_objetivo = $post['objetivo'];
            $post_hipotesis = $post['hipotesis'];
            $post_resultados = $post['resultados'];
            $post_conclusiones = $post['conclusiones'];
            $post_consideraciones = $post['consideraciones_eticas'];

            $num_caracteres = strlen($post_metodologia.$post_antecedentes.$post_problema.$post_justificacion.$post_pregunta.$post_objetivo.$post_hipotesis.$post_resultados.$post_conclusiones.$post_consideraciones);

            if($num_caracteres <= 2500)
            {

                if($this->form_validation->run() == TRUE)
                {
                	$datos_sesion = $this->get_datos_sesion();
        			$id_informacion_usuario = $datos_sesion['id_informacion_usuario'];
        			$convocatoria = $this->convocatoria->get_activa()[0];
        			$id_convocatoria = $convocatoria['id_convocatoria'];
                	$post['id_convocatoria'] = $id_convocatoria;
                	$num_registros = $this->trabajo->numero_trabajos();
                	$secuencial = $num_padded = sprintf("%04d", ($num_registros+1));
                	$anio = substr($convocatoria['anio'], 2, 2);
                	$folio = "IMSS-CES-FNFIES-P-".$anio."-".$secuencial;
                	$post['folio'] = $folio;
                	$post['id_tipo_metodologia'] = $post['tipo_metodologia'];
                	unset($post['tipo_metodologia']);

                    $status = true;
                    $autores = [];
                    $msg = null;
                    $msg_type = 'success';

                    //pr(count($post['autor_imss']));
                    
                    for ($i=0; $i < count($post['autor_imss']); $i++)
                    { 
                        $autor_imss = ($post['autor_imss'][$i])?true:false;
                        $autor_matricula = $post['autor_matricula'][$i];
                        $autor_nombre = $post['autor_nombre'][$i];
                        $autor_app = $post['autor_app'][$i];
                        $autor_apm = $post['autor_apm'][$i];
                        $autor_sexo = $post['autor_sexo'][$i];
                        $autor_pais = $post['autor_pais'][$i];

                        if(is_null($autor_nombre) || $autor_nombre == '' ||
                            is_null($autor_app) || $autor_app == '' ||
                            is_null($autor_apm) || $autor_apm == '' ||
                            is_null($autor_sexo) || $autor_sexo == '' ||
                            is_null($autor_pais) || $autor_pais == '')
                        {
                            if(count($post['autor_imss']) > 2){
                                $status = false;
                                $msg_type = 'danger';
                                $msg = 'Ingrese la información de todos los campos marcados con * para la información de los coautores.';
                                $folio = '';
                            }
                            break;
                        }else
                        {
                            $autores[$i] = array(
                                'es_imss' => $autor_imss,
                                'matricula' => $autor_matricula,
                                'nombre' => $autor_nombre,
                                'apellido_paterno' => $autor_app,
                                'apellido_materno' => $autor_apm,
                                'sexo' => $autor_sexo,
                                'clave_pais' => $autor_pais
                            );
                        }
                    }

                    if($status)
                    {
                        unset($post['autor_imss']);
                        unset($post['autor_matricula']);
                        unset($post['autor_nombre']);
                        unset($post['autor_app']);
                        unset($post['autor_apm']);
                        unset($post['autor_sexo']);
                        unset($post['autor_pais']);

                    	$datos = array(
                    		'datos' => $post,
                    		'registrante' => $id_informacion_usuario,
                            'autores' => $autores
                    	);
                    	
                    	$status = $this->trabajo->nuevo($datos);
                    	
                        if($status)
                    	{
                    		$msg = 'El trabajo se registró correctamente con folio ';
                            $msg_type = 'success';
                    	}else
                    	{
                    		$msg = 'El trabajo no se pudo registrar, intentelo más tarde.';
                            $msg_type = 'danger';
                    		$output['trabajo'] = $post;
                    	}
                    }

                    $output['msg'] = $msg;
                    $output['msg_type'] = $msg_type;
                    $output['folio'] = $folio;
                    //pr($datos);
                }else
                {
                    unset($post['autor_imss']);
                    unset($post['autor_matricula']);
                    unset($post['autor_nombre']);
                    unset($post['autor_app']);
                    unset($post['autor_apm']);
                    unset($post['autor_sexo']);
                    unset($post['autor_pais']);
        			$output['trabajo'] = $post;
                }
        	}else //validacion de caracteres
            {
                $output['msg'] = 'Validación de carácteres';
                $output['msg_type'] = 'danger';
                $output['folio'] = '';

                unset($post['autor_imss']);
                unset($post['autor_matricula']);
                unset($post['autor_nombre']);
                unset($post['autor_app']);
                unset($post['autor_apm']);
                unset($post['autor_sexo']);
                unset($post['autor_pais']);
                $output['trabajo'] = $post;
            }
        }
    	
    	$this->template->setTitle('Registrar trabajo de investigación');
        $main_content = $this->load->view('trabajo/registro.tpl.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    public function ver($folio)
    {
        $output = [];
        $lang = $this->obtener_idioma();
        
        $output['datos'] = $this->trabajo->trabajo_investigacion_folio($folio,$lang)[0];
        $output['autores'] = $this->trabajo->autores_trabajo_folio($folio,$lang);

        $output['language_text'] = $this->obtener_grupos_texto(array('listado_trabajo','registro_trabajo','detalle_trabajo'),$lang);

        /*
        $datos_sesion = $this->get_datos_sesion();
        $id_informacion_usuario = $datos_sesion['id_informacion_usuario'];

        $lang = $this->obtener_idioma();
        $output['language_text'] = $this->obtener_grupos_texto(array('listado_trabajo'),$lang);
        $output['listado'] = $this->trabajo->listado_trabajos_autor($id_informacion_usuario,$lang);
        */
        $this->template->setTitle('Trabajos de investigación registrados');
        $main_content = $this->load->view('trabajo/ver.tpl.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }
}
