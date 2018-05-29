<!-- contadores de lugares para oratoria y lugares para cartel -->
<?php echo js("revision/asignar_dictamen.js"); ?>

<?php
$manual = $config_asignacion['manual'];
$sistema = $config_asignacion['sistema'];
?>
<div class="col-sm-12">
  <div class="col-sm-3">
    <h4 class="text-center"> <?php echo $language_text['lbl_oral'];?></h4>
    <h3 class="text-center"><?php echo $count_oratoria.' / '.$cupo['oratoria'];?></h3>
  </div>
  <div class="col-sm-3">
    <h4 class="text-center"> <?php echo $language_text['lbl_cartel'];?></h4>
    <h3 class="text-center"><?php echo $count_cartel.' / '.$cupo['cartel'];?></h3>
  </div>
  <div class="col-sm-2">
    <h4 class="text-center">Total de asignaciones<?php //echo $language_text['lbl_cartel'];?></h4>
    <h3 class="text-center"><?php echo ($count_oratoria + $count_cartel).' / '.($cupo['oratoria'] + $cupo['cartel']);?></h3>

  </div>
  <div class="col-sm-4">
    <h4 class="text-center"> <?php echo $language_text['lbl_tipos_de_asignacion'];?></h4>
    <br>
    <a id="btn_manual" type="button" class="btn btn-theme btn-block submit-button"> <span  style="color:#fff;"><?php echo $language_text['btn_manual'];?></span> </a>
  </div>
</div>
<div class="col-sm-12">
  <br>
  <div class="col-sm-2">

  </div>
  <div class="col-sm-4">
    <?php
    if($cerrar_proceso_btn){
    ?>
    <a href="<?php echo site_url("/dictamen/cierre_convocatoria"); ?>" class="btn btn-theme btn-block submit-button" type="button"><?php echo $language_text['btn_cerrar'];?><span class="glyphicon glyphicon-new-window"></span></a>
    <?php } ?>
  </div>
  <div class="col-sm-2">

  </div>
  <div class="col-sm-4">
    <a id="btn_automatico" type="button" class="btn btn-theme btn-block submit-button"> <span  style="color:#fff;"><?php echo $language_text['btn_automatico'];?></span> </a>

  </div>
</div>



