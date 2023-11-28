@extends('layouts.master-dashboard')
@section('content')
    <div class="container">
        <div>
            @include('layouts.alert')
            <div class="card">
                <form action="{{ url('crear-inmueble') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h1 class="h5 text-start mt-2 text-primary"> Agregar Inmueble</h1>
                    </div>
                    <div class="container my-3">
                        <label for="nombre" class="form-label">Nombre</label> 
                        <div>
                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" autocomplete="nombre" autofocus required>
                        </div>
                        <label for="direccion" class="form-label">Dirección</label> 
                        <div>
                            <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" autocomplete="direccion" autofocus required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">
                            <i class="fas fa-fw fa-paper-plane"></i>
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection