<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Revision_model extends MY_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author 
     * @date 21/05/2018
     * @return array
     */
    public function get_detalle_investigacion($param) {

        return $resutado->result_array();
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author 
     * @date 21/05/2018
     * @return array
     */
    public function get_listado_revisores($param) {

    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author 
     * @date 21/05/2018
     * @return array
     */
    public function get_textos_evaluacion($param) {

    }

}
