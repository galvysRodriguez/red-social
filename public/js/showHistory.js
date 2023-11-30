const contenedorHistorias = document.getElementById('historias')
const perfilesHistorias = document.querySelectorAll('.perfil__historias')
const cerrarHistorias = document.querySelector('.cerrar__historias')


function mostrarHistoria(datos) {
    console.log(datos)
    /*let pantallaCompleta = document.createElement('div')
    pantallaCompleta.classList.add('pantalla-completa')

    let imagen = document.createElement('img')
    imagen.src = rutaImagen
    imagen.classList.add('imagen-en-pantalla')

    pantallaCompleta.appendChild(imagen);
    contenedorHistorias.appendChild(pantallaCompleta)

    pantallaCompleta.onmousedown = function () {
        contenedorHistorias.removeChild(pantallaCompleta)
    }*/

    var contenedorPrincipal = document.createElement('div');
    contenedorPrincipal.classList.add('publicacion__encabezado', 'contenedor');

    // Parte izquierda del encabezado
    var izquierda = document.createElement('div');
    izquierda.classList.add('publicacion__encabezado__izquierda', 'contenedor');

    // Enlace al perfil del usuario
    var enlaceUsuario = document.createElement('a');
    enlaceUsuario.classList.add('acceder-usuario');
    enlaceUsuario.href = "{{ route('profile-user', ['idEncriptado' => 2]) }}";

    // Imagen del perfil
    var imagenPerfil = document.createElement('img');
    //imagenPerfil.src = "{{ asset('images/inicio/modern-architecture-building-in-the-evening.png') }}";
    imagenPerfil.alt = '';
    imagenPerfil.classList.add('perfil__imagen', 'publicacion__perfil');

    // Div para el nombre de la cuenta
    var divNombreCuenta = document.createElement('div');
    divNombreCuenta.classList.add('encabezado__cuenta');

    // Enlace para el nombre de la cuenta
    var enlaceNombreCuenta = document.createElement('a');
    enlaceNombreCuenta.classList.add('acceder-usuario');
    enlaceNombreCuenta.href = "{{ route('profile-user', ['idEncriptado' => 2]) }}";

    // Párrafo para el nombre de la cuenta
    var parrafoNombreCuenta = document.createElement('p');
    parrafoNombreCuenta.id = 'publicacion__nombre-cuenta';
    parrafoNombreCuenta.classList.add('nombre__cuenta');
    //parrafoNombreCuenta.textContent = datos.nombre_cuenta;

    // Párrafo para el nombre de usuario
    var parrafoNombreUsuario = document.createElement('p');
    parrafoNombreUsuario.id = 'publicacion__nombre-usuario';
    parrafoNombreUsuario.classList.add('etiqueta__opaco');
    //parrafoNombreUsuario.textContent = datos.nombre_usuario;

    // Agregar elementos al DOM
    enlaceUsuario.appendChild(imagenPerfil);
    enlaceNombreCuenta.appendChild(parrafoNombreCuenta);
    divNombreCuenta.appendChild(enlaceNombreCuenta);
    divNombreCuenta.appendChild(parrafoNombreUsuario);
    izquierda.appendChild(enlaceUsuario);
    izquierda.appendChild(divNombreCuenta);

    // Parte derecha del encabezado
    var derecha = document.createElement('div');
    derecha.classList.add('publicacion__encabezado__derecha');

    // Párrafo para la fecha
    var parrafoFecha = document.createElement('p');
    parrafoFecha.id = 'publicacion__fecha';
    parrafoFecha.classList.add('etiqueta__opaco');
    // Aquí deberías establecer la fecha según tus datos

    // Agregar elementos al DOM
    derecha.appendChild(parrafoFecha);

    // Agregar partes del encabezado al contenedor principal
    contenedorPrincipal.appendChild(izquierda);
    contenedorPrincipal.appendChild(derecha);

    const mainSlider = document.createElement('div')
    mainSlider.classList.add('splide')
    mainSlider.id = 'main-slider'

    const mainTrack = document.createElement('div')
    mainTrack.classList.add('splide__track')
    const mainList = document.createElement('ul')
    mainList.classList.add('splide__list')

    

    const thumbnailSlider = document.createElement('div');
    thumbnailSlider.classList.add('splide');
    thumbnailSlider.id = 'thumbnail-slider';

    const thumbnailTrack = document.createElement('div');
    thumbnailTrack.classList.add('splide__track');

    const thumbnailList = document.createElement('ul');
    thumbnailList.classList.add('splide__list');

    var progressBar = document.createElement('div');
    progressBar.classList.add('my-slider-progress');
    var progressBarInner = document.createElement('div');
    progressBarInner.classList.add('my-slider-progress-bar');
    progressBar.appendChild(progressBarInner);

  
    
    datos.historias.forEach(function(historia) {
        var mainSlide = document.createElement('li');
        mainSlide.classList.add('splide__slide');

    
        var mainImage = document.createElement('img');
        
        mainImage.src = historia.archivo;
        mainSlide.appendChild(mainImage);
        var thumbnailSlide = document.createElement('li');
        thumbnailSlide.classList.add('splide__slide');
        var thumbnailImage = document.createElement('img');
        thumbnailImage.src = historia.archivo;
        thumbnailSlide.appendChild(thumbnailImage);

       
        mainList.appendChild(mainSlide);
        thumbnailList.appendChild(thumbnailSlide);
    });
  
    let superior = document.createElement('div')
    superior.classList.add('superior__cerrar')
    superior.appendChild(cerrarHistorias)

    let pantallaCompleta = document.createElement('div')
    mainTrack.appendChild(mainList);
    mainSlider.appendChild(mainTrack);
      
    thumbnailTrack.appendChild(thumbnailList);
    thumbnailSlider.appendChild(thumbnailTrack);

    cerrarHistorias.style.display = "block"
    mainSlider.appendChild(progressBar)
    pantallaCompleta.appendChild(mainSlider)
    pantallaCompleta.appendChild(thumbnailSlider)
    pantallaCompleta.classList.add('pantalla-completa')

    

    
    document.body.appendChild(pantallaCompleta)
    document.body.appendChild(superior)
    mostrarSplide(mainSlider, thumbnailSlider, progressBarInner)

    cerrarHistorias.addEventListener('click', function() {
        // Verificar si el nodo a eliminar es un hijo del body
        if (document.body.contains(pantallaCompleta)) {
            document.body.removeChild(pantallaCompleta);
        }
        if(document.body.contains(superior))
            document.body.removeChild(superior)
    });
    

}

