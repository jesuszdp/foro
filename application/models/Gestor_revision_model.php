<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gestor_revision_model extends MY_Model {

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
    public function get_detalle_evaluacion($param) {
        $result = [];
        return $resut;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function get_sn_comite($param = []) {
      try
      {
          $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
          $this->db->flush_cache();
          $this->db->reset_query();
          $this->db->select(array('hr.folio folio','ti.titulo titulo','ma.lang metodologia'));
          $this->db->join('foro.trabajo_investigacion ti', 'hr.folio = ti.folio', 'left');
          $this->db->join('foro.tipo_metodologia ma', 'ti.id_tipo_metodologia = ma.id_tipo_metodologia', 'left');
          $this->db->where('clave_estado', 'sin_asignacion');
          $this->db->where('actual',true);
          $result = $this->db->get('foro.historico_revision hr');
          $salida = $result->result_array();
          $result->free_result();
          $this->db->flush_cache();
          $this->db->reset_query();
          $estado['success'] = true;
          $estado['msg'] = "Se obtuvo el reporte con exito";
          $estado['result'] = $salida;
      }
      catch(Exception $ex)
      {
          $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
      }

      return $estado;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function get_requiere_atencion($param) {
      try
      {
          $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
          $this->db->flush_cache();
          $this->db->reset_query();
          $this->db->select(array('hr.folio folio','ti.titulo titulo','ma.lang metodologia',
          '(SELECT username FROM sistema.usuarios WHERE id_usuario=rn.id_usuario) revisor',
          '(SELECT count(folio) FROM foro.historico_revision WHERE folio=hr.folio) numero_revisiones'));
          $this->db->join('foro.trabajo_investigacion ti', 'hr.folio = ti.folio','left');
          $this->db->join('foro.tipo_metodologia ma', 'ti.id_tipo_metodologia = ma.id_tipo_metodologia','left');
          $this->db->join('foro.revision rn', 'hr.folio = rn.folio','left');
          $this->db->where_in('hr.clave_estado', array('fuera_tiempo','discrepancia','conflicto_interes'));
          $this->db->where('actual',true);
          $result = $this->db->get('foro.historico_revision hr');
          $salida = $result->result_array();
          $result->free_result();
          $this->db->flush_cache();
          $this->db->reset_query();
          $estado['success'] = true;
          $estado['msg'] = "Se obtuvo el reporte con exito";
          $estado['result'] = $salida;
      }
      catch(Exception $ex)
      {
          $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
      }

      return $estado;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function get_en_revision($param) {

        $resut = [];
        return $resut;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function get_revisados($param) {

        $resut = [];
        return $resut;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function get_aceptados($param) {

        $resut = [];
        return $resut;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function get_rechazados($param) {

        $resut = [];
        return $resut;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function insert_asignar_revisor($param) {

        $resut = [];
        return $resut;
    }
}
