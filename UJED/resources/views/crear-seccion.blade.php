@php
    use App\Models\Estate;
@endphp
@extends('layouts.master-dashboard')
@section('content')
    <div class="container">
        <div>
            @include('layouts.alert')
            <div class="card">
                <form action="{{ url('crear-seccion') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h1 class="h5 text-start mt-2 text-primary"> Agregar Seccion</h1>
                    </div>
                    <div class="container my-3">
                        <label for="nombre" class="form-label mt-2">Nombre</label>
                        <div>
                            <select id="nombre" class="form-control" name="nombre" required>
                                <option selected>Selecciona un nombre</option>
                                <option value="General">General</option>
                                <option value="Preferencial">Preferencial</option>
                                <option value="Administrativos">Administrativos</option>
                            </select>                        
                        </div>
                        <label for="disponibilidad" class="form-label">Disponibilidad</label> 
                        <div>
                            <input id="disponibilidad" type="text" class="form-control" name="disponibilidad" value="{{ old('disponibilidad') }}" autocomplete="disponibilidad" autofocus>
                        </div>
                        <label for="estate_id" class="form-label mt-2">Inmueble</label> 
                                <div>
                                    <select id="estate_id" name="estate_id" class="form-control" required>
                                        <option selected>Selecciona un inmueble</option>
                                        @foreach ($estates = Estate::get() as $estate)
                                            <option value="{{$estate->id}}">{{ $estate->nombre }}</option>
                                        @endforeach
                                    </select>
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