<div class="schedule-tabs lv2">
  <ul id="tabs-lv21"  class="nav nav-justified">
    <li id="asignados"  onclick="ponerActivo(this)"><a href="<?php echo base_url("index.php/gestion_revision/listado_control/4/8"); ?>"><strong><?php echo $language_text['tab_asignados']; ?></strong><br/> </a></li>
    <li id="sin_asignar" onclick="ponerActivo(this)"><a href="<?php echo base_url("index.php/gestion_revision/listado_control/4/7"); ?>"> <strong><?php echo $language_text['tab_sin_asignar']; ?></strong><br/></a></li>
  </ul>
</div>
<br>
<!-- contadores de lugares para oratoria y lugares para cartel -->
<div class="col-sm-12">
  <div class="col-sm-3">
    <h4 class=""> <?php echo $language_text['lbl_oral'];?></h4>
    <h3>10 / 20</h3>
  </div>
  <div class="col-sm-3">
    <h4> <?php echo $language_text['lbl_cartel'];?></h4>
    <h3>10 / 20</h3>
  </div>
  <div class="col-sm-3">
    <h4><?php echo $language_text['lbl_cartel'];?></h4>
    <h3>1 / 55</h3>

  </div>
  <div class="col-sm-3">
    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $language_text['btn_manual'];?></a> </button>
    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $language_text['btn_automatico'];?></a> </button>
    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;"><?php echo $language_text['btn_cerrar'];?></a> </button>
  </div>
  <br><br>
</div>


    <!-- <div id="main"> -->
        <section class="page-section background-img">
            <div class="container">
                <div class="row">
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


              <div class="sectionEvaluacion col-sm-12" id="secTrabajoInv">
                <h3>Trabajo de investigación</h3>
                <img src="../public/img/arrowdown.png" alt="">
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
              <div class="sectionEvaluacion col-sm-12" id="secEvaluacion">
                <h3>
                  Evaluación
                </h3>
                <img src="../public/img/arrowdown.png" alt="">
              </div>
              <div id="hideEvaluacion" class="panel panel-default" style="display:none;">
                <div class="panel-body">
                    <input type="checkbox" name="educativo" value="educativo" onchange="cambioEvaluacion(this)"> Es de caracter educativo en salud &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="conflicto" value="conflicto" onchange="cambioEvaluacion(this)"> No tengo conflicto de interés para revisar
                    <div id="seccionesEva">
                      <section class="rubro" id="seccion1">
                        <p class="textRubro">CALIDAD DE RESUMEN</p>
                        <img class="arrow-black" src="../public/img/arrowdownblack.png" alt="">
                      </section>
                      <section class="todosRubros" id="rubro1" style="display:none;">
                          <form action="">
                            Calificación: <input /> <small id="textCalidad"></small>
                            <br>
                            <br>
                            <input type="radio" name="calidad" value="calidad1" onchange="cambio(this)">
                            1. No existe ni congruencia en las ideas y tampoco hay referente teórico
                            entre los apartados. La ortografía tiene más de dos errores.
                            <br>
                            <br>
                            <input type="radio" name="calidad" value="calidad2" onchange="cambio(this)">
                            2. Existe orden en las ideas. No existe congruencias entre los apartados
                            y no hay referente teórico en los mismos. La ortografía tiene más de dos errores.
                            <br>
                            <br>
                            <input type="radio" name="calidad" value="calidad3" onchange="cambio(this)">
                            3. Existe orden en las ideas Las ideas son congruentes  entre cada uno
                            de los apartados. No existe referente teórico en los apartados. La ortografía tiene
                            mas de dos errores.
                            <br>
                            <br>
                            <input type="radio" name="calidad" value="calidad4" onchange="cambio(this)">
                            4. Existe orden en las ideas. Las idean son congruentes entre cada uno de los
                            apartados. Existen referente teórico en los apartados. La ortografía tiene menos
                            de dos errores.
                            <br>
                            <br>
                            <input type="radio" name="calidad" value="calidad5" onchange="cambio(this)">
                            5. Existe orden en las ideas. Las ideas son congruentes entre cada uno de los
                            apartados. Su referente teórico es explícito en los apartados. Sin errores en la
                            ortigrafía.
                            <br>
                          </form>
                      </section>



                      <br>
                      <label for="">Escriba sus observaciones: </label><br>
                      <textarea name="name" rows="8" cols="80"></textarea><br><br>
                      <label for="">Sugerencia de dictamen</label>
                      <select class="" name="">
                        <option value="">Cartel</option>
                        <option value="">Oratoria</option>
                        <!-- <option value="">Rechazar</option> -->
                      </select>
                    </div>
                    <section id="sec_b">
                      <a href="evaluacion_terminada.html" class="btn btn-theme btn-block submit-button animated flipInY visible">Finalizar evaluación </a>  <i class="fa fa-arrow-circle-right"></i></button>
                    </section>
                  </form>
                </div>
              </div>

        </div>
      </div>
    </section>
<?php
//if(isset($list_asignados)){
//  echo $list_asignados;
//}
//if(isset($list_sin_asignar)){
//  echo $list_sin_asignar;
//}
?>
<script>
$("#comite").removeClass()
$("#atencion").removeClass()
$("#revision").removeClass()
$("#revisados").addClass("active")
$("#aceptados").removeClass()
$("#rechazados").removeClass()
$("#sin_asignar").removeClass("active")
</script>

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
