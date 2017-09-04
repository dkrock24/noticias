$( document ).ready(function() 
{
	$(".loading").hide();

	$("a#submenu").click(function()
	{
		$(".loading").show();
		var pages 	= $(this).attr('href');	
		var data 	= pages.substr(1);
		var titulo 	= $(this).text();	
		
		$(".titulo_submenu").html("<span>"+titulo+"</span>");
		$.ajax({
		    //url: "/noticias/class_db/configuracion.php",
		    type:"post",
		    data: 1,
		    
		    success: function()
		    {
		    	//$(".loading").hide();
		       	$(".pages").load("/noticias/index.php/"+data);
		    },
		    error:function(){
		    	$(".loading").hide();
		        alert("nada..");

		    }
		});	
	});

	

});
	
