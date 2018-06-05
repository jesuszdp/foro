<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : JZDP AND LEAS
 * */
class Reportes_generales extends General_reportes {

    const TOP_DELEGACION_UMAE = 'lista', TRABAJO_REGISTRADO_DEL_UMAE = 'agregar', CALIDAD_DEL_UMAE = 'editar';

    function __construct() {
        parent::__construct();
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra informacion del total de exposisción
     *
     */
    public function reportes($tipo = 1) {
        
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra informacion del total de exposisción
     *
     */
    public function total_exposicion() {
        
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra información del total de investigación registrada 
     * nacional y esxtranjera 
     *
     */
    public function total_nacional_extrangero() {
        
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra informacion del total de registros de investigación por genero
     *
     */
    public function total_por_genero() {
        
    }

}
