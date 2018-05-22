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
                $this->sn_comite();
                $main_content = $this->load->view('revision_trabajo_investigacion/estados/lista_sin_comite.php', $output, true);
                break;
            case Gestion_revision::REQ_ATENCION:
                $this->requiere_atencion();
                $main_content = $this->load->view('revision_trabajo_investigacion/estados/lista_requiere_atencion.php', $output, true);
                break;
            case Gestion_revision::EN_REVISION:
                $this->en_revision();
                $main_content = $this->load->view('revision_trabajo_investigacion/estados/lista_en_revision.php', $output, true);
                break;
            case Gestion_revision::REVISADOS:
                $this->revisados();
                $main_content = $this->load->view('revision_trabajo_investigacion/estados/lista_revisados.php', $output, true);
                break;
            case Gestion_revision::ACEPTADOS:
                $this->aceptados();
                $main_content = $this->load->view('revision_trabajo_investigacion/estados/lista_aceptados.php', $output, true);
                break;
            case Gestion_revision::RECHAZADOS:
                $this->rechazados();
                $main_content = $this->load->view('revision_trabajo_investigacion/estados/lista_rechazados.php', $output, true);
                break;
            default :
        }
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }



    private function sn_comite() {

      return [];
    }

    private function requiere_atencion() {
        return [];
    }

    private function en_revision() {
        return [];
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
      $main_content = $this->load->view('revision_trabajo_investigacion/listas_gestor.php', $output, true);
      $this->template->setMainContent($main_content);
      $this->template->getTemplate();
    }

}
