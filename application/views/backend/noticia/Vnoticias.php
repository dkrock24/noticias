


<script src="../../../js/tableGlobal.js"></script>
<!--
<link href="../../../assets/css/bootstrap.css" rel="stylesheet" />

-->
<link href="../../../assets/css/custom.css" rel="stylesheet" />
  <!-- include libraries BS3-->
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" />
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script> 

  <!-- include summernote -->
    <link href="../../../assets/dist/summernote.css" rel="stylesheet">
    <script src="../../../assets/dist/summernote.js"></script>
    <script src="../../../assets/dist/summernote.min.js"></script>

  <script type="text/javascript">
    $(function() {
      $('.summernote').summernote({
        height: 200
      });

    });
  </script>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

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
                                          <div class="col-md-8 global_text">Publicaciones</div>
                                          
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
	            				<th>Usuario</th>
	            				<th>Categoria</th>
	            				<th>Creado</th>
	            				<th>Expira</th>
	            				<th>Activo</th>
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
	  
	            					<td>
	            					<?php 
                                    if($not->estado_noticia == 1){ 
                                        ?><div class="btn-success btn-sm">Si</div><?php
                                        
                                    }else{
                                     ?><div class="btn-danger btn-sm">No</div>
                                     <?php
                                    }  
                                ?></td>
	            					<td>
	            						<a href="#" name="../noticia/Cnoticia/editNoticias/<?php echo $not->id_noticia;  ?>" class='btn-crear btn btn-secondary btn-sm '><i class="fa fa-refresh"></i> Editar</a>
	            						
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

<script src="../../../js/contentModal.js"></script>

