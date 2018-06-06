<?php ?>
<div class="schedule-tabs lv2">
	<ul id="tabs-lv21"  class="nav nav-justified">
		<li class="active"><a href="#tab-lv21-first" data-toggle="tab">UMAE</a></li>
		<li><a href="#tab-lv21-second" data-toggle="tab">Delegación</a></li>
	</ul>
</div>

<div class="tab-content lv2">
  <div id="tab-lv21-first" class="tab-pane fade in active">
    <div class="timeline">
  	<?php pr($top['umae']); ?>
    </div>
  </div>
  <div id="tab-lv21-second" class="tab-pane fade in">
    <div class="timeline">
    <?php pr($top['delegacion']); ?>
    </div>
  </div>
</div>

<script>
$("#calidad").removeClass();
$("#porcentaje_registrados").removeClass();
$("#top_registrados").addClass("active");
</script>