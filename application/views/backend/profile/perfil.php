<link rel="stylesheet" href="/noticias/css/profile.css">
<link rel="stylesheet" href="/noticias/css/vendor.css">  
<script type="text/javascript">
$(document).ready(function () 
{

    $(".profilePicture").mouseover(function() 
    {
         $('.takeAvatar').show();
    });
    
    $(".profilePicture").mouseout(function() 
    {
         $('.takeAvatar').hide();
    });

    
    $(".editInfo").click(function()
    {
      $("#personlInfo").hide();
      $("#cont-editInfo").show();
    
    });

    $(".CancelEdit").click(function()
    {
      $("#cont-editInfo").hide();
      $("#personlInfo").show();
    });

    $(".savePersonalInfo").click(function()
    {
        var userID = $("#userID").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var telefono = $("#telefono").val();
        var dui = $("#dui").val();
        var direccion = $("#direccion").val();
        var aficiones = $("#aficiones").val();
        var email = $("#email").val();
        var linksSocial = $("#socialLinks").val();
        var genero = $("#genero").val();
        var cumple = $("#fecha").val();
        $.ajax
         ({
            url: "../Cprofile/savePersonalInfo",
            type:"post",  
            data: {userID:userID,nombre:nombre,apellido:apellido,telefono:telefono,dui:dui,direccion:direccion,aficiones:aficiones,email:email,linksSocial:linksSocial,genero:genero,cumple:cumple},
            success: function(data)
            {
    
                alert("Se modifico exitosamente");
                $(".pages").load("../Cprofile/ViewProfile");
            }
        });
      
    });

});
</script>
            
<section class="section">
<div class="row">

