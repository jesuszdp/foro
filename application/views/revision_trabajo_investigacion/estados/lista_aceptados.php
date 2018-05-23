<?php
  if(isset($data_aceptados))
  {
      if($data_aceptados['success'])
      {
          if(count($data_aceptados['result']) > 0)
          {
?>
            <!-- aceptados -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Folio</th>
                  <th scope="col">Título</th>
                  <th scope="col">Metodología</th>
                  <th scope="col">Tipo de exposición</th>
                  <th scope="col">Puntaje</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
<?php
              $lenguaje = obtener_lenguaje_actual();
              foreach ($data_aceptados['result'] as $row)
              {
?>
                  <tr>
                    <td scope="row"><?php echo $row['folio'];?></td>
                    <td><?php echo $row['titulo'];?></td>
                    <td><?php echo $row['metodologia'];?></td>
                    <td><?php echo $row['tipo_exposicion'];?></td>
                    <td><?php echo $row['promedio_revision'];?></td>
                    <td>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Ver trabajo</button>
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
      <h3><?php echo $data_aceptados['msg'];?></h3>
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

<script>
$("#comite").removeClass()
$("#atencion").removeClass()
$("#revision").removeClass()
$("#revisados").removeClass()
$("#aceptados").addClass("active")
$("#rechazados").removeClass()
</script>
