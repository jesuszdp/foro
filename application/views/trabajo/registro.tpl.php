<?php echo js('trabajo_investigacion/registro.js'); ?>

<div class="panel panel-default">
    <h1 class="page-head-line">Registrar nuevo trabajo de investigación</h1>
    <div class="panel-body">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-offset-1 col-sm-10">
    				<?php
    				if(isset($msg))
    				{
    					echo '<div class="alert alert-'.$msg_type.'">';
    					echo $msg.'<strong>'.$folio.'</strong>';
						?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					  <?php
					  echo '</div>';
						}
					?>
    			</div>
    		</div><!--row-->
    		<?php echo form_open('registro_investigacion/nuevo', array('id' => 'form_registro_investigacion', 'class'=>'form-horizontal', 'data-toggle'=>"validator", 'role'=>"form")); ?>
    		<div class="row">
	    		<div class="col-sm-offset-2 col-sm-8">
				    <div class="form-group">
				      <label for="titulo" class="col-sm-3 control-label">Titulo*:</label>
				      <div class="col-sm-9">
				      	<input type="text" class="form-control" id="titulo" name="titulo" <?php if(isset($trabajo['titulo'])) echo 'value="'.$trabajo['titulo'].'"';?> required>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="tipo_metodologia" class="col-sm-3 control-label">Tipo de metodología*:</label>
				      <div class="col-sm-9">
				      	<?php 
								echo $this->form_complete->create_element(
										array(
											'id' => 'tipo_metodologia',
											'name' => 'tipo_metodologia',
											'type' => 'dropdown',
											'attributes' => array(
													'class'=>'form-control'
												),
											'first' => array('' => 'Selecciona una opción'),
											'value' => (isset($trabajo['id_tipo_metodologia']))? $trabajo['id_tipo_metodologia'] : '',
											'options' => dropdown_options($tipos_metodologias,'id_tipo_metodologia','nombre')
										)
									);
								echo '<br>';
								echo form_error_format('tipo_metodologia');
								?>
				      </div>
				    </div>
				     <div class="form-group">
				      <label for="metodologia" class="col-sm-3 control-label">Metodologia*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="metodologia" name="metodologia" required><?php if(isset($trabajo['metodologia'])) echo $trabajo['metodologia'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="antecedentes" class="col-sm-3 control-label">Antecedentes*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="antecedentes" name="antecedentes" required><?php if(isset($trabajo['antecedentes'])) echo $trabajo['antecedentes'];?></textarea>
				      </div>
				    </div>
				     <div class="form-group">
				      <label for="problema" class="col-sm-3 control-label">Planteamiento del problema*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="problema" name="problema" required><?php if(isset($trabajo['problema'])) echo $trabajo['problema'];?></textarea>
				      </div>
				    </div>
				     <div class="form-group">
				      <label for="justificacion" class="col-sm-3 control-label">Justificacion*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="justificacion" name="justificacion" required><?php if(isset($trabajo['justificacion'])) echo $trabajo['justificacion'];?></textarea>
				      </div>
				    </div>
				     <div class="form-group">
				      <label for="pregunta_investigacion" class="col-sm-3 control-label">Pregunta de investigación*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="pregunta_investigacion" name="pregunta_investigacion" required><?php if(isset($trabajo['pregunta_investigacion'])) echo $trabajo['pregunta_investigacion'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="objetivo" class="col-sm-3 control-label" required>Objetivo*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="objetivo" name="objetivo" required><?php if(isset($trabajo['objetivo'])) echo $trabajo['objetivo'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="hipotesis" class="col-sm-3 control-label">Hipótesis y/o supuestos teóricos*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="hipotesis" name="hipotesis" required><?php if(isset($trabajo['hipotesis'])) echo $trabajo['hipotesis'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="resultados" class="col-sm-3 control-label">Resultados*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="resultados" name="resultados" required><?php if(isset($trabajo['resultados'])) echo $trabajo['resultados'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="conclusiones" class="col-sm-3 control-label">Conclusiones*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="conclusiones" name="conclusiones" required><?php if(isset($trabajo['conclusiones'])) echo $trabajo['conclusiones'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="consideraciones_eticas" class="col-sm-3 control-label">Consideraciones éticas*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="consideraciones_eticas" name="consideraciones_eticas" required><?php if(isset($trabajo['consideraciones_eticas'])) echo $trabajo['consideraciones_eticas'];?></textarea>
				      </div>
				    </div>
						<div class="form-group">
							<label for="publicado" class="col-sm-3 control-label">¿Usted ya ha publicado su trabajo?*</label>
							<div class="col-sm-9">
								<input type="radio" name="publicado" value="true"> Sí<br>
	  						<input type="radio" name="publicado" value="false" checked> No<br>
							</div>
						</div>
						<div class="form-group">
				      <label for="referencia" class="col-sm-3 control-label">En caso de haberlo publicado, ingrese la o las referencias para encontrarlo:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="4" id="referencia" name="referencia"><?php if(isset($trabajo['referencia'])) echo $trabajo['referencia'];?></textarea>
				      </div>
				    </div>
					</div>
				</div> <!--row-->
				<div class="row">
					<div class="col-sm-12">
				  	A continuación ingrese los datos de los demás autores con los que realizó el trabjo de investigación. <br>El campo de matrícula solo aplica para trabajadores IMSS, ingreselo si lo conoce.
				  	<br><br>
				  	<button id="btnAddRow" type="button">Agregar autor</button>
				  	<br><br>
				  	<div class="table-responsive" style="overflow:scroll;">
				  	<table id="tabla_autores" class="table table-striped table-bordered">
				  		<thead>
				  			<tr>
				  				<th>Trabajador IMSS</th>
				  				<th>Matrícula</th>
				  				<th>Nombre*</th>
				  				<th>Apellido Paterno*</th>
				  				<th>Apellido Materno*</th>
				  				<th>Sexo*</th>
				  				<th>País de origen*</th>
				  				<th></th>
				  			</tr>
				  		</thead>
				  		<tbody>
				  			<tr>
				  				<!--<td><input type="checkbox" name="autor_imss[]"></td>-->
				  				<td>
				  					<select name="autor_imss[]">
				  						<option value="0">No</option>
				  						<option value="1">Si</option>
				  					</select>
				  				</td>
				  				<td><input type="text" name="autor_matricula[]"></td>
				  				<td><input type="text" name="autor_nombre[]"></td>
				  				<td><input type="text" name="autor_app[]"></td>
				  				<td><input type="text" name="autor_apm[]"></td>
				  				<td>
				  					<select name="autor_sexo[]">
				  						<option value="">Selecciona una opción</option>
				  						<option value="H">Masculino</option>
				  						<option value="M">Femenino</option>
				  						<option value="O">Otro</option>
				  					</select>
				  				</td>
				  				<!--<td><input type="text" name="autor_pais[]"></td>-->
				  				<td>
				  					<select name="autor_pais[]">
				  						<?php
				  						echo '<option value="">Selecciona un país</option>';
				  						foreach ($paises as $key => $value) {
				  							echo '<option value="'.$key.'">'.$value.'</option>';
				  						}
				  						?>
				  					</select>
				  				</td>
				  			</tr>
				  		</tbody>
				  	</table>
				  	</div>
				  </div>
				</div><!--row-->
			  <div class="row">
			  	<div class="col-sm-offset-2 col-sm-8">
			  	
			  	</div>
			  </div><!--row-->
			  <div class="row">
			  	<div class="col-sm-offset-2 col-sm-8">
			  	<center>
			  		<button class="btn btn-primary">Registrar</button>
			  		<a href="<?php echo site_url('registro_investigacion');?>" class="btn btn-warning">Cancelar</a>
			  	</center>
			  	</div>
			  </div><!--row-->
				<?php echo form_close(); ?>
    	</div>
    </div>
</div>