<aside class="secundario contenedor">     
            <div class="usuarios__interes">
            
                <h4>Usuarios de interes</h4>
                @foreach($usuarios2 as $usuario)
                <a href="{{ route('profile-user', ['idEncriptado' => $usuario->id_usuarios]) }}">
                <div class="perfil__interes contenedor">
                        @if(optional($usuario)->foto_perfil)
                        <img src="{{$usuario->foto_perfil}}" alt="" class="perfil__imagen__interes" title="obama" data-parametro="{{$usuario->id_usuarios}}">
                        @else
                        <img src="{{ asset('images/ImgLogin/LoginPerfil.png') }}" class="perfil__imagen__interes" data-parametro="{{$usuario->id_usuarios}}">
                        
                        @endif
                    
                    <a href="{{ route('profile-user', ['idEncriptado' => $usuario->id_usuarios]) }}" class="tendencia__enlace">{{$usuario->nombre_cuenta}}</a>
                </div>
                
                </a>
                @endforeach
                
        
                <a href="{{ asset('/follow') }}" class="ver-mas">Ver más</a>
            </div>
            <footer class="pie">
                <p class="texto-pie">Copyright 2023 Waining red social N.Rodriguez, M.Villarroel, G.Rodriguez</p>
            </footer>
        </aside>