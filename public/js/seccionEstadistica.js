/*const sidebar = document.querySelector('menu_arriba')

const enlaceMenu = document.createElement('a')
const contenedorItem = document.createElement('div')
const imagenEnlace = document.createElement('img')

imagenEnlace.classList.add('icono')
contenedorItem.classList.add('itemMenu')

contenedorItem.appendChild(imagenEnlace)
enlaceMenu.appendChild(contenedorItem)

contenedorItem.textContent('Estadisticas')

sidebar.appendChild(enlaceMenu)*/

// Obtener el elemento del sidebar
const sidebar = document.querySelector('.menu_arriba');

// Crear elementos HTML
const enlaceMenu = document.createElement('a');
enlaceMenu.href = '/statistics'; // Establecer el atributo href

const contenedorItem = document.createElement('div');
contenedorItem.classList.add('contenedor', 'itemMenu');

const imagenEnlace = document.createElement('img');
imagenEnlace.src = "images/iconos de index/estadisticas.png"; // Establecer el atributo src
imagenEnlace.classList.add('icono');

// Agregar contenido de texto al contenedor


// Anidar elementos

contenedorItem.appendChild(imagenEnlace);
contenedorItem.innerHTML += '&nbsp; &nbsp; Estadísticas';

enlaceMenu.appendChild(contenedorItem);

// Agregar el enlace al sidebar
sidebar.appendChild(enlaceMenu);

/*
a href="/">
                    <div class="contenedor itemMenuSeleccionado"> 
                        <img src="{{ asset('images/iconos de index/iconos rellenos/casita-relleno.png') }}" class="icono">
                        &nbsp; &nbsp; Inicio  
                    </div>
                </a> */