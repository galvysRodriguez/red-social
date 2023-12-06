const contenedorHistorias = document.getElementById('historias')
const perfilesHistorias = document.querySelectorAll('.perfil__historias')
const cerrarHistorias = document.querySelector('.cerrar__historias')
const caja = document.querySelector('.principal')
const subirHistoria = document.querySelector('.historia-subir')


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
        
        mainImage.src = historia.contenido;
        mainSlide.appendChild(mainImage);
        var thumbnailSlide = document.createElement('li');
        thumbnailSlide.classList.add('splide__slide');
        var thumbnailImage = document.createElement('img');
        thumbnailImage.src = historia.contenido;
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

    

    
    caja.appendChild(pantallaCompleta)
    caja.appendChild(superior)
    mostrarSplide(mainSlider, thumbnailSlider, progressBarInner)

    cerrarHistorias.addEventListener('click', function() {
        // Verificar si el nodo a eliminar es un hijo del body
        if (caja.contains(pantallaCompleta)) {
            caja.removeChild(pantallaCompleta);
        }
        if(caja.contains(superior))
            caja.removeChild(superior)
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
    var token = $('meta[name="csrf-token"]').attr('content')
    
        $.ajax({
             
            url: '/history-profile',
            type: 'POST',
            dataType: 'json',
            data: { parametro:parametro },
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-TOKEN', token)
            },
            success: function(response) {
                mostrarHistoria(response)
                // Maneja la respuesta JSON aquí
            },
            error: function(error) {
                console.error(error);
            }
        });

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
function mostrarInsertarHistorias(){
     // Crea el elemento form
     var formulario = document.createElement('form');
     formulario.classList.add('fondo');
     formulario.id = 'publicarFondo';
     formulario.action = '/upHistory';
     formulario.method = 'POST';
     formulario.enctype = 'multipart/form-data';
     formulario.style.height = '85%'
     formulario.style.width = "70%"
     var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

// Crear un nuevo elemento de entrada (input) para el token CSRF
var csrfInput = document.createElement('input');
csrfInput.type = 'hidden'; // Campo oculto
csrfInput.name = '_token'; // Nombre del campo
csrfInput.value = csrfToken; // Valor del token

// Agregar el campo oculto al formulario
formulario.appendChild(csrfInput)
    
    
     // Crea el contenido del formulario utilizando innerHTML
     formulario.innerHTML += `
        
         <div class="ventana">
             <div class="publicarContenedor1">
                 <img id="cerrar-img" src="images/Iconos/equis.png" width="24">
             </div>
             <div style="display:flex; align-items:center; justify-content:center; margin:auto;">
                 <h1>Cargar historias</h1>
             </div>
             <div style="display:flex; align-items:center; justify-content:center; margin-top:10px;">
                 <input type="file" name="archivo" id="archivo" accept="image/*" onchange="mostrarImagen()">
                 <label id="subir" for="archivo">Seleccionar Archivo</label>
             </div>
             <div class="publicarContenedor2" style="height: 40%; margin-top: 3%;">
                 <div id="contenedorImagen" class="insertarImg" style="height:100%;display:flex; flex-direction:column;">
                     <h4>Inserte la imagen</h4>
                 </div>
             </div>
             <div class="publicarContenedor2">
                 <div class="botonCont">
                     <input id="botonPublicar" class="botonPublicar" type="submit" value="Publicar">
                 </div>
             </div>
         </div>
     `;
     let pantallaCompleta = document.createElement('div')
     pantallaCompleta.classList.add('pantalla-completa')
     
     pantallaCompleta.appendChild(formulario)
     
     caja.appendChild(pantallaCompleta)
    
     
    
     
    
    
     
     
     let valor = document.getElementById('cerrar-img')
 
     valor.addEventListener('click', function() {
         // Verificar si el nodo a eliminar es un hijo del body
         if (caja.contains(pantallaCompleta)) {
             caja.removeChild(pantallaCompleta);
         }
         
     });
     // Agrega el formulario al contenedor
     
 }

 // Llama a la función para agregar el formulario dinámicamente

perfilesHistorias.forEach(function(elemento) {
    elemento.addEventListener('click', () => llamarHistorias(elemento));
});


if(subirHistoria != null)
    subirHistoria.addEventListener('click', mostrarInsertarHistorias)