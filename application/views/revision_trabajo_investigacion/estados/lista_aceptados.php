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
                  <th scope="col"><?php echo $opciones_secciones['col_folio'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_titulo'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_metodologia'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_tipo'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_puntaje'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_opciones'];?></th>
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
                    <td>
                        <?php
                            $metodologia = json_decode($row['metodologia'],true);
                            echo $metodologia[$lenguaje];
                        ?>
                    </td>
                    <td><?php echo $row['tipo_exposicion'];?></td>
                    <td><?php echo $row['promedio_revision'];?></td>
                    <td>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal"><?php echo $opciones_secciones['btn_revision'];?></button>
                    </td>
                  </tr>
<?php
              }
          }
          else
          {
?>
          <h3><?php echo $opciones_secciones['ac_mensaje'];?></h3>
<?php

          }
      }
      else
      {
?>
      <h3><?php echo $mensajes['ern_mensaje'];?></h3>
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
    <h3><?php echo $mensajes['ern_mensaje'];?></h3>
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
