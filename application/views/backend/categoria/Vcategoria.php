

<script src="../../../js/tableGlobal.js"></script>

<link href="../../../assets/css/bootstrap.css" rel="stylesheet" />
<link href="../../../assets/css/custom.css" rel="stylesheet" />

<div class="row">
      <div class="col-md-12">
            <div class="card card-primary">
                  <div class="card-header">
                        <div class="header-block">
                              <div class="container">
                                    <div class="row global_text">
                                          <div class="col-md-8 ">Categorias de las Noticias</div>
                                          <div class="col-md-2"><a href="#" id="btn-crear" name="../categoria/Ccategoria/nuevaCategoria" class='btn btn-secondary-outline btn-edit btn-crear'>Nuevo</a>
                                    </div>
                              </div>
                        </div>
                  </div>
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
	            				<th>Activo</th>
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
	            					<td>
	            					<?php 
                                    if($cat->estado_categoria == 1){ 
                                        ?><div class="btn-success btn-sm">Si</div><?php
                                        
                                    }else{
                                     ?><div class="btn-danger btn-sm">No</div>
                                     <?php
                                    }  
                                ?></td>
	            					<td>

	            						<a href="../categoria/Ccategoria/editCategoria/<?php echo $cat->id_categoria;  ?>" id="0" class='getModal btn btn-primary btn-sm ' data-toggle="modal" data-target="#product_view"><i class="fa fa-refresh"></i> Editar</a>

	            						<a href="#" name="../categoria/Ccategoria/inactivarCategoria/<?php echo $cat->id_categoria; ?>/<?php echo $cat->estado_categoria; ?>" class='btn-crear  btn btn-success btn-sm'><i class="fa fa-times"></i> Cambiar Estado</a>
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
            			<ul class="pagination hidden-xs pull-right" id="myPager"></ul>
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

<script src="../../../js/contentModal.js"></script>