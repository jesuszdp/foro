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

                                <div class="login-page">
                                    <?php
                                    if (isset($registro_valido)) {
                                        $tipo = $registro_valido['result'] ? 'success' : 'danger';
                                        echo html_message($registro_valido['msg'], $tipo);
                                    }
                                    ?>
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#r_internos"><?php echo $language_text['registro_usuario']['tab_interno']; ?></a></li>
                                        <li><a data-toggle="tab" href="#r_externos"><?php echo $language_text['registro_usuario']['tab_externo']; ?></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="r_internos" class="tab-pane fade in active">
                                            <?php
                                            if (isset($registro_internos)) {
                                                echo $registro_internos;
                                            }
                                            ?>
                                        </div>
                                        <div id="r_externos" class="tab-pane fade">
                                            <?php
                                            if (isset($registro_externos)) {
                                                echo $registro_externos;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
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

<!-- <div class="">
    <div class="modal fade" id="registro-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span><?php echo $language_text['registro_usuario']['registro_usuario_titulo']; ?></h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <div class="login-page">
<?php
if (isset($registro_valido)) {
    $tipo = $registro_valido['result'] ? 'success' : 'danger';
    echo html_message($registro_valido['msg'], $tipo);
}
?>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#r_internos"><?php echo $language_text['registro_usuario']['tab_interno']; ?></a></li>
                            <li><a data-toggle="tab" href="#r_externos"><?php echo $language_text['registro_usuario']['tab_externo']; ?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="r_internos" class="tab-pane fade in active">
<?php
if (isset($registro_internos)) {
    echo $registro_internos;
}
?>
                            </div>
                            <div id="r_externos" class="tab-pane fade">
<?php
if (isset($registro_externos)) {
    echo $registro_externos;
}
?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="">
                        <p><br>
                            ¿Olvidó su contraseña?<br>
                            <a href="<?php echo site_url('inicio/recuperar_password'); ?>">Solicitela aquí</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<script src="<?php echo asset_url(); ?>js/login.js"></script>
<script src="<?php echo asset_url(); ?>js/captcha.js"></script>
<script type="text/javascript">

    $(function () {
        new_captcha();
        prepara_form_registro();
<?php
if (isset($registro_valido['result']) && $registro_valido['result']) {
    ?>
            $('.rea_registro').css('display', 'none');
    <?php
}
?>
    });
</script>
