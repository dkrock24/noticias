
<script src="../../../js/tableGlobal.js"></script>

<link href="../../../assets/css/bootstrap.css" rel="stylesheet" />
<link href="../../../assets/css/custom.css" rel="stylesheet" />

<div class="row">
      <div class="col-md-12">
            <div class="card card-primary">
                  <div class="card-header">
                        <div class="header-block">
                              <div class="container">
                                    <div class="row abc">
                                          <div class="col-md-8 global_text">Lista de Contactos</div>
                                          <div  class="col-md-1 global_text"></div>
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
	            		<table class="table table-striped table-hover table-condensed" id="my-table">
	            			<thead>
	            			<tr>
	            				<th>#</th>
	            				<th>Nombre</th>
	            				<th>Telefono</th>
	            				<th>Correo</th>
	            				<th>Mensaje</th>
	            				<th>Fecha</th>
	            			</tr>
	            			</thead>

	            			<tbody id="myTable">
	            			<?php
	            			$count = 1;
	            			foreach ($contacto as $contactos)
	            			{
	            			?>
	            				<tr>
	            					<td><?php echo $count; ?></td>
	            					<td><?php echo $contactos->nombre; ?></td>
	            					<td><?php echo $contactos->telefono; ?></td>
	            					<td><?php echo $contactos->correo; ?></td>
	            					<td><?php echo $contactos->comentario; ?></td>
	            					<td><?php 	$abc = new DateTime($contactos->fecha);	echo $abc->format('M-d-Y'); ?></td>

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

<script src="../../../js/contentModal.js"></script>

<script>
$(document).ready(function(){
	$(".loading").hide();   
});
</script>