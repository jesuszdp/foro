<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dictamen_model extends MY_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
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

        $this->db->where(
          array(
            'c.activo'=>true,
            'hr.clave_estado' => 'evaluado',
            'hr.actual' => true
          )
        );
        
        if(isset($param['where']))
        {
          $this->db->where($param['where']);
        }

        if(isset($param['where_in']))
        {
          $this->db->where_in($param['where_in'][0],$param['where_in'][1]);
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

    public function get_revisores($param)
    {
      try{
        $this->db->flush_cache();
        $this->db->reset_query();

        $this->db->select(array('hr.folio', 'r.id_usuario', 'r.sugerencia', 'concat(iu.nombre,iu.apellido_paterno, iu.apellido_materno) nombre_revisor', 'r.fecha_asignacion'));

        $this->db->join('foro.trabajo_investigacion ti','hr.folio = ti.folio','inner');
        $this->db->join('foro.revision r','hr.folio = r.folio','inner');
        $this->db->join('sistema.informacion_usuario iu','r.id_usuario = iu.id_usuario','left');
        $this->db->join('foro.dictamen d','hr.folio = d.folio','inner');
        $this->db->join('foro.convocatoria c','ti.id_convocatoria = c.id_convocatoria','inner');

        $this->db->where(
          array(
            'c.activo'=>true,
            'hr.clave_estado' => 'evaluado',
            'hr.actual' => true
          )
        );
        
        if(isset($param['where']))
        {
          $this->db->where($param['where']);
        }

        if(isset($param['where_in']))
        {
          $this->db->where_in($param['where_in'][0],$param['where_in'][1]);
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
     * @author 
     * @date 21/05/2018
     * @return array
     */
    public function get_detalle_dictamen($param) {
        $resut = [];
        return $resut;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author 
     * @date 21/05/2018
     * @return array
     */
    public function get_listado_dictamen($param) {
        $resut = [];
        return $resut;
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author 
     * @date 21/05/2018
     * @return array
     */
    public function insert_dictamen($param) {

        $resut = [];
        return $resut;
    }

    /**
    * Devuelve el cupo maximo
    * @author clapas
    * @date 25/05/2017
    */
    public function get_cupo()
    {
      try{
        $this->db->flush_cache();
        $this->db->reset_query();

        $this->db->where(array('llave'=>'cupo'));
        $res = $this->db->get('foro.configuracion');

        $this->db->flush_cache();
        $this->db->reset_query();    

        return $res->result_array()['0']['valor'];
      }catch(Exception $ex){
        return [];
      }
    }

    /**
    * Devuelve la configuracion de la asignacion
    * @author clapas
    * @date 25/05/2017
    */
    public function config_asignacion()
    {
      try{
        $this->db->flush_cache();
        $this->db->reset_query();

        $this->db->where(array('llave'=>'ordenamiento'));
        $res = $this->db->get('foro.configuracion');

        $this->db->flush_cache();
        $this->db->reset_query();    

        return $res->result_array()['0']['valor'];
      }catch(Exception $ex){
        return [];
      }
    }


    /**
    * Devuelve los trabajos que podran ser asignados de manera automatica
    * @author clapas
    * @date 28/05/2018
    * @param int Cantidad de trabajos a devolver
    * @param int offset, uno antes de los que se toman en cuenta
    * @return array
    */
    public function trabajos_candidatos($cupo,$offset)
    {
      try{
        $this->db->flush_cache();
        $this->db->reset_query();

        $this->db->select('d.folio');

        $this->db->join('foro.trabajo_investigacion ti','d.folio = ti.folio');
        $this->db->join('foro.convocatoria c','ti.id_convocatoria = c.id_convocatoria');

        $this->db->order_by('d.promedio, ti.fecha','desc');
        $res = $this->db->get('foro.dictamen d',$cupo_total,$offset);

      }catch(Exception $ex){
        return [];
      }
    }

    /**
    * Actualiza los trabajos evaluados
    * @author clapas
    * @date 28/05/2018
    * @param array param = (where_in, values)
    * @return boolean True si logro actualizar los datos, false en otro caso
    */
    public function actualizar_($param)
    {
      
    }

    /**
    * Borra la sugerencia y el orden de los trabajos evaluados
    * @author clapas
    * @date 28/05/2018
    * @return boolean True si logro hacer la actualizacion, false en otro caso
    */
    public function reset_orden()
    {
      $salida = false;
      $this->db->flush_cache();
      $this->db->reset_query();
      $this->db->trans_begin();

      $valores = array(
          'sugerencia'=> null,
          'orden' => null
        );

      $this->db->set($valores);
      $this->db->update('foro.dictamen');

      if ($this->db->trans_status() === FALSE)
      {
          $this->db->trans_rollback();
      } else
      {
          $this->db->trans_commit();
          $salida = true;
      }

      $this->db->flush_cache();
      $this->db->reset_query();
      return $salida; 
    }

}