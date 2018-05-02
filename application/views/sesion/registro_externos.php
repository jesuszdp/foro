
<div id="area_registro_<?php echo Inicio::INTERNOS;?>" class="form area_registro">
    <?php echo form_open('inicio/registro/'.Inicio::INTERNOS, array('id' => 'registro_form', 'autocomplete' => 'off')); ?>
    <div class="sign-in-htm">
        <div class="form-group">
            <?php
            echo $this->form_complete->create_element(array('id' => 'ext_nombre',
                'type' => 'text',
                'value' => isset($texto['ext_nombre']) ? $post['ext_nombre'] : '',
                'attributes' => array(
                    'class' => 'form-control',
                    'required' => true,
                    'placeholder' => $language_text['registro_usuario']['ext_nombre']
            )));
            echo form_error_format('ext_nombre');
            ?>
        </div>
        <div class="form-group">
            <?php
            echo $this->form_complete->create_element(array('id' => 'ext_ap',
                'type' => 'text',
                'value' => isset($texto['ext_ap']) ? $post['ext_ap'] : '',
                'attributes' => array(
                    'class' => 'form-control',
                    'required' => true,
                    'placeholder' => $language_text['registro_usuario']['ext_ap']
            )));
            echo form_error_format('ext_ap');
            ?>
        </div>
        <div class="form-group">
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
            <?php
            echo $this->form_complete->create_element(array('id' => 'ext_mail',
                'type' => 'email',
                'value' => isset($post['ext_mail']) ? $post['ext_mail'] : '',
                'attributes' => array(
                    'class' => 'form-control',
                    'required' => true,
                    'placeholder' => $language_text['registro_usuario']['ext_mail']
            )));
            echo form_error_format('ext_mail');
            ?>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <?php echo form_label($language_text['registro_usuario']['ext_sexo'], 'gender'); ?>
            </div>
            <div class="col-md-4">
                <?php echo form_radio(array('name' => 'sexo', 'value' => 'M', 'checked' => FALSE, 'id' => 'male')) . form_label($language_text['registro_usuario']['ext_sexo_h'], 'male'); ?>
            </div>
            <div class="col-md-4">
                <?php echo form_radio(array('name' => 'sexo', 'value' => 'F', 'checked' => FALSE, 'id' => 'female')) . form_label($language_text['registro_usuario']['ext_sexo_f'], 'female'); ?>
            </div>
            <?php echo form_error_format('sexo'); ?>
        </div>
        <div class="form-group">
            <?php
            echo $this->form_complete->create_element(array('id' => 'reg_password',
                'type' => 'password',
                'value' => isset($post['reg_password']) ? $post['reg_password'] : '',
                'attributes' => array(
                    'class' => 'input form-control',
                    'required' => true,
                    'placeholder' => $language_text['registro_usuario']['passwd']
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
                    'required' => true,
                    'placeholder' => $language_text['registro_usuario']['passwd_confirm']
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
                    'required' => true,
                    'placeholder' => $language_text['registro_usuario']['captcha']
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
            <input type="button" class="btn btn-success btn-block regform" value="<?php echo $language_text['inicio_sesion']['inicio_sesion']; ?>" data-tpform="<?php echo Inicio::EXTERNOS;?>">
        </div>

    </div>
    <?php echo form_close(); ?>
</div>
