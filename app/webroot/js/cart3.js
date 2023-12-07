$(document).ready(function(){
   $('.numeric').on('keyup change', function(event){
        var cantidad = Math.round($(this).val());
       
        ajaxupdate($(this).attr("data-id"), cantidad);
      
    });

    
    function ajaxupdate(id, cantidad,) {
        $.ajax({
            type: "POST",
            url: basePath + "ordenitems/itemupdate",
            data: {
                id: id,
                cantidad: cantidad
               
            },
            dataType: "json",
            success: function (data) {
                if($('#subtotal_' + data.mostrar_pedido.id).html() != data.mostrar_pedido.subtotal)
                {
                    $('#subtotal_' + data.mostrar_pedido.id).html(data.mostrar_pedido.subtotal).animate({backgroundColor : "#ff8"}, 100).animate({backgroundColor: "#fff"}, 500);
                }
                
                $('#total').html('$' + data.mostrar_pedido.total).animate({backgroundColor : "#ff8"}, 100).animate({backgroundColor: "#fff"}, 500);
            }

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
                $('#msg').html('<div class="alert alert-success flash-msg">Articulo Eliminado del Pedido</div>');
                $('.flash-msg').delay(3000).fadeOut('slow');
                
                $('#total').html('$' + data.mostrar_total_remove);
                
                if(data.pedidos == "")
                {
                    window.location.replace(basePath + "pedidos/view");
                }
            },
            error: function(){
                alert("Tenemos problemas!!");
            }
        });
    }
    
});