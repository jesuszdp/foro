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
     * @author AleSpock
     * @date 21/05/2018
     * @return array
     */
     public function get_listado_revisores($param = []) {
       try
       {
         $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
         $this->db->flush_cache();
         $this->db->reset_query();
         $this->db->select(array(
           "hr.folio folio", "ti.titulo titulo", "ma.lang metodologia",
           "CAST(ti.fecha AS DATE) + CAST('3 days' AS INTERVAL) AS fecha_limite_revision"
         ));
         $this->db->from("foro.historico_revision hr");
         $this->db->join("foro.trabajo_investigacion ti", "hr.folio=ti.folio", 'left');
         $this->db->join("foro.tipo_metodologia ma", "ti.id_tipo_metodologia=ma.id_tipo_metodologia", 'left');
         //$this->db->where("clave_estado", "asignado");
         $this->db->where("actual", TRUE);
         $this->db->where("hr.folio in (SELECT r.folio FROM foro.revision r WHERE hr.folio=r.folio AND r.id_usuario=".$this->session->userdata('die_sipimss')['usuario']['id_usuario']." and r.revisado=false)");
         $result = $this->db->get(); //pr($this->db->last_query());
         //pr($result);
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
    public function get_textos_evaluacion($param) {

    }
}
