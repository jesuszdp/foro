<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la revisión de los trabajos de investigación
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class Evaluacion extends General_revision {

    const SECCIONES_EVALUACION_OPCIONES = "seleccion_opcion_evaluacion_", EVALUACION_CALIFICACION = "evaluacion_calificacion_";

    function __construct() {
        $this->grupo_language_text = ['generales', 'evaluacion']; //Grupo de idiomas para el controlador actual
        parent::__construct();
        $this->load->library('Form_complete');
        $this->load->model("Evaluacion_revision_model", "evaluacion");
    }

    /**
     * @author LEAS
     * @Fecha 21/05/2018
     * @param type $folio
     * @description genera el espacio de la evaluación
     *
     */
    public function nueva_evaluacion_revision($folio = null) {
        $id_usuario = $this->get_datos_sesion(En_datos_sesion::ID_USUARIO);
//        pr($this->get_datos_sesion(En_datos_sesion::ID_USUARIO));

        $output['language_text'] = $this->language_text;
        $this->obtener_idioma();
        if (!is_null($folio)) {
            $this->load->model('Trabajo_model', 'trabajo');
            $output['datos'] = $this->trabajo->trabajo_investigacion_folio($folio, null);
            if (!empty($output['datos'])) {
                $acceso_revisar_investigacion = $this->valida_acceso_revisar_investigacion($folio, $id_usuario);
                if (!$acceso_revisar_investigacion) {
                    $output['datos'] = $output['datos'][0]; //Accede a la información de los datos de la investigación
//                    pr($output['datos']);
                    $output['trabajo_investigacion'] = $this->get_detalle_investigacion(null, $output['datos']); //Cargara la vista de trabajo de investigación
                    $output['evaluacion'] = $this->get_vista_evaluacion(null, $output['datos']['id_tipo_metodologia']);
                    $main = $this->load->view('revision_trabajo_investigacion/evaluacion_trabajo_investigacion.php', $output, true);
                } else {
                    $main = $this->load->view('revision_trabajo_investigacion/no_trabajo_valido.php', $output, true);
                }
            } else {//No existe el trabajo de investigación con dicho folio
                $main = $this->load->view('revision_trabajo_investigacion/no_trabajo_valido.php', $output, true);
//                pr("Hola");
            }
//        echo $main;
        } else {
            $main = $this->load->view('revision_trabajo_investigacion/no_trabajo_valido.php', $output, true);
        }
        $this->template->setMainContent($main);
        $this->template->getTemplate();
    }

    /**
     * 
     * @author LEAS
     * @Fecha 25/05/2018
     * @param type $folio
     * @param type $id_usuario
     * @return boolean true si tiene acceso a evaluar lainvestigación
     * Valida que no se encuentre 
     */
    private function valida_acceso_revisar_investigacion($folio, $id_usuario) {
        $detalle_revision = $this->evaluacion->get_detalle_revision($folio, $id_usuario);
//        pr($detalle_revision);
        if (!empty($detalle_revision)) {
            $data = $detalle_revision[0];
            if ($data['revisado'] == true || $data['dentro_fecha_limite'] == 0) {//Sin acceso
                return FALSE;
            }
            return TRUE;
        }
        return FALSE;
    }

    private function get_vista_evaluacion($secciones = null, $tipo_metodologia = 1) {
        $output['language_text'] = $this->language_text;
        $param = array(
            "where" => ['id_tipo_metodologia' => null],
            "or_where_in" => ['id_tipo_metodologia' => $tipo_metodologia]
        );
//                pr($this->language_text);
        if (is_null($secciones)) {
            $output['secciones'] = $this->evaluacion->get_secciones($param, $this->obtener_idioma());
        } else {
            $output['secciones'] = $secciones;
        }
        $output['opciones_secciones'] = $this->evaluacion->get_secciones_detalle($param, $this->obtener_idioma());
//                pr($output['opciones_secciones']);
//                pr($output['detalle']);
        return $this->load->view('revision_trabajo_investigacion/evaluacion.php', $output, true);
    }

    public function pruebas($folio) {
        $this->evaluacion->actualizar_estado_evaluacion($folio);
    }

    public function guardar_evaluacion() {
        $param = array(
            "where" => ['id_tipo_metodologia' => null],
            "or_where_in" => ['id_tipo_metodologia' => $this->input->post("tipo_metodologia", null)]
        );
        $secciones = $this->evaluacion->get_secciones($param, $this->obtener_idioma());
//        pr($this->input->post());
        if ($this->input->post()) {//valida post
            $data = $this->input->post(null, true);
            $id_user = $this->get_datos_sesion(En_datos_sesion::ID_USUARIO);
            if (!is_null($this->input->post('conflicto', true)) && !is_null($this->input->post("educativo", true))) {//No tiene conflicto de interes y tambien es tema educativo
                $this->carga_validaciones('valida_evaluacion_revision', $secciones);
                if ($this->form_validation->run() == TRUE) {
                    $output = $this->guarda_evaluacion_revision($secciones);
                } else {
                    
                }
            } else {//Guarda la evaluación con confricto de interes o es de caracter de interes
                $output = $this->guarda_conflicto_tema_educativo();
            }
        }
        $output['data'] = $data;
        $html = $this->get_vista_evaluacion($secciones, $this->input->post("tipo_metodologia", null));
        $output['html'] = $html;

        echo json_encode($output);
    }

    private function carga_validaciones($name_val, $secciones_validacion = null) {
        $this->config->load('form_validation'); //Cargar archivo con validaciones
        $this->load->library('Form_validation'); //Cargar archivo con validaciones
        $validations = $this->config->item($name_val); //Obtener validaciones de archivo general
        $val_tmp = [];
//        pr($secciones_validacion);
        /**
         * Obtiene las validaciones que dependen de las secciones
         */
        if (!is_null($secciones_validacion)) {
            foreach ($validations as $key_validaciones => $value_validaciones) {
                if ($key_validaciones == Evaluacion::EVALUACION_CALIFICACION || $key_validaciones == Evaluacion::SECCIONES_EVALUACION_OPCIONES) {
                    foreach ($secciones_validacion as $valor_secciones) {
                        $array_seccion = $validations[$key_validaciones];
                        $array_seccion['field'] = $array_seccion['field'] . $valor_secciones['id_seccion'];
                        $array_seccion['label'] = $valor_secciones['descripcion'];
                        $array_seccion['rules'] = str_replace('{seccion}', $valor_secciones['id_seccion'], $array_seccion['rules']);
                        $val_tmp[] = $array_seccion;
                    }
                } else {
                    $val_tmp[] = $value_validaciones;
                }
            }
        }
        //Elimina las obciones que dependen de las opciones, ya que en realidad unicamente cirven para saber que validaciones deben aplicarse 
        $this->form_validation->set_rules($val_tmp);
    }

    /**
     * @author LEAS
     * @Fecha 24/05/2018
     * @description actualiza el estado de la revisión 
     *
     */
    private function actualizar_estado_revision() {
        
    }

    private function guarda_evaluacion_revision($secciones) {
//        pr("tema de conflicto o sin tema de salud");
        $folio = $this->input->post('folio', true);
        $id_user = $this->get_datos_sesion(En_datos_sesion::ID_USUARIO);
        $detalle_revision = $this->evaluacion->get_detalle_revision($folio, $id_user);
        $data_post = $this->input->post(null, true);
        $datos = [];

        $suma_calificacion = 0;
        $total_secciones = 0;
        /* Obtiene las secciones */
        foreach ($secciones as $value) {
            $calificacion = (int) $data_post[Evaluacion::EVALUACION_CALIFICACION . $value['id_seccion']];
            $datos['detalle_revision'][] = array(
                "id_revision" => $detalle_revision[0]['id_revision'],
                "id_opcion" => $data_post[Evaluacion::SECCIONES_EVALUACION_OPCIONES . $value['id_seccion']],
                "id_seccion" => $value['id_seccion'],
                "valor" => $calificacion,
            );
            $suma_calificacion += $calificacion;
            $total_secciones += 1;
        }

        $prom = $suma_calificacion / $total_secciones;
        $educativo = (!is_null($this->input->post('educativo', true)));
        $conflicto = (is_null($this->input->post('conflicto', true)));
        $datos['folio'] = $folio;
        $datos['revision'] = [
            'datos' => array(
                'promedio_revision' => $prom,
                'sugerencia' => $data_post['tipo_exposicion_eval'],
                'comentario' => $data_post['observaciones_eval'],
                'tema_educacion' => true,
                'conflicto_interes' => FALSE,
                'fecha_revision' => 'now()',
                'revisado' => true,
                "tema_educacion" => $educativo,
                "conflicto_interes" => $conflicto,
            ),
            "condicion" => array(
                "id_revision" => $detalle_revision[0]['id_revision'],
            )
        ];
        return $this->evaluacion->guardar_evaluacion($datos, $this->language_text);
    }

    private function guarda_conflicto_tema_educativo() {
//        pr("evaluación general");
        $folio = $this->input->post('folio', true);
        $id_user = $this->get_datos_sesion(En_datos_sesion::ID_USUARIO);
        $educativo = (!is_null($this->input->post('educativo', true)));
        $conflicto = (is_null($this->input->post('conflicto', true)));
        $datos = [
            "tema_educacion" => $educativo,
            "conflicto_interes" => $conflicto,
            "revisado" => true
        ];
        return $this->evaluacion->update_conflicto_sn_tema_educacion($folio, $id_user, $datos, $this->language_text);
    }

}
