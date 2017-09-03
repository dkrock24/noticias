<!doctype html>
<html class="no-js" lang="es">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>sisepudo.com | Bienvenido</title>
    <link rel="stylesheet" href="/noticias/css/bootstrap.min.css">
    <link rel="stylesheet" href="/noticias/css/foundation.min.css">
    <link rel="stylesheet" href="/noticias/css/frontend_custom.css">


    <link rel="stylesheet" type="text/css" href="/noticias/assets/font-awesome/font-awesome.css">

    <link href="/noticias/css/style.css" rel="stylesheet">
    <link href="/noticias/css/fotorama.css" rel="stylesheet">
    <script src="/noticias/js/jquery.js"></script>
    <script src="/noticias/js/slider.js"></script>
    <script src="/noticias/js/bootstrap.min.js"></script>
    <script src="/noticias/js/fotorama.js"></script>



    <style type="text/css">
    .delta{
        width: 50px;
    }
    </style>

        <style type="text/css">
        /*
    Image credits:
    uifaces.com (http://uifaces.com/authorized)
*/

    #login { display: none; }
    .login,
    .logout { 
        position: absolute; 
        top: -3px;
        right: 0;
    }
    .page-header { position: relative; }
    .reviews {
        color: #555;    
        font-weight: bold;
        margin: 10px auto 20px;
    }
    .notes {
        color: #999;
        font-size: 12px;
    }
    .media .media-object { max-width: 60px; }
    .media-body { position: relative; }
    .media-date { 
        display: inline;
        width: 20%;
        position: absolute; 
        right: 5px;
        top: 25px;
    }
    .media-date li { padding: 0; }
    .media-date li:first-child:before { content: ''; }
    .media-date li:before { 
        content: '.'; 
        margin-left: -2px; 
        margin-right: 2px;
    }
    .media-comment { margin-bottom: 20px; }
    .media-replied { margin: 0 0 20px 50px; }
    .media-replied .media-heading { padding-left: 1px; }

    .media-replied2{
        width: 80%;
        margin: 0 0 20px 50px;
        display: inline-block;
    }
    .media-replied2 .media-heading { padding-left: 1px; }

    .btn-circle {
        font-weight: bold;
        font-size: 12px;
        padding: 6px 15px;
        border-radius: 20px;
    }
    .btn-circle span { padding-right: 6px; }
    .embed-responsive { margin-bottom: 20px; }
    .tab-content {
        padding: 50px 15px;
        border: 1px solid #ddd;
        border-top: 0;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .custom-input-file {
        overflow: hidden;
        position: relative;
        width: 120px;
        height: 120px;
        background: #eee url('https://s3.amazonaws.com/uifaces/faces/twitter/walterstephanie/128.jpg');    
        background-size: 120px;
        border-radius: 120px;
    }
    input[type="file"]{
        z-index: 999;
        line-height: 0;
        font-size: 0;
        position: absolute;
        opacity: 0;
        filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
        margin: 0;
        padding:0;
        left:0;
    }
    .uploadPhoto {
        position: absolute;
        top: 25%;
        left: 25%;
        display: none;
        width: 50%;
        height: 50%;
        color: #fff;    
        text-align: center;
        line-height: 60px;
        text-transform: uppercase;    
        background-color: rgba(0,0,0,.3);
        border-radius: 50px;
        cursor: pointer;
    }
    .custom-input-file:hover .uploadPhoto { display: block; }

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
        position: relative;
        display: inline-block;        
        width: 100%;
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
    .input-custom{
        width: 100%;
        border-radius: 4px;
        display: inline;

    }
    .input-custom2{
        float: right;
    }
    .ejemplo{
        padding-left: 50px;
        width: 95%;

    }
    .total{
        width:100%;
        display: block;
        clear: both;
    }
    .media-comment2{
        margin-top: 5px;
        margin-left: 1.25rem;
        text-align: justify;
    }

    .tb-btn{
        display: inline-block;
        overflow-x: scroll;
    }

    .lead_home{
        font-size: 1.9375rem;
        line-height: 1.6;
        margin-bottom: 15px;
        color: black;
        font-weight: 400;
    }
    .button-group2{
        width: 100%;
        background: none;
        display: inline-block;
        text-align: center;
    }
    .icono_boton{
        color: #fff;
    }


    </style>

    </head>
    
    <body>

        <div class="row column titulo_pagina">
            <a href="/noticias/index.php/noticia/index/index"><h3><p class="lead_home">sisepudo.com</p></h3></a>
        </div>

        <!-- Navigation -->
        <div class="title-bar" data-responsive-toggle="realEstateMenu" data-hide-for="small">            
        </div>

        <div class="top-bar" id="realEstateMenu">
        </div>
        <!-- /Navigation -->

        <br>

        <div class="row columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href="../index">Inicio</a></li>
                    <li><a href="#"><?php echo $noticias_detalle[0]->nombre_categoria; ?></a></li>
                </ul>
            </nav>
        </div>
    <?php
    $numero;
    if(isset($_COOKIE["Avatar"]))
    {
        $numero = $_COOKIE["Avatar"];
    }else{
        $numero = rand(1,21);
        setcookie("Avatar", $numero);
    }
    ?>
    <div class="row">

        <div class="medium-4 columns">

            <!-- Slider -->
            <div class="row">
                <div class="medium-12 columns">
                <!-- main:begin -->
                    <div class="main">                
                        <div class="container thumbnail" id="anchor-4">
                            <h2><?php echo $noticias_detalle[0]->id_titulo; ?></h2>
                            <div class="clearfix">
                                <div class="banner" id="thumbnail">
                                    <div class="fotorama" data-width="400" data-ratio="700/467" data-max-width="100%">
                                    <?php
                                    if($noticias_img != null)
                                    {
                                        foreach ($noticias_img as $img) {
                                    ?>
                                    <img src="../../../../assets/imagenes_noticias/<?php echo $img->path_imagen; ?>">
                                    <?php
                                    }
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>                                              
                        </div>
                    </div>
                </div>
            </div>
            <!-- main:end -->

            <!-- Video -->
            <div class="row">
                <div class="medium-12 columns">
                <!-- main:begin -->
                    <div class="main">                
                        <div class="container thumbnail" id="anchor-4">
                            <h2>Video</h2>
                            <div class="clearfix">
                                <div class="banner" id="thumbnail">
                                    <p>
                                    <iframe width="100%" height="300px"
                                        src="https://www.youtube.com/embed/<?php echo $noticias_detalle[0]->video_url; ?>">
                                    </iframe> 
                                    </p>
                                </div>
                            </div>                                              
                        </div>
                    </div>
                </div>
            </div>
            <!-- main:end -->
        </div>

        <div class="medium-8 large-8 columns">
            <h3><?php echo $noticias_detalle[0]->titulo_largo; ?> </h3>
            
            
            <p>
               <?php echo $noticias_detalle[0]->contenido; ?> 
            </p>   
            
    
            <br>  
            <div class="column row ">    
            
                <div class="small secondary  button-group2">
                <a class="button"><i class="icono_boton fa fa-eye"></i> <?php echo $visitas[0]->total_visitas; ?> Visitas</a>
                <a class="button"><i class="icono_boton fa fa-comment"></i> <?php echo $contador_cmt[0]->total_cmt; ?> Comentarios</a>
                <a class="button"><i class="icono_boton fa fa-calendar"></i> Fecha : <?php $fecha = date_create($noticias_detalle[0]->fecha_creacion);
                                         echo date_format($fecha,"d-M-Y"); ?> </a>
                <a class="button"><i class="icono_boton fa fa-user"></i> Por. <?php echo $noticias_detalle[0]->nickname; ?></a>
               

            </div>
            </div>

            <div class="column row">
                <hr>
                <ul class="tabs" data-tabs="80q28o-tabs" id="example-tabs">
                    <li class="tabs-title is-active" role="presentation"><a href="#panel1" aria-selected="true" role="tab" aria-controls="panel1" id="panel1-label">Comentarios</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel2" role="tab" aria-controls="panel2" aria-selected="false" id="panel2-label">Referencias</a></li>
                </ul>

                <div class="tabs-content" data-tabs-content="example-tabs">
                    <div class="tabs-panel is-active" id="panel1">

                    <ul class="media-list">
                    <?php
                    

                   
                    $validador=0;
                    foreach ($comentarios as $cmt) 
                    {
                        // Validar si comentarios pertenecen al padre
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
                        <li class="media">
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
                                        <a class="btn btn-default btn-circle text-uppercase " data-toggle="collapse" href="#a<?php echo $cmt->id_comentario ?>" id="reply">
                                            <span class="fa fa-reply btn-responder" ></span> Responder
                                        </a>
                                        
                                        <a class="btn btn-success btn-circle text-uppercase" data-toggle="collapse" href="#r<?php echo $cmt->id_comentario ?>">
                                            <span class="fa fa-comment"></span> <?php  echo $total_comentarios  ?> Comentarios
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
                                        <li class="media media-replied2">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="/noticias/assets/avatars_comentarios/<?php echo $reply->avatar2; ?>.png" alt="profile">
                                            </a>
                                                                                              
                                                    <ul class="text-uppercase">
                                                        
                                                        <li class="fecha_comntario">
                                                            <b><?php

                                                                $reply_fecha = new DateTime($cmt->reply_fecha); 
                                                                echo date_format($reply_fecha,"M-d-Y H:i"); 
                                                                ?>
                                                            </b>
                                                        </li>
                                                    </ul>
                                                    
                                                    <p class="media-comment2"><?php echo $reply->reply ?></p>
                                                    
                                                
                                        </li>
                                    <?php                                
                                    }                           
                            }
                            ?>
                            </ul>  
                        </div>

                        <div class="collapse" id="a<?php echo $cmt->id_comentario ?>">
                            <ul class="media-list ejemplo">
                                <li class="media media-comment">
                                    <input type="hidden" name="avatar-respuesta" id="avatar-respuesta" value="<?php 
                                        if(isset($_COOKIE["Avatar"]))
                                            { echo  $_COOKIE["Avatar"]; } else{ echo $numero; }
                                        ?>">
                                            
                                    </input>
                                    <textarea class="form-control input-custom" name="comentario" id="<?php echo $validador ?>"></textarea>
                                    <botton href="#" class="btn btn-default input-custom2" name="<?php echo $validador ?>">Enviar Respuesta</botton>
                                </li>
                            </ul>
                        </div>

                            
                        </li>
                        
                        <?php
                        }
                    }
                    ?>
                    </ul>

                    <ul class="media-list">
        
                    </ul> 
                        
                        <div class="media-object stack-for-small">
                            <div class="column row">
                                <div class="medium-1 columns"></div>
                                <div class="medium-10 columns">
                                    <label>
                                    <form id="crearData2" name="crearData2">

                                    
                                        <input type="hidden" name="id_noticia" value="<?php echo  $noticias_detalle[0]->id_noticia ?>"></input>
                                        <input type="hidden" name="avatar" value="<?php if(isset($_COOKIE['Avatar'])){echo  $_COOKIE['Avatar']; }else{ echo $numero; }
                                        ?>">
                                            
                                        </input>
                                        <textarea class="form-control" id="comentario_texto" name="comentario_texto"  placeholder="Comentar....."></textarea>
                                        <input type="buttom" id="guardarDataFront" class="form-control button expanded" name="../insert_comentarios/" value="Comentar">
                                    </form>                                        
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tabs-panel" id="panel2">
                        <div class="row medium-up-3 large-up-5">
                            <div class="column">
                                <?php echo $noticias_detalle[0]->referencia; ?>               
                                <a href="<?php echo $noticias_detalle[0]->link_referencia; ?>" target="_blank" class="button hollow tiny expanded">Ver Enlace</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    

