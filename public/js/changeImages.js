
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
        return this.lista[(this.cantidad + 1) % this.lista.length].contenido
    }
    getAnterior(){
        return this.lista[(this.cantidad - 1 + this.lista.length) % this.lista.length].contenido
    }
  }
  
  // Ejemplo de uso
const imagenesCarrusel = new listaImagenes()



for(let i = 0; i<publicaciones.length; i++){
    imagenesCarrusel.addItem(publicaciones[i])
}





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
    imagenActual.src = imagenesCarrusel.getActual().contenido
    imagenPosterior.src = imagenesCarrusel.getSiguiente()
    console.log(imagenesCarrusel.getActual().id)
    pedirMeGusta(imagenesCarrusel.getActual().id)
    if(idPublicacion != null){
        idPublicacion.setAttribute('value', imagenesCarrusel.getActual().id)
        idPublicacion2.setAttribute('value', imagenesCarrusel.getActual().id)
    
       
    }
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


function animarMeGusta(){
   animacionMeGusta.classList.remove("mostrar__megusta")
   void animacionMeGusta.offsetWidth;
   animacionMeGusta.classList.add("mostrar__megusta")
   pintarMeGusta()
}


atras.addEventListener('click', imagenAtras)
siguiente.addEventListener('click', imagenSiguiente)
imagenAnterior.addEventListener('click', imagenAtras)
imagenPosterior.addEventListener('click', imagenSiguiente)

imagenActual.addEventListener('dblclick', animarMeGusta)


    
let  lastTouchEnd = 0
imagenActual.addEventListener('touchend', function (event) {
    let now = (new Date()).getTime()
    if (now - lastTouchEnd <= 300) {
            // Llamar a tu función específica aquí
        animarMeGusta()
    }
        lastTouchEnd = now;
})

asignacionImagenes()