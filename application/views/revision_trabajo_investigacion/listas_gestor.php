<!-- listas de estados -->
<div class="schedule-wrapper clear" data-animation="fadeIn" data-animation-delay="200">
  <div class="schedule-tabs lv1">
    <ul id="tabs-lv1"  class="nav nav-justified">
      <li id="comite" onclick="ponerActivo(this)"> <a href="<?php echo base_url("index.php/gestion_revision/listado_control/1"); ?>"><strong>Sin comité</strong> <br/></a></li>
      <li id="atencion" onclick="ponerActivo(this)"> <a href="<?php echo base_url("index.php/gestion_revision/listado_control/2"); ?>" ><strong>Requiere atención</strong> <br/></a></li>
      <li id="revision" onclick="ponerActivo(this)"> <a href="<?php echo base_url("index.php/gestion_revision/listado_control/3"); ?>"><strong>En revisión</strong> <br/></a></li>
      <li id="revisados" onclick="ponerActivo(this)"> <a href="<?php echo base_url("index.php/gestion_revision/listado_control/4"); ?>"><strong>Revisados</strong></a></li>
      <li id="aceptados" onclick="ponerActivo(this)"> <a href="<?php echo base_url("index.php/gestion_revision/listado_control/5"); ?>"><strong>Aceptados</strong> <br/></a></li>
      <li id="rechazados" onclick="ponerActivo(this)"> <a href="<?php echo base_url("index.php/gestion_revision/listado_control/6"); ?>"><strong>Rechazados</strong> <br/></a></li>
    </ul>
  </div>
  <div class="tab-content lv1">
    <!-- tab-sin-comite sin comité -->
    <div id="tab-sin-comite" class="tab-pane fade in active">
      <div class="tab-content lv2">
        <div id="tab-lv21-comite" class="tab-pane fade in active">
          <div class="timeline">
              <?php
                if(isset($list_sn_comite)){
                  echo $list_sn_comite;
                }
                if(isset($list_req_atencion)){
                  echo $list_req_atencion;
                }
                if(isset($list_en_revision)){
                  echo $list_en_revision;
                }
                if(isset($list_revisados)){
                  echo $list_revisados;
                }
                if(isset($lista_aceptados)){
                  echo $lista_aceptados;
                }
                if(isset($list_rechazados)){
                  echo $list_rechazados;
                }
              ?>
          </div>
        </div>
      </div>
    </div>
    <!-- END tab-sin-comite sin comité -->
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



      <!-- <script type="text/javascript">
          $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
          })
      </script> -->


      <!-- <script>
        function ponerActivo(obj){
          console.log(obj)
          console.log(obj.id)
          switch (obj.id) {
            case 'comite':
              //$("#comite").addClass("active")
              break;
            case 'atencion':
              //$("#atencion").addClass("active")
              break;
            case 'revision':
              //$("#revision").addClass("active")
              break;
            case 'revisados':
              //$("#revisados").addClass("active")
              break;
            case 'aceptados':
              //$("#aceptados").addClass("active")
              break;
            case 'rechazados':
              //$("#rechazados").addClass("active")
              break;
            default:

          }
        }
      </script> -->
