<?php ?>

<!-- listas de estados -->
<div class="schedule-wrapper clear" data-animation="fadeIn" data-animation-delay="200">
  <div class="schedule-tabs lv1">
    <ul id="tabs-lv1"  class="nav nav-justified">
      <li class="#tab_reporte_calidad" id="top_registrados" data-tab="1"> <a href="<?php echo base_url("index.php/reportes_institucion/reportes/1"); ?>"><strong><?php echo 'Top de trabajos registrados'; ?></strong> <br/></a></li>
      <li class="tab_reporte_calidad" id="porcentaje_registrados" data-tab="2"> <a href="<?php echo base_url("index.php/reportes_institucion/reportes/2"); ?>" ><strong><?php echo 'Porcentaje de trabajos registrados'; ?></strong> <br/></a></li>
      <li class="tab_reporte_calidad" id="calidad" data-tab="3"> <a href="<?php echo base_url("index.php/reportes_institucion/reportes/3"); ?>"><strong><?php echo 'Calidad de trabajos evaluados'; ?></strong> <br/></a></li>
    </ul>
  </div>
  <div class="tab-content lv1">
    <!-- tab-sin-comite sin comité -->
    <div id="tab-sin-comite" class="tab-pane fade in active">
      <div class="tab-content lv2">
        <div id="tab-lv21-comite" class="tab-pane fade in active">
          <?php
          if (isset($view_reporte)) {
              echo $view_reporte;
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>