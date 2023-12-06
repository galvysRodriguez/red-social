
$(document).ready(function() {
    $.ajax({
        url: '/statisticsSolicity',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log(response.data)
            dataInteracciones.datasets[0].data = response.data
            // Maneja la respuesta JSON aquí
        },
        error: function(error) {
            console.error(error);
        }
    });
});