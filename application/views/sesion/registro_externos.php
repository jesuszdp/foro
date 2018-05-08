<?php
if (isset($registro_valido)) {
    $tipo = $registro_valido['result'] ? 'success' : 'danger';
    echo html_message($registro_valido['msg'], $tipo);
}
?>

<div id="area_registro_<?php echo Inicio::INTERNOS; ?>" class="form area_registro">
    <?php echo form_open('inicio/registro/' . Inicio::INTERNOS, array('id' => 'registro_form' . Inicio::EXTERNOS, 'autocomplete' => 'off')); ?>
    <div class="sign-in-htm">
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Nombre: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'ext_nombre',
                'type' => 'text',
                'value' => isset($texto['ext_nombre']) ? $post['ext_nombre'] : '',
                'attributes' => array(
                    'class' => 'col-sm-3 form-control',
                    'placeholder' => $language_text['registro_usuario']['ext_nombre']
            )));
            echo form_error_format('ext_nombre');
            ?>
        </div>
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Apellido paterno: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'ext_ap',
                'type' => 'text',
                'value' => isset($texto['ext_ap']) ? $post['ext_ap'] : '',
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => $language_text['registro_usuario']['ext_ap']
            )));
            echo form_error_format('ext_ap');
            ?>
        </div>
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Apellido materno: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'ext_am',
                'type' => 'text',
                'value' => isset($texto['ext_am']) ? $post['ext_am'] : '',
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => $language_text['registro_usuario']['ext_am']
            )));
            echo form_error_format('ext_am');
            ?>
        </div>
        <div class="form-group">
            <div class="col-md-12">

                <div class="col-md-3 form-etiqueta">
                    <?php echo form_label($language_text['registro_usuario']['sexo'], 'sexo'); ?>

                </div>
                <div class="col-md-3">
                    <?php echo form_radio(array('name' => 'ext_sexo', 'value' => 'M', 'checked' => (isset($post['ext_sexo']) && $post['ext_sexo'] == 'M')?true:false, 'id' => 'ext_sexo')) . form_label($language_text['registro_usuario']['ext_sexo_m'], 'male'); ?>
                </div>
                <div class="col-md-3">
                    <?php echo form_radio(array('name' => 'ext_sexo', 'value' => 'F', 'checked' => (isset($post['ext_sexo']) && $post['ext_sexo'] == 'M')?true:false, 'id' => 'ext_sexo')) . form_label($language_text['registro_usuario']['ext_sexo_f'], 'female'); ?>
                </div>
                <div class="col-md-3">
                    <?php echo form_radio(array('name' => 'ext_sexo', 'value' => 'O', 'checked' => (isset($post['ext_sexo']) && $post['ext_sexo'] == 'O')?true:false, 'id' => 'ext_sexo')) . form_label($language_text['registro_usuario']['ext_sexo_o'], 'otro'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <?php echo form_error_format('ext_sexo'); ?>
            </div>
        </div>
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Correo electrónico: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'ext_mail',
                'type' => 'email',
                'value' => isset($post['ext_mail']) ? $post['ext_mail'] : '',
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => $language_text['registro_usuario']['ext_mail']
            )));
            echo form_error_format('ext_mail');
            ?>
        </div>
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Teléfono personal: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'telefono_personal',
                'type' => 'numeric',
                'value' => isset($post['telefono_personal']) ? $post['telefono_personal'] : '',
                'attributes' => array(
                    'class' => 'input form-control',
                    'placeholder' => $language_text['registro_usuario']['telefono_personal']
            )));
            echo form_error_format('telefono_personal');
            ?>
        </div>
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Teléfono de oficina: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'telefono_oficina',
                'type' => 'numeric',
                'value' => isset($post['telefono_oficina']) ? $post['telefono_oficina'] : '',
                'attributes' => array(
                    'class' => 'input form-control',
                    'placeholder' => $language_text['registro_usuario']['telefono_oficina']
            )));
            echo form_error_format('telefono_oficina');
            ?>
        </div>
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">País de origen: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'pais_origen',
                'type' => 'dropdown',
                'first' => array('' => $language_text['registro_usuario']['pais_origen']),
                'options' => $paises,
                'value' => isset($post['pais_origen']) ? $post['pais_origen'] : 'MX',
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => $language_text['registro_usuario']['pais_origen']
            )));
            echo form_error_format('pais_origen');
            ?>
        </div>
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">País donde labora: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'pais_institucion',
                'type' => 'dropdown',
                'first' => array('' => $language_text['registro_usuario']['pais_institucion']),
                'options' => $paises,
                'value' => isset($post['pais_institucion']) ? $post['pais_institucion'] : 'MX',
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => $language_text['registro_usuario']['pais_institucion']
            )));
            echo form_error_format('pais_institucion');
            ?>
        </div>
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Institución donde labora: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'institucion',
                'type' => 'text',
                'value' => isset($post['institucion']) ? $post['institucion'] : '',
                'attributes' => array(
                    'class' => 'input form-control',
                    'placeholder' => $language_text['registro_usuario']['institucion']
            )));
            echo form_error_format('institucion');
            ?>
        </div>
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Contraseña: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'reg_password',
                'type' => 'password',
                'value' => isset($post['reg_password']) ? $post['reg_password'] : '',
                'attributes' => array(
                    'class' => 'input form-control',
                    'placeholder' => $language_text['registro_usuario']['reg_password']
            )));
            echo form_error_format('reg_password');
            ?>
        </div>
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Repite tu contraseña: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'reg_repassword',
                'type' => 'password',
                'value' => isset($post['reg_repassword']) ? $post['reg_repassword'] : '',
                'attributes' => array(
                    'class' => 'input form-control',
//                    'required' => true,
                    'placeholder' => $language_text['registro_usuario']['reg_repassword']
            )));
            echo form_error_format('reg_repassword');
            ?>
        </div>
        <div class="form-group" style="text-align:center;">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Código de verificación: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'reg_captcha',
                'type' => 'text',
                'value' => '',
                'attributes' => array(
                    'class' => 'form-control',
                    'required' => true,
                    'placeholder' => $language_text['registro_usuario']['reg_captcha']
            )));
            echo form_error_format('reg_captcha');
            ?>
            <br>
            <div class="captcha-container" id="captcha_first">
                <img id="captcha_img" class="captcha" src="<?php echo site_url(); ?>/inicio/captcha" alt="CAPTCHA Image" />
                <a class="btn btn-lg btn-theme pull-right" onclick="new_captcha()">
                    <span class="glyphicon glyphicon-refresh"></span>
                </a>
            </div>
        </div>
        <br>
        <div class="">
            <input type="button" id="regform_ext" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" value="<?php echo $language_text['registro_usuario']['registrar']; ?>" data-tpform="<?php echo Inicio::EXTERNOS; ?>">
        </div>

    </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#regform_ext").on('click', function (e) {
            var tipoform = $(this).data('tpform');
            var div = "#r_" + tipoform;
            data_ajax(site_url + '/inicio/registro/' + tipoform, '#registro_form' + tipoform, div);
        });
    });
</script>
