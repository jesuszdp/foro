<?php ?>
<div class="">
    <div class="modal fade" id="registro-modal" tabindex="-1" role="dialog"  style="display: none;">
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
                        <p><!-- <a href="#">¿Necesita ayuda? <span class="glyphicon glyphicon-question-sign"></span></a> --><br>
                            ¿Olvidó su contraseña?<br>
                            <a href="<?php echo site_url('inicio/recuperar_password'); ?>">Solicitela aquí</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".regform").on('click', function (e) {
            var tipoform = $(this).data('tpform');
            var div = "area_registro_" + tipoform;
            data_ajax(site_url + '/inicio/registro/' + tipoform, 'registro_form' + tipoform, div);
        });
    });

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
