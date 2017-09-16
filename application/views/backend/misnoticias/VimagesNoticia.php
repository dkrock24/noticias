<script src="/noticias/assets/nanospell/tinymce.min.js"></script>
<script src="/noticias/assets/plugins/jcrop/cropOneImage.js"></script>

<script>
  $(document).ready(function()
  {
    
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

            //------Open Modal Waiting
            $(".ModalWait").show();
            $(".conteFormUpload").hide();
             //----------Modal Wait End
            
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
                    //------Open Modal Waiting
                    $(".ModalWait").hide();
                    $(".conteFormUpload").show();
                    //----------Modal Wait End

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
                                <li class="active tabImages"><a href="#tab2default" data-toggle="tab">Imagenes Noticia</a></li>
                                
                            </ul>
                        </div>

                        <div class="panel-body">
                            <div class="tab-content">

                                <!-- Tab de Edicion de noticia -->

                <div class="tab-pane fade in active" id="tab2default">
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
                             <input type="hidden" id="NewsID" name="NewsID" value="<?php echo $newsID; ?>" />
                            </form>
                            

                            <hr>
                        
                            <!--   Cont list images news  -->
                            <div class="form-group row"> 
                            <p class="text-xs-center" style="text-align: left;margin-left: 12px;font-weight: bold;">Lista de imagenes</p>
                            <div class="col-sm-10">
                            <div class="images-container">
                            <?php    
                            //var_dump($imagenes)
                            foreach ($imagenes as $imagen) 
                            {
                                $source = "/noticias/assets/imagenes_noticias/".$imagen->path_imagen;
                                $filtro = ($imagen->filtro ==0) ? 'onclick="applyEffect('.$imagen->id_noticia_imagen.')"' : '' ;
                                echo '<div class="image-container"><div class="controls"><span class="control-btn" '.$filtro.' style="color: #f0ad4e;"><i class="fa fa-sun-o"></i></span><span onclick="deleteImage('.$imagen->id_noticia_imagen.')" class="control-btn remove"><i class="fa fa-trash-o"></i></span> </div><div class="image" style="background-image:url('.$source.')"></div></div>';

                            }   
                            ?>    
                            </div>
                            </div>
                        </div>
                        <!--  Fin div que contiene imagen -->
                                                   
                </div>

                                  <!-- Modal para esperar mientras se sube las fotos  -->
                <div class="ModalWait" style="display: none;">
                    <center>
                      <img src="/noticias/assets/images/loader.gif">
                    </center>
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