//const seguidoresForm = document.getElementById('follow-form')
/*document.addEventListener('DOMContentLoaded', function () {
    // Tu código aquí
    function submitFormFollow(elemento) {
        let seguidoresForm = elemento.querySelector('.follow-form');
        console.log(seguidoresForm)
        if(seguidoresForm){
            var formData = new FormData(seguidoresForm)
            var xhr = new XMLHttpRequest()
            xhr.open('POST', '/follow', true)
            xhr.onload = function () {
            if (xhr.status == 200) {
                // Realiza las operaciones necesarias con la respuesta, si la hay
            }
            };
            xhr.send(formData);
        }
        else{
            mensajeAlertaIniciado("seguir")
        }
        
    }
    
    const seguir = document.querySelectorAll('.seguir')
    
    
        
    
    function cambiarBoton(elemento) {
        submitFormFollow(elemento)
    
        if (elemento.textContent == "Siguiendo") {
            elemento.textContent = 'Seguir'
            elemento.style.backgroundColor = '#1877F2'
            elemento.style.color = '#DFE5F2'
        } else {
            elemento.textContent = 'Siguiendo'
            elemento.style.backgroundColor = '#4C596C'
            elemento.style.color = '#C6D1D8'
        }
    }
    
    seguir.forEach(elemento => {
        elemento.addEventListener('click', cambiarBoton(elemento))
    
        if(elemento.getAttribute('data-seguido') == 0){
            elemento.textContent = 'Seguir'
            elemento.style.backgroundColor = '#1877F2'
            elemento.style.color = '#DFE5F2'
        }
        
        else{
            elemento.textContent = 'Siguiendo'
            elemento.style.backgroundColor = '#4C596C'
            elemento.style.color = '#C6D1D8'
        }
    })
});*/


const seguir = document.querySelectorAll('.seguir');

const seguidoresForm = document.getElementById('follow-form')
const seguidor= document.getElementById('seguir')
if(seguidor != null){
    if (seguidor.getAttribute('data-seguido') == 0) {
        seguidor.textContent = 'Seguir';
        seguidor.style.backgroundColor = '#1877F2';
        seguidor.style.color = '#DFE5F2';
    } else {
        seguidor.textContent = 'Siguiendo';
        seguidor.style.backgroundColor = '#4C596C';
        seguidor.style.color = '#C6D1D8';
    }

    seguidor.addEventListener('click', cambiarBoton)
}
    

function cambiarBoton(evento) {
    const boton = evento.currentTarget;
    const formulario1 = boton.closest('.seguir');
    console.log(formulario1)
    const formulario = formulario1.querySelector('.follow-form');
    console.log(formulario)
    console.log(seguidoresForm)
    // Aquí puedes realizar cualquier operación adicional que necesites con el formulario

    if(seguidoresForm != null){
        submitFormFollow();

    if (boton.textContent == "Siguiendo") {
        boton.textContent = 'Seguir';
        boton.style.backgroundColor = '#1877F2';
        boton.style.color = '#DFE5F2';
    } else {
        boton.textContent = 'Siguiendo';
        boton.style.backgroundColor = '#4C596C';
        boton.style.color = '#C6D1D8';
    }
    }
    else{
        mensajeAlertaIniciado('seguir')
    }
    
    
}


seguir.forEach(elemento => {
    elemento.addEventListener('click', cambiarBoton);

    if (elemento.getAttribute('data-seguido') == 0) {
        elemento.textContent = 'Seguir';
        elemento.style.backgroundColor = '#1877F2';
        elemento.style.color = '#DFE5F2';
    } else {
        elemento.textContent = 'Siguiendo';
        elemento.style.backgroundColor = '#4C596C';
        elemento.style.color = '#C6D1D8';
    }
});



function submitFormFollow() {
    var formData = new FormData(seguidoresForm);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/follow', true);
    xhr.onload = function () {
        if (xhr.status == 200) {
            // Realiza las operaciones necesarias con la respuesta, si la hay
        }
    };
    xhr.send(formData);
}

//const seguidoresForm = document.getElementById('follow-form')
/*
function submitFormFollow(elemento) {
    const seguidoresForm = elemento.querySelector('.follow-form');
    console.log(seguidoresForm)
    if(seguidoresForm){
        var formData = new FormData(seguidoresForm)
        var xhr = new XMLHttpRequest()
        xhr.open('POST', '/follow', true)
        xhr.onload = function () {
        if (xhr.status == 200) {
            // Realiza las operaciones necesarias con la respuesta, si la hay
        }
        };
        xhr.send(formData);
    }
    else{
        mensajeAlertaIniciado("seguir")
    }
    
}

const seguir = document.querySelectorAll('.seguir')


    

function cambiarBoton(evento) {
    
    const elemento = evento.currentTarget
    submitFormFollow(elemento)

    if (elemento.textContent == "Siguiendo") {
        elemento.textContent = 'Seguir'
        elemento.style.backgroundColor = '#1877F2'
        elemento.style.color = '#DFE5F2'
    } else {
        elemento.textContent = 'Siguiendo'
        elemento.style.backgroundColor = '#4C596C'
        elemento.style.color = '#C6D1D8'
    }
}

seguir.forEach(elemento => {
    elemento.addEventListener('click', cambiarBoton)

    if(elemento.getAttribute('data-seguido') == 0){
        elemento.textContent = 'Seguir'
        elemento.style.backgroundColor = '#1877F2'
        elemento.style.color = '#DFE5F2'
    }
    
    else{
        elemento.textContent = 'Siguiendo'
        elemento.style.backgroundColor = '#4C596C'
        elemento.style.color = '#C6D1D8'
    }
})
*/

/*
function submitFormFollow(elemento) {
    const seguidoresForm = document.getElementById('follow-form');
    if(seguidoresForm != null){
        var formData = new FormData(seguidoresForm)
        var xhr = new XMLHttpRequest()
        xhr.open('POST', '/follow', true)
        xhr.onload = function () {
        if (xhr.status == 200) {
            // Realiza las operaciones necesarias con la respuesta, si la hay
        }
        };
        xhr.send(formData);
    }
    
    
}

const seguir = document.querySelectorAll('.seguir')


    

function cambiarBoton(evento) {
    
    const elemento = evento.currentTarget
    submitFormFollow(elemento)

    if (elemento.textContent == "Siguiendo") {
        elemento.textContent = 'Seguir'
        elemento.style.backgroundColor = '#1877F2'
        elemento.style.color = '#DFE5F2'
    } else {
        elemento.textContent = 'Siguiendo'
        elemento.style.backgroundColor = '#4C596C'
        elemento.style.color = '#C6D1D8'
    }
}

seguir.forEach(elemento => {
    elemento.addEventListener('click', cambiarBoton)

    if(elemento.getAttribute('data-seguido') == 0){
        elemento.textContent = 'Seguir'
        elemento.style.backgroundColor = '#1877F2'
        elemento.style.color = '#DFE5F2'
    }
    
    else{
        elemento.textContent = 'Siguiendo'
        elemento.style.backgroundColor = '#4C596C'
        elemento.style.color = '#C6D1D8'
    }
})*/