<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la revisión de los trabajos de investigación
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class Revision extends General_revision {

    function __construct() {
        $this->grupo_language_text = ['generales', 'evaluacion', 'en_revision']; //Grupo de idiomas para el controlador actual
        parent::__construct();
        $this->load->model('Revision_model', 'revision');
    }

    /**
     * @author AleSpock
     * @Fecha 21/05/2018
     * @param type $folio
     * @description genera el espacio de la evaluación
     *
     */
    // public function index(){
    //
     // }
    public function trabajos_investigacion_evaluacion() {
        $output['language_text'] = $this->language_text['en_revision'];
        $output['data_revisar'] = $this->lista_revisar();
        $main_content = $this->load->view('revision_trabajo_investigacion/listas_revisor.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    private function lista_revisar() {
        //echo "hi";
        $dias_revision = $this->get_dias_revision();
        $resp_m = $this->revision->get_listado_revisores(null, $dias_revision);
        //pr($resp_m);
        return $resp_m;
    }

    /**
     * @author Cheko
     * @date 21/05/2018
     * @param type $id identificador del trabajo de investigación
     * @description Muestra la vista de finalizar evaluación
     */
    public function finalizar_evaluacion($id = NULL) {
        $main_content = $this->load->view('revision_trabajo_investigacion/mensaje_evaluacion_terminada.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

}
