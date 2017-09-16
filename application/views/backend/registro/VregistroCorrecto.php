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
      var code = $("#codigo").val();
      if (code != "") 
        {
            $.ajax
           ({
                url: "../Cregistro/confirmRegister",
                type:"post",
                data: {code:code},
                success: function(data)
                {
                  if (data ==1) 
                  {
                    $(".msgCorrect").show('slow');
                    $("#codigo").val("");
                    $(".validateContent").remove();
                    $(".newToekn").remove();
                    
                  }
                  else
                  {
                    $(".msgWrong").show('slow');
                    $(".msgWrong").fadeOut(6000);        
                  }
                }
      
            });
        }
        else
        {
            alert("Es necesario el codigo de validacion");
        }
    });

    $(".showToken").click(function()
    {
        $(".newToekn").show();
        $(".validateToken").show("viewToken");
        $(".showToken").hide();
        $(".validateContent").hide();
    });

    $(".validateToken").click(function()
    {
        $(".newToekn").hide();
        $(".validateToken").hide("viewToken");
        $(".showToken").show();
        $(".validateContent").show();
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
<?php
//var_dump($message);
?>    
<div class="card card-success">
<div class="card-header">
        <div class="header-block">
            <p class="title"> Su registro se envio correctamente!!! </p>
        </div>
    </div>
    <div class="card-block">
    <div class="auth-content" style="padding: 30px 10px;">


        <div class="validateContent">
         <p>Es necesario que introdusca el codigo que le enviamos al correo que regisrto. Digite el codigo  y haga click en el boton enviar. Con esto inicia le proceso de validacion de identidad y luego pasara a un proceso de aprobacion.
            </p>
        <form id="signup-form" action="" enctype="multipart/form-data"  method="POST" novalidate="">
            
            <div class="form-group"> 
            <label for="firstname">CODIGO DE VALIDACION</label>
            <div class="row">
                <div class="col-sm-12"> 
                    <input type="text" class="form-control underlined" name="codigo" id="codigo" placeholder="Codigo" required=""> 
                </div>
             </div>
            </div>
            <div class="form-group"> 
                <button type="button" class="btn btn-primary btn-lg btn-block" id="sendCode"> Validar</button> 
            </div>    
        </form>
        </div>

        <div class="newToekn" style="display: none;">
         <p>Tiene que ingresar el correo electronico con el que creo su cuenta para que se le pueda enviar el token.
            </p>
            <form id="signup-form" action="" enctype="multipart/form-data"  method="POST" novalidate="">
            
            <div class="form-group"> 
            <label for="firstname">Correo electronico</label>
            <div class="row">
                <div class="col-sm-12"> 
                    <input type="text" class="form-control underlined" name="Pemal" id="Pemal" placeholder="Correo electronico" required=""> 
                </div>
             </div>
            </div>
            <div class="form-group"> 
                <button type="button" class="btn btn-primary btn-lg btn-block" id="sendEmail"> Enviar </button> 
            </div>    
        </form>
        </div>

         <div class="alert alert-success msgCorrect" style="display: none;">
         <p> <h3>Validacion exitosa</h3>
         Su token fue valido, por el momento su perfil pasara a aprobacion y cuando este confirmado se enviaran las credenciales al correo con el cual se registro.
            </p>
        </div>


         <div class="alert alert-warning msgWrong" style="display: none;">
         <p><h3>Validacion erronea</h3><br>
         - El token ingresado es incorrecto <br>
            - El token ya ha sido validado.
            </p>
        </div>

</div>
    </div>
    <div class="card-footer">
     <button type="button" class="btn btn-info btn-lg btn-block showToken">Enviar Nuevo Token</button>
     <button type="button" class="btn btn-info btn-lg btn-block validateToken" style="display: none;">Validar Token</button>
    </div>
</div>     

<!--               End FORM       -->
</div>
</div>
<script src="/noticias/js/vendor.js"></script>
<script src="/noticias/js/app.js"></script>

</body>

</html>e