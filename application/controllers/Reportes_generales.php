<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : JZDP AND LEAS
 * */
class Reportes_generales extends General_reportes {

    const TOTAL_EXPOSICION_C_O_R = 1, TOTAL_NACIONAL_EXTRANJERO = 2, TOTAL_GENERO = 3;

    function __construct() {
        $this->grupo_language_text = [];
        parent::__construct();
        //$this->load->model('Reportes_generales_model', 'reporteg');
    }

    /**
     * @author
     * @Fecha 05/06/2018
     * @description:
     *
     */
    public function reportes($tipo = Reportes_generales::TOTAL_EXPOSICION_C_O_R) {
//        $output['tabs'] = $this->config_tabs();
        $output['tabs'] = $tipo;
        switch ($tipo) {
            case Reportes_generales::TOTAL_EXPOSICION_C_O_R:
                $output = $this->total_exposicion();
                $output['view_reporte'] = $this->load->view('reportes/generales/total_exposicion.php', $output, true);
                break;
            case Reportes_generales::TOTAL_NACIONAL_EXTRANJERO:
                $result = $this->total_nacional_extranjero();
                $output['view_reporte'] = $this->load->view('reportes/generales/total_nacionales_extranjeros.php', $output, true);
                break;
            case Reportes_generales::TOTAL_GENERO:
                $result = $this->total_por_genero();
                $output['view_reporte'] = $this->load->view('reportes/generales/total_por_genero.php', $output, true);
                break;
        }
//        $output['textos_idioma_nav'] = $this->obtener_grupos_texto('tabs_gestor', $this->obtener_idioma())['tabs_gestor'];
        $main_content = $this->load->view('reportes/generales/index.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    /**
     * @author
     * @Fecha 05/06/2018
     * @description muestra informacion del total de exposisción
     *
     */
    public function total_exposicion() {

    }

    /**
     * @author
     * @Fecha 05/06/2018
     * @description muestra información del total de investigación registrada
     * nacional y esxtranjera
     *
     */
    public function total_nacional_extranjero() {

    }

    /**
     * @author
     * @Fecha 05/06/2018
     * @description muestra informacion del total de registros de investigación por genero
     *
     */
    public function total_por_genero() {

    }

}