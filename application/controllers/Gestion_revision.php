<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class Gestion_revision extends General_revision {

    const SN_COMITE = 1, REQ_ATENCION = 2, EN_REVISION = 3,
            REVISADOS = 4, ACEPTADOS = 5, RECHAZADOS = 6,  SIN_ASIGNAR = 7,  ASIGNADOS = 8;

    function __construct() {
        $this->grupo_language_text = ['sin_comite','req_atencion','en_revision',
        'evaluado','aceptado','rechazado','listado_trabajo','generales', 'evaluacion', 'en_revision']; //Grupo de idiomas para el controlador actual
        parent::__construct();
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
                $datos['data_revisados'] = $this->revisados();
                $datos['opciones_secciones'] = $this->obtener_grupos_texto('evaluado', $this->obtener_idioma())['evaluado'];
                $output['list_revisados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_revisados.php', $datos, true);
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
            case Gestion_revision::SIN_ASIGNAR:
                $output['data_sin_asignar'] = $this->revisados();
                  $output['language_text'] = $this->language_text['sin_asignar'];
                $output['$list_sin_asignar'] = $this->load->view('revision_trabajo_investigacion/estados/lista_sin_asignar.php', $datos, true);
                break;
            case Gestion_revision::ASIGNADOS:
                $datos['data_asignados'] = $this->revisados();
                  $output['language_text'] = $this->language_text['asignados'];
                $output['$list_asignados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_asignados.php', $datos, true);
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
      $respuesta_model = $this->gestion_revision->get_sn_comite();
      return $respuesta_model;
    }

    private function requiere_atencion() {
      $respuesta_model = $this->gestion_revision->get_requiere_atencion();
      $result = array('success'=>$respuesta_model['success'],'msg'=>$respuesta_model['msg'],'result'=>[]);
      foreach ($respuesta_model['result'] as $row) {
        $result['result'][$row['folio']]['folio'] = $row['folio'];
        $result['result'][$row['folio']]['revisores'][] = $row['revisor'];
        $result['result'][$row['folio']]['titulo'] = $row['titulo'];
        $result['result'][$row['folio']]['metodologia'] = $row['metodologia'];
        $result['result'][$row['folio']]['numero_revisiones'] = $row['numero_revisiones'];
      }
      return $result;
    }

    private function en_revision() {
      $respuesta_model = $this->gestion_revision->get_en_revision();
      $result = array('success'=>$respuesta_model['success'],'msg'=>$respuesta_model['msg'],'result'=>[]);
      foreach ($respuesta_model['result'] as $row) {
        $result['result'][$row['folio']]['folio'] = $row['folio'];
        $result['result'][$row['folio']]['revisores'][] = $row['revisor'];
        $result['result'][$row['folio']]['titulo'] = $row['titulo'];
        $result['result'][$row['folio']]['metodologia'] = $row['metodologia'];
      }
      return $result;
    }

    private function revisados() {
      $respuesta_model = $this->gestion_revision->get_revisados();
      $result = array('success'=>$respuesta_model['success'],'msg'=>$respuesta_model['msg'],'result'=>[]);
      foreach ($respuesta_model['result'] as $row) {
        $result['result'][$row['folio']]['folio'] = $row['folio'];
        $result['result'][$row['folio']]['revisores'][] = $row['revisor'];
        $result['result'][$row['folio']]['titulo'] = $row['titulo'];
        $result['result'][$row['folio']]['metodologia'] = $row['metodologia'];
        $result['result'][$row['folio']]['promedio_revision'] = $row['promedio_revision'];
        $result['result'][$row['folio']]['propuesta_dictamen'] = $row['propuesta_dictamen'];
      }
      return $result;
    }

    private function aceptados() {
      $respuesta_model = $this->gestion_revision->get_aceptados();
      return $respuesta_model;
    }

    private function rechazados() {
      $respuesta_model = $this->gestion_revision->get_rechazados();
      //pr($respuesta_model);
      return $respuesta_model;
    }

    /**
     * @author Cheko
     * @date 21/05/2018
     * @param type $id - identificador del trabajo de investigación
     * @description Función que muestra la vista del resumen de un trabajo de investigación
     */
    public function ver_resumen($id=NULL){
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
     * @description Genera el listado de revisores disponibles para la asignación de trabajo de investigación
     *
     */
    public function asignar_revisor($folio){

    }

}
