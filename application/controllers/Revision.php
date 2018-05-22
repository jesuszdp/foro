<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la revisión de los trabajos de investigación
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class Revision extends General_revision {

    function __construct() {
        $this->grupo_language_text = ['generales']; //Grupo de idiomas para el controlador actual
        parent::__construct();
    }

    /**
     * @author LEAS
     * @Fecha 21/05/2018
     * @param type $folio
     * @description genera el espacio de la evaluación
     *
     */
    public function trabajos_investigacion_evaluacion() {
      $main_content = $this->load->view('revision_trabajo_investigacion/listas_revisor.php', $output, true);
      $this->template->setMainContent($main_content);
      $this->template->getTemplate();
    }
    public function trabajos_investigacion_evaluacion_gestor() {
      $main_content = $this->load->view('revision_trabajo_investigacion/listas_gestor.php', $output, true);
      $this->template->setMainContent($main_content);
      $this->template->getTemplate();
    }

    /**
     * @author LEAS
     * @Fecha 21/05/2018
     * @param type $folio
     * @description genera el espacio de la evaluación
     *
     */
    public function nueva_evaluacion_revision() {
        pr("sss");
        $data = NULL;
        $main = $this->load->view('revision_trabajo_investigacion/evaluacion_trabajo_investigacion.php', $data, true);
//        echo $main;
        $this->template->setMainContent($main);
        $this->template->getTemplate();
    }

    public function finalizar_evaluacion(){
      $main_content = $this->load->view('revision_trabajo_investigacion/mensaje_evaluacion_terminada.php', $output, true);
      $this->template->setMainContent($main_content);
      $this->template->getTemplate();
    }

}
