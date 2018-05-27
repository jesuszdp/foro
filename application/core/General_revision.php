<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene las funciones generales de las revisiones,
 * y gestión de revisiones
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class General_revision extends MY_Controller {

    const LISTA = 'lista', NUEVA = 'agregar', EDITAR = 'editar',
            CREAR = 'crear', LEER = 'leer', ACTUALIZAR = 'actualizar', ELIMINAR = 'eliminar',
            EXPORTAR = 'exportar';

    function __construct() {
        parent::__construct();
    }

    /**
     * @author
     * @Fecha 21/05/2018
     * @param type $cve_evaluacion
     * @description Obtiene el detalle de la investigación
     *
     */
    function get_detalle_evaluacion($cve_evaluacion) {

    }

    /**
     * @author
     * @Fecha 21/05/2018
     * @param type $folio //para el caso en que obtenga el detalle de la investigación sin folio
     * @param type $datos_trabajo Si la consulta ya se genero, trabajo contiene el folio
     * @description Obtiene el detalle de la investigación en vista html
     *
     */
    protected function get_detalle_investigacion($folio, $datos_trabajo = null) {
        $this->load->model('Trabajo_model', 'trabajo');
        $this->load->model('Catalogo_model', 'catalogo');
        $output = [];
        $lang = $this->obtener_idioma();
        if (is_null($datos_trabajo)) {
            $datos_trabajo = $this->trabajo->trabajo_investigacion_folio($folio, null)[0];
        }
        $output['lang'] = $lang;
        $output['datos'] = $datos_trabajo;
        $output['language_text'] = $this->obtener_grupos_texto(array('listado_trabajo', 'registro_trabajo', 'detalle_trabajo', 'registro_usuario'), $lang);
        $main_content = $this->load->view('trabajo/ver_revision.tpl.php', $output, true);
        return $main_content;
    }

}
