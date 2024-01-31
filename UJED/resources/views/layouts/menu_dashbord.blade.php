<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link disabled" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Panel de administracion</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Opciones
    </div>

    <!-- Nav Item - Eventos -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('eventos') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Eventos</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('usuarios') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuarios</span>
        </a>
    </li>

    <!-- Nav Item - Inmuebles -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('inmuebles') }}">
            <i class="fas fa-fw fa-location-arrow"></i>
            <span>Inmuebles</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('agregar-admin') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Agregar administrador</span>
        </a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->