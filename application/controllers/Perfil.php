<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Modulo
 *
 * @author chrigarc
 */
class Perfil extends MY_Controller {

    const INTERNOS = 'internos', EXTERNOS = 'externos', REGISTRO_USUARIO = "registro_usuario";

    function __construct() {
        $this->grupo_language_text = ['registro_usuario', 'sesion']; //Grupo de idiomas para el controlador actual
        parent::__construct();
//        $this->load->model('Modulo_model', 'modulo');
    }

    public function index() {
        
    }

    public function editar() {
        $this->load->library('form_complete');
        $this->load->model('Usuario_model', 'usuario');
        $this->load->model('Catalogo_model', 'catalogo');
        $user_sesion = $this->get_datos_sesion();
        $es_imss = $this->get_datos_sesion(En_datos_sesion::ES_IMSS);

        if ($es_imss) {//Edición imsss
            $config['select_validation'] = "form_registro_usuario_internos";
            $config['ruta_registro'] = "sesion/registro_internos.php";
            $config['tipo_registro'] = Usuario_model::SIAP;
            $output['tipo_registro'] = Perfil::INTERNOS;
        } else {//Es un externo
            $config['select_validation'] = "form_registro_usuario_externos";
            $config['ruta_registro'] = "sesion/registro_externos.php";
            $config['tipo_registro'] = Usuario_model::NO_IMSS;
            $output['tipo_registro'] = Perfil::EXTERNOS;
        }
//        pr($output);exit();
        $output['delegaciones'] = dropdown_options($this->catalogo->get_delegaciones(null, null), 'clave_delegacional', 'nombre');
        $output['paises'] = dropdown_options($this->catalogo->get_paises(), "clave_pais", "lang", $this->obtener_idioma());
        $output['language_text'] = $this->language_text;
        $output['post'] = $this->input->post(null, TRUE);
        $main_content = $this->load->view($config['ruta_registro'], $output, TRUE);

        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
//        if (!is_null($tipo_registro)) {
////      
////            $output["texts"] = $this->lang->line('formulario'); //textos del formulario
//            $this->config->load('form_validation'); //Cargar archivo con validaciones
//            $validations = $this->config->item($config['select_validation']); //Obtener validaciones de archivo general
//            $this->set_textos_campos_validacion($validations, $this->language_text[Inicio::REGISTRO_USUARIO]); //Modifica los textos del nombre de campo
//            $this->form_validation->set_rules($validations); //Añadir validaciones
//            $this->load->model('Administracion_model', 'administracion');
//            if ($this->form_validation->run() == TRUE) {
//                $data = array(
//                    'nombre' => $this->input->post('ext_nombre', TRUE),
//                    'matricula' => $this->input->post('matricula', TRUE),
//                    'delegacion' => $this->input->post('cve_delegacion', TRUE),
//                    'apellido_paterno' => $this->input->post('ext_ap', TRUE),
//                    'apellido_materno' => $this->input->post('ext_am', TRUE),
//                    'email' => $this->input->post('ext_mail', TRUE),
//                    'sexo' => $this->input->post('ext_sexo', TRUE),
//                    'pais_institucion' => $this->input->post('pais_institucion', TRUE),
//                    'institucion' => $this->input->post('institucion', TRUE),
//                    'telefono_personal' => $this->input->post('telefono_personal', TRUE),
//                    'telefono_oficina' => $this->input->post('telefono_oficina', TRUE),
//                    'pais_origen' => $this->input->post('pais_origen', TRUE),
//                    'password' => $this->input->post('reg_password', TRUE),
//                    'grupo' => Administracion_model::INVESTIGADOR,
//                    'registro_usuario' => true,
//                    'tipo_registro' => Inicio::EXTERNOS,
//                    'idioma' => $this->obtener_idioma(),
//                );
//                $output['registro_valido'] = $this->usuario->nuevo($data, $config['tipo_registro'], $this->language_text);
//                if ($output['registro_valido']['result'] == 'success') {
//                    $data_session = ['username' => $data['matricula'], 'password' => $data['password']];
//                    if ($data['tipo_registro'] == Inicio::EXTERNOS) {
//                        $data_session['username'] = $data['email'];
//                    }
//                    $this->session->set_flashdata('inicio_registro', $data_session);
//                    echo $this->load->view('sesion/registro_internos_externos_redireccionar.php', null, true);
//                    exit();
//                }
////                pr($output['registro_valido']['msg']);
////                
////                registro_valido
////                pr($output['registro_valido']);
//            } else {
//                // pr(validation_errors());;
//            }
////            }
//            $this->load->model('Catalogo_model', 'catalogo');
//            $output['delegaciones'] = dropdown_options($this->catalogo->get_delegaciones(null, null /* array('oficinas_centrales' => false) */), 'clave_delegacional', 'nombre');
//            $output['paises'] = dropdown_options($this->catalogo->get_paises(), "clave_pais", "lang", $this->obtener_idioma());
//            $output['language_text'] = $this->language_text;
//            $output['post'] = $this->input->post(null, TRUE);
//            $this->load->view($config['ruta_registro'], $output);
//        }
    }

    public function ver() {
        $this->template->getTemplate();
    }

}
