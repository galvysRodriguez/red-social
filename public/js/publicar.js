function publicar(){

    const publicarModal = document.getElementById('publicarFondo')

    if(publicarModal.style.display === "none"){

        publicarModal.style.display = "flex"

    }else{

        publicarModal.style.display = "none"

    }
}

function mostrarImagen() {
    const input = document.getElementById('archivo');
    const imagenContainer = document.getElementById('contenedorImagen');

    // Limpiar el contenedor antes de mostrar una nueva imagen
    imagenContainer.innerHTML = '';

    const files = input.files;

    if (files.length > 0) {
        const imagen = document.createElement('img');
        imagen.src = URL.createObjectURL(files[0]);
        imagen.style.width = "50%";
        imagen.style.height = imagenContainer.style.height;
        imagen.alt = 'Imagen cargada';
        imagenContainer.appendChild(imagen);
    }
    else{
        const texto = document.createElement('h4');
        texto.textContent = "Inserte la imagen";
        imagenContainer.appendChild(texto);
    }
}


function mostrarImagenPerfil() {
    const input = document.getElementById('archivo');
    const imagenContainer = document.getElementById('imagen-perfil');

    // Limpiar el contenedor antes de mostrar una nueva imagen

    const files = input.files;

    if (files.length > 0) {
        imagenContainer.src = URL.createObjectURL(files[0]);
        imagenContainer.style.width = "64px"
        imagenContainer.style.height = "64px"
        imagenContainer.style.borderRadius = "50%"
    }
    else{
    }
}