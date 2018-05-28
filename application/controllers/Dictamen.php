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
			$output['data_dictamen'] = $this->revisados_asignados();
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

    /**
    * Asigna de manera manual el dictamen de un trabajo
    * @author clapas
    * @date 28/05/2018
    * @param 
    * @return json
    */
    public function asignacion_manual($folio,$sugerencia)
    {
    	$this->load->model('Dictamen_model','dictamen');
      $asig_manual = $this->tipo_asignacion()['manual'];

      if($asig_manual)
      {
	    	$this->load->model('Evaluacion_revision_model','evaluacion_revision');
	    	//$post = $this->input->post(null,true);
	    	$usuario = $this->get_datos_sesion()['id_usuario'];
	    	$asignar = true;
	    	$aceptado = true;
	    	$msg = "Ocurrio un error al actualizar la asignacion";
	    	$success = false;

	    	switch ($sugerencia) {
	    		case 'O':
	          $max_oratoria = $this->cupo()['oratoria'];
	          $actual_oratoria = $this->dictamen->count_registros_dictamen(false,'O');
	          if($actual_oratoria == $max_oratoria)
	          {
	          	$asignar = false;
	          }else
	          {
	          	$msg = "Ya no hay lugar disponible para oratoria";
	          }
	    			break;
	    		case 'C':
	          $max_cartel = $this->cupo()['cartel'];
	          $actual_cartel = $this->dictamen->count_registros_dictamen(false,'C');
	          if($actual_cartel == $max_cartel)
	          {
	          	$asignar = false;
	          }else
	          {
	          	$msg = "Ya no hay lugar disponible para cartel";
	          }
	    			break;
	    		case 'R':
	    			if($this->evaluacion_revision->guardar_historico_estado($folio,'rechazado'))
	    			{
		    			$sugerencia = null;
		    			$aceptado = false;
		    		}else
		    		{
		    			$asignar = false;
		    		}
	    			break;
	    		case 'Q':
	    			$sugerencia = null;
	    			$aceptado = null;
	    			break;
	    	}

	    	if($asignar)
	    	{
		    	$param = array(
		        'where' => array('folio'=>$folio),
		        'values' => array(
		            'sugerencia' => $sugerencia,
		            'aceptado' => $aceptado,
		            'id_usuario' => $usuario
		          )
		      );
		      if($this->dictamen->actualizar_registro($param))
		      {
		      	$msg = "Se actualizo la asignacion";
		      	$success = true;
		      }
		    }

		    return json_encode(array('success'=>$success,'msg'=>$msg));
		  }
    }

    public function pruebas()
    {
    	pr($this->cupo());
      pr($this->tipo_asignacion());
      $this->dictamen->reset_orden();
      $datos_sesion = $this->get_datos_sesion();
      pr($datos_sesion['id_usuario']);
      //pr($this->asignacion_manual('IMSS-CES-FNFIES-P-18-0001','C'));
      //pr($this->asignacion_automatica());
    }
}