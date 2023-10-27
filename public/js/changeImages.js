const atras = document.querySelector('.atras')
const siguiente = document.querySelector('.siguiente')
const imagenAnterior = document.getElementById('tarjeta__anterior')
const imagenActual = document.getElementById('tarjeta__seleccionada')
const imagenPosterior = document.getElementById('tarjeta__siguiente')
const publicacionesElemento = document.querySelector('.publicacion')
const texto = document.querySelector('.texto__publicacion')

const publicaciones = JSON.parse(publicacionesElemento.dataset.publicaciones)

class listaImagenes{
    constructor() {
      this.lista = []
      this.cantidad = 0
    }
  
    addItem(item) {
      this.lista.push(item)
    }
  
    siguiente() {
      this.cantidad = (this.cantidad + 1) % this.lista.length
      return this.lista[this.cantidad]
    }
  
    anterior() {
      this.cantidad = (this.cantidad - 1 + this.lista.length) % this.lista.length
      return this.lista[this.cantidad]
    }
  
    getActual() {
      return this.lista[this.cantidad]
    }
    getSiguiente(){
        return this.lista[(this.cantidad + 1) % this.lista.length].archivo
    }
    getAnterior(){
        return this.lista[(this.cantidad - 1 + this.lista.length) % this.lista.length].archivo
    }
  }
  
  // Ejemplo de uso
const imagenesCarrusel = new listaImagenes()



for(let i = 0; i<publicaciones.length; i++){
    imagenesCarrusel.addItem(publicaciones[i])
}

imagenAnterior.src = publicaciones[publicaciones.length-1].archivo
imagenActual.src = publicaciones[0].archivo
texto.textContent = publicaciones[0].texto
imagenPosterior.src = publicaciones[1].archivo


function mover(){
  imagenAnterior.classList.remove("mover")
  imagenActual.classList.remove("mover")
  imagenPosterior.classList.remove("mover")
  void imagenAnterior.offsetWidth;
  imagenAnterior.classList.add("mover")
  imagenActual.classList.add("mover")
  imagenPosterior.classList.add("mover")
}
function asignacionImagenes(){
    imagenAnterior.src = imagenesCarrusel.getAnterior()
    imagenActual.src = imagenesCarrusel.getActual().archivo
    imagenPosterior.src = imagenesCarrusel.getSiguiente()
    texto.textContent = imagenesCarrusel.getActual().texto

}

function imagenSiguiente(){
    imagenesCarrusel.siguiente()
    mover()
    asignacionImagenes()
    
}

function imagenAtras(){
    mover()
    imagenesCarrusel.anterior()
    asignacionImagenes()
    
}

atras.addEventListener('click', imagenAtras)
siguiente.addEventListener('click', imagenSiguiente)
imagenAnterior.addEventListener('click', imagenAtras)
imagenPosterior.addEventListener('click', imagenSiguiente)