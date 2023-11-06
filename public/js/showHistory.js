function mostrarHistoria(rutaImagen, nombreUsuario) {
    let pantallaCompleta = document.createElement('div');
    pantallaCompleta.classList.add('pantalla-completa');

    let imagen = document.createElement('img');
    imagen.src = rutaImagen;
    imagen.classList.add('imagen-en-pantalla');

    pantallaCompleta.appendChild(imagen);
    document.body.appendChild(pantallaCompleta);

    pantallaCompleta.onmousedown = function () {
        document.body.removeChild(pantallaCompleta)
    }

}

const historias = JSON.parse(publicacionesElemento.dataset.publicaciones)
  // Ejemplo de uso
const imagenesHistorias = new listaImagenes()



for(let i = 0; i<historias.length; i++){
    imagenesHistorias.addItem(historias[i])
}

document.addEventListener('DOMContentLoaded', function() {
    const historiasPerfiles = document.querySelectorAll('.splide__slide > img')
    console.log(historiasPerfiles) // Asegúrate de que esto imprima una lista de elementos img
    //historiasPerfiles.addEventListener('click', mostrarHistoria(imagenesHistorias.getActual.archivo, 'hola'))
    historiasPerfiles.forEach(function(elemento) {
        elemento.addEventListener('click', function() {
            mostrarHistoria(elemento.src, 'hola'); // Asegúrate de reemplazar 'hola' con el nombre de usuario apropiado
        });
    });
    // Resto de tu código aquí
});