<!-- <div id="main"> -->
<!-- <section class="page-section background-img"> -->

    <div class="col-sm-12">
    <br><br>
      <style type="text/css">
      .titulo{
        font-weight: 500;
        color:#333;
      }
      .div-borde {
        margin-top:10px;
        border: #cdcdcd medium solid;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        padding: 0.5em;
      }
    </style>

    <div class="sectionEvaluacion" id="secTrabajoInv" style="">
      <h3 style="color: #fff;padding-top: 15px;padding-bottom: 15px;padding-left: 15px;"><?php echo $language_text['tab_sin_asignar'];?></h3>
      <img class="arrow-black" src="<?php echo asset_url(); ?>img/arrowdownblack.png" alt="">
    </div>
    <div id="hideTrabajo" class="panel" style="display:none;">
      <h1 class="page-head-line"></h1>
      <div class="panel-body">
        <!-- Aqui va la tabla de sin asignar -->
        <table class="table">
          <thead>
            <tr>
              <!-- <th scope="col"></th> -->
              <th scope="col"><?php echo $language_text['col_folio'];?></th>
              <th scope="col"><?php echo $language_text['col_titulo'];?></th>
              <th scope="col"><?php echo $language_text['col_metodologia'];?></th>
              <th scope="col"><?php echo $language_text['col_r1'];?></th>
              <th scope="col"><?php echo $language_text['col_r2'];?></th>
              <th scope="col"><?php echo $language_text['col_r3'];?></th>
              <th scope="col"><?php echo $language_text['col_puntaje'];?></th>
              <?php
              if($manual)
              {
                echo '<th>';
                echo $language_text['col_sugerencia'];
                echo '</th>';
              }
              ?>
              <th scope="col"><?php echo $language_text['col_opciones'];?></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(isset($data_revisados))
            {
              if($data_revisados['success'])
              {
                if(count($data_revisados['result']) > 0)
                {
                  $lenguaje = obtener_lenguaje_actual();
                  foreach ($data_revisados['result'] as $row)
                  {
                    ?>
              <tr>
                <td scope="row" class="row_folio"><?php echo $row['folio'];?></td>
                <td><?php echo $row['titulo'];?></td>
                <td>
                  <?php
                  $metodologia = json_decode($row['metodologia'],true);
                  echo $metodologia[$lenguaje];
                  ?>
                </td>
                <td><?php echo $row['revisor1'];?></td>
                <td><?php echo $row['revisor2'];?></td>
                <td><?php if(isset($row['revisor3'])) echo $row['revisor3'];?></td>
                <td><?php echo $row['promedio'];?></td>
                <?php if($manual){ ?>
                <td>
                  <select class="select_asignacion">
                    <option value="Q">Sin asignar</option>
                    <option value="O">Oratoria</option>
                    <option value="C">Cartel</option>
                    <option value="R">Rechazado</option>
                  </select>
                </td>
                <?php } ?>
                <td>
                  <a <a href="<?php echo site_url('/gestion_revision/ver_resumen/'.base64_encode($row['folio'])); ?>"  style="color:#f05a29;"><?php echo $language_text['btn_vrevision'];?></a><br>
                  <?php  if($manual){ ?>
                  <a id="btn_asignar" href="#" style="color:#f05a29;"><?php echo $language_text['btn_asignar'];?></a>
                  <?php } ?>
                </td>
              </tr>
              <?php
           }
          }
          else
          {
            ?>
            <h3>No hay trabajos revisados</h3>
            <?php

          }
        }
        else
        {
          ?>
          <h3>No hay trabajos revisados</h3>
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


         </div>
     </div>

     <div class="sectionEvaluacion" id="secEvaluacion">
       <h3 style="color: #fff;padding-top: 15px;padding-bottom: 15px;padding-left: 15px;">
         Asignados
       </h3>
       <img class="arrow-black" src="<?php echo asset_url(); ?>img/arrowdownblack.png" alt="">
     </div>
     <div id="hideEvaluacion" class="panel " style="display:none;">
       <div class="panel-body">

          <!-- Aqui va la tabla de asignados -->
          <table class="table">
            <thead>
              <tr>
                <!-- <th scope="col"></th> -->
                <th scope="col"><?php echo $language_text['col_folio'];?></th>
                <th scope="col"><?php echo $language_text['col_titulo'];?></th>
                <th scope="col"><?php echo $language_text['col_metodologia'];?></th>
                <th scope="col"><?php echo $language_text['col_r1'];?></th>
                <th scope="col"><?php echo $language_text['col_r2'];?></th>
                <th scope="col"><?php echo $language_text['col_r3'];?></th>
                <th scope="col"><?php echo $language_text['col_puntaje'];?></th>
                <th><?php echo $language_text['col_sugerencia'];?></th>
                <th scope="col"><?php echo $language_text['col_opciones'];?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($data_dictamen))
              {
                if($data_dictamen['success'])
                {
                  if(count($data_dictamen['result']) > 0)
                  {
                    $lenguaje = obtener_lenguaje_actual();
                    foreach ($data_dictamen['result'] as $row)
                    {
                      ?>
                <tr>
                  <td scope="row" class="row_folio"><?php echo $row['folio'];?></td>
                  <td><?php echo $row['titulo'];?></td>
                  <td>
                    <?php
                    $metodologia = json_decode($row['metodologia'],true);
                    echo $metodologia[$lenguaje];
                    ?>
                  </td>
                  <td><?php echo $row['revisor1'];?></td>
                  <td><?php echo $row['revisor2'];?></td>
                  <td><?php if(isset($row['revisor3'])) echo $row['revisor3'];?></td>
                  <td><?php echo $row['promedio'];?></td>
                  <?php if($manual){ ?>
                  <td>
                    <select class="select_asignacion">
                      <option value="Q">Sin asignar</option>
                      <option value="O" <?php if($row['sugerencia']=='O') echo 'selected';?> >Oratoria</option>
                      <option value="C" <?php if($row['sugerencia']=='C') echo 'selected';?> >Cartel</option>
                      <option value="R">Rechazado</option>
                    </select>
                  </td>
                  <?php } ?>
                  <td>

                    <a href="<?php echo site_url('/gestion_revision/ver_resumen/'.base64_encode($row['folio'])); ?>" style="color:#f05a29;"><?php echo $language_text['btn_vrevision'];?></a><br>
                    <?php  if($manual){ ?>
                    <a id="btn_asignar" href="#" style="color:#f05a29;"><?php echo $language_text['btn_asignar'];?></a>
                    <?php } ?>
                  </td>
                </tr>
                <?php
             }
            }
            else
            {
              ?>
              <h3>No hay trabajos revisados</h3>
              <?php

            }
          }
          else
          {
            ?>
            <h3>No hay trabajos revisados</h3>
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

           <br>



        </div>
      </div>
    </div>
  <!-- </section> -->


<script>
  $(document).ready(function(){
      $("#hide").click(function(){
          $("#asignar").hide();
      });
      $("#show").click(function(){
          $("#asignar").show();
      });
  });
</script>



<script>
$("#comite").removeClass()
$("#atencion").removeClass()
$("#revision").removeClass()
$("#revisados").addClass("active")
$("#aceptados").removeClass()
$("#rechazados").removeClass()
//$("#sin_asignar").addClass("active")
</script>

    <?php echo css("revision/evaluacion_revisor.css"); ?>

<script type="text/javascript">
$(function () {
var down1 = false;
$("#secTrabajoInv").click(function() {
down1 = !down1;
if(down1){
$( "#hideTrabajo" ).show( 1000, function() {
//$( this ).remove();
});
}else{
$( "#hideTrabajo" ).hide( 1000, function() {
//$( this ).remove();
});
}
});

var down2 = false;
$("#secEvaluacion").click(function() {
down2 = !down2;
if(down2){
$( "#hideEvaluacion" ).show( 1000, function() {
//$( this ).remove();
});
}else{
$( "#hideEvaluacion" ).hide( 1000, function() {
//$( this ).remove();
});
}
});}
);

</script>
