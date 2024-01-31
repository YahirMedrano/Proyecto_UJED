@extends('layouts.master-dashboard')
@section('content')
    <div class="container">
        <div>
            @include('layouts.alert')
            <div class="card">
                <form action="{{ url('crear-admin') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h1 class="h5 text-start mt-2 text-primary"> Agregar administrador</h1>
                    </div>
                    <div class="container my-3">
                        <p>Ingresa el id del usuario a nombrar administrador:</p>
                        <label for="id" class="form-label mt-2">Id</label>
                        <div>
                            <input id="id" type="text" class="form-control" name="id" value="{{ old('id') }}" autocomplete="id" autofocus required>
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