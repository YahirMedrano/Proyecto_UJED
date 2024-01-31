<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark border-bottom border-danger rounded-bottom-2">
    <div class="container-fluid">
         <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.svg') }}" width="120" height="120" alt=""></a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="/">Inicio</a>
               </li>
            @if (auth()->user() === null)
                
            @else
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Perfil
            </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{url('usuario/'.Auth::user()->id) }}">Mi perfil</a></li>
                    <li><a class="dropdown-item" href="{{ url('boletos-proximos') }}">Mis boletos</a></li>
                </ul>
            </li>
            @endif

            @if (auth()->user() === null)
            <li class="nav-item">
                <a class="nav-link" href="{{url('login')}}">Login</a>
            </li>
                
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{url('home')}}">Logout</a>
            </li>
                
            @endif
           
            @if (auth()->user() === null)
                
            @else
                @if (auth()->user()->type === 'Administrador'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin')}}">Admin</a>
                    </li>
                @endif   
            @endif
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-danger" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>