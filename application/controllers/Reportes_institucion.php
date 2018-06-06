<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Clase que contiene la gestion de catálogos
* @version 	: 1.0.0
* @author      : JZDP AND LEAS
* */
class Reportes_institucion extends General_reportes {

  const TOP_DELEGACION_UMAE = 1, PORCENTAJE_REGISTRO_DELEGACION_UMAE = 2, CALIDAD_DELEGACION_UMAE = 3;

  function __construct() {
    $this->grupo_language_text = [];
    parent::__construct();
    $this->load->model('Reportes_instituto_model', 'reporteimss');
  }

  /**
  * @author 
  * @Fecha 05/06/2018
  * @description: 
  *
  */
  public function reportes($tipo = Reportes_institucion::TOP_DELEGACION_UMAE) {
  //        $output['tabs'] = $this->config_tabs();
    $output['tabs'] = $tipo;
    switch ($tipo) {
      case Reportes_institucion::TOP_DELEGACION_UMAE:
      $output['top'] = $this->top_delegacion_umae();
      $output['view_reporte'] = $this->load->view('reportes/imss/top_registrados.php', $output, true);
      break;
      case Reportes_institucion::PORCENTAJE_REGISTRO_DELEGACION_UMAE:
      $output['porcentaje'] = $this->porcentaje_registro_delegacion_umae();
      $output['view_reporte'] = $this->load->view('reportes/imss/porcentaje_registrados.php', $output, true);
      break;
      case Reportes_institucion::CALIDAD_DELEGACION_UMAE:
      $output['calidad'] = $this->calidad_delegacion_umae();
      $output['view_reporte'] = $this->load->view('reportes/imss/calidad.php', $output, true);
      break;
    }

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
    return array(
      'umae' => $this->reporteimss->top_umae(),
      'delegacion' => $this->reporteimss->top_delegacion()
    );
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
    return array(
      'umae' => $this->reporteimss->calidad_umae(),
      'delegacion' => $this->reporteimss->calidad_delegacion()
    );
  }

}
