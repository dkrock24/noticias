<script>
  $(document).ready(function(){
      // CONVERTIR FECHAS A TEXTO
        $("a#lista_pais").click(function(){        
            var ruta = $(this).attr('name');           
            $(".pages").load(ruta);
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
        	$.ajax({
            url: "../admin/Cpais/savePais/",  
            type: "post",
            data: $('#crearPais').serialize(),                           

                success: function(data){                              	                	
                	$(".pages").load("../admin/Cpais/index");
                    setTimeout(function() {
                        $(".sk-three-bounce").css('display','none');
                    }, 1000);
                },
                error:function(){
                }
            });
        });
    });
</script>
<style type="text/css">
    .global_text{
        color: white;
    
    }
    #lista_pais{
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
                                          <div class="col-md-8 global_text"><a href="#tab1_1" id="lista_pais" name="../admin/Cpais/index" data-toggle="tab"><i class='fa fa-arrow-left'></i>Regresar</a></div>
                                          
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
                <form action="#" method="POST" name="pais" id="crearData">
                    <table class="table">
                        <tr>
                                
                                <td> Categoria Nombre : <br><input type="text" class="form-control" name="categoria" value=""></td>
                                
                                <td> Categoria Descripción :<br><input type="text" class="form-control" name="descripcion" value=""></td>
                              
                                <td> Categoria Estado :<br>
                                    <select name="estado" class="form-control">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </td>
                                <td><br><a class="btn btn-primary" id="guardarData" name="../categoria/Ccategoria/insertCategoria" alt="Guarda"><i class='fa fa-save'></i>Guarda </a> </td>
                            </tr>

                        </table>
                        
                        </form>
                    </p>
                </div>
            <div class="card-footer"> </div>
        
    </div>                                
</div>

<script src="../../../js/contentModal.js"></script>