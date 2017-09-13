

    <script>
    	$(document).ready(function(){
    		$(".msg1").hide();
    		$(".msg2").hide();
    		$(".msg3").hide();
    		$("#cambiar_password").hide();

      		$("#password1").keyup(function(){
      			var a = $("#password1").val();
      			var longitud = a.length;

      			if(longitud ==0)
      			{
      				$(".progress-bar").css('width','0%');
      				$(".progress-bar").addClass('progress-bar-dark'); 			
      				$(".progress-bar").text('0%');
      				$(".nivel").text("Nulo");
      			}

      			if(longitud >2 && longitud<=4)
      			{
      				$(".progress-bar").css('width','20%');
      				$(".progress-bar").addClass('progress-bar-danger'); 			
      				$(".progress-bar").text('20%');
      				$(".nivel").text("Muy Bajo");
      				$("#cambiar_password").hide();
      			}
      			if(longitud>4 && longitud<=5)
      			{
      				$(".progress-bar").removeClass('progress-bar-danger'); 		
      				$(".progress-bar").css('width','40%');
      				$(".progress-bar").addClass('progress-bar-warning'); 
      				$(".progress-bar").text('40%');
      				$(".nivel").text("Bajo");
      				$("#cambiar_password").show();
      			}
      			if(longitud>8 && longitud<=10)
      			{
      				$(".progress-bar").removeClass('progress-bar-warning'); 
      				$(".progress-bar").css('width','70%');
      				$(".progress-bar").addClass('progress-bar-success'); 
      				$(".progress-bar").text('70%');
      				$(".nivel").text("Intermedio");
      				$("#cambiar_password").show();
      			}
      			if(longitud>12)
      			{
      				$(".progress-bar").removeClass('progress-bar-success'); 
      				$(".progress-bar").css('width','100%');
      				$(".progress-bar").addClass('progress-bar-primary'); 
      				$(".progress-bar").text('100%');
      				$(".nivel").text("Fuerte");
      				$("#cambiar_password").show();
      			}      			   
      		});

	 		$("#cambiar_password").click(function(){

	 			var a = $("#password1").val();
	 			var b = $("#password2").val();
	 			var usuario = $("#id_usuario").val();
	 			var accion	= "cambiarPassword"  ;

	 			if(a==b){
	 				var data = {
				          password:a,
				          usuario:usuario, 
				          accion:accion
				      	};       
	 				cambiarPassword(data);
	 			}
	 			else
	 			{ 				
	 				$(".msg1").slideDown(200, function(){
			        	$(".msg1").show();
				        setTimeout(function() {
				        	$(".msg1").slideUp(1000);
				        }, 3000);
			        });
			        	$("#password1").val("");
			        	$("#password2").val("");
			        	$(".progress-bar").css('width','0%');
	      				$(".progress-bar").addClass('progress-bar-dark'); 			
	      				$(".progress-bar").text('0%');
	      				$(".nivel").text("Nulo");
	 			}
	 		});
    	});

	 	function cambiarPassword(data)
	 	{
	 		$.ajax({
	        url: "../../../class_db/saveUsuario.php",
	        type:"post",
	        data: data,
	        
		        success: function(){
		        	$(".msg2").slideDown(200, function(){
			        	$(".msg2").show();
                
				        setTimeout(function() {
				        	$(".msg2").slideUp(1000);
				        }, 3000);
			        });	  
              //window.location="logaut.php" ;   
		        },
		        error:function(){
		            $(".msg3").slideDown(200, function(){
			        	$(".msg3").show();
				        setTimeout(function() {
				        	$(".msg3").slideUp(1000);
				        }, 3000);
			        });
		        }
	  		});	
	 	}
    </script>
    <style>
  .table-dynamic{width: 100%;}
  .form-inline .form-control {
    width:85%;
    font-weight: 10px;
    padding: 4px;
  }

  .input__label-content{
    margin-top: -20px;
  }
  #anio{
    width: 100%;
  }
  .info{
  	background: red;
  }
  .btn-primary{
    background-color: #9AC835;
  }
</style>


<div class="row">
      <div class="col-md-12">
            <div class="card card-primary">
                  <div class="card-header">
                        <div class="header-block">
                              <div class="container">
                                    <div class="row abc">
                                          <div class="col-md-8 global_text">Cambiar Contraseña</div>
                                          
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
        </div>
    </div>
</div>

<div class="table-flip-scroll">
    <div class="row">
        <div class="col-md-12">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-6">   
                        <input class="form-control" type="password" id="password1" />                     
                    </div>
                    <div class="col-md-6">   
                    <input class="form-control" type="password" id="password2" required />                     
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">  
                    <span class="">Digite La Nueva Contraseña</span>                      
                    </div>
                    <div class="col-md-6">   
                    <span class="">Vuelva a  Digitar La Nueva Contraseña</span>
                    </div>
                </div>
                    <br>
                <div class="row">
                    <div class="col-md-12">  
                        <div class="demo">
                        Nivel de Seguridad <span class='nivel'></span>
                            <div class="progress progress-bar-large">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" >
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<input type="hidden" value="<?php echo $_SESSION['idUser']; ?>" name="idusuario" id="id_usuario">
<div class="tab-content">
    <div class="tab-pane fade active in" id="tab1_1">

    <div class="row">
    	
    	<div class="col-md-12">
    	<div class="panel bg-dark">

                <div class="panel-content" style="display: none;">
                	<p>
    					Se debe cambiar la contraseña del sistema para el usuario......<strong><?php echo $_SESSION["data"][3]; ?></strong><br>
    					Por favor digite la misma contraseña dos veces para cambiarla..
    				</p>
                </div>
              </div>
    	</div>
    </div>
    <div class="row alert-danger msg1">
        <div class="col-md-12">        	
        	<div class="msg" ><h3>La Contraseña Introducida Es Distinta... Vuelva a Intentarlo</h3></div>
        </div>
    </div>
    <div class="row alert-info msg2" role="alert">
        <div class="col-md-12">        	
        	<div class="msg2" ><h3>La Contraseña Se Cambio Satifactoriamente...Iniciar Session Nuevamente</h3></div>
        </div>
    </div>
    <div class="row alert-warning msg3">
        <div class="col-md-12">        	
        	<div class="msg3" ><h3>No se Cambio La Contraseña. Problemas de Acceso.. </h3></div>
        </div>
    </div>

    <div class="row">
    <div class="col-md-10">
    	
    </div>
        <div class="col-md-2">
        	<input type="button" id="cambiar_password" class="btn btn-primary" value="Guardar">
        </div>
    </div>
    
    </div>
</div>

