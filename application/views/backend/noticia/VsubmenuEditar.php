<script>
  $(document).ready(function(){
      // CONVERTIR FECHAS A TEXTO
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
                                
                                <td> Nombre SubMenu : <br><input type="text" class="form-control" name="nombre" value="<?php echo $submenu[0]->nombre_submenu; ?>"></td>
                                
                                <td> Url SubMenu :<br><input type="text" class="form-control" name="url" value="<?php echo $submenu[0]->url_submenu; ?>"></td>

                                <td> Titulo SubMenu :<br><input type="text" class="form-control" name="titulo" value="<?php echo $submenu[0]->titulo_submenu; ?>"></td>

                                <td> Icono SubMenu :<br><input type="text" class="form-control" name="icono" value="<?php echo $submenu[0]->icon_menu; ?>"></td>

                                <td> Id Menu :<br><input type="text" class="form-control" name="id" readonly="0" value="<?php echo $submenu[0]->id_menu; ?>"></td>
                                                              
                                <td> Estado :<br>
                                    <select name="estado" class="form-control input_modificado">
                                        <?php
                                        if($menu[0]->estado_submen == 1)
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
                                <td><br><a class="btn btn-default" id="guardarData" name="../noticia/Cnoticia/updateSubMenu/<?php echo $submenu[0]->id_submenu; ?>" alt="Guardar"><i class='fa fa-save'></i>Guarda </a> </td>
                            </tr>

                        </table>
                        
                        </form>
                    </p>
                </div>
            <div class="card-footer"> </div>
        
    </div>                                
</div>

<script src="../../../js/contentModal.js"></script>