<?php //pr($language_text); ?>
<?php
if (isset($registro_valido)) {
    $tipo = $registro_valido['result'] ? 'success' : 'danger';
    echo html_message($registro_valido['msg'], $tipo);
}
?>

<div id="area_registro_<?php echo Inicio::INTERNOS; ?>" class="form area_registro">
    <?php echo form_open('inicio/registro/' . Inicio::INTERNOS, array('id' => 'registro_form' . Inicio::INTERNOS, 'autocomplete' => 'off')); ?>
    <div class="sign-in-htm">
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Matrícula: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'matricula',
                'type' => 'text',
                'value' => isset($post['matricula']) ? $post['matricula'] : '',
                'attributes' => array(
                    'class' => ' form-control',
                    'placeholder' => $language_text['registro_usuario']['matricula']
            )));

            echo form_error_format('matricula');
            ?>
        </div>
        <div class="form-group">
          <label class="pull-left form-etiquetas pull-right col-sm-5">Delegación: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'cve_delegacion',
                'type' => 'dropdown',
                'first' => array('' => $language_text['registro_usuario']['cve_delegacion']),
                'options' => $delegaciones,
                'value' => isset($post['cve_delegacion']) ? $post['cve_delegacion'] : '',
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => $language_text['registro_usuario']['cve_delegacion']
            )));

            echo form_error_format('cve_delegacion');
            ?>
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
                    'class' => ' input form-control',
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
                'placeholder' => $language_text['registro_usuario']['pais_origen'],
                'style' => 'max-width:210px' 

            )));
            echo form_error_format('pais_origen');
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
          <label class="pull-left form-etiquetas pull-right col-sm-5">Repetir contraseña: </label>
            <?php
            echo $this->form_complete->create_element(array('id' => 'reg_repassword',
                'type' => 'password',
                'value' => isset($post['reg_repassword']) ? $post['reg_repassword'] : '',
                'attributes' => array(
                    'class' => 'input form-control',
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
            <input id="regform" type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" value="<?php echo $language_text['registro_usuario']['registrar']; ?>" data-tpform="<?php echo Inicio::INTERNOS; ?>">
        </div>

    </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#regform").on('click', function (e) {
            var tipoform = $(this).data('tpform');
            var div = "#r_" + tipoform;
            data_ajax(site_url + '/inicio/registro/' + tipoform, '#registro_form' + tipoform, div);
        });
    });
</script>
