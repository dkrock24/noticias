

<script src="/noticias/assets/nanospell/tinymce.min.js"></script>
<link href="../../../css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

<script src="/noticias/js/bootstrap.min.js"></script>
<script src="/noticias/js/slider.js"></script>
      
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
            $(".loading").show();        
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
    .media-object{
        width: 100%;
    }
    .media .media-object { max-width: 60px; }

    .media-list{
        width: 100%;
        background: none;
    }

    .media-replied{
        width: 100%;
        display: block;
        clear: both;
    }
    .fecha_comntario{
        float: left;
        position: relative;
        display: inline-block;        

    }
    .media, .media .media {
        margin-top: 0px;
    }
    .well-lg {
        height: 10%;
        padding: 10px;
        border-radius: 6px;
    }
    .media-comment{
        width: 100%;
    }
    .media-replied2{
        width: 80%;
        margin: 0 0 20px 80px;
        display: inline-block;
        background: none;
    }
    .media-replied2 .media-heading { padding-left: 1px; }

    .media-comment2{
        margin-top: 5px;
        margin-left: 1.25rem;
        text-align: justify;
            display: inline-block;
    float: left;
    position: relative;
    margin: auto;
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

                <div class="col-md-12">
                    <div class="panel with-nav-tabs panel-default">

                        <div class="card-block">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a href="" class="nav-link active" data-target="#home-pills" aria-controls="home-pills" data-toggle="tab" role="tab">Editar Noticia</a>
                                </li>
                                <li class="nav-item"><a href="" class="nav-link" data-target="#profile-pills" aria-controls="profile-pills" data-toggle="tab" role="tab">Configurar Noticia</a>
                                </li>
                                <li class="nav-item"><a href="" class="nav-link" data-target="#profile-comentario" aria-controls="profile-pills" data-toggle="tab" role="tab">Comentarios</a>
                                </li>
                            </ul>
                        </div>

                        <div class="panel-body">
                            <div class="tab-content">

                                <!-- Tab de Edicion de noticia -->
                                <div class="tab-pane fade in active" id="home-pills">
                                    <p>
                                        <form action="#" method="POST" name="pais" id="crearData">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <label>Título Principal :</label><br>
                                                    <input type="text" value="<?php echo $noticias[0]->id_titulo; ?>" name="titulo" class="form-control"/>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label>Categoría :</label><br>
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
                                                <div class="col-xl-12">
                                                    <label>Título Ampliado :</label><br>
                                                    <input type="text" value="<?php echo $noticias[0]->titulo_largo; ?>" name="titulo_largo" class="form-control"/>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <label>Por :</label><br>
                                                    <input type="text" value="<?php echo $noticias[0]->nickname; ?>" readonly="true" class="form-control"/>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label>Fecha Creado :</label><br>
                                                    <input type="text" value="<?php echo date("d-M-Y", strtotime($noticias[0]->fecha_creacion_noticia)); ?>" readonly="true" class="form-control"/>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <label>Nombre Referencia :</label><br>
                                                    <input type="text" name="referencia" value="<?php echo $noticias[0]->referencia; ?>" class="form-control"/>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label>Enlace Referencia :</label><br>
                                                    <input type="text" name="enlace" value="<?php echo $noticias[0]->link_referencia; ?>" class="form-control"/>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                  <label>Contenido :</label><br>                          
                                                  <textarea  cols="30" rows="10" name="contents" ><?php echo $noticias[0]->contenido ?></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <label>Url Video :</label><br>
                                                    <input type="text" name="video" value="<?php echo $noticias[0]->video_url; ?>" class="form-control"/>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label>Estado :</label><br>
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
                                            <div class="row">
                                                <div class="col-xl-6">
                                                <!--
                                                    <label>Fecha Vencimiento :</label><br>
                                                    <input type="text" name="vencimiento"  value="<?php echo date("d-M-Y", strtotime($noticias[0]->fecha_fin));  ?>" class="form-control"/>
                                                -->
                                                </div>
                                                
                                            </div>
                                            <br>
                                            <a class="btn btn-primary global_text" id="guardarData" name="../noticia/Cnoticia/updateNoticia/<?php echo $noticias[0]->id_noticia; ?>" alt="Guardar"><i class='fa fa-refresh'></i> Actualizar </a> 

                                        </form>
                                    </p>
                                </div>

                                <!-- Segundo Tab de Configuracion -->
                                <div class="tab-pane fade" id="profile-pills">
                                    <p>
                                        <form action="#" method="POST" name="condiguracion" id="crearData2">
                                            
                                            <div class="row">

                                                <div class="col-xl-6">
                                                    <div class="control-group">
                                                        <label class="control-label">Fecha Inicio de Publicación :</label>
                                                        <div class="controls input-append date form_datetime" data-date="" data-date-format="yyyy-m-d H:i:s" data-link-field="dtp_input1">
                                                            <input size="16" type="text" name="inicio_config" id="inicio_config" class="form-control" value="<?php echo $noticias[0]->fecha_inicio ?>" readonly>
                                                            <span class="add-on"><i class="icon-remove"></i></span>
                                                            <span class="add-on"><i class="icon-th"></i></span>
                                                        </div>
                                                        <input type="hidden" id="dtp_input1" value="" /><br/>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="control-group">
                                                        <label class="control-label">Fecha Fin de Publicación :</label>
                                                        <div class="controls input-append date form_datetime" data-date="" data-date-format="yyyy-m-d H:i:s" data-link-field="dtp_input1">
                                                            <input size="16" type="text" name="fin_config" id="fin_config" class="form-control" value="<?php echo $noticias[0]->fecha_fin ?>" readonly>
                                                            <span class="add-on"><i class="icon-remove"></i></span>
                                                            <span class="add-on"><i class="icon-th"></i></span>
                                                        </div>
                                                        <input type="hidden" id="dtp_input1" value="" /><br/>
                                                    </div>
                                                </div>

                                            </div>   

                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <label class="control-label">Total Días Habiles :</label>
                                                    <input type="text" class="form-control" value="<?php echo $noticias[0]->total_dias ?>" id="total_dias_noticia" name="total_dias_noticia" readonly="1"></input>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label class="control-label">Días Restantes :</label>
                                                    <input type="text" class="form-control" value="<?php echo $noticias[0]->total_restantes ?>" name="total_dias_restantes_noticia" readonly="1"></input>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    
                                                    <label>
                                                        <input class="checkbox" type="checkbox" name="importante_config" value="<?php echo $noticias[0]->importante ?>" <?php if( $noticias[0]->importante ==1){ echo "checked"; } ?> >
                                                        <span>Marcar como noticia importante</span>
                                                    </label>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label>
                                                        <input class="checkbox" type="checkbox" name="activo_config" value="<?php echo $noticias[0]->estado_config ?>" <?php if( $noticias[0]->estado_config ==1){ echo "checked"; } ?>>
                                                        <span>Activo</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-xl-6"></div>
                                                <div class="col-xl-6">
                                                    <div class="form-group">
                                                        
                                                        <a class="btn btn-primary global_text bt-save" id="guardarData2" name="../noticia/Cnoticia/save_config_noticia/<?php echo $noticias[0]->id_noticia; ?>" alt="Guardar"><i class='fa fa-refresh'></i> Guardar </a> 
                                                    </div>
                                                </div>

                                            </div>                                            

                                        </form>
                                    </p>
                                </div>

                                <!-- Tercer Tab de Comentarios -->
                                <div class="tab-pane fade" id="profile-comentario">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <ul class="media-list">
                                            <?php

                                            $validador=0;
                                            foreach ($comentarios as $cmt) 
                                            {
                                                if($validador != $cmt->id_comentario)
                                                {

                                                    //Id unico de comentario
                                                    $validador = $cmt->id_comentario;

                                                    // Contador de Respuestas
                                                    if( $cmt->total_reply != null){
                                                        $total_comentarios = $cmt->total_reply;
                                                    }else{
                                                        $total_comentarios="";
                                                    }
                                                    ?>
                                                    <li class="media comentario" id="cmt<?php echo $cmt->id_comentario ?>">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object img-circle" src="/noticias/assets/avatars_comentarios/<?php echo $cmt->avatar1; ?>.png" alt="profile">
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="well well-lg">                                    
                                                                <ul class="media-date list-inline">
                                                                    <li class="fecha_comntario"><b>
                                                                    <?php 
                                                                        $fecha_cmt = new DateTime($cmt->cmt_fecha); 
                                                                        echo date_format($fecha_cmt,"M-d-Y H:i"); 
                                                                    ?>
                                                                    </b></li>                                        
                                                                </ul>
                                                                <br><br>
                                                                <p class="media-comment">    <?php echo $cmt->cmt ?>  </p>
                                                                
                                                                <p class="botones-accion">

                                                                    
                                                                    <a class="btn btn-primary btn-sm " data-toggle="collapse" href="#r<?php echo $cmt->id_comentario ?>">
                                                                        <span class="fa fa-comment"></span> <?php  echo $total_comentarios  ?> Comentarios
                                                                    </a>
                                                                    <a class="btn btn-primary btn-sm btn-delete" data-toggle="collapse" name="../noticia/Cnoticia/eliminar_comentario/<?php echo $cmt->id_comentario ?>" id="<?php echo $cmt->id_comentario ?>">
                                                                        <span class="fa fa-trash"></span>  Eliminar
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="collapse" id="r<?php echo $cmt->id_comentario ?>">
                                                            <ul class="media-list">

                                                            <?php
                                                            foreach ($comentarios as $reply)
                                                            {
                                                                ?>
                                                                
                                                                    <?php
                                                                    if( $reply->id_reply == $validador )
                                                                    {
                                                                    ?>
                                                                        <li class="media media-replied2"  id="reply<?php echo $reply->id ?>">
                                                                            <a class="pull-left" href="#">
                                                                                <img class="media-object img-circle" src="/noticias/assets/avatars_comentarios/<?php echo $reply->avatar2; ?>.png" alt="profile">
                                                                            </a>
                                                                                                                              
                                                                                    <ul class="">
                                                                                        
                                                                                        <li class="fecha_comntario">
                                                                                            <b><?php

                                                                                                $reply_fecha = new DateTime($reply->reply_fecha); 
                                                                                                echo date_format($reply_fecha,"M-d-Y H:i"); 
                                                                                                ?>
                                                                                            </b>
                                                                                            <a class="btn btn-primary btn-sm btn-delete" href="#" id="<?php echo $reply->id ?>" name="../noticia/Cnoticia/eliminar_comentario/<?php echo $reply->id ?>">
                                                                                                <span class="fa fa-trash"></span>  Eliminar
                                                                                            </a>
                                                                                            
                                                                                        </li>
                                                                                        <br><br>
                                                                                        <p class="media-comment2"><?php echo $reply->reply ?>
                                                                                           
                                                                                        </p>
                                                                                    </ul>

                                                                        </li>
                                                                    <?php                                
                                                                    }                           
                                                            }
                                                            ?>
                                                            </ul>  
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            </ul>
   
                                        </div>
                                    </div>   
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
<script type="text/javascript" src="../../../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../../../js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>

<script type="text/javascript">

    $(document).ready(function(){
        /*
        $("#fin_config").change(function(){


            alert($("#inicio_config").val());
            var fechaInicio = new Date("2016-07-12 12:00").getTime();
            var fechaFin    = new Date("2016-07-12 12:30").getTime();

            var diff = fechaFin - fechaInicio;
            $("#total_dias_noticia").val(diff/(1000*60*60*24)+1 );

        });
        */
        $(".loading").hide();   
       
    });



    $('.form_datetime').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>

  



