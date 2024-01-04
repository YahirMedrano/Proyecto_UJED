@extends('layouts.master-landing')
@section('content')
<section>
    <div>
        @include('layouts.alert')
        <form action="{{ url('actualizar-perfil/'.$user->id) }}" method="post">
            @csrf
            <div class="row img-fluid text-center mt-5">
                <h1 class="col-sm-12">Mi perfil</h1>
            </div>
            <div class="row img-fluid" style="justify-content: center;">
                <div class="text-end mb-4">
                    <button class="btn btn-outline-success btn-sm" type="submit">Confirmar</button>
                </div>
                <div class="input-group mb-3 sm-12" style="inline-size: fit-content;">
                    <span class="input-group-text" for="name">Nombre</span>
                    <input id="name" type="text" name="name" class="form-control" value="{{ $user->name }}" aria-label="name" aria-describedby="name">
                </div>
                <div class="input-group mb-3 col-sm-6" style="inline-size: fit-content;">
                    <span class="input-group-text" id="apellido_paterno">Apellido Paterno</span>
                    <input id="apellido_paterno" name="apellido_paterno" type="text" class="form-control" value="{{ $user->apellido_paterno }}" aria-label="apellido_paterno" aria-describedby="apellido_paterno">
                </div>
                <div class="input-group mb-3 col-sm-6" style="inline-size: fit-content;">
                    <span class="input-group-text" id="apellido_materno">Apellido Materno</span>
                    <input id="apellido_materno" name="apellido_materno" type="text" class="form-control" value="{{ $user->apellido_materno }}" aria-label="apellido_m" aria-describedby="apellido_m">
                </div>
            </div>
            <div class="row img-fluid mt-3" style="justify-content: center;">
                <div class="input-group mb-3 col-sm-6" style="inline-size: fit-content;">
                    <span class="input-group-text" id="email">Correo electronico</span>
                    <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}" aria-label="email" aria-describedby="email">
                </div>
                <div class="input-group mb-3 col-sm-6" style="inline-size: fit-content;">
                    <span class="input-group-text" id="phone">Telefono</span>
                    <input id="phone" name="phone" type="text" class="form-control" value="{{ $user->phone }}" aria-label="phone" aria-describedby="phone">
                </div>
            </div>
        </form>
    </div>
</section>
@endsection