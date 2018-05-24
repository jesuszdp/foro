<?php
  if(isset($data_sn_comite))
  {
      if($data_sn_comite['success'])
      {
          if(count($data_sn_comite['result']) > 0)
          {
?>
            <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal"> <a  style="color:#fff;"><?php echo $opciones_secciones['btn_asignar'];?></a> </button>
            <br>
            <!-- lista sin comité -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"><?php echo $opciones_secciones['col_folio'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_titulo'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_metodologia'];?></th>
                  <th scope="col"><?php echo $opciones_secciones['col_opciones'];?></th>
                </tr>
              </thead>
              <tbody>
<?php
              $lenguaje = obtener_lenguaje_actual();
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
                    <td>
                      <?php
                          $metodologia = json_decode($row['metodologia'],true);
                          echo $metodologia[$lenguaje];
                      ?>
                    </td>
                    <td>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal"><?php echo $opciones_secciones['btn_asignar'];?></button>
                      <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal"><?php echo $opciones_secciones['btn_ver'];?></button>
                    </td>
                  </tr>
  <?php
              }
          }
          else
          {
  ?>
          <h3><?php echo $opciones_secciones['sn_mensaje'];?></h3>
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
<!-- END lista sin comité -->

      <!-- Modal 2 -->
      <!-- <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Lorem Ipsum ... </th>
                      <td>

                           <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Cartel
                           </button>
                           <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Ponencia
                           </button>


                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Lorem Ipsum ...</th>
                      <td>
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Cartel
                        </button>
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Ponencia
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Lorem Ipsum ...</th>
                      <td>
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Cartel
                        </button>
                        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="dropdown">Ponencia
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Lorem Ipsum ...</th>

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
              <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div> -->
      <!-- Modal -->

      <script type="text/javascript">
          /*$('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
          })*/
      </script>



<script>
$(document).ready(function(){
    $(document).ready(function () {
        $(".btn-asignar").on('click', function (e) {
            var f = $(this).data('f');
            //console.log('hola'+f);
            data_ajax(site_url + '/gestion_revision/asignar_revisor/' + f, null, "#modal_contenido");
        });
    });
});
  $("#comite").addClass("active");
  $("#atencion").removeClass();
  $("#revision").removeClass();
  $("#revisados").removeClass();
  $("#aceptados").removeClass();
  $("#rechazados").removeClass();
</script>
