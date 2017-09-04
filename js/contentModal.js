$( document ).ready(function() 
{
	$(".getModal").click(function()
	{
		var id = $(this).attr('href');
		var re_load = $(this).attr('id');
		$('.demo').html("");
		
		$.ajax({
		    url: id,
		    type:"post",
		    data: 1,
		    
		    success: function(data)
		    {
		       	if(re_load==0)
		       	{
		       		drawData(data);
		       	}
		       	else
		       	{
		       		$(".pages").load(id);
		       	}		    	
		    	
		    	
		    },
		    error:function(){
		        alert("Error Al Cargar Informacón");
		    }
		});	
	});

	$("#guardar").click(function()
	{

		var path 	= $(this).attr('href');
		var id 		= $("#id_categoria").val();
		var id_categoria = $("#id_categoria").val();
		
		$.ajax({
		    url: path+id,
		    type:"post",
		    data: $("#categoria_editar").serialize(),
		    
		    success: function(data)
		    {  		    	
		    	$('.demo').html('<h4><i class="fa fa-refresh fa-3"></i> Registro Actualizado</h4>');
				$("#product_view").css('display','none');
				$(".modal-backdrop").remove();
				
		    	$(".pages").load("../categoria/Ccategoria/index");
		    },
		    error:function(){
		        alert("Error Al Actualizar Informacón");
		    }
		});	
	});


	$(".btn-crear").click(function()
    {
        $(".loading").show();
        var url = $(this).attr('name');      
        $(".pages").load(url);  
        
        
    });


    
    // Eliminar comentarios
    $(".btn-delete").click(function(){
         
            var url = $(this).attr('name');
            var id = $(this).attr('id');
            $("#reply"+id).hide();
            $("#reply"+id).remove();

            $("#cmt"+id).hide();
            $("#cmt"+id).remove();
            $.ajax({
            url: url,  
            type: "post",

                success: function(data){   
                   
                },
                error:function(){
                }
            });
    });


    $("#guardarData").click(function(){
    	 $(".loading").show();   
		var abc = tinymce.get("contents").getContent();
		$("#contents").html(abc);

         	var url = $(this).attr('name');
        	$.ajax({
            url: url,  
            type: "post",
            data: $('#crearData').serialize(),

                success: function(data){   

                	$(".pages").load(data);
                    $(".loading").hide();   
                
                },
                error:function(){
                }
            });
    });

    $("#guardarData2").click(function(){


         	var url = $(this).attr('name');
        	$.ajax({
            url: url,  
            type: "post",
            data: $('#crearData2').serialize(),

                success: function(data){   

                	$(".pages").load(data);
                
                },
                error:function(){
                }
            });
    });


     $("#guardarDataFront").click(function(){

            $("#guardarDataFront").attr("disabled",true);
         	var url = $(this).attr('name');
        	$.ajax({
            url: url,  
            type: "post",
            data: $('#crearData2').serialize(),

                success: function(data){   

                	location.reload();
                
                },
                error:function(){
                }
            });
    });

    $(".input-custom2").click(function(){
    	  var id = $(this).attr("name");
    	  var cmt = $("#"+id).val();
    	  var avatar = $("#avatar-respuesta").val();

    	  var data = {"id_noticia":id,"cmt":cmt,"avatar":avatar}

    	  $.ajax({
            url: "../insert_respuesta/",  
            type: "post",
            data: data,

                success: function(data){   

                	location.reload();
                
                },
                error:function(){
                }
            });
    });



});
	