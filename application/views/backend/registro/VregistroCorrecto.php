<!doctype html>
<html  lang="es">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Registro | Sistema de Noticias </title>
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
                document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
            }



}

</script>
</head>
<body>
<div class="auth">
<div class="auth-container">

<!--      card mensaje si es exitoso el envio del form   -->
<div class="card card-success">
    <div class="card-header">
    <div class="header-block">
        <p class="title"> Success card </p>
    </div>
    </div>
    <div class="card-block">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
    </div>
    <div class="card-footer"> Card Footer </div>
</div>

<!--       END CARD mensaje    -->


</div>
</div>
<script src="/noticias/js/vendor.js"></script>
<script src="/noticias/js/app.js"></script>

</body>

</html>