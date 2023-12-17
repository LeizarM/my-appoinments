<!-- Navigation -->
<h6 class="navbar-heading text-muted">Gestionar Datos</h6>
<ul class="navbar-nav">

    @if (auth()->user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="/home">
                <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/specialties">
                <i class="ni ni-planet text-blue"></i> Especialidades
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/doctors">
                <i class="ni ni-pin-3 text-orange"></i> Medicos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/patients">
                <i class="ni ni-single-02 text-yellow"></i> Pacientes
        </li>
        {{-- <li class="nav-item">
      <a class="nav-link" href="./examples/tables.html">
        <i class="ni ni-bullet-list-67 text-red"></i> Tables
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./examples/login.html">
        <i class="ni ni-circle-08 text-pink"></i> Register
      </a>
    </li> --}}
    @elseif (auth()->user()->role == 'doctor')
        <li class="nav-item">
            <a class="nav-link" href="/home">
                <i class="ni ni-tv-2 text-primary"></i> My Schedule
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/specialties">
                <i class="ni ni-planet text-blue"></i> My Dates
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/specialties">
                <i class="ni ni-planet text-blue"></i> My Patients
            </a>
        </li>
    @else
    <li class="nav-item">
        <a class="nav-link" href="/specialties">
            <i class="ni ni-planet text-blue"></i> Reserve Dates
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/specialties">
            <i class="ni ni-planet text-blue"></i>  My Dates
        </a>
    </li>
    @endif


    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="ni ni-key-25 text-info">
            </i>
            Sign Out
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
            @csrf
        </form>
    </li>
</ul>

@if (auth()->user()->role == 'admin')
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Reportes</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="ni ni-spaceship"></i> Frecuencia Citas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="ni ni-palette"></i> Medicos mas Activos
            </a>
        </li>

    </ul>
@endif
