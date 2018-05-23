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
                $output['list_sn_comite'] = $this->load->view('revision_trabajo_investigacion/estados/lista_sin_comite.php',$datos,true);
                break;
            case Gestion_revision::REQ_ATENCION:
                $datos['data_req_atencion'] = $this->requiere_atencion();
                $output['list_req_atencion'] = $this->load->view('revision_trabajo_investigacion/estados/lista_requiere_atencion.php', $datos, true);
                break;
            case Gestion_revision::EN_REVISION:
                $datos['data_en_revision'] = $this->en_revision();
                $output['list_en_revision'] = $this->load->view('revision_trabajo_investigacion/estados/lista_en_revision.php', $datos, true);
                break;
            case Gestion_revision::REVISADOS:
                $datos['data_revisados'] = $this->revisados();
                $output['list_revisados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_revisados.php', $datos, true);
                break;
            case Gestion_revision::ACEPTADOS:
                $datos['data_aceptados'] = $this->aceptados();
                $output['lista_aceptados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_aceptados.php', $datos, true);
                break;
            case Gestion_revision::RECHAZADOS:
                $datos['data_rechazados'] = $this->rechazados();
                $output['list_rechazados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_rechazados.php', $output, true);
                break;
            default :
                $datos['data_sn_comite'] = $this->sn_comite();
                $output['list_sn_comite'] = $this->load->view('revision_trabajo_investigacion/estados/lista_sin_comite.php',$datos,true);
                break;
        }
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
      return $respuesta_model;
    }

    private function en_revision() {
      $respuesta_model = $this->gestion_revision->get_en_revision();
      return $respuesta_model;
    }

    private function revisados() {
      return [];
    }

    private function aceptados() {
      return [];
    }

    private function rechazados() {
      return [];
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

}
