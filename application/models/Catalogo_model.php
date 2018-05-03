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
        if (!is_null($filtros) && !empty($filtros)) {
            foreach ($filtros as $key => $value) {
                $this->db->where($key, $value);
            }
        }
//        if (is_null($adicionales) || !isset($adicionales['oficinas_centrales']) || (isset($adicionales['oficinas_centrales']) && !$adicionales['oficinas_centrales'])) {
//            $this->db->where("clave_delegacional!= '09'");
//        }

                $this->db->order_by("nombre");
        $resultado = $this->db->get('catalogo.delegaciones');
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
    public function insert_precarga_categorias(&$datos) {
        $this->db->insert('sistema.precargas', $datos['inpcat']);
    }

    # Max ID Tabla Precargas

    public function get_id_precarga_categorias() {
        $this->db->select_max('id_precarga');
        $qidp_max = $this->db->get('sistema.precargas');
        $rid = $qidp_max->result();
        $id_precarga = $rid[0]->id_precarga;
        return $id_precarga;
    }

    # Max ID Tabla destino - categorias

    public function get_max_id_categorias() {
        $this->db->select_max('id_categoria');
        $qidc = $this->db->get('catalogo.categorias');
        $ridc = $qidc->result();
        $id_categoria = ($ridc[0]->id_categoria + 1);
        return $id_categoria;
    }

    # Obtien los Datos de CSV

    public function carga_masiva(&$csv_array, $file_data) {
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
        $id_precarga = $this->get_id_precarga_categorias();
        $id_categoria = $this->get_max_id_categorias();

        foreach ($csv_array as $row) {

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
            /* Se llena el  arreglo para Ser Insertado */
            $registros[] = $row;
            $id_categoria++;
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $resultado['result'] = FALSE;
            $registros[] = 'Error en la transaccion';
            $resultado['msg'] = "Ocurrió un error durante el guardado, por favor intentelo de nuevo más tarde.";
        } else {
            $this->db->trans_commit();
            $resultado['msg'] = 'Usuarios almacenado con éxito';
            if ($errores_presentes) {
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
    public function get_validar_registro($tabla_destino, $clave_categoria) {
        $validador = 0;
        $this->db->select('clave_categoria');
        $this->db->where('clave_categoria', $clave_categoria);
        $query = $this->db->get('catalogo.' . $tabla_destino);
        $rfila = $query->result();
        $clave_categoria = ($rfila[0]->clave_categoria);
        $validador = $clave_categoria;
        return $validador;
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
     * @author LEAS
     * @param type $idioma
     * @return type Catálogo de paises
     */
    public function get_paises() {
        $this->db->flush_cache();
        $this->db->reset_query();
        $select = array(
            "clave_pais", "lang"
        );
        $this->db->select($select);
        $result = $this->db->get('catalogo.pais')->result_array();
        $this->db->flush_cache();
        $this->db->reset_query();
//        if (!empty($result)) {
//            foreach ($result as &$value) {
//                $tmp = json_decode($value['lang'], TRUE);
//                if (isset($tmp[$idioma])) {
//                    $value['lang'] = $tmp[$idioma];
//                }
//            }
//        }
        return $result;
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

}
