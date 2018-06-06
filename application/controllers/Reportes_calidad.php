<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : JZDP AND LEAS
 * */
class Reportes_calidad extends General_reportes {

    const TOTAL_TRABAJOS_NACIONALES_EXTERNOS = 1, CAL_NACIONALES_EXTERNOS = 2, CAL_EXTRANJEROS_IMSS = 3,
            CAL_EXTRANJEROS_EXTERNOS = 4, CAL_NACIONALES_IMSS = 5, CAL_POR_GENERO = 6;

    function __construct() {
        $this->grupo_language_text = [];
        parent::__construct();
        $this->load->model('Reportes_calidad_model', 'reportec');
    }

//    private function config_tabs() {
//        $output = [
//            Reportes_calidad::TOTAL_TRABAJOS_NACIONALES_EXTERNOS => array('url' => "index.php/reportes_calidad/reportes/1", 'activo' => ''),
//            Reportes_calidad::CAL_NACIONALES_EXTERNOS => array('url' => "index.php/reportes_calidad/reportes/2", 'activo' => ''),
//            Reportes_calidad::CAL_EXTRANJEROS_IMSS => array('url' => "index.php/reportes_calidad/reportes/3", 'activo' => ''),
//            Reportes_calidad::CAL_EXTRANJEROS_EXTERNOS => array('url' => "index.php/reportes_calidad/reportes/4", 'activo' => ''),
//            Reportes_calidad::CAL_NACIONALES_IMSS => array('url' => "index.php/reportes_calidad/reportes/5", 'activo' => ''),
//            Reportes_calidad::CAL_POR_GENERO => array('url' => "index.php/reportes_calidad/reportes/6", 'activo' => ''),
//        ];
//        return $output;
//    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra información del total trabajos 
     * nacionales y extranjeros tanto institucionales (IMSS) como externos
     *
     */
    public function reportes($tipo = Reportes_calidad::TOTAL_TRABAJOS_NACIONALES_EXTERNOS) {
//        $output['tabs'] = $this->config_tabs();
        switch ($tipo) {
            case Reportes_calidad::TOTAL_TRABAJOS_NACIONALES_EXTERNOS:
                $output['tabs'] = Reportes_calidad::TOTAL_TRABAJOS_NACIONALES_EXTERNOS;
                $output = $this->total_trabajos_nacionales_extranjeros();
                $output['view_reporte'] = $this->load->view('reportes/calidad/totales_nacionales_extranjeros.php', $output, true);
                break;
            case Reportes_calidad::CAL_NACIONALES_EXTERNOS:
                $output['tabs'] = Reportes_calidad::CAL_NACIONALES_EXTERNOS;
                $result = $this->calidad_nacionales_externos();
                $output['view_reporte'] = $this->load->view('reportes/calidad/calidad_nacionales_externos.php', $output, true);
                break;
            case Reportes_calidad::CAL_EXTRANJEROS_IMSS:
                $output['tabs'] = Reportes_calidad::CAL_EXTRANJEROS_IMSS;
                $result = $this->calidad_extranjeros_institucion();
                $output['view_reporte'] = $this->load->view('reportes/calidad/calidad_extranjero_imss.php', $output, true);
                break;
            case Reportes_calidad::CAL_EXTRANJEROS_EXTERNOS:
                $output['tabs'] = Reportes_calidad::CAL_EXTRANJEROS_EXTERNOS;
                $result = $this->calidad_extranjeros_externos();
                $output['view_reporte'] = $this->load->view('reportes/calidad/calidad_extranjeros_externos.php', $output, true);
                break;
            case Reportes_calidad::CAL_NACIONALES_IMSS:
                $output['tabs'] = Reportes_calidad::CAL_NACIONALES_IMSS;
                $result = $this->calidad_nacionales_institucion();
                $output['view_reporte'] = $this->load->view('reportes/calidad/calidad_nacionales_imss.php', $output, true);
                break;
            case Reportes_calidad::CAL_POR_GENERO:
                $output['tabs'] = Reportes_calidad::CAL_POR_GENERO;
                $result = $this->calidad_por_genero();
                $output['view_reporte'] = $this->load->view('reportes/calidad/calidad_por_genero.php', $output, true);
                break;
        }
//        $output['textos_idioma_nav'] = $this->obtener_grupos_texto('tabs_gestor', $this->obtener_idioma())['tabs_gestor'];
        $main_content = $this->load->view('reportes/calidad/index.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra información del total trabajos 
     * nacionales y extranjeros tanto institucionales (IMSS) como externos
     *
     */
    private function total_trabajos_nacionales_extranjeros() {
        
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra información del total trabajos 
     * nacionales y extranjeros tanto institucionales (IMSS) como externos
     *
     */
    private function calidad_nacionales_institucion() {
        
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description 
     * 
     *
     */
    private function calidad_nacionales_externos() {
        
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description 
     * 
     *
     */
    private function calidad_extranjeros_institucion() {
        
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description 
     * 
     *
     */
    private function calidad_extranjeros_externos() {
        
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description 
     * 
     *
     */
    private function calidad_por_genero() {
        
    }

}
