<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion del proceso de dictamen
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class Dictamen extends General_revision {
	public function __construct() {
        $this->grupo_language_text = ['sin_comite','req_atencion','en_revision',
        'evaluado','aceptado','rechazado','listado_trabajo','generales','evaluacion', 'en_revision','mensajes','detalle_revision','detalle_trabajo']; //Grupo de idiomas para el controlador actual
        parent::__construct();
        $this->load->model('Dictamen_model','dictamen');
    }

    /**
    * Pantalla principal
    */
    public function index()
    {
      $datos['mensajes'] = $this->obtener_grupos_texto('mensajes', $this->obtener_idioma())['mensajes'];
      $output['data_revisados'] = $this->revisados_sin_asignar();
      //pr($output);
      $output['language_text'] =  $this->language_text['evaluado'];
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
    private function revisados_sin_asignar() 
    {
    	$resultado = [];
      // Filtros para obtener los trabajos sin asignar
      $param = array(
          'where' => array(
              'd.aceptado' => null,
              'd.sugerencia' => null
            ),
          'order_by' => 'd.promedio, ti.fecha'
        );
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
      $resultado['revisores'] = $this->dictamen->get_revisores($param);
      //pr($resultado);
      return $resultado;
    }


    /**
    * Procesa la informacion de los trabajos de investigacion evaluados y que ya fueron asignados
    * @author clapas 
    * @date 27/05/2018
    * @return array
    */
    public function revisados_asignados()
    {
    	$resultado = [];
    	$param = null;
    	// Revisamos cual es el modo de asignacion activo
    	$config_asignacion = $this->tipo_asignacion();
    	$manual = $config_asignacion['manual'];
    	$sistema = $config_asignacion['sistema'];

    	if($sistema)
    	{ // Filtros para obtener los trabajos asignados de forma automatica
    		$param = array(
          'where' => array(
              'd.aceptado' => true
            ),
          'order_by' => 'd.promedio, ti.fecha',
          'where_in' => array('d.sugerencia',array('O','C'))
        );
    	}elseif ($manual) 
    	{ // Filtros para obtener los trabajos asignados de forma manual
    		$param = array(
          'where' => array(
              'd.aceptado' => true
            ),
          'order_by' => 'd.orden',
          'where_in' => array('d.sugerencia',array('O','C'))
        );
    	}
      
      if(!is_null($param))
      {
      	$resultado['trabajos'] = $this->dictamen->get_trabajos_evaluados($param);
      	// Obtenemos el listado de los revisores
	      $param = array(
	      		'where' => array(
	      				'd.aceptado' => true,
	      				'r.activo' => true
	      			),
	      		'order_by' => 'hr.folio, r.fecha_asignacion',
	      		'where_in' => array('d.sugerencia',array('O','C'))
	      	);
	      $resultado['revisores'] = $this->dictamen->get_revisores($param);
      }

    	//pr($resultado);
    	return $resultado;
    }

    public function pruebas()
    {
    	pr($this->cupo());
      pr($this->tipo_asignacion());
      pr($this->asignacion_automatica());
    }
}