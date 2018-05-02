<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Convocatoria_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
    * Devuelve los datos de la convocatoria que se encuentra activa
    */
    public function get_activa()
    {
    	$salida = false;
        $this->db->flush_cache();
        $this->db->reset_query();

        $this->db->where('activo',true);
        $res = $this->db->get('foro.convocatoria');
    
        $this->db->flush_cache();
        $this->db->reset_query();    
        
        return $res->result_array();	
    }
}
