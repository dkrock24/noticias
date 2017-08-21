
<!doctype html>
<html class="no-js" lang="es">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>sisepudo.com | Bienvenido</title>
    <link rel="stylesheet" href="/noticias/css/foundation.min.css">
    <link rel="stylesheet" href="/noticias/css/frontend_custom.css">

    <style type="text/css">
        .abc{
            display: inline-flex;
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

        <div class="top-bar" id="realEstateMenu">        </div>
        <!-- /Navigation -->
        <br>

        <div class="row small-up-1 medium-up-2 large-up-3">
        <?php
        if($noticias !=null)
        {
        foreach ($noticias as $noticia) {
            ?>     
                
                <div class="column"><a href="<?php echo base_url(); ?>/index.php/noticia/index/detalle/<?php echo $noticia->id_noticia ?>" class="noticia_detalle">       
                    <div class="callout">
                    <div class="region "><?php echo $noticia->noticia_tipo ?></div>
                    <p class="titulo_corto "><?php echo $noticia->id_titulo ?></p>
                    <p><img src="<?php echo base_url(); ?>/assets/imagenes_noticias/<?php echo $noticia->imagen_portada ?>" alt=""></p>
                    <p class="lead titulo_largo"><?php echo $noticia->titulo_largo ?></p>
                    
                    </div>
                    </a>
                </div>
                
            <?php
        }   
        }
        ?>
        </div>


    <div class="row column">
        <ul class="pagination float-right" role="navigation" aria-label="Pagination">


            <!-- Show pagination links -->
            <?php foreach ($links as $link) 
            {
                echo "<li>". $link."</li>";
            }
            ?>
        </ul>

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