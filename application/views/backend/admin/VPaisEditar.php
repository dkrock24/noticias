<script>
  $(document).ready(function(){
      // CONVERTIR FECHAS A TEXTO
        $("a#enlance").click(function(){        
            var ruta = $(this).attr('name');           
            $(".pages").load(ruta);
        });

        $("a#usuarios").click(function(){       
        $(".sk-three-bounce").show(); 
            var ruta = $(this).attr('name');           
            $(".pages").load(ruta);
            $(".A").removeClass("active");
            $(".B").addClass("active");
            setTimeout(function() {
                        $(".sk-three-bounce").css('display','none');
                    }, 1000);
        });

        //Mostrar Departamentos mediante el pais
        $("#pais").change(function(){
        	$("#departamento").empty();
        	var id = $(this).val();
        	$.ajax({
            url: "../admin/Csucursales/getDepartamento/"+id,  
            datatype: 'json',      
            cache : false,                

                success: function(data){                              	                	
                	$.each(JSON.parse(data), function(i, item) {                		
                		$("#departamento").append('<option value='+item.id_departamento+'>'+item.nombre_departamento+'</option>');
					});
                },
                error:function(){
                }
            });
        });

        $("#guardar").click(function(){
            $(".sk-three-bounce").show();
            var id_pais = $(this).attr("name");
        	$.ajax({
            url: "../admin/Cpais/saveUpdate/"+id_pais,  
            type: "post",
            data: $('#updatePais').serialize(),                           

                success: function(data){                              	                	
                	$(".pages").load("../admin/Cpais/index");
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
            var id_pais = $(this).attr("name");
            $.ajax({
            url: "../admin/Cpais/delete/"+id_pais,  
            type: "post",
            data: $('#editarDepartamento').serialize(),                           

                success: function(data){                                                    
                    $(".pages").load("../admin/Cpais/index");
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
#guardar{
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
#usuarios{
        text-decoration: none;
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
                                          <div class="col-md-8 global_text"><a href="#tab1_1" id="usuarios" name="../admin/Cpais/index" data-toggle="tab"><i class='fa fa-arrow-left'></i>Regresar</a></div>
                                          
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
                <form action="#" method="POST" name="pais" id="updatePais">
                    <table class="table">
                        <tr>
                                
                                <td> Nombre : <br><input type="text" class="form-control" name="nombre" value="<?php echo $paises[0]->nombre_pais; ?>"></td>
                                
                                <td> Número Registro :<br><input type="text" class="form-control" name="registro_legal" value="<?php echo $paises[0]->registro_legal; ?>"></td>
                              
                                <td> Estado :<br>
                                    <select name="estado" class="form-control">
                                    <?php
                                    if($paises[0]->estado == 1)
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
                                <td><br><a class="list-group-item save" id="guardar" alt="Guarda" name="<?php echo $paises[0]->id_pais; ?>">
                        <i class='fa fa-refresh'></i> Actualizar             
                    </a> </td>
                            </tr>

                        </table>
                        
                        </form>
                    </p>
                </div>
            <div class="card-footer"> </div>
        
    </div>                                
</div>