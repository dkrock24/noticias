


<style type="text/css">
	.encabezado{
		color: white;
	}
	#guardar{
		float: right;
	}
	.global_text{
        color: white;
    
    }
</style>


<div class="row">
      <div class="col-md-12">
            <div class="card card-primary">
                  <div class="card-header">
                        <div class="header-block">
                              <div class="container">
                                    <div class="row abc">
                                          <div class="col-md-8 global_text">Lista de Menus</div>
                                          
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
	            				<th>Usuario</th>
	            				<th>Categoria</th>
	            				<th>Creado</th>
	            				<th>Expira</th>
	            				<th>Estado</th>
	            				<th>Acción</th>
	            			</tr>
	            			</thead>

	            			<tbody id="myTable">
	            			<?php
	            			$count = 1;
	            			foreach ($noticias as $not)
	            			{
	            			?>
	            				<tr>
	            					<td><?php echo $count; ?></td>
	            					<td><?php echo $not->nickname; ?></td>
	            					<td><?php echo $not->nombre_categoria; ?></td>
	            					<td><?php echo $not->fecha_creacion; ?></td>
	            					<td><?php echo $not->fecha_fin; ?></td>
	  
	            					<td><?php if($not->estado_noticia==1){echo "Activo";}else{echo "Inactivo"; } ?></td>
	            					<td>
	            						<a href="#" name="../noticia/Cnoticia/editMenuNoticia/<?php echo $not->id_noticia;  ?>" class='btn-crear btn btn-secondary btn-sm '><i class="fa fa-refresh"></i> Editar</a>
	            						
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