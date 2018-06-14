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




}
