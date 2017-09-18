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
        .lead_home{
        font-size: 1.9375rem;
        line-height: 1.6;
        margin-bottom: 15px;
        color: black;
        font-weight: 400;
        display: inline-block;
    }
    .registrate{
        display: inline-block;
        float: right;
        position: relative;
        margin-top: -45px;
        background: black;
    }
    .column2{
        height: 80px;
        box-sizing: inherit;
        position: relative;
    }
    a {
        text-decoration: none;
    }

    </style>

    <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="/noticias/css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="/noticias/css/app.css">');
            }
        </script>


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

        <div class="row column column2">
            <a href="/noticias/index.php/noticia/index/index"><h3><p class="lead_home">sisepudo.com</p></h3></a>
            <a class="button registrate" href="/noticias/index.php/backend/index/index">Login</a>
            <a class="button registrate" href="/noticias/index.php/noticia/index/contactanos">Contáctanos</a>
            <a class="button registrate" href="/noticias/index.php/backend/registro/Cregistro/Autoregistro/">Registrate</a>

        </div>

        


        <!-- Navigation -->
        <div class="title-bar" data-responsive-toggle="realEstateMenu" data-hide-for="small">
        </div>

        <div class="top-bar" id="realEstateMenu">        </div>
        <!-- /Navigation -->
        <br>

        <div class="row expanded callout secondary">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="header-block">
                        <a href="/noticias/index.php/noticia/index/index"> Regresar </a>
                        <p class="title"> 
                          Ingresa la Información de Conctato </p>
                    </div>
                </div>
                <div class="card-block">
                    <form name="contactanos" method="post" id="contactanos" action="guarda_contacto">
                    <div class="row column">
                        <div class="small-3 large-3 columns">
                            <label class="control-label">Nombre Completo</label> 
                            <input type="text" name="nombre" class="form-control underlined" required=""> 
                        </div>

                        <div class="small-3 large-3 columns">
                            <label class="control-label">E-Mail</label> 
                            <input type="text" name="correo" class="form-control underlined" required=""> 
                        </div>

                        <div class="small-3 large-3 columns">
                            <label class="control-label">Telefono</label> 
                            <input type="text" name="telefono" class="form-control underlined" required=""> 
                        </div>

                        <div class="small-3 large-3 columns">
                            <label class="control-label">Comentario</label> 
                            <input type="text" name="comentario" class="form-control underlined" required=""> 
                        </div>
                    </div>

                    <div class="row column">
                        <div class="small-3 large-3 columns">
                        <input type="submit" class="btn btn-primary" name="Enviar" value="Enviar">
                        </div>
                    </div>

                </form>

                </div>
                <div class="card-footer"> Gracias por contactarnos :)</div>
                </div>
        </div>




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