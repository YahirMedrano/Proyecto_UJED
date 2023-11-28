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

    <!-- Nav Item - Roles -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('eventos') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Eventos</span>
        </a>
    </li>

    <!-- Nav Item - Permisos -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('inmuebles') }}">
            <i class="fas fa-fw fa-location-arrow"></i>
            <span>Inmuebles</span>
        </a>
    </li>

    <!-- Nav Item - Grupos -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('secciones') }}">
            <i class="fas fa-fw fa-couch"></i>
            <span>Secciones</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Más configuraciones</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->