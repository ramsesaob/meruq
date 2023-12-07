
    
    $(document).ready(function() {
    // Escucha el evento de cambio en los campos de porcentaje
    $('select[id^="porcentaje-"]').change(function() {
        var id = $(this).data('id'); // Obtiene el ID del pedido desde el atributo data-id
        var porcentaje = $(this).val(); // Obtiene el valor seleccionado del campo de porcentaje

        // Envía los datos al servidor utilizando una solicitud AJAX
        $.ajax({
            url: basePath + 'pedidos/guardar_porcentaje', // Ruta a la acción del controlador que guarda el porcentaje
            method: 'POST',
            data: {
                id: id,
                porcentaje: porcentaje
            },
            success: function(response) {
                // Realiza alguna acción si la solicitud se completó correctamente
                console.log('Porcentaje guardado en la base de datos.');
            },
            error: function(xhr, status, error) {
                // Maneja el error si la solicitud falla
                console.error('Error al guardar el porcentaje en la base de datos:', error);
            }
        });
    });
});
