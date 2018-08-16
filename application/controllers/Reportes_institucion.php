<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : JZDP AND LEAS
 * */
class Reportes_institucion extends General_reportes {

    const TOP_DELEGACION_UMAE = 1, PORCENTAJE_REGISTRO_DELEGACION_UMAE = 2, CALIDAD_DELEGACION_UMAE = 3;
    const TOP_EVALUADOS = 4, CALIDAD_SECCION = 5;

    function __construct() {
        $this->grupo_language_text = ['reportes', 'reportes_imss'];
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
        $lang = $this->obtener_idioma();
        $output['lang'] = $lang;
        $output['language_text'] = $this->obtener_grupos_texto(array('reportes_imss'), $lang);
        $output['bibliotecas_graficas'] = $this->bibliotecas_graficas(['a', 'e', 'd','f','g']);
        $output['tabs'] = $tipo;
        switch ($tipo) {
            case Reportes_institucion::TOP_DELEGACION_UMAE:
                $output['top'] = $this->top_delegacion_umae();
                $output['view_reporte'] = $this->load->view('reportes/imss/top_registrados.php', $output, true);
                break;
            case Reportes_institucion::PORCENTAJE_REGISTRO_DELEGACION_UMAE:
                $this->porcentaje_registro_delegacion_umae($output);
                $output['view_reporte'] = $this->load->view('reportes/imss/porcentaje_registrados.php', $output, true);
                break;
            case Reportes_institucion::CALIDAD_DELEGACION_UMAE:
                $output['calidad'] = $this->calidad_delegacion_umae();
                $output['view_reporte'] = $this->load->view('reportes/imss/calidad.php', $output, true);
                break;
            case Reportes_institucion::TOP_EVALUADOS:
                $this->load->model('Catalogo_model', 'catalogo');
                //tipos de metodologia
                $tm = $this->catalogo->tipos_metodologias();
                $tipos_metodologias = [];
                foreach ($tm as $key => $value) {
                    $lang_json = json_decode($value['lang'],true);
                    $tipos_metodologias[$key] = array(
                        'id' => $value['id_tipo_metodologia'],
                        'valor' => $lang_json[$lang]
                    );
                }
                $output['tipos_metodologias'] = $tipos_metodologias;                
                $output['view_reporte'] = $this->load->view('reportes/imss/top_evaluados.php', $output, true);
                break;
            case Reportes_institucion::CALIDAD_SECCION:
                $this->load->model('Catalogo_model', 'catalogo');
                //tipos de metodologia
                $tm = $this->catalogo->secciones_evaluacion();
                $secciones = [];
                foreach ($tm as $key => $value) {
                    $lang_json = json_decode($value['descripcion'],true);
                    $secciones[$key] = array(
                        'id' => $value['id_seccion'],
                        'valor' => $lang_json[$lang]
                    );
                }
                $output['secciones'] = $secciones;                
                $output['view_reporte'] = $this->load->view('reportes/imss/calidad_seccion.php', $output, true);
                break;
                break;
        }

        $main_content = $this->load->view('reportes/imss/index.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    /**
     * Devuelve la informacion del numero total de trabajos registrados por delegacion y umae
     * @author clapas
     * @date 05/06/2018
     * @return array
     */
    public function top_delegacion_umae() {
        $umae = $this->reporteimss->top_umae();
        $data_umae = [];
        foreach ($umae as $key => $value) {
            $data_umae[$key] = array($value['nombre_unidad_principal'], $value['total']);
        }
        $delegacion = $this->reporteimss->top_delegacion();
        $data_delegacion = [];
        foreach ($delegacion as $key => $value) {
            $data_delegacion[$key] = array($value['nombre'], $value['total']);
        }
        return array(
            'umae' => $data_umae,
            'delegacion' => $data_delegacion
        );
    }

    /**
     * @author
     * @Fecha 05/06/2018
     * @description muestra información del total de investigación registrada
     * nacional y esxtranjera
     *
     */
    public function porcentaje_registro_delegacion_umae(&$output) {
        $output['data']['total_umae'] = $this->reporteimss->total_registros(true);
        $output['data']['total_delegacion'] = $this->reporteimss->total_registros(false);
        $output['data']['umae'] = $this->reporteimss->top_umae();
        $output['data']['delegacion'] = $this->reporteimss->top_delegacion();
        $output['data']['nivel_atencion'] = $this->reporteimss->top_delegacion_umae();
        return $output;
    }

    /**
     * @author
     * @Fecha 05/06/2018
     * @description muestra información del total de investigación registrada
     * nacional y esxtranjera
     *
     */
//  public function porcentaje_registro_delegacion_umae() {
//    $total_umae = $this->reporteimss->total_registros(true);
//    $total_delegacion = $this->reporteimss->total_registros(false);
//    $umae = $this->reporteimss->top_umae();
//    $data_umae = [];
//    foreach ($umae as $key => $value) {
//      if($value['total'] > 0){
//        $porcentaje = ($value['total']*100/$total_umae);
//        $data_umae[$key] = array($value['nombre_unidad_principal'],$porcentaje);
//      }
//    }
//    $delegacion = $this->reporteimss->top_delegacion();
//    $data_delegacion = [];
//    foreach ($delegacion as $key => $value) {
//      if($value['total'] > 0){
//        $porcentaje = ($value['total']*100/$total_delegacion);
//        $data_delegacion[$key] = array($value['nombre'],$porcentaje);
//      }
//    }
//    return array(
//      'umae' => $data_umae,
//      'delegacion' => $data_delegacion
//    );
//  }

    /**
     * Devuelve la informacion de la calidad de trabajos registrados por delegacion y umae
     * se toman en cuenta unicamente trabajos evaluados
     * @author clapas
     * @date 05/06/2018
     * @return array
     */
    public function calidad_delegacion_umae() {
        $umae = $this->reporteimss->calidad_umae();
        $data_umae = [];
        foreach ($umae as $key => $value) {
                $data_umae[$key] = array($value['nombre_unidad_principal'], $value['promedio']);
        }
        $delegacion = $this->reporteimss->calidad_delegacion();
        $data_delegacion = [];
        foreach ($delegacion as $key => $value) {
            if($value['promedio'] > 0){
              $data_delegacion[$key] = array($value['nombre'], $value['promedio']);
            }
        }
        return array(
            'umae' => $data_umae,
            'delegacion' => $data_delegacion
        );
    }

    /**
     * Devuelve la informacion del numero total de trabajos evaluados por tipo de metodologia
     * @author clapas
     * @date 12/08/2018
     * @param clase umae delegacion externo
     * @param value id del tipo de metodologia
     * @return array
     */
    public function evaluados_metodologia($clase, $value)
    {
        $data = [];
        switch ($clase) {
            case 'umae':
                $datos_base = $this->reporteimss->top_evaluados_umae($value);
                foreach ($datos_base as $key => $value) {
                    $data[$key] = array($value['nombre_unidad_principal'], $value['count']);
                }
                break;
            case 'delegacion':
                $datos_base = $this->reporteimss->top_evaluados_delegacion($value);
                foreach ($datos_base as $key => $value) {
                    $data[$key] = array($value['nombre'],$value['count']);
                }
                break;
            case 'externo':
                $datos_base = $this->reporteimss->top_evaluados_externos($value);
                foreach ($datos_base as $key => $value) {
                    $lang = json_decode($value['lang'],true);
                    $data[$key] = array($lang['es'], $value['count']);
                }
                break;
        }

        echo json_encode($data);
    }

    /**
     * Devuelve un listado con la calidad de los trabajos evaluados por la seccion evaluada
     * @author clapas
     * @date 15/08/2018
     * @param clase umae delegacion externo
     * @param value id de la seccion evaluada
     * @return array
     */
    public function calidad_seccion($clase, $value)
    {
        $data = [];
        switch ($clase) {
            case 'umae':
                $datos_base = $this->reporteimss->calidad_seccion_umae($value);
                foreach ($datos_base as $key => $value) {
                    $data[$key] = array($value['nombre_unidad_principal'], $value['promedio']);
                }
                break;
            case 'delegacion':
                $datos_base = $this->reporteimss->calidad_seccion_delegacion($value);
                foreach ($datos_base as $key => $value) {
                    $data[$key] = array($value['nombre'],$value['promedio']);
                }
                break;
            case 'externo':
                $datos_base = $this->reporteimss->calidad_seccion_externo($value);
                foreach ($datos_base as $key => $value) {
                    $lang = json_decode($value['lang'],true);
                    $data[$key] = array($lang['es'], $value['promedio']);
                }
                break;
        }

        echo json_encode($data);
    }
}
