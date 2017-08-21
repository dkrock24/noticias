
<!doctype html>
<html class="no-js" lang="es">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>sisepudo.com | Bienvenido</title>
    <link rel="stylesheet" href="/noticias/css/foundation.min.css">
    <link rel="stylesheet" href="/noticias/css/frontend_custom.css">
    <link rel="stylesheet" type="text/css" href="/noticias/assets/slider/style.css">



    <style type="text/css">
    .delta{
        width: 50px;
    }
    </style>

    </head>
    
    <body>

        <div class="row column">
            <a href="/noticias/index.php/noticia/index/index"><h3><p class="lead">sisepudo.com</p></h3></a>
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
//var_dump($noticias_detalle);
?>
    <div class="row">
        <div class="medium-4 columns">

            <!-- main:begin -->
                        <div class="main">
                            <div class="container animation" id="anchor-3">
                                <div class="banner" id="animation">             
                                </div>
                            </div>

                            <div class="container thumbnail" id="anchor-4">
                                <h2><?php echo $noticias_detalle[0]->id_titulo; ?></h2>
                                <div class="clearfix">
                                    <div class="banner" id="thumbnail">
                                        <ul>
                                        <?php
                                        if($noticias_img != null)
                                        {
                                            foreach ($noticias_img as $img) {
                                                ?>
                                                <li><img src="../../../../assets/imagenes_noticias/<?php echo $img->path_imagen; ?>"></li>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <li><img src="../../../../assets/imagenes_noticias/not_imagen_demo.png"></li>
                                            <li><img src="../../../../assets/imagenes_noticias/not_imagen_demo.png"></li>
                                            <?php
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
            <!-- main:end -->

        </div>

        <div class="medium-8 large-8 columns">
            <h3></h3>
            
            <p></p>
            
            <p>
               <?php echo $noticias_detalle[0]->contenido; ?> 
            </p>   
            <p>
                <iframe width="100%" height="500px"
                    src="https://www.youtube.com/embed/<?php echo $noticias_detalle[0]->video_url; ?>">
                </iframe> 
                
                
            </p>
            <br>
            <br>         
            <div class="small secondary expanded button-group">
                <a class="button"><?php echo $visitas[0]->total_visitas; ?> Visitas</a>
                <a class="button">Fecha : <?php $fecha = date_create($noticias_detalle[0]->fecha_creacion);
                                         echo date_format($fecha,"d-M-Y"); ?> </a>
                <a class="button">Por. <?php echo $noticias_detalle[0]->nickname; ?></a>
                <br>
            </div>

            <div class="column row">
                <hr>
                <ul class="tabs" data-tabs="80q28o-tabs" id="example-tabs">
                    <li class="tabs-title is-active" role="presentation"><a href="#panel1" aria-selected="true" role="tab" aria-controls="panel1" id="panel1-label">Comentarios</a></li>
                    <li class="tabs-title" role="presentation"><a href="#panel2" role="tab" aria-controls="panel2" aria-selected="false" id="panel2-label">Referencias</a></li>
                </ul>

                <div class="tabs-content" data-tabs-content="example-tabs">
                    <div class="tabs-panel is-active" id="panel1">
                        
                        <div class="media-object stack-for-small">
                            
                            <div class="column row">
                                <div class="medium-1 columns">
                                    <div class="media-object-section">
                                        <img class="thumbnail" width="50px" src="https://placehold.it/200x200">
                                    </div>
                                </div>
                                
                                <div class="medium-10 columns">
                                    <div class="media-object-section">
                                        <h5>Miguel Peréz.</h5>
                                        <p>Pienso que es una burla al pueblo salvadoreño</p>
                                    </div>
                                </div>
                            </div>

                            <div class="column row">
                                <div class="medium-1 columns"></div>
                                <div class="medium-10 columns">
                                    <label>
                                        <input type="text" placeholder="Comentar.....">
                                        <input type="submit" class="button expanded" value="Enviar Comentario">
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
        <li><a href="#">Two</a></li>
        <li><a href="#">Three</a></li>
        <li><a href="#">Four</a></li>
      </ul>
    </div>

    <div class="small-6 large-3 columns">
      <p class="lead">Solar Systems</p>
      <ul class="menu vertical">
        <li><a href="#">One</a></li>
        <li><a href="#">Two</a></li>
        <li><a href="#">Three</a></li>
        <li><a href="#">Four</a></li>
      </ul>
    </div>

    <div class="small-6 large-3 columns">
      <p class="lead">Contact</p>
      <ul class="menu vertical">
        <li><a href="#"><i class="fi-social-twitter"></i> Twitter</a></li>
        <li><a href="#"><i class="fi-social-facebook"></i> Facebook</a></li>
        <li><a href="#"><i class="fi-social-instagram"></i> Instagram</a></li>
        <li><a href="#"><i class="fi-social-pinterest"></i> Pinterest</a></li>
      </ul>
    </div>

    <div class="small-6 large-3 columns">
      <p class="lead">Offices</p>
      <ul class="menu vertical">
        <li><a href="#">One</a></li>
        <li><a href="#">Two</a></li>
        <li><a href="#">Three</a></li>
        <li><a href="#">Four</a></li>
      </ul>
    </div>

  </div>


</footer>

    <script src="/noticias/js/jquery.js"></script>
    <script src="/noticias/js/foundation.js"></script>

    <script src="/noticias/assets/slider/highlight.pack.js"></script>

    <script src="/noticias/assets/slider/jquery.terseBanner.min.js"></script>
    <script src="/noticias/assets/slider/script.js"></script>

    
    <script>
      $(document).foundation();
    </script>
  </body>
</html>