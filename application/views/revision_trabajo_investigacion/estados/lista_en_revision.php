<?php
  if(isset($data_en_revision))
  {
      if($data_en_revision['success'])
      {
          if(count($data_en_revision['result']) > 0)
          {
?>
            <h4> <b>Nota:</b> La fecha debajo del nombre del revisor es la fecha límite de evaluación. </h4>
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Folio</th>
                  <th scope="col">Título</th>
                  <th scope="col">Metodología</th>
                  <th scope="col">R1</th>
                  <th scope="col">R2</th>
                  <th scope="col">R3</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
<?php
              $lenguaje = obtener_lenguaje_actual();
              foreach ($data_en_revision['result'] as $row)
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
          <h3>No hay trabajos en revisión!</h3>
<?php

          }
      }
      else
      {
?>
      <h3><?php echo $data_en_revision['msg'];?></h3>
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
  $("#revision").addClass("active")
  $("#revisados").removeClass()
  $("#aceptados").removeClass()
  $("#rechazados").removeClass()
  </script>
