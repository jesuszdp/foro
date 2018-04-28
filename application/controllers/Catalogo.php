<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : JZDP & Chekoarcs
 * */
class Catalogo extends MY_Controller {

    const LISTA = 'lista', LIMIT = 25, NUEVA = 'agregar', EDITAR = 'editar',
            CREAR = 'crear', LEER = 'leer', ACTUALIZAR = 'actualizar', ELIMINAR = 'eliminar',
            EXPORTAR = 'exportar', IMPORTAR = 'importar';

    function __construct() {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->load->model('Catalogo_model', 'catalogo');
        $this->load->config('catalogos');
    }

    public function index() {
        redirect(site_url());
    }

    public function categoria($opcion = '') {
        $this->load->model('Catalogo_model', 'catalogo');
        // $this->load->config('catalogos');
        $filtros = $this->config->item('catalogo.categorias');
        $c_query = $this->config->item('catalogo.grupos_categorias');
        $c_query['select'] = array('grupos_categorias.id_grupo_categoria', 'grupos_categorias.nombre grupo_categoria');
        $output = [];
        $output['js'] = '/catalogo/categorias.js';
        $output['exportar'] = site_url('catalogo/categoria/exportar');
        switch ($opcion) {
            case Catalogo::LISTA:
                $params = $this->input->get(null, true);
                $filtros['limit'] = isset($params['pageSize']) ? $params['pageSize'] : Catalogo::LIMIT;
                $filtros['offset'] = isset($params['pageIndex']) ? ($filtros['limit'] * ($params['pageIndex'] - 1)) : 0;
                $filtros['where'] = $this->prepara_filtros($params, array('id_grupo_categoria' => 'categorias.id_grupo_categoria'));
                $filtros['like'] = $this->prepara_filtros($params, array(
                    'clave_categoria' => 'clave_categoria',
                    'categoria' => 'categorias.nombre'
                ));
                $registros['data'] = $this->catalogo->get_registros('catalogo.categorias', $filtros);
                // $registros['query'] = $this->db->last_query();
                $filtros['total'] = true;
                $total = $this->catalogo->get_registros('catalogo.categorias', $filtros)[0]['total'];
                $registros['length'] = $total;
                header('Content-Type: application/json; charset=utf-8;');
                echo json_encode($registros);
                break;
            case Catalogo::NUEVA:
                $post = [];
                $post = $this->input->post(null, true);
                $this->nueva_categoria($post);
                break;
            case Catalogo::EDITAR:
                $post = [];
                $post = $this->input->post(null, true);
                $this->editar_categoria($post);
                break;
            case Catalogo::ELIMINAR:
                $post = $this->input->post(null, true);
                $this->eliminar_categoria($post);
                break;
            case Catalogo::EXPORTAR:
                $file_name = 'catalogo_categorias_' . date('Ymd_his', time());
                $filtros = $this->config->item('catalogo.categorias');
                $registros['data'] = $this->catalogo->get_registros('catalogo.categorias', $filtros);
                $registros['columnas'] = array(
                    'id_categoria', 'categoria', 'id_grupo_categoria',
                    'grupo_categoria', 'clave_categoria',
                );
                $this->exportar_xls($registros['columnas'], $registros['data'], null, null, $file_name);
            default:
                //$grupos_categorias = array('id_grupo_categoria' => '', 'grupo_categoria' => 'Seleccionar');
                $grupos_categorias = $this->catalogo->get_registros('catalogo.grupos_categorias', $c_query);
                array_unshift($grupos_categorias, array('id_grupo_categoria' => '', 'grupo_categoria' => 'Seleccionar'));
                $output['var_js'] = array(
                    array(
                        "name" => 'g_grupos_categorias',
                        'value' => json_encode($grupos_categorias)
                    )
                );
                $output['scripts_adicionales'] = array($this->load->view('tc_template/var_js_view.tpl.php', $output, true));
                $view = $this->load->view('catalogo/grid_general.tpl.php', $output, true);
                $this->template->setMainContent($view);
                $this->template->getTemplate();
                break;
        }
    }

