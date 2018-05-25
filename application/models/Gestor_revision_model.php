<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gestor_revision_model extends MY_Model {

    const AUTOMATICO = 1, MANUAL = 2;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('LNiveles_acceso');
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function get_detalle_evaluacion($param) {
        $result = [];
        return $resut;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function get_sn_comite($param = []) {
      try
      {
          $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
          $this->db->flush_cache();
          $this->db->reset_query();
          $this->db->select(array('hr.folio folio','ti.titulo titulo','ma.lang metodologia'));
          $this->db->join('foro.trabajo_investigacion ti', 'hr.folio = ti.folio', 'left');
          $this->db->join('foro.tipo_metodologia ma', 'ti.id_tipo_metodologia = ma.id_tipo_metodologia', 'left');
          $this->db->where('clave_estado', 'sin_asignacion');
          $this->db->where('actual',true);
          if(array_key_exists('fields', $param)){
              $this->db->select($param['fields']);
          }
          if(array_key_exists('conditions', $param)){
              $this->db->where($param['conditions']);
          }
          if(array_key_exists('order', $param)){
              $this->db->order_by($param['order']['field'], $param['order']['type']);
          }
          $result = $this->db->get('foro.historico_revision hr');
          $salida = $result->result_array();
          $result->free_result();
          $this->db->flush_cache();
          $this->db->reset_query();
          $estado['success'] = true;
          $estado['msg'] = "Se obtuvo el reporte con exito";
          $estado['result'] = $salida;
      }
      catch(Exception $ex)
      {
          $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
      }

      return $estado;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function get_requiere_atencion($param = []) {
      $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
      try
      {
          $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
          $this->db->flush_cache();
          $this->db->reset_query();
          $this->db->select(array('hr.folio folio','ti.titulo titulo','ma.lang metodologia',
          '(SELECT username FROM sistema.usuarios WHERE id_usuario=rn.id_usuario) revisor',
          '(SELECT count(folio) FROM foro.historico_revision WHERE folio=hr.folio) numero_revisiones'));
          $this->db->join('foro.trabajo_investigacion ti', 'hr.folio = ti.folio','left');
          $this->db->join('foro.tipo_metodologia ma', 'ti.id_tipo_metodologia = ma.id_tipo_metodologia','left');
          $this->db->join('foro.revision rn', 'hr.folio = rn.folio','left');
          $this->db->where_in('hr.clave_estado', array('fuera_tiempo','discrepancia','conflicto_interes'));
          $this->db->where('actual',true);
          $result = $this->db->get('foro.historico_revision hr');
          $salida = $result->result_array();
          $result->free_result();
          $this->db->flush_cache();
          $this->db->reset_query();
          $estado['success'] = true;
          $estado['msg'] = "Se obtuvo el reporte con exito";
          $estado['result'] = $salida;
      }
      catch(Exception $ex)
      {
          $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
      }

      return $estado;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function get_en_revision($param = []) {
      $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
      try
      {
          $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
          $this->db->flush_cache();
          $this->db->reset_query();
          $this->db->select(array('hr.folio folio','ti.titulo titulo','ma.lang metodologia',
          "(SELECT concat(nombre,' ',apellido_paterno,' ',apellido_materno) FROM sistema.informacion_usuario WHERE id_usuario=rn.id_usuario) revisor",'hr.clave_estado',
          "CAST(rn.fecha_asignacion AS DATE) + CAST('3 days' AS INTERVAL) fecha_limite_revision"));
          $this->db->join('foro.trabajo_investigacion ti', 'hr.folio = ti.folio','left');
          $this->db->join('foro.tipo_metodologia ma', 'ti.id_tipo_metodologia = ma.id_tipo_metodologia','left');
          $this->db->join('foro.revision rn', 'hr.folio = rn.folio','left');
          $this->db->where('hr.clave_estado','asignado');
          $this->db->where('actual',true);
          $result = $this->db->get('foro.historico_revision hr');
          $salida = $result->result_array();
          $result->free_result();
          $this->db->flush_cache();
          $this->db->reset_query();
          $estado['success'] = true;
          $estado['msg'] = "Se obtuvo el reporte con exito";
          $estado['result'] = $salida;
      }
      catch(Exception $ex)
      {
          //pedir a cesar el grupo con las tradcciones
          $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
      }

      return $estado;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author Alespock
     * @date 21/05/2018
     * @return array
     */
    public function get_revisados($param = []) {
      $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
      try
      {
          $this->db->flush_cache();
          $this->db->reset_query();
          $this->db->select(array(
              "hr.folio folio", "ti.titulo titulo", "ma.lang metodologia",
              "(SELECT concat(nombre,' ',apellido_paterno,' ',apellido_materno) FROM sistema.informacion_usuario WHERE id_usuario=rn.id_usuario) revisor",
              "hr.clave_estado",
              "CASE WHEN rn.sugerencia='O' THEN 'Aceptado para exposición oral'
              WHEN rn.sugerencia='C' THEN 'Aceptado para exposición con cartel'
              WHEN rn.sugerencia='R' THEN 'Rechazado'
              END propuesta_dictamen,rn.promedio_revision"
          ));
          $this->db->from('foro.historico_revision hr');
          $this->db->join('foro.trabajo_investigacion ti', 'hr.folio = ti.folio','left');
          $this->db->join('foro.tipo_metodologia ma', 'ti.id_tipo_metodologia = ma.id_tipo_metodologia','left');
          $this->db->join('foro.revision rn', 'hr.folio = rn.folio','left');
          $this->db->where('hr.clave_estado','evaluado');
          $this->db->where("actual", TRUE);
          $result = $this->db->get();
          //pr($result);
          $salida = $result->result_array();
          $result->free_result();
          $this->db->flush_cache();
          $this->db->reset_query();
          $estado['success'] = true;
          $estado['msg'] = "Se obtuvo el reporte con exito";
          $estado['result'] = $salida;
      }
      catch(Exception $ex)
      {
          //pedir a cesar el grupo con las tradcciones
          $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
      }

      return $estado;
    }

    /**
    * Devuelve la informacion de los trabajos que han sido evaluados
    * @author clapas
    * @date 25/05/2018
    * @return array
    */
    public function get_trabajos_evaluados($param = [])
    {
      try{
        $this->db->flush_cache();
        $this->db->reset_query();

        $this->db->select(array('hr.folio','ti.titulo','tm.lang metodologia','d.promedio', 'd.sugerencia', 'd.orden'));

        $this->db->join('foro.trabajo_investigacion ti','hr.folio = ti.folio','inner');
        $this->db->join('foro.tipo_metodologia tm','ti.id_tipo_metodologia = tm.id_tipo_metodologia','inner');
        $this->db->join('foro.dictamen d','hr.folio = d.folio','inner');
        $this->db->join('foro.convocatoria c','ti.id_convocatoria = c.id_convocatoria','inner');

        $this->db->where(array('c.activo'=>true));
        
        if(isset($param['where']))
        {
          $this->db->where($param['where']);
        }

        if(isset($param['order_by']))
        {
          $this->db->order_by($param['order_by'],'desc');
        }

        $res = $this->db->get('foro.historico_revision hr');
        $this->db->flush_cache();
        $this->db->reset_query();    

        return $res->result_array();

      }catch(Exception $ex){
        return [];
      }
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author AlesSpock
     * @date 22/05/2018
     * @return array
     */
    public function get_aceptados($param = []) {
        $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
        try
        {
            $this->db->flush_cache();
            $this->db->reset_query();
            $this->db->select(array(
                "hr.folio folio", "ti.titulo titulo", "ma.lang metodologia",
                "hr.clave_estado",
                "CASE WHEN dn.tipo_exposicion='O' THEN 'Aceptado para exposición oral'
                WHEN dn.tipo_exposicion='C' THEN 'Aceptado para exposición con cartel'
                WHEN dn.tipo_exposicion='R' THEN 'Rechazado'
                END tipo_exposicion", "rn.promedio_revision"
            ));
            $this->db->from('foro.historico_revision hr');
            $this->db->join('foro.trabajo_investigacion ti', 'hr.folio = ti.folio','left');
            $this->db->join('foro.tipo_metodologia ma', 'ti.id_tipo_metodologia = ma.id_tipo_metodologia','left');
            $this->db->join('foro.revision rn', 'hr.folio = rn.folio','left');
            $this->db->join('foro.dictamen dn', 'rn.folio=dn.folio', 'left');
            $this->db->where_in("hr.clave_estado", ['aceptado_oral','aceptado_cartel']);
            $this->db->where("actual", TRUE);
            $result = $this->db->get();
            $salida = $result->result_array();
            $result->free_result();
            $this->db->flush_cache();
            $this->db->reset_query();
            $estado['success'] = true;
            $estado['msg'] = "Se obtuvo el reporte con exito";
            $estado['result'] = $salida;
        }
        catch(Exception $ex)
        {
            //pedir a cesar el grupo con las tradcciones
            $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
        }

        return $estado;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author AlesSpock
     * @date 23/05/2018
     * @return array
     */
    public function get_rechazados($param = []) {
      $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
      try
      {
          $this->db->flush_cache();
          $this->db->reset_query();
          $this->db->select(array(
            "hr.folio folio","ti.titulo titulo", "ma.lang metodologia",
            "hr.clave_estado",
            "CASE WHEN dn.tipo_exposicion='O' THEN 'Aceptado para exposición oral'
                 WHEN dn.tipo_exposicion='C' THEN 'Aceptado para exposición con cartel'
                 WHEN dn.tipo_exposicion='R' THEN 'Rechazado'
                 END AS tipo_exposicion",
            "rn.promedio_revision",
            "rn.comentario motivo"
          ));
          $this->db->from("foro.historico_revision hr");
          $this->db->join("foro.trabajo_investigacion ti", "hr.folio=ti.folio", 'left');
          $this->db->join("foro.tipo_metodologia ma", "ti.id_tipo_metodologia=ma.id_tipo_metodologia", 'left');
          $this->db->join("foro.revision rn", "hr.folio=rn.folio", 'left');
          $this->db->join("foro.dictamen dn", "rn.folio=dn.folio", 'left');
          $this->db->where("hr.clave_estado", "rechazado");
          $this->db->where("actual", TRUE);
          $result = $this->db->get();
          // pr($result);
          $salida = $result->result_array();
          $result->free_result();
          $this->db->flush_cache();
          $this->db->reset_query();
          $estado['success'] = true;
          $estado['msg'] = "Se obtuvo el reporte con exito";
          $estado['result'] = $salida;

       }
        catch(Exception $ex)
        {
            //pedir a cesar el grupo con las tradcciones
            $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
        }

        return $estado;


    }

    /**
     * Función que trae la información de un trabajo
     * de investigación con el promedio final
     * @author Cheko
     * @date 24/05/2018
     * @param String $folio folio del trabajo de investigación
     *
     */
    public function get_info_promedio_final_por_trabajo($folio = NULL){
        $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
        try
        {
            $this->db->flush_cache();
            $this->db->reset_query();
            $this->db->select(array(
                "ti.titulo","AVG(rn.promedio_revision),hr.clave_estado",
                "CASE WHEN dn.tipo_exposicion='O' THEN 'Aceptado para exposición oral'
                WHEN dn.tipo_exposicion='C' THEN 'Aceptado para exposición con cartel'
                WHEN dn.tipo_exposicion='R' THEN 'Rechazado'
                END AS tipo_exposicion"
            ));
            $this->db->join('foro.trabajo_investigacion ti', 'hr.folio = ti.folio','left');
            $this->db->join('foro.revision rn', 'hr.folio=rn.folio','left');
            $this->db->join('foro.dictamen dn', 'rn.folio=dn.folio','left');
            $this->db->where("rn.folio", $folio);
            $this->db->where("dn.aceptado", TRUE);
            $this->db->where("hr.clave_estado", 'evaluado');
            $this->db->where("actual", TRUE);
            $this->db->group_by(array('ti.titulo','rn.promedio_revision','hr.clave_estado','dn.tipo_exposicion'));
            $result = $this->db->get('foro.historico_revision hr');
            $salida = $result->result_array();
            $result->free_result();
            $this->db->flush_cache();
            $this->db->reset_query();
            $estado['success'] = true;
            $estado['msg'] = "Se obtuvo el reporte con exito";
            $estado['result'] = $salida;
        }
        catch(Exception $ex)
        {
            //pedir a cesar el grupo con las tradcciones
            $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
        }

        return $estado;
    }


    /**
     * Función que obtiene los promedios finales
     * por seccion de un trabajo de investigación
     * @author Cheko
     * @date 24/05/2018
     * @param String $folio folio del trabajo de investigación
     *
     */
    public function get_promedio_por_seccion_por_trabajo($folio = NULL){
        $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
        try
        {
            $this->db->flush_cache();
            $this->db->reset_query();
            $this->db->select(array(
                "sc.id_seccion",
                "(SELECT descripcion FROM foro.seccion WHERE id_seccion=sc.id_seccion)",
                "SUM(dr.valor)"
            ));
            $this->db->join('foro.revision rn', 'hr.folio=rn.folio','left');
            $this->db->join('foro.detalle_revision dr', 'rn.id_revision=dr.id_revision','left');
            $this->db->join('foro.seccion sc', 'dr.id_seccion=sc.id_seccion','left');
            $this->db->join('foro.dictamen dn', 'rn.folio=dn.folio','left');
            $this->db->where("rn.folio", $folio);
            $this->db->where("dn.aceptado", TRUE);
            $this->db->where("hr.clave_estado", 'evaluado');
            $this->db->where("actual", TRUE);
            $this->db->group_by('sc.id_seccion');
            $result = $this->db->get('foro.historico_revision hr');
            $salida = $result->result_array();
            $result->free_result();
            $this->db->flush_cache();
            $this->db->reset_query();
            $estado['success'] = true;
            $estado['msg'] = "Se obtuvo el reporte con exito";
            $estado['result'] = $salida;
        }
        catch(Exception $ex)
        {
            //pedir a cesar el grupo con las tradcciones
            $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
        }

        return $estado;
    }

    /**
     * Función que obtiene los revisores con
     * su información adicional de un trabajo de investigación
     * @author Cheko
     * @date 24/05/2018
     * @param String $folio folio del trabajo de investigación
     */
    public function get_revisores_por_trabajo($folio = NULL){
        $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
        try
        {
            $this->db->flush_cache();
            $this->db->reset_query();
            $this->db->select(array(
                "CONCAT(iu.nombre,' ',iu.apellido_paterno,' ',iu.apellido_materno) revisor",
                "rn.fecha_asignacion","rn.fecha_revision fecha_conclucion", "rn.promedio_revision"
            ));
            $this->db->join('foro.trabajo_investigacion ti', 'hr.folio = ti.folio','left');
            $this->db->join('foro.revision rn', 'hr.folio=rn.folio','left');
            $this->db->join('foro.dictamen dn', 'rn.folio=dn.folio','left');
            $this->db->join('sistema.informacion_usuario iu', 'rn.id_usuario=iu.id_usuario','left');
            $this->db->where("rn.folio", $folio);
            $this->db->where("dn.aceptado", TRUE);
            $this->db->where("hr.clave_estado", 'evaluado');
            $this->db->where("actual", TRUE);
            $result = $this->db->get('foro.historico_revision hr');
            $salida = $result->result_array();
            $result->free_result();
            $this->db->flush_cache();
            $this->db->reset_query();
            $estado['success'] = true;
            $estado['msg'] = "Se obtuvo el reporte con exito";
            $estado['result'] = $salida;
        }
        catch(Exception $ex)
        {
            //pedir a cesar el grupo con las tradcciones
            $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
        }

        return $estado;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author
     * @date 21/05/2018
     * @return array
     */
    public function insert_asignar_revisor($datos) {
        $resultado = array('result'=>null, 'msg'=>'', 'data'=>null);
        $this->db->trans_begin(); //Definir inicio de transacción
        $folios = implode("','", $datos['folios']);

        $validar_folios = $this->get_sn_comite(array('conditions'=>"hr.folio in ('".$folios."')")); //Validar situación y/oestado de los trabajos

        if($validar_folios['success']==true) //En caso de que se encuentren datos
        {
            $revision = $historico = array(); //Arreglo que contendrá asignaciones por añadir
            $i=0;
            foreach ($datos['usuarios'] as $key_u => $usuario) { //Se recorren los usuarios por asociar
                foreach ($validar_folios['result'] as $key_f => $folio) { //Se recorren los trabajos que fueron localizados
                    $revision[$i]['folio'] = $folio['folio'];
                    $revision[$i]['activo'] = true;
                    $revision[$i]['id_usuario'] = $usuario;
                    $i++;
                }
            }
            //pr($revision);
            $this->db->insert_batch('foro.revision', $revision); //Inserción en tabla revision

            $this->db->where("folio IN ('".$folios."')");
            $this->db->update('foro.historico_revision', array('actual'=>false)); ///Se actualiza el estado 'sin_asignacion' en el historico de la revisión

            $i=0;
            foreach ($validar_folios['result'] as $key_f => $folio) { //Se recorren los trabajos que fueron localizados
                $historico[$i]['folio'] = $folio['folio'];
                $historico[$i]['actual'] = true;
                $historico[$i]['clave_estado'] = 'asignado';
                $i++;
            }
            $this->db->insert_batch('foro.historico_revision', $historico); //Inserción en tabla historico_revision, se agrega nuevo estado para la revisión

            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $resultado['result'] = FALSE;
                $resultado['msg'] = "Ocurrió un error durante el guardado, por favor intentelo de nuevo más tarde.";
            } else {
                $this->db->trans_commit();
                //$resultado['data'] = $taller_id;
                $resultado['result'] = TRUE;
            }


        } else {
            $resultado['msg'] = 'No existen folios disponibles para la asignación, verifique el estado de los trabajos.';
        }
        return $resultado;
    }


    /**
     * Devuelve el listado de revisores registrados en la BD
     * @author JZDP
     * @date 24/05/2018
     * @return array
     */
    public function get_revisores($param = []) {
        try
        {
            $estado = array('success'=>false, 'msg'=>'', 'result'=>[]);
            $this->db->flush_cache();
            $this->db->reset_query();
            $this->db->select(array("iu.id_usuario",
                "iu.nombre", "iu.apellido_paterno", "iu.apellido_materno", "iu.institucion",
                "(SELECT COUNT(rn.id_usuario) FROM foro.revision rn WHERE rn.id_usuario=iu.id_usuario) AS revisiones_realizadas"
            ));
            $this->db->from("sistema.usuario_rol ul");
            $this->db->join("sistema.informacion_usuario iu", "ul.id_usuario=iu.id_usuario", 'left');
            $this->db->join("foro.revision rn", "iu.id_usuario=rn.id_usuario", 'left');
            $this->db->where("clave_rol IN ('".LNiveles_acceso::Revisor."', '".LNiveles_acceso::Admin."')");
            $this->db->where("ul.activo", TRUE);
            $this->db->group_by("iu.id_usuario,iu.nombre,iu.apellido_paterno,iu.apellido_materno,iu.institucion");
            $this->db->order_by("iu.nombre,iu.apellido_paterno,iu.apellido_materno,iu.institucion");
            $result = $this->db->get();
            //pr($this->db->last_query());
            $salida = $result->result_array();
            //pr($salida);
            $result->free_result();
            $this->db->flush_cache();
            $this->db->reset_query();
            $estado['success'] = true;
            $estado['msg'] = "Se obtuvo el reporte con exito";
            $estado['result'] = $salida;
        } catch(Exception $ex)
        {
            $estado = array('success'=>false, 'msg'=>'Algo salio mal', 'result'=>[]);
        }
        return $estado;
    }
}
