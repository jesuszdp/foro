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

        // Agregamos informacion del trabajo
        $this->db->insert('foro.trabajo_investigacion', $datos['datos']);

        //Agregamos los datos del autor registrante
    	$autor_registrante = array(
    		'folio_investigacion' => $datos['datos']['folio'],
    		'id_informacion_usuario' => $datos['registrante'],
    		'registro' => true
    		);
    	$this->db->insert('foro.autor',$autor_registrante);

        //Agregamos los datos de los demas autores
        $autores = $datos['autores'];
        if(count($autores) > 0)
        {
            foreach ($autores as $key => $value) {
                $this->db->insert('sistema.informacion_usuario', $value);
                $insert_id = $this->db->insert_id();
                $coautor = array(
                    'folio_investigacion' => $datos['datos']['folio'],
                    'id_informacion_usuario' => $insert_id,
                    'registro' => false
                );
                $this->db->insert('foro.autor',$coautor);
            }
        }

    	if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        } else
        {
            $this->db->trans_commit();
            $salida = true;
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

    public function listado_trabajos_autor($id_informacion_usuario)
    {
        $this->db->flush_cache();
        $this->db->reset_query();

        $this->db->select(array('ti.folio','ti.titulo','ti.id_tipo_metodologia','m.nombre nombre_metodologia'));
        $this->db->where(array('a.id_informacion_usuario'=>$id_informacion_usuario));
        $this->db->join('foro.autor a', 'a.folio_investigacion = ti.folio','left');
        $this->db->join('foro.tipo_metodologia m','m.id_tipo_metodologia = ti.id_tipo_metodologia', 'left');
        $res = $this->db->get('foro.trabajo_investigacion ti');

        $this->db->flush_cache();
        $this->db->reset_query();    
        
        return $res->result_array();
    }

    public function autores_trabajo_folio($folio)
    {
        $this->db->flush_cache();
        $this->db->reset_query();

        $this->db->where('a.folio',$folio);

        $this->db->join('sistema.informacion_usuario iu','a.id_informacion_usuario = iu.id_informacion_usuario');
        $res = $this->db->get('foro.autor a');

        $this->db->flush_cache();
        $this->db->reset_query();    
        
        return $res->result_array();
    }

    public function trabajo_investigacion($filtros=null)
    {
        $this->db->flush_cache();
        $this->db->reset_query();

        if(!is_null($filtros))
            $this->db->where($filtros);

        $res = $this->db->get('foro.trabajo_investigacion');

        $this->db->flush_cache();
        $this->db->reset_query();    
        
        return $res->result_array();
    }
}
