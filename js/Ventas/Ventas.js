$(document).ready(function(){
    $("#region").change(function(){

        var region = $("#region").val();
        var data = "Id="+region;

        $.ajax({
            type: "POST",
            url: "../../../includes/Ventas/Provincia.php",
            data:data,
            success: function(response){

                $('#mostrar_provincia').html(response);
            }
        });
    });
    $(document).on('change', '#provincias', function() {

        var provincia = $("#provincias").val();
        var data = "Id="+provincia;
        alert(data);

        $.ajax({
            type: "POST",
            url: "../../../includes/Ventas/Comuna.php",
            data:data,
            success: function(response){

                $('#mostrar_comuna').html(response);
                alert(response);
            }
        });
    });
});