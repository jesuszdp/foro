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
<<<<<<< HEAD
              <?php
                if(isset($list_asignados)){
                  echo $list_asignados;
                }
                if(isset($list_sin_asignar)){
                  echo $list_sin_asignar;
                }
              ?>
=======
              <br><br>

              <!--  lista_revisados -->
              <table class="table">
                <thead>
                  <tr>
                    <!-- <th scope="col"></th> -->
                    <th scope="col"><?php echo $opciones_secciones['col_folio'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_titulo'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_metodologia'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_r1'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_r2'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_r3'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_puntaje'];?></th>
                    <th><?php echo $opciones_secciones['col_sugerencia'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_opciones'];?></th>
                  </tr>
                </thead>
                <tbody>
<?php
              $lenguaje = obtener_lenguaje_actual();
              foreach ($data_revisados['result'] as $row)
              {
?>
                  <tr>
                    <td scope="row"><?php echo $row['folio'];?></td>
                    <td><?php echo $row['titulo'];?></td>
                    <td>
                        <?php
                            $metodologia = json_decode($row['metodologia'],true);
                            echo $metodologia[$lenguaje];
                        ?>
                    </td>
                    <td><?php echo $row['revisores'][0];?></td>
                    <td><?php echo $row['revisores'][1];?></td>
                    <td><?php echo $row['revisores'][2];?></td>
                    <td><?php echo $row['promedio_revision'];?></td>
                    <td><?php echo $row['propuesta_dictamen'];?></td>
                    <td>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="ver_resumen" style="color:#fff;"><?php echo $opciones_secciones['btn_vdetalle']; ?></a> </button>
                    </td>
                  </tr>
<?php
              }
          }
          else
          {
?>
          <h3>No hay trabajos aceptados!</h3>
<?php

          }
      }
      else
      {
?>
      <h3><?php echo $data_revisados['msg'];?></h3>
<?php
      }
?>
>>>>>>> 7ab87fc08d0f8ef88d08b248f820bd742492c828


<script>
    $("#comite").removeClass()
    $("#atencion").removeClass()
    $("#revision").removeClass()
    $("#revisados").addClass("active")
    $("#aceptados").removeClass()
    $("#rechazados").removeClass()
</script>
