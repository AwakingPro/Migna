$(document).ready(function($) 
{
	$('.seleccione_tipo').on('click',function() 
	{
    	var mivar = $(this).closest('tr').attr('id');
    	var id_cedente = $('#id_cedente').val();
		
        var data = 'id='+mivar+"&id_cedente="+id_cedente;
        console.log(data);
        var recorrer = $('.seleccione_tipo').length;
		if ($('.seleccione_tipo').is(':checked')) 
		{ 
        	$.niftyNoty(
			{
				type: 'success',
				icon : 'fa fa-check',
				message : "Tipo Estrategia Seleccionado" ,
				container : 'floating',
				timer : 2000
			});
            for (var i=1; i<=recorrer; i++) 
			{
            	if (mivar==i)
				{
					$('#uno'+i).attr("disabled" , false);
				}
				else 
				{
					$('#uno'+i).attr("disabled" , true);
                }
			}
            $.ajax(
	        {
				type: "POST",
				url: "../../includes/tareas/seleccione_tipo.php",
				data:data, 
				success: function(response)
				{ 
					$('#mostrar_estrategia').show();			
                    $('#cambiar2').html(response);
					$('html,body').animate({ scrollTop: $("#cambiar").offset().top }, 1000);    
					$('.seleccione_estrategia').on('click',function() 
					{
						
						console.log("AÑADIEDO CLASS");

						var mivar2 = $(this).closest('tr').attr('id');
						var mivar3 = $(this).closest('tr').attr('class');
						var data = 'id='+mivar2;
						var recorrer2 = $('.seleccione_estrategia').length;	
						if ($('.seleccione_estrategia').is(':checked')) 
						{ 
							 
							
							

						for (var j=1; j<=recorrer2; j++) 
						{
							if (mivar3==j)
							{
								$('#dos'+j).attr("disabled" , false);
								$('body').addClass("loading"); 
							}
							else 
							{
								$('#dos'+j).attr("disabled" , true); 
						    }
						}

						$.ajax(
						{
							type: "POST",
							url: "../../includes/tareas/seleccione_estrategia.php",
							data:data, 
							success: function(response)
							{ 
								$('body').removeClass("loading");  
								$.niftyNoty({
									type: 'success',
									icon : 'fa fa-check',
									message : "Estrategia Seleccionada" ,
									container : 'floating',
									timer : 2000
								});
								$('#mostrar_cola').show();
								$('#cambiar3').html(response);
								$('html,body').animate({scrollTop: $("#cambiar3").offset().top}, 1000);
								$('.activar_cola').on('click',function() 
								{
									var id_var = $(this).closest('tr').attr('id');
									var id_var2 = '#k'+id_var;
									var mivar = $(this).closest('tr').attr('id');
								    var data = "id="+mivar;
									console.log(id_var2);
									var prueba = $(id_var2).val();
									console.log(prueba);
							    	if (prueba==1) 
									{ 
										prueba = $(id_var2).val("0");
										$('body').addClass("loading");
										$.ajax(
								        {
											type: "POST",
											url: "../../includes/tareas/desactivar_cola.php",
											data:data, 
											success: function(response)
											{ 
												$('body').removeClass("loading"); 
												console.log(response);
												if(response==1)
												{
													$.niftyNoty({
														type: 'danger',
														icon : 'fa fa-check',
														message : "Cola Desactivada" ,
														container : 'floating',
														timer : 4000
													});

												}
												else
												{

												}
											}	
										});	
								    	
									}
									else
									{

										prueba = $(id_var2).val("1");
										console.log(response);

										$('body').addClass("loading"); 
								    	var mivar = $(this).closest('tr').attr('id');
								    	var data = "id="+mivar;
								    	$.ajax(
								        {
											type: "POST",
											url: "../../includes/tareas/activar_cola.php",
											data:data, 
											success: function(response)
											{ 
												$('body').removeClass("loading"); 
												console.log(response);
												if(response==1)
												{
													$.niftyNoty({
														type: 'danger',
														icon : 'fa fa-check',
														message : "La Cola ya existe" ,
														container : 'floating',
														timer : 2000
													});

												}
												else
												{
													$.niftyNoty({
														type: 'success',
														icon : 'fa fa-check',
														message : "Cola Activada , Ya se puede visualizar en el Discador!" ,
														container : 'floating',
														timer : 4000
													});
												}	
											}	
										});	
										
									}	
							    });	
								
						 	}
	                	});      
			  		} 
					else 
					{		 
						for (var j=1; j<=recorrer2; j++) 
						{
							$('#dos'+j).attr("disabled" , false);
						}
						$('#mostrar_cola').fadeOut( "slow", function() {

  						});
					}  
				}); 	
			}
 		});     
	} 
	else 
	{ 
		for (var i=1; i<=recorrer; i++) 
		{                       		
			$('#uno'+i).attr("disabled" , false);
		}
		$('#mostrar_estrategia').fadeOut( "slow", function() {

  		});
		$('#mostrar_cola').fadeOut( "slow", function() {

  		});
		$('html,body').animate({ scrollTop: $("#cambiar").offset().top}, 1000);
	}       
});
	

});