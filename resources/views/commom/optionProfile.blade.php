<div id="contenido-movil" class="contenido__perfil">
                @if(Auth::check())
                    <form method="POST" action="/cerrar" class="opciones__perfil contenedor">
                        @csrf
                        <div class="contenedor enlace__perfil">
                            <a href="/editProfile">Editar perfil</a>
                        </div>   
                        <div class="contenedor enlace__perfil">
                            <a href="/save">Guardados</a>
                        </div>
                        <div class="contenedor enlace__perfil">
                            <a href="/upPublication">Publicar</a>
                        </div> 
                        <div class="contenedor enlace__perfil">
                            <a href="#">Convertirse a premium</a>
                        </div>   
                        <div class="contenedor enlace__perfil">
                            <a href="#">Configuraciones</a>
                        </div>   
                        <div class="contenedor enlace__perfil">
                            <a href="#" onclick="this.closest('form').submit()">Cerrar Sesion</a>
                        </div>    
                    </form>
                @endif
            </div>