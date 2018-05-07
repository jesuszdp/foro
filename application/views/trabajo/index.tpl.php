<?php //pr($language_text);?>
<div class="panel panel-default">
    <h1 class="page-head-line"><?php echo $language_text['listado_trabajo']['titulo_seccion'];?></h1>
    <div class="panel-body">
    	<div>
    		<div class="row">
    			<div class="col-sm-offset-8 col-md-4">
    				<a href="<?php echo site_url('registro_investigacion/nuevo');?>" class="btn btn-primary pull-right"><?php echo $language_text['listado_trabajo']['registrar_nuevo'];?></a>
    			</div>
    		</div><!--row-->
    		<br><br>
    		<div class="row">
    			<div class="col-sm-offset-1 col-sm-10">
	    			<div class="table-responsive">
	    				<table class="table table-striped table-bordered">
	    				<tr>
	    					<th><?php echo $language_text['listado_trabajo']['folio'];?></th>
	    					<th><?php echo $language_text['listado_trabajo']['titulo_ttabla'];?></th>
	    					<th><?php echo $language_text['listado_trabajo']['tipo_metodologia_tabla'];?></th>
	    					<th><?php echo $language_text['listado_trabajo']['fecha_registro'];?></th>
	    					<th><?php echo $language_text['listado_trabajo']['estado_trabajo'];?></th>
	    					<th></th>
	    				</tr>
	    				<?php
	    				if(isset($listado))
	    				{
	    					foreach ($listado as $key => $value) {
	    						echo '<tr>';
	    						echo '<td>'.$value['folio'].'</td>';
	    						echo '<td>'.$value['titulo'].'</td>';
	    						echo '<td>'.json_decode($value['nombre_metodologia'],true)[$lang].'</td>';
	    						echo '<td>'.$value['fecha'].'</td>';
	    						echo '<td>'.json_decode($value['estado'],true)[$lang].'</td>';
	    						$site = site_url('registro_investigacion/ver/'.$value['folio']);
	    						echo '<td><a href="'.$site.'" class="btn btn-primary pull-right"><i class="fa fa-eye" aria-hidden="true"></i></a></td>';
	    						echo '</tr>';
	    					}
	    				}
	    				?>
	    				</table>
	    			</div>
	    		</div>
    		</div><!--row-->
    	</div>
    </div>
</div>