
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Backend | Noticias </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="/noticias/css/vendor.css">
        <!-- Theme initialization -->
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
        <style type="text/css">
            .color{
                height: 5px;
                background: orange;
            }
        </style>
    </head>

    <body>
        <div class="auth">
            <div class="">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title text-xs-center">
                            <div class="logo">
                                <span class="l l1"></span>
                                <span class="l l2"></span>
                                <span class="l l3"></span>
                                <span class="l l4"></span>
                                <span class="l l5"></span>
                            </div> Noticias | Digitales

                        </h1>
                        <p class="text-xs-center">La Noticia Que Se Ve </p>
                        <div class="uth-header color"></div>
                    </header>
                    <div class="col col-xs-1 col-sm-1 col-md-1 col-xl-1"></div>
                    <div class="auth-content col col-xs-12 col-sm-12 col-md-10 col-xl-10">
                        
                        <form role="form"  method="post" action="autenticacion">
                            <div class="history-col text-xs-center">
                                <div class="card sameheight-item" data-exclude="xs">
                                    <div class="card-header card-header-sm bordered">
                                        <div class="header-block">
                                            <h3 class="title">Ingresa la información siguiente</h3>
                                        </div>
                                        <ul class="nav nav-tabs pull-right" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" href="#visits" role="tab" data-toggle="tab">Crear usuario</a> </li>
                                            <li class="nav-item"> <a class="nav-link" href="#downloads" role="tab" data-toggle="tab">Politicas</a> </li>
                                        </ul>
                                    </div>
                                    <div class="card-block">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active fade in" id="visits">
                                                <p class="title-description"> Informacion General </p>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">Nombres</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">Apellidos</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">Telefono</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">Celular</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>
                                                </div>    

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">DUI</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">Dirección</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">Usuario</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">Password</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">Genero</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">Pais</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">Departamento</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group has-success">
                                                            <label class="control-label" for="inputSuccess1">Genero de interes</label>
                                                            <input type="text" class="form-control underlined" id="inputSuccess1">
                                                        </div>
                                                    </div>
                                                </div>   

                                                <div class="row">
                                                    <div class="col-md-9"></div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-primary">Crear Usuario</button>
                                                    </div>
                                                </div>                                        
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="downloads">
                                                <p class="title-description"> Politicas y Acuerdos de uso </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                           
                        </form>
                    </div>
                    <div class="col col-xs-1 col-sm-1 col-md-1 col-xl-1"></div>
                </div>
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="/noticias/js/vendor.js"></script>
        <script src="/noticias/js/app.js"></script>
    </body>

</html>