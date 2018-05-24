
              <?php
                if(isset($data_revisados))
                {
                    if($data_revisados['success'])
                    {
                        if(count($data_revisados['result']) > 0)
                        {
              ?>
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
                    <td><?php echo $row['revisor'];?></td>
                    <td><?php echo $row['revisor'];?></td>
                    <td><?php echo $row['revisor'];?></td>
                    <td><?php echo $row['promedio_revision'];?></td>
                    <td><?php echo $row['propuesta_dictamen'];?></td>
                    <td>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="ver_resumen" style="color:#fff;">FALTA IDIOMA</a> </button>
                    </td>
                  </tr>
<?php
              }
          }
          else
          {
?>
          <h3><?php //poner mensaje correcpondiente ?></h3>
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
