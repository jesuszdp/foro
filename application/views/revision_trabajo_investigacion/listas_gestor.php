
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
            <?php
              if(isset($list_sn_comite))
              {
                echo $list_sn_comite;
              }
            ?>
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
            <?php
              if(isset($list_req_atencion))
              {
                echo $list_req_atencion;
              }
            ?>
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
            <?php
              if(isset($list_en_revision))
              {
                echo $list_en_revision;
              }
            ?>
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
              <?php
                if(isset($list_revisados))
                {
                  echo $list_revisados;
                }
              ?>
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
              <!-- Tabla de aceptados -->
              <?php
                if(isset($lista_aceptados))
                {
                  echo $lista_aceptados;
                }
              ?>
              <!-- Aquí va -->
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
              <?php
                if(isset($list_rechazados))
                {
                  echo $list_rechazados;
                }
              ?>
            </div>
          </div>
        </div>
      </div>
      <!--END tab-rechazados rechazados-->
    </div>
  </div>
  <!-- END listas de estados -->

  <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"  role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Asignar revisor(es)</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Especialidad</th>
                      <th scope="col">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Juan Cuadros </th>
                      <td>Diabetes</td>
                      <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Mariana Reyes</th>
                      <td>Medicina general</td>
                      <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Cristina Pacheco</th>
                      <td>Neurocirugia</td>
                      <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Cristina Pacheco</th>
                      <td>Neurocirugia</td>
                      <td><button type="button" data-animation="flipInY" data-animation-delay="100" class="col-sm-1 btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                      </td>
                    </tr>
                  </tbody>
                  </table>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-dismiss="modal">cerrar</button> -->
              <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->

      <!-- Modal 2 -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"  role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel2">Dictamen</h3>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nombre del trabajo</th>
                      <!-- <th scope="col">Puntua</th>
                      <th scope="col">Opciones</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Lorem Ipsum ... </th>
                      <!-- <td>Diabetes</td> -->
                      <td>
                        <!-- <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button> -->
                           <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Cartel
                           </button>
                           <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Ponencia
                           </button>


                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Lorem Ipsum ...</th>
                      <!-- <td>Medicina general</td> -->
                      <td>
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Cartel
                        </button>
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Ponencia
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Lorem Ipsum ...</th>
                      <!-- <td>Neurocirugia</td> -->
                      <td>
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Cartel
                        </button>
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Ponencia
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Lorem Ipsum ...</th>
                      <!-- <td>Neurocirugia</td> -->
                      <td>
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Cartel
                        </button>
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Ponencia
                        </button>
                      </td>
                    </tr>
                  </tbody>
                  </table>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-dismiss="modal">cerrar</button> -->
              <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
