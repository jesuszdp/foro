<?php 
//pr($data);
?>

<script type="text/javascript">
    data_grafica = <?php echo json_encode($data); ?>;
</script>
<?php echo js('reportes/imss/porcentaje.js'); ?>
<div class="schedule-tabs lv2">
    <ul id="tabs-lv21"  class="nav nav-justified">
        <li class="active"><a href="#tab-lv21-first" data-toggle="tab">UMAE</a></li>
        <li><a href="#tab-lv21-second" data-toggle="tab">Delegación</a></li>
    </ul>
</div>

<div class="tab-content lv2">
    <div id="tab-lv21-first" class="tab-pane fade in active">
        <div>
            <div id="grafica_umae" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
            <br>
            <div><p> *<?php echo $language_text['reportes_imss']['nota_porcentaje_umae']; ?> </p></div>
            <!--<div id="grafica_delegacion" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>-->
        </div>
    </div>
    <div id="tab-lv21-second" class="tab-pane fade in">
        <div>
            <div id="grafica_delegacion" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
            <br>
            <div><p> *<?php echo $language_text['reportes_imss']['nota_porcentaje_del']; ?> </p></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#top_registrados").removeClass();
    $("#calidad").removeClass();
    $("#porcentaje_registrados").addClass("active");
</script>
