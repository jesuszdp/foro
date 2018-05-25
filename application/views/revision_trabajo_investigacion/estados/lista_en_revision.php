<?php
  if(isset($data_en_revision))
  {
      if($data_en_revision['success'])
      {
          if(count($data_en_revision['result']) > 0)
          {
?>
            <h4> <?php echo $opciones_secciones['nota_fecha_limite'];?> </h4>
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"><?php echo $opciones_secciones['col_folio'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_titulo'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_metodologia'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_r1'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_r2'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_r3'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_opciones'];?></th>
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
                    <td><?php echo $row['revisores'][0];?></td>
                    <td><?php echo $row['revisores'][1];?></td>
                    <td><?php echo $row['revisores'][2];?></td>
                    <td>
                      <a href="" type="button" data-animation="flipInY" data-animation-delay="100" data-toggle="modal" data-target="#exampleModal"><?php echo $opciones_secciones['btn_ver'];?></a>
                    </td>
                  </tr>
<?php
              }
          }
          else
          {
?>
          <h3><?php echo $opciones_secciones['er_mensaje'];?></h3>
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
  $("#revision").addClass("active")
  $("#revisados").removeClass()
  $("#aceptados").removeClass()
  $("#rechazados").removeClass()
  </script>
