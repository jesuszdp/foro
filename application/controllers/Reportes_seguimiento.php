<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : Cheko
 * */
class Reportes_seguimiento extends General_reportes {

    public function __construct() {
        $this->grupo_language_text = ['registro_usuario', 'inicio_sesion', 'mensajes', "listado_trabajo", "dashboard", "jsgrid_elementos"]; //Grupo de idiomas para el controlador actual
        parent::__construct();
        $this->load->library('form_complete');
        $this->load->library('form_validation');
        $this->load->library('seguridad');
        $this->load->library('empleados_siap');
        $this->load->library('LNiveles_acceso');
        $this->load->helper(array('secureimage'));
        $this->load->model('Sesion_model', 'sesion');
        $this->load->model('Usuario_model', 'usuario');
    }


    /**
     * @author Cheko
     * @Fecha 11/06/2018
     * @descripcion Funcion que muestra el reporte de los trabajos de investigación
     *
     */
    public function reportes() {
      $output = [];
      $datos_sesion = $this->get_datos_sesion();
      $id_informacion_usuario = $datos_sesion['id_informacion_usuario'];

      $lang = $this->obtener_idioma();
      $output['language_text'] = $this->language_text; //obtiene textos del lenguaje
//        $output['listado'] = $this->trabajo->listado_trabajos_autor($id_informacion_usuario, $lang);
      $output['lang'] = $this->obtener_idioma();
//        pr($this->language_text);
      $main_content = $this->load->view('reportes/seguimiento/index.tpl.php', $output, true);
      $this->template->setMainContent($main_content);
      $this->template->getTemplate();
    }

    /**
     * @author cheko
     * @fecha 11/06/2018
     * @description Funcion que obtienen la lista de trabajos
     */
    function informacion($tipo = 'lista') {
        $this->load->model('Trabajo_model', 'trabajo');
        $lang = $this->obtener_idioma();
        $listado = $this->trabajo->lista_trabajos();
        foreach ($listado as $key => $value) {
            $json = json_decode($value['estado'], true);
            $value['estado'] = $json['investigador'][$lang];
            $listado[$key] = $value;
        }
        //pr($output['data']);
        $output['data'] = $listado;
        header('Content-Type: application/json; charset=utf-8;');
        echo json_encode($output);
    }

}