const historias = JSON.parse(contenedorHistorias.dataset.historias)
  // Ejemplo de uso
const imagenesHistorias = new listaImagenes()



for(let i = 0; i<historias.length; i++){
    imagenesHistorias.addItem(historias[i])
}

function llamarHistorias(elemento){
    
    var parametro = elemento.dataset.parametro
    console.log(parametro)
    // Obtener el token CSRF desde el meta tag en tu documento HTML
    var token = document.head.querySelector('meta[name="csrf-token"]').content;
    var xhr = new XMLHttpRequest()
    xhr.open('POST', '/history-profile', true)
    // Configurar el encabezado con el token CSRF
    xhr.setRequestHeader('X-CSRF-TOKEN', token);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status == 200) {
            // Realiza las operaciones necesarias con la respuesta, si la hay
            var respuestaJSON = xhr.responseText;

            respuesta = JSON.parse(respuestaJSON);

            // Recorrer los datos utilizando un bucle forEach
            mostrarHistoria(respuesta)

        }
    };
    xhr.send('parametro=' + encodeURIComponent(parametro));
}

/*
document.addEventListener('DOMContentLoaded', function() {
    const historiasPerfiles = document.querySelectorAll('.splide__slide > img')
    console.log(historiasPerfiles) // Asegúrate de que esto imprima una lista de elementos img
    perfilesHistorias.forEach(function(elemento) {
        elemento.addEventListener('click', llamarHistorias(elemento));
    });
    // Resto de tu código aquí
});*/


perfilesHistorias.forEach(function(elemento) {
    elemento.addEventListener('click', () => llamarHistorias(elemento));
});