    private function eliminar_categoria(&$params) {
        if ($this->input->post()) {
            $where_ids = array('id_categoria' => $params['id_categoria']);
            $result = $this->catalogo->delete_registros('catalogo.categorias', $where_ids);
            header('Content-Type: application/json; charset=utf-8;');
            echo json_encode($result);
        }
    }

    private function nueva_categoria(&$params) {
        if ($this->input->post()) {
            $this->config->load('form_validation'); //Cargar archivo con validaciones
            $validations = $this->config->item('insert_catalogo_categorias'); //Obtener validaciones de archivo general
            $this->form_validation->set_rules($validations); //Añadir validaciones
            if ($this->form_validation->run() == TRUE) {
                $form = array(
                    'nombre' => $params['categoria'],
                    'clave_categoria' => $params['clave_categoria'],
                    'id_grupo_categoria' => $params['id_grupo_categoria']
                );
                $result = $this->catalogo->insert_registro('catalogo.categorias', $form);
            } else {
                $result['success'] = false;
                $result['message'] = validation_errors();
            }
            $result['data'] = $params;
            header('Content-Type: application/json; charset=utf-8;');
            echo json_encode($result);
        }
    }

    private function editar_categoria(&$params) {
        if ($this->input->post()) {
            $this->config->load('form_validation'); //Cargar archivo con validaciones
            $validations = $this->config->item('update_catalogo_categorias'); //Obtener validaciones de archivo general
            $this->form_validation->set_rules($validations); //Añadir validaciones
            if ($this->form_validation->run() == TRUE) {
                $form = array(
                    'nombre' => $params['categoria'],
                    'clave_categoria' => $params['clave_categoria'],
                    'id_grupo_categoria' => $params['id_grupo_categoria']
                );
                $ids = array(
                    'id_categoria' => $params['id_categoria']
                );
                $result = $this->catalogo->update_registro('catalogo.categorias', $form, $ids);
            } else {
                $result['success'] = false;
                $result['message'] = validation_errors();
            }
            $result['data'] = $params;
            $result['data']['id_categoria'] = $ids['id_categoria'];
            header('Content-Type: application/json; charset=utf-8;');
            echo json_encode($result);
        }
    }

