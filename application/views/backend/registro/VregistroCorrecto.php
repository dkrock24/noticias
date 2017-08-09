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
    $("#sendCode").click(function()
    {
      
      var code = $("#Codigo").val();
      if (code != "") 
        {
            $.ajax
           ({
                url: "../registro/Cregistro/disapproved_sobras",
                type:"post",
                data: {sobrasID:sobrasID,status:status},
                success: function()
                {
        
                  $(".pages").load("../sobras/Csobras/index"); 
                }
      
            });
        }
        else
        {
            alert("Es necesario el codigo de validacion");
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
    
<div class="card card-success">
<div class="card-header">
        <div class="header-block">
            <p class="title"> Su registro se envio correctamente!!! </p>
        </div>
    </div>
    <div class="card-block">
        <p>Es necesario que introdusca el codigo que le enviamos al correo que regisrto. Digite el codigo  y haga click en el boton enviar. Con esto inicia le proceso de validacion de identidad y luego pasara a un proceso de aprobacion.
        </p>

    <div class="auth-content">
    <form id="signup-form" action="" enctype="multipart/form-data"  method="POST" novalidate="">
        
        <div class="form-group"> 
        <label for="firstname">CODIGO DE VALIDACION</label>
        <div class="row">
            <div class="col-sm-12"> 
                <input type="text" class="form-control underlined" name="Codigo" id="Codigo" placeholder="Codigo" required=""> 
            </div>
         </div>
        </div>
        <div class="form-group"> 
            <button type="button" class="btn btn-primary btn-lg btn-block" id="sendCode"> Validar</button> 
        </div>    
    </form>
</div>
    </div>
    <div class="card-footer"> Validacion de datos </div>
</div>     

<!--               End FORM       -->
</div>
</div>
<script src="/noticias/js/vendor.js"></script>
<script src="/noticias/js/app.js"></script>

</body>

</html>