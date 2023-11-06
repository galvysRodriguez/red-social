const seguir = document.querySelector('.seguir')

function cambiarBoton(){
    if(seguir.textContent == "Siguiendo"){
        seguir.textContent = 'Seguir'
        seguir.style.backgroundColor = '#1877F2'
        seguir.style.color = '#DFE5F2'
    }
    else{
        seguir.textContent = 'Siguiendo'
        seguir.style.backgroundColor = '#4C596C'
        seguir.style.color = '#C6D1D8'
    }
}

seguir.addEventListener('click', cambiarBoton)
