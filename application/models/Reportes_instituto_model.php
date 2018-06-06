<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_instituto_model extends MY_Model {

	public function __construct() {
	// Call the CI_Model constructor
		parent::__construct();
	}

	/**
	* Devuelve el numero total de trabajos registrados en umae o en delegaciones
	* @author clapas
	* @date 06/06/2018
	* @param boolean - true si queremos el total en umae, false para el total en delegaciones
	* @return int
	*/
	public function total_registros($es_umae=false)
	{
		$this->db->flush_cache();
    $this->db->reset_query();

    $this->db->where('es_umae',$es_umae);
    $this->db->get('foro.trabajos_registrados_imss');

	}

	/**
	* Devuelve el numero de trabajos registrados (evaluados) por umae
	* @author clapas
	* @date 06/06/2018
	* @return array
	**/
	public function top_umae()
	{
		$this->db->flush_cache();
    $this->db->reset_query();

    $this->db->select(array('u.nombre_unidad_principal', 'count(tr.folio) total'));
    $this->db->join('catalogo.unidad u','tr.clave_unidad = u.clave_unidad','right');
    $this->db->where('u.es_umae',true);
    $this->db->group_by('u.nombre_unidad_principal');
    $this->db->order_by('count(tr.folio)','desc');
    $this->db->order_by('u.nombre_unidad_principal','asc');
    $res = $this->db->get('foro.trabajos_registrados_imss tr');

    return $res->result_array();
	}

	/**
	* Devuelve el numero de trabajos registrados (evaluados) por delegacion
	* @author clapas
	* @date 06/06/2018
	* @return array
	**/
	public function top_delegacion()
	{
		$this->db->flush_cache();
    $this->db->reset_query();

    $this->db->select(array('d.nombre', 'count(tr.folio) total'));
		$this->db->join('catalogo.unidad u', 'tr.clave_unidad = u.clave_unidad AND u.es_umae = false','inner',false);
		$this->db->join('catalogo.delegaciones d', 'tr.clave_delegacional = d.clave_delegacional', 'right');
		$this->db->group_by('d.nombre');
		$this->db->order_by('count(tr.folio)', 'desc');
		$this->db->order_by('d.nombre' ,'asc');
		$res = $this->db->get('foro.trabajos_registrados_imss tr');

    return $res->result_array();
	}
}
