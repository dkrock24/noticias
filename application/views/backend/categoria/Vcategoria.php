


<style type="text/css">
	.encabezado{
		color: white;
	}
	#guardar{
		float: right;
	}
</style>
<div class="row">
	<div class="card card-primary">
            <div class="card-header encabezado">
			    <div class="col-md-11">
			    	
							Categorias de las Noticias
			            
			    </div>

			    <div class="col-md-1">

			    			<a href="#" id="updateInfo" class='btn btn-secondary-outline btn-edit'>Nuevo</a>
			    		
			    </div>
			   </div>
			</div>
</div>

<div class="table-flip-scroll">
	<div class="row">
	    <div class="col-md-12">
	        <div class="card-block">
	            <div class="row">
	            	<div class="col-md-12">
	            		<table class="table table-striped table-hover table-condensed" id="myTable2">
	            			<thead>
	            			<tr>
	            				<th>#</th>
	            				<th>Nombre</th>
	            				<th>Descripcion</th>
	            				<th>Usuario</th>
	            				<th>Fecha</th>
	            				<th>Estado</th>
	            				<th>Acción</th>
	            			</tr>
	            			</thead>

	            			<tbody id="myTable">
	            			<?php
	            			$count = 1;
	            			foreach ($categoria as $cat)
	            			{
	            			?>
	            				<tr>
	            					<td><?php echo $count; ?></td>
	            					<td><?php echo $cat->nombre_categoria; ?></td>
	            					<td><?php echo $cat->descripcion_categoria; ?></td>
	            					<td><?php echo $cat->nombres." ".$cat->apellidos; ?></td>
	            					<td><?php 	$abc = new DateTime($cat->fecha_categoria);	echo $abc->format('M-d-Y'); ?></td>
	            					<td><?php if($cat->estado_categoria==1){echo "Activo";}else{echo "Inactivo"; } ?></td>
	            					<td>
	            						<a href="../categoria/Ccategoria/editCategoria/<?php echo $cat->id_categoria;  ?>" id="0" class='getModal btn btn-secondary btn-sm ' data-toggle="modal" data-target="#product_view"><i class="fa fa-refresh"></i> Editar</a>
	            						<a href="../categoria/Ccategoria/inactivarCategoria/<?php echo $cat->id_categoria; ?>/<?php echo $cat->estado_categoria; ?>" id="1" data-toggle="modal" class='getModal btn btn-danger btn-sm'><i class="fa fa-times"></i> Inactivar</a>
	            					</td>
	            				</tr>
	            			<?php
	            			$count++;
	            			}
	            			?>
	            			</tbody>
	            		</table>
	            	</div>

	            	<div class="col-md-12 text-center">
	            <ul class="pagination " id="myPager">
	                
	            </ul>
	        </div>


	            </div>
	        </div>
	    </div>
	</div>
</div>




<div class="modal fade product_view" id="product_view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">   </h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 product_img">
                        <i class="fa fa-refresh fa-3"></i>
                    </div>
                    <div class="col-md-9 product_content"> 
                    	<form id="categoria_editar">
	                    	<table class="table">
	                    		<tr>
	                    			<td>Categoria </td>
	                    			<td> <input type="text" name="categoria" id="categoria" class="form-control" /></td>
	                    		</tr>
	                    		<tr>
	                    			<td>Descripción </td>
	                    			<td> <textarea name="descripcion" id="descripcion" class="form-control" /></td>
	                    		</tr>
	                    		<tr>
	                    			<td colspan="" ="2"><span class="demo"></span></td>
	                    		</tr>
	                    		<input type="hidden" name="id_categoria" id="id_categoria" class="form-control" />
	                    	</table>  
                    	</form>    
                    	<br>
                        <div class="space-ten"></div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">                            
                            <button type="button" href="../categoria/Ccategoria/actualizarCategoria/" class="btn btn-primary" id="guardar" name=""><span class="fa fa-save"></span> Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>







<script src="../../../js/tableGlobal.js"></script>
<script src="../../../js/contentModal.js"></script>

<script type="text/javascript">
	function drawData(data){

		var jdata = jQuery.parseJSON(data);

		for (var i in jdata) {
			$("#categoria").val(jdata[i].nombre_categoria);
			$("#descripcion").val(jdata[i].descripcion_categoria);
			$("#id_categoria").val(jdata[i].id_categoria);

    	}
	}
</script>