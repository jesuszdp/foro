<?php ?>


<!-- listas de estados -->
<div class="schedule-wrapper clear" data-animation="fadeIn" data-animation-delay="200">
    <div class="schedule-tabs lv1">
        <ul id="tabs-lv1"  class="nav nav-justified">
            <li class="tab_reporte_calidad" data-tab="1"> <a href="<?php echo base_url("index.php/reportes_calidad/reportes/1"); ?>"><strong><?php echo 'tab_sc'; ?></strong> <br/></a></li>
            <li class="tab_reporte_calidad" data-tab="2"> <a href="<?php echo base_url("index.php/reportes_calidad/reportes/2"); ?>" ><strong><?php echo 'tab_ra'; ?></strong> <br/></a></li>
            <li class="tab_reporte_calidad" data-tab="3"> <a href="<?php echo base_url("index.php/reportes_calidad/reportes/3"); ?>"><strong><?php echo 'tab_er'; ?></strong> <br/></a></li>
            <li class="tab_reporte_calidad" data-tab="4"> <a href="<?php echo base_url("index.php/reportes_calidad/reportes/4"); ?>"><strong><?php echo 'tab_rv'; ?></strong></a></li>
            <li class="tab_reporte_calidad" data-tab="5"> <a href="<?php echo base_url("index.php/reportes_calidad/reportes/5"); ?>"><strong><?php echo 'tab_ac'; ?></strong> <br/></a></li>
            <li class="tab_reporte_calidad" data-tab="6"> <a href="<?php echo base_url("index.php/reportes_calidad/reportes/6"); ?>"><strong><?php echo 'tab_rx'; ?></strong> <br/></a></li>
        </ul>
    </div>
    <div class="tab-content lv1">
        <!-- tab-sin-comite sin comité -->
        <div id="tab-sin-comite" class="tab-pane fade in active">
            <div class="tab-content lv2">
                <div id="tab-lv21-comite" class="tab-pane fade in active">
                    <div class="timeline">
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

    <!-- END tab-sin-comite sin comité -->

      <!-- <script type="text/javascript">
          $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
          })
      </script> -->


        <!--<script>//
//            function ponerActivo(obj) {
//                console.log(obj)
//                console.log(obj.id)
//                switch (obj.id) {
//                    case 'comite':
//                        //$("#comite").addClass("active")
//                        break;
//                    case 'atencion':
//                        //$("#atencion").addClass("active")
//                        break;
//                    case 'revision':
//                        //$("#revision").addClass("active")
//                        break;
//                    case 'revisados':
//                        //$("#revisados").addClass("active")
//                        break;
//                    case 'aceptados':
//                        //$("#aceptados").addClass("active")
//                        break;
//                    case 'rechazados':
//                        //$("#rechazados").addClass("active")
//                        break;
//                    default:
//
//                }
//            }
//        </script> -->
        <!-- <script>
            $("#comite").removeClass()
            $("#atencion").removeClass()
            $("#revision").removeClass()
            $("#revisados").addClass("active")
            $("#aceptados").removeClass()
            $("#rechazados").removeClass()
        </script> -->
</div>
</div>