<script>
  $(document).ready(function(){
      // CONVERTIR FECHAS A TEXTO
      $(".loading").hide();   

        $("a#lista_pais").click(function(){        
            var ruta = $(this).attr('name');           
            $(".pages").load(ruta);
        });

        $("#guardar").click(function(){
        	$(".loading").show();   
        	$.ajax({
            url: "../admin/Cdepartamentos/saveDepartamento/",  
            type: "post",
            data: $('#crearSucursal').serialize(),                           

                success: function(data){                              	                	
                	$(".pages").load("../admin/Cdepartamentos/index");
                	setTimeout(function() {
                        $(".loading").hide();   
                    }, 1000);
                },
                error:function(){
                }
            });
        });
    });
</script>
<style>
.save{
	text-align: center;
}
.A .B{
	cursor: pointer;
}
#guardar{
	cursor: pointer;
}
#usuarios{
	cursor: pointer;
}
</style>



<div class="row">
      <div class="col-md-12">
            <div class="card card-primary">
                  <div class="card-header">
                        <div class="header-block">
                              <div class="container">
                                    <div class="row abc">
                                          <div class="col-md-8 global_text"><a href="#tab1_1" id="lista_pais" name="../admin/Cdepartamentos/index" data-toggle="tab"><i class='fa fa-arrow-left'></i>Regresar</a></div>
                                          
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-12">
    <div class="card card-primary">
        

            <div class="card-block">
                <p>
                <form action="#" method="POST" name="sucursal" id="crearSucursal">
                    <table class="table">
                        <tr>
	                        <td> Seleccionar Pais :<br>
	                            <select name="pais" id="pais" class="form-control">
							  		<option value=""> - - -</option>
							  		<?php
							  		foreach ($paises as $paise) {
							  			?>
							  			<option value="<?php echo $paise->id_pais ?>"><?php echo $paise->nombre_pais ?></option>
							  			<?php
							  		}
							  		?>
							 	</select>
                            </td>
                                
                            <td> Nombre : <br><input type="text" class="form-control" name="nombre" value=""></td>
                                
                                <td> 
                                	Estado :<br>
                                	<select name="estado" class="form-control">
				  						<option value="1">Activo</option>
				  						<option value="0">Inactivo</option>
				  					</select>
                                </td>
                              
                                
                            <td><br><a class="list-group-item save" id="guardar" alt="Guarda">
				  		<i class='fa fa-save'></i>Guarda		  		
				  	</a> </td>
                            </tr>

                        </table>
                        
                        </form>
                    </p>
                </div>
            <div class="card-footer"> </div>
        
    </div>                                
</div>


