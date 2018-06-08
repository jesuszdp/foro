<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : JZDP AND LEAS
 * */
class Reportes_calidad extends General_reportes {

    const TOTAL_TRABAJOS_NACIONALES_EXTERNOS = 1, CAL_POR_GENERO = 6,CAL_EXTRANJEROS_EXTERNOS_NACIONALES_INSTITUCIONALES = 4;

    function __construct() {
        $this->grupo_language_text = ['reportes_calidad', 'reportes'];
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
    private function bibliotecas_graficas($array_bibliotecas = ['a', 'c', 'd']) {
        $coleccion = [
            'a' => 'highcharts/highcharts.js',
            'b' => 'highcharts/highcharts-3d.js',
            'c' => 'highcharts/data.js',
            'd' => 'highcharts/modules/exporting.js',
            'e' => 'highcharts/modules/variwide.js',
        ];
        $output = [];
        foreach ($array_bibliotecas as $value) {
            $output[] = $coleccion[$value];
        }
        return $output;
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra información del total trabajos 
     * nacionales y extranjeros tanto institucionales (IMSS) como externos
     *
     */
    public function reportes($tipo = Reportes_calidad::TOTAL_TRABAJOS_NACIONALES_EXTERNOS) {
//        $output['tabs'] = $this->config_tabs();
        $output['tabs'] = $tipo;
        $output['bibliotecas_graficas'] = $this->bibliotecas_graficas(['a', 'e']); //
        $output['language_text'] = $this->language_text;
        switch ($tipo) {
            case Reportes_calidad::TOTAL_TRABAJOS_NACIONALES_EXTERNOS:
                $output['bibliotecas_graficas'] = $this->bibliotecas_graficas(['a', 'b']); //Todas las bibliotecas
                $result = $this->total_trabajos_nacionales_extranjeros($output);
                $output['view_reporte'] = $this->load->view('reportes/calidad/totales_nacionales_extranjeros.php', $output, true);
                break;
            case Reportes_calidad::CAL_EXTRANJEROS_EXTERNOS_NACIONALES_INSTITUCIONALES:
                $result = $this->calidad_institucion_externos_nacionales_extranjeros($output);
                $output['view_reporte'] = $this->load->view('reportes/calidad/calidad_extranjeros_externos_institucionales_nacionales.php', $output, true);
                break;
            case Reportes_calidad::CAL_POR_GENERO:
                $result = $this->calidad_por_genero($output);
                $output['view_reporte'] = $this->load->view('reportes/calidad/calidad_por_genero.php', $output, true);
                break;
        }
//        pr($output['view_reporte']);
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
    private function total_trabajos_nacionales_extranjeros(&$output = null) {
        $output['data']['data'] = $this->reportec->get_total_trabajos_nacionales_extranjeros()[0];
        $output['data']['title'] = "Reporte de total de trabajos nacionales y extranjeros evaluados";
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra información del total trabajos 
     * nacionales y extranjeros tanto institucionales (IMSS) como externos
     *
     */
    private function calidad_institucion_externos_nacionales_extranjeros(&$output = null) {
        $param["ext_inst"] = array('iu.es_imss = true', "iu.clave_pais <> 'MX'");
        $param["ext_no_inst"] = array('iu.es_imss = false', "iu.clave_pais <> 'MX'");
        $param["nac_inst"] = array('iu.es_imss = true', "iu.clave_pais = 'MX'");
        $param["nac_no_inst"] = array('iu.es_imss = false', "iu.clave_pais = 'MX'");

        foreach ($param as $key => $value) {
            $output['data']['data'][$key] = $this->reportec->get_calidad_institucion_externos_nacionales_extranjeros($value)[0];
        }
        $output['data']['title'] = "Reporte de calidad extranjeros y nacionales";
        $output['data']['sub_title'] = "institucionales y no institucionales";
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description 
     * 
     *
     */
    private function calidad_por_genero(&$output = null) {
        $output['data']['data'] = $this->reportec->get_calidad_por_genero();
        $output['data']['title'] = "Reporte de calidad por genero";
        $output['data']['sub_title'] = "Masculino, Femenino, Otro";
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra información del total trabajos 
     * nacionales y extranjeros tanto institucionales (IMSS) como externos
     *
     */
    private function calidad_nacionales_institucion(&$output = null) {
        $output['data']['data']['delegacion'] = $this->reportec->get_calidad_nacionales_institucion_delegacion();
        $output['data']['data']['umae'] = $this->reportec->get_calidad_nacionales_institucion_umae();
        $output['data']['title'] = "Reporte de calidad nacional IMSS";
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description 
     * 
     *
     */
    private function calidad_nacionales_externos($output = null) {
        
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description 
     * 
     *
     */
    private function calidad_extranjeros_institucion(&$output = null) {
        $output['data']['data']['delegacion'] = $this->reportec->get_calidad_nacionales_institucion_delegacion(FALSE);
        $output['data']['data']['umae'] = $this->reportec->get_calidad_nacionales_institucion_umae(FALSE);
        $output['data']['title'] = "Reporte de calidad extranjero IMSS";
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description 
     * 
     *
     */
    private function calidad_extranjeros_externos(&$output = null) {
        
    }

}
