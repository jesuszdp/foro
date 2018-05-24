<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluacion_revision_model extends MY_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author LEAS
     * @date 22/05/2018
     * @return array
     */
    public function get_secciones($param = null, $idioma = 'es') {
        $this->db->flush_cache();
        $this->db->reset_query();
        $select = array(
            "id_seccion", "descripcion"
        );
        $this->db->select($select);
        $result = $this->db->get('foro.seccion')->result_array();
        $lang = [];
        foreach ($result as &$value) {
            $lang = json_decode($value['descripcion'], true);
            $value['descripcion'] = $lang[$idioma];
        }
        return $result;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author LEAS
     * @date 22/05/2018
     * @return array
     */
    public function get_opciones_secciones($param = null, $idioma = 'es') {
        $this->db->flush_cache();
        $this->db->reset_query();
        $select = array(
            "id_opcion", "id_seccion", "descripcion", "id_rango"
        );
        $result = [];
        $this->db->select($select);
        $result_prima = $this->db->get('foro.opcion')->result_array();
        $lang = [];
        foreach ($result_prima as &$value) {
            $lang = json_decode($value['descripcion'], true);
            $value['descripcion'] = $lang[$idioma];
            $result[$value['id_seccion']][] = $value;
        }
        return $result;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author LEAS
     * @date 22/05/2018
     * @return array
     */
    public function get_secciones_detalle($param = null, $idioma = 'es') {
        $this->db->flush_cache();
        $this->db->reset_query();
        $select = array(
            "s.id_seccion", "o.id_opcion", "o.descripcion", "r.cualitativa", "r.minimo", "r.maximo"
        );
        $this->db->select($select);
        $this->db->join('foro.opcion o', 's.id_seccion=o.id_seccion', 'inner');
        $this->db->join('foro.rango r', 'o.id_rango=r.id_rango', 'inner');
        $this->db->order_by("s.id_seccion, o.id_opcion asc");

        $result_prima = $this->db->get('foro.seccion s')->result_array();
        $lang = [];
        $result = [];
        foreach ($result_prima as &$value) {
            $lang = json_decode($value['descripcion'], true);
            $value['descripcion'] = $lang[$idioma];
            $result[$value['id_seccion']][] = $value;
        }
        return $result;
    }

    /**
     * Valida que el rango de la calificacion se encuentre entre la opción seleccionada
     * @author LEAS
     * @date 24/05/2018
     * @param type $id_opcion
     * @param type $calificacion
     * @return type
     */
    public function is_valido_rango_calificacion($id_opcion, $calificacion) {
        $this->db->flush_cache();
        $this->db->reset_query();
        $this->db->select(["count(*) total"]);
        $this->db->join('foro.rango r', 'r.id_rango = o.id_rango', 'inner');
        $this->db->where($calificacion . " between r.minimo and r.maximo and id_opcion = " . $id_opcion);
        $this->db->where("id_opcion", $id_opcion);
        $result = $this->db->get('foro.opcion o')->result_array();
//        pr($this->db->last_query());
        return ($result[0]['total'] > 0);
    }

    /**
     * 
     * @param type $id_opcion
     * @param type $calificacion
     */
    public function update_conflicto_sn_tema_educacion($folio, $user_revisor,$datos, $language_text = null) {
        $this->db->where('folio', $folio);
        $this->db->where('id_usuario', $user_revisor);
        $this->db->update('foro.revision', $datos);
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $resultado[En_tpmsg::__default] = En_tpmsg::DANGER;
            $resultado['message'] = 'No fue posible actualizar la información';
//            $resultado['msg'] = $language_text['registro_usuario']['user_registro_problem'];
        }else{
            $this->db->trans_commit();
            $resultado[En_tpmsg::__default] = En_tpmsg::SUCCESS;
            $resultado['message'] = 'La información se actualizo correctamente';
        }
        
        pr($this->db->reset_query());
        return $resultado;
       
    }

}
