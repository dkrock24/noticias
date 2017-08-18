$( document ).ready(function() 
{
	$("a#submenu").click(function()
	{
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
		       	$(".pages").load("/noticias/index.php/"+data);
		     
		    },
		    error:function(){
		        alert("nada..");

		    }
		});	
	});

	

});
	
