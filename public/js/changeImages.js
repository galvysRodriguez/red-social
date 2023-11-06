const atras = document.querySelector('.atras')
const siguiente = document.querySelector('.siguiente')
const imagenAnterior = document.getElementById('tarjeta__anterior')
const imagenActual = document.getElementById('tarjeta__seleccionada')
const imagenPosterior = document.getElementById('tarjeta__siguiente')
const publicacionesElemento = document.querySelector('.publicacion')
const texto = document.querySelector('.texto__publicacion')
const fechaPublicacion = document.getElementById('publicacion__fecha')
const nombreCuenta = document.getElementById('publicacion__nombre-cuenta')
const nombreUsuario = document.getElementById('publicacion__nombre-usuario')
const verComentario = document.getElementById('publicacion__comentario')
const verMeGusta = document.getElementById('publicacion__megusta')
const meGusta = document.getElementById('me-gusta')
const guardados = document.getElementById('guardados')
const meGustaRelleno = document.getElementById('me-gusta-relleno')
const guardadosRelleno = document.getElementById('guardados-relleno')
const animacionMeGusta = document.getElementById('megusta__encima')
const cambiarDireccion = document.querySelectorAll('.acceder-usuario')
const idPublicacion = document.getElementById('id_publicacion_hidden')
const idPublicacion2 = document.getElementById('id_publicacion_hidden2')
const meGustaForm = document.getElementById('like-form')
const guardadosForm = document.getElementById('save-form')

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

function calcularDuracionRelativa(fecha) {
    const fechaDada = new Date(fecha)
    const fechaActual = new Date()
    const diferencia = fechaActual - fechaDada
    const segundos = Math.floor(diferencia / 1000)
    const minutos = Math.floor(segundos / 60) -60
    const horas = Math.floor(minutos / 60) 
    const dias = Math.floor(horas / 24)
    const meses = Math.floor(dias / 30)
    const anios = Math.floor(meses / 12)

    if (anios > 0) {
        return `hace ${anios} año${anios > 1 ? 's' : ''}`
    } else if (meses > 0) {
        return `hace ${meses} mes${meses > 1 ? 'es' : ''}`
    } else if (dias > 0) {
        return `hace ${dias} día${dias > 1 ? 's' : ''}`
    } else if (horas > 0) {
        return `hace ${horas} hora${horas > 1 ? 's' : ''}`
    } else if (minutos > 0) {
        return `hace ${minutos} minuto${minutos > 1 ? 's' : ''}`
    } else {
        return 'hace un momento';
    }
}

function asignarComentario(cantidad){
    if(cantidad == 0){
        return 'No hay comentarios'
    }
    else {
        return `Ver ${cantidad} comentario${cantidad > 1 ? 's' : ''}`
    }
}

function asignarNumMeGusta(cantidad){
    return `${cantidad} me gusta${cantidad > 1 ? 'n' : ''}`
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
    imagenActual.src = imagenesCarrusel.getActual().archivo
    imagenPosterior.src = imagenesCarrusel.getSiguiente()
    texto.textContent = imagenesCarrusel.getActual().texto
    fechaPublicacion.textContent = calcularDuracionRelativa(imagenesCarrusel.getActual().fecha)
    nombreCuenta.textContent = imagenesCarrusel.getActual().nombre_cuenta
    nombreUsuario.textContent = '@' +imagenesCarrusel.getActual().nombre_usuario
    verComentario.textContent = asignarComentario(imagenesCarrusel.getActual().numComentarios)
    verMeGusta.textContent = asignarNumMeGusta(imagenesCarrusel.getActual().numGustos)
    idPublicacion.setAttribute('value', imagenesCarrusel.getActual().id_publicaciones)
    idPublicacion2.setAttribute('value', imagenesCarrusel.getActual().id_publicaciones)
    let nuevaURL = "/profile/" + imagenesCarrusel.getActual().id_usuarios
    cambiarDireccion.forEach(elemento => {
        elemento.setAttribute('href', nuevaURL)
    });

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

function pintarMeGusta(){
    meGustaRelleno.style.display = 'inline'
    meGusta.style.display = 'none'
    submitForm()
}

function despintarMeGusta(){
    meGustaRelleno.style.display = 'none'
    meGusta.style.display = 'inline'
    submitForm()
}

function pintarGuardados(){
    guardadosRelleno.style.display = 'inline'
    guardados.style.display = 'none'
    submitFormSaves()
}

function despintarGuardados(){
    guardados.style.display = 'inline'
    guardadosRelleno.style.display = 'none'
    submitFormSaves()
}

atras.addEventListener('click', imagenAtras)
siguiente.addEventListener('click', imagenSiguiente)
imagenAnterior.addEventListener('click', imagenAtras)
imagenPosterior.addEventListener('click', imagenSiguiente)

imagenActual.addEventListener('dblclick', animarMeGusta)

if(meGusta != null)
    meGusta.addEventListener('click', pintarMeGusta)
if(meGustaRelleno != null)
    meGustaRelleno.addEventListener('click', despintarMeGusta)
if(guardadosRelleno != null)
    guardadosRelleno.addEventListener('click', despintarGuardados)
if(guardados != null)
    guardados.addEventListener('click', pintarGuardados)

    
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