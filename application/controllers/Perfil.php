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
          $this->load->library('form_complete');
          $this->load->library('seguridad');
          $this->load->library('empleados_siap');
          $this->load->library('form_validation');
          $this->load->model('Usuario_model', 'usuario');
          $this->load->model('Catalogo_model', 'catalogo');
    }

    public function index() {

    }

    public function ver() {

      $user_sesion = $this->get_datos_sesion();
      $es_imss = $this->get_datos_sesion(En_datos_sesion::ES_IMSS);

      if ($es_imss) {//Edición imsss
          $config['select_validation'] = "form_registro_usuario_internos";
          $config['ruta_registro'] = "sesion/registro_internos_ver.php";
          $config['tipo_edicion'] = Usuario_model::SIAP;
          $output['tipo_edicion'] = Perfil::INTERNOS;
      } else {//Es un externo
          $config['select_validation'] = "form_registro_usuario_externos";
          $config['ruta_registro'] = "sesion/registro_externos_ver.php";
          $config['tipo_edicion'] = Usuario_model::NO_IMSS;
          $output['tipo_edicion'] = Perfil::EXTERNOS;
      }
      pr($user_sesion);
      //exit();
      $output ['datos_usuario']= $this->get_datos_sesion();
      $output['delegaciones'] = dropdown_options($this->catalogo->get_delegaciones(null, null), 'clave_delegacional', 'nombre');
      $output['paises'] = dropdown_options($this->catalogo->get_paises(), "clave_pais", "lang", $this->obtener_idioma());
      $output['language_text'] = $this->language_text;
      $output['post'] = $this->input->post(null, TRUE);
     // pr($output);
      $main_content = $this->load->view($config['ruta_registro'], $output, TRUE);
      $this->template->setMainContent($main_content);
      $this->template->getTemplate();

   }

  public function editar(){
    $user_sesion = $this->get_datos_sesion();
    $datos_usuario = $user_sesion;
    $es_imss = $this->get_datos_sesion(En_datos_sesion::ES_IMSS);
    //pr($user_sesion);
    $id_info_u = $user_sesion['id_informacion_usuario'];
    $post = $this->input->post(null,TRUE);
    //pr($post);

    if ($es_imss) {//Edición imsss
      $ruta_registro = "sesion/registro_internos_edicion.php";
      //$config['tipo_edicion'] = Usuario_model::SIAP;
      $config['tipo_edicion'] = Perfil::INTERNOS;
      $output['delegaciones'] = dropdown_options($this->catalogo->get_delegaciones(null, null), 'clave_delegacional', 'nombre');
    } else {//Es un externo
      $ruta_registro = "sesion/registro_externos_edicion.php";
      //$config['tipo_edicion'] = Usuario_model::NO_IMSS;
      $config['tipo_edicion'] = Perfil::EXTERNOS;
      $config['validaciones'] = 'form_editar_usuario_externos';
    }

    if($post){
      $msg = '';
      $msg_type = 'danger';
      $success = false;

      if ($es_imss) {
      }else{
        $datos_usuario = array(
          'nombre' => $post['ext_nombre'],
          'apellido_paterno' => $post['ext_ap'],
          'apellido_materno' => $post['ext_am'],
          'sexo' => $post['sexo'], 
          'email' => $post['ext_mail'],
          'telefono_personal' => $post['telefono_personal'],
          'telefono_oficina' => $post['telefono_oficina'],
          'clave_pais' => $post['pais_origen'],
          'pais_institucion' => $post['pais_institucion'],
          'institucion' => $post['institucion']
        );
      }
      //pr($datos_usuario);
      $this->config->load('form_validation'); //Cargar archivo con validaciones
      $validations = $this->config->item($config['validaciones']); //Obtener validaciones de archivo general
      $this->set_textos_campos_validacion($validations, $this->language_text['registro_usuario']); //Modifica los textos del nombre de campo
      $this->form_validation->set_rules($validations);

      if ($this->form_validation->run() == TRUE) {
        $param = array(
          'where' => array('id_informacion_usuario'=>$id_info_u),
          'datos' => $datos_usuario
        );

        if($this->usuario->actualizar_informacion($param)){
          $success = true;
          $msg_type = 'success';
          $msg = 'Su información se actualizó correctamente';
        }else{

          $msg = 'Ocurrio un problema, intentelo de nuevo';
        }
      }
      $output['salida'] = array( 'msg' => $msg, 'success' => $success, 'msg_type' => $msg_type );
    } else {
      $datos_usuario = $this->usuario->obtener_informacion_usuario(array('where'=>array('id_informacion_usuario'=>$id_info_u)))[0];
    } 
    
    $output ['datos_usuario']= $datos_usuario;
    $output['paises'] = dropdown_options($this->catalogo->get_paises(), "clave_pais", "lang", $this->obtener_idioma());
    $output['language_text'] = $this->language_text;

    $main_content = $this->load->view($ruta_registro, $output, TRUE);
    $this->template->setMainContent($main_content);
    $this->template->getTemplate();

  }

  public function password()
  {
    $output['language_text'] = $this->language_text;
    $main_content = $this->load->view('sesion/cambiar_password.tpl.php', $output, TRUE);
    $this->template->setMainContent($main_content);
    $this->template->getTemplate();
  }
}
