<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogo_model extends MY_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    /**
     * Devuelve la información de los registros de la tabla catalogos
     * @author CPMS
     * @date 21/07/2017
     * @return array
     */
    public function get_catalogos() {
        $resutado = $this->db->get('catalogo.catalogo');
        return $resutado->result_array();
    }

    /**
     *
     * @author LEAS
     * @fecha 18/05/2017
     * @return type catálogo de las delegaciones
     */
    public function get_delegaciones($filtros = [], $adicionales = []) {
        $this->db->flush_cache();
        $this->db->reset_query();
        $select = array(
            'clave_delegacional', 'nombre',
        );
        $this->db->select($select);
        $this->db->where('activo', TRUE);
        if(!is_null($filtros) && !empty($filtros))
        {
            foreach ($filtros as $key => $value)
            {
                $this->db->where($key,$value);
            }
        }
        if(is_null($adicionales) || !isset($adicionales['oficinas_centrales']) || (isset($adicionales['oficinas_centrales']) &&  !$adicionales['oficinas_centrales']))
        {
            $this->db->where("clave_delegacional!= '09'");
        }

        $resultado = $this->db->get('catalogo.delegaciones');
//            pr($this->db->last_query());
        return $resultado->result_array();
    }

    /**
     * @author LEAS
     * @fecha 18/05/2017
     * @return catálogo del estado civil de una  persona
     */
    public function get_estado_civil() {

        $select = array(
            'id_estado_civil', 'estado_civil',
        );
        $this->db->select($select);

        $resultado = $this->db->get('catalogo.estado_civil');
//            pr($this->db->last_query());
        return $resultado->result_array();
    }

    public function opciones_combos($combo, $idcombo, $base) {
        /* select id_elemento_seccion, nombre from catalogo.elementos_seccion where id_seccion=1 and id_catalogo_elemento_padre=5 */

        $resultado = array();

        switch ($combo) {

            case "formacion_prof_prof": {
                    $opc = '';
                    $select = array(
                        'id_elemento_catalogo', 'label'
                    );

                    //$this->db->where('id_seccion',$id_seccion);
                    $this->db->where('id_catalogo_elemento_padre', $idcombo);

                    $this->db->order_by('label', 'asc');

                    $resultado = $this->db->get('catalogo.elementos_catalogos');
                    if ($resultado->num_rows() > 0) {
                        $secciones = $resultado->result_array();
                        foreach ($secciones as $index => $value) {
                            $opc[$value['id_elemento_catalogo']] = $value['label'];
                        }
                    }

                    break;
                }

            case "rama_conocimiento": {
                    $opc = '';
                    $select = array(
                        'id_elemento_catalogo', 'label'
                    );

                    //$this->db->where('id_seccion',$id_seccion);
                    $this->db->where('id_catalogo_elemento_padre', $idcombo);

                    $this->db->order_by('label', 'asc');

                    $resultado = $this->db->get('catalogo.elementos_catalogos');
                    if ($resultado->num_rows() > 0) {
                        $secciones = $resultado->result_array();
                        foreach ($secciones as $index => $value) {
                            $opc[$value['id_elemento_catalogo']] = $value['label'];
                        }
                    }

                    break;
                }

            case "cseccion": {
                    $opc = '';
                    $select = array(
                        'id_elemento_seccion', 'label'
                    );

                    $this->db->where('id_catalogo_elemento_padre', Null);
                    $this->db->where('id_seccion', $idcombo);

                    $this->db->order_by('label', 'asc');

                    $resultado = $this->db->get('catalogo.elementos_seccion');
                    if ($resultado->num_rows() > 0) {
                        $secciones = $resultado->result_array();
                        foreach ($secciones as $index => $value) {
                            $opc[$value['id_elemento_seccion']] = $value['label'];
                        }
                    }

                    break;
                }


            case "c_elem_seccion": {
                    $opc = '';
                    $select = array(
                        'id_elemento_seccion', 'label'
                    );

                    //$this->db->where('id_seccion',$id_seccion);
                    $this->db->where('id_catalogo_elemento_padre', $idcombo);

                    $this->db->order_by('label', 'asc');

                    $resultado = $this->db->get('catalogo.elementos_seccion');
                    if ($resultado->num_rows() > 0) {
                        $secciones = $resultado->result_array();
                        foreach ($secciones as $index => $value) {
                            $opc[$value['id_elemento_seccion']] = $value['label'];
                        }
                    }

                    break;
                }

            case "c_elem_subseccion": {
                    $opc = '';
                    $select = array(
                        'id_elemento_seccion', 'label'
                    );

                    //$this->db->where('id_seccion',$id_seccion);
                    $this->db->where('id_catalogo_elemento_padre', $idcombo);

                    $this->db->order_by('label', 'asc');

                    $resultado = $this->db->get('catalogo.elementos_seccion');
                    if ($resultado->num_rows() > 0) {
                        $secciones = $resultado->result_array();
                        foreach ($secciones as $index => $value) {
                            $opc[$value['id_elemento_seccion']] = $value['label'];
                        }
                    }

                    break;
                }



            case "tipo_form_complementaria": {
                    $opc = '';
                    $select = array(
                        'id_elemento_catalogo', 'label'
                    );

                    //$this->db->where('id_seccion',$id_seccion);
                    $this->db->where('id_catalogo_elemento_padre', $idcombo);

                    $this->db->order_by('label', 'asc');

                    $resultado = $this->db->get('catalogo.elementos_catalogos');
                    if ($resultado->num_rows() > 0) {
                        $secciones = $resultado->result_array();
                        foreach ($secciones as $index => $value) {
                            $opc[$value['id_elemento_catalogo']] = $value['label'];
                        }
                    }

                    break;
                }
        }





        return $opc;
    }

    /**
     * @author LEAS
     * @fecha 29/05/2017
     * @param type $clave_categoria Clave de la categoria del empleado o docente en el IMSS
     * @return array vacio en el caso de no encontrar datos decategoria del docente o del empleado,ç
     * si no, retorna informacion generales de la categoria
     */
    public function get_datos_categoria($clave_categoria) {
        $this->db->where('clave_categoria', $clave_categoria);
        $resultado = $this->db->get('catalogo.categorias');
        return $resultado->result_array();
    }

   /**
     * Modelo que Llena Precarga y Detalle Precarga
     * @author Lima
     * @param  $datos Guarda Datos Precarga
     * @param  $data  Guarda Datos Detalle Precarga
     * @param  $csv_array  Contiene datos del CSV
     * @param  $file_data  Contiene datos del Archivo
     */
     # Funcion que Inserta en Categorias
    public function insert_precarga_categorias(&$datos)
    {
        $this->db->insert('sistema.precargas',$datos['inpcat']);
    }
     # Max ID Tabla Precargas
    public function get_id_precarga_categorias()
    {
        $this->db->select_max('id_precarga');
        $qidp_max = $this->db->get('sistema.precargas');
        $rid = $qidp_max->result();
        $id_precarga = $rid[0]->id_precarga;
        return $id_precarga;
    }
     # Max ID Tabla destino - categorias
    public function get_max_id_categorias()
    {
        $this->db->select_max('id_categoria');
              $qidc = $this->db->get('catalogo.categorias');
              $ridc = $qidc->result();
        $id_categoria = ($ridc[0]->id_categoria + 1);
        return $id_categoria;
    }
     # Insertar en Detalle ID
    public function insert_detalle_precargas(&$data)
    {
       $this->db->insert('sistema.detalle_precargas',$data['cat_msv']);
    }
     # Obtien los Datos de CSV
    public function carga_masiva(&$csv_array,$file_data)
    {
        $this->db->flush_cache();
        $this->db->reset_query();
        $this->db->trans_begin(); //Definir inicio de transacción
        $registros = [];
        $errores_presentes = false;

        # Precarga Master inpcat = Inserta Precarga Master Categoria
        $datos['inpcat'] = array(
            'fecha' => date("Y-m-d H:i:s"),
            'id_usuario' => 1,
            'nombre_archivo' => $file_data['file_name'],
            'peso' => $file_data['file_size'],
            'modelo' => 'Catalogo_model',
            'funcion' => 'insertar_elementos_categorias');

        $this->insert_precarga_categorias($datos);
        $id_precarga  = $this->get_id_precarga_categorias();
        $id_categoria = $this->get_max_id_categorias();

        foreach ($csv_array as $row)
        {

        #'id_categoria' => $id_categoria,
        $datos = array('nombre' => $row['nombre'],
                       'id_grupo_categoria' => $row['id_grupo_categoria'],
                       'categoria_por_perfil' => $row['categoria_por_perfil'],
                       'clave_categoria' => $row['clave_categoria'],
                       'fecha' => date("Y-m-d H:i:s"),
                       'subcategoria' => $row ['subcategoria'],
                       'activa' => $row['activa'],
                       'id_subcategoria' => $row['id_subcategoria']
                        );
        $json = json_encode($datos);
        # Datos Para detalle Categoria
        $data['cat_msv'] = array(
              'id_precarga' => $id_precarga,
              'detalle_registro' => $json,
              'status' => 'SIN REALIZAR',
              'tabla_destino' => 'categorias',
              'id_tabla_destino' => $id_categoria);
         $this->insert_detalle_precargas($data);

             // $this->in_categoria_mas($data);
            /*Se llena el  arreglo para Ser Insertado*/
            $registros[] = $row;
        $id_categoria++;

        }

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $resultado['result'] = FALSE;
            $registros[] = 'Error en la transaccion';
            $resultado['msg'] = "Ocurrió un error durante el guardado, por favor intentelo de nuevo más tarde.";
        } else
        {
            $this->db->trans_commit();
            $resultado['msg'] = 'Usuarios almacenado con éxito';
            if ($errores_presentes)
            {
                $resultado['msg'] = 'Se presentaron errores durante el registro';
            }
            $resultado['result'] = TRUE;
        }
        $resultado['data'] = $registros;
        //pr($resultado);
        return $resultado;
    }

    /**
     * Funcion que inserta en la tabla catalogo.categorias
     * @author Lima
     * @param Array $datos Arreglo de datos a insertar
     * @return Array $status Estatus de la insercion
     *
     */


    public function get_validar_registro($tabla_destino,$clave_categoria)
    {
        $validador = 0;
        $this->db->select('clave_categoria');
        $this->db->where('clave_categoria',$clave_categoria);
        $query = $this->db->get('catalogo.'.$tabla_destino);
        $rfila = $query->result();
        $clave_categoria = ($rfila[0]->clave_categoria);   
        $validador = $clave_categoria;
        return $validador;
    }
    
    public function update_registro_revisado(&$revisado,$id_detalle_precarga)
    {  
    $this->db->where('id_detalle_precarga',$id_detalle_precarga);
    $this->db->update('sistema.detalle_precargas', $revisado);
    }
    
    public function insertar_elementos_categorias($datos)
    {
        $status = array('success' => false, 'message' => 'Nombre de tabla incorrecto', 'data'=>[]);
        $tabla_destino = $datos['tabla_destino'];
        $insertarDatos = json_decode($datos['detalle_registro'], true);
        $clave_categoria = $insertarDatos['clave_categoria'];
        $id_detalle_precarga = $datos['id_detalle_precarga'];
        
        $this->db->flush_cache();
        $this->db->reset_query();
        try
        {
        
                    $validador = $this->get_validar_registro($tabla_destino,$clave_categoria);

                if($validador == $clave_categoria)
                {
                 
                $revisado = array('status' => 'FALLA',
                                  'descripcion_status' => 'El Registro ya Existe'); 
                $this->update_registro_revisado($revisado,$id_detalle_precarga);

                } else {
                
                // Si no Existe el Registro Inserta en Categorias
                $resultado_insertar = $this->insert_registro('catalogo.'.$tabla_destino,$insertarDatos);
                $revisado = array('status' => 'OK',
                                  'descripcion_status' => 'El Registro Insertado'); 
                $this->update_registro_revisado($revisado,$id_detalle_precarga);          

                }
        }
        catch(Exception $ex)
        {

        }

        $this->db->reset_query();
        return $status;
        
    }

    /**
     *
     * @author LEAS
     * @fecha 29/05/2017
     * @param type $clave_adscripcion Clave de adscripción del departamento donde se
     * labora el docente,
     * @return array vacio, en el caso de que no encuentre datos de departamento,
     * si no, retorna datos del departamento
     *
     */
    public function get_datos_departamento($clave_adscripcion) {
        $this->db->where('clave_departamental', $clave_adscripcion);
        $resultado = $this->db->get('catalogo.departamentos_instituto');
        return $resultado->result_array();
    }

    /**
     *
     * @author TEZH
     * @fecha 29/06/2017
     * @param Listado de listado de validaciones
     *
     */
    public function get_listado_reglas($params = null) {

        $opc = array();


        if (isset($params['rules'])) {

            $this->db->where_in('id_rules_validaciones ', $params['rules']);
        }


        $this->db->order_by('orden', 'asc');

        $resultado = $this->db->get('catalogo.lista_rules_validaciones');


        $resul = $resultado->result_array();

        foreach ($resul as $index => $value) {
            $opc[$value['id_rules_validaciones']] = $value['label'];
        }

        return $opc;
    }

    public function get_listado_callback_opciones($params = null) {
        $opciones = array();

        if (isset($params['callback'])) {
            $this->db->where_in('id_callback', $params['rules']);
        }

        $this->db->order_by('label', 'asc');
        $resultado = $this->db->get('ui.callback');
        $resultado = $resultado->result_array();

        foreach ($resultado as $key => $value) {
            $opciones[$value['id_callback']] = $value['label'];
        }

        return $opciones;
    }

    /**
     *
     * @author TEZH
     * @fecha 29/06/2017
     * @param Listado de listado de validaciones
     *
     */
    public function get_listado_excepciones_opciones($params = null) {

        $opc = array();


        if (isset($params['id_catalogo'])) {

            $this->db->where_in('id_catalogo ', $params['id_catalogo']);
        }
        $this->db->order_by('label', 'asc');

        $resultado = $this->db->get('catalogo.elementos_catalogos');

        //pr($this->db->last_query().$params['rules']);
        $resul = $resultado->result_array();

        foreach ($resul as $index => $value) {
            $opc[$value['id_elemento_catalogo']] = $value['label'];
        }

        return $opc;
    }

    /**
     *
     * @author TEZH
     * @fecha 29/06/2017
     * @param Listado de listado de validaciones
     *
     */
    public function get_listado_campos_dependientes($params = null) {

        $opc = array();


        if (isset($params['id_campo'])) {

            $this->db->where_in('id_campo ', $params['id_campo']);
        }
        $this->db->order_by('label', 'asc');

        $resultado = $this->db->get('ui.campo');

        //pr($this->db->last_query().$params['rules']);
        $resul = $resultado->result_array();

        foreach ($resul as $index => $value) {
            $opc[$value['nombre']] = $value['label'];
        }

        return $opc;
    }

    /**
     * @author LEAS
     * @Fecha 03/08/2017
     * @param type $id_catalogo identificador del catalogo a buscar
     * @param type $str cadena de busqueda
     * @param type $igual indica que va a traer unicamente la cadena que coinsida con el criterio o no
     * true = si, puede obtener vacio o uno
     * False = si, puede traer vacio o muchos
     */
    public function get_busca_opciones_catalogo($id_catalogo, $str, $igual = FALSE) {
        $str = str_replace(' ', '', $str);
        if ($igual) {
            $this->db->where("(replace(translate(lower(label), 'áéíóúü','aeiouu'),' ', ''))='" . $str . "'", null);
            $this->db->or_where("(replace(lower(label), ' ', '')) ='" . $str . "'", NULL);
            $this->db->where("id_catalogo", $id_catalogo);
        } else {
            $this->db->like("(replace(translate(lower(label), 'áéíóúü','aeiouu'),' ', ''))", $str);
            $this->db->or_like("(replace(lower(label), ' ', ''))", $str);
            $this->db->where("id_catalogo", $id_catalogo);
        }
        $select = array("id_elemento_catalogo", "label");

        $this->db->order_by("label");
        $this->db->select($select);
        $resultado = $this->db->get("catalogo.elementos_catalogos");

        return $resultado->result_array();
    }

    public function get_registros($nombre_tabla = null, &$params = [])
    {
        //pr($params);
        if(is_null($nombre_tabla ))
        {
            return [];
        }
        $this->db->flush_cache();
        $this->db->reset_query();
        if (isset($params['total']))
        {
            $select = 'count(*) total';
        } else if (isset($params['select']))
        {
            $select = $params['select'];
        } else
        {
            $select = '*';
        }
        $this->db->select($select);
        if (isset($params['join']))
        {
            foreach ($params['join'] as $value)
            {
                $this->db->join($value['table'], $value['condition'], $value['type']);
            }
        }
        if (isset($params['where']))
        {
            foreach ($params['where'] as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        if(isset($params['like']))
        {
            foreach ($params['like'] as $key => $value)
            {
                $this->db->like($key, $value);
            }
        }
//        $this->db->where('date(fecha) = current_date', null, false);
        if (isset($params['limit']) && isset($params['offset']) && !isset($params['total']))
        {
            $this->db->limit($params['limit'], $params['offset']);
        } else if (isset($params['limit']) && !isset($params['total']))
        {
            $this->db->limit($params['limit']);
        }

        $query = $this->db->get($nombre_tabla);
        $salida = $query->result_array();
        $query->free_result();
        //pr($this->db->last_query());
        $this->db->flush_cache();
        $this->db->reset_query();
        return $salida;
    }

    public function insert_registro($nombre_tabla = null, &$params = [], $return_last_id = true)
    {
        $this->db->flush_cache();
        $this->db->reset_query();
        $status = array('success' => false, 'message' => 'Nombre de tabla incorrecto', 'data'=>[]);
        if(is_null($nombre_tabla ))
        {
            return $status;
        }

        try
        {
            $this->db->insert($nombre_tabla, $params);
            $status['success'] = true;
            $status['message'] = 'Agregado con éxito';
            if($return_last_id)
            {
                $status['data'] = array('id_elemento' => $this->db->insert_id());
            }
        }catch(Exception $ex)
        {

        }
        return $status;
    }

    /**
     * Funcion que agrega un registro siempre obteniendo el id maximo de
     * la tabla y con ese ID+1 se guardan los registros
     * @author Sergio
     * @param type $nombre_tabla nombre de la tabla a insertar
     * @param type $params parametros para insertar en la tabla
     * @param boolean $return_last_id si quieres gresar el id del registro guardado
     * @return type $status mensaje del estatus del registro guardado
     *
     */
    public function insert_registro_set_id($nombre_tabla = null, &$params = [], $return_last_id = true)
    {
        $this->db->flush_cache();
        $this->db->reset_query();
        $status = array('success' => false, 'message' => 'Nombre de tabla incorrecto', 'data'=>[]);
        if(is_null($nombre_tabla ))
        {
            return $status;
        }

        try
        {
            $maximo = $this->db->query('select max(id_elemento_catalogo)+1 maximo from catalogo.elementos_catalogos')->result_array()[0]['maximo'];
            $this->db->query("select setval('catalogo.elementos_catalogos_id_elemento_catalogo_seq',{$maximo},true)");
            $this->db->insert($nombre_tabla, $params);
            $status['success'] = true;
            $status['message'] = 'Agregado con éxito';
            if($return_last_id)
            {
                $status['data'] = array('id_elemento' => $this->db->insert_id());
            }
        }catch(Exception $ex)
        {

        }
        return $status;
    }

    public function update_registro($nombre_tabla = null, &$params = [], $where_ids = [])
    {
        $this->db->flush_cache();
        $this->db->reset_query();
        $status = array('success' => false, 'message' => 'Nombre de tabla incorrecto', 'data'=>[]);
        if(is_null($nombre_tabla ))
        {
            return $status;
        }
        try
        {
            $this->db->update($nombre_tabla, $params, $where_ids);
            $status['success'] = true;
            $status['message'] = 'Actualizado con éxito';
        }catch(Exception $ex)
        {

        }
        return $status;
    }

    public function delete_registros($nombre_tabla = null, $where_ids = [])
    {
        $this->db->flush_cache();
        $this->db->reset_query();
        $status = array('success' => false, 'message' => 'Nombre de tabla incorrecto', 'data'=>[]);
        if(is_null($nombre_tabla ))
        {
            return $status;
        }
        try
        {
            foreach ($where_ids as $key => $value)
            {
                $this->db->where($key, $value);
            }
            $this->db->delete($nombre_tabla);
            $status['success'] = true;
            $status['message'] = 'Eliminado con éxito';
        }catch(Exception $ex)
        {

        }
        $this->db->reset_query();
        return $status;
    }

    /**
     * Funcion que inserta especificamente elementos de un
     * catalogo
     * @author Cheko
     * @param Array $datos Arreglo de datos a insertar
     * @return Array $status Estatus de la insercion
     *
     */
    public function insertar_elementos_catalogos($datos)
    {
        $status = array('success' => false, 'message' => 'Nombre de tabla incorrecto', 'data'=>[]);
        $insertarDatos = json_decode($datos['detalle_registro'], true);
        //$insertarDatos['activo'] = $insertarDatos['activo'] == 'true' ? true : false;
        //$insertarDatos['is_validado'] = $insertarDatos['is_validado'] == 'true' ? true : false;
        $insertarDatos['tipo'] = NULL;
        $this->db->flush_cache();
        $this->db->reset_query();
        try
        {
            $resultado_insertar = $this->insert_registro_set_id('catalogo.'.$datos['tabla_destino'],$insertarDatos);
            if($resultado_insertar['success'])
            {
                $params['status'] = 'OK';
                $params['id_tabla_destino'] = $resultado_insertar['data']['id_elemento'];
                $where_ids['id_detalle_precarga'] = $datos['id_detalle_precarga'];
                $actualizar_detalle_carga = $this->update_registro('sistema.detalle_precargas', $params, $where_ids);
                $status['success'] = true;
                $status['message'] = 'Agregado con exito';
                $status['data'] = array("Insertar" => $resultado_insertar, "Actualizar" => $actualizar_detalle_carga);
            }
            else
            {
              $params['status'] = 'SIN REALIZAR';
              $params['id_tabla_destino'] = $resultado_insertar['data']['id_elemento'];
              $where_ids['id'] = $datos['id_detalle_precarga'];
              $actualizar_detalle_carga = $this->update_registro('sistema.detalle_precargas', $params, $where_ids);
              $status['success'] = false;
              $status['message'] = 'No se agrego el registro';
              $status['data'] = array("Insertar" => $resultado_insertar, "Actualizar" => $actualizar_detalle_carga);
            }
        }
        catch(Exception $ex)
        {

        }

        $this->db->reset_query();
        return $status;
    }

    /**
     * Funcion que inserta especificamente cusos
     * @author Cheko
     * @param Array $datos Arreglo de datos a insertar
     * @return Array $status Estatus de la insercion
     *
     */
    public function insertar_cursos($datos)
    {
        $status = array('success' => false, 'message' => 'Nombre de tabla incorrecto', 'data'=>[]);
        $insertarDatos = json_decode($datos['detalle_registro'], true);
        //$insertarDatos['activo'] = $insertarDatos['activo'] == 'true' ? true : false;
        //$insertarDatos['is_validado'] = $insertarDatos['is_validado'] == 'true' ? true : false;
        $insertarDatos['tipo'] = NULL;
        $this->db->flush_cache();
        $this->db->reset_query();
        try
        {
          $resultado_insertar = $this->insert_registro_set_id('catalogo.'.$datos['tabla_destino'],$insertarDatos);
          if($resultado_insertar['success'])
          {
              $params['status'] = 'OK';
              $params['id_tabla_destino'] = $resultado_insertar['data']['id_elemento'];
              $where_ids['id'] = $datos['id_detalle_precarga'];
              $actualizar_detalle_carga = $this->update_registro('sistema.detalle_precargas', $params, $where_ids);
              $status['success'] = true;
              $status['message'] = 'Eliminado con éxito';
              $status['data'] = array("Insertar" => $resultado_insertar, "Actualizar" => $actualizar_detalle_carga);
          }
          else
          {
              $params['status'] = 'OK';
              $params['id_tabla_destino'] = $resultado_insertar['data']['id_elemento'];
              $where_ids['id'] = $datos['id_detalle_precarga'];
              $actualizar_detalle_carga = $this->update_registro('sistema.detalle_precargas', $params, $where_ids);
              $status['success'] = false;
              $status['message'] = 'No se agrego el registro';
              $status['data'] = array("Insertar" => $resultado_insertar, "Actualizar" => $actualizar_detalle_carga);
          }
        }
        catch(Exception $ex)
        {

        }

        $this->db->reset_query();
        return $status;
    }

	public function get_estados_validacion_censo() {
        $this->db->flush_cache();
        $this->db->reset_query();
        $this->db->where("activo", true);
        $this->db->select(array("id_validacion_registro id", "nombre label"));
        $result = $this->db->get("ui.validacion_registro")->result_array();
        return $result;
    }
}
