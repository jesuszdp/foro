<?php ?>
<script src="<?php echo asset_url(); ?>highcharts/highcharts.js"></script>
<script src="<?php echo asset_url(); ?>highcharts/data.js"></script>
<script src="<?php echo asset_url(); ?>highcharts/modules/exporting.js"></script>

<script type="text/javascript">
  data_grafica_umae = <?php echo json_encode($porcentaje['umae']); ?>;
  data_grafica_delegacion = <?php echo json_encode($porcentaje['delegacion']); ?>;
  titulo = '<?php echo $language_text['reportes_imss']['titulo_porcentaje']; ?>';
  tooltip_grafica = '<?php echo $language_text['reportes_imss']['tooltip_porcentaje']; ?>';
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
    <!--<div id="grafica_delegacion" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>-->
    </div>
  </div>
  <div id="tab-lv21-second" class="tab-pane fade in">
    <div>
    <div id="grafica_delegacion" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    </div>
  </div>
</div>
<script>
$("#top_registrados").removeClass();
$("#calidad").removeClass();
$("#porcentaje_registrados").addClass("active");
</script>

