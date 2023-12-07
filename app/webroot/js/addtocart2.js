$(document).ready(function(){
    $('.addtocart2').on('click', function(event) {
        $.ajax({
            type: "POST",
            url: basePath + "ordens/addcliente",
            data: {
                id: $(this).attr("id")
   
            },
            dataType: "html",
            success: function(data) {
                $('#msg').html('<div class="alert alert-success flash-msg">Cliente agregado al pedido.</div>');
                $('.flash-msg').delay(1000).fadeOut('slow');
            },
            error: function(){
                alert('Tenemos problemas!!!');  
            }
        });
        return false;
    });
});