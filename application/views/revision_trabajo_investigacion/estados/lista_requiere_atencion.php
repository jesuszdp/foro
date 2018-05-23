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
                    <th scope="col">Folio</th>
                    <th scope="col">Título</th>
                    <th scope="col">Metodología</th>
                    <th scope="col">Estatus R1</th>
                    <th scope="col">Estatus R2</th>
                    <th scope="col">Estatus R3</th>
                    <th scope="col">Número de revisiones</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
<?php
              foreach ($data_req_atencion['result'] as $row)
              {
?>
                  <tr>
                    <td scope="row"><?php echo $row['folio'];?></td>
                    <td><?php echo $row['titulo'];?></td>
                    <td><?php echo $row['metodologia'];?></td>
                    <td><?php echo "ESTATUS R1";?></td>
                    <td><?php echo "ESTATUS R2";?></td>
                    <td><?php echo "ESTATUS R3";?></td>
                    <td><?php echo $row['numero_revisiones'];?></td>
                    <td>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Ver trabajo</button>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
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
