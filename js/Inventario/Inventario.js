$(document).ready(function(){
    MostrarTipo();
    MostrarMarca();
    MostrarModelo();
    var id;
    var idEdit;
    var Mod = $("#Mod").val();

    $('#TablaMantenedorTipo').DataTable();
    $('#FechaNuevo').datepicker();
    $('#ModeloNuevo').selectpicker();
    $('#Usado').click(function(){
        $('.Nuevo').hide();
        $('.Usado').show();

    });
    $('#Nuevo').click(function(){
        $('.Usado').hide();
        $('.Nuevo').show();
    });
    function MostrarTipo(){
       
        $.ajax({
            type: "POST",
            url: "../../../includes/Inventario/MostrarTipo.php",
            data:'',
            success: function(response){
                $("#DivTipo").html(response);
                $('#TablaInventario').DataTable();
            }
        });
    }

    function MostrarMarca(){
       
        $.ajax({
            type: "POST",
            url: "../../../includes/Inventario/MostrarMarca.php",
            data:'',
            success: function(response){
                $("#DivMarca").html(response);
                $('#TablaMarca').DataTable();
            }
        });
    }
    function MostrarModelo(){
       
        $.ajax({
            type: "POST",
            url: "../../../includes/Inventario/MostrarModelo.php",
            data:'',
            success: function(response){
                $("#DivModelo").html(response);
                $('#TablaModelo').DataTable();
            }
        });
    }

    $(document).on("click",".Delete",function(){
        id = $(this).closest('tr').attr('id');
    });

    $(document).on("click",".Edit",function(){
        idEdit = $(this).closest('tr').attr('id');
        var data = "idEdit="+idEdit+"&Mod="+Mod;
        $.ajax({
            type: "POST",
            url: "../../../includes/Inventario/Editar.php",
            data:data,
            success: function(response){
                $("#MarcaEditar").val(response);
                $("#ModeloEditar").val(response);
                $("#TipoEditar").val(response);
                MostrarTipo();
                MostrarMarca();
                MostrarModelo();
            }
        });

        
    });
    $(document).on("click",".Save",function(){
        var Tipo;
        var Marca;
        var data;
        var Modelo;
        if(Mod==1){
            Tipo = $("#TipoEditar").val();
            data = "idEdit="+idEdit+"&Mod="+Mod+"&Tipo="+Tipo;

        }
        else if(Mod==2){
            Marca = $("#MarcaEditar").val();
            data = "idEdit="+idEdit+"&Mod="+Mod+"&Marca="+Marca;

        }
        else if(Mod==3){
            Marca = $("#MarcaEditar").val();
            Modelo = $("#ModeloEditar").val();
            data = "idEdit="+idEdit+"&Mod="+Mod+"&Marca="+Marca+"&Modelo="+Modelo;

        }
        
        $.ajax({
            type: "POST",
            url: "../../../includes/Inventario/Guardar.php",
            data:data,
            success: function(response){
                MostrarTipo();
                MostrarMarca();
                MostrarModelo();
                
            }
        });

        
    });

    $(document).on("click",".Eliminar",function(){

        var data = "Id="+id+"&Mod="+Mod;
        $.ajax({
            type: "POST",
            url: "../../../includes/Inventario/Eliminar.php",
            data:data,
            success: function(response){
                MostrarTipo();
                MostrarMarca();
                MostrarModelo();
            }
        });
    });

    $(document).on("click",".Ingresar",function(){
        var data;
        var Tipo;
        var Marca;
        var Modelo;
        if(Mod==1){
            Tipo = $("#Tipo").val();
            var data = "Tipo="+Tipo+"&Mod="+Mod;
        }
        else if(Mod==2){
            Tipo = $("#Tipo").val();
            Marca = $("#Marca").val();
            var data = "Tipo="+Tipo+"&Marca="+Marca+"&Mod="+Mod;
        }
        else if(Mod==3){
            Tipo = $("#Tipo").val();
            Marca = $("#Marca").val();
            Modelo = $("#Modelo").val();
            var data = "Tipo="+Tipo+"&Marca="+Marca+"&Mod="+Mod+"&Modelo="+Modelo;
        }
        alert(data);
            $.ajax({
                type: "POST",
                url: "../../../includes/Inventario/Ingresar.php",
                data:data,
                success: function(response){
                    MostrarTipo();
                    MostrarMarca();
                    MostrarModelo();
                    $("#Tipo").val("");
                    $("#Marca").val("");
                    $("#Modelo").val("");
                }
            });
        });
});