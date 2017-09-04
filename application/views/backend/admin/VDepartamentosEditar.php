<script>
  $(document).ready(function(){
      // CONVERTIR FECHAS A TEXTO
      $(".loading").hide();   
      
        $("a#lista_pais").click(function(){        
            var ruta = $(this).attr('name');           
            $(".pages").load(ruta);
        });



        $("#actualizar").click(function(){
        	$(".sk-three-bounce").show();
        	var id_departamento = $(this).attr("name");
        	$.ajax({
            url: "../admin/Cdepartamentos/saveUpdate/"+id_departamento,  
            type: "post",
            data: $('#editarDepartamento').serialize(),                           

                success: function(data){                              	                	
                	$(".pages").load("../admin/Cdepartamentos/index");
                	setTimeout(function() {
                        $(".sk-three-bounce").css('display','none');
                    }, 1000);
                },
                error:function(){
                }
            });
        });//end

        $("#btn-emilinar").click(function(){
        	$(".sk-three-bounce").show();
        	var id_departamento = $(this).attr("name");
        	$.ajax({
            url: "../admin/Cdepartamentos/delete/"+id_departamento,  
            type: "post",
            data: $('#editarDepartamento').serialize(),                           

                success: function(data){                              	                	
                	$(".pages").load("../admin/Cdepartamentos/index");
                	setTimeout(function() {
                        $(".sk-three-bounce").css('display','none');
                    }, 1000);
                },
                error:function(){
                }
            });
        });//end



    });
</script>
<style>
.save{
	text-align: center;
}
.A .B{
	cursor: pointer;
}
#actualizar{
	cursor: pointer;
}
#btn-emilinar{
	text-align: right;
	float: right;
	font-size: 20px;
}
#btn-emilinar:hover{
	color: black;	
}
a#usuarios{
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
                <form action="#" method="POST" name="sucursal" id="editarDepartamento">
                    <table class="table">
                        <tr>
	                        <td> Seleccionar Pais :<br>
	                            <select name="pais" id="pais" class="form-control">
						  		<option value="<?php echo $departamento[0]->id_pais ?>"><?php echo $departamento[0]->nombre_pais ?></option>
							  		<?php
							  		foreach ($paises as $paise) {
							  			if($paise->id_pais != $departamento[0]->id_pais)
							  			{
								  			?>
								  			<option value="<?php echo $paise->id_pais ?>"><?php echo $paise->nombre_pais ?></option>
								  			<?php
							  			}
							  		}
							  		?>
						  		</select>
                            </td>
                                
                            <td> Nombre : <br><input type="text" class="form-control" name="nombre" value="<?php echo $departamento[0]->nombre_departamento ?>"></td>
                                
                                <td> 
                                	Estado :<br>
                                	<select name="estado" class="form-control">
							  			<?php
				                        if($departamento[0]->estado_departamento == 1)
				                        {
				                            ?>
				                            <option value="1">Activo</option>
				                            <option value="0">Inactivo</option>
				                            <?php
				                        }
				                        else
				                        {
				                            ?>
				                            <option value="0">Inactivo</option>
				                            <option value="1">Activo</option>                            
				                            <?php
				                        }
				                        ?>	
							  		</select>
                                </td>
                              
                                
                            <td><br><a class="list-group-item  save" id="actualizar" alt="actualizar" name="<?php echo $departamento[0]->id_departamento;  ?>">
				  		<i class='fa fa-refresh'></i> Actualizar		  		
				  	</a></td>
                            </tr>

                        </table>
                        
                        </form>
                    </p>
                </div>
            <div class="card-footer"> </div>
        
    </div>                                
</div>