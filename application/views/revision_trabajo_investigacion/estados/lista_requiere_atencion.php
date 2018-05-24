<?php
  if(isset($data_req_atencion))
  {
      if($data_req_atencion['success'])
      {
          if(count($data_req_atencion['result']) > 0)
          {
?>
              <!-- lista_requiere_atencion -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"><?php echo $opciones_secciones['col_folio'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_titulo'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_metodologia'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_r1'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_r2'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_r3'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_num_asignaciones'];?></th>
                    <th scope="col"><?php echo $opciones_secciones['col_opciones'];?></th>
                  </tr>
                </thead>
                <tbody>
<?php
              $lenguaje = obtener_lenguaje_actual();
              foreach ($data_req_atencion['result'] as $row)
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
                    <td><?php echo $row['numero_revisiones'];?></td>
                    <td>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal"><?php echo $opciones_secciones['btn_ver'];?></button>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal"><?php echo $opciones_secciones['btn_asignar'];?></button>
                    </td>
                  </tr>
<?php
              }
          }
          else
          {
?>
          <h3>No hay trabajos de requiere atención!</h3>
<?php

          }
      }
      else
      {
?>
      <h3><?php echo $data_req_atencion['msg'];?></h3>
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
<!-- END lista_requiere_atencion -->

<script>
  $("#comite").removeClass()
  $("#atencion").addClass("active")
  $("#revision").removeClass()
  $("#revisados").removeClass()
  $("#aceptados").removeClass()
  $("#rechazados").removeClass()
</script>
