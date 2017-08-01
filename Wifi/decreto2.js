$(document).ready(function() {
    $(".Decreto").click(function() {
        $('body').addClass("loading");
        var Decreto = $(this).attr("id");
        var data = 'decreto='+Decreto;
        
        $.ajax({
            type: "POST",
            url: "decreto2.php",
            data:data,
            dataType: 'html',
            success: function(response){
                $('#data').html(response);
                $('body').removeClass("loading");
            }
        });
     });
});