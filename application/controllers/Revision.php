<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la revisión de los trabajos de investigación
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class Revision extends General_revision {

    function __construct() {
        $this->grupo_language_text = ['generales', 'evaluacion']; //Grupo de idiomas para el controlador actual
        parent::__construct();
          $this->load->model('Revision_model','revision');

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
       $output['data_revisar']= $this->lista_revisar();
       $main_content = $this->load->view('revision_trabajo_investigacion/listas_revisor.php', $output, true);
       $this->template->setMainContent($main_content);
       $this->template->getTemplate();
     }

     private function lista_revisar() {
      //echo "hi";
      $resp_m = $this->revision->get_listado_revisores();
      //pr($resp_m);
      return $resp_m;
    }

    /**
     * @author LEAS
     * @Fecha 21/05/2018
     * @param type $folio
     * @description genera el espacio de la evaluación
     *
     */
    public function nueva_evaluacion_revision($folio = null) {
        if (!is_null($folio)) {
            $this->load->model('Trabajo_model', 'trabajo');
            $output['datos'] = $this->trabajo->trabajo_investigacion_folio($folio, null);
            if (!empty($output['datos'])) {
                $output['datos'] = $output['datos'][0]; //Accede a la información de los datos de la investigación
                $output['trabajo_investigacion'] = $this->trabajo_investigacion($output['datos']); //Cargara la vista de trabajo de investigación
                $this->load->model("Evaluacion_revision_model", "evaluacion");
                $output['language_text'] = $this->language_text;
//                pr($this->language_text);
                $output['secciones'] = $this->evaluacion->get_secciones(null, $this->obtener_idioma());
                $output['opciones_secciones'] = $this->evaluacion->get_opciones_secciones(null, $this->obtener_idioma());
//                pr($output);
                $output['evaluacion'] = $this->load->view('revision_trabajo_investigacion/evaluacion.php', $output, true);
                $main = $this->load->view('revision_trabajo_investigacion/evaluacion_trabajo_investigacion.php', $output, true);
            } else {//No existe el trabajo de investigación con dicho folio
                $main = $this->load->view('revision_trabajo_investigacion/no_trabajo_valido.php', null, true);
//                pr("Hola");
            }
//        echo $main;
        } else {
            $main = $this->load->view('revision_trabajo_investigacion/no_trabajo_valido.php', null, true);
        }
        $this->template->setMainContent($main);
        $this->template->getTemplate();
    }

    private function trabajo_investigacion($datos_trabajo = null) {


        $this->load->model('Catalogo_model', 'catalogo');
        $output = [];
        $lang = $this->obtener_idioma();
        $output['lang'] = $lang;
        $output['datos'] = $datos_trabajo;
//        $autores = $this->trabajo->autores_trabajo_folio("IMSS-CES-FNFIES-P-18-0002", $lang);
        $output['language_text'] = $this->obtener_grupos_texto(array('listado_trabajo', 'registro_trabajo', 'detalle_trabajo', 'registro_usuario'), $lang);
        $main_content = $this->load->view('trabajo/ver.tpl.php', $output, true);
        return $main_content;
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
