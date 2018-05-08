<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene el dashboard del sistema
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class Dashboard extends MY_Controller {

    const LISTA = 'lista', NUEVA = 'agregar', EDITAR = 'editar',
            CREAR = 'crear', LEER = 'leer', ACTUALIZAR = 'actualizar', ELIMINAR = 'eliminar',
            EXPORTAR = 'exportar';

    function __construct() {
        $this->grupo_language_text = ["template_general", "listado_trabajo", "dashboard"];
        parent::__construct();
        $this->load->model('Trabajo_model', 'trabajo');
    }

    function index() {
        $output = [];
        $datos_sesion = $this->get_datos_sesion();
        $id_informacion_usuario = $datos_sesion['id_informacion_usuario'];

        $lang = $this->obtener_idioma();
        $output['language_text'] = $this->language_text; //obtiene textos del lenguaje
        $output['listado'] = $this->trabajo->listado_trabajos_autor($id_informacion_usuario, $lang);
        $output['lang'] = $this->obtener_idioma();
//        pr($this->language_text);
        $main_content = $this->load->view('dashboard/index.tpl.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    function informacion($tipo = 'lista') {
        $output['data'] = $this->trabajo->listado_trabajos_autor_general();
//        pr($output['data']);
        header('Content-Type: application/json; charset=utf-8;');
        echo json_encode($output);
        
    }

}
