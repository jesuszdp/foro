<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version   : 1.0.0
 * @author      : LEAS
 * */
class Gestion_revision extends General_revision {

    const SN_COMITE = 1, REQ_ATENCION = 2, EN_REVISION = 3,
            REVISADOS = 4, ACEPTADOS = 5, RECHAZADOS = 6;

    function __construct() {
        $this->grupo_language_text = ['sin_comite', 'req_atencion', 'en_revision',
            'evaluado', 'aceptado', 'rechazado', 'listado_trabajo', 'generales', 'evaluacion', 'en_revision', 'mensajes', 'detalle_revision', 'detalle_trabajo']; //Grupo de idiomas para el controlador actual
        parent::__construct();
        $this->load->library('form_complete', 'security');
        $this->load->helper('date');
        $this->load->model('Gestor_revision_model', 'gestion_revision');
    }

    /**
     * @author LEAS
     * @Fecha 21/05/2018
     * @param type $folio
     * @description genera el espacio de la evaluación
     *
     */
    public function listado_control($tipo = Gestion_revision::SN_COMITE) {
        $datos['mensajes'] = $this->obtener_grupos_texto('mensajes', $this->obtener_idioma())['mensajes'];
        switch ($tipo) {
            case Gestion_revision::SN_COMITE:
                $datos['data_sn_comite'] = $this->sn_comite();
                $datos['opciones_secciones'] = $this->obtener_grupos_texto('sin_comite', $this->obtener_idioma())['sin_comite'];
                $output['list_sn_comite'] = $this->load->view('revision_trabajo_investigacion/estados/lista_sin_comite.php', $datos, true);
                break;
            case Gestion_revision::REQ_ATENCION:
                $datos['data_req_atencion'] = $this->requiere_atencion();
                $datos['opciones_secciones'] = $this->obtener_grupos_texto('req_atencion', $this->obtener_idioma())['req_atencion'];
                $output['list_req_atencion'] = $this->load->view('revision_trabajo_investigacion/estados/lista_requiere_atencion.php', $datos, true);
                break;
            case Gestion_revision::EN_REVISION:
                $datos['data_en_revision'] = $this->en_revision();
                $datos['opciones_secciones'] = $this->obtener_grupos_texto('en_revision', $this->obtener_idioma())['en_revision'];
                $output['list_en_revision'] = $this->load->view('revision_trabajo_investigacion/estados/lista_en_revision.php', $datos, true);
                break;
            case Gestion_revision::REVISADOS:
                $output['data_revisados'] = $this->revisados_sin_asignar();
                //pr($output);
                $output['language_text'] = $this->language_text['evaluado'];
                $output['list_revisados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_revisados.php', $output, true);
                break;
            case Gestion_revision::ACEPTADOS:
                $datos['data_aceptados'] = $this->aceptados();
                $datos['opciones_secciones'] = $this->obtener_grupos_texto('aceptado', $this->obtener_idioma())['aceptado'];
                $output['lista_aceptados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_aceptados.php', $datos, true);
                break;
            case Gestion_revision::RECHAZADOS:
                $output['data_rechazados'] = $this->rechazados();
                //pr($datos);
                $output['opciones_secciones'] = $this->obtener_grupos_texto('rechazado', $this->obtener_idioma())['rechazado'];
                $output['language_text'] = $this->language_text['rechazado'];
                $output['list_rechazados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_rechazados.php', $output, true);
                break;
            default :
                $datos['data_sn_comite'] = $this->sn_comite();
                $datos['opciones_secciones'] = $this->obtener_grupos_texto('sin_comite', $this->obtener_idioma())['sin_comite'];
                $output['list_sn_comite'] = $this->load->view('revision_trabajo_investigacion/estados/lista_sin_comite.php', $datos, true);
                break;
        }
        $output['textos_idioma_nav'] = $this->obtener_grupos_texto('tabs_gestor', $this->obtener_idioma())['tabs_gestor'];
        $main_content = $this->load->view('revision_trabajo_investigacion/listas_gestor.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    private function sn_comite() {
        $lenguaje = obtener_lenguaje_actual();
        $respuesta_model = $this->gestion_revision->get_sn_comite(array('order' => 'folio asc'));
        $result = array('success' => $respuesta_model['success'], 'msg' => $respuesta_model['msg'], 'result' => []);
        foreach ($respuesta_model['result'] as $row) {
            $result['result'][$row['folio']]['folio'] = $row['folio'];
            $result['result'][$row['folio']]['titulo'] = $row['titulo'];
            $metodologia = json_decode($row['metodologia'], true);
            $result['result'][$row['folio']]['metodologia'] = $metodologia[$lenguaje];
        }
        return $result;
    }

    private function requiere_atencion() {
        $lenguaje = obtener_lenguaje_actual();
        $dias_revision = $this->get_dias_revision();
        $respuesta_model = $this->gestion_revision->get_requiere_atencion(array('order' => 'folio asc, id_revision asc'), $dias_revision);
        $result = array('success' => $respuesta_model['success'], 'msg' => $respuesta_model['msg'], 'result' => []);
        foreach ($respuesta_model['result'] as $row) {
            $result['result'][$row['folio']]['folio'] = $row['folio'];
            $result['result'][$row['folio']]['titulo'] = $row['titulo'];
            $result['result'][$row['folio']]['clave_estado'] = $row['clave_estado'];
            $result['result'][$row['folio']]['revisores'][$row['id_usuario']]['revisor'] = $row['revisor'];
            $result['result'][$row['folio']]['revisores'][$row['id_usuario']]['activo'] = $row['activo'];
            //$result['result'][$row['folio']]['revisores'][$row['id_usuario']]['clave_estado'] = ($row['revisado']==true) ? 'Revisado' : 'Sin revisar';
            $estado_revisor = $this->get_estado_revisor($row);
            $result['result'][$row['folio']]['revisores'][$row['id_usuario']]['clave_estado'] = $estado_revisor['estado_actual_revisor'];
            $result['result'][$row['folio']]['mostrar'][] = $estado_revisor['bandera'];
            $result['result'][$row['folio']]['revisores'][$row['id_usuario']]['fecha_limite_revision'] = $row['fecha_limite_revision'];
            $metodologia = json_decode($row['metodologia'], true);
            $result['result'][$row['folio']]['metodologia'] = $metodologia[$lenguaje];
            $result['result'][$row['folio']]['numero_revisiones'] = $row['numero_revisiones'];
        }
        return $result;
    }

    private function en_revision() {
        $array_incidencias = [En_estado_revision::CONFLICTO_INTERES => 1, En_estado_revision::DISCREPANCIA => 1];
        $lenguaje = obtener_lenguaje_actual();
        $dias_revision = $this->get_dias_revision();
        $respuesta_model = $this->gestion_revision->get_en_revision(array('order' => 'folio asc, id_revision asc'), $dias_revision);
        $result = array('success' => $respuesta_model['success'], 'msg' => $respuesta_model['msg'], 'result' => []);
//        pr($respuesta_model);
        foreach ($respuesta_model['result'] as $row) {
            $result['result'][$row['folio']]['folio'] = $row['folio'];
            $result['result'][$row['folio']]['titulo'] = $row['titulo'];
            $estado_incidencia = (isset($array_incidencias[$row['clave_estado']])) ? $row['clave_estado'] . " " : "";
            $result['result'][$row['folio']]['clave_estado'] = ($row['fuera_tiempo'] == 1 && $row['revisado'] == 0 ) ? $estado_incidencia . En_estado_revision::FUERA_TIEMPO : $row['clave_estado'];
//            pr($result['result'][$row['folio']]['clave_estado']);
//            pr($row['clave_estado']);
//            pr(strpos($result['result'][$row['folio']]['clave_estado'], $row['clave_estado']));
            if ($row['fuera_tiempo'] == 1 && $row['revisado'] == FALSE && strpos($result['result'][$row['folio']]['clave_estado'], En_estado_revision::FUERA_TIEMPO) === FALSE) {
                $result['result'][$row['folio']]['clave_estado'] .= " " . En_estado_revision::FUERA_TIEMPO;
            } else {
                if (strpos($result['result'][$row['folio']]['clave_estado'], $row['clave_estado']) === FALSE) {
                    $result['result'][$row['folio']]['clave_estado'] .= " " . $row['clave_estado'];
                }
            }
            $result['result'][$row['folio']]['revisores'][$row['id_usuario']]['revisor'] = $row['revisor'];
            $result['result'][$row['folio']]['revisores'][$row['id_usuario']]['revisado'] = $row['revisado'];
            $result['result'][$row['folio']]['revisores'][$row['id_usuario']]['clave_estado'] = ($row['revisado'] == true) ? 'Revisado' : 'Sin revisar';
            $result['result'][$row['folio']]['revisores'][$row['id_usuario']]['fecha_limite_revision'] = $row['fecha_limite_revision'];
            $metodologia = json_decode($row['metodologia'], true);
            $result['result'][$row['folio']]['metodologia'] = $metodologia[$lenguaje];
        }
        return $result;
    }

    private function aceptados() {
        $lenguaje = obtener_lenguaje_actual();
        $respuesta_model = $this->gestion_revision->get_aceptados();
        $result = array('success' => $respuesta_model['success'], 'msg' => $respuesta_model['msg'], 'result' => []);
        foreach ($respuesta_model['result'] as $row) {
            $result['result'][$row['folio']]['folio'] = $row['folio'];
            $result['result'][$row['folio']]['titulo'] = $row['titulo'];
            $metodologia = json_decode($row['metodologia'], true);
            $result['result'][$row['folio']]['metodologia'] = $metodologia[$lenguaje];
            $result['result'][$row['folio']]['tipo_exposicion'] = isset($row['tipo_exposicion']) ? $row['tipo_exposicion'] : "";
            $result['result'][$row['folio']]['promedio_revision'] = isset($row['promedio_revision']) ? $row['promedio_revision'] : "";
        }
        return $result;
    }

    private function rechazados() {
        $lenguaje = obtener_lenguaje_actual();
        $respuesta_model = $this->gestion_revision->get_rechazados();
        $result = array('success' => $respuesta_model['success'], 'msg' => $respuesta_model['msg'], 'result' => []);
        foreach ($respuesta_model['result'] as $row) {
            $result['result'][$row['folio']]['folio'] = $row['folio'];
            $result['result'][$row['folio']]['titulo'] = $row['titulo'];
            $metodologia = json_decode($row['metodologia'], true);
            $result['result'][$row['folio']]['metodologia'] = $metodologia[$lenguaje];
        }
        return $result;
    }

    /**
     * @author Cheko
     * @date 21/05/2018
     * @param type $id - identificador del trabajo de investigación
     * @description Función que muestra la vista del resumen de un trabajo de investigación
     */
    public function ver_resumen($idFolio = NULL) {
        $folio = decrypt_base64($idFolio);
        //$folio = $idFolio;
        $output['language_text'] = $this->language_text;
        $output['trabajo_investigacion'] = $this->get_detalle_investigacion($folio);
        //pr($output['trabajo_investigacion']);
        $output['idioma'] = $this->obtener_grupos_texto('detalle_revision', $this->obtener_idioma())['detalle_revision'];
        $output['promedioFinal'] = $this->gestion_revision->get_info_promedio_final_por_trabajo($folio);
//        pr($this->language_text['evaluado']);
//        pr($this->language_text['evaluado']);
        //pr($output['promedioFinal']);
        $output['revisores'] = $this->gestion_revision->get_revisores_por_trabajo($folio);
        $output['tablaSeccion'] = $this->gestion_revision->get_promedio_por_seccion_por_trabajo($folio);
//        pr($output['tablaSeccion']);
        //pr($output);
        $main_content = $this->load->view('revision_trabajo_investigacion/resumen_trabajo_investigacion.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    /**
     * @author AleSpock
     * @date 21/05/2018
     * @param
     * @description Función que muestra la vista de los estados en la administracion de gestor de revisores
     */
    public function trabajos_investigacion_evaluacion_gestor() {
        $this->listado_control('SN_COMITE');

        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    /**
     * @author JZDP
     * @Fecha 23/05/2018
     * @param string $folio Identificador del trabajo de investigación
     * @description Genera el listado de revisores disponibles para la asignación de trabajo de investigación en la sección 'Sin comite'
     *
     */
    public function asignar_revisor() {
        if ($this->input->is_ajax_request()) { //Validar que se realice una petición ajax
            if ($this->input->post()) { //Se valida que se envien datos
                $folios = $this->input->post(null, true); //Obtener valores enviados por usuario y limpiarlos
                $datos['folios_enc'] = $folios; //Enviar datos a vista
                $datos['folios'] = array_map("decrypt_base64", $folios); //Desencriptar identificadores de trabajos
                $datos['revisores'] = $this->gestion_revision->get_revisores()['result']; //Obtener listado de revisores

                $this->load->view('revision_trabajo_investigacion/asignar_revisor.php', $datos);
            }
        }
    }

    /**
     * @author JZDP
     * @Fecha 23/05/2018
     * @param string $folio Identificador del trabajo de investigación
     * @description Genera el listado de revisores disponibles para la asignación de trabajo de investigación en la sección 'Requiere Atención'
     *
     */
    public function asignar_revisor_requiere_atencion($param) {
        if ($this->input->is_ajax_request()) { //Validar que se realice una petición ajax
            if (isset($param) && !empty($param)) { //Se valida que se envien datos
                $folios = $this->security->xss_clean($param); ///Limpiar parámetro
                $datos['folios_enc'] = array($folios);
                $datos['folios'] = array(decrypt_base64($folios)); //Desencriptar identificadores de trabajos
                $condiciones = array('conditions' => "iu.id_usuario not in (select id_usuario from foro.revision r1 where r1.folio='" . decrypt_base64($folios) . "')"); //Generar condiciones para mostrar revisores.
                $datos['revisores'] = $this->gestion_revision->get_revisores($condiciones)['result']; ///Obtener listado de revisores

                $datos['numero_revisores_remplazar'] = $this->validar_numero_revisores_remplazar(decrypt_base64($folios));
                $this->load->view('revision_trabajo_investigacion/asignar_revisor_requiere_atencion.php', $datos);
            }
        }
    }

    /**
     * Genera el listado de revisores disponibles para la asignación de trabajo de investigación en la sección 'En revision'
     * @author clapas
     * @date 13/06/2018
     * @param string $folio Identificador del trabajo de investigación
     * @param int $id_usuario Id de usuario del revisor que se desea modificar
     *
     */
    public function asignar_revisor_en_revision($folio, $revisor) {
        if ($this->input->is_ajax_request()) { //Validar que se realice una petición ajax
            if (isset($folio) && !empty($folio)) { //Se valida que se envien datos
                $folio = $this->security->xss_clean($folio); ///Limpiar parámetro
                $revisor = $this->security->xss_clean($revisor); ///Limpiar parámetro
                $datos['folio_enc'] = $folio;
                $datos['usuario_anterior'] = $revisor;
                $datos['folio'] = decrypt_base64($folio); //Desencriptar identificadores de trabajos
                $condiciones = array('conditions' => "iu.id_usuario not in (select id_usuario from foro.revision r1 where r1.folio='" . decrypt_base64($folio) . "')"); //Generar condiciones para mostrar revisores.
                $datos['revisores'] = $this->gestion_revision->get_revisores($condiciones)['result']; ///Obtener listado de revisores
                $this->load->view('revision_trabajo_investigacion/asignar_revisor_en_revision.php', $datos);
            }
        }
    }

    /**
     * @author JZDP
     * @Fecha 25/05/2018
     * @param string $folio Identificador del trabajo de investigación
     * @description Obtiene el número de revisores a remplazar por trabajo
     *
     */
    private function validar_numero_revisores_remplazar($folio) {
        $dias_revision = $this->get_dias_revision();
        ///Obtener datos de las revisiones
        $revisores = $this->gestion_revision->get_requiere_atencion(array('conditions' => "hr.folio = '" . $folio . "'"), $dias_revision);
        //pr($revisores);
        $numero_revisores = 0;
        foreach ($revisores['result'] as $key_r => $revisor) {
            if ($revisor['activo'] == true) { ///Validamos solo revisiones activas
                if ($revisor['revisado'] == false) { //En caso de que no se hayan realizado las revisiones
                    if ($revisor['fuera_tiempo'] == true) {
                        //$estado_actual_revisor = 'Fuera de tiempo';
                        $numero_revisores++;
                    }
                } else { ///Si se realizaron las revisiones
                    if ($revisor['conflicto_interes'] == true) {
                        $numero_revisores++;
                    } else {
                        if ($revisor['clave_estado'] == 'discrepancia') {
                            $numero_revisores+=.5;
                        }
                    }
                }
            }
        }
        //pr($numero_revisores);
        return $numero_revisores;
    }

    private function get_estado_revisor($registro) {
        //pr($registro);
        //$lenguaje = obtener_lenguaje_actual();
        $estado_actual_revisor = '';
        $bandera = 0;
        if ($registro['revisado'] == false) {
            if ($registro['fuera_tiempo'] == true) {
                $estado_actual_revisor = 'Fuera de tiempo';
                $bandera++;
            } else {
                $estado_actual_revisor = 'Sin revisión';
            }
        } else {
            if ($registro['conflicto_interes'] == true) {
                $estado_actual_revisor = 'Conflicto de intereses';
                $bandera++;
            } else {
                if ($registro['clave_estado'] == 'discrepancia') {
                    $estado_actual_revisor = 'Discrepancia';
                    $bandera++;
                } else {
                    $estado_actual_revisor = 'Revisado';
                }
            }
        }
        //pr($bandera);
        $resultado['estado_actual_revisor'] = $estado_actual_revisor;
        $resultado['bandera'] = $bandera;

        return $resultado;
    }

    /**
     * @author JZDP
     * @Fecha 23/05/2018
     * @param string $folio Identificador del trabajo de investigación
     * @description Genera el listado de revisores disponibles para la asignación de trabajo de investigación
     *
     */
    public function asignar_revisor_bd() {
        if ($this->input->is_ajax_request()) { //Validar que se realice una petición ajax
            if ($this->input->post()) { //Se valida que se envien datos
                //pr($this->input->post());
                $id = $this->input->post(null, true);
                $datos['usuarios'] = array_map("decrypt_base64", $id['usuarios']); ///Obtener identificadores de usuarios
                $datos['folios'] = array_map("decrypt_base64", explode(',', $id['folios'])); //Obtener identificadores de folios
                $datos['resultado'] = $this->gestion_revision->insert_asignar_revisor($datos);
                //print_r($id);
                //pr($datos);
                $this->load->view('revision_trabajo_investigacion/asignar_revisor_bd.php', $datos);
            }
        }
    }

    /**
     * @author JZDP
     * @Fecha 23/05/2018
     * @param string $folio Identificador del trabajo de investigación
     * @description Genera el listado de revisores disponibles para la asignación de trabajo de investigación
     *
     */
    public function asignar_revisor_requiere_atencion_bd() {
        if ($this->input->is_ajax_request()) { //Validar que se realice una petición ajax
            if ($this->input->post()) { //Se valida que se envien datos
                //pr($this->input->post());
                $id = $this->input->post(null, true);
                $datos['usuarios'] = array_map("decrypt_base64", $id['usuarios']); ///Obtener identificadores de usuarios
                $datos['folios'] = array_map("decrypt_base64", explode(',', $id['folios'])); //Obtener identificadores de folios
                $datos['resultado'] = $this->gestion_revision->insert_asignar_revisor_requiere_atencion($datos);
                //print_r($id);
                //pr($datos);
                $this->load->view('revision_trabajo_investigacion/asignar_revisor_requiere_atencion_bd.php', $datos);
            }
        }
    }

    /**
     * Realiza el cambio de revisor para los trabajos que no se hayan revisado
     * @author clapas
     * @date 13/06/2018
     */
    public function asignar_revisor_en_revision_bd() {
        $datos['resultado'] = array('result' => null, 'msg' => 'Hubo un problema, inténtelo de nuevo', 'data' => null);
        if ($this->input->is_ajax_request()) { //Validar que se realice una petición ajax
            if ($this->input->post()) { //Se valida que se envien datos
                //pr($this->input->post());
                $post = $this->input->post(null, true);
                $datos['usuario_nuevo'] = decrypt_base64($post['usuario_nuevo']); ///Obtener identificadores de usuarios
                $datos['usuario_anterior'] = decrypt_base64($post['usuario_anterior']);
                $datos['folio'] = decrypt_base64($post['folio']); //Obtener identificadores de folios
                //pr($datos);
                $resultado = $this->gestion_revision->insert_asignar_revisor_en_revision($datos);
                if ($resultado) {
                    $datos['resultado'] = array('result' => $resultado, 'msg' => 'Se reasigno correctamente el revisor', 'data' => null);
                }
                $this->load->view('revision_trabajo_investigacion/asignar_revisor_en_revision_bd.php', $datos);
            }
        }
    }

    /**
     * @author LEAS
     * @Fecha 20/07/2018
     * @descripcion Permite que se vuelva a evaluar un trabajo de investigacion
     */
    public function evaluar_nuevamente() {
//        pr($this->input->post(null, true));
        if ($this->input->post(null, true)) {//Valida que sea post
            $this->load->model("Evaluacion_revision_model", "evaluacion");
            $post = $this->input->post(null, true);
            $language = $this->language_text['rechazado'];
            $succes = $this->evaluacion->reevaluacion_trabajo_investigacion($post['folio'], $language);
//            pr($succes);
            $result = json_encode($succes);
            echo $result;
        }
    }

}
