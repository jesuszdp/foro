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
            "t.clave_traduccion", "t.clave_tipo", "t.clave_grupo", "t.lang"
        ));
        $this->db->where_in('t.clave_grupo', $grupos_texto);
        $result = $this->db->get('idiomas.traduccion t')->result_array();
        $this->db->flush_cache();
        $this->db->reset_query();
        if (!empty($result)) {
            $language = [];
            foreach ($result as $value) {//Genera agrupaciónes
                if (!isset($language[$value['clave_grupo']])) {//Si no existe, agrega 
                    $language[$value['clave_grupo']] = [];
                }
                $valores = json_decode($value['lang'], true);
                if (isset($valores[$idioma])) {
                    $language[$value['clave_grupo']][$value['clave_traduccion']] = $valores[$idioma]; //Asigna el valor
                } else {
                    $language[$value['clave_grupo']][$value['clave_traduccion']] = ""; //Asigna el valor
                }
            }
            return $language;
        }
        return [];
    }

    public function insert_user_idioma($id_user, $idioma) {
        $this->db->flush_cache();
        $this->db->reset_query();
        $salida = false;
        $this->db->trans_begin();
        $params = array(
            'clave_idioma' => $idioma
        );

        $this->db->where('id_usuario', $id_user);
        $this->db->update('sistema.usuarios', $params);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $salida = false;
        } else {
            $this->db->trans_commit();
            $salida = true;
        }
        $this->db->flush_cache();
        $this->db->reset_query();
        return $salida;
    }

}
