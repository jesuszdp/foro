<?php
  if(isset($data_revisados))
  {
      if($data_revisados['success'])
      {
          if(count($data_revisados['result']) > 0)
          {
?>
              <!-- contadores de lugares para oratoria y lugares para cartel -->
              <div class="col-sm-12">
                <div class="col-sm-3">
                  <h3> Lugares para Oratoria</h3><br>
                  <h3>10 / 20</h3>
                </div>
                <div class="col-sm-3">
                  <h3> Lugares para Oratoria</h3><br>
                  <h3>10 / 20</h3>
                </div>
              </div>
              <!-- END contadores de lugares para oratoria y lugares para cartel -->


              <!-- botones cerrar proceso, guardar cambios y sugerir dictamen -->
              <div class="col-sm-12">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-3">
                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;">Sugerir dictamen</a> </button>
                </div>
                <div class="col-sm-3">
                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;">Guardar cambio</a> </button>
                </div>
                <div class="col-sm-3">
                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;">Cerrar proceso</a> </button>
                </div>
              </div>
              <!-- END botones cerrar proceso, guardar cambios y sugerir dictamen -->
              <br><br>

              <!--  lista_revisados -->
              <table class="table">
                <thead>
                  <tr>
                    <!-- <th scope="col"></th> -->
                    <th scope="col">Folio</th>
                    <th scope="col">Título</th>
                    <th scope="col">Metodología</th>
                    <th scope="col">R1</th>
                    <th scope="col">R2</th>
                    <th scope="col">R3</th>
                    <th scope="col">Puntaje</th>
                    <th>Propuesta de dictamen</th>
                    <th scope="col">Opciones</th>
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
                    <td><?php echo $row['revisor'];?></td>
                    <td><?php echo $row['revisor'];?></td>
                    <td><?php echo $row['revisor'];?></td>
                    <td><?php echo $row['promedio_revision'];?></td>
                    <td><?php echo $row['propuesta_dictamen'];?></td>
                    <td>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="ver_resumen" style="color:#fff;">Ver detalle</a> </button>
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

    </tbody>
  </table>
<?php
  }
  else
  {
?>
    <h3>Algo salió mal, vuelve a intentarlo más tarde!</h3>
<?php
  }
?>
