$(document).ready(function(){

    $('#Fecha').datepicker();
   
    $('#Guardar').click(function(){

        var Nube = $('#Nube').val();
        var Plan = $('#Plan').val();
        var Administracion = $('#Administracion').val();
        var Contrato = $('#Contrato').val();
        var Fecha = $('#Fecha').val();
        var Tipo = $('#Tipo').val();
        var Cliente = $('#Cliente').val();
        var Rut = $('#Rut').val();
        var Alias = $('#Alias').val();

        var Data = [Nube,Plan,Administracion,Contrato,Fecha,Tipo,Cliente,Rut,Alias];
        if(Contrato == ''){
            bootbox.alert({
                message: " <i class='fa fa-warning'> </i> Debe Ingresar Contrato",
                size: 'small'
            });      
        }
        else{
            if(Fecha == ''){
               bootbox.alert({
                    message: "<i class='fa fa-warning'> </i> Debe Ingresar Fecha!",
                    size: 'small'
                });
            }else{
                $.ajax({
                    type: "POST",
                    url: "../../../includes/Servicios/CrearServicio.php",
                    data: {Data:Data},
                    success: function(response)
                    {
                        if(response==1){
                            bootbox.alert({
                                message: "<i class='fa fa-warning'> </i> Cliente ya cuenta con este servicio!",
                            });
                        }
                        else{
                            bootbox.alert({
                                message: "<i class='fa fa-check'> </i> Servicio Ingresado Correctamente",
                            });
                        }
                    }
                });
            }  
        }

    });

    $('#Validar').click(function(){
        
        var Cliente= $('#Cliente').val();
        var Servicio = $('#Servicio').val();

        var Data = [Cliente,Servicio];
        
        $.ajax({
            type: "POST",
            url: "../../../includes/Servicios/ValidarServicio.php",
            data: {Data:Data},
            dataType: "json",
            success: function(response)
            {   
                var En = [];
                var obj;
                $.each(response.Enlaces,function(index, value){ 
                    Enlace = '{"value":"' + value + '","text":"'+ value +'"}';
                    obj = JSON.parse(Enlace);
                    En.push(obj); 

                });
               
                switch (response.Servicio) {
                    case "1":
                        window.location.href ='clientes_ingreso_dato_tecnico.php?cliente='+Cliente;
                        break;
                    case "2":
                        bootbox.prompt({
                            title: "Seleccione Enlace :",
                            inputType: 'select',
                            inputOptions: En,
                            callback: function (result) {
                                console.log(result);
                               
                                if(result == null){
                                    return;
                                }
                                else{
                                    window.location.href = 'clientes_ingreso_voip.php?cliente='+Cliente+'&alias='+result; 

                                }
                            }
                        });
                        break;
                    case "3":
                        bootbox.prompt({
                            title: "Seleccione Enlace :",
                            inputType: 'select',
                            inputOptions: En,
                            callback: function (result) {
                                console.log(result);
                                if(result == null){
                                    return;
                                }
                                else{
                                    window.location.href = 'clientes_ingreso_otros.php?cliente='+Cliente+'&alias='+result;

                                }
                                 
                            }
                        });
                        
                        break;
                    case "4":
                         window.location.href = 'clientes_ingreso_acronis.php?cliente='+Cliente; 
                         break;
                }
            }
        });
    });
});