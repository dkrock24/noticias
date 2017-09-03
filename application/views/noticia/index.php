<!doctype html>
<html class="no-js" lang="es">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>sisepudo.com | Bienvenido</title>
    <link rel="stylesheet" href="/noticias/css/foundation.min.css">
    <link rel="stylesheet" href="/noticias/css/frontend_custom.css">

    <style type="text/css">
        @font-face {
            font-family: descripciones;
            src: url(/noticias/fonts/dosis.extralight.ttf);
        }
        .titulo_corto{
            font-family: Tahoma;
            font-size: 12px;
        }

        .abc{
            display: inline-flex;
        }
        .titulo_largo{
            font-family: Rockwell;
            color: #585858;
        }


        * { box-sizing: border-box; }

        body {
          font-family: sans-serif;
        }

        /* ---- grid ---- */

        .grid {
          max-width: 1200px;
        }

        /* clear fix */
        .grid:after {
          content: '';
          display: block;
          clear: both;
        }

        /* ---- .grid-item ---- */

        .grid-item {
            float: left;
            width: 33.33%;
            height: auto;

        }

    </style>
    <?php
        if(isset($_COOKIE["Avatar"]))
        {
            $_COOKIE["Avatar"];
        }else{
            setcookie("Avatar", rand(1,21));
        }
    ?>

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

        <div class="row  grid">
        <?php
        if($noticias !=null)
        {
        foreach ($noticias as $noticia) {
            ?>     
                
                <div class="column grid-item"><a href="<?php echo base_url(); ?>noticia/index/detalle/<?php echo $noticia->id_noticia ?>" class="noticia_detalle">       
                    <div class="callout1">
                    <div class="region "><?php echo strtoupper($noticia->noticia_tipo) ?></div>
                    <p class="titulo_corto "><?php echo strtoupper($noticia->id_titulo) ?></p>
                    <p><img src="<?php echo base_url(); ?>../assets/imagenes_noticias/<?php echo $noticia->imagen_portada ?>" alt=""></p>
                    <p class="lead titulo_largo"><?php echo strtoupper($noticia->titulo_largo) ?></p>
                    
                    </div>
                    </a>
                </div>
                
            <?php
        }   
        }
        ?>




        </div>


    <div class="row">
        <ul class="pagination float-right" role="navigation" aria-label="Pagination">


            <!-- Show pagination links -->
            <?php foreach ($links as $link) 
            {
                echo "<li>". $link."</li>";
            }
            ?>
        </ul>

    </div>

<!--
<footer>

  <div class="row expanded callout secondary">

    <div class="small-6 large-12 columns">
        <p class="lead">Contactanos</p>
        <ul class="menu vertical">
            <li><a href="#"><i class="fi-social-twitter"></i> Contactanos</a></li>
        </ul>
    </div>

  </div>
</footer>-->

    <script src="/noticias/js/jquery.js"></script>
    <script src="/noticias/js/foundation.js"></script>
    <script src="/noticias/js/isotope.min.js"></script>
    <script>
        

        $(document).ready(function(){
           $('.grid').isotope({
                  itemSelector: '.grid-item',
                  masonry: {
                    columnWidth: 100
                  }
                });
        });
        $(document).foundation();
    </script>
  </body>
</html>