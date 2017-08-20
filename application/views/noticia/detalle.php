
<!doctype html>
<html class="no-js" lang="es">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>sisepudo.com | Bienvenido</title>
    <link rel="stylesheet" href="/noticias/css/foundation.min.css">
    <link rel="stylesheet" href="/noticias/css/frontend_custom.css">

    </head>
    
    <body>

        <div class="row column">
            <h3><p class="lead">sisepudo.com</p></h3>
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
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Categoria</a></li>
                </ul>
            </nav>
        </div>
<?php
//var_dump($noticias_detalle);
?>
    <div class="row">
        <div class="medium-4 columns">
            <img class="thumbnail1" src="../../../../assets/imagenes_noticias/<?php echo $noticias_detalle[0]->imagen_portada; ?>">
            <div class="row small-up-4">
                <div class="column">
                    <img class="thumbnail" src="https://placehold.it/250x200">
                </div>
                <div class="column">
                    <img class="thumbnail" src="https://placehold.it/250x200">
                </div>
                <div class="column">
                    <img class="thumbnail" src="https://placehold.it/250x200">
                </div>
                <div class="column">
                    <img class="thumbnail" src="https://placehold.it/250x200">
                </div>
            </div>
        </div>

        <div class="medium-8 large-8 columns">
            <h3><?php echo $noticias_detalle[0]->id_titulo; ?></h3>
            
            <p><?php echo $noticias_detalle[0]->titulo_largo; ?></p>
            
            <p>
               <?php echo $noticias_detalle[0]->contenido; ?> 
            </p>            
            <div class="small secondary expanded button-group">
                <a class="button">230 Vistas</a>
                <a class="button">Fecha : <?php $fecha = date_create($noticias_detalle[0]->fecha_creacion);
                                         echo date_format($fecha,"d-M-Y"); ?> </a>
                <a class="button">Por. <?php echo $noticias_detalle[0]->nickname; ?></a>
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
                                    <input type="submit" class="button expanded" value="Submit">
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
    <script>
      $(document).foundation();
    </script>
  </body>
</html>