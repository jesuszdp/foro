<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : JZDP AND LEAS
 * */
class Reportes_institucion extends General_reportes {

    const TOP_DELEGACION_UMAE = 1, TRABAJO_REGISTRADO_DELEGACION_UMAE = 2, CALIDAD_DELEGACION_UMAE = 3;

    function __construct() {
        $this->grupo_language_text = [];
        parent::__construct();
        $this->load->model('Reportes_instituto_model', 'reportei');
    }

      /**
     * @author 
     * @Fecha 05/06/2018
     * @description: 
     *
     */
    public function reportes($tipo = Reportes_generales::TOP_DELEGACION_UMAE) {
//        $output['tabs'] = $this->config_tabs();
        $output['tabs'] = $tipo;
        switch ($tipo) {
            case Reportes_generales::TOP_DELEGACION_UMAE:
                $output = $this->total_trabajos_nacionales_extranjeros();
                $output['view_reporte'] = $this->load->view('reportes/imss/.php', $output, true);
                break;
            case Reportes_generales::TRABAJO_REGISTRADO_DELEGACION_UMAE:
                $result = $this->calidad_nacionales_externos();
                $output['view_reporte'] = $this->load->view('reportes/imss/.php', $output, true);
                break;
            case Reportes_generales::TRABAJO_REGISTRADO_DELEGACION_UMAE:
                $result = $this->calidad_extranjeros_institucion();
                $output['view_reporte'] = $this->load->view('reportes/imss/.php', $output, true);
                break;
        }
//        $output['textos_idioma_nav'] = $this->obtener_grupos_texto('tabs_gestor', $this->obtener_idioma())['tabs_gestor'];
        $main_content = $this->load->view('reportes/imss/index.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }
    
     /**
     * @author 
     * @Fecha 05/06/2018
     * @description Muestra el total por del
     *
     */
    public function top_delegacion_umae() {
        
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra información del total de investigación registrada 
     * nacional y esxtranjera 
     *
     */
    public function porcentaje_registro_delegacion_umae() {
        
    }

    /**
     * @author 
     * @Fecha 05/06/2018
     * @description muestra informacion del total de registros de investigación por genero
     *
     */
    public function calidad_delegacion_umae() {
        
    }
    
}
