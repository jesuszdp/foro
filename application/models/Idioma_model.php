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

    public function get_lenguaje($lenguaje_default = 'ES', $id_usuario = null, $ip = null) {
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
        if (!empty($result)) {
            $decode = json_decode($result[0]['valor']);
            $lenguaje_default = $decode['language'];//Le asigna el lenguaje registrado en bitacora
        }
        return $lenguaje_default;
    }

    public function get_tree(&$result, $workflow = null) {
        // pr($workflow);
        // pr($result);
        $niveles_menu = 10;
        $pre_menu = [];
        for ($i = 0; $i < $niveles_menu + 1; $i++) {
            foreach ($result as $row) {
                $sin_censo = false;
                if (!is_null($workflow) && $workflow['finalizada'] && $row['id_menu'] == 'CENSO') {
                    $sin_censo = true;
                }
                if (!$sin_censo) {
                    if (!isset($row['se_queda']) || $row['se_queda'] != 0) {
                        if (!isset($pre_menu[$row['id_menu']])) {
                            $pre_menu[$row['id_menu']]['id_menu_padre'] = $row['id_menu_padre'];
                            $pre_menu[$row['id_menu']]['titulo'] = $row['label'];
                            $pre_menu[$row['id_menu']]['id_menu'] = $row['id_menu'];
                            $pre_menu[$row['id_menu']]['link'] = $row['enlace'];
                            $pre_menu[$row['id_menu']]['icon'] = $row['icon'];
                            $pre_menu[$row['id_menu']]['configurador'] = $row['clave_configurador_modulo'];
                        }
                        if (isset($pre_menu[$row['id_menu_padre']]) /* && !isset($pre_menu[$row['id_menu_padre']]['childs'][$row['id_menu']]) */) {
                            $pre_menu[$row['id_menu_padre']]['childs'][$row['id_menu']] = $pre_menu[$row['id_menu']];
                        }
                    }
                }
            }
        }
        //pr($pre_menu);
        $menu = [];


        foreach ($pre_menu as $row) {
            if (empty($row['id_menu_padre']) && !isset($menu[$row['id_menu']])) {
                $menu[$row['id_menu']] = $row;
            }
        }
        //pr($pre_menu);
        //pr($menu);
        // pr($salida);
        return $menu;
    }

    private function get_secciones() {
        $this->db->flush_cache();
        $this->db->reset_query();
        $this->db->select(array(
            'label nombre', 'url'
        ));
        $this->db->where('activo', true);
        $this->db->order_by('orden');
        $secciones = $this->db->get('catalogo.secciones')->result_array();
        $this->db->flush_cache();
        $this->db->reset_query();
        return $secciones;
    }

    public function menu_convocatoria(&$menu = [], &$usuario, &$modelos = []) {
        // pr($menu);
        if (!isset($usuario['workflow']) || empty($usuario['workflow'])) {
            return;
        }
        $roles = array_keys($modelos['sesion']->get_niveles_acceso($usuario['id_usuario'], true));
        $modulos = [];
        foreach ($menu['lateral'] as $row) {
            $modulos[] = $row['id_menu'];
        }
        $filtros = array(
            'id_linea_tiempo' => $usuario['workflow'][0]['id_linea_tiempo'],
            'roles' => $roles,
            'modulos' => $modulos,
                // 'id_etapa' => $usuario['workflow'][0]['id_etapa_activa']
        );
        $modulos = $modelos['workflow']->get_modulos_etapas($filtros);
        $this->filtra_modulos_etapa($menu, $modulos, $usuario['workflow'][0]);
        // pr($modulos);
        // pr($usuario);
    }

    public function filtra_modulos_etapa(&$menu, &$modulos, $workflow) {
        $id_etapa_activa = $workflow['id_etapa_activa'];
        $se_quedan = [];
        foreach ($menu['lateral'] as $key => $value) {
            foreach ($modulos as $row) {
                if ($value['id_menu'] == $row['clave_modulo']) {
                    if ($row['id_etapa'] == $id_etapa_activa) {
                        $se_quedan[$row['clave_modulo']] = true;
                        $menu['lateral'][$key]['se_queda'] = 1;
                    } else if (!isset($se_quedan[$row['clave_modulo']]) || !$se_quedan[$row['clave_modulo']]) {
                        $se_quedan[$row['clave_modulo']] = 0;
                        $menu['lateral'][$key]['se_queda'] = 0;
                    }
                }
            }
        }
    }

}
