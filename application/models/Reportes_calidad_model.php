<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_calidad_model extends MY_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
     * @author LEAS
     * @fecha 07/06/2018
     * @return type Array
     * 
     */
    public function get_total_trabajos_nacionales_extranjeros() {
        $this->db->flush_cache();
        $this->db->reset_query();
        $select = array(
            "sum(case when iu.clave_pais = 'MX' then 1 else 0 end) as trabajos_nacionales",
            "sum(case when iu.clave_pais <> 'MX' then 1 else 0 end) as trabajos_extranjeros"
            , "count(distinct ti.folio) total_trabajos"
        );
        $this->db->select($select);
        $this->db->join("foro.dictamen d", "d.folio = ti.folio", "inner");
        $this->db->join("foro.autor au", "au.folio_investigacion = ti.folio and au.registro", "inner", false);
        $this->db->join("sistema.informacion_usuario iu", "iu.id_informacion_usuario = au.id_informacion_usuario", "inner");
        $result = $this->db->get("foro.trabajo_investigacion ti")->result_array();
        $this->db->flush_cache();
        $this->db->reset_query();
        return $result;
    }

    /**
     * @author LEAS
     * @fecha 07/06/2018
     * @return type Array
     * 
     */
    public function get_calidad_nacionales_institucion() {
        $this->db->flush_cache();
        $this->db->reset_query();
    }

    /**
     * @author LEAS
     * @fecha 07/06/2018
     * @return type Array
     * 
     */
    public function get_calidad_nacionales_externos() {
        $this->db->flush_cache();
        $this->db->reset_query();
    }

    /**
     * @author LEAS
     * @fecha 07/06/2018
     * @return type Array
     * 
     */
    public function get_calidad_extranjeros_institucion() {
        $this->db->flush_cache();
        $this->db->reset_query();
    }

    /**
     * @author LEAS
     * @fecha 07/06/2018
     * @return type Array
     * 
     */
    public function get_calidad_extranjeros_externos() {
        $this->db->flush_cache();
        $this->db->reset_query();
    }

    /**
     * @author LEAS
     * @fecha 07/06/2018
     * @return type Array
     * 
     */
    public function get_calidad_por_genero() {
        $this->db->flush_cache();
        $this->db->reset_query();
    }

}
