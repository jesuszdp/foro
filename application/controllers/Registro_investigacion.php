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
        $this->load->model('Convocatoria_model', 'convocatoria');
    }
    
    public function index()
    {
    	$output = [];
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

		$output['tipos_metodologias'] = $this->trabajo->tipo_metodologia();
    	
    	if($post)
    	{
    		pr($post);
    		$this->config->load('form_validation'); //Cargar archivo 
    		$validations = $this->config->item('form_registro_investigacion'); //Obtener validaciones de archivo general
    		pr($validations);
            $this->form_validation->set_rules($validations); //Añadir validaciones
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

            	$datos = array(
            		'datos' => $post,
            		'registrante' => $id_informacion_usuario
            	);
            	
            	$status = $this->trabajo->nuevo($datos);
            	if($status)
            	{
            		$output['msg'] = 'El trabajo se registró correctamente con folio '.$folio;
            	}else
            	{
            		$output['msg'] = 'El trabajo no se pudo registrar, intentelo más tarde.';
            		$output['trabajo'] = $post;
            	}
            }else
            {
    			$output['trabajo'] = $post;
            }
    	} 
    	
    	$this->template->setTitle('Registrar trabajo de investigación');
        $main_content = $this->load->view('trabajo/registro.tpl.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }
}
