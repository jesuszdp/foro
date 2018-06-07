<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_generales_model extends MY_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
    * Devuelve el total de aceptados para cartel y oratoria
    * @author AlesSpock
    * @date 06/06/2018
    * @return array
    **/
    public function total_exposiciones(){
      $this->db->flush_cache();
      $this->db->reset_query();
      $this->db->select(array('sugerencia', 'count(folio)'));
      $this->db->from('foro.dictamen');
      $this->db->group_by('sugerencia');
      $result = $this->db->get();
      return $result->result_array();
    }

    /**
    * Devuelve el total de rechazados y evaluados
    * @author AlesSpock
    * @date 06/06/2018
    * @return array
    **/
    public function total_rechazados_exposiciones(){
      $this->db->flush_cache();
      $this->db->reset_query();
      $this->db->select(array('count (tr.folio)'));
      $this->db->from('foro.dictamen');
      $this->db->where('sugerencia = false');
      $result = $this->db->get();
      return $result->result_array();
    }

    /**
    * Devuelve el total de trabajos que no son de temas relacionados a la educación
    * @author AlesSpock
    * @date 06/06/2018
    * @return array
    **/
    public function total_rechazados_no_tema_educacion(){
      $this->db->flush_cache();
      $this->db->reset_query();
      $this->db->select(array('count (rev.folio)'));
      $this->db->from('foro.revision rev');
      $this->db->join("foro.historico_revision hr on rev.folio = hr.folio and hr.clave_estado = 'rechazado'");
      $this->db->where('tema_educacion = false and revisado = true');
      $result = $this->db->get();
      return $result->result_array();
    }







    /**
    * Devuelve el total de registros por pais
    * @author AlesSpock
    * @date 06/06/2018
    * @return array
    **/

    public function total_nac_ext(){
      $this->db->flush_cache();
      $this->db->reset_query();
      $this->db->select(array('clave_pais', 'count(d.folio)'));
      $this->db->from('foro.dictamen d');
      $this->db->join('foro.trabajo_investigacion ti on d.folio = ti.folio');
      $this->db->join('foro.autor au on ti.folio = au.folio_investigacion and au.registro = true');
      $this->db->join('sistema.informacion_usuario iu on iu.id_informacion_usuario = au.id_informacion_usuario');
      $this->db->group_by('iu.clave_pais');
      $result = $this->db->get();
      return $result->result_array();
    }

    /**
    * Devuelve el total de participantes por género
    * @author AlesSpock
    * @date 06/06/2018
    * @return array
    **/
    public function total_genero(){
      $this->db->flush_cache();
      $this->db->reset_query();
      $this->db->select(array('sexo', 'count(d.folio)'));
      $this->db->from('foro.dictamen d');
      $this->db->join('foro.trabajo_investigacion ti on d.folio = ti.folio');
      $this->db->join('foro.autor au on ti.folio = au.folio_investigacion and au.registro = true');
      $this->db->join('sistema.informacion_usuario iu on iu.id_informacion_usuario = au.id_informacion_usuario');
      $this->db->group_by('iu.sexo');
      $result = $this->db->get();
      return $result->result_array();
    }


}
