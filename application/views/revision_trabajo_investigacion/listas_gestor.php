
<!-- listas de estados -->
<div class="schedule-wrapper clear" data-animation="fadeIn" data-animation-delay="200">
  <div class="schedule-tabs lv1">
    <ul id="tabs-lv1"  class="nav nav-justified">
      <li class="active"><a href="#tab-sin-comite" data-toggle="tab"><strong>Sin comité</strong> <br/></a></li>
      <li><a href="#tab-atencion" data-toggle="tab"><strong>Requiere atención</strong> <br/></a></li>
      <li><a href="#tab-en-revision" data-toggle="tab"><strong>En revisión</strong> <br/></a></li>
      <li><a href="#tab-revisados" data-toggle="tab"><strong>Revisados</strong></a></li>
      <li><a href="#tab-aceptados" data-toggle="tab"><strong>Aceptados</strong> <br/></a></li>
      <li><a href="#tab-rechazados" data-toggle="tab"><strong>Rechazados</strong> <br/></a></li>
    </ul>
  </div>

  <div class="tab-content lv1">

    <!-- tab-sin-comite sin comité -->
    <div id="tab-sin-comite" class="tab-pane fade in active">
      <div class="tab-content lv2">
        <div id="tab-lv21-comite" class="tab-pane fade in active">
          <div class="timeline">
            <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal"> <a  style="color:#fff;">Asignar</a> </button>
            <br>
            <!-- lista sin comité -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Folio</th>
                  <th scope="col">Título</th>
                  <th scope="col">Metodología</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="">
                    </div>
                  </td>
                  <td scope="row">12285311F1</td>
                  <td>La medicina general?</td>
                  <td>cualitativo</td>
                  <td>
                    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="">
                    </div>
                  </td>
                  <th scope="row">12285311F2</th>
                  <td>La medicina general</td>
                  <td>cualitativo</td>
                  <td>
                    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="">
                    </div>
                  </td>
                  <th scope="row">12285311F3</th>
                  <td>La medicina general</td>
                  <td>cualitativo</td>
                  <td>
                    <button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- END lista sin comité -->
          </div>
        </div>
      </div>
    </div>
    <!-- END tab-sin-comite sin comité -->

    <!-- tab-atencion requiere atencion -->
    <div id="tab-atencion" class="tab-pane fade">
      <div class="tab-content lv2">
        <div id="tab-lv22-atencion" class="tab-pane fade in active">
          <div class="timeline">

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
                <tr>
                  <th scope="row">12285311F1</th>
                  <td>La medicina general?</td>
                  <td>cualitativo</td>
                  <td>Se agotó el tiempo</td>
                  <td>Se agotó el tiempo</td>
                  <td>Se agotó el tiempo</td>
                  <td>2</td>
                  <td>
                    <button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver trabajo</button>
                    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">12285311F2</th>
                  <td>La medicina general</td>
                  <td>cualitativo</td>
                  <td>Discrepancia</td>
                  <td>Conflicto de interes</td>
                  <td>Se agotó el tiempo</td>
                  <td>5</td>
                  <td>
                    <button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver trabajo</button>
                    <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">12285311F3</th>
                  <td>La medicina general</td>
                  <td>cualitativo</td>
                  <td>Conflicto de interés</td>
                  <td>Se agotó el tiempo</td>
                  <td>Se agotó el tiempo</td>
                  <td>8</td>
                  <td>
                    <button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button">Ver trabajo</button> <br>
                    <button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- END lista_requiere_atencion -->
          </div>
        </div>
      </div>
    </div>
    <!--END tab-atencion requiere atencion -->

    <!-- tab-en-revision en revisión -->
    <div id="tab-en-revision" class="tab-pane fade">
      <div class="tab-content lv2">
        <div id="tab-lv23-en-revision" class="tab-pane fade in active">
          <div class="timeline">
            <h4> <b>Nota:</b> La fecha debajo del nombre del revisor es la fecha límite de evaluación. </h4>
            <br>

            <!-- lista_en_revision -->
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
                <tr>
                  <th scope="row">12285311F1</th>
                  <td>La medicina general?</td>
                  <td>cualitativo</td>
                  <td>Luis Eduardo <br> 05/06/2018</td>
                  <td>Jesus Zoe <br> Concluido</td>
                  <td>MArio Perez <br> 05/06/2018</td>
                  <td>
                    <a class="col-sm-1 btn btn-theme btn-block submit-button" href="detalle_trabajo_gestor.html">Ver trabajo</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">12285311F2</th>
                  <td>La medicina general</td>
                  <td>cualitativo</td>
                  <td>Luis Eduardo <br> 05/06/2018</td>
                  <td>Jesus Zoe <br> Concluido</td>
                  <td>MArio Perez <br> 05/06/2018</td>
                  <td>
                    <a class="col-sm-1 btn btn-theme btn-block submit-button" href="detalle_trabajo_gestor.html">Ver trabajo</a>
                  </tr>
                  <tr>
                    <th scope="row">12285311F3</th>
                    <td>La medicina general</td>
                    <td>cualitativo</td>
                    <td>Luis Eduardo <br> 05/06/2018</td>
                    <td>Jesus Zoe <br> Concluido</td>
                    <td>MArio Perez <br> 05/06/2018</td>
                    <td><a class="col-sm-1 btn btn-theme btn-block submit-button" href="detalle_trabajo_gestor.html">Ver trabajo</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- END lista_en_revision -->
            </div>
          </div>

        </div>
      </div>
      <!-- END tab-en-revision en revisión -->


      <!-- tab-revisados revisados -->
      <div id="tab-revisados" class="tab-pane fade">
        <div class="tab-content lv2">
          <div id="tab-lv24-last" class="tab-pane fade in active">
            <div class="timeline">
              <!-- contadores de lugares para oratoria y lugares para cartel -->
              <div class="col-sm-12">
                <div class="col-sm-3">
                  <h3> Lugares para Oratoria</h3><br>
                  <h3>10 / 20</h3>
                </div>
                <div class="col-sm-3">
                  <h3> Lugares para Oratoria</h3><br>
                  <h3>10 / 20</h3>
                </div>
              </div>
              <!-- END contadores de lugares para oratoria y lugares para cartel -->


              <!-- botones cerrar proceso, guardar cambios y sugerir dictamen -->
              <div class="col-sm-12">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-3">
                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;">Sugerir dictamen</a> </button>
                </div>
                <div class="col-sm-3">
                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;">Guardar cambio</a> </button>
                </div>
                <div class="col-sm-3">
                  <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal2"> <a  style="color:#fff;">Cerrar proceso</a> </button>
                </div>
              </div>
              <!-- END botones cerrar proceso, guardar cambios y sugerir dictamen -->
              <br><br>

              <!--  lista_revisados -->
              <table class="table">
                <thead>
                  <tr>
                    <!-- <th scope="col"></th> -->
                    <th scope="col">Folio</th>
                    <th scope="col">Título</th>
                    <th scope="col">Metodología</th>
                    <th scope="col">R1</th>
                    <th scope="col">R2</th>
                    <th scope="col">R3</th>
                    <th scope="col">Puntaje</th>
                    <th>Propuesta de dictamen</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">12285311F1</td>
                    <td>La medicina general?</td>
                    <td>cualitativo</td>
                    <td>Juan Cuadros< <br> Cartel </td>
                    <td>Maria Juarez <br> Cartel </td>
                    <td>Mario Perez <br> Cartel</td>
                    <td>90</td>
                    <td>Aceptado para exposición con cartel</td>
                    <td>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">12285311F2</th>
                    <td>La medicina general</td>
                    <td>cualitativo</td>
                    <td>Juan Cuadros< <br> Cartel </td>
                    <td>Maria Juarez <br> Cartel</td>
                    <td>N/A</td>
                    <td>95</td>
                    <td>Aceptado para oratoria</td>
                    <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                    </td>
                  </tr>
                  <tr>

                    <th scope="row">12285311F3</th>
                    <td>La medicina general</td>
                    <td>cualitativo</td>
                    <td>Santiago valladolid <br> Cartel </td>
                    <td>Mario Juarez <br> Cartel</td>
                    <td>N/A</td>
                    <td>80</td>
                    <td>Aceptado para oratoria</td>
                    <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">12285311F3</th>
                    <td>La medicina general</td>
                    <td>cualitativo</td>
                    <td>Antonio Flores <br> Cartel</td>
                    <td>Cristian Matias <br> Cartel</td>
                    <td>N/A</td>
                    <td>50</td>
                    <td>Aceptado para oratoria</td>
                    <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">12285311F3</th>
                    <td>La medicina general</td>
                    <td>cualitativo</td>
                    <td>Antonio Flores</td>
                    <td>Cristian Matias</td>
                    <td>N/A</td>
                    <td>20</td>
                    <td>Aceptado para oratoria</td>
                    <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">12285311F3</th>
                    <td>La medicina general</td>
                    <td>cualitativo</td>
                    <td>Antonio Flores</td>
                    <td>Cristian Matias</td>
                    <td>N/A</td>
                    <td>100</td>
                    <td>Rechazado</td>
                    <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button"> <a href="detalle_trabajo_gestor.html" style="color:#fff;">Ver detalle</a> </button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- END lista_revisados -->
            </div>
          </div>
        </div>
      </div>
      <!-- END lista_revisados -->

      <!-- tab-aceptados aceptados -->
      <div id="tab-aceptados" class="tab-pane fade">
        <div class="tab-content lv2">
          <div id="tab-lv24-aceptados" class="tab-pane fade in active">
            <div class="timeline">
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
                  <tr>
                    <th scope="row">12285311F1</th>
                    <td>La medicina general?</td>
                    <td>cualitativo</td>
                    <td>Oratoria</td>
                    <td>90</td>
                    <td><a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                      <!-- <a href="#">Evaluar</a> -->
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">12285311F2</th>
                    <td>La medicina general</td>
                    <td>cualitativo</td>
                    <td>Oratoria</td>

                    <td>95</td>
                    <td><a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                      <!-- <a href="#">Evaluar</a> -->
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">12285311F3</th>
                    <td>La medicina general</td>
                    <td>cualitativo</td>
                    <td>Oratoria</td>

                    <!-- <td>Mario Perez</td> -->
                    <td>80</td>
                    <td><a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                      <!-- <a href="#">Evaluar</a> -->
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- END aceptados -->
            </div>
          </div>
        </div>
      </div>
      <!-- END tab-aceptados aceptados -->


      <!-- tab-rechazados rechazados-->
      <div id="tab-rechazados" class="tab-pane fade">
        <div class="tab-content lv2">
          <div id="tab-lv23-rechazados" class="tab-pane fade in active">
            <div class="timeline">
              <!-- lista_rechazados -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Folio</th>
                    <th scope="col">Título</th>
                    <th scope="col">Metodología</th>
                    <th scope="col">Tipo de exposición</th>
                    <th scope="col">Puntaje</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">12285311F1</th>
                    <td>La medicina general?</td>
                    <td>cualitativo</td>
                    <td>Oratoria</td>
                    <td>90</td>
                    <td>Tema relacionado</td>
                    <td>
                      <a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">12285311F2</th>
                    <td>La medicina general</td>
                    <td>cualitativo</td>
                    <td>Oratoria</td>
                    <td>95</td>
                    <td>Tema relacionado</td>
                    <td>
                      <a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">12285311F3</th>
                    <td>La medicina general</td>
                    <td>cualitativo</td>
                    <td>Oratoria</td>
                    <td>80</td>
                    <td>Tema relacionado</td>
                    <td>
                      <a class="col-sm-1 btn btn-theme btn-block submit-button" href="resumen_revision_ti_view.html">Ver</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- END lista_rechazados -->
            </div>
          </div>
        </div>
      </div>
      <!--END tab-rechazados rechazados-->
    </div>
  </div>
  <!-- END listas de estados -->
