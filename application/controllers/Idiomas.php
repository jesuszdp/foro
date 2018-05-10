<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : JZDP AND LEAS
 * */
class Idiomas extends MY_Controller {

      const LIMIT = 10, LISTA = 'lista', NUEVA = 'agregar', EDITAR = 'editar',
            CREAR = 'crear', LEER = 'leer', ACTUALIZAR = 'actualizar', ELIMINAR = 'eliminar',
            EXPORTAR = 'exportar', GE = 'actualizar_grupo_etiqueta';


    function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('grocery_CRUD');
        $this->load->library('form_complete');
        $this->load->library('seguridad');
        $this->load->library('form_validation');
        $this->load->model('Idioma_model', 'idioma');
        $this->template->setTitle('Usuarios');
    }

   /**
     * @author LIMA
     * @fecha 27/04/2018
     * @param  $cve_grupo_etiqueta
     * @return VOID
     * Controla los Datos del Grid y de la Busqueda que Hace por Filtros
     */
    public function obtener_grupo_etiquetas($cve_grupo_etiqueta = '')
    {
        $output = [];
        switch($cve_grupo_etiqueta)
        {
            case Idiomas::LISTA:
                $get = $this->input->get(null, true);
                $this->lista_grupo_etiquetas($get);
                break;
            case Idiomas::CREAR: //crear un catalogo
                $peticion  = $this->input->post(null,true);
                $respuesta = $this->crear_registro($peticion);
                echo $respuesta;
                break;    
             case '':
                $view = $this->load->view('idioma/obtener_grupos_etiquetas_v2.tpl.php', $output, true);
                $this->template->setMainContent($view);
                $this->template->getTemplate();
                break;
            default:
                $this->detalle_grupo_etiqueta($cve_grupo_etiqueta);
                break;
        } 
    }

    public function crear_registro($peticion)
    {
     

          $registros['data'] = $this->idioma->insertar_grupos_etiquetas($peticion);

      
    }

   /**
     * @author LIMA
     * @fecha 27/04/2018
     * @param  &$params = []
     * @return JSON
     * Lista los Datos de Grupo Etiquetas
     */
    private function lista_grupo_etiquetas(&$params = [])
    {

        $filtros['limit']  = isset($params['pageSize'])?    $params['pageSize']:Idiomas::LIMIT;
        $filtros['offset'] = isset($params['pageIndex'])?  ($filtros['limit']*($params['pageIndex']-1)):0;
        $filtros['select'] = array(
            'clave_grupo', 
            'nombre',
            'descripcion'
        );
        $filtros['like'] = $this->genera_filtros($params);
        $grupos_etiquetas['data'] = $this->idioma->obten_grupo_etiquetas($filtros);
        $filtros['total'] = true;
        $total = $this->idioma->obten_grupo_etiquetas($filtros)[0]['total'];
        $grupos_etiquetas['length'] = $total;
        header('Content-Type: application/json; charset=utf-8;');
        echo json_encode($grupos_etiquetas);
    }

   /**
     * @author LIMA
     * @fecha 27/04/2018
     * @param  $params
     * @return $filtros
     * Controla Busqueda por Filtros 
     */
    private function genera_filtros($params)
    {
        $filtros = [];
        foreach ($params as $key => $value)
        {
            if($value != '')
            {
                switch ($key)
                {
                    case 'clave_grupo':
                        $filtros['clave_grupo'] = $value;
                        break;
                    case 'nombre':
                        $filtros['nombre'] = $value;
                        break;
                    case 'descripcion':
                        $filtros['descripcion'] = $value;
                        break;
                }
            }

        }
        return $filtros;
    }
   /**
     * @author LIMA
     * @fecha 27/04/2018
     * @param  $params
     * @return $filtros
     * Controla Busqueda por Filtros 
     */
   private function detalle_grupo_etiqueta($cve_grupo_etiqueta = 0)
    {
        $params['where']  = array(
           'clave_grupo' => $cve_grupo_etiqueta
        );
        $params['select'] = array(
           'clave_grupo', 'nombre', 'descripcion'
        );
        $resultado = $this->idioma->obten_grupo_etiquetas($params);
        if(count($resultado) == 1)
           {
            $output['datos_grupo_etiqueta'] = $resultado[0];
           }
        $view = $this->load->view('idioma/datos_grupo_etiqueta.php', $output, true);
        $this->template->setMainContent($view);
        $this->template->getTemplate();

    }
   /**
     * @author LIMA
     * @fecha 27/04/2018
     * @param  $cve_grupo_etiqueta, $tipo
     * @return JSON
     * Controla Busqueda por Filtros 
     */
   public function editar_grupo_etiqueta($cve_grupo_etiqueta = 0, $tipo = Idiomas::GE)
    {
        $salida = [];
        $view = '';
        if($this->input->post() && $this->input->is_ajax_request())
          {
            $this->config->load('form_validation'); //Cargar archivo con validaciones
            switch($tipo)
                  {
                      case Idiomas::GE:
                        $view        = $this->obten_grupo_etiquetas($cve_grupo_etiqueta);
                        $validations = $this->config->item('form_actualizar_ge'); //Obtener validaciones de archivo general
                      break;
                    }

           $this->form_validation->set_rules($validations); //Añadir validaciones
        if($this->form_validation->run() == TRUE)
          {
                $params = $this->input->post(null, true);
                $salida['tp_msg'] = $this->idioma->actualizar_grupo_etiqueta($tipo, $params);
                $output['status'] = $salida;
                $salida['status'] = $salida['tp_msg'];
          } else {
                $salida['tp_msg'] = En_tpmsg::DANGER;
                $salida['msg'] = validation_errors();
                $output['status'] = false;
          }
            switch($tipo)
                  {
                    case Idiomas::GE:
                     $view = $this->obten_grupo_etiquetas($cve_grupo_etiqueta, $output);
                    break;
                   }
        }
        $salida['html'] = $view;
        echo json_encode($salida);
    }
  
   /**
     * @author LIMA
     * @fecha 27/04/2018
     * @param  $cve_grupo_etiqueta, $tipo
     * @return Vista
     * Controla Busqueda por Filtros 
     */
    private function obten_grupo_etiquetas($cve_grupo_etiqueta = 0, &$output = [])
    {
        $params['where']  = array(
           'clave_grupo' => $cve_grupo_etiqueta
        );
        $params['select'] = array(
           'clave_grupo', 'nombre', 'descripcion'
        );
        $resultado = $this->idioma->obten_grupo_etiquetas($params);
         if(count($resultado) == 1)
           {
             $output['datos_grupo_etiqueta'] = $resultado[0];
           }
        return $this->load->view('idioma/datos_grupo_etiqueta.php', $output, true);
    }


    public function obtener_grupo_traduccion($clave_grupo)
    {
        try {
            $this->db->schema = 'idiomas';
            $crud = $this->new_crud();
            $crud->set_table('traduccion');
            $crud->where('clave_grupo',$clave_grupo);
            $crud->set_subject('traduccion');
            $crud->set_primary_key('clave_traduccion');

            $crud->columns('clave_grupo','clave_traduccion','clave_tipo', 'lang');
            $crud->fields('clave_grupo','clave_traduccion','clave_tipo','lang');
            $crud->required_fields('clave_grupo','clave_traduccion','clave_tipo','lang');

            $crud->display_as('clave_grupo','Clave Grupo');
            $opciones_clave_grupo = $this->idioma->obtener_claves_grupos();
            $crud->field_type('clave_grupo','dropdown',$opciones_clave_grupo);

            $crud->display_as('clave_tipo','Tipo de Componenete');
            $opciones_tipo_componente = $this->idioma->obtener_tipo_componente();
            $crud->field_type('clave_tipo','dropdown',$opciones_tipo_componente);

            $crud->unset_texteditor('lang', 'full_text');

            $crud->unset_delete();
            $crud->unset_export();
            $output = $crud->render();
            $main_content = $this->load->view('idioma/gc_traduccion.tpl.php', $output, true);
            $this->template->setMainContent($main_content);
            $this->template->getTemplate();

          } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }

   }

}
