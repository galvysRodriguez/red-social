function submitForm() {
    var formData = new FormData(meGustaForm)
    var xhr = new XMLHttpRequest()
    xhr.open('POST', '/like', true)
    xhr.onload = function () {
        if (xhr.status == 200) {
            // Realiza las operaciones necesarias con la respuesta, si la hay
        }
    };
    xhr.send(formData);
}

function pedirMeGusta(valor) {
    var xhr = new XMLHttpRequest();
    xhr.open('post', '/showLikesAndSaves', true);

    // Configura el tipo de contenido para el envío de datos
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

    xhr.onload = function () {
        if (xhr.status === 200) {
            // Realiza las operaciones necesarias con la respuesta, si la hay
            var respuesta = JSON.parse(xhr.responseText)

            if(respuesta.megusta == 1){
                meGustaRelleno.style.display = 'inline'
                meGusta.style.display = 'none'
            }
            else{
                meGustaRelleno.style.display = 'none'
                meGusta.style.display = 'inline'
            }

            if(respuesta.guardado == 1){
                guardadosRelleno.style.display = 'inline'
                guardados.style.display = 'none'
            }
            else{
                guardados.style.display = 'inline'
                guardadosRelleno.style.display = 'none'
            }
        }
    }

    var datos = {
        publicacion: valor
    }

    // Convierte el objeto a formato JSON
    var datosJSON = JSON.stringify(datos);

    // Envía los datos al servidor
    xhr.send(datosJSON);
}
