<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('/img/sidebar-1.jpg') }}">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('Radio Bienvenida') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
          <i><span class="material-icons">
            manage_accounts
            </span></i>
          <p>{{ __('Administración') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> 
                  <span class="material-icons">
                  person
                  </span> 
                </span>
                <span class="sidebar-normal">{{ __('Mi cuenta') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'listadoUsuarios' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('usuarios.listado')}}">
                <span class="sidebar-mini"> 
                  <span class="material-icons">
                    groups
                  </span>  
                </span>
                <span class="sidebar-normal"> {{ __('Listado de Usuarios') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'usuarios' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('trabajador.registro')}}">
                <span class="sidebar-mini"> 
                  <span class="material-icons">
                    person_add
                  </span>  
                </span>
                <span class="sidebar-normal"> {{ __('Crear Trabajador Radial') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Cotizaciones') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">library_books</i>
            <p>{{ __('Auspicios ') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Ofertas') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Tarifario Electoral') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">notifications</i>
          <p>{{ __('Programas') }}</p>
        </a>
      </li>  
    </ul>
  </div>
</div>
