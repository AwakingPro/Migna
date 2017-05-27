$(document).ready(function() 
{

	$(document).on('click',function(){
		alert('ok');
		var boton = "<button class='enviar2'>asd</button>";
		$('#cuerpo').html(boton);

	});
	$('.enviar2').on('click',function(){
		alert('ok');
		var boton2 = "<button class='enviar3'>asd</button>";
		$('#cuerpo').append(boton2);
		
	});
	$('.enviar3').on('click',function(){
		alert('ok');
	
	});
	
});	