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
            'evaluado', 'aceptado', 'rechazado', 'listado_trabajo', 'generales', 'evaluacion', 'en_revision', 'mensajes', 'detalle_revision', 'detalle_trabajo']; //Grupo de idiomas para el controlador actual
        parent::__construct();
        $this->load->model('Dictamen_model', 'dictamen');
    }

    /**
     * Pantalla principal
     */
    public function index() {
        $datos['mensajes'] = $this->obtener_grupos_texto('mensajes', $this->obtener_idioma())['mensajes'];
        $output['data_revisados'] = $this->revisados_sin_asignar();
        $output['data_dictamen'] = $this->revisados_asignados();
        //pr($output);
        $output['language_text'] = $this->language_text['evaluado'];
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
              'd.aceptado' => null,
              'd.sugerencia' => null
          ),
          'order_by' => 'd.promedio, ti.fecha'
      );
      /*
      $resultado['trabajos'] = $this->dictamen->get_trabajos_evaluados($param);
      // Obtenemos el listado de los revisores
      $param = array(
          'where' => array(
              'd.aceptado' => null,
              'd.sugerencia' => null,
              'r.activo' => true
          ),
          'order_by' => 'hr.folio, r.fecha_asignacion'
      );
      */
      $trabajo = $this->dictamen->get_trabajos_evaluados($param);
      // Obtenemos el listado de los revisores
      $param = array(
      		'where' => array(
      				'd.aceptado' => null,
      				'd.sugerencia' => null,
      				'r.activo' => true
      			),
      		'order_by' => 'hr.folio, r.fecha_asignacion'
      	);
      $revisores = $this->dictamen->get_revisores($param);
      $resultado['success'] = 'success';
      $resultado['result'] = $this->combinar_trabajo_revisores($trabajo, $revisores);
      return $resultado;
    }


    /**
     *
     * @author AleSpock
     * @date 28/05/2018
     * @return array
     */
    private function combinar_trabajo_revisores($trabajo, $revisores)
    {
    	pr($revisores);
    	pr($trabajo);
        /*TEST*/
        /*
        $trabajo = [];
        $revisores = [];
        $trabajo[] = [
            'hr.folio'=> 'ABCD3',
            'hr.titulo'=> 'Titulo 1',
            'metodologia'=> 'Cuantitativa',
            'promedio'=> '8',
        ];
        $trabajo[] = [
            'hr.folio'=> '12345',
            'hr.titulo'=> 'Titulo 2',
            'metodologia'=> 'Cualitativa',
            'promedio'=> '4',
        ];
        $trabajo[] = [
            'hr.folio'=> '1324',
            'hr.titulo'=> 'Titulo 3',
            'metodologia'=> 'Cuantitativa',
            'promedio'=> '10',
        ];
        $revisores = [];
        $revisores[] = [
            'hr.folio' => 'ABCD3',
            'nombre_revisor' => 'Juan Pérez',
            'r.sugerencia' => 'Oratoria'
        ];
        $revisores[] = [
            'hr.folio' => 'ABCD3',
            'nombre_revisor' => 'Pablo Juarez',
            'r.sugerencia' => 'Oratoria'
        ];
        $revisores[] = [
            'hr.folio' => 'ABCD3',
            'nombre_revisor' => 'Carla Hernandez',
            'r.sugerencia' => 'Oratoria'
        ];
        $revisores[] = [
            'hr.folio' => '12345',
            'nombre_revisor' => 'Juan Pérez',
            'r.sugerencia' => 'Cartel'
        ];
        $revisores[] = [
            'hr.folio' => '12345',
            'nombre_revisor' => 'Pablo Juarez',
            'r.sugerencia' => 'Oratoria'
        ];
        $revisores[] = [
            'hr.folio' => '12345',
            'nombre_revisor' => 'Carla Hernandez',
            'r.sugerencia' => 'Oratoria'
        ];
        $revisores[] = [
            'hr.folio' => '1324',
            'nombre_revisor' => 'Juan Pérez',
            'r.sugerencia' => 'Oratoria'
        ];
        $revisores[] = [
            'hr.folio' => '1324',
            'nombre_revisor' => 'jose Pérez',
            'r.sugerencia' => 'Cartel'
        ];
        $revisores[] = [
            'hr.folio' => '1324',
            'nombre_revisor' => 'Carla Hernandez',
            'r.sugerencia' => 'Cartel'
        ];

        /*TEST*/

        $array_resultados = [];
        if (count($trabajo) < 1)
        {
            return $array_resultados;
        }

        if (count($revisores) < 1)
        {
            return $array_resultados;
        }


        foreach ($trabajo as $key_trabajo => $value_trabajo)
        {
            $resultado['folio'] = $value_trabajo['folio'];
            $resultado['titulo'] = $value_trabajo['titulo'];
            $resultado['metodologia'] = $value_trabajo['metodologia'];
            $resultado['promedio'] = $value_trabajo['promedio'];
            $resultado['sugerencia'] = $value_trabajo['sugerencia'];
            $offset = 1;
            foreach ($revisores as $key_revisores => $value_revisores)
            {
                if($value_revisores['folio'] == $value_trabajo['folio'])
                {
                    $revisor_sugerencia = $value_revisores['nombre_revisor'] . ": " . $value_revisores['sugerencia'];
                    $llave = "revisor".($offset);
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
                'order_by' => 'd.orden',
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
        if (isset ($trabajo, $revisores))
            {
              $resultado['success'] = 'success';
              $resultado['result'] = $this->combinar_trabajo_revisores($trabajo, $revisores);

            }



        return $resultado;
    }

    /**
     * Asigna de manera manual el dictamen de un trabajo
     * @author clapas
     * @date 28/05/2018
     * @param
     * @return json
     */
    public function asignacion_manual($folio, $sugerencia) {
        $this->load->model('Dictamen_model', 'dictamen');
        $asig_manual = $this->tipo_asignacion()['manual'];

        if ($asig_manual) {
            $this->load->model('Evaluacion_revision_model', 'evaluacion_revision');
            //$post = $this->input->post(null,true);
            $usuario = $this->get_datos_sesion()['id_usuario'];
            $asignar = true;
            $aceptado = true;
            $msg = "Ocurrio un error al actualizar la asignacion";
            $success = false;

            switch ($sugerencia) {
                case 'O':
                    $max_oratoria = $this->cupo()['oratoria'];
                    $actual_oratoria = $this->dictamen->count_registros_dictamen(false, 'O');
                    if ($actual_oratoria == $max_oratoria) {
                        $asignar = false;
                    } else {
                        $msg = "Ya no hay lugar disponible para oratoria";
                    }
                    break;
                case 'C':
                    $max_cartel = $this->cupo()['cartel'];
                    $actual_cartel = $this->dictamen->count_registros_dictamen(false, 'C');
                    if ($actual_cartel == $max_cartel) {
                        $asignar = false;
                    } else {
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

            return json_encode(array('success' => $success, 'msg' => $msg));
        }
    }

    public function pruebas() {
        pr($this->cupo());
        pr($this->tipo_asignacion());
        $this->dictamen->reset_orden();
        $datos_sesion = $this->get_datos_sesion();
        pr($datos_sesion['id_usuario']);
        //pr($this->asignacion_manual('IMSS-CES-FNFIES-P-18-0001','C'));
        //pr($this->asignacion_automatica());
    }

    public function cierre_convocatoria() {
        $main = "";
        $this->template->setMainContent($main);
        $this->template->getTemplate();
    }

    // public function modal_confirmación(){
    //     $output = $this->load->view('revision_trabajo_investigacion/estados/modal/modal_confirmacion.php', $output, );
    //     echo $output;
    //
    //
    // }

}
