<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : JZDP AND LEAS
 * */
class Gestion_idiomas extends MY_Controller {

    const LISTA = 'lista', NUEVA = 'agregar', EDITAR = 'editar',
            CREAR = 'crear', LEER = 'leer', ACTUALIZAR = 'actualizar', ELIMINAR = 'eliminar',
            EXPORTAR = 'exportar';

    function __construct() {
        parent::__construct();
    }

    function idiomas() {
        //        try
//        {
            $data_view = array();

            $this->db->schema = 'idiomas';
            $crud = $this->new_crud();
            $crud->set_table('idioma');
            $crud->set_subject('Idiomas');
            $crud->set_primary_key('id_participante');
            $crud->set_relation('clave_delegacion', 'delegaciones', 'nombre');
           // $crud->set_relation('id_tipo_curso', 'tipo_curso', 'nombre');

            $crud->columns("id_participante", "matricula", "curp", "nombre", "apellido_paterno", "apellido_materno", "is_ciefd","correo_electronico", "clave_delegacion", "nombre_siap", "apellido_paterno_siap", "apellido_materno_siap");
            $crud->fields("matricula", "curp", "nombre", "apellido_paterno", "apellido_materno", "correo_electronico", "is_profesor", "is_institucional", "is_ciefd", "activo", "fecha_registro", "clave_delegacion", "clave_departamental", "nombre_siap", "apellido_paterno_siap", "apellido_materno_siap");

            $crud->required_fields("matricula", "curp", "nombre", "apellido_paterno", "apellido_materno", "correo_electronico", "is_institucional", "is_ciefd", "activo", "clave_delegacion");
            $crud->display_as("matricula", 'Matrícula');
            $crud->display_as('nombre', 'Nombre');
            $crud->display_as('apellido_paterno', 'Apellido paterno');
            $crud->display_as('apellido_materno', 'Apellido materno');
            $crud->display_as('nombre_siap', 'Nombre SIAP');
            $crud->display_as('apellido_paterno_siap', 'Apellido paterno SIAP');
            $crud->display_as('apellido_materno_siap', 'Apellido materno SIAP');
            $crud->display_as('is_ciefd', 'Pertence a CIEFD');
            $crud->display_as('clave_delegacion', 'Delegación');
            $crud->display_as('is_institucional', 'Pertenece a la institución');

            $crud->change_field_type('activo', 'true_false', array(0 => 'No', 1 => 'Si'));
            $crud->change_field_type('is_ciefd', 'true_false', array(0 => 'No', 1 => 'Si'));
            $crud->change_field_type('is_institucional', 'true_false', array(0 => 'No', 1 => 'Si'));

            $crud->unset_delete();
            $crud->unset_add();
            $crud->unset_read();

            $data_view['output'] = $crud->render();
            $data_view['title'] = "Participantes";

            $vista = $this->load->view('catalogo/admin.tpl.php', $data_view, true);
            $this->template->setMainContent($vista);
            $this->template->getTemplate();
//        } catch (Exception $e)
//        {
//            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
//        }
    }

    function paises() {
        
    }

    function tipo_etiquetas() {
        
    }

    /**
     * @author LEAS
     * @Fecha 26/04/2018
     * @param type $idioma
     * @description Modifica el idioma actual de la aplicación
     * 
     */
    function modifica_idioma($idioma = "ES") {
        update_lenguaje($idioma);
    }

}
