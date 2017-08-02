


<style type="text/css">
	.encabezado{
		color: white;
	}
	#guardar{
		float: right;
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
                                          <div  class="col-md-1 global_text"><a href="#" class="btn-crear btn btn-secondary-outline btn-edit" name="../noticia/Cnoticia/crearMenu" class='btn btn-secondary-outline btn-edit'>Nuevo</a></div>
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
	            				<th>Icono</th>
	            				<th>Pagina</th>
	            				<th>Seccion</th>
	            				<th>Creado</th>
	            				<th>Estado</th>
	            				<th>Acción</th>
	            			</tr>
	            			</thead>

	            			<tbody id="myTable">
	            			<?php
	            			$count = 1;
	            			foreach ($menu as $cat)
	            			{
	            			?>
	            				<tr>
	            					<td><?php echo $count; ?></td>
	            					<td><?php echo $cat->nombre_menu; ?></td>
	            					<td><?php echo $cat->icon_menu; ?></td>
	            					<td><?php echo $cat->pages; ?></td>
	            					<td><?php echo $cat->seccion; ?></td>
	            					<td><?php 	$abc = new DateTime($cat->creado);	echo $abc->format('M-d-Y'); ?></td>
	            					<td><?php if($cat->estado_menu==1){echo "Activo";}else{echo "Inactivo"; } ?></td>
	            					<td>
	            						<a href="#" name="../noticia/Cnoticia/editMenuNoticia/<?php echo $cat->id_menu;  ?>" class='btn-crear btn btn-secondary btn-sm '><i class="fa fa-refresh"></i> Editar</a>
	            						<a href="#" name="../noticia/Cnoticia/subMenuNoticia/<?php echo $cat->id_menu;  ?>" class='btn-crear btn btn-success btn-sm'><i class="fa fa-check"></i> Sub menu</a>
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