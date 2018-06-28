<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : JZDP AND LEAS
 * */
class Reportes_generales extends General_reportes {

    const TOTAL_EXPOSICION_C_O_R = 1, TOTAL_NACIONAL_EXTRANJERO = 2, TOTAL_GENERO = 3
            , TOTAL_TRABAJOS_NACIONALES_EXTERNOS = 4, CAL_POR_GENERO = 6,
            CAL_EXTRANJEROS_EXTERNOS_NACIONALES_INSTITUCIONALES = 5;

    function __construct() {
        $this->grupo_language_text = ['reportes_generales', "reportes_calidad", "reportes"];
        parent::__construct();
        $this->load->model('Reportes_generales_model', 'reporteg');
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
        $output['bibliotecas_graficas'] = $this->bibliotecas_graficas(['a', 'e', 'd','f']); //Agrega por default las bibliotecas
        $output['language_text'] = $this->language_text;
        // pr($tipo);
        switch ($tipo) {
            case Reportes_generales::TOTAL_EXPOSICION_C_O_R:
                //$output['language_text'] = $this->language_text['reportes_generales'];
                $this->total_exposicion($output);
                // pr('***');
                $output['view_reporte'] = $this->load->view('reportes/generales/total_exposicion.php', $output, true);
                break;
            case Reportes_generales::TOTAL_NACIONAL_EXTRANJERO:
              //  $output['language_text'] = $this->language_text['reportes_generales'];
                $this->total_nacional_extranjero($output);
                $output['view_reporte'] = $this->load->view('reportes/generales/total_nacionales_extranjeros.php', $output, true);
                break;
            case Reportes_generales::TOTAL_GENERO:
                //$output['language_text'] = $this->language_text['reportes_generales'];
                $this->total_por_genero($output);
                $output['view_reporte'] = $this->load->view('reportes/generales/total_por_genero.php', $output, true);
                break;
            case Reportes_generales::TOTAL_TRABAJOS_NACIONALES_EXTERNOS:
//                $output['bibliotecas_graficas'] = $this->bibliotecas_graficas(['a', 'b', 'd']); //Todas las bibliotecas
                $result = $this->total_trabajos_nacionales_extranjeros($output);
                $output['view_reporte'] = $this->load->view('reportes/calidad/totales_nacionales_extranjeros.php', $output, true);
                break;
            case Reportes_generales::CAL_EXTRANJEROS_EXTERNOS_NACIONALES_INSTITUCIONALES:
                $result = $this->calidad_institucion_externos_nacionales_extranjeros($output);
                $output['view_reporte'] = $this->load->view('reportes/calidad/calidad_extranjeros_externos_institucionales_nacionales.php', $output, true);
                break;
            case Reportes_generales::CAL_POR_GENERO:
                $result = $this->calidad_por_genero($output);
                $output['view_reporte'] = $this->load->view('reportes/calidad/calidad_por_genero.php', $output, true);
                break;
        }
        // pr($output);
//        $output['textos_idioma_nav'] = $this->obtener_grupos_texto('tabs_gestor', $this->obtener_idioma())['tabs_gestor'];
        $main_content = $this->load->view('reportes/generales/index.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    /**
     * @author AlesSpock
     * @Fecha 05/06/2018
     * @description muestra informacion del total de exposisción
     *
     */
    public function total_exposicion(&$output) {
      $output['data'] = array(
        'exposiciones' => $this->reporteg->total_exposiciones(), //total de aceptados para exposicion
        'rechazados' => $this->reporteg->total_rechazados_exposiciones(), // rechazados pero se evaluaron
        'no_trabajo_educacion' => $this->reporteg->total_rechazados_no_tema_educacion() // se rechazaron pr que no era un tema de educaccion en salud y estos no se evaluan
      );


    }

    /**
     * @author AlesSpock
     * @Fecha 05/06/2018
     * @description muestra información del total de investigación registrada
     * nacional y esxtranjera
     *
     */
    public function total_nacional_extranjero(&$output) {
      $output['data']= array(
        'nacionales_extranjeros' => $this->reporteg->total_nac_ext()
      );
    }

    /**
     * @author AlesSpock
     * @Fecha 05/06/2018
     * @description muestra informacion del total de registros de investigación por genero
     *
     */
    public function total_por_genero(&$output) {
        $output['data'] = array(
            'genero' => $this->reporteg->total_genero(),
        );
    }

    /**
     * @author
     * @Fecha 05/06/2018
     * @description muestra información del total trabajos
     * nacionales y extranjeros tanto institucionales (IMSS) como externos
     *
     */
    private function total_trabajos_nacionales_extranjeros(&$output = null) {
        $this->load->model('Reportes_calidad_model', 'reportec');
        $output['data']['data'] = $this->reportec->get_total_trabajos_nacionales_extranjeros()[0];
    }

    /**
     * @author
     * @Fecha 05/06/2018
     * @description muestra información del total trabajos
     * nacionales y extranjeros tanto institucionales (IMSS) como externos
     *
     */
    private function calidad_institucion_externos_nacionales_extranjeros(&$output = null) {
        $this->load->model('Reportes_calidad_model', 'reportec');
        $param["ext_inst"] = array('iu.es_imss = true', "iu.clave_pais <> 'MX'");
        $param["ext_no_inst"] = array('iu.es_imss = false', "iu.clave_pais <> 'MX'");
        $param["nac_inst"] = array('iu.es_imss = true', "iu.clave_pais = 'MX'");
        $param["nac_no_inst"] = array('iu.es_imss = false', "iu.clave_pais = 'MX'");

        foreach ($param as $key => $value) {
            $output['data']['data'][$key] = $this->reportec->get_calidad_institucion_externos_nacionales_extranjeros($value)[0];
        }
    }

    /**
     * @author
     * @Fecha 05/06/2018
     * @description
     *
     *
     */
    private function calidad_por_genero(&$output = null) {
        $this->load->model('Reportes_calidad_model', 'reportec');
        $output['data']['data'] = $this->reportec->get_calidad_por_genero();
    }

}
