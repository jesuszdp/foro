<div class="panel panel-default">
    <h1 class="page-head-line">Trabajos de investigación registrados</h1>
    <div class="panel-body">
    	<div class="">
    		<div class="">
    			<div class="col-sm-offset-10 col-md-2">
    				<a href="<?php echo site_url('registro_investigacion/nuevo');?>" class="btn btn-primary">Registrar nuevo trabajo</a>
    			</div>
    		</div><!--row-->
    		<br>
    		<div class="row">
    			<div class="col-sm-offset-1 col-sm-10">
	    			<div class="table-responsive">
	    				<table class="table table-striped table-bordered">
	    				<tr>
	    					<th>Folio</th>
	    					<th>Título</th>
	    					<th>Tipo de metodología</th>
	    					<th>Estado</th>
	    				</tr>
	    				<?php
	    				if(isset($listado))
	    				{
	    					foreach ($listado as $key => $value) {
	    						echo '<tr>';
	    						echo '<td>'.$value['folio'].'</td>';
	    						echo '<td>'.$value['titulo'].'</td>';
	    						echo '<td>'.$value['nombre_metodologia'].'</td>';
	    						echo '<td>En revisión</td>';
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