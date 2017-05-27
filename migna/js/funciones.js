$(document).ready(function($){
$('#ingreso_orden').submit(function(event){
			event.preventDefault();
			var comentario= $('#comentario').val();
			var responsable= $('#responsable').val();
			var datos= 'comentario='+comentario+'&responsable='+responsable;

				$.ajax({
						    type: "POST",
							url: "insertar_orden.php",
							data:datos, 
							success: function(response)
							    {								
                                   bootbox.alert("Orden Creada", function(){});	
                                   $("#orden").hide();
                                   $("#ocultar").show();	
                                   $("#id_orden").html(response);     

		                        }     
		                           
                         })
           });
$('#ingreso').submit(function(event)

         {
			event.preventDefault();

			var mac = $('#mac').val();
			var serial= $('#serial').val();
			var tipo= $('#tipo').val();
			var modelo= $('#modelo').val();
			var proveedor= $('#proveedor').val();
			var ubicacion= $('#ubicacion').val();
			var factura= $('#factura').val();
			var fecha= $('#fecha').val();
			var responsable= $('#responsable').val();
			var datos= 'fecha='+fecha+'&mac='+mac+'&serial='+serial+'&tipo='+tipo+'&modelo='+modelo+'&proveedor='+proveedor+'&ubicacion='+ubicacion+'&factura='+factura+'&responsable='+responsable;

				$.ajax({
						    type: "POST",
							url: "insertar.php",
							data:datos, 
							success: function(response)
							    {								
							     $('#ingreso')[0].reset();

                                   bootbox.alert("Registro Creado Exitosamente!", function(){});		                             
		                          
		                        }     
		                           
                         })
           });
$('#buscar').submit(function(e)
    {
    e.preventDefault();
    var mac= $('#mac').val();
    var resp= $('#prueba').val();
    var datos2='mac='+mac+'&resp='+resp;
    $.ajax({
						    type: "POST",
							url: "buscar.php",
							data:datos2, 
							success: function(response)
							    {								

							     $('#buscar')[0].reset();

                                 if(response==0)
                                 {
							     $('#error').html('No se encuentra registro');
                                 } else
                                     {
						         	    $('#demo-dt-basic tr:last').after(response);
						         	    $('#oculto').show();
									    $('#mostrar').show();
				                     }
                                 
	                          
		                        }     
		                           
                         })
           
    
     });
$('#responsables').submit(function(e){
    e.preventDefault();
    var responsable= $('#responsable').val();
    var resp= $('#prueba').val();
    var bodega= $('#bodega').val();
    var datos3='responsable='+responsable+'&resp='+resp+'&bodega='+bodega;
    $.ajax({
						    type: "POST",
							url: "asignar_responsable.php",
							data:datos3, 
							success: function(response)
							    {								
                                  

                                  $('#desactivado').html('<input type="text" name="mac" id="mac" placeholder="Mac o Numero de Serie" class="form-control">');
	            
		                        }     
		                           
                         })
           
    
     })


});
					