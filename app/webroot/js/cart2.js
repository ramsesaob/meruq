$(document).ready(function(){
    $('.numeric').on('keyup change', function(event){
        var porcentaje = Math.round($(this).val());
        ajaxupdate($(this).attr("data-id"), porcentaje);
        
    });
    
    function ajaxupdate(id, porcentaje ) {
        $.ajax({
            type: "POST",
            url: basePath + "pedidos/itemupdate2",
            data: {
                id: id,
                
                porcentaje: porcentaje
               
            },
            dataType: "json",
           

        });
    }
    
    $('.remove').click(function(){
        ajaxcart($(this).attr("id"), 0);
        return false;
    });
    
    function ajaxcart(id, cantidad)
    {
        if(cantidad === 0)
        {
            $('#row-' + id).fadeOut(1000, function(){$('#row-' +id).remove();});
        }
        
        $.ajax({
            type: "POST",
            url: basePath + "pedidos/remove",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data){
                $('#msg').html('<div class="alert alert-success flash-msg">Pedido Eliminado.</div>');
                $('.flash-msg').delay(2000).fadeOut('slow');
                
                $('#total').html('$' + data.mostrar_total_remove).animate({backgroundColor: "#ff8"}, 100).animate({backgroundColor: "#fff"}, 500);
                
                if(data.pedidos == "")
                {
                    window.location.replace(basePath + "articulos/index");
                }
            },
            error: function(){
                alert("Tenemos problemas!!");
            }
        });
    }
    
});