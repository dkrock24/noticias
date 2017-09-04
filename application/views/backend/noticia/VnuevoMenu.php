<script>
  $(document).ready(function(){
      // CONVERTIR FECHAS A TEXTO
      $(".loading").hide();   
        $("a#lista_pais").click(function(){        
            var ruta = $(this).attr('name');           
            $(".pages").load(ruta);
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
                                          <div class="col-md-8 global_text"><a href="#tab1_1" id="lista_pais" name="../noticia/Cnoticia/index" data-toggle="tab"><i class='fa fa-arrow-left'></i>Regresar</a></div>
                                          
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
                                
                                <td> Nombre Menu : <br><input type="text" class="form-control" name="nombre" value=""></td>
                                
                                <td> Url Menu :<br><input type="text" class="form-control" name="url" value=""></td>

                                <td> Icono Menu :<br><input type="text" class="form-control" name="icono" value=""></td>

                                <td> Class Menu :<br><input type="text" class="form-control" name="class" value=""></td>

                                <td> Pagina Menu :<br><input type="text" class="form-control" name="pagina" value=""></td>

                                <td> Seccion Menu :<br><input type="text" class="form-control" name="seccion" value=""></td>
                              
                                <td> Estado :<br>
                                    <select name="estado" class="form-control input_modificado">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </td>
                                <td><br><a class="btn btn-default" id="guardarData" name="../noticia/Cnoticia/saveMenu/" alt="Guardar"><i class='fa fa-save'></i>Guarda </a> </td>
                            </tr>

                        </table>
                        
                        </form>
                    </p>
                </div>
            <div class="card-footer"> </div>
        
    </div>                                
</div>

<script src="../../../js/contentModal.js"></script>