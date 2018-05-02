<?php // pr($language_text);?>
<div id="area_registro_<?php echo Inicio::INTERNOS; ?>" class="form area_registro">
    <?php echo form_open('inicio/registro/' . Inicio::INTERNOS, array('id' => 'registro_form' . Inicio::INTERNOS, 'autocomplete' => 'off')); ?>
    <div class="sign-in-htm">
        <div class="form-group">
            <?php
            echo $this->form_complete->create_element(array('id' => 'matricula',
                'type' => 'text',
                'value' => isset($post['matricula']) ? $post['matricula'] : '',
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => $language_text['registro_usuario']['matricula']
            )));
            echo form_error_format('matricula');
            ?>
        </div>
        <div class="form-group">
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
            <?php
            echo $this->form_complete->create_element(array('id' => 'telefono',
                'type' => 'numeric',
                'value' => isset($post['telefono']) ? $post['telefono'] : '',
                'attributes' => array(
                    'class' => 'input form-control',
                    'placeholder' => $language_text['registro_usuario']['telefono']
            )));
            echo form_error_format('telefono');
            ?>
        </div>
        <div class="form-group">
            <?php
            echo $this->form_complete->create_element(array('id' => 'pais_origen',
                'type' => 'dropdown',
                'first' => array('' => $language_text['registro_usuario']['pais_origen']),
                'options' => $paises,
                'value' => isset($post['pais_origen']) ? $post['pais_origen'] : '',
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => $language_text['registro_usuario']['pais_origen']
            )));
            echo form_error_format('pais_origen');
            ?>
        </div>
        <div class="form-group">
            <?php
            echo $this->form_complete->create_element(array('id' => 'pais_institucion',
                'type' => 'dropdown',
                'first' => array('' => $language_text['registro_usuario']['pais_institucion']),
                'options' => $paises,
                'value' => isset($post['pais_institucion']) ? $post['pais_institucion'] : '',
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => $language_text['registro_usuario']['pais_institucion']
            )));
            echo form_error_format('pais_institucion');
            ?>
        </div>
        <div class="form-group">
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
            <?php
            echo $this->form_complete->create_element(array('id' => 'reg_captcha',
                'type' => 'text',
                'value' => isset($post['reg_captcha']) ? $post['reg_captcha'] : '',
                'attributes' => array(
                    'class' => 'form-control',
                    'placeholder' => $language_text['registro_usuario']['reg_captcha']
            )));
            echo form_error_format('reg_captcha');
            ?>
            <br>
            <div class="captcha-container" id="captcha_first">
                <img id="captcha_img" class="captcha" src="<?php echo site_url(); ?>/inicio/captcha" alt="CAPTCHA Image" />
                <a class="btn btn-lg btn-success pull-right" onclick="new_captcha()">
                    <span class="glyphicon glyphicon-refresh"></span>
                </a>
            </div>
        </div>
        <br>
        <div class="">
            <input type="button" class="btn btn-success btn-block regform" value="<?php echo $language_text['registro_usuario']['registrar']; ?>" data-tpform="<?php echo Inicio::INTERNOS; ?>">
        </div>

    </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".regform").on('click', function (e) {
            var tipoform = $(this).data('tpform');
            var div = "#r_" + tipoform;
            console.log(div);
            console.log(div);
            data_ajax(site_url + '/inicio/registro/' + tipoform, '#registro_form' + tipoform, div);
        });
    });
</script>