    /**
     * Función que muestra la vista para cargar csv
     * @author Lima
     * @param  $view['status']['result']== 1 Si Cargo el CSV Redirige a Precarga
     *
     * Inicia Carga Categoría por Lote */
    public function categoria_csv() {
        if ($this->input->post()) {     // SI EXISTE UN ARCHIVO EN POST
            $config['upload_path'] = './uploads/';      // CONFIGURAMOS LA RUTA DE LA CARGA PARA LA LIBRERIA UPLOAD
            $config['allowed_types'] = 'csv';           // CONFIGURAMOS EL TIPO DE ARCHIVO A CARGAR
            $config['max_size'] = '1000';               // CONFIGURAMOS EL PESO DEL ARCHIVO
            $this->load->library('upload', $config);    // CARGAMOS LA LIBRERIA UPLOAD
            $view['status']['result'] = false;
            if ($this->upload->do_upload()) { //Se ejecuta la validación de datos
                $this->load->library('csvimport');
                $file_data = $this->upload->data();     //BUSCAMOS LA INFORMACIÓN DEL ARCHIVO CARGADO
                $file_path = './uploads/' . $file_data['file_name'];         // CARGAMOS LA URL DEL ARCHIVO
                if ($this->csvimport->get_array($file_path)) {              // EJECUTAMOS EL METODO get_array() DE LA LIBRERIA csvimport PARA BUSCAR SI EXISTEN DATOS EN EL ARCHIVO Y VERIFICAR SI ES UN CSV VALIDO
                    $csv_array = $this->csvimport->get_array($file_path);   //SI EXISTEN DATOS, LOS CARGAMOS EN LA VARIABLE $csv_array
                    $view['status'] = $this->catalogo->carga_masiva($csv_array, $file_data);
                    //pr($view['status']);
                    //$this->reporte_registro($view['status']);
                } else {
                    $view['status']['msg'] = "Formato inválido";
                }
            } else {
                $view['status']['msg'] = "Formato inválido";
            }

            if ($view['status']['result'] == 1) {
                redirect('precarga');
            }
        }
        #Muestra Vista del Template Carga CSV
        $main_content = $this->load->view('catalogo/formulario_carga_categorias.tpl.php', array(), true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    /* Termina Carga Categoría por Lote */

    public function delegacion() {
        try {
            $this->db->schema = 'catalogo';
            //pr($this->db->list_tables()); //Muestra el listado de tablas pertenecientes al esquema seleccionado

            $crud = $this->new_crud();
            $crud->set_table('delegaciones');

            $crud->set_subject('Delegación');
            $crud->display_as('clave_delegacional', 'Clave');
            $crud->display_as('nombre', 'Nombre de la delegación');
            $crud->display_as('id_region', 'Región');
            $crud->display_as('configuraciones', 'Configuraciones');
            $crud->display_as('latitud', 'Latitud');
            $crud->display_as('longitud', 'Longitud');
            $crud->display_as('fecha', 'Fecha');
            $crud->display_as('activo', 'Activo');


            $crud->set_primary_key('id_region', 'regiones'); //Definir llaves primarias, asegurar correcta relación
            $crud->set_primary_key('id_delegacion', 'delegaciones');

            $crud->set_relation('id_region', 'regiones', 'nombre', null, 'nombre'); //Establecer relaciones

            $crud->columns('clave_delegacional', 'nombre', 'id_region', 'latitud', 'longitud', 'fecha', 'activo'); //Definir columnas a mostrar en el listado y su orden
            $crud->add_fields('clave_delegacional', 'nombre', 'id_region', 'latitud', 'longitud', 'configuraciones', 'fecha', 'activo'); //Definir campos que se van a agregar y su orden
            $crud->edit_fields('clave_delegacional', 'nombre', 'id_region', 'latitud', 'longitud', 'configuraciones', 'fecha', 'activo'); //Definir campos que se van a editar y su orden

            $crud->change_field_type('activo', 'true_false', array(0 => 'Inactivo', 1 => 'Activo'));

            $crud->set_rules('nombre', 'Nombre de categoría', 'trim|required');
            $crud->set_rules('fecha', 'Fecha', 'trim|required');
            $crud->set_rules('activo', 'Activo', 'required');

            $crud->unset_delete();
            $output = $crud->render();
            $view['contenido'] = $this->load->view('catalogo/gc_output', $output, true);
            //pr($view['contenido']); exit();
            //$main_content = $this->load->view('admin/admin', $view, true);
            $main_content = $view['contenido'];
            $this->template->setMainContent($main_content);
            $this->template->getTemplate();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function departamento($opcion = '', $id = null) {
        $this->load->model('Catalogo_model', 'catalogo');
        // $this->load->config('catalogos');
        $filtros = $this->config->item('catalogo.departamentos_instituto');
        $output = [];
        $output['js'] = '/catalogo/departamento.js';
        $output['exportar'] = site_url('catalogo/departamento/exportar');
        switch ($opcion) {
            case Catalogo::LISTA:
                $params = $this->input->get(null, true);
                $filtros['limit'] = isset($params['pageSize']) ? $params['pageSize'] : Catalogo::LIMIT;
                $filtros['offset'] = isset($params['pageIndex']) ? ($filtros['limit'] * ($params['pageIndex'] - 1)) : 0;
                $filtros['like'] = $this->prepara_filtros($params, array(
                    'departamento' => 'departamentos.nombre',
                    'clave_departamental' => 'departamentos.clave_departamental',
                    'clave_unidad' => 'departamentos.clave_unidad'
                ));
                // pr($filtros);
                $registros['data'] = $this->catalogo->get_registros('catalogo.departamentos_instituto departamentos', $filtros);
                // $registros['query'] = $this->db->last_query();
                $filtros['total'] = true;
                $total = $this->catalogo->get_registros('catalogo.departamentos_instituto departamentos', $filtros)[0]['total'];
                $registros['length'] = $total;
                header('Content-Type: application/json; charset=utf-8;');
                echo json_encode($registros);
                break;
            case Catalogo::NUEVA:
                $post = [];
                $post = $this->input->post(null, true);
                $this->nuevo_departamento($post);
                break;
            case Catalogo::EDITAR:
                $post = [];
                $post = $this->input->post(null, true);
                $this->editar_departamento($post);
                break;
            case Catalogo::ELIMINAR:
                $post = $this->input->post(null, true);
                $this->eliminar_departamento($post);
                break;
            case Catalogo::EXPORTAR:
                $file_name = 'catalogo_adscripciones_' . date('Ymd_his', time());
                $filtros = $this->config->item('catalogo.departamentos_instituto');
                $registros['data'] = $this->catalogo->get_registros('catalogo.departamentos_instituto departamentos', $filtros);
                $registros['columnas'] = array(
                    "id_departamento_instituto",
                    "Adscripción",
                    "Clave departamental",
                    "Clave unidad",
                    "Activa"
                );
                $this->exportar_xls($registros['columnas'], $registros['data'], null, null, $file_name);
                break;
            default:
                $view = $this->load->view('catalogo/grid_general.tpl.php', $output, true);
                $this->template->setMainContent($view);
                $this->template->getTemplate();
                break;
        }
    }

    private function eliminar_departamento(&$params) {
        if ($this->input->post()) {
            $where_ids = array('id_departamento_instituto' => $params['id_departamento_instituto']);
            $result = $this->catalogo->delete_registros('catalogo.departamentos_instituto', $where_ids);
            header('Content-Type: application/json; charset=utf-8;');
            echo json_encode($result);
        }
    }

    private function nuevo_departamento(&$params = []) {
        if ($this->input->post()) {
            $this->config->load('form_validation'); //Cargar archivo con validaciones
            $validations = $this->config->item('insert_catalogo_departamento'); //Obtener validaciones de archivo general
            $this->form_validation->set_rules($validations); //Añadir validaciones
            if ($this->form_validation->run() == TRUE) {
                $form = array(
                    'nombre' => $params['departamento'],
                    'clave_unidad' => $params['clave_unidad'],
                    'clave_departamental' => $params['clave_departamental']
                );
                $result = $this->catalogo->insert_registro('catalogo.departamentos_instituto', $form);
            } else {
                $result['success'] = false;
                $result['message'] = validation_errors();
            }
            $result['data'] = $params;
            header('Content-Type: application/json; charset=utf-8;');
            echo json_encode($result);
        }
    }

    private function editar_departamento($params = []) {
        if ($this->input->post()) {
            $this->config->load('form_validation'); //Cargar archivo con validaciones
            $validations = $this->config->item('update_catalogo_departamento'); //Obtener validaciones de archivo general
            $this->form_validation->set_rules($validations); //Añadir validaciones
            if ($this->form_validation->run() == TRUE) {
                $form = array(
                    'nombre' => $params['departamento'],
                    'clave_unidad' => $params['clave_unidad'],
                    'clave_departamental' => $params['clave_departamental']
                );
                $ids = array(
                    'id_departamento_instituto' => $params['id_departamento_instituto']
                );
                $result = $this->catalogo->update_registro('catalogo.departamentos_instituto', $form, $ids);
            } else {
                $result['success'] = false;
                $result['message'] = validation_errors();
            }
            $result['data'] = $params;
            $result['data']['id_departamento_instituto'] = $ids['id_departamento_instituto'];
            header('Content-Type: application/json; charset=utf-8;');
            echo json_encode($result);
        }
    }

    public function grupo_categoria() {
        try {
            $this->db->schema = 'catalogo';
            //pr($this->db->list_tables()); //Muestra el listado de tablas pertenecientes al esquema seleccionado

            $crud = $this->new_crud();
            $crud->set_table('grupos_categorias');

            $crud->set_subject('Grupo categoría');
            $crud->display_as('id_grupo_categoria', 'ID');
            $crud->display_as('clave', 'Clave');
            $crud->display_as('nombre', 'Nombre del grupo-categoría');
            $crud->display_as('descripcion', 'Descripción');

            $crud->set_primary_key('id_grupo_categoria', 'grupos_categorias'); //Definir llaves primarias, asegurar correcta relación

            $crud->columns('id_grupo_categoria', 'clave', 'nombre'); //Definir columnas a mostrar en el listado y su orden
            $crud->add_fields('clave', 'nombre', 'descripcion'); //Definir campos que se van a agregar y su orden
            $crud->edit_fields('clave', 'nombre', 'descripcion'); //Definir campos que se van a editar y su orden

            $crud->set_rules('nombre', 'Nombre del grupo-categoría', 'trim|required');

            $crud->unset_delete();
            $output = $crud->render();

            $view['contenido'] = $this->load->view('catalogo/gc_output', $output, true);
            //pr($view['contenido']); exit();
            // $main_content = $this->load->view('admin/admin', $view, true);
            $main_content = $view['contenido'];
            $this->template->setMainContent($main_content);
            $this->template->getTemplate();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function region() {
        try {
            $this->db->schema = 'catalogo';
            //pr($this->db->list_tables()); //Muestra el listado de tablas pertenecientes al esquema seleccionado

            $crud = $this->new_crud();
            $crud->set_table('regiones');

            $crud->set_subject('Región');
            $crud->display_as('id_region', 'ID');
            $crud->display_as('clave_regional', 'Clave');
            $crud->display_as('nombre', 'Nombre de la región');
            $crud->display_as('configuraciones', 'Configuraciones');
            $crud->display_as('fecha', 'Fecha');
            $crud->display_as('activo', 'Activo');

            $crud->set_primary_key('id_region', 'regiones'); //Definir llaves primarias, asegurar correcta relación

            $crud->columns('id_region', 'clave_regional', 'nombre', 'fecha', 'activo'); //Definir columnas a mostrar en el listado y su orden
            $crud->add_fields('clave_regional', 'nombre', 'fecha', 'configuraciones', 'activo'); //Definir campos que se van a agregar y su orden
            $crud->edit_fields('clave_regional', 'nombre', 'fecha', 'configuraciones', 'activo'); //Definir campos que se van a editar y su orden

            $crud->change_field_type('activo', 'true_false', array(0 => 'Inactivo', 1 => 'Activo'));

            $crud->set_rules('nombre', 'Nombre de la región', 'trim|required');
            $crud->set_rules('clave_regional', 'Clave', 'trim|required');
            $crud->set_rules('fecha', 'Fecha', 'trim|required');
            $crud->set_rules('activo', 'Activo', 'required');

            $crud->unset_delete();
            $output = $crud->render();

            $view['contenido'] = $this->load->view('catalogo/gc_output', $output, true);
            //pr($view['contenido']); exit();
            // $main_content = $this->load->view('admin/admin', $view, true);
            $main_content = $view['contenido'];
            $this->template->setMainContent($main_content);
            $this->template->getTemplate();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function tipo_unidad() {
        try {
            $this->db->schema = 'catalogo';
            //pr($this->db->list_tables()); //Muestra el listado de tablas pertenecientes al esquema seleccionado

            $crud = $this->new_crud();
            $crud->set_table('tipos_unidades');

            $crud->set_subject('Tipo de unidad');
            $crud->display_as('id_tipo_unidad', 'ID');
            $crud->display_as('nombre', 'Nombre del tipo de unidad');
            $crud->display_as('clave', 'Clave');
            $crud->display_as('descripcion', 'Descripción');
            $crud->display_as('activa', 'Activo');

            $crud->set_primary_key('id_tipo_unidad', 'tipos_unidades'); //Definir llaves primarias, asegurar correcta relación

            $crud->columns('id_tipo_unidad', 'nombre', 'clave', 'activa'); //Definir columnas a mostrar en el listado y su orden
            $crud->add_fields('clave', 'nombre', 'descripcion', 'activa'); //Definir campos que se van a agregar y su orden
            $crud->edit_fields('clave', 'nombre', 'descripcion', 'activa'); //Definir campos que se van a editar y su orden

            $crud->change_field_type('activa', 'true_false', array(0 => 'Inactivo', 1 => 'Activo'));

            $crud->set_rules('nombre', 'Nombre del tipo de unidad', 'trim|required');
            $crud->set_rules('activa', 'Activo', 'required');

            $crud->unset_delete();
            $output = $crud->render();

            $view['contenido'] = $this->load->view('catalogo/gc_output', $output, true);
            //pr($view['contenido']); exit();
            // $main_content = $this->load->view('admin/admin', $view, true);
            $main_content = $view['contenido'];
            $this->template->setMainContent($main_content);
            $this->template->getTemplate();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function unidad_instituto($opcion = '', $id = null) {
        $this->load->model('Catalogo_model', 'catalogo');
        // $this->load->config('catalogos');
        $filtros = $this->config->item('catalogo.unidades_instituto');
        $output = [];
        $output['js'] = '/catalogo/unidad_instituto.js';
        $output['exportar'] = site_url('catalogo/unidad_instituto/exportar');
        $post = [];
        switch ($opcion) {
            case Catalogo::LISTA:
                $params = $this->input->get(null, true);
                $filtros['limit'] = isset($params['pageSize']) ? $params['pageSize'] : Catalogo::LIMIT;
                $filtros['offset'] = isset($params['pageIndex']) ? ($filtros['limit'] * ($params['pageIndex'] - 1)) : 0;
                $filtros['like'] = $this->prepara_filtros($this->input->get(null, true), array(
                    'unidad' => 'unidades.nombre',
                    'delegacion' => 'delegacion.nombre',
                    'clave_presupuestal' => 'unidades.clave_presupuestal',
                    'clave_unidad' => 'unidades.clave_unidad',
                    'es_umae' => 'unidades.grupo_tipo_unidad',
                        )
                );
                $filtros['where'] = $this->prepara_filtros($this->input->get(null, true), array(
                    'anio' => 'unidades.anio'
                        )
                );
                $registros['data'] = $this->catalogo->get_registros('catalogo.unidades_instituto unidades', $filtros);
                // $registros['query'] = $this->db->last_query();
                $filtros['total'] = true;
                $total = $this->catalogo->get_registros('catalogo.unidades_instituto unidades', $filtros)[0]['total'];
                $registros['length'] = $total;
                header('Content-Type: application/json; charset=utf-8;');
                echo json_encode($registros);
                break;
            case Catalogo::NUEVA:
                $this->nueva_unidad_instituto($post);
                break;
            case Catalogo::EDITAR:
                $post['id_unidad'] = $id;
                $this->editar_unidad_instituto($post);
                break;
            case Catalogo::EXPORTAR:
                $file_name = 'catalogo_categorias_' . date('Ymd_his', time());
                $filtros = $this->config->item('catalogo.unidades_instituto completo');
                $registros['data'] = $this->catalogo->get_registros('catalogo.unidades_instituto unidades', $filtros);
                $registros['columnas'] = array(
                    'id_unidad_instituto', 'nombre', 'clave_unidad', 'anio',
                    'nivel_atencion', 'id_tipo_unidad', 'umae', 'clave_presupuestal',
                    'longitud', 'latitud', 'id_region', 'grupo_tipo_unidad', 'activa',
                    'grupo_delegacion', 'direccion_fisica', 'entidad_federativa',
                    'unidad_principal', 'nombre_unidad_principal',
                    'clave_unidad_principal', 'tipo_unidad', 'id_delegacion',
                    'delegacion'
                );
                $this->exportar_xls($registros['columnas'], $registros['data'], null, null, $file_name);
                break;
            default:
                $view = $this->load->view('catalogo/grid_general.tpl.php', $output, true);
                $this->template->setMainContent($view);
                $this->template->getTemplate();
                break;
        }
    }

    private function nueva_unidad_instituto(&$params = []) {
        $this->load->library('form_complete');
        $this->load->library('form_validation');
        $output = [];
        if ($this->input->post()) {
            $post = $this->input->post(null, true);
            $this->config->load('form_validation'); //Cargar archivo con validaciones
            $validations = $this->config->item('catalogo_unidades_instituto'); //Obtener validaciones de archivo general
            $this->form_validation->set_rules($validations); //Añadir validaciones
            if ($this->form_validation->run() == TRUE) {
                $post['umae'] = $post['umae'] == 1 ? true : false;
                $post['activa'] = $post['activa'] == 1 ? true : false;
                $post['longitud'] = is_numeric($post['longitud']) ? $post['longitud'] : null;
                $post['latitud'] = is_numeric($post['latitud']) ? $post['latitud'] : null;
                $output['status'] = $this->catalogo->insert_registro('catalogo.unidades_instituto', $post);
            } else {
                pr(validation_errors());
            }
        }
        $filtros = $this->config->item('catalogo.unidades_instituto');
        $tipos_unidades = $this->catalogo->get_registros('catalogo.unidades_instituto unidades', $filtros);
        $filtros = $this->config->item('catalogo.regiones');
        $regiones = $this->catalogo->get_registros('catalogo.regiones', $filtros);

        $output['post']['data'] = $params;
        $output['delegaciones'] = dropdown_options($this->catalogo->get_delegaciones(null, array('oficinas_centrales' => true)), 'clave_delegacional', 'nombre');
        $output['tipos_unidades'] = dropdown_options($tipos_unidades, 'id_tipo_unidad', 'tipo_unidad');
        $output['regiones'] = dropdown_options($regiones, 'id_region', 'region');
        $view = $this->load->view('catalogo/formulario_unidad_instituto.tpl.php', $output, true);
        $this->template->setMainContent($view);
        $this->template->getTemplate();
    }

    private function editar_unidad_instituto(&$params = []) {
        $this->load->library('form_complete');
        $this->load->library('form_validation');
        $output = [];
        $filtros = $this->config->item('catalogo.unidades_instituto');
        $tipos_unidades = $this->catalogo->get_registros('catalogo.unidades_instituto unidades', $filtros);
        if ($this->input->post()) {
            $post = $this->input->post(null, true);
            $this->config->load('form_validation'); //Cargar archivo con validaciones
            $validations = $this->config->item('catalogo_unidades_instituto'); //Obtener validaciones de archivo general
            $this->form_validation->set_rules($validations); //Añadir validaciones
            if ($this->form_validation->run() == TRUE) {
                $post['umae'] = $post['umae'] == 1 ? true : false;
                $post['activa'] = $post['activa'] == 1 ? true : false;
                $post['longitud'] = is_numeric($post['longitud']) ? $post['longitud'] : null;
                $post['latitud'] = is_numeric($post['latitud']) ? $post['latitud'] : null;
                $where_ids = array(
                    'id_unidad_instituto' => $params['id_unidad']
                );
                $output['status'] = $this->catalogo->update_registro('catalogo.unidades_instituto', $post, $where_ids);
            } else {
                pr(validation_errors());
            }
        }
        $filtros = $this->config->item('catalogo.regiones');
        $regiones = $this->catalogo->get_registros('catalogo.regiones', $filtros);
        $filtros = $this->config->item('catalogo.unidades_instituto completo');
        $filtros['where'] = array(
            'id_unidad_instituto' => $params['id_unidad']
        );
        $unidad = $this->catalogo->get_registros('catalogo.unidades_instituto unidades', $filtros);
        if (empty($unidad)) {
            redirect('catalogo/unidad_instituto');
        }
        $output['post'] = $unidad[0];
        // pr($output['post']);
        $output['delegaciones'] = dropdown_options($this->catalogo->get_delegaciones(null, array('oficinas_centrales' => true)), 'clave_delegacional', 'nombre');
        $output['tipos_unidades'] = dropdown_options($tipos_unidades, 'id_tipo_unidad', 'tipo_unidad');
        $output['regiones'] = dropdown_options($regiones, 'id_region', 'region');
        $view = $this->load->view('catalogo/formulario_unidad_instituto.tpl.php', $output, true);
        $this->template->setMainContent($view);
        $this->template->getTemplate();
    }

    function genero() {
        //        try
//        {
        $data_view = array();

        $this->db->schema = 'idiomas';
        $crud = $this->new_crud();
        $crud->set_table('genero');
        $crud->set_subject('genero');
        $crud->set_primary_key('id_genero');

        $crud->columns("id_genero", "nombre", "clave_control_idioma");
        $crud->fields( "nombre", "clave_control_idioma");

        $crud->required_fields("id_genero", "nombre");
        $crud->display_as("id_genero", 'Id genero');
        $crud->display_as('nombre', 'Genero');

        $crud->edit_fields('nombre');
        $crud->add_fields('nombre');
//        $crud->unset_delete();
//        $crud->unset_read();

        $data_view['output'] = $crud->render();
        $data_view['title'] = "Genero";

        $vista = $this->load->view('admin/admin.tpl.php', $data_view, true);
        $this->template->setMainContent($vista);
        $this->template->getTemplate();
//        } catch (Exception $e)
//        {
//            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
//        }
    }

}
