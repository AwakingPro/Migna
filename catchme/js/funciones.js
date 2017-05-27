$(document).ready(function($) {

$( ".text" ).click(function() {
	var datos = 1;
	$.ajax({
			    type: "POST",
				url: "insertar.php",
				data:datos, 
				success: function(response){
					$('#respuesta').html(response);
					
					}})
       //bootbox.alert("Registro no encontrado!", function(){					

		
          // });
});								
});