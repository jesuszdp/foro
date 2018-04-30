<?php

/*
 * Cuando escribí esto sólo Dios y yo sabíamos lo que hace.
 * Ahora, sólo Dios sabe.
 * Lo siento.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Inicio
 *
 * @author chrigarc
 */
class Inicio extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_complete');
        $this->load->library('form_validation');
        $this->load->library('seguridad');
        $this->load->library('empleados_siap');
        $this->load->helper(array('secureimage'));
        $this->load->model('Sesion_model', 'sesion');
        $this->load->model('Usuario_model', 'usuario');
    }

    public function index() {
        $data["texts"] = $this->lang->line('formulario'); //textos del formulario
        if ($this->input->post()) {
            $post = $this->input->post(null, true);

            $this->config->load('form_validation'); //Cargar archivo con validaciones
            $validations = $this->config->item('login'); //Obtener validaciones de archivo general
            $this->form_validation->set_rules($validations);

            if ($this->form_validation->run() == TRUE) {
                $valido = $this->sesion->validar_usuario($post["usuario"], $post["password"]);
                $mensajes = $this->lang->line('mensajes');
                switch ($valido) {
                    case 1:
                        //redirect to home //load menu...etc etc
                        $params = array(
                            'where' => array('usuarios.username' => $post['usuario']),
                            'select' => array(
                                "usuarios.id_usuario", "coalesce(inf.matricula, usuarios.username) matricula", "usuarios.clave_idioma language",
                                "inf.id_informacion_usuario", "inf.nombre", "inf.apellido_paterno", "inf.apellido_materno",
                                "uni.clave_unidad", "uni.nombre unidad", "inf.fecha_nacimiento",
                                "dep.clave_departamental", "dep.nombre departamento",
                                "cat.clave_categoria", "cat.id_categoria", "cat.nombre categoria",
                                "inf.curp", "inf.rfc"
                                , "inf.email", "inf.clave_delegacional", "del.nombre delegacion"
                            )
                        );
                        $foro_educacion['usuario'] = $this->usuario->get_usuarios($params)[0];
                        $foro_educacion['usuario']['niveles_acceso'] = $this->sesion->get_niveles_acceso($foro_educacion['usuario']['id_usuario']);
                        $foro_educacion['language'] = $foro_educacion['usuario']['language']; 
//                        $die_sipimss['usuario']['workflow'] = $this->sesion->get_info_convocatoria($die_sipimss['usuario']['id_docente']);
                        $this->session->set_userdata(En_datos_sesion::__INSTANCIA, $foro_educacion);
                        redirect(site_url() . '/inicio/inicio');
                        break;
                    case 2:
                        $data['errores'] = true;
                        $this->session->set_flashdata('flash_password', $mensajes[$valido]);
                        break;
                    case 3:
                        $data['errores'] = true;
                        $this->session->set_flashdata('flash_usuario', $mensajes[$valido]);
                        break;
                    default :
                        break;
                }
            } else {
//                pr(validation_errors());
                $data['errores'] = validation_errors();
            }
        }

        $foro_educacion = $this->session->userdata('die_sipimss');
        if (isset($foro_educacion['usuario']['id_usuario'])) {

            redirect(site_url('inicio/inicio'));
        } else {//De inicio aquí es donde entra 
            $this->load->model('Catalogo_model', 'catalogo');
            $data['delegaciones'] = dropdown_options($this->catalogo->get_delegaciones(null, array('oficinas_centrales' => true)), 'clave_delegacional', 'nombre');
            $data['my_modal'] = $this->load->view("sesion/login_modal.tpl.php", $data, TRUE);
            $data['registro_modal'] = $this->load->view("sesion/registro_modal.tpl.php", $data, TRUE);
            $this->load->view("sesion/login.tpl.php", $data);
        }
    }

    public function inicio() {
        $output = [];
        $u_siap = $this->session->flashdata('die_sipimss_siap');
        if (!is_null($u_siap) && $u_siap == 0) {
            $output['usuario'] = $this->get_datos_sesion();
            $output['modal_siap'] = $this->load->view('sesion/modal_siap.tpl.php', $output, true);
        }
        $this->template->setTitle('Inicio');
        $main_content = $this->load->view('sesion/index.tpl.php', $output, true);
        $this->template->setMainContent($main_content);
        $this->template->getTemplate();
    }

    function captcha() {
        new_captcha();
    }

    public function cerrar_sesion() {
        $this->session->sess_destroy();
        redirect(site_url());
    }

    public function recuperar_password($code = null) {
        $datos = array();
        if ($this->input->post() && $code == null) {
            $usuario = $this->input->post("usuario", true);
            $this->form_validation->set_rules('usuario', 'Usuario', 'required');
            if ($this->form_validation->run() == TRUE) {
                $this->sesion->recuperar_password($usuario);
                $datos['recovery'] = true;
            }
        } else if ($this->input->post() && $code != null) {
            $this->form_validation->set_rules('new_password', 'Constraseña', 'required');
            $this->form_validation->set_rules('new_password_confirm', 'Confirmar constraseña', 'required');
            if ($this->form_validation->run() == TRUE) {
                $new_password = $this->input->post('new_password', true);
                $datos['success'] = $this->sesion->update_password($code, $new_password);
            }
        } else if ($code != null) {
            $datos['code'] = $code;
            $datos['form_recovery'] = true;
        }
        $datos['my_modal'] = $this->load->view("sesion/recuperar_password.tpl.php", $datos, TRUE);
        $datos["texts"] = $this->lang->line('formulario'); //textos del formulario
        $datos['my_modal'] .= $this->load->view("sesion/login_modal.tpl.php", $datos, TRUE);
        $this->load->view("sesion/login.tpl.php", $datos);
        //$this->load->view("sesion/recuperar_password.tpl.php", $datos);
    }

    public function manteminiemto() {
        echo 'En mantenimiento';
    }

    public function dashboard() {
        $id_usuario = $this->get_datos_sesion(En_datos_sesion::ID_USUARIO);
        $this->load->model('Modulo_model', 'modulo');
        $this->load->library('LNiveles_acceso');
        $niveles = $this->modulo->get_niveles_acceso($id_usuario, 'usuario');
        if ($this->lniveles_acceso->nivel_acceso_valido(array(LNiveles_acceso::Super, LNiveles_acceso::Admin, LNiveles_acceso::Nivel_central), $niveles)) {
            redirect('reporte/nivel_central');
        } else {
            redirect('reporte/n1');
        }
    }

    public function registro() {
        $output["texts"] = $this->lang->line('formulario'); //textos del formulario
        if ($this->input->post()) {
            $this->config->load('form_validation'); //Cargar archivo con validaciones
            $validations = $this->config->item('form_registro_usuario'); //Obtener validaciones de archivo general
            $this->form_validation->set_rules($validations); //Añadir validaciones
            if ($this->form_validation->run() == TRUE) {
                $this->load->model('Administracion_model', 'administracion');
                $data = array(
                    'matricula' => $this->input->post('reg_usuario', TRUE),
                    'delegacion' => $this->input->post('id_delegacion', TRUE),
                    'email' => $this->input->post('reg_email', true),
                    'password' => $this->input->post('reg_password', TRUE),
                    'grupo' => Administracion_model::DOCENTE,
                    'registro_usuario' => true
                );
                $output['registro_valido'] = $this->usuario->nuevo($data);
            } else {
                // pr(validation_errors());;
            }
        }
        $this->load->model('Catalogo_model', 'catalogo');
        $output['delegaciones'] = dropdown_options($this->catalogo->get_delegaciones(null, array('oficinas_centrales' => true)), 'clave_delegacional', 'nombre');
        $this->load->view("sesion/registro_modal.tpl.php", $output);
    }

    public function mesa_ayuda() {
        $this->template->set_titulo_modal('<h4><span class="glyphicon glyphicon-lock"></span>Mesa de ayuda</h4>');
        $view = $this->load->view('sesion/mesa_ayuda.tpl.php', [], true);
        $this->template->set_cuerpo_modal($view);
        $this->template->get_modal();
    }

    private function valida_info_siap($usuario) {
        $status = true;
        if (isset($usuario['id_docente'])) {
            $status = false;
            // pr($usuario['clave_departamental'].' - '.$usuario['clave_categoria']);

            $siap = $this->empleados_siap->buscar_usuario_siap(substr($usuario['clave_unidad'], 0, 2), $usuario['matricula']);
            if ($siap['tp_msg'] == En_tpmsg::SUCCESS) {
                $siap = $siap['empleado'];
                // pr($siap);
                // pr($siap['adscripcion'][0].' - '.$siap['emp_keypue'][0]);
                $status = ($siap['adscripcion'][0] == $usuario['clave_departamental']) && ($siap['emp_keypue'][0] == $usuario['clave_categoria']);
                // echo $status ? 'true':'false';
            }
            if (!$status) {
                $this->session->set_flashdata('die_sipimss_siap', 0);
            }
        }
    }

    public function p404() {
        $output = [];
        $this->load->view('404.tpl.php', $output);
    }

}
