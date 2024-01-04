@php
    use App\Models\Estate;
@endphp
@extends('layouts.master-dashboard')
@section('content')
    <div class="container">
        <div>
            @include('layouts.alert')
            <div class="card">
                <form action="{{ url('crear-evento') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h1 class="h5 text-start mt-2 text-primary"> Agregar evento</h1>
                    </div>
                    <div class="container my-3">
                        <label for="nombre" class="form-label">Nombre</label> 
                        <div>
                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" autocomplete="nombre" autofocus required>
                        </div>
                        <label for="descripcion" class="form-label mt-2">Descripción</label>
                        <div>
                            <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" autocomplete="descripcion" autofocus required>
                        </div>
                        <div class="input-group mt-3">
                            <label for="imagen" class="input-group-text">Imagen</label>
                            <input class="form-control" id="imagen" type="file" name="imagen" value="" accept="image/*" required>
                        </div>
                        <div class="input-group mt-3">
                            <label for="precio" class="input-group-text">Precio $</label>
                            <input id="precio" type="text" class="form-control" name="precio" value="{{ old('precio') }}" autocomplete="precio" autofocus required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="fecha_inicio" class="form-label mt-2">Fecha de inicio</label>
                                <div>
                                    <input id="fecha_inicio" type="date" class="form-control" name="fecha_inicio" value="{{ old('fecha_inicio') }}" autocomplete="fecha_inicio" autofocus required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="fecha_fin" class="form-label mt-2">Fecha de fin</label>
                                <div>
                                    <input id="fecha_fin" type="date" class="form-control" name="fecha_fin" value="{{ old('fecha_fin') }}" autocomplete="fecha_fin" autofocus required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="duracion" class="form-label mt-2">Duración</label>
                                <div>
                                    <select id="duracion" class="form-control" name="duracion" required>
                                        <option selected>Selecciona un rango de duración</option>
                                        <option value="Menos de 1 hora">Menos de 1 hora</option>
                                        <option value="1 a 2 horas">1 a 2 horas</option>
                                        <option value="2 a 3 horas">2 a 3 horas</option>
                                        <option value="Mas de 3 horas">Más de 3 horas</option>
                                    </select>                        
                                </div>
                            </div>
                            <div class="col">
                                <label for="estate_id" class="form-label mt-2">Inmueble</label> 
                                <div>
                                    <select id="estate_id" name="estate_id" class="form-control" required>
                                        <option selected>Selecciona un inmueble</option>
                                        @foreach ($estates = Estate::get() as $estate)
                                            <option value="{{$estate->id}}">{{ $estate->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                            </div>
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