<footer>
  <div class="row expanded callout secondary">

    <div class="small-6 large-3 columns">
      <p class="lead">Offices</p>
      <ul class="menu vertical">
        <li><a href="#">One</a></li>

      </ul>
    </div>

    <div class="small-6 large-3 columns">
      <p class="lead">Solar Systems</p>
      <ul class="menu vertical">
        <li><a href="#">One</a></li>

      </ul>
    </div>

    <div class="small-6 large-3 columns">
      <p class="lead">Contact</p>
      <ul class="menu vertical">
        <li><a href="#"><i class="fi-social-twitter"></i> Twitter</a></li>

      </ul>
    </div>

    <div class="small-6 large-3 columns">
      <p class="lead">Offices</p>
      <ul class="menu vertical">
        <li><a href="#">One</a></li>

      </ul>
    </div>

  </div>


</footer>

    
    <script src="/noticias/js/foundation.js"></script>

    <script src="/noticias/assets/slider/highlight.pack.js"></script>

    <script src="/noticias/assets/slider/jquery.terseBanner.min.js"></script>

    <script src="/noticias/js/contentModal.js"></script>

    
    <script>
      $(document).foundation();


        $(document).ready(function(){
            $("#btn-comentar").click(function(){
                var comentario = $("#comentario_texto").text();

            });


        });

    </script>
  </body>
</html>
