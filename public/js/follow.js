const ingresado = document.querySelector('.oculto')
const seguir = document.querySelectorAll('.seguir');
const numSeguidores = document.getElementById('num-seguidores')
const seguidoresForm = document.getElementById('follow-form')
const seguidor= document.getElementById('seguir')

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


function cambiarBoton(evento) {
    const boton = evento.currentTarget;
    if(ingresado != null){
        submitFormFollow(boton)
        if (boton.textContent == "Siguiendo") {
            boton.textContent = 'Seguir';
            boton.style.backgroundColor = '#1877F2';
            boton.style.color = '#DFE5F2';
            if(seguidor != null){
                numSeguidores.textContent -= 1
            }
            
    
        } else {
            boton.textContent = 'Siguiendo';
            boton.style.backgroundColor = '#4C596C';
            boton.style.color = '#C6D1D8';
            if(seguidor != null){
                numSeguidores.textContent =  parseInt(numSeguidores.textContent) + 1
            }
            
        }
        
    }
   

    else{
        mensajeAlertaIniciado("seguir")
    }
    
}


seguir.forEach(elemento => {
    elemento.addEventListener('click', cambiarBoton);

    if (elemento.getAttribute('data-seguido') == 1) {
        elemento.textContent = 'Siguiendo';
        elemento.style.backgroundColor = '#4C596C';
        elemento.style.color = '#C6D1D8';
    } else {
        elemento.textContent = 'Seguir';
        elemento.style.backgroundColor = '#1877F2';
        elemento.style.color = '#DFE5F2';
     
    }
});



function submitFormFollow(elemento) {
    
        var token = $('meta[name="csrf-token"]').attr('content')
        var valor = elemento.getAttribute('data-usuario')
            $.ajax({     
                url: '/follow',
                type: 'POST',
                dataType: 'json',
                data: { valor: valor},
                beforeSend:function(xhr){
                    xhr.setRequestHeader('X-CSRF-TOKEN', token)
                },
                success: function(response) {
                    
                    // Maneja la respuesta JSON aquí
                },
                error: function(error) {
                    console.error(error);
                }
            });
    
    
  
}

