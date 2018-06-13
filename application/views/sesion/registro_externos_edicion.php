<br><br>
<h1 class="section-title">
  <span data-animation="flipInY" data-animation-delay="100" class="icon-inner animated flipInY visible"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-ticket fa-stack-1x"></i></span></span>
  <span data-animation="fadeInRight" data-animation-delay="100" class="title-inner animated fadeInRight visible">Editar perfil</span>
</h1>
<section class="panel panel-default">
  <div class="container">
    <!-- Contact form -->
      <?php echo form_open('inicio/registro/' . $tipo_registro, array('id' => 'registro_form' . $tipo_registro, 'autocomplete' => 'off')); ?>
      <br>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['ext_nombre']; ?></label>
        </div>
        <div class="form-group af-inner">
          <?php echo $this->form_complete->create_element(array('id' => 'ext_nombre',
              'type' => 'text',
              'value' => isset($post['ext_nombre']) ? $post['ext_nombre'] : '',
              'style' => 'style="color:#000000;"',
              'attributes' => array(
                  'class' => 'form-control placeholder',
                  'size' => '30',
          )));
          echo form_error_format('ext_nombre');
          ?>
        </div>
      </div>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['ext_ap'];?></label>
        </div>
        <div class="form-group af-inner">
          <?php
          echo $this->form_complete->create_element(array('id' => 'ext_ap',
              'type' => 'text',
              'value' => isset($post['ext_ap']) ? $post['ext_ap'] : '',
              'style' => 'style="color:#000000;"',
              'attributes' => array(
                  'class' => 'form-control placeholder',
                  'size' => '30',
          )));
          echo form_error_format('ext_ap');
          ?>
        </div>
      </div>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['ext_am'];?></label>
        </div>
        <div class="form-group af-inner">
          <?php
          echo $this->form_complete->create_element(array('id' => 'ext_am',
              'type' => 'text',
              'value' => isset($post['ext_am']) ? $post['ext_am'] : '',
              'style' => 'style="color:#000000;"',
              'attributes' => array(
                  'class' => 'form-control placeholder',
                  'size' => '30',
          )));
          echo form_error_format('ext_am');
          ?>

        </div>
      </div>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['sexo'];?></label>
        </div>
        <div class="form-group af-inner">
          <div class="col-md-2">
              <?php echo form_radio(array('name' => 'ext_sexo', 'value' => 'M', 'checked' => (isset($post['ext_sexo']) && $post['ext_sexo'] == 'M') ? true : false, 'id' => 'ext_sexo')) . form_label($language_text['registro_usuario']['ext_sexo_m'], 'male'); ?>
          </div>
          <div class="col-md-2">
              <?php echo form_radio(array('name' => 'ext_sexo', 'value' => 'F', 'checked' => (isset($post['ext_sexo']) && $post['ext_sexo'] == 'F') ? true : false, 'id' => 'ext_sexo')) . form_label($language_text['registro_usuario']['ext_sexo_f'], 'female'); ?>
          </div>
          <div class="col-md-2">
              <?php echo form_radio(array('name' => 'ext_sexo', 'value' => 'O', 'checked' => (isset($post['ext_sexo']) && $post['ext_sexo'] == 'O') ? true : false, 'id' => 'ext_sexo')) . form_label($language_text['registro_usuario']['ext_sexo_o'], 'otro'); ?>
          </div>
          <div class="col-md-12">
              <?php echo form_error_format('ext_sexo'); ?>
          </div>
          <br>
        </div>
      </div>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['ext_mail'];?></label>
        </div>
        <div class="form-group af-inner">
          <?php
          echo $this->form_complete->create_element(array('id' => 'ext_mail',
              'type' => 'email',
              'value' => isset($post['ext_mail']) ? $post['ext_mail'] : '',
              'style' => 'style="color:#000000;"',
              'attributes' => array(
                  'class' => 'form-control placeholder',
                  'size' => '30',
          )));
          echo form_error_format('ext_mail');
          ?>
        </div>
      </div>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['telefono_personal'];?></label>
        </div>
        <div class="form-group af-inner">
          <?php
          echo $this->form_complete->create_element(array('id' => 'telefono_personal',
              'type' => 'numeric',
              'value' => isset($post['telefono_personal']) ? $post['telefono_personal'] : '',
              'style' => 'style="color:#000000;"',
              'attributes' => array(
                  'class' => ' form-control placeholder',
                  'size' => '30',
          )));
          echo form_error_format('telefono_personal');
          ?>
        </div>
      </div>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['telefono_oficina'];?></label>
        </div>
        <div class="form-group af-inner">
          <?php
          echo $this->form_complete->create_element(array('id' => 'telefono_oficina',
              'type' => 'numeric',
              'value' => isset($post['telefono_oficina']) ? $post['telefono_oficina'] : '',
              'style' => 'style="color:#000000;"',
              'attributes' => array(
                  'class' => 'input form-control',
                  'size' => '30',
          )));
          echo form_error_format('telefono_oficina');
          ?>
        </div>
      </div>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['pais_origen'];?></label>
        </div>
        <div class="form-group af-inner">
          <?php
          echo $this->form_complete->create_element(array('id' => 'pais_origen',
              'type' => 'dropdown',
              'first' => array('' => $language_text['registro_usuario']['pais_origen']),
              'options' => $paises,
              'value' => isset($post['pais_origen']) ? $post['pais_origen'] : 'MX',

              'attributes' => array(
                  'class' => 'form-control placeholder',
                  'style' => 'max-width:210px',
                  'style' => 'color:#000000'
          )));
          echo form_error_format('pais_origen');
          ?>

        </div>
      </div>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['pais_institucion'];?></label>
        </div>
        <div class="form-group af-inner">
          <?php
          echo $this->form_complete->create_element(array('id' => 'pais_institucion',
              'type' => 'dropdown',
              'first' => array('' => $language_text['registro_usuario']['pais_institucion']),
              'options' => $paises,
              'value' => isset($post['pais_institucion']) ? $post['pais_institucion'] : 'MX',
              'attributes' => array(
                  'class' => 'form-control',
                  'style' => 'max-width:210px',
                  'style' => 'color:#000000'
          )));
          echo form_error_format('pais_institucion');
          ?>        </div>
      </div>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['institucion'];?></label>
        </div>
        <div class="form-group af-inner">
          <?php
          echo $this->form_complete->create_element(array('id' => 'institucion',
              'type' => 'text',
              'value' => isset($post['institucion']) ? $post['institucion'] : '',
              'style' => 'style="color:#000000;"',
              'attributes' => array(
                  'class' => 'input form-control',
                  'size' => '30'
          )));
          echo form_error_format('institucion');
          ?>
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['reg_password']; ?></label>
        </div>
        <div class="form-group af-inner">
          <?php
          echo $this->form_complete->create_element(array('id' => 'reg_password',
              'type' => 'password',
              'value' => isset($post['reg_password']) ? $post['reg_password'] : '',
              'style' => 'style="color:#000000;"',
              'attributes' => array(
                  'class' => 'input form-control',
                  'size' => '30'
          )));
          echo form_error_format('reg_password');
          ?>
        </div>
      </div>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['reg_repassword']; ?></label>
        </div>
        <div class="form-group af-inner">
          <?php
          echo $this->form_complete->create_element(array('id' => 'reg_repassword',
              'type' => 'password',
              'value' => isset($post['reg_repassword']) ? $post['reg_repassword'] : '',
              'style' => 'style="color:#000000;"',
              'attributes' => array(
                  'class' => 'input form-control',
                  'size' => '30'
//                    'required' => true,
          )));
          echo form_error_format('reg_repassword');
          ?>
        </div>
      </div>
      <div class="col-sm-12">
          <div class="col-sm-2">
          </div>
          <div class="col-sm-8">
              <input type="button" id="regform_ext" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" value="<?php echo $language_text['registro_usuario']['registrar']; ?>" data-tpform="<?php echo $tipo_registro; ?>">
          </div>
          <br><br><br>
      </div>


      <?php echo form_close(); ?>
    <!-- /Contact form -->

  </div>
</section>




<?php
if (isset($registro_valido)) {
    $tipo = $registro_valido['result'] ? 'success' : 'danger';
    echo html_message($registro_valido['msg'], $tipo);
}
?>

<div id="area_registro_<?php echo $tipo_registro; ?>" class="form area_registro">

</div>
<!--
<script type="text/javascript">
    $(document).ready(function () {
        $("#regform_ext").on('click', function (e) {
            var tipoform = $(this).data('tpform');
            var div = "#r_" + tipoform;
            data_ajax(site_url + '/inicio/registro/' + tipoform, '#registro_form' + tipoform, div);
        });
    });
</script> -->
