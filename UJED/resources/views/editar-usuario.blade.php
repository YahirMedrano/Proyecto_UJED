@extends('layouts.master-dashboard')
@section('content')
    <div class="container">
        <div>
            @include('layouts.alert')
            <div class="card">
                <form action="{{ url('actualizar-usuario/'.$user->id) }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h1 class="h5 text-start mt-2 text-primary"> Editar usuario</h1>
                    </div>
                    <div class="container my-3">
                        <div class="row">
                            <div class="col">
                                <label for="name" class="form-label mt-2">Nombre(s)</label>
                                <div>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" autocomplete="name" autofocus required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="apellido_paterno" class="form-label mt-2">Apellido Paterno</label>
                                <div>
                                    <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" value="{{ $user->apellido_paterno }}" autocomplete="apellido_paterno" autofocus required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="apellido_materno" class="form-label mt-2">Apellido Materno</label>
                                <div>
                                    <input id="apellido_materno" type="text" class="form-control" name="apellido_materno" value="{{ $user->apellido_materno }}" autocomplete="apellido_materno" autofocus>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col">
                            <label for="email" class="form-label mt-2">Email</label> 
                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div class="col">
                            <label for="phone" class="form-label mt-2">Telefono</label> 
                            <div>
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{ $user->phone }}" autocomplete="phone" autofocus>
                            </div>
                        </div>
                    </div>
                        <label for="type" class="form-label mt-2">Tipo</label> 
                            <div>
                                <select id="type" name="type" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                    <option selected value="{{ $user->type }}">{{$user->type}}</option>
                                        <option value="Usuario">Usuario</option>
                                        <option value="Administrador">Administrador</option>
                                </select>
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