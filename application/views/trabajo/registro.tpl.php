<?php echo js('trabajo_investigacion/registro.js'); ?>
<?php //pr($language_text); ?>

<div class="panel panel-default">
    <h1 class="page-head-line"><?php echo $language_text['registro_trabajo']['titulo_registro'];?></h1>
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
				      <label for="titulo" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['titulo_trabajo'];?>*:</label>
				      <div class="col-sm-9">
				      	<input type="text" class="form-control" id="titulo" name="titulo" <?php if(isset($trabajo['titulo'])) echo 'value="'.$trabajo['titulo'].'"';?> required>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="tipo_metodologia" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['tipo_metodologia'];?>*:</label>
				      <div class="col-sm-9">
				      <select id="id_tipo_metodologia" name="id_tipo_metodologia" class="form-control">
	  						<?php
	  						echo '<option value="">'.$language_text['template_general']['sin_op'].'</option>';
	  						foreach ($tipos_metodologias as $key => $value) {
	  							echo '<option value="'.$key.'">'.$value.'</option>';
	  						}
	  						?>
	  					</select>
				      	<?php 
				      	/*
								echo $this->form_complete->create_element(
										array(
											'id' => 'tipo_metodologia',
											'name' => 'tipo_metodologia',
											'type' => 'dropdown',
											'attributes' => array(
													'class'=>'form-control'
												),
											'first' => array('' => '<?php echo $language_text['template_general']['sin_op'];?>'),
											'value' => (isset($trabajo['id_tipo_metodologia']))? $trabajo['id_tipo_metodologia'] : '',
											'options' => dropdown_options($tipos_metodologias,'id_tipo_metodologia','nombre')
										)
									);
								echo '<br>';
								echo form_error_format('tipo_metodologia');
								*/
								?>
				      </div>
				    </div>
				     <div class="form-group">
				      <label for="metodologia" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['metodologia'];?>*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="metodologia" name="metodologia" required><?php if(isset($trabajo['metodologia'])) echo $trabajo['metodologia'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="antecedentes" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['antecedentes'];?>*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="antecedentes" name="antecedentes" required><?php if(isset($trabajo['antecedentes'])) echo $trabajo['antecedentes'];?></textarea>
				      </div>
				    </div>
				     <div class="form-group">
				      <label for="problema" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['problema'];?>*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="problema" name="problema" required><?php if(isset($trabajo['problema'])) echo $trabajo['problema'];?></textarea>
				      </div>
				    </div>
				     <div class="form-group">
				      <label for="justificacion" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['justificacion'];?>*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="justificacion" name="justificacion" required><?php if(isset($trabajo['justificacion'])) echo $trabajo['justificacion'];?></textarea>
				      </div>
				    </div>
				     <div class="form-group">
				      <label for="pregunta_investigacion" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['pregunta_investigacion'];?>*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="pregunta_investigacion" name="pregunta_investigacion" required><?php if(isset($trabajo['pregunta_investigacion'])) echo $trabajo['pregunta_investigacion'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="objetivo" class="col-sm-3 control-label" required><?php echo $language_text['registro_trabajo']['objetivo'];?>*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="objetivo" name="objetivo" required><?php if(isset($trabajo['objetivo'])) echo $trabajo['objetivo'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="hipotesis" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['hipotesis'];?>*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="hipotesis" name="hipotesis" required><?php if(isset($trabajo['hipotesis'])) echo $trabajo['hipotesis'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="resultados" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['resultados'];?>*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="resultados" name="resultados" required><?php if(isset($trabajo['resultados'])) echo $trabajo['resultados'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="conclusiones" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['conclusiones'];?>*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="conclusiones" name="conclusiones" required><?php if(isset($trabajo['conclusiones'])) echo $trabajo['conclusiones'];?></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="consideraciones_eticas" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['consideraciones_eticas'];?>*:</label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="3" id="consideraciones_eticas" name="consideraciones_eticas" required><?php if(isset($trabajo['consideraciones_eticas'])) echo $trabajo['consideraciones_eticas'];?></textarea>
				      </div>
				    </div>
						<div class="form-group">
							<label for="publicado" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['publicado'];?>*</label>
							<div class="col-sm-9">
								<input type="radio" name="publicado" value="true"><?php echo $language_text['template_general']['si_op'];?><br>
	  						<input type="radio" name="publicado" value="false" checked><?php echo $language_text['template_general']['no_op'];?><br>
							</div>
						</div>
						<div class="form-group">
				      <label for="referencia" class="col-sm-3 control-label"><?php echo $language_text['registro_trabajo']['referencia'];?></label>
				      <div class="col-sm-9">
				      	<textarea class="form-control" rows="4" id="referencia" name="referencia" disabled><?php if(isset($trabajo['referencia'])) echo $trabajo['referencia'];?></textarea>
				      </div>
				    </div>
					</div>
				</div> <!--row-->
				<div class="row">
					<div class="col-sm-12">
					<?php echo $language_text['registro_trabajo']['autor_mensaje'];?>
				  	<br><br>
				  	<button id="btnAddRow" type="button"><?php echo $language_text['registro_trabajo']['autor_nuevo'];?></button>
				  	<br><br>
				  	<div class="table-responsive" style="overflow:scroll;">
				  	<table id="tabla_autores" class="table table-striped table-bordered">
				  		<thead>
				  			<tr>
				  				<th><?php echo $language_text['registro_trabajo']['autor_nombre'];?>*</th>
				  				<th><?php echo $language_text['registro_trabajo']['autor_app'];?>*</th>
				  				<th><?php echo $language_text['registro_trabajo']['autor_apm'];?></th>
				  				<th><?php echo $language_text['registro_trabajo']['autor_genero'];?>*</th>
				  				<th><?php echo $language_text['registro_trabajo']['autor_pais'];?>*</th>
				  				<th><?php echo $language_text['registro_trabajo']['autor_imss'];?></th>
				  				<th><?php echo $language_text['registro_trabajo']['autor_matricula'];?></th>
				  				<th></th>
				  			</tr>
				  		</thead>
				  		<tbody>
				  			<tr>
				  				<td><input type="text" name="autor_nombre[]"></td>
				  				<td><input type="text" name="autor_app[]"></td>
				  				<td><input type="text" name="autor_apm[]"></td>
				  				<td>
				  					<select name="autor_sexo[]">
				  						<option value=""><?php echo $language_text['template_general']['sin_op'];?></option>
				  						<option value="H">Masculino</option>
				  						<option value="M">Femenino</option>
				  						<option value="O">Otro</option>
				  					</select>
				  				</td>
				  				<td>
				  					<select name="autor_pais[]">
				  						<?php
				  						echo '<option value="">'.$language_text['template_general']['sin_op'].'</option>';
				  						foreach ($paises as $key => $value) {
				  							echo '<option value="'.$key.'">'.$value.'</option>';
				  						}
				  						?>
				  					</select>
				  				</td>
				  				<td>
				  					<select name="autor_imss[]">
				  						<option value="0"><?php echo $language_text['template_general']['no_op'];?></option>
				  						<option value="1"><?php echo $language_text['template_general']['si_op'];?></option>
				  					</select>
				  				</td>
				  				<td><input type="text" name="autor_matricula[]"></td>
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
			  		<button class="btn btn-primary"><?php echo $language_text['registro_trabajo']['registrar_trabajo'];?></button>
			  		<a href="<?php echo site_url('registro_investigacion');?>" class="btn btn-warning"><?php echo $language_text['template_general']['cancelar'];?></a>
			  	</center>
			  	</div>
			  </div><!--row-->
				<?php echo form_close(); ?>
    	</div>
    </div>
</div>