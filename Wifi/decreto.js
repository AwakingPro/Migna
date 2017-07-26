$(document).ready(function() {
    $(".Decreto").click(function() {
        var Decreto = $(this).attr("id");
        var data = 'decreto='+Decreto;
        alert(data);
        $.ajax({
            type: "POST",
            url: "decreto.php",
            data:data,
            dataType: 'html',
            success: function(response){
                $('#data').html(response);
            }
        });
     });
});