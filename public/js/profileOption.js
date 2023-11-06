const desplieguePerfil = document.querySelector('.icono-barra')
const mostrarOpciones = document.getElementById('mostrar')
const ocultarOpciones = document.getElementById('ocultar')
const opcionesPerfil = document.querySelector('.contenido__perfil')

function Opciones(){
    if(opcionesPerfil.style.display == 'none'){
       opcionesPerfil.style.display = 'flex'
       mostrarOpciones.style.display = 'none'
       ocultarOpciones.style.display = 'block'
       
    }
    else{
       opcionesPerfil.style.display = 'none'
       mostrarOpciones.style.display = 'block'
       ocultarOpciones.style.display = 'none'
    }
 }

if(desplieguePerfil != null)
    desplieguePerfil.addEventListener('click', Opciones)