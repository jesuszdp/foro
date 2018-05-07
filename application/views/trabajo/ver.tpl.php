<style type="text/css">
	.titulo{
		font-weight: 500;
		color:#333;
	}
	.div-borde {
		margin-top:10px;
		border: #cdcdcd medium solid;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		padding: 0.5em;
	}
</style>

<div class="panel panel-default">
    <h1 class="page-head-line"></h1>
    <div class="panel-body">
    	<div class="row">
    		<div class="col-sm-12">
    			<h2 class="titulo"><?php echo $language_text['detalle_trabajo']['titulo_detalle'];?></h2>
    		</div>
    	</div><!--row-->
    	<div class="row">
    		<div class="col-sm-4">	
    			<div class="div-borde">
	    		<strong><?php echo $language_text['listado_trabajo']['folio'];?>:</strong>
	    		<br>
	    		<?php echo $datos['folio'];?>
	    		</div>
	    	</div>
	    	<div class="col-sm-8">	
    			<div class="div-borde">
	    		<strong><?php echo $language_text['listado_trabajo']['titulo_ttabla'];?>:</strong>
	    		<br>
	    		<?php echo $datos['titulo'];?>
	    		</div>
	    	</div>
    	</div> <!--row-->
    	<div class="row">
    		<div class="col-sm-12">
    			<h2 class="titulo"><?php echo $language_text['detalle_trabajo']['autores_detalle'];?></h2>
    		</div>
    	</div><!--row-->
    	<?php
    	foreach ($autores as $key => $value) {
    	?>
    	<div class="row">
    		<div class="col-sm-4">	
    			<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['autor_nombre'];?>:</strong>
	    		<br>
	    		<?php echo $value['nombre'];?>
	    		</div>
	    	</div>
	    	<div class="col-sm-4">	
    			<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['autor_app'];?>:</strong>
	    		<br>
	    		<?php echo $value['apellido_paterno'];?>
	    		</div>
	    	</div>
	    	<div class="col-sm-4">	
    			<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['autor_apm'];?>:</strong>
	    		<br>
	    		<?php echo $value['apellido_materno'];?>
	    		</div>
	    	</div>
    	</div> <!--row-->
    	<div class="row">
    		<div class="col-sm-6">
    			<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['autor_pais'];?>:</strong>
	    		<br>
	    		<?php echo $value['pais_nombre'];?>
	    		</div>
    		</div>
    		<div class="col-sm-2">
    			<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['autor_genero'];?>:</strong>
	    		<br>
	    		<?php echo $value['sexo'];?>
	    		</div>
    		</div>
    		<div class="col-sm-4">
    			<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['autor_matricula'];?>:</strong>
	    		<br>
	    		<?php echo $value['matricula'];?>
	    		</div>
    		</div>
    	</div>
    	<br>
    	<?php
    	}
    	?>
	    <div class="row">
	    	<div class="col-sm-12">
    			<h2 class="titulo"><?php echo $language_text['detalle_trabajo']['problema_detalle'];?></h2>
    		</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
	    		<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['pregunta_investigacion'];?>:</strong>
	    		<br>
	    		<?php echo $datos['pregunta_investigacion'];?>
	    		</div>
	    	</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
	    		<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['problema'];?>:</strong>
	    		<br>
	    		<?php echo $datos['problema'];?>
	    		</div>
	    	</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
	    		<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['objetivo'];?>:</strong>
	    		<br>
	    		<?php echo $datos['objetivo'];?>
	    		</div>
	    	</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
	    		<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['justificacion'];?>:</strong>
	    		<br>
	    		<?php echo $datos['justificacion'];?>
	    		</div>
	    	</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
    			<h2 class="titulo"><?php echo $language_text['detalle_trabajo']['mt_detalle'];?></h2>
    		</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
	    		<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['antecedentes'];?>:</strong>
	    		<br>
	    		<?php echo $datos['antecedentes'];?>
	    		</div>
	    	</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
	    		<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['tipo_metodologia'];?>:</strong>
	    		<br>
	    		<?php echo $datos['tipo_metodologia'];?>
	    		</div>
	    	</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
	    		<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['metodologia'];?>:</strong>
	    		<br>
	    		<?php echo $datos['metodologia'];?>
	    		</div>
	    	</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
	    		<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['consideraciones_eticas'];?>:</strong>
	    		<br>
	    		<?php echo $datos['consideraciones_eticas'];?>
	    		</div>
	    	</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
	    		<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['hipotesis'];?>:</strong>
	    		<br>
	    		<?php echo $datos['hipotesis'];?>
	    		</div>
	    	</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
	    		<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['resultados'];?>:</strong>
	    		<br>
	    		<?php echo $datos['resultados'];?>
	    		</div>
	    	</div>
	    </div><!--row-->
	    <div class="row">
	    	<div class="col-sm-12">
	    		<div class="div-borde">
	    		<strong><?php echo $language_text['registro_trabajo']['conclusiones'];?>:</strong>
	    		<br>
	    		<?php echo $datos['conclusiones'];?>
	    		</div>
	    	</div>
	    </div><!--row-->
    </div>
</div>