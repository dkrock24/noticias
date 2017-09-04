


<script src="../../../js/tableGlobal.js"></script>
<!--
<link href="../../../assets/css/bootstrap.css" rel="stylesheet" />


  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" />
-->
<link href="../../../assets/css/custom.css" rel="stylesheet" />

  <!-- include libraries BS3-->


  <link href="../../../css/bootstrap.min.css" rel="stylesheet">


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
    .linea{
    	display: inline;;
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
	            		
	            				<th title="">Titulo</th>
	            				<th>Creado</th>
	            				<th>Desde</th>
	            				<th>Hasta</th>
	            				<th>Total</th>
	            				<th>Restante</th>
	            				
	            				<th width="1%">
	            					<table width="0%" border=0>
	            						<td width="33%" title="Anuncio Importante"><i class="fa fa-star-half-o"></i></td>
	            						<td width="33%" title="Categoría"><i class="fa fa-cog"></i></td>
	            						<td width="33%"><i class="fa fa-check"></i></td>
	            					</table>
	            				</th>
	            				
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
	            					<td title="<?php echo $not->id_titulo ?>"><?php echo substr($not->id_titulo,0,20); ?></td>
	            					<td><?php $date = date_create($not->fecha_creacion_noticia); echo date_format($date,"m/d/y"); ?></td>
	            					<td><?php if($not->fecha_inicio){ $inicio = date_create($not->fecha_inicio);  echo date_format($inicio,"d-M-y H:i");}  ?></td>
	            					<td><?php if($not->fecha_fin){$fin = date_create($not->fecha_fin); echo date_format($fin,"d-M-y H:i");}  ?></td>
	            					<td><?php echo $not->total_dias ?></td>
	            					<td>
	            					<?php
	            						if($not->fecha_inicio != null){
	            							
		            						$hoy 		= date("Y-m-d H:i:s");
		            						$datetime1 	= new DateTime($hoy);
											$datetime2 	= new DateTime($not->fecha_fin);
											$interval 	= $datetime1->diff($datetime2);
											
											if( $hoy > $not->fecha_fin ){
												echo "<span class='btn btn-warning btn-sm'>Vencido</span>";
											}else{
												echo $interval->format('%mm %ad %h:%i');
											}

											/*
											$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
											$fecha_entrada = strtotime("19-11-2008 21:00:00");
											if($fecha_actual > $fecha_entrada){
											        echo "La fecha entrada ya ha pasado";
											}else{
											        echo "Aun falta algun tiempo";
											}
											*/

	            						}
	            					?>
	            					</td>

	            					<td width="1%">
	            						<table  width="100%" border=0>
	            							<tr>
	            								<td width="33%">
	            									<?php if( $not->importante == 1 && $not->importante!= null ){  ?><div class="btn-success btn-sm linea">Si</div><?php  }else{ ?><div class="btn-danger btn-sm linea">No</div> <?php } ?>
	            								</td>
	            								<td width="33%">
	            									<?php if( $not->fecha_inicio != null ){  ?><div class="btn-success btn-sm linea">Si</div><?php  }else{ ?><div class="btn-danger btn-sm linea">No</div> <?php } ?>
	            								</td>
	            								<td width="33%">
	            									<?php 
					                                    if($not->estado_noticia == 1){ 
					                                        ?><div class="btn-success btn-sm linea">Si</div><?php
					                                        
					                                    }else{
					                                     ?><div class="btn-danger btn-sm linea">No</div>
					                                     <?php
					                                    }  
					                                ?>
	            								</td>
	            							</tr>

	            						</table>

	            					</td>

	            					<td>
	            						<a href="#" name="../noticia/Cnoticia/editNoticias/<?php echo $not->id_noticia;  ?>" class='btn-crear btn btn-secondary btn-sm '><i class="fa fa-refresh"></i> Editar</a>
	            						
	            					</td>
	            				</tr>
	            			<?php
	            			$count++;
	            			$inicio="";
	            			$fin=null;
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


