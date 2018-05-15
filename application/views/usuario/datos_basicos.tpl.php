<?php
if (isset($status) && $status)
{
    echo html_message('Usuario actualizado con éxito', 'success');
}
// pr($usuario);
?>

<div class="col-md-12 form-inline" role="form" id="informacion_general">

    <form class="form-horizontal" id="form_datos_generales" method="post" accept-charset="utf-8">


<div class="row">

    <div class="col-md-2">
       <label class="righthoralign control-label">
      Matrícula: </label>
    </div>
    <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon">
              <span class="fa fa-male"> </span>
          </span>
            <?php
                echo $this->form_complete->create_element(array(
                    'id' => 'matricula',
                    'type' => 'text',
                    'value' => $usuario['matricula'],
                    'attributes' => array(
                        'readonly' => ' ',
                        'class' => 'form-control',
                        'required' => true
                    )));
            ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
          <div class="col-md-4">
              <label for="materno" class="control-label">
                  Nombre:</label>
          </div>
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-female"> </span>
                </span>
                <?php
                echo $this->form_complete->create_element(array(
                    'id' => 'nombre',
                    'type' => 'text',
                    'value' => $usuario['nombre'],
                    'attributes' => array('class' => 'form-control', 'required' => true)));
                ?>
              </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">

    <div class="col-md-2">
       <label class="righthoralign control-label">
      Apellido paterno: </label>
    </div>
    <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon">
              <span class="fa fa-male"> </span>
          </span>
          <?php
          echo $this->form_complete->create_element(array(
              'id' => 'apellido_paterno',
              'type' => 'text',
              'value' => $usuario['apellido_paterno'],
              'attributes' => array('class' => 'form-control', 'required' => true)));
          ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
          <div class="col-md-4">
              <label for="materno" class="control-label">
                  Apellido materno:</label>
          </div>
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-female"> </span>
                </span>
                <?php
                echo $this->form_complete->create_element(array(
                    'id' => 'apellido_materno',
                    'type' => 'text',
                    'value' => $usuario['apellido_materno'],
                    'attributes' => array('class' => 'form-control')));
                ?>
              </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">

    <div class="col-md-2">
       <label class="righthoralign control-label">
      Sexo: </label>
    </div>
    <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon">
              <span class="fa fa-male"> </span>
          </span>
          <?php
          echo $this->form_complete->create_element(array(
              'id' => 'sexo',
              'type' => 'dropdown',
              'value' => $usuario['sexo'],
              'options' => array(En_sexo::MASCULINO=>$language_text['registro_usuario']['ext_sexo_m'], En_sexo::FEMENINO=>$language_text['registro_usuario']['ext_sexo_f'], En_sexo::OTRO=>$language_text['registro_usuario']['ext_sexo_o']),
              'attributes' => array('class' => 'form-control', 'required' => true)));
          ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
          <div class="col-md-4">
              <label for="materno" class="control-label">
                  Fecha de nacimiento:</label>
          </div>
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-female"> </span>
                </span>
                <?php
                echo $this->form_complete->create_element(array(
                    'id' => 'fecha_nacimiento',
                    'type' => 'date',
                    'value' => $usuario['fecha_nacimiento'],
                    'attributes' => array('class' => 'form-control', 'required' => true)));
                ?>
              </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">

    <div class="col-md-2">
       <label class="righthoralign control-label">
      Correo electrónico: </label>
    </div>
    <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon">
              <span class="fa fa-male"> </span>
          </span>
          <?php
          echo $this->form_complete->create_element(array(
              'id' => 'email',
              'type' => 'email',
              'value' => $usuario['email'],
              'attributes' => array('name' => 'email', 'class' => 'form-control', 'required' => true)));
          ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
          <div class="col-md-4">
              <label for="materno" class="control-label">
                  Departamento:</label>
          </div>
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-female"> </span>
                </span>
                <input type="hidden" name="departamento" id="departamento" value="<?php echo $usuario['clave_departamental']; ?>">
                <?php
                echo $this->form_complete->create_element(array(
                    'id' => 'departamento_texto',
                    'type' => 'text',
                    'value' => $usuario['clave_departamental'],
                    'attributes' => array('name' => 'departamento_texto', 'class' => 'form-control', 'autocomplete' => 'off', 'required' => true)));
                ?>
                <ul class="ul-autocomplete" id="unidad_autocomplete" style="display:none;">

                </ul>
              </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">

    <div class="col-md-2">
       <label class="righthoralign control-label">
      Categoría: </label>
    </div>
    <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon">
              <span class="fa fa-male"> </span>
          </span>
          <input type="hidden" name="categoria" id="categoria" value="<?php echo $usuario['id_categoria']; ?>">
          <?php
          echo $this->form_complete->create_element(array(
              'id' => 'categoria_texto',
              'type' => 'text',
              'value' => $usuario['clave_categoria'],
              'attributes' => array(
                  'name' => 'categoria_texto',
                  'class' => 'form-control',
                  'autocomplete' => 'off',
                  'required' => true
              )));
          ?>
          <ul class="ul-autocomplete" id="categoria_autocomplete" style="display:none;">

          </ul>
        </div>
    </div>
    <!-- <div class="col-md-6">
        <div class="row">
          <div class="col-md-4">
              <label for="materno" class="control-label">
                  Clave de contratación:</label>
          </div>
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-female"> </span>
                </span>
                <?php
                echo $this->form_complete->create_element(array(
                    'id' => 'cve_tipo_contratacion',
                    'type' => 'text',
                    'value' => $usuario['cve_tipo_contratacion'],
                    'attributes' => array('class' => 'form-control')));
                ?>
              </div>
            </div>
        </div>
    </div> -->
