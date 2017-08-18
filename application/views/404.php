<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="/noticias/css/vendor.css">
        <!-- Theme initialization -->

        <script type="text/javascript" src="/noticias/js/jquery.js"></script> 
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
            }
        </script>
        <style type="text/css">
            .app {
                position: relative;
                width: 100%;
                padding-left: 0px; 
                min-height: 100vh;
                margin: 0 auto;
                left: 0;
                background-color: #f0f3f6;
                box-shadow: 0 0 3px #ccc;
                transition: left 0.3s ease, padding-left 0.3s ease;
                overflow: hidden;
            }
        </style>
    </head>

    <body>
        <div class="">
            <div class="app" id="app">
                
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <article class="content error-404-page">
                    <section class="section">
                        <div class="error-card">
                            <div class="error-title-block">
                                <h1 class="error-title">404</h1>
                                <h2 class="error-sub-title"> Lo Sentimos, Página no encontrada </h2>
                            </div>
                            <div class="error-container">
                                <p>Intenta regresar al inicio</p>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group"> 
                                            
                                            <span class="input-group-btn"></span>
                                        </div>
                                    </div>
                                </div> 
                                <br>
                                <a class="btn btn-primary" href="../../backend/index/autenticacion"><i class="fa fa-angle-left"></i> Regresar al Dashboard
                                </a>
                            </div>
                        </div>
                    </section>
                </article>
            </div>
        </div>
    </body>
               
    <script src="/noticias/js/vendor.js"></script>
    <script src="/noticias/js/app.js"></script>
