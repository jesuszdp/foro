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
      <td scope="row"><?php echo $row['folio'];?></td>
      <td><?php echo $row['titulo'];?></td>
      <td>
          <?php
              $metodologia = json_decode($row['metodologia'],true);
              echo $metodologia[$lenguaje];
          ?>
      </td>
      <td><?php echo $row['tipo_exposicion'];?></td>
      <td><?php echo $row['promedio_revision'];?></td>
      <td>
        <button type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" data-toggle="modal" data-target="#exampleModal">Ver trabajo</button>
      </td>
    </tr>
  </tbody>
</table>
<!-- END lista_rechazados -->
<script>
  $("#comite").removeClass()
  $("#atencion").removeClass()
  $("#revision").removeClass()
  $("#revisados").removeClass()
  $("#aceptados").removeClass()
  $("#rechazados").addClass("active")
</script>
