const menuMovil = document.getElementById('boton-menu')
const contenidoMovil = document.getElementById('contenido-movil')

function mostrarOpcionesMovil(){
    if(contenidoMovil.style.display == 'none'){
        contenidoMovil.style.display = 'flex'
    }
    else{
        contenidoMovil.style.display = 'none'
    }
}

menuMovil.addEventListener('click', mostrarOpcionesMovil)