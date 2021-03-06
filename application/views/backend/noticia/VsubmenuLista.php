

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
                                          <div class="col-md-8 global_text"><a href="#" id="lista_pais" class="btn-crear" name="../noticia/Cnoticia/index"><i class='fa fa-arrow-left'></i>Regresar</a></div>
                                          <div  class="col-md-1 global_text"><a href="#" class="btn-crear btn btn-secondary-outline btn-edit" name="../noticia/Cnoticia/crearSubMenuNotica/<?php if($id_menu!=null){ echo $id_menu[0];}  ?>" class='btn btn-secondary-outline btn-edit'>Nuevo</a></div>
                                          
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
	            				<th>Menu</th>
	            				<th>SubMenu</th>
	            				<th>Url </th>
	            				<th>Titulo</th>
	            				<th>Icono</th>	            				
	            				<th>Activo</th>
	            				<th>Acción</th>
	            			</tr>
	            			</thead>

	            			<tbody id="myTable">
	            			<?php
	            			$count = 1;
	            			if($sub_menu !=null){
	            			foreach ($sub_menu as $cat)
	            			{
	            			?>
	            				<tr>
	            					<td><?php echo $count; ?></td>
	            					<td><?php echo $cat->nombre_menu; ?></td>
	            					<td><?php echo $cat->nombre_submenu; ?></td>
	            					<td><?php echo $cat->url_submenu; ?></td>
	            					<td><?php echo $cat->titulo_submenu; ?></td>
	            					<td><?php echo $cat->icon_menu; ?></td>
	            					
	            					<td><?php 
                                    if($cat->estado_submen == 1){ 
                                        ?><div class="btn-success btn-sm">Si</div><?php
                                        
                                    }else{
                                     ?><div class="btn-danger btn-sm">No</div>
                                     <?php
                                    }  
                                ?></td>
	            					<td>
	            						<a href="#" name="../noticia/Cnoticia/editarSubMenu/<?php echo $cat->id_submenu;  ?>" class='btn-crear btn btn-secondary btn-sm '><i class="fa fa-refresh"></i> Editar</a>
	            						
	            					</td>
	            				</tr>
	            			<?php
	            			$count++;
	            			}
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

<script src="../../../js/contentModal.js"></script>


<script>
$(document).ready(function(){
	$(".loading").hide();   
});
</script>