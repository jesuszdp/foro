<div class="schedule-tabs lv2">
  <ul id="tabs-lv21"  class="nav nav-justified">
      <li class="active"><a href="#tab-lv21-first" data-toggle="tab">ASIGNADOS</a></li>
      <li><a href="#tab-lv21-second" data-toggle="tab">SIN ASIGNAR</a></li>
  </ul>
</div>
<br>
<!-- contadores de lugares para oratoria y lugares para cartel -->
<div class="col-sm-12">
  <div class="col-sm-3">
    <h4 class=""> <?php echo $opciones_secciones['lbl_oral'];?></h4>
    <h3>10 / 20</h3>
  </div>
  <div class="col-sm-3">
    <h4> <?php echo $opciones_secciones['lbl_cartel'];?></h4>
    <h3>10 / 20</h3>
  </div>
  <div class="col-sm-3">
    <h4>Asignados</h4>
    <h3>1 / 55</h3>

  </div>
  <div class="col-sm-3">
    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $opciones_secciones['btn_sugerir'];?></a> </button>
    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $opciones_secciones['btn_guardar'];?></a> </button>
    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $opciones_secciones['btn_cerrar'];?></a> </button>
  </div>
  <br><br>
</div>



              <!-- END contadores de lugares para oratoria y lugares para cartel -->
              <!-- botones cerrar proceso, guardar cambios y sugerir dictamen -->
              <!-- <div class="col-sm-12">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-3">
                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $opciones_secciones['btn_sugerir'];?></a> </button>
                </div>
                <div class="col-sm-3">
                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $opciones_secciones['btn_guardar'];?></a> </button>
                </div>
                <div class="col-sm-3">
                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $opciones_secciones['btn_cerrar'];?></a> </button>
                </div>
              </div> -->
              <!-- END botones cerrar proceso, guardar cambios y sugerir dictamen -->
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
</script>
