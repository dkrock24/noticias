

<script src="/noticias/assets/nanospell/tinymce.min.js"></script>
<script src="/noticias/assets/plugins/jcrop/cropOneImage.js"></script>

      
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
  $(document).ready(function()
  {

    //--------Inactive tab si no hay ID de noticia
     $('.tabImages').addClass('disabled');
    //------------END----------------------------

    //----------Upload image news---------------
    $('#upload_file').submit(function(e)
    {
        e.preventDefault();
        var imgVal = $('#userfile').val();
        
        if(imgVal !='')
        {
            var form = document.getElementById("upload_file");

            $(".images-container").html("");

            formData = new FormData($(this)[0]);
            var blob = dataURLtoBlob(canvas.toDataURL('image/png'));
            //---Add file blob to the form data
            formData.append("userfile", blob);
            
            $.ajax
            ({
                url: "../misnoticias/Cimagenes/do_upload",
                type: "POST",             
                data: formData,   
                contentType: false,      
                cache: false,      
                processData:false,    
                success: function(data)
                {
                    //$('.tabImages').removeClass('disabled');
                    $('#tab2default').addClass('fade in active');
                    $('#tab1default').removeClass('active');

                    $('#tab1default').addClass('disabled');
                    

                    var obj = JSON.parse(data);
                    $.each(obj, function(i, item) 
                    {                        
                       var source = "/noticias/assets/imagenes_noticias/"+item.path_imagen;
                       var filtro = (item.filtro == 0) ? 'onclick="applyEffect('+item.id_noticia_imagen+')"' : '';
                        $(".images-container").append('<div class="image-container"><div class="controls"><span class="control-btn" '+filtro+' style="color: #f0ad4e;"><i class="fa fa-sun-o"></i></span><span onclick="deleteImage('+item.id_noticia_imagen+')" class="control-btn remove"><i class="fa fa-trash-o"></i></span> </div><div class="image" style="background-image:url('+source+')"></div></div>');
                    });

                    $("#views").empty();
                    $("#userfile").val(null);
                },
                error:function(data)
                {
                    alert(data);
                }
            });
            return false;
        }
        else
        {
            alert("Debe de seleccionar una imagen nuevamente");
        }
        
    });

    //---------END Upload image news---------------------




      // CONVERTIR FECHAS A TEXTO
      //$.noConflict();
        $("a#lista_pais").click(function(){        
            var ruta = $(this).attr('name');           
            $(".pages").load(ruta);
        });
        
    });


</script>


<style type="text/css">
    .disabled
    {
        pointer-events:none;
        opacity:0.4;
    }
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
                                <li class="active tabContent"><a href="#tab1default" data-toggle="tab">Nueva Noticia</a></li>
                                <li class="active tabImages"><a href="#tab2default" data-toggle="tab">Imagenes Noticia</a></li>
                                
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
                                            <a class="btn btn-primary global_text" id="guardarData" name="../misnoticias/Cindex/crearNoticia/" alt="Guardar"><i class='fa fa-save'></i> Guardar salir </a>

                                            <a style="color: #fff;" class="btn btn-primary global_text" id="guardarDataOnly" name="../misnoticias/Cimagenes/crearNoticiaOnly/" alt="Guardar"><i class='fa fa-save'></i> Guardar</a>

                                        </form>
                                    </p>
                                </div>

                <div class="tab-pane" id="tab2default">
                     <!-- Form para subir imagenes  -->
                        <div class="conteFormUpload">
                        <div class="display-error alert alert-warning" style="display: none;"> </div>

                        <!-- Div para recortar imagen  -->
                            <form id="upload_file" enctype="multipart-formdata">  
                            <input class="btn btn-pill-left btn-secondary" type="file" name="userfile" id="userfile" size="20" />
                            <br>
                            <hr class="lineView" style="display: none;">
                            <div id="views"></div>
                            <button id="cropbutton" class="btn btn-primary" type="button" style="display: none;">Crop</button>
                            <input type="submit" value="Agregar imagen" class="btn btn-success" />  
                             <input type="hidden" id="NewsID" name="NewsID" value="0" />
                            </form>
                            

                            <hr>
                        
                            <!--   Cont list images news  -->
                            <div class="form-group row"> 
                            <p class="text-xs-center" style="text-align: left;margin-left: 12px;font-weight: bold;">Lista de imagenes</p>
                            <div class="col-sm-10">
                            <div class="images-container">  
                           
                            </div>
                            </div>
                        </div>
                        <!--  Fin div que contiene imagen -->
                                                   
                        </div>


                            </div>
                        </div>
                    </div>


                </div>




            
            </div>
            <div class="card-footer"> </div>
        
    </div>                                
</div>


   <!-- /.modal -->
                <div class="modal fade" id="delete-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                                <h4 class="modal-title"><i class="fa fa-warning"></i> Eliminar</h4>
                            </div>
                            <div class="modal-body">
                                <p>Desea eliminar estar imagen?</p>
                            </div>
                            <div class="modal-footer"> <button type="button" class="btn btn-primary SiDelete" data-dismiss="modal">Si</button> <button type="button" class="btn btn-secondary NotDelete" data-dismiss="modal">No</button> </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->



<script src="../../../js/tableGlobal.js"></script>
<script src="../../../js/contentModal.js"></script>

<script type="text/javascript" src="../../../js/bootstrap.min.js" charset="UTF-8"></script>

<script type="text/javascript">
    
    //--------Aplicar efecto a la imagen
    function applyEffect(idNews) 
    {
        $.ajax
        ({
          url: "../misnoticias/Cimagenes/applyEffectImage",
          type:"post",
          data: {idNews:idNews},
          success: function(message)
          {
            alert("La imagen se modifico exitosamente");
            $(".pages").load("../misnoticias/Cimagenes/editImagnes/"+message);
          },
          error:function()
          {
            alert("failure");
          }
        });
    }

    //--------Eliminar imagen
    function deleteImage(idNews) 
    {
        $.ajax
        ({
          url: "../misnoticias/Cimagenes/delete_image",
          type:"post",
          data: {idNews:idNews},
          success: function(message)
          {
            alert("La imagen se elimino correctamente");
            $(".pages").load("../misnoticias/Cimagenes/editImagnes/"+message);
          },
          error:function()
          {
            alert("failure");
          }
        });
    }

</script>