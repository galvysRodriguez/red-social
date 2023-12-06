const nombreCuenta = document.getElementById('publicacion__nombre-cuenta')
const nombreUsuario = document.getElementById('publicacion__nombre-usuario')
const verMeGusta = document.getElementById('publicacion__megusta')
const fechaPublicacion = document.getElementById('publicacion__fecha')
const texto = document.querySelector('.texto__publicacion')
const idPublicacion = document.getElementById('id_publicacion_hidden')
const idPublicacion2 = document.getElementById('id_publicacion_hidden2')
const meGustaForm = document.getElementById('like-form')
const guardadosForm = document.getElementById('save-form')
const atras = document.querySelector('.atras')
const siguiente = document.querySelector('.siguiente')
const imagenAnterior = document.getElementById('tarjeta__anterior')
const imagenActual = document.getElementById('tarjeta__seleccionada')
const imagenPosterior = document.getElementById('tarjeta__siguiente')
const publicacionesElemento = document.querySelector('.publicacion')
const meGusta = document.getElementById('me-gusta')
const guardados = document.getElementById('guardados')
const meGustaRelleno = document.getElementById('me-gusta-relleno')
const guardadosRelleno = document.getElementById('guardados-relleno')
const animacionMeGusta = document.getElementById('megusta__encima')
const cambiarDireccion = document.querySelectorAll('.acceder-usuario')
const fotoPerfilPublicacion = document.getElementById('perfil__publicacion__defecto')
const perfilPublicacion = document.getElementById('perfil__publicacion__principal')
const perfilPublicacionDefecto = document.getElementById('perfil__publicacion__defecto')
const publicaciones = JSON.parse(publicacionesElemento.dataset.publicaciones)



function pintarMeGusta(){
    if(idPublicacion != null){
        meGustaRelleno.style.display = 'inline'
        meGusta.style.display = 'none'
        submitLikes()
    }
    else
        mensajeAlertaIniciado("me gusta")
   
}

function despintarMeGusta(){
    meGustaRelleno.style.display = 'none'
    meGusta.style.display = 'inline'
    submitLikes()
}

function pintarGuardados(){
    if(idPublicacion2 != null){
        guardadosRelleno.style.display = 'inline'
        guardados.style.display = 'none'
        submitFormSaves()
    }
    else
        mensajeAlertaIniciado("guardado")
    
}

function despintarGuardados(){
    guardados.style.display = 'inline'
    guardadosRelleno.style.display = 'none'
    submitFormSaves()
}
if(meGusta != null)
    meGusta.addEventListener('click', pintarMeGusta)
if(meGustaRelleno != null)
    meGustaRelleno.addEventListener('click', despintarMeGusta)
if(guardadosRelleno != null)
    guardadosRelleno.addEventListener('click', despintarGuardados)
if(guardados != null)
    guardados.addEventListener('click', pintarGuardados)



function asignarNumMeGusta(cantidad){
    return `${cantidad} me gusta${cantidad > 1 ? 'n' : ''}`
}
function calcularDuracionRelativa(fecha) {
    const fechaDada = new Date(fecha)
    const fechaActual = new Date()
    const diferencia = fechaActual - fechaDada
    const segundos = Math.floor(diferencia / 1000)
    const minutos = Math.floor(segundos / 60) 
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

function submitLikes() {
    token = $('meta[name="csrf-token"]').attr('content')
    
        $.ajax({     
            url: '/like',
            type: 'POST',
            dataType: 'json',
            data: { valor: imagenesCarrusel.getActual().id },
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-TOKEN', token)
            },
            success: function(response) {
                console.log(response)
                // Maneja la respuesta JSON aquí
            },
            error: function(error) {
                console.error(error);
            }
        });
    
}



function pedirMeGusta(valor) {
    var token = $('meta[name="csrf-token"]').attr('content')
    
        $.ajax({     
            url: '/ShowLikesAndSaves',
            type: 'POST',
            dataType: 'json',
            data: { valor: valor },
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-TOKEN', token)
            },
            success: function(response) {
                console.log(response)
                let valor = response.usuarioPublicacion[0]
                $('#publicacion__nombre-cuenta').text(valor.nombre_cuenta)
                $('#publicacion__nombre-usuario').text(valor.nombre_usuario)
                $('#publicacion__fecha').text(calcularDuracionRelativa(valor.fecha))
                $('#publicacion__megusta').text(asignarNumMeGusta(valor.cant_megusta))
                $('.texto__publicacion').text(valor.descripcion)
                
                
                let nuevaURL = "/profile/" + valor.id_usuarios
                    cambiarDireccion.forEach(elemento => {
                        elemento.setAttribute('href', nuevaURL)
                    });
                    if(valor.foto_perfil != null){
                        fotoPerfilPublicacion.src = valor.foto_perfil
                    }
                    else{
            
                        fotoPerfilPublicacion.src = "images/ImgLogin/LoginPerfil.png"
                    }
                if(response.megusta > 0){
                    meGustaRelleno.style.display = 'inline'
                    meGusta.style.display = 'none'
                }
                   
                else{
                    meGustaRelleno.style.display = 'none'
                    meGusta.style.display = 'inline'
                }
                if(response.guardado > 0){
                    guardadosRelleno.style.display = 'inline'
                    guardados.style.display = 'none'
                }
                  
                else{
                    guardados.style.display = 'inline'
                    guardadosRelleno.style.display = 'none'
                }
                    
                // Maneja la respuesta JSON aquí
            },
            error: function(error) {
                console.error(error);
            }
        });
    }