<div class="schedule-tabs lv2">
  <ul id="tabs-lv21"  class="nav nav-justified">
    <li id="asignados"  onclick="ponerActivo(this)"><a href="<?php echo base_url("index.php/gestion_revision/listado_control/4/8"); ?>"><strong><?php echo $language_text['tab_asignados']; ?></strong><br/> </a></li>
    <li id="sin_asignar" onclick="ponerActivo(this)"><a href="<?php echo base_url("index.php/gestion_revision/listado_control/4/7"); ?>"> <strong><?php echo $language_text['tab_sin_asignar']; ?></strong><br/></a></li>
  </ul>
</div>
<br>
<!-- contadores de lugares para oratoria y lugares para cartel -->
<div class="col-sm-12">
  <div class="col-sm-3">
    <h4 class=""> <?php echo $language_text['lbl_oral'];?></h4>
    <h3>10 / 20</h3>
  </div>
  <div class="col-sm-3">
    <h4> <?php echo $language_text['lbl_cartel'];?></h4>
    <h3>10 / 20</h3>
  </div>
  <div class="col-sm-3">
    <h4><?php echo $language_text['lbl_cartel'];?></h4>
    <h3>1 / 55</h3>

  </div>
  <div class="col-sm-3">
    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $language_text['btn_manual'];?></a> </button>
    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $language_text['btn_automatico'];?></a> </button>
    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $language_text['btn_cerrar'];?></a> </button>
  </div>
  <br><br>
</div>



<?php
if(isset($list_asignados)){
  echo $list_asignados;
}
if(isset($list_sin_asignar)){
  echo $list_sin_asignar;
}
?>
<script>
$("#comite").removeClass()
$("#atencion").removeClass()
$("#revision").removeClass()
$("#revisados").addClass("active")
$("#aceptados").removeClass()
$("#rechazados").removeClass()
$("#sin_asignar").removeClass("active")
</script>