<?php
    //var_dump($datosProfile);
    foreach ($datosProfile as $value) 
      {


?>
    <!--       Card profile  -->
    <div class="col-xl-4">
    <div class="card card-default">
        <div class="card-header cardOpacity">
            <div class="profilePicture">
            <em class="fa fa-camera takeAvatar"></em>
             <?php
                
                if ($value->avatar == null) 
                {
                    echo "<img src='../../../assets/images/avatars/no_user_logo.png' height='250' width='250'>";
                } 
                else 
                {
                    echo "<img src='../../../assets/images/avatars/$value->avatar' height='250' width='250'>";
                }
                       
             ?>    
               
            </div>      
        </div>
        <div class="card-block" style="word-wrap: break-word;">
            
            <div class="col-xs-12 stat-col" style="margin-bottom: 15px;">
                <h4 class="title">  <span class="fa fa-comments"> </span> Redes Socials </h4>
                    <div class="value"> <?php echo $value->social_links; ?> </div>
            </div>
            <div class="clear"></div>
            <div class="col-xs-12 stat-col" style="margin-bottom: 15px;">
                <h4 class="title">  <span class="fa fa-heart"> </span> Aficiones </h4>
                    <div class="value"> <?php echo $value->Aficiones; ?> </div>
            </div>
        
        </div>
        <div class="card-footer"> 
           <progress class="progress stat-progress" value="<?php echo $value->porcentaje_perfil; ?>" max="100">
            <div class="progress">
                <span class="progress-bar" style="width: 75%;">Porcentaje de validacion de perfil</span>
            </div>
            </progress>
        </div>
    </div>
    </div>
    <!--     Card profile    -->

    <!--   card profile info   -->
     <div class="col-xl-8" id="personlInfo">
    <div class="card card-default">
        <div class="card-header">
            <div class="header-block">
                <strong> <?php echo $value->nombres." ".$value->apellidos; ?></strong>   --  
                <em class="fa fa-map-marker"> <?php echo $value->direccion; ?></em> 
            </div>
        </div>
        <div class="card-block">
            <address class="col-xs-6">
                <strong>Telefono</strong>
                <br>
              <?php echo $value->celular; ?>
            </address>

            <address class="col-xs-6">
                <strong>Direccion</strong>
                <br>
               <?php echo $value->direccion; ?>
            </address>

            <address class="col-xs-6">
                <strong>Correo electronico</strong>
                <br>
              <?php echo $value->email; ?>
            </address>

            <address class="col-xs-6">
                <strong>DUI</strong>
                <br>
               <?php echo $value->dui; ?>
            </address>

            <address class="col-xs-6">
                <strong>Fecha Cumpleanos</strong>
                <br>
              <?php echo $value->fecha; ?>
            </address>

             <address class="col-xs-6">
                <strong>Sexo</strong>
                <br>
              <?php echo $value->genero; ?>
            </address>

             <address class="col-xs-6">
                <strong>Comprobacion de correo</strong>
                <br>
                <label>
                 <?php 
                        if ($value->comprobacion_email == 0) 
                        {
                            echo "<input class='radio' type='radio' name='radios' disabled='disabled'>";
                        } 
                        else 
                        {
                            echo "<input class='radio' type='radio' name='radios' checked='checked'>";
                        }
                                                        
                 ?>
                    <span>Comprobado</span>
                </label>
            </address>

             <address class="col-xs-6">
                <strong>Ver Curriculum Vitae</strong>
                <br>
                <?php 
                        if ($value->cv_user != null) 
                        {
                            echo "<button type='button' class='btn btn-info viewCV'><em class='fa fa-file-text'></em>  Ver</button>";
                        } 
                        else 
                        {
                            echo "No data";
                        }
                                                        
                 ?>
            </address>
        </div>
        <div class="card-footer"> 
           <div class="header-block pull-right"> 
               <button type="button" class="btn btn-primary-outline editInfo">Editar</button>
            </div>
        </div>
    </div>
    </div>
    <!--     card profile info    -->    



    <!--   card profile info   -->
    <div class="col-xl-8" style="display: none;" id="cont-editInfo">
    <form id="modiInfo" action="POST">
     <input type="hidden"  id="userID" name="userID" value="<?php echo $value->id_usuario; ?>"> 
    <div class="card card-default">
        <div class="card-header">
            <div class="header-block">
                <strong> Editar informacion</strong>
            </div>
        </div>
        <div class="card-block">

            <div class="form-group has-success  has-feedback col-xs-6">
                <label class="control-label" for="inputSuccess2">Nombres</label> 
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $value->nombres; ?>"> 
                <span class="fa fa-check form-control-feedback"></span> 
            </div>

            <div class="form-group has-success  has-feedback col-xs-6">
                <label class="control-label" for="inputSuccess2">Apellidos</label> 
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $value->apellidos; ?>"> 
                <span class="fa fa-check form-control-feedback"></span> 
            </div>

             <div class="form-group has-success  has-feedback col-xs-6">
                <label class="control-label" for="inputSuccess2">Telefono</label> 
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $value->celular; ?>"> 
                <span class="fa fa-check form-control-feedback"></span> 
            </div>

            <div class="form-group has-success  has-feedback col-xs-6">
                <label class="control-label" for="inputSuccess2">Direccion</label> 
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $value->direccion; ?>"> 
                <span class="fa fa-check form-control-feedback"></span> 
            </div>

            <div class="form-group has-success  has-feedback col-xs-6">
                <label class="control-label" for="inputSuccess2">Correo Electrornico</label> 
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $value->email; ?>"> 
                <span class="fa fa-check form-control-feedback"></span> 
            </div>

            <div class="form-group has-success  has-feedback col-xs-6">
                <label class="control-label" for="inputSuccess2">Documento de Identidad</label> 
                <input type="text" class="form-control" id="dui" name="dui" value="<?php echo $value->dui; ?>"> 
                <span class="fa fa-check form-control-feedback"></span> 
            </div>

            <div class="form-group has-success  has-feedback col-xs-6">
                <label class="control-label" for="inputSuccess2">Link Redes Sociales</label> 
                <input type="text" class="form-control" id="socialLinks" name="socialLinks" value="<?php echo $value->social_links; ?>"> 
                <span class="fa fa-check form-control-feedback"></span> 
            </div>

            <div class="form-group has-success  has-feedback col-xs-6">
                <label class="control-label" for="inputSuccess2">Aficiones</label> 
                <input type="text" class="form-control" id="aficiones" name="aficiones" value="<?php echo $value->Aficiones; ?>"> 
                <span class="fa fa-check form-control-feedback"></span> 
            </div>

            <div class="form-group has-success  has-feedback col-xs-6">
                <label class="control-label" for="inputSuccess2">Fecha cumpleanos</label> 
                <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $value->fecha; ?>"> 
                <span class="fa fa-check form-control-feedback"></span> 
            </div>

             <div class="form-group has-success  has-feedback col-xs-6">
                <label class="control-label" for="inputSuccess2">Genero</label> 
                <?php 
                     if ($value->genero == "M") 
                        {
                            echo "<input class='radio' type='radio' id='genero' name='genero' value='M' checked='checked'> Masculino
                            <input class='radio' type='radio' id='genero' name='genero'  value='F'> Femenino";
                        } 
                        elseif($value->genero == "F")
                        {
                             echo "<input class='radio' type='radio' id='genero' name='genero' value='M'> Masculino
                            <input class='radio' type='radio' id='genero' name='genero'  value='F' checked='checked'> Femenino";
                        }
                        else
                        {
                             echo "<input class='radio' type='radio' id='genero' name='genero' value='M'  checked='checked'> Masculino
                            <input class='radio' type='radio' id='genero' name='genero'  value='F'> Femenino";
                        }
                ?>
                <span class="fa fa-check form-control-feedback"></span> 
            </div>
         </div>
        <div class="card-footer"> 
           <div class="header-block pull-right"> 
               <button type="button" class="btn btn-danger-outline CancelEdit">Cancelar</button>
               <button type="button" class="btn btn-primary-outline savePersonalInfo">Guardar</button>
            </div>
        </div>
    </div>
    </form>
    </div>
    <!--     card profile info    -->    
                            
                            
</div>
</section>
<?php } ?>