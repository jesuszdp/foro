<!-- lista_rechazados -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">Folio</th>
      <th scope="col">Título</th>
      <th scope="col">Metodología</th>
      <th scope="col">Tipo de exposición</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(isset($data_rechazados))
    {
        if($data_rechazados['success'])
        {
            if(count($data_rechazados['result']) > 0)
            {
                foreach ($data_rechazados['result'] as $row)
                {
    ?>
    <tr>
      <td scope="row"><?php echo $row['folio'];?></td>
      <td><?php echo $row['titulo'];?></td>
      <td><?php echo $row['metodologia'];?></td>
      <td><?php echo $row['tipo_exposicion'];?></td>
      <td>
        <a href="" type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button">Evaluar</a>
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
          <h3><?php echo $data_rechazados['msg'];?></h3>
    <?php
          }
      }else
      {
    ?>
        <h3>Algo salió mal, vuelve a intentarlo más tarde!</h3>
    <?php
      }
    ?>


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
