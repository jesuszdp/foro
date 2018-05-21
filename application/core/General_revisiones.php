<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene las funciones generales de las revisiones, 
 * y gestión de revisiones
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class General_revisiones extends MY_Controller {

    const LISTA = 'lista', NUEVA = 'agregar', EDITAR = 'editar',
            CREAR = 'crear', LEER = 'leer', ACTUALIZAR = 'actualizar', ELIMINAR = 'eliminar',
            EXPORTAR = 'exportar';

    function __construct() {
        $this->grupo_language_text = ['generales']; //Grupo de idiomas para el controlador actual
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
     * @param type $folio
     * @description Obtiene el detalle de la investigación
     * 
     */
    function get_detalle_investigacion($folio) {
        
    }
    
    

    

}
