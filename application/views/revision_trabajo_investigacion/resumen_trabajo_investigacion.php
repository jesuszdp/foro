<?php echo css("revision/evaluacion_revisor.css"); ?>
<?php echo css("revision/resumen_revision_ti.css"); ?>
<script src="<?php echo asset_url(); ?>highcharts/highcharts.js"></script>
<script src="<?php echo asset_url(); ?>highcharts/data.js"></script>
<script src="<?php echo asset_url(); ?>highcharts/modules/exporting.js"></script>
<?php echo js("revision/opciones_highchart.js"); ?>
<?php echo js("revision/funcionalidad_cascada.js"); ?>
<script src="https://code.highcharts.com/modules/bullet.js"></script>


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
<body id="home" class="wide body-light">

<!-- Preloader -->
<!-- <div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div> -->

    <!-- Content area -->
    <div class="content-area">
        <div id="main">
          <div class="container">
              <h1 class="section-title">
                  <span data-animation="flipInY" data-animation-delay="300" class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-star fa-stack-1x"></i></span></span>
                  <span data-animation="fadeInRight" data-animation-delay="500" class="title-inner">Resumen de revisión de trabajo de investigación</span>
              </h1>
          <div>
          <section id="resumen">
            <div class="container">
              <div class="sectionEvaluacion" id="secTrabajoInv">
                <h3>
                  Trabajo de investigación
                </h3>
                <img src="<?php echo asset_url(); ?>img/arrowdown.png" alt="">
              </div>
              <div id="hideTrabajo" class="panel panel-default" style="display:none;">
                  <?php echo $trabajo_investigacion; ?>
              </div>
              <div class="sectionEvaluacion" id="secResTrabajoInv">
                <h3>
                  Resumen de la evaluación del trabajo de investigación
                </h3>
                <img src="<?php echo asset_url(); ?>img/arrowdown.png" alt="">
              </div>
              <div id="hideResumen" style="display:none;">
                <section class="row">
                    <section id="column1">
                      <h3>Trabajo de investigación</h3>
                      <br>
                      <?php
                          if(isset($promedioFinal))
                          {
                              if($promedioFinal['success'])
                              {
                                    if(count($promedioFinal['result']) > 0)
                                    {
                      ?>
                                        <p style="color:whitesmoke;"><?php echo $promedioFinal['result'][0]['titulo']; ?></p>
                                        <p style="color:whitesmoke;">Promedio final: <small><?php echo $promedioFinal['result'][0]['avg']; ?></small> </p>
                                        <p style="color:whitesmoke;">Resolución: <small><?php echo $promedioFinal['result'][0]['clave_estado']; ?></small> </p>
                                        <p style="color:whitesmoke;">Presentación: <small><?php echo $promedioFinal['result'][0]['tipo_exposicion']; ?></small> </p>
                      <?php
                                    }
                                    else
                                    {
                      ?>
                                          <h2>No hay datos de este trabajo</h2>
                      <?php
                                    }
                      ?>

                      <?php
                              }
                              else
                              {
                                 //poner el error
                              }
                          }
                          else
                          {
                              //poner el error
                          }
                      ?>
                        <div>
                          <div id="progressBar">
                          </div>
                        </div>

                    </section>
                    <section id="column2">
                      <h3>Revisores</h3>
                      <!-- <hr> -->
                      <br>
                      <?php
                          if(isset($revisores))
                          {
                              if($revisores['success'])
                              {
                                  if(count($revisores['result']) > 0)
                                  {

                                      foreach ($revisores['result'] as $row) {
                      ?>
                                          <section class="row">
                                            <div class="tarjeta">
                                              <!-- <div class="circulos pull-left">
                                                  <img src="../public/img/imagen.jpg" alt="" class="media-object" />
                                              </div> -->
                                              <p class="nombreR">Nombre: <small> <?php echo $row['revisor']; ?> </small></p>
                                              <p class="nombreR">Fecha de asignación: <small> <?php echo $row['fecha_asignacion']; ?> </small></p>
                                              <p class="nombreR">Fecha de conclusión: <small> <?php echo $row['fecha_conclusion']; ?> </small></p>
                                              <p class="nombreR">Promedio: <small> <?php echo $row['promedio_revision']; ?> </small></p>
                                            </div>
                                          </section>
                                          <hr>
                      <?php
                                      }
                                  }
                                  else
                                  {
                      ?>
                                        <h2>No hay datos de este trabajo</h2>
                      <?php
                                  }
                              }
                              else
                              {
                                  //poner error
                              }
                          }
                          else
                          {
                             //poner error
                          }
                      ?>
                    </section>
                </section>
                <section class="row">
                  <section id="column3">
                    <h3>Trabajos de investigación por las evaluaciones</h3>
                    <br>
                    <?php
                        if(isset($tablaSeccion))
                        {
                            if($tablaSeccion['success'])
                            {
                                if(count($tablaSeccion['result']) > 0)
                                {
                    ?>
                                    <div id="graficas">
                                    </div>
                                    <br>
                                    <table class="table" id="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">Secciones</th>
                                          <th scope="col">Promedio</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                            $lenguaje = obtener_lenguaje_actual();
                                            foreach ($tablaSeccion['result'] as $row) {

                                        ?>
                                            <tr>
                                              <td>
                                                  <?php
                                                      $seccion = json_decode($row['descripcion'],true);
                                                      echo $seccion[$lenguaje];
                                                  ?>
                                              </td>
                                              <td><?php echo number_format($row['avg'],2); ?></td>
                                            </tr>
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
                                      <h2>No hay datos de este trabajo</h2>
                    <?php
                                }
                    ?>

                    <?php
                            }
                            else
                            {
                    ?>
                                  <h2>Algo salio mal</h2>
                    <?php
                            }
                        }
                        else
                        {
                    ?>
                            <h2>Algo salio mal</h2>
                    <?php
                        }
                    ?>
                  </section>
                </section>
              </div>

            </div>
          </section>
        </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function () {
        //theme.init();
        var promedio = "<?php echo $promedioFinal['result'][0]['avg']; ?>";
        console.log(promedio);
        chart("graficas", "table", null, null, ['#0095bc','#98c56e']);
        progresBar("progressBar", null, "Valoración del trabajo", null, null,Math.round(promedio));
    });

    // jQuery(document).ready(function () { theme.onResize(); });
    // jQuery(window).load(function(){ theme.onResize(); });
    // jQuery(window).resize(function(){ theme.onResize(); });

</script>

</body>
</html>
