<?php
  if(isset($data_sn_comite))
  {
?>
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
<?php
      if($data_sn_comite['success'])
      {
          if(count($data_sn_comite['result']) > 0)
          {
              foreach ($data_sn_comite['result'] as $row)
              {
  ?>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="">
                      </div>
                    </td>
                    <td scope="row"><?php echo $row['folio'];?></td>
                    <td><?php echo $row['titulo'];?></td>
                    <td><?php echo $row['metodologia'];?></td>
                    <td>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Asignar</button>
                    </td>
                  </tr>
  <?php
              }
          }
          else
          {
  ?>
          <h3>No hay trabajos sin comite!</h3>
  <?php

          }
      }
      else
      {
  ?>
      <h3><?php echo $data_sn_comite['msg'];?></h3>
  <?php
      }
  ?>
      </tbody>
    </table>
  <?php
  }else
  {
  ?>
    <h3>Algo salió mal, vuelve a intentarlo más tarde!</h3>
  <?php
  }
?>
<!-- END lista sin comité -->

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

      <script type="text/javascript">
          $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
          })
      </script>



<script>
  $("#comite").addClass("active")
  $("#atencion").removeClass()
  $("#revision").removeClass()
  $("#revisados").removeClass()
  $("#aceptados").removeClass()
  $("#rechazados").removeClass()
</script>
