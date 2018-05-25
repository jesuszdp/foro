<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class Gestion_revision extends General_revision {

    const SN_COMITE = 1, REQ_ATENCION = 2, EN_REVISION = 3,
            REVISADOS = 4, ACEPTADOS = 5, RECHAZADOS = 6;

    function __construct() {
        $this->grupo_language_text = ['sin_comite','req_atencion','en_revision',
        'evaluado','aceptado','rechazado','listado_trabajo','generales','evaluacion', 'en_revision','mensajes','detalle_revision','detalle_trabajo']; //Grupo de idiomas para el controlador actual
        parent::__construct();
        $this->load->library('form_complete','security');
        $this->load->model('Gestor_revision_model','gestion_revision');
    }

    /**
     * @author LEAS
     * @Fecha 21/05/2018
     * @param type $folio
     * @description genera el espacio de la evaluación
     *
     */
    public function listado_control($tipo = null) {
        $datos['mensajes'] = $this->obtener_grupos_texto('mensajes', $this->obtener_idioma())['mensajes'];
        switch ($tipo) {
            case Gestion_revision::SN_COMITE:
                $datos['data_sn_comite'] = $this->sn_comite();
                $datos['opciones_secciones'] = $this->obtener_grupos_texto('sin_comite', $this->obtener_idioma())['sin_comite'];
                $output['list_sn_comite'] = $this->load->view('revision_trabajo_investigacion/estados/lista_sin_comite.php',$datos,true);
                break;
            case Gestion_revision::REQ_ATENCION:
                $datos['data_req_atencion'] = $this->requiere_atencion();
                $datos['opciones_secciones'] = $this->obtener_grupos_texto('req_atencion', $this->obtener_idioma())['req_atencion'];
                $output['list_req_atencion'] = $this->load->view('revision_trabajo_investigacion/estados/lista_requiere_atencion.php', $datos, true);
                break;
            case Gestion_revision::EN_REVISION:
                $datos['data_en_revision'] = $this->en_revision();
                $datos['opciones_secciones'] = $this->obtener_grupos_texto('en_revision', $this->obtener_idioma())['en_revision'];
                $output['list_en_revision'] = $this->load->view('revision_trabajo_investigacion/estados/lista_en_revision.php', $datos, true);
                break;
            case Gestion_revision::REVISADOS:
                $output['data_revisados'] = $this->revisados_sin_asignar();
                //pr($output);
                $output['language_text'] =  $this->language_text['evaluado'];
                $output['list_revisados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_revisados.php', $output, true);
                break;
            case Gestion_revision::ACEPTADOS:
                $datos['data_aceptados'] = $this->aceptados();
                $datos['opciones_secciones'] = $this->obtener_grupos_texto('aceptado', $this->obtener_idioma())['aceptado'];
                $output['lista_aceptados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_aceptados.php', $datos, true);
                break;
            case Gestion_revision::RECHAZADOS:
                $output['data_rechazados'] = $this->rechazados();
                //pr($datos);
                $output['language_text'] = $this->language_text['rechazado'];
                $output['list_rechazados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_rechazados.php', $output, true);
                break;
            default :
                $datos['data_sn_comite'] = $this->sn_comite();
                $datos['opciones_secciones'] = $this->obtener_grupos_texto('sin_comite', $this->obtener_idioma())['sin_comite'];
                $output['list_sn_comite'] = $this->load->view('revision_trabajo_investigacion/estados/lista_sin_comite.php',$datos,true);
                break;
        }
        $output['textos_idioma_nav'] = $this->obtener_grupos_texto('tabs_gestor', $this->obtener_idioma())['tabs_gestor'];
        $main_content = $this->load->view('revision_trabajo_investigacion/listas_gestor.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    private function sn_comite() {
      $lenguaje = obtener_lenguaje_actual();
      $respuesta_model = $this->gestion_revision->get_sn_comite();
      $result = array('success'=>$respuesta_model['success'],'msg'=>$respuesta_model['msg'],'result'=>[]);
      foreach ($respuesta_model['result'] as $row) {
        $result['result'][$row['folio']]['folio'] = $row['folio'];
        $result['result'][$row['folio']]['titulo'] = $row['titulo'];
        $metodologia = json_decode($row['metodologia'],true);
        $result['result'][$row['folio']]['metodologia'] = $metodologia[$lenguaje];
      }
      return $result;
    }

    private function requiere_atencion() {
      $lenguaje = obtener_lenguaje_actual();
      $respuesta_model = $this->gestion_revision->get_requiere_atencion();
      $result = array('success'=>$respuesta_model['success'],'msg'=>$respuesta_model['msg'],'result'=>[]);
      foreach ($respuesta_model['result'] as $row) {
        $result['result'][$row['folio']]['folio'] = $row['folio'];
        $result['result'][$row['folio']]['revisores'][] = $row['revisor'];
        $result['result'][$row['folio']]['titulo'] = $row['titulo'];
        $metodologia = json_decode($row['metodologia'],true);
        $result['result'][$row['folio']]['metodologia'] = $metodologia[$lenguaje];
        $result['result'][$row['folio']]['numero_revisiones'] = $row['numero_revisiones'];
      }
      return $result;
    }

    private function en_revision() {
      $lenguaje = obtener_lenguaje_actual();
      $respuesta_model = $this->gestion_revision->get_en_revision();
      $result = array('success'=>$respuesta_model['success'],'msg'=>$respuesta_model['msg'],'result'=>[]);
      foreach ($respuesta_model['result'] as $row) {
        $result['result'][$row['folio']]['folio'] = $row['folio'];
        $result['result'][$row['folio']]['revisores'][] = $row['revisor'];
        $result['result'][$row['folio']]['titulo'] = $row['titulo'];
        $metodologia = json_decode($row['metodologia'],true);
        $result['result'][$row['folio']]['metodologia'] = $metodologia[$lenguaje];
      }
      return $result;
    }

    /**
     * @author AleSpock
     * @date 24/05/2018
     * @param type
     * @description Función que muestra la vista del resumen de un trabajo de investigación
     */
    private function revisados_sin_asignar() {
      //$respuesta_model = $this->gestion_revision->get_revisados();
      $param = array(
          'where' => array(
              'hr.clave_estado' => 'evaluado',
              'hr.actual' => true,
              'd.aceptado' => null,
              'd.tipo_exposicion' => null
            ),
          'order_by' => 'd.promedio, ti.fecha'
        );
      $respuesta_model = $this->gestion_revision->get_trabajos_evaluados($param);
      //pr($respuesta_model);
      return $respuesta_model;
    }
    private function asignados() {
      // $respuesta_model = $this->gestion_revision->get_revisados();
      // pr($respuesta_model);
      // return $respuesta_model;
    }

    private function aceptados() {
      $lenguaje = obtener_lenguaje_actual();
      $respuesta_model = $this->gestion_revision->get_sn_comite();
      $result = array('success'=>$respuesta_model['success'],'msg'=>$respuesta_model['msg'],'result'=>[]);
      foreach ($respuesta_model['result'] as $row) {
        $result['result'][$row['folio']]['folio'] = $row['folio'];
        $result['result'][$row['folio']]['titulo'] = $row['titulo'];
        $metodologia = json_decode($row['metodologia'],true);
        $result['result'][$row['folio']]['metodologia'] = $metodologia[$lenguaje];
        $result['result'][$row['folio']]['tipo_exposicion'] = isset($row['tipo_exposicion']) ? $row['tipo_exposicion'] : "";
        $result['result'][$row['folio']]['promedio_revision'] = isset($row['promedio_revision']) ? $row['promedio_revision']: "";
      }
      return $result;
    }

    private function rechazados() {
      $lenguaje = obtener_lenguaje_actual();
      $respuesta_model = $this->gestion_revision->get_sn_comite();
      $result = array('success'=>$respuesta_model['success'],'msg'=>$respuesta_model['msg'],'result'=>[]);
      foreach ($respuesta_model['result'] as $row) {
        $result['result'][$row['folio']]['folio'] = $row['folio'];
        $result['result'][$row['folio']]['titulo'] = $row['titulo'];
        $metodologia = json_decode($row['metodologia'],true);
        $result['result'][$row['folio']]['metodologia'] = $metodologia[$lenguaje];
      }
      return $result;
    }

    /**
     * @author Cheko
     * @date 21/05/2018
     * @param type $id - identificador del trabajo de investigación
     * @description Función que muestra la vista del resumen de un trabajo de investigación
     */
    public function ver_resumen($idFolio=NULL){
      $folio = decrypt_base64($idFolio);
      //$folio = $idFolio;
      $output['trabajo_investigacion'] = $this->get_detalle_investigacion($folio);
      //pr($output['trabajo_investigacion']);
      $output['idioma'] = $this->obtener_grupos_texto('detalle_revision', $this->obtener_idioma())['detalle_revision'];
      $output['promedioFinal'] = $this->gestion_revision->get_info_promedio_final_por_trabajo($folio);
      $output['revisores'] = $this->gestion_revision->get_revisores_por_trabajo($folio);
      $output['tablaSeccion'] = $this->gestion_revision->get_promedio_por_seccion_por_trabajo($folio);
      $main_content = $this->load->view('revision_trabajo_investigacion/resumen_trabajo_investigacion.php', $output, true);
      $this->template->setMainContent($main_content);
      $this->template->getTemplate();
    }


    /**
     * @author AleSpock
     * @date 21/05/2018
     * @param
     * @description Función que muestra la vista de los estados en la administracion de gestor de revisores
     */
    public function trabajos_investigacion_evaluacion_gestor() {
      $this->listado_control('SN_COMITE');

      $this->template->setMainContent($main_content);
      $this->template->getTemplate();
    }

    /**
     * @author JZDP
     * @Fecha 23/05/2018
     * @param string $folio Identificador del trabajo de investigación
     * @description Genera el listado de revisores disponibles para la asignación de trabajo de investigación en la sección 'Sin comite'
     *
     */
    public function asignar_revisor(){
      if($this->input->is_ajax_request()){ //Validar que se realice una petición ajax
        if($this->input->post()){ //Se valida que se envien datos
          $folios = $this->input->post(null, true); //Obtener valores enviados por usuario y limpiarlos
          $datos['folios_enc'] = $folios; //Enviar datos a vista
          $datos['folios'] = array_map("decrypt_base64", $folios); //Desencriptar identificadores de trabajos
          $datos['revisores'] = $this->gestion_revision->get_revisores()['result']; //Obtener listado de revisores
          
          $this->load->view('revision_trabajo_investigacion/asignar_revisor.php', $datos);
        }
      }
    }

    /**
     * @author JZDP
     * @Fecha 23/05/2018
     * @param string $folio Identificador del trabajo de investigación
     * @description Genera el listado de revisores disponibles para la asignación de trabajo de investigación en la sección 'Requiere Atención'
     *
     */
    public function asignar_revisor_requiere_atencion($param){
      if($this->input->is_ajax_request()){ //Validar que se realice una petición ajax
        if(isset($param) && !empty($param)){ //Se valida que se envien datos
          $folios = $this->security->xss_clean($param); ///Limpiar parámetro
          $datos['folios_enc'] = array($folios);
          $datos['folios'] = array(decrypt_base64($folios)); //Desencriptar identificadores de trabajos
          $condiciones = array('conditions'=>"iu.id_usuario not in (select id_usuario from foro.revision r1 where r1.folio='".decrypt_base64($folios)."')"); //Generar condiciones para mostrar revisores.
          $datos['revisores'] = $this->gestion_revision->get_revisores($condiciones)['result']; ///Obtener listado de revisores
          $this->load->view('revision_trabajo_investigacion/asignar_revisor.php', $datos);
        }        
      }
    }
    
    /**
     * @author JZDP
     * @Fecha 25/05/2018
     * @param string $folio Identificador del trabajo de investigación
     * @description Obtiene el número de revisores a remplazar por trabajo
     *
     */
    private function validar_numero_revisores_remplazar(){

    }


    /**
     * @author JZDP
     * @Fecha 23/05/2018
     * @param string $folio Identificador del trabajo de investigación
     * @description Genera el listado de revisores disponibles para la asignación de trabajo de investigación
     *
     */
    public function asignar_revisor_bd(){
      if($this->input->is_ajax_request()){ //Validar que se realice una petición ajax
        if($this->input->post()){ //Se valida que se envien datos
          //pr($this->input->post());
          $id = $this->input->post(null, true);
          $datos['usuarios'] = array_map("decrypt_base64", $id['usuarios']); ///Obtener identificadores de usuarios
          $datos['folios'] = array_map("decrypt_base64", explode(',', $id['folios'])); //Obtener identificadores de folios
          $datos['resultado'] = $this->gestion_revision->insert_asignar_revisor($datos);
          //print_r($id);
          //pr($datos);
          $this->load->view('revision_trabajo_investigacion/asignar_revisor_bd.php', $datos);
        }
      }
    }

}
