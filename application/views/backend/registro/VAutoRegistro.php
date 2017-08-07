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
        <script src="/noticias/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () 
{
    $("#validatoSend").hide();

    $('#agree').click(function() 
    {
      if ($(this).is(':checked')) 
      {
        $("#validatoSend").show();
      }
      else
      {
        $("#validatoSend").hide();
      }
    });
});
</script>


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
</head>
<body>
<div class="auth">
<div class="auth-container">
<!--          Form auto registro  -->
    
<div class="card">
<header class="auth-header">
    <h1 class="auth-title">
        <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> 
        <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> 
        </div>
         Auto registro 
    </h1>
</header>
<div class="auth-content">
    <form id="signup-form" action="../saveRegistro" enctype="multipart/form-data"  method="POST" novalidate="">
        
        <div class="form-group"> 
        <label for="firstname">Nombres Apellidos</label>
        <div class="row">
            <div class="col-sm-6"> 
                <input type="text" class="form-control underlined" name="nombres" id="nombres" placeholder="Nombres" required=""> 
            </div>
            <div class="col-sm-6"> <input type="text" class="form-control underlined" name="apellidos" id="apellidos" placeholder="Apellidos" required=""> </div>
            </div>
        </div>
        
        <div class="form-group"> 
            <label for="email">Correo electronico</label> 
            <input type="email" class="form-control underlined" name="email" id="email" placeholder="Correo electronico" required=""> 
        </div>

        <div class="form-group"> 
            <label for="email">Dirección</label> 
            <input type="text" class="form-control underlined" name="direccion" id="direccion" placeholder="Dirección" required=""> 
        </div>
                        
        <div class="form-group"> 
        <label for="firstname">Curriculum Vitae </label>
        <div class="row">
            <div class="col-sm-6"> 
                <input type="file" id="files" name="files[]" class="form-control underlined" accept="application/pdf" required=""> 
            </div>
            <div class="col-sm-6"> 
                <input type="number" pattern="[0-9.]*" class="form-control underlined" name="telefono" id="telefono" placeholder="Teléfono" required=""> 
            </div>
        </div>
        </div>
        
        <div class="form-group"> 
            <label for="agree">
            <input class="checkbox" name="agree" id="agree" type="checkbox" required=""> 
                <span>Acepta terminos y <a href="#">condiciones</a></span>
            </label> 
        </div>
        
        <div class="form-group"> 
            <button type="submit" class="btn btn-block btn-primary" id="validatoSend"> Enviar datos</button> 
        </div>
        
        <div class="form-group">
            <p class="text-muted text-xs-center">Ya tienes una cuenta? 
            <a href="../../../index/">Iniciar sesión!</a>
        </div>
        <div class="form-group">
            <a href="../../../profile/Cprofile/ViewProfile">Perfil</a>
        </div>
    </form>
</div>
</div>            

<!--               End FORM       -->
</div>
</div>
<script src="/noticias/js/vendor.js"></script>
<script src="/noticias/js/app.js"></script>

</body>

</html>