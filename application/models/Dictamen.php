<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dictamen_model extends MY_Model {

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
    public function get_detalle_dictamen($param) {
        $resut = [];
        return $resut;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author 
     * @date 21/05/2018
     * @return array
     */
    public function get_listado_dictamen($param) {
        $resut = [];
        return $resut;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author 
     * @date 21/05/2018
     * @return array
     */
    public function insert_dictamen($param) {

        $resut = [];
        return $resut;
    }

    /**
    * Devuelve el cupo maximo
    * 
    */
    public function obtener_cupo()
    {
      try{
        $this->db->flush_cache();
        $this->db->reset_query();

        $this->db->where(array('llave'=>'cupo'));
        $res = $this->db->get('foro.configuracion');

        $this->db->flush_cache();
        $this->db->reset_query();    

        return $res->result_array();
      }catch(Exception $ex){
        return [];
      }
    }

}
