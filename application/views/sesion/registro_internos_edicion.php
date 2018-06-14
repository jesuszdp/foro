<br><br>
<h1 class="section-title">
  <span data-animation="flipInY" data-animation-delay="100" class="icon-inner animated flipInY visible"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-ticket fa-stack-1x"></i></span></span>
  <span data-animation="fadeInRight" data-animation-delay="100" class="title-inner animated fadeInRight visible">Editar perfil</span>
</h1>
<section class="panel panel-default">
  <div class="container">
    <!-- Contact form -->
      <br>
      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['matricula']; ?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['matricula'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['ext_nombre']; ?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['nombre'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['ext_ap'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['apellido_paterno'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['ext_am'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['apellido_materno'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['sexo'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['sexo'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['ext_mail'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['email'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['telefono_personal'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['telefono_personal'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['telefono_oficina'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['telefono_oficina'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['pais_origen'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['clave_pais'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['pais_institucion'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['pais_institucion'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['institucion'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['institucion'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['cve_delegacion'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['delegacion'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['lbl_departamento'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['departamento'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>

      <div class="col-sm-12 af-outer af-required">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-2">
          <label for=""><?php echo $language_text['registro_usuario']['lbl_unidad'];?></label>
        </div>
        <div class="">
          <input type="text" name="nombre" value="<?php echo $datos_usuario['unidad'] ?>" class="form-control placeholder" size="30">
        </div>
      </div>
    <!-- /Contact form -->
  </div>
</section>




<div class="col-sm-12">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
        <input id="regform" type="button" data-animation="flipInY" data-animation-delay="100" class="btn btn-theme btn-block submit-button" value="<?php echo $language_text['registro_usuario']['registrar']; ?>" data-tpform="<?php echo $tipo_registro; ?>">
    </div>
</div>
