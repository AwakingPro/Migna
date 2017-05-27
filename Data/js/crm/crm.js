$(document).ready(function($) 
{
	$('#seleccione_cedente').change(function() 
	{
    	var id = $('#seleccione_cedente').val();
    	console.log(id);
    	var data = "id="+id;
    	$.ajax(
	    {
			type: "POST",
			url: "../includes/crm/seleccione_cedente.php",
			data:data, 
			success: function(response)
			{	
				$('#colas').hide();
				$('#colas_mostrar').show();
				$('#colas_mostrar').html(response);
				$('#seleccione_estrategia').change(function() 
				{
					var idc = $('#seleccione_estrategia').val();
					var data = "id="+idc;
			    	$.ajax(
				    {
						type: "POST",
						url: "../includes/crm/seleccione_cola.php",
						data:data, 
						success: function(response)
						{	
							$('#colas2').hide();
							$('#colas_mostrar2').show();
							$('#colas_mostrar2').html(response);
							$('#respuesta_rapida_ocultar').hide();
							$('#respuesta_rapida').show();
							$('#respuesta').change(function() 
							{
								$.niftyNoty(
								{
									type: 'success',
									icon : 'fa fa-check',
									message : 'Respuesta Rapida Guardada' ,
									container : 'floating',
									timer : 2000
								});
							});	
							$('#seleccione_cola').change(function() 
							{
								var idq = $('#seleccione_cola').val();
								var data = "id="+idq;
						    	$.ajax(
							    {
									type: "POST",
									url: "../includes/crm/seleccione_query.php",
									data:data, 
									dataType: 'json',
									success: function(response)
									{	
										$('#ocultar_rut').hide();
										$('#mostrar_rut').show();
										$('#mostrar_rut').html(response.uno);
										$('#mostrar_rut2').html(response.cinco);
										$('#next_rut').val(response.dos);
										$('#prev_rut').val(response.dos);
									
										$('#mostrar_nombre').html(response.tres);
										$('#mostrar_nombre_ocultar').hide();
										$('#prefijo').val(response.cuatro);


										console.log(response.cuatro);
										var data_fono = "rut="+response.dos+"&prefijo="+response.cuatro;
										$.ajax(
										{
											type: "POST",
											url: "../includes/crm/mostrar_fonos.php",
											data:data_fono, 
											success: function(response)
											{
												$('#mostrar_fonos').html(response);
												$('#mostrar_fonos_ocultar').hide();
											}
										});		
										$('#next_rut').click(function()
										{
											var rut = $('#next_rut').val();
											var prefijo = $('#prefijo').val();
											var data = "rut="+rut+"&prefijo="+prefijo;
											console.log(data);
											$.ajax(
										    {
												type: "POST",
												url: "../includes/crm/next_rut.php",
												data:data, 
												dataType: 'json',
												success: function(response)
												{	
													$('#mostrar_rut').html(response.uno);
													$('#mostrar_rut2').html(response.cinco);
													$('#next_rut').val(response.dos);
													$('#prev_rut').val(response.dos);
													$('#mostrar_nombre').html(response.tres);
													$('#prefijo').val(response.cuatro);
													console.log(response);
													var data_fono = "rut="+response.dos+"&prefijo="+response.cuatro;
													$.ajax(
													{
														type: "POST",
														url: "../includes/crm/mostrar_fonos.php",
														data:data_fono, 
														success: function(response)
														{
															$('#mostrar_fonos').html(response);
														}
													});		
												}
											});		
										});
										$('#prev_rut').click(function()
										{
											var rut = $('#prev_rut').val();
											var prefijo = $('#prefijo').val();
											var data = "rut="+rut+"&prefijo="+prefijo;
											console.log(data);
											$.ajax(
										    {
												type: "POST",
												url: "../includes/crm/prev_rut.php",
												data:data, 
												dataType: 'json',
												success: function(response)
												{	
													$('#mostrar_rut').html(response.uno);
													$('#mostrar_rut2').html(response.cinco);
													$('#next_rut').val(response.dos);
													$('#prev_rut').val(response.dos);
													$('#mostrar_nombre').html(response.tres);
													$('#prefijo').val(response.cuatro);
													console.log(response);
													var data_fono = "rut="+response.dos+"&prefijo="+response.cuatro;
													$.ajax(
													{
														type: "POST",
														url: "../includes/crm/mostrar_fonos.php",
														data:data_fono, 
														success: function(response)
														{
															$('#mostrar_fonos').html(response);
														}
													});		
												}
											});		
										});				
									}
								});	
							});
						}
					});	
				});
			}
		});			
	});
});