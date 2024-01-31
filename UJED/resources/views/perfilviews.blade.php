@extends('layouts.master-landing')
@section('content')
<section>
<div>
    <div class="row img-fluid text-center">
        <h1 class="col-sm-12 mt-5">Mi perfil</h1>
    </div>
    <div class="mx-5">
        <div class="row img-fluid" style="justify-content: center">
            <div class="text-end mb-4">
                <a class="btn btn-outline-primary btn-sm" href="{{url('editar-perfil/' .$user->id) }}">Editar información</a>
            </div>
            <div class="input-group mb-3 sm-12" style="inline-size: fit-content;">
                <span class="input-group-text" id="name">Nombre(s)</span>
                <input type="text" class="form-control" value="{{ $user->name }}" aria-label="name" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3 col-sm-6" style="inline-size: fit-content;">
                <span class="input-group-text" id="apellido_p">Apellido Paterno</span>
                <input type="text" class="form-control" value="{{ $user->apellido_paterno }}" aria-label="apellido_paterno" aria-describedby="apellido_paterno" disabled>
            </div>
            <div class="input-group mb-3 col-sm-6" style="inline-size: fit-content;">
                <span class="input-group-text" id="apellido_m">Apellido Materno</span>
                <input type="text" class="form-control" value="{{ $user->apellido_materno }}" aria-label="apellido_m" aria-describedby="apellido_m" disabled>
            </div>
        </div>
        <div class="row img-fluid mt-3 mb-5" style="justify-content: center">
            <div class="input-group mb-3 col-sm-6" style="inline-size: fit-content;">
                <span class="input-group-text" id="email">Correo electronico</span>
                <input type="text" class="form-control" value="{{ $user->email }}" aria-label="email" aria-describedby="email" disabled>
            </div>
            <div class="input-group mb-3 col-sm-6" style="inline-size: fit-content;"    >
                <span class="input-group-text" id="phone">Telefono</span>
                <input type="text" class="form-control" value="{{ $user->phone }}" aria-label="phone" aria-describedby="phone" disabled>
            </div>
        </div>
    </div>
</div>
</section>
@endsection