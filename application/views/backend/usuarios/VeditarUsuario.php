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
    .imagenes{
        text-align: center;
        position: absolute;
    }
 .table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}
.titulo{
    font-style: bold;
    font-weight: bold;
    color: black;
}
    
</style>

<div class="row">
      <div class="col-md-12">
            <div class="card card-primary">
                  <div class="card-header">
                        <div class="header-block">
                              <div class="container">
                                    <div class="row abc">
                                          <div class="col-md-8 global_text"><a href="#tab1_1" id="lista_pais" name="../usuarios/Cusuarios/userAdmin" data-toggle="tab"><i class='fa fa-arrow-left'></i>Regresar</a></div>
                                          
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2">    
    <img src="../../../assets/images/user.png" class="imagenes" width="80%">
</div>
<div class="col-xl-10">
    <div class="card card-primary">
        

            <div class="card-block">
                <p>
                <form action="#" method="POST" name="pais" id="crearData">
                    <table class="table table-borderless">
                        <tr>
                            <td width="200px;" class="titulo">Nombres </td>
                            <td> <?php echo $usuario[0]->nombres; ?> </td>
                            <td class="titulo">Apellidos </td>
                            <td> <?php echo $usuario[0]->apellidos; ?> </td>
                        </tr>
                        <tr>
                            <td class="titulo">Telefono </td>
                            <td> <?php echo $usuario[0]->telefono; ?> </td>
                            <td class="titulo">Celular </td>
                            <td> <?php echo $usuario[0]->celular; ?> </td>
                        </tr>
                        <tr>
                            <td class="titulo">Dirección </td>
                            <td> <?php echo $usuario[0]->direccion; ?> </td>
                            <td class="titulo">DUI </td>
                            <td> <?php echo $usuario[0]->dui; ?> </td>
                        </tr>

                        <tr>
                            <td class="titulo">Usuario </td>
                            <td> <?php echo $usuario[0]->usuario; ?> </td>
                            <td class="titulo">Fecha Nacimiento </td>
                            <td> <?php echo $usuario[0]->fecha; ?> </td>
                        </tr>

                        <tr>
                            <td class="titulo">Genero </td>
                            <td> <?php echo $usuario[0]->genero; ?> </td>
                            <td class="titulo">Rol </td>
                            <td> <?php echo $usuario[0]->nombre_cargo; ?> </td>
                        </tr>

                        <tr>
                            <td class="titulo">Creado </td>
                            <td> <?php echo $usuario[0]->fecha_creacion; ?> </td>
                            <td class="titulo"> Estado :</td>
                            <td>
                                    <select name="estado" class="form-control input_modificado">
                                        <?php
                                        if($usuario[0]->estado == 1)
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
                        </tr>
                        <tr>  
                            <td></td>                             
                            <td></td>                             
                            <td></td>                             
                                <td><a class="btn btn-default" id="guardarData" name="../noticia/Cnoticia/updateSubMenu/<?php echo $usuario[0]->id_usuario; ?>" alt="Guardar"><i class='fa fa-refresh'></i> Actualizar </a> </td>
                            </tr>

                        </table>
                        
                        </form>
                    </p>
                </div>
            <div class="card-footer"> </div>
        
    </div>                                
</div>

<script src="../../../js/contentModal.js"></script>