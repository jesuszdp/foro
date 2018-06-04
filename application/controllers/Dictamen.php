<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion del proceso de dictamen
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class Dictamen extends General_revision {

    public function __construct() {
        $this->grupo_language_text = ['sin_comite', 'req_atencion', 'en_revision',
            'evaluado', 'aceptado', 'rechazado', 'listado_trabajo', 'generales', 'evaluacion', 'en_revision', 'mensajes', 'detalle_revision', 'detalle_trabajo', 'sugerencia','asignar_dictamen']; //Grupo de idiomas para el controlador actual
        parent::__construct();
        $this->load->model('Dictamen_model', 'dictamen');
        $this->load->model('Convocatoria_model', 'convocatoria');
    }

    /**
     * Pantalla principal
     */
    public function index() {
        $datos['mensajes'] = $this->obtener_grupos_texto('mensajes', $this->obtener_idioma())['mensajes'];
        $output['data_revisados'] = $this->revisados_sin_asignar();
        $output['data_dictamen'] = $this->revisados_asignados();
        $output['language_text'] = $this->language_text['evaluado'];
        $output['lan_text_asignacion'] = $this->language_text['asignar_dictamen'];
        $output['lan_sugerencias'] = $this->language_text['sugerencia'];
        $output['count_cartel'] = $this->dictamen->count_registros_dictamen(false, 'C');
        $output['count_oratoria'] = $this->dictamen->count_registros_dictamen(false, 'O');
        $output['config_asignacion'] = $this->tipo_asignacion();
        $output['cupo'] = $this->cupo();
        $output['cerrar_proceso_btn'] = $this->convocatoria->get_activa();

        $output['list_revisados'] = $this->load->view('revision_trabajo_investigacion/estados/lista_revisados.php', $output, true);
        $output['textos_idioma_nav'] = $this->obtener_grupos_texto('tabs_gestor', $this->obtener_idioma())['tabs_gestor'];

        $main_content = $this->load->view('revision_trabajo_investigacion/listas_gestor.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    /**
     * Procesa la informacion de los trabajos de investigacion evaluados y que no han sido asignados
     * @author AleSpock, clapas
     * @date 24/05/2018
     * @return array
     */
    private function revisados_sin_asignar() {
        $resultado = [];
        // Filtros para obtener los trabajos sin asignar
        $param = array(
            'where' => array(
                'd.folio_dictamen' => null,
                'd.sugerencia' => null
            ),
            'order_by' => 'd.promedio, ti.fecha'
        );
        $trabajo = $this->dictamen->get_trabajos_evaluados($param);
        // Obtenemos el listado de los revisores
        $param = array(
            'where' => array(
                'd.folio_dictamen' => null,
                'd.sugerencia' => null,
                'r.activo' => true
            ),
            'order_by' => 'hr.folio, r.fecha_asignacion'
        );
        $revisores = $this->dictamen->get_revisores($param);
        $resultado['success'] = true;
        $resultado['result'] = $this->combinar_trabajo_revisores($trabajo, $revisores);
        return $resultado;
    }

    /**
     *
     * @author AleSpock
     * @date 28/05/2018
     * @return array
     */
    private function combinar_trabajo_revisores($trabajo, $revisores) {
        $lang = $this->obtener_idioma();
        $sugerencias = $this->obtener_grupos_texto(array('sugerencia'), $lang);
        
        $array_resultados = [];
        if (count($trabajo) < 1) {
            return $array_resultados;
        }

        if (count($revisores) < 1) {
            return $array_resultados;
        }


        foreach ($trabajo as $key_trabajo => $value_trabajo) {
            $resultado['folio'] = $value_trabajo['folio'];
            $resultado['titulo'] = $value_trabajo['titulo'];
            $resultado['metodologia'] = $value_trabajo['metodologia'];
            $resultado['promedio'] = $value_trabajo['promedio'];
            $resultado['sugerencia'] = $value_trabajo['sugerencia'];
            $offset = 1;
            foreach ($revisores as $key_revisores => $value_revisores) {
                if ($value_revisores['folio'] == $value_trabajo['folio']) {
                    $sug = '';
                    if (trim($value_revisores['sugerencia']) != '' && isset($sugerencias['sugerencia'][$value_revisores['sugerencia']])) {
                        $sug = $sugerencias['sugerencia'][$value_revisores['sugerencia']];
                    }
                    $revisor_sugerencia = $value_revisores['nombre_revisor'] . ": " . $sug;
                    $llave = "revisor" . ($offset);
                    $offset += 1;
                    $resultado[$llave] = $revisor_sugerencia;
                }
            }
            $array_resultados[] = $resultado;
        }
        return $array_resultados;
    }

    /**
     * Procesa la informacion de los trabajos de investigacion evaluados y que ya fueron asignados
     * @author clapas
     * @date 27/05/2018
     * @return array
     */
    public function revisados_asignados() {
        $resultado = [];
        $param = null;
        // Revisamos cual es el modo de asignacion activo
        $config_asignacion = $this->tipo_asignacion();
        $manual = $config_asignacion['manual'];
        $sistema = $config_asignacion['sistema'];

        if ($sistema) { // Filtros para obtener los trabajos asignados de forma automatica
            $param = array(
                'where' => array(
                    'd.aceptado' => true
                ),
                'order_by' => 'd.promedio, ti.fecha',
                'where_in' => array('d.sugerencia', array('O', 'C'))
            );
        } elseif ($manual) { // Filtros para obtener los trabajos asignados de forma manual
            $param = array(
                'where' => array(
                    'd.aceptado' => true
                ),
                'order_by' => 'd.sugerencia', 'd.promedio','ti.fecha',
                'where_in' => array('d.sugerencia', array('O', 'C'))
            );
        }

        if (!is_null($param)) {
            $trabajo = $this->dictamen->get_trabajos_evaluados($param);
            // Obtenemos el listado de los revisores
            $param = array(
                'where' => array(
                    'd.aceptado' => true,
                    'r.activo' => true
                ),
                'order_by' => 'hr.folio, r.fecha_asignacion',
                'where_in' => array('d.sugerencia', array('O', 'C'))
            );
            $revisores = $this->dictamen->get_revisores($param);
        }
        if (isset($trabajo, $revisores)) {
            $resultado['success'] = true;
            $resultado['result'] = $this->combinar_trabajo_revisores($trabajo, $revisores);
        }
        return $resultado;
    }

    /**
     * Activa algun tipo de asignacion
     * @author clapas
     * @date 29/05/2018
     */
    public function activar_asignacion($tipo) {
        $success = $this->dictamen->activar_asignacion($tipo);

        if ($tipo == 'A') {
            $success = $this->asignacion_automatica();
        }

        header('Content-Type: application/json; charset=utf-8;');
        echo json_encode(array('success' => $success));
    }

    /**
     * Asigna de manera manual el dictamen de un trabajo
     * @author clapas
     * @date 28/05/2018
     * @param
     * @return json
     */
    public function asignacion_manual() {
        $asig_manual = $this->tipo_asignacion()['manual'];

        if ($asig_manual) {
            $this->load->model('Evaluacion_revision_model', 'evaluacion_revision');
            $post = $this->input->post(null, true);
            $folio = $post['folio'];
            $sugerencia = $post['sugerencia'];

            $usuario = $this->get_datos_sesion()['id_usuario'];
            $asignar = true;
            $aceptado = true;
            $msg = "Ocurrio un error al actualizar la asignacion";
            $success = false;

            if (!is_null($folio) && !is_null($sugerencia)) {
                switch ($sugerencia) {
                    case 'O':
                        $max_oratoria = $this->cupo()['oratoria'];
                        $actual_oratoria = $this->dictamen->count_registros_dictamen(false, 'O');
                        if ($actual_oratoria == $max_oratoria) {
                            $asignar = false;
                            $msg = "Ya no hay lugar disponible para oratoria";
                        }
                        break;
                    case 'C':
                        $max_cartel = $this->cupo()['cartel'];
                        $actual_cartel = $this->dictamen->count_registros_dictamen(false, 'C');
                        if ($actual_cartel == $max_cartel) {
                            $asignar = false;
                            $msg = "Ya no hay lugar disponible para cartel";
                        }
                        break;
                    case 'R':
                        if ($this->evaluacion_revision->guardar_historico_estado($folio, 'rechazado')) {
                            $sugerencia = null;
                            $aceptado = false;
                        } else {
                            $asignar = false;
                        }
                        break;
                    case 'Q':
                        $sugerencia = null;
                        $aceptado = null;
                        break;
                }

                if ($asignar) {
                    $param = array(
                        'where' => array('folio' => $folio),
                        'values' => array(
                            'sugerencia' => $sugerencia,
                            'aceptado' => $aceptado,
                            'id_usuario' => $usuario
                        )
                    );
                    if ($this->dictamen->actualizar_registro($param)) {
                        $msg = "Se actualizo la asignacion";
                        $success = true;
                    }
                }
            }
            header('Content-Type: application/json; charset=utf-8;');
            echo json_encode(array('success' => $success, 'msg' => $msg));
        }
    }

      
      
     

    public function cierre_convocatoria() {
      $status = false;
      $param = array(
          'where' => array(
              'd.aceptado' => true
          ),
          'order_by' => 'd.sugerencia', 'd.promedio','ti.fecha'
      );
      $trabajos = $this->dictamen->get_trabajos_evaluados($param);

      //Cambiamos el estado de los folios
      $this->load->model('Evaluacion_revision_model', 'evaluacion_revision');
      $this->load->model('Trabajo_model', 'trabajo_inv');
      $total_trabajos = $this->trabajo_inv->numero_trabajos();
      $numero = 0;

      //pr($trabajos);
      foreach ($trabajos as $key => $value) {
        $numero = $numero + 1;
        $secuencial = sprintf("%04d", $numero);
        $folio_dictamen = substr($value['folio'],0,17).$value['sugerencia'].substr($value['folio'],17,3).$secuencial;

        $status = $this->dictamen->dictaminar($value['folio'],$folio_dictamen,$value['sugerencia']);
        if($status)
        {
          $estado = 'aceptado_oral';

          if($value['sugerencia'] == 'C')
          {
              $estado = 'aceptado_cartel';
          }

          $status = $this->evaluacion_revision->guardar_historico_estado($value['folio'], $estado);
          //Enviamos un correo notificando que se acepto su trabajo
          $this->enviar_correo_dictamen(true,$value['email'],
            $datos = array(
            'folio' => $value['folio'],
            'investigador' => $value['nombre'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'],
            'titulo' => $value['titulo'],
            'total_trabajos' => $total_trabajos,
            'aceptados' => count($trabajos),
            'tipo' => ($value['sugerencia']=='O')?'exposición oral':'exposición con cartel'
            ));
          
        }
      }// for aceptados

      //Notificamos de trabajos rechazados
      $lista_rechazados = $this->dictamen->get_trabajos_rechazados_sa(array('where'=>array('hr.clave_estado'=>'rechazado')));
      //pr($lista_rechazados);
      foreach ($lista_rechazados as $key => $value) {
        $this->enviar_correo_dictamen(false,$value['email'],
            $datos = array(
            'folio' => $value['folio'],
            'investigador' => $value['nombre'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'],
            'titulo' => $value['titulo'],
            'total_trabajos' => $total_trabajos,
            'aceptados' => count($trabajos)
            ));
      }
      $lista_sa = $this->dictamen->get_trabajos_rechazados_sa(array('where'=>array('hr.clave_estado'=>'evaluado')));
      //pr($lista_sa);
      foreach ($lista_sa as $key => $value) {
        $this->enviar_correo_dictamen(false,$value['email'],
            $datos = array(
            'folio' => $value['folio'],
            'investigador' => $value['nombre'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'],
            'titulo' => $value['titulo'],
            'total_trabajos' => $total_trabajos,
            'aceptados' => count($trabajos)
            ));
      }
      

      if($status)
      {
        $this->load->model('Convocatoria_model','convocatoria');
        $this->convocatoria->estados_convocatoria(false,false);
      }
      header('Content-Type: application/json; charset=utf-8;');
      echo json_encode(array('success' => $status));
    }

    
    
    private function enviar_correo_dictamen($aceptado,$email, $datos) {
        $this->load->config('email');
        $this->load->library('My_phpmailer');
        $mailStatus = $this->my_phpmailer->phpmailerclass();
        
        /*  $mailStatus->SMTPOptions = array(
          'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
          )
          );*/
         
        $mailStatus->SMTPAuth = false;
        $emailStatus = $this->load->view('correo_foro/aceptado.php', $datos, true);
        if(!$aceptado)
        {
          $emailStatus = $this->load->view('correo_foro/rechazado.php', $datos, true);
        }

        $mailStatus->addAddress($email);
        $mailStatus->Subject = 'Dictamen de evaluacion';
        $mailStatus->msgHTML($emailStatus);
        $mailStatus->send();
        //$mail->ClearAddresses();
        //$mail->ClearAttachments();
    }

}
