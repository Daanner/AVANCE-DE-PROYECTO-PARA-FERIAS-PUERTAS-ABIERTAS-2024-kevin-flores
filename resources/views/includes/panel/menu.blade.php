  <!-- Heading -->
  <h6 class="navbar-heading text-muted">Gestión</h6>
<ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active kanit-ExtraLight" href="http://localhost/sistema_citas/public/home">
              <i class="ni ni-tv-2 text-danger"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link kanit-ExtraLight" href="{{route('citas.index')}}">
              <i class="ni ni-books text-default " ></i> Citas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  kanit-ExtraLight" href="{{route('categorias-servicios.index')}}">
              <i class="ni ni-briefcase-24 text-blue"></i> Especialidades
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  kanit-ExtraLight" href="{{route('servicios.index')}}">
              <i class="ni ni-briefcase-24 text-whiteblue"></i> Servicios
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="./examples/maps.html">
              <i class="fas fa-stethoscope text-yellow"></i> Medicos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link kanit-ExtraLight" href="{{route('pacientes.index')}}">
              <i class="fas fa-bed text-warning"></i> Pacientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link kanit-ExtraLight" href="{{route('historiales.index')}}">
              <i class="fas fa-bed text-yellow"></i> Historiales
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link kanit-ExtraLight" href="{{route('tratamientos.index')}}">
              <i class="fas fa-bed text-green"></i> Tratamientos
            </a>
          </li>
         
          </li>
          <li class="nav-item">
            <a class="nav-link kanit-ExtraLight" href="./examples/login.html">
              <i class="ni ni-key-25 text-info"></i> Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link kanit-ExtraLight " href="{{ route('logout')}}" 
                 onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                <i class="fas fa-sign-in-alt"></i> Cerrar Sesión
            </a>
            <form action="{{ route('logout')}}" method="POST" style="display: none;" id="formLogout">
                @csrf
            </form>
        </li>

          
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted kanit-ExtraLight">Reportes</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          
          <li class="nav-item">
            <a class="nav-link kanit-ExtraLight" href="">
              <i class="ni ni-chart-bar-32 text-warning "></i> Desempeño medico
            </a>
          </li>
       