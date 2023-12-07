$(document).ready(function(){
     $('.addtocart').on('click', function(event) {
        event.preventDefault();

        var $link = $(this);

        if ($link.hasClass('disabled')) {
            return false;
        }

        $link.addClass('disabled');

        var cantidad = parseInt(prompt("Ingresa la cantidad deseada", 1));
       // var empaque = parseInt($link.attr("empaque")); // Obtener el empaque del producto
        var empaque = parseInt($('#empaque' + $link.attr('id')).text());

        if (isNaN(cantidad) || cantidad <= 0 || cantidad % empaque !== 0) {
            alert("La cantidad ingresada no es válida. Debe ser igual al empaque del producto o un múltiplo de él.");
            $link.removeClass('disabled');
            return false;
        } else {
            // Obtener la existencia real del artículo
            var existenciaReal = parseInt($('#exist_real_' + $link.attr('id')).text());

            if (cantidad > existenciaReal) {
                alert("La cantidad ingresada supera la existencia real del artículo");
                $link.removeClass('disabled'); 
                return false;
            }
        }
            // Realiza la solicitud AJAX
            $.ajax({
                type: "POST",
                url: basePath + "pedidos/add",
                data: {
                    id: $link.attr("id"),
                    porcentaje: 0,
                    cantidad: cantidad,
                    precio_org: $link.attr("precio_org"),
                },
                dataType: "html",
                success: function(data) {
                    $('#msg').html('<div class="alert alert-success flash-msg">Articulo agregado al pedido.</div>');
                    $('.flash-msg').delay(1000).fadeOut('slow');
                },
                error: function(){
                    alert('Tenemos problemas!!!'); 
                },
                complete: function() {
                    $link.removeClass('disabled'); // Habilita nuevamente el enlace después de completar la solicitud
                }
            });
            
            alert("Articulo Agregado al pedido, si ya culminó haga clic en 'siguiente'");
            return false;
        
    });
});
