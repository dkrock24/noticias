

  
  <link rel="stylesheet" href="/noticias/css/bootstrap.min.css">
  <script src="/noticias/js/bootstrap.min.js"></script>
  <link href="../../../assets/dist/summernote.css" rel="stylesheet">
  <script src="../../../assets/dist/summernote.min.js"></script>  
  <script src="../../../assets/dist/summernote.js"></script>
    
    

<script>
  $(document).ready(function(){
      // CONVERTIR FECHAS A TEXTO
      $.noConflict();
      $('.summernote').summernote();
       
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

    .titulo{
        font-style: bold;
        font-weight: bold;
        color: black;
    }
    #guardarData{
        float: right;
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
                                          <div class="col-md-8 global_text"><a href="#tab1_1" id="lista_pais" name="../noticia/Cnoticia/getNoticias" data-toggle="tab"><i class='fa fa-arrow-left'></i>Regresar</a></div>
                                          
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2">    
    <img src="../../../assets/images/advise3.png" class="imagenes" width="80%">
</div>
<div class="col-xl-10">
    <div class="card card-primary">
        

            <div class="card-block">
                <p>
                <form action="#" method="POST" name="pais" id="crearData">
                    <div class="row">
                        <div class="col-xl-6">
                            <label>Titulo Noticia</label><br>
                            <input type="text" value="<?php echo $noticias[0]->id_titulo; ?>" name="titulo" class="form-control"/>
                        </div>
                        <div class="col-xl-6">
                            <label>Categoria</label><br>
                            <select name="categoria" class="form-control input_modificado">
                                <option value="<?php echo $noticias[0]->id_categoria; ?>"><?php echo $noticias[0]->nombre_categoria; ?></option>
                                    
                                <?php
                                    foreach ($categorias as $categoria) {
                                        if($noticias[0]->id_categoria != $categoria->id_categoria)
                                        {
                                            ?>
                                            <option value="<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->nombre_categoria; ?></option>
                                            <?php
                                        }
                                    }                                        
                                ?>  
                            </select>
                            
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-6">
                            <label>Usuario</label><br>
                            <input type="text" value="<?php echo $noticias[0]->nickname; ?>" readonly="true" class="form-control"/>
                        </div>
                        <div class="col-xl-6">
                            <label>Creado</label><br>
                            <input type="text" value="<?php echo $noticias[0]->fecha_creacion; ?>" readonly="true" class="form-control"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-6">
                            <label>Nombre Referencia</label><br>
                            <input type="text" name="referencia" value="<?php echo $noticias[0]->referencia; ?>" class="form-control"/>
                        </div>
                        <div class="col-xl-6">
                            <label>Enlace Referencia</label><br>
                            <input type="text" name="enlace" value="<?php echo $noticias[0]->link_referencia; ?>" class="form-control"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-12">
                          <label>Contenido</label><br>                          
                          <textarea name="contents" class="summernote" id="contents" title="Contents"><?php echo $noticias[0]->contenido ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-6">
                            <label>Fecha Vencimiento</label><br>
                            <input type="text" name="vencimiento" value="<?php echo $noticias[0]->fecha_fin; ?>" class="form-control"/>
                        </div>
                        <div class="col-xl-6">
                            <label>Estado</label><br>
                            <select name="estado" class="form-control input_modificado">
                                <?php
                                if($noticias[0]->estado_noticia == 1)
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
                        </div>
                    </div>
                    <br>
                    <a class="btn btn-primary global_text" id="guardarData" name="../noticia/Cnoticia/updateNoticia/<?php echo $noticias[0]->id_noticia; ?>" alt="Guardar"><i class='fa fa-refresh'></i> Actualizar </a> 

                        </form>
                    </p>
                </div>
            <div class="card-footer"> </div>
        
    </div>                                
</div>
<script src="../../../js/tableGlobal.js"></script>
<script src="../../../js/contentModal.js"></script>





  