</div>
<br>
<div class="row">

    <div class="col-md-2">
       <label class="righthoralign control-label">
      CURP: </label>
    </div>
    <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon">
              <span class="fa fa-male"> </span>
          </span>
          <?php
          echo $this->form_complete->create_element(array(
              'id' => 'curp',
              'type' => 'text',
              'value' => $usuario['curp'],
              'attributes' => array('class' => 'form-control', 'required' => true)));
          ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
          <div class="col-md-4">
              <label for="materno" class="control-label">
                  RFC: </label>
          </div>
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-female"> </span>
                </span>
                <?php
                echo $this->form_complete->create_element(array(
                    'id' => 'rfc',
                    'type' => 'text',
                    'value' => $usuario['rfc'],
                    'attributes' => array('class' => 'form-control')));
                ?>
              </div>
            </div>
        </div>
    </div>
</div>
<br>


<div class="row">

    <div class="col-md-2">
       <label class="righthoralign control-label">
      Teléfono laboral: </label>
    </div>
    <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon">
              <span class="fa fa-male"> </span>
          </span>
          <?php
          echo $this->form_complete->create_element(array(
              'id' => 'telefono_oficina',
              'type' => 'text',
              'value' => $usuario['telefono_oficina'],
              'attributes' => array('class' => 'form-control')));
          ?>
      </div>
        </div>

    <div class="col-md-6">
        <div class="row">
          <div class="col-md-4">
              <label for="materno" class="control-label">
                  Teléfono particular: </label>
          </div>
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-female"> </span>
                </span>
                <?php
                echo $this->form_complete->create_element(array(
                    'id' => 'telefono_personal',
                    'type' => 'text',
                    'value' => $usuario['telefono_personal'],
                    'attributes' => array('class' => 'form-control')));
                ?>
              </div>
            </div>
        </div>
    </div>
</div>

</form>
</div>

<br>
<div class="col-md-12">
  <div class="col-md-5">

  </div>
  <div class="col-md-1">
      <label class=" control-label"></label>
      <button id="submit" name="submit" type="submit" class="btn btn-success"  style=" background-color:#008EAD">Guardar <span class=""></span></button>
  </div>

</div>
