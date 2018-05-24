<?php echo css("revision/evaluacion_revisor.css"); ?>
<?php echo css("revision/resumen_revision_ti.css"); ?>
<script src="<?php echo asset_url(); ?>highcharts/highcharts.js"></script>
<script src="<?php echo asset_url(); ?>highcharts/data.js"></script>
<script src="<?php echo asset_url(); ?>highcharts/modules/exporting.js"></script>
<?php echo js("revision/opciones_highchart.js"); ?>
<?php echo js("revision/funcionalidad_cascada.js"); ?>


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
                  <h1 class="page-head-line"></h1>
                  <div class="panel-body">
                      <div class="row">
                          <div class="col-sm-12">
                              <h2 class="titulo">Trabajo de investigación</h2>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-4">
                              <div class="div-borde">
                                  <strong>Folio:</strong>
                                  <br>
                                  IMSS-CES-FNFIES-P-18-0030                </div>
                          </div>
                          <div class="col-sm-8">
                              <div class="div-borde">
                                  <strong>Título:</strong>
                                  <br>
                                  Mi título de prueba                </div>
                          </div>
                      </div> <!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Ver archivo:</strong>
                                  <a href="http://localhost/foro/index.php/registro_investigacion/ver_archivo/MTg" target="_blank"><span class="fa fa-search"></span> IMSS-CES-FNFIES-P-18-0030.pdf</a><br>                                    </div>
                          </div>
                      </div>
                                  <div class="row">
                          <div class="col-sm-12">
                              <h2 class="titulo">Problema</h2>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Pregunta de investigación:</strong>
                                  <br>
                                  Pregunta de investigación                </div>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Planteamiento del problema:</strong>
                                  <br>
                                  Planteamiento del problema                </div>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Objetivo:</strong>
                                  <br>
                                  Objetivo                </div>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Justificación:</strong>
                                  <br>
                                  Justificación                </div>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <h2 class="titulo">Marco teórico</h2>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Antecedentes:</strong>
                                  <br>
                                  Antecedentes                </div>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Tipo de metodología:</strong>
                                  <br>
                                  Cuantitativo                </div>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Metodología:</strong>
                                  <br>
                                  Metodología                </div>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Consideraciones éticas:</strong>
                                  <br>
                                  Consideraciones éticas                </div>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Hipótesis y/o supuestos teóricos:</strong>
                                  <br>
                                  Hipótesis y/o supuestos teóricos                </div>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Resultados:</strong>
                                  <br>
                                  Resultados                </div>
                          </div>
                      </div><!--row-->
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="div-borde">
                                  <strong>Conclusiones:</strong>
                                  <br>
                                  Conclusiones                </div>
                          </div>
                      </div><!--row-->
                      <!--row-->
                  </div>
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
                                    //pr($promedioFinal['result'][0]);
                      ?>
                                    <p style="color:whitesmoke;"><?php echo $promedioFinal['result'][0]['titulo']; ?></p>
                                    <p style="color:whitesmoke;">Promedio final: <small><?php echo $promedioFinal['result'][0]['avg']; ?></small> </p>
                                    <p style="color:whitesmoke;">Resolución: <small><?php echo $promedioFinal['result'][0]['clave_estado']; ?></small> </p>
                                    <p style="color:whitesmoke;">Presentación: <small><?php echo $promedioFinal['result'][0]['tipo_exposicion']; ?></small> </p>
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
                      <section id="progressBar">
                      </section>
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
                                  foreach ($revisores['result'] as $row) {
                      ?>
                                      <section class="row">
                                        <div class="tarjeta">
                                          <!-- <div class="circulos pull-left">
                                              <img src="../public/img/imagen.jpg" alt="" class="media-object" />
                                          </div> -->
                                          <p class="nombreR">Nombre: <small> <?php echo $row['revisor']; ?> </small></p>
                                          <p class="nombreR">Fecha de asignación: <small> <?php echo $row['fecha_asignacion']; ?> </small></p>
                                          <p class="nombreR">Fecha de conclusión: <small> <?php echo $row['fecha_conclucion']; ?> </small></p>
                                          <p class="nombreR">Promedio: <small> <?php echo $row['promedio_revision']; ?> </small></p>
                                        </div>
                                      </section>
                                      <hr>
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
                                          <td><?php echo $row['sum']; ?></td>
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
        chart("graficas", "table", null, null, ['#0095bc','#98c56e'],"column");
        //chart("graficas", "table", null, null, null,"solidgauge");
    });

    // jQuery(document).ready(function () { theme.onResize(); });
    // jQuery(window).load(function(){ theme.onResize(); });
    // jQuery(window).resize(function(){ theme.onResize(); });

</script>

</body>
</html>
