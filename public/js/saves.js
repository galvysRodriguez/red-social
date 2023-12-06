

function submitFormSaves() {
    token = $('meta[name="csrf-token"]').attr('content')
    
        $.ajax({     
            url: '/save',
            type: 'POST',
            dataType: 'json',
            data: { valor: imagenesCarrusel.getActual().id },
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-TOKEN', token)
            },
            success: function(response) {
                console.log(response)
                // Maneja la respuesta JSON aquí
            },
            error: function(error) {
                console.error(error);
            }
        });
    
}
