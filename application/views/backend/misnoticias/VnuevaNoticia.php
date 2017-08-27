

<script src="/noticias/assets/nanospell/tinymce.min.js"></script>

      
      <script>
         var nanospell_directory  = location.href.substring(0,location.href.lastIndexOf("/")+1);
         
          tinymce.init({
             selector:'textarea',
             external_plugins: {"nanospell": nanospell_directory+"../../../assets/nanospell/plugin.js"},
             nanospell_dictionary: "es",
             nanospell_server: "php", // choose "php" "asp" "asp.net" or "java"
             nanospell_autostart:true,
             }); 



      </script>

<script>
  $(document).ready(function(){
      // CONVERTIR FECHAS A TEXTO
      //$.noConflict();
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
    select.form-control:not([size]):not([multiple]) {
     height: auto; 
    }
    .dashboard-page .tasks label .checkbox:checked + span {
        text-decoration: none;
    }
    .bt-save{
        float: right;
    }
    .nav-tabs a{
        text-decoration: none;
    }
</style>

<div class="row">
      <div class="col-md-12">
            <div class="card card-primary">
                  <div class="card-header">
                        <div class="header-block">
                              <div class="container">
                                    <div class="row abc">
                                          <div class="col-md-8 global_text"><a href="#tab1_1" id="lista_pais" name="../misnoticias/Cindex/index" data-toggle="tab"><i class='fa fa-arrow-left'></i>Regresar</a></div>
                                          
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

                <div class="col-md-12">
                    <div class="panel with-nav-tabs panel-default">

                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1default" data-toggle="tab">Nueva Noticia</a></li>
                                
                            </ul>
                        </div>

                        <div class="panel-body">
                            <div class="tab-content">

                                <!-- Tab de Edicion de noticia -->
                                <div class="tab-pane fade in active" id="tab1default">
                                    <p>
                                        <form action="#" method="POST" name="pais" id="crearData">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <label>Título Principal :</label><br>
                                                    <input type="text" value="" name="titulo" class="form-control"/>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label>Categoría :</label><br>
                                                    <select name="categoria" class="form-control input_modificado">
                                                      
                                                            
                                                        <?php
                                                        foreach ($categorias as $categoria) 
                                                        {
                                                        ?>
                                                            <option value="<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->nombre_categoria; ?>
                                                                    </option>
                                                                    <?php
                                                        }                                                                                             
                                                        ?>  
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label>Título Ampliado :</label><br>
                                                    <input type="text" value="" name="titulo_largo" class="form-control"/>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <label>Por :</label><br>
                                                    <input type="text" value="" readonly="true" class="form-control"/>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label>Url Video :</label><br>
                                                    <input type="text" name="video" value="" class="form-control"/>
                                                </div>
                                              
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <label>Nombre Referencia :</label><br>
                                                    <input type="text" name="referencia" value="" class="form-control"/>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label>Enlace Referencia :</label><br>
                                                    <input type="text" name="enlace" value="" class="form-control"/>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                  <label>Contenido :</label><br>                          
                                                  <textarea  cols="30" rows="10" name="contents" ></textarea>
                                                </div>
                                            </div>
                                      
                                   

                                            <br>
                                            <a class="btn btn-primary global_text" id="guardarData" name="../misnoticias/Cindex/crearNoticia/" alt="Guardar"><i class='fa fa-save'></i> Crear Noticia </a>

                                        </form>
                                    </p>
                                </div>


                            
                            </div>
                        </div>
                    </div>
                </div>

            
            </div>
            <div class="card-footer"> </div>
        
    </div>                                
</div>




<script src="../../../js/tableGlobal.js"></script>
<script src="../../../js/contentModal.js"></script>

<script type="text/javascript" src="../../../js/bootstrap.min.js" charset="UTF-8"></script>

