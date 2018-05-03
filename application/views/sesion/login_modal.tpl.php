<div class="item page slide1">
    <div class="caption">
        <div class="container">
            <div class="div-table">
                <div class="div-cell">
                    <div class="row">
                        <div class="col-md-6 col-lg-8">
                            <div class="form-background">
                                <div class="form-header color">
                                    <h1 class="section-title">
                                        <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-ticket fa-stack-1x"></i></span></span>
                                        <span class="title-inner">Iniciar sesión</span>
                                    </h1>
                                </div>
                                <?php echo form_open('inicio/index', array('id' => 'session_form', 'autocomplete' => 'off', 'class' => 'registration-form alt')); ?>
                                <!-- <form id="registration-form-alt" name="registration-form-alt" class="registration-form alt" action="#" method="post"> -->
                                <div class="row">
                                    <div class="col-sm-12 form-alert"></div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="col-lg-5">
                                                <label for="user" class="pull-right formulario">&nbsp;Matrícula o correo electrónico:</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input id="usuario" name="usuario"
                                                       type="text" class="form-control input-name"
                                                       data-toggle="tooltip" title="Matrícula o correo electrónico es requerido"
                                                       placeholder=""
                                                       value="<?php echo set_value('usuario'); ?>"/>
                                            </div>
                                        </div><div class="clearfix"></div>
                                        <?php
                                        echo form_error_format('usuario');
                                        /* if ($this->session->flashdata('flash_usuario'))
                                          {
                                          ?>
                                          <div class="alert alert-danger" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                          </button>
                                          <?php echo $this->session->flashdata('flash_usuario');
                                          ?>
                                          </div>
                                          <?php
                                          } */
                                        ?>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="col-lg-5">
                                                <label for="user" class="pull-right formulario">&nbsp;Contraseña:</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input id="password" name="password"
                                                       type="password" class="form-control input-name"
                                                       data-toggle="tooltip" title="Contraseña es requerida"
                                                       placeholder=""/>
                                            </div>
                                        </div><div class="clearfix"></div>
                                        <?php
                                        echo form_error_format('password');
                                        /* if ($this->session->flashdata('flash_password'))
                                          {
                                          ?>

                                          <div class="alert alert-danger" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                          </button>
                                          <?php echo $this->session->flashdata('flash_password'); ?>
                                          </div>
                                          <?php
                                          } */
                                        ?>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="col-lg-5">
                                                <label for="user" class="pull-right formulario">&nbsp;Código de verificación:</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input id="captcha" name="captcha"
                                                       type="text" class="form-control input-name"
                                                       data-toggle="tooltip" title="Código de verificación es requerido"
                                                       placeholder=""/>
                                            </div>
                                            <div class="captcha-container" id="captcha_first">
                                                <div class="col-lg-3">
                                                </div>
                                                <div class="col-lg-6">
                                                    <img class="captcha" id="captcha_img" src="<?php echo site_url(); ?>/inicio/captcha" alt="CAPTCHA Image" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <a class="btn btn-lg btn-success" onclick="new_captcha()">
                                                        <span class="glyphicon glyphicon-refresh"></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <?php
                                            echo form_error_format('captcha');
                                            if (isset($errores) && !is_null($errores)) {
                                                ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                <?php echo $errores; ?>
                                                </div>
<?php } ?>
                                        </div>
                                    </div>
                                    <br>                                    
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                            <button
                                                data-animation="flipInY" data-animation-delay="100"
                                                class="btn btn-theme btn-block submit-button" type="submit"
                                                > Iniciar sesión <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-12">
                                        <p><a href="#">¿Necesita ayuda? <span class="glyphicon glyphicon-question-sign"></span></a><br>
                                            ¿Olvidó su contraseña?<br>
                                            <a href="<?php echo site_url('inicio/recuperar_password'); ?>">Solicitela aquí</a></p>
                                    </div> -->
                                </div>
                                <!-- </form> -->
<?php echo form_close(); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="text-holder">
                                <h2 class="caption-title">04 AL 09 DE NOVIEMBRE DEL 2018</h2>
                                <h3 class="caption-subtitle">EDUCACIÓN EN SALUD ORIENTADA AL FUTURO</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--div class="">
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span>Iniciar sesión</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <div class="login-page">
                        <div class="form">
<?php echo form_open('inicio/index', array('id' => 'session_form', 'autocomplete' => 'off')); ?>
                            <div class="sign-in-htm">
                                <div class="form-group">
                                    <label for="user" class="pull-left"><span class="glyphicon glyphicon-user"></span> Matrícula:</label>
                                    <input id="usuario"
                                           name="usuario"
                                           type="text"
                                           class="input form-control"
                                           placeholder="<?php echo $texts['user']; ?>:" required>

                                </div>
<?php
echo form_error_format('usuario');
if ($this->session->flashdata('flash_usuario')) {
    ?>
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
    <?php echo $this->session->flashdata('flash_usuario');
    ?>
                                        </div>
    <?php
}
?>
                                <div class="form-group">
                                    <label for="pass" class="pull-left"><span class="glyphicon glyphicon-eye-open"></span> Contraseña:</label>
                                    <input id="password"
                                           name="password"
                                           type="password"
                                           class="input form-control"
                                           data-type="password"
                                           placeholder="<?php echo $texts['passwd']; ?>:" required>
                                </div>
<?php
echo form_error_format('password');
if ($this->session->flashdata('flash_password')) {
    ?>

                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
    <?php echo $this->session->flashdata('flash_password'); ?>
                                        </div>
    <?php
}
?>
                                <div class="form-group" style="text-align:center;">
                                    <label for="pass" class="pull-left"><span class="glyphicon glyphicon-text-width"></span> Escribe el texto de la imagen:</label>
                                    <input id="captcha"
                                           name="captcha"
                                           type="text"
                                           class="input form-control"
                                           placeholder="<?php echo $texts['captcha']; ?>" required>
<?php
echo form_error_format('captcha');
?>
                                    <br>
                                    <div class="captcha-container" id="captcha_first">
                                        <img class="captcha" id="captcha_img" src="<?php echo site_url(); ?>/inicio/captcha" alt="CAPTCHA Image" />
                                        <a class="btn btn-lg btn-success pull-right" onclick="new_captcha()">
                                            <span class="glyphicon glyphicon-refresh"></span>
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <div class="">
                                    <input type="submit" class="btn btn-success btn-block" value="Iniciar sesión">
                                </div>

                            </div>
<?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="">

                        <p><br>
                            ¿Olvidó su contraseña?<br>
                            <a href="<?php echo site_url('inicio/recuperar_password'); ?>">Solicitela aquí</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div -->
<script src="<?php echo asset_url(); ?>js/captcha.js"></script>
<script type="text/javascript">
                                                    $(function () {
                                                        new_captcha();
                                                    });

<?php
if (isset($errores)) {
    ?>
                                                        $('#login-modal').modal({show: true});
    <?php
}

if (isset($user_recovery) || isset($code_recovery)) {
    ?>
                                                        $('#modalRecovery').modal({show: true});
    <?php
}
?>
</script>
