<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trabajo_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function nuevo($datos)
    {
    	$salida = false;
        $this->db->flush_cache();
        $this->db->reset_query();
        $this->db->trans_begin();


        $this->db->insert('foro.trabajo_investigacion', $datos['datos']);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        } else
        {
        	$autor_registrante = array(
        		'folio_investigacion' => $datos['datos']['folio'],
        		'id_informacion_usuario' => $datos['registrante'],
        		'registro' => true
        		);
        	$this->db->insert('foro.autor',$autor_registrante);
        	if ($this->db->trans_status() === FALSE)
	        {
	            $this->db->trans_rollback();
	        } else
	        {
	            $this->db->trans_commit();
	            $salida = true;
	        }
        }
        $this->db->flush_cache();
        $this->db->reset_query();
        return $salida;	
    }

    public function tipo_metodologia($filtros=null)
    {
        $this->db->flush_cache();
        $this->db->reset_query();

    	if(!is_null($filtros))
    		$this->db->where($filtros);

    	$res = $this->db->get('foro.tipo_metodologia');

    	$this->db->flush_cache();
        $this->db->reset_query();    
        
        return $res->result_array();
    }

    public function numero_trabajos()
    {
    	$this->db->flush_cache();
        $this->db->reset_query();

    	return $this->db->count_all('foro.trabajo_investigacion');
    }
}
