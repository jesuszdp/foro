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
     * @author AlesSpock
     * @date 22/05/2018
     * @return array
     */
    public function get_aceptados($param) {
        $this->db->flush_cache();
        $this->db->reset_query();
        $this->db->select(array(
            "hr.folio folio", "ti.titulo titulo", "ma.lang metodologia",
            "hr.clave_estado",
            "CASE WHEN dn.tipo_exposicion='O' THEN 'Aceptado para exposición oral'
            WHEN dn.tipo_exposicion='C' THEN 'Aceptado para exposición con cartel'
            WHEN dn.tipo_exposicion='R' THEN 'Rechazado'
            END tipo_exposicion", "rn.promedio_revision"
        ));
        $this->db->from("foro.historico_revision hr");
        $this->db->join("foro.trabajo_investigacion ti ON hr.folio=ti.folio", 'left');
        $this->db->join("foro.tipo_metodologia ma ON ti.id_tipo_metodologia=ma.id_tipo_metodologia", 'left');
        $this->db->join("foro.revision rn ON hr.folio=rn.folio", 'left');
        $this->db->join("foro.dictamen dn ON rn.folio=dn.folio", 'left');
        $this->db->where_in("hr.clave_estado", ['aceptado_oral','aceptado_cartel']);
        $this->db->where("actual", TRUE);
        $result = $this->db->get();
        return $resut->result_array();

    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author AlesSpock
     * @date 23/05/2018
     * @return array
     */
    public function get_rechazados($param) {
      $this->db->flush_cache();
      $this->db->reset_query();
      $this->db->select(array(
        "hr.folio folio","ti.titulo titulo", "ma.lang metodologia",
        "hr.clave_estado",
        "CASE WHEN dn.tipo_exposicion='O' THEN 'Aceptado para exposición oral'
             WHEN dn.tipo_exposicion='C' THEN 'Aceptado para exposición con cartel'
             WHEN dn.tipo_exposicion='R' THEN 'Rechazado'
             END AS tipo_exposicion",
        "rn.promedio_revision",
        "rn.comentario motivo"
      ));
      $this->db->from("foro.historico_revision hr");
      $this->db->join("foro.trabajo_investigacion ti ON hr.folio=ti.folio", 'left');
      $this->db->join("foro.tipo_metodologia ma ON ti.id_tipo_metodologia=ma.id_tipo_metodologia", 'left');
      $this->db->join("foro.revision rn ON hr.folio=rn.folio", 'left');
      $this->db->join("foro.dictamen dn ON rn.folio=dn.folio", 'left');
      $this->db->where("hr.clave_estado", ['rechazado']);
      $this->db->where("actual", TRUE);

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
