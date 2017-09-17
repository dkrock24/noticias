
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
    </head>

    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Backend | sisepudo.com </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-xs-center">LOGIN PARA CONTINUAR</p>
                        <form role="form"  method="post" action="autenticacion">

                            <div class="form-group">
                                <label for="username">Usuario</label>
                                <input type="text" class="form-control underlined" name="usuario" id="usuario" placeholder="" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control underlined" name="password" id="password" placeholder="" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Login" class="btn btn-block btn-primary" data-style="expand-left">
                            </div>

                            <div class="form-group">
                                <p class="text-muted text-xs-center">Crear Nueva Cuenta? 
                                    <a href="../backend/registro/Cregistro/Autoregistro/">Registrarme</a>
                                </p>
                            </div>
                        </form>
                    </div>
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