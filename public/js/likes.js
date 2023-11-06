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