function submitFormSaves() {
    var formData = new FormData(guardadosForm)
    var xhr = new XMLHttpRequest()
    xhr.open('POST', '/save', true)
    xhr.onload = function () {
        if (xhr.status == 200) {
            // Realiza las operaciones necesarias con la respuesta, si la hay
        }
    };
    xhr.send(formData);
}