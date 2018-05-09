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
    
    public function index($alerta=null)
    {
    	$output = [];
        $datos_sesion = $this->get_datos_sesion();
        $id_informacion_usuario = $datos_sesion['id_informacion_usuario'];

        $lang = $this->obtener_idioma();
        $output['lang'] = $lang;
        $output['language_text'] = $this->obtener_grupos_texto(array('listado_trabajo'),$lang);
        $output['listado'] = $this->trabajo->listado_trabajos_autor($id_informacion_usuario,$lang);
        if(!is_null($alerta))
        {
            $output['alerta'] = $alerta;
        }

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
        $folio = '';

        $lan_txt = $this->obtener_grupos_texto(array('registro_trabajo','template_general'),$this->obtener_idioma());
        $output['language_text'] = $lan_txt;
		$output['tipos_metodologias'] = dropdown_options($this->trabajo->tipo_metodologia(),"id_tipo_metodologia","lang",$this->obtener_idioma());
        $output['paises'] = dropdown_options($this->catalogo->get_paises(), "clave_pais", "lang", $this->obtener_idioma()); //Obtiene el idioma

    	if($post)
    	{
    		//pr($post);
    		$this->config->load('form_validation'); //Cargar archivo 
    		$validations = $this->config->item('form_registro_investigacion'); //Obtener validaciones de archivo general
            $this->set_textos_campos_validacion($validations, $lan_txt['registro_trabajo']);
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
                    //pr($post);
                    //pr($_FILES);

                    $archivo_original = $_FILES;

                	$datos_sesion = $this->get_datos_sesion();
                    $id_informacion_usuario = $datos_sesion['id_informacion_usuario'];
                    $convocatoria = $this->convocatoria->get_activa()[0];
                    $id_convocatoria = $convocatoria['id_convocatoria'];
                    $post['id_convocatoria'] = $id_convocatoria;
                	$post['folio'] = $folio;
                    $num_registros = $this->trabajo->numero_trabajos();
                    $secuencial = $num_padded = sprintf("%04d", ($num_registros+1));
                    $anio = substr($convocatoria['anio'], 2, 2);
                    $folio = "IMSS-CES-FNFIES-P-".$anio."-".$secuencial;
                    $ruta = './uploads/'.$id_informacion_usuario.'/';

                    if(crea_directorio($ruta))
                    {

                        //Archivo
                        $config['upload_path'] = $ruta;
                        $config['allowed_types'] = 'pdf|docx|doc';
                        $config['remove_spaces'] = TRUE;
                        $config['max_size'] = 1024 * 15;
                        $config['file_name'] = $folio;
                        $this->load->library('upload', $config);
                    
                        if ($this->upload->do_upload('trabajo_archivo'))
                        {
                            $upload_data = array('upload_data' => $this->upload->data());

                            //pr($upload_data);
                            $archivo = array(
                                'nombre_fisico' => $upload_data['upload_data']['file_name'],
//                                'ruta' => $upload_data['upload_data']['file_path'],
                                'ruta' => $ruta,
                                'folio_investigacion' => $folio
                            );

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
                                    is_null($autor_sexo) || $autor_sexo == '' ||
                                    is_null($autor_pais) || $autor_pais == '')
                                {
                                    if(!((is_null($autor_nombre) || $autor_nombre == '') &&
                                    (is_null($autor_app) || $autor_app == '') &&
                                    (is_null($autor_sexo) || $autor_sexo == '') &&
                                    (is_null($autor_pais) || $autor_pais == '')))
                                    {
                                        $status = false;
                                        $msg_type = 'danger';
                                        $msg = $lan_txt['registro_trabajo']['rti_autores'];
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
                                
                                $datos_trabajo = $post;
                                $datos_trabajo['titulo'] = $datos_trabajo['titulo_trabajo'];
                                $datos_trabajo['clave_estado'] = 'revision';
                                unset($datos_trabajo['titulo_trabajo']);
                                $datos_trabajo['folio'] = $folio;

                                $datos = array(
                                    'datos' => $datos_trabajo,
                                    'registrante' => $id_informacion_usuario,
                                    'autores' => $autores,
                                    'archivo' => $archivo
                                );
                                //pr($datos);
                                
                                $status = $this->trabajo->nuevo($datos);
                                
                                if($status)
                                {
                                    $output['msg'] =  $lan_txt['registro_trabajo']['rti_success'];
                                    $output['msg_type'] = 'success';
                                    $output['folio'] = $folio;
                                    $this->index($output);
                                    return;

                                }else
                                {
                                    $msg =  $lan_txt['registro_trabajo']['rti_error'];
                                    $msg_type = 'danger';
                                    $output['trabajo'] = $post;
                                }
                            }else
                            {
                                $output['trabajo'] = $post;
                                $post['tipo_metodologia'] = $post['id_tipo_metodologia'];
                            }

                            $output['msg'] = $msg;
                            $output['msg_type'] = $msg_type;
                            $output['folio'] = $folio;
                            //pr($datos);

                        } else
                        {
                            unset($post['autor_imss']);
                            unset($post['autor_matricula']);
                            unset($post['autor_nombre']);
                            unset($post['autor_app']);
                            unset($post['autor_apm']);
                            unset($post['autor_sexo']);
                            unset($post['autor_pais']);
                            $output['trabajo'] = $post;
                            
                            $error = array('error' => $this->upload->display_errors());
                            $output['msg'] = $error['error'];
                            $output['folio'] = '';
                            $output['msg_type'] = 'danger'; 
                            //pr($output['msg']);
                        }
                    } //directorio
                }
                else
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
                $output['msg'] = $lan_txt['registro_trabajo']['rti_caracteres'];
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
    	
        $main_content = $this->load->view('trabajo/registro.tpl.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    public function ver($folio)
    {
        $this->load->model('Modulo_model', 'modulo');
        $datos_sesion = $this->get_datos_sesion();
        $this->load->library('LNiveles_acceso');
        $niveles = $this->modulo->get_niveles_acceso($datos_sesion['id_usuario']);
        
        $output = [];
        $lang = $this->obtener_idioma();
        $output['lang'] = $lang;
        $output['datos'] = $this->trabajo->trabajo_investigacion_folio($folio,$lang)[0];
        $autores = $this->trabajo->autores_trabajo_folio($folio,$lang);
        $output['autor_principal'] = $autores[0];
        unset($autores[0]);
        $output['autores'] = $autores;
        $output['language_text'] = $this->obtener_grupos_texto(array('listado_trabajo','registro_trabajo','detalle_trabajo'),$lang);

        $main_content = $this->load->view('trabajo/ver.tpl.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }
}
