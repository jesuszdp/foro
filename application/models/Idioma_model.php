<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Menu_model
 *
 * @author chrigarc
 */
class Idioma_model extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_lenguaje($lenguaje_default = 'es', $id_usuario = null, $ip = null) {
        if (!is_null($id_usuario)) {
            $this->db->where('id_usuario', $id_usuario);
        } else {
            if (!is_null($ip)) {
                $this->db->where('ip', $id_usuario);
            }
        }
        $this->db->where('url ', 'gestion_idiomas/modifica_idioma');
        $select = array(
            "id_bitacora", "id_usuario", "valor", "ip", "url"
        );

        $this->db->select($select);
        $this->db->order_by('fecha desc');
        $this->db->limit(1);

        $query = $this->db->get('sistema.bitacora_sipimss');
        $result = $query->result_array();
        $query->free_result();
        if (!empty($result)) {//
            $decode = json_decode($result[0]['valor'], TRUE);
            $lenguaje_default = $decode['language']; //Le asigna el lenguaje registrado en bitacora
        }
        return $lenguaje_default;
    }

    /**
     * @author LEAS
     * @fecha 27/04/2018
     * @param type $idiomas
     * @param type $lenguaje, es el lenguaje en el que se cargara el catálogo
     * @return type
     */
    public function get_idiomas($idiomas = [], $lenguaje = 'es') {
        $this->db->flush_cache();
        $this->db->reset_query();
        $this->db->select(array(
            "g.clave_idioma", "g.nombre idioma"
        ));
        if (!empty($idiomas)) {//Condición de idiomas
            $this->db->where_in('g.clave_idioma', $idiomas);
        }
        $this->db->where('g.activo', true);
        $this->db->order_by('orden, nombre');
        $idioma = $this->db->get('idiomas.idioma g')->result_array();
        $this->db->flush_cache();
        $this->db->reset_query();
        return $idioma;
    }

    public function get_etiquetas_texto($grupos_texto = [], $idioma = 'es') {
        
        $this->db->flush_cache();
        $this->db->reset_query();
        $this->db->select(array(
            "et.clave_grupo_etiqueta", "et.clave_etiqueta", "t.valor"
        ));
        $this->db->join('idiomas.grupo_etiqueta ge', 'ge.clave_grupo_etiqueta = et.clave_grupo_etiqueta', 'inner');
        $this->db->join('idiomas.texto t', 't.id_etiqueta = et.id_etiqueta', 'inner');
        $this->db->where('t.clave_idioma', $idioma);
        $this->db->where_in('ge.clave_grupo_etiqueta', $grupos_texto);
        $result = $this->db->get('idiomas.etiqueta et')->result_array();
        $this->db->flush_cache();
        $this->db->reset_query();
//            pr($result);
        if (!empty($result)) {
            $language = [];
            foreach ($result as $value) {//Genera agrupaciónes
                if (!isset($language[$value['clave_grupo_etiqueta']])) {//Si no existe, agrega 
                    $language[$value['clave_grupo_etiqueta']] = [];
                }
                $language[$value['clave_grupo_etiqueta']][$value['clave_etiqueta']] = $value['valor']; //Asigna el valor
            }
            return $language;
        }
        return [];
    }

}
