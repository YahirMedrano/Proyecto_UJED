@php
    use App\Models\Reservation;
@endphp
@extends('layouts.master-landing')
@section('content')
    <section class="container">
        <h1>Información de reservacion</h1>
        <div class="row img-fluid">
            <div class="col-lg-6 col-sm-12 mt-5">
                <div class="alert alert-danger d-flex align-items-center text-center mb-5">
                    <i class="fas fa-solid fa-triangle-exclamation pe-3"></i>
                    <div>
                        Los tickets se enviarán de forma digital a la dirección de email de tu usuario.
                        Por favor, presta atención a continuación.
                    </div>
                  </div>
                <div class="input-group mb-3 col-sm-12">
                    <span class="input-group-text" id="name">Nombre</span>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" aria-label="name" aria-describedby="name" disabled>
                </div>
                <div class="input-group mb-3 col-sm-12">
                    <span class="input-group-text" id="apellido_paterno">Apellido Paterno</span>
                    <input type="text" class="form-control" name="apellido_paterno" value="{{ Auth::user()->apellido_paterno }}" aria-label="apellido_paterno" aria-describedby="apellido_paterno" disabled>
                </div>
                <div class="input-group mb-3 col-sm-12">
                    <span class="input-group-text" id="apellido_materno">Apellido Materno</span>
                    <input type="text" class="form-control" name="apellido_materno" value="{{ Auth::user()->apellido_materno }}" aria-label="apellido_materno" aria-describedby="apellido_materno" disabled>
                </div>
                <div class="input-group mb-3 col-sm-12">
                    <span class="input-group-text" id="email">Correo electronico</span>
                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" aria-label="email" aria-describedby="email" disabled>
                </div>
                <div class="input-group mb-3 col-sm-12">
                    <span class="input-group-text" id="phone">Telefono</span>
                    <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" aria-label="phone" aria-describedby="phone" disabled>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 border-start ps-4">
                <h6>Detalles del evento</h6>
                <div class="row">
                    <div class="col text-center" style="align-self:center;">
                        <img src="{{ asset('storage/'.$event->imagen) }}" class="img-fluid" style="width:100%;" alt="">
                    </div>
                    <div class="col">
                        <h5 class="fw-bold">{{ $event->nombre }}</h5>
                        <div class="row" style="margin-bottom: 5px;">
                            <i class="col-1 fas fa-solid fa-location-dot text-danger" style="padding-top: 10px;"></i>
                            <div class="col text-start">
                                <p style="row margin-bottom: 5px;">{{ $event->estate->nombre }} - {{ $event->estate->direccion }}</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px;">
                            <i class="col-1 fas fa-solid fa-calendar-days text-danger" style="padding-top: 10px;"></i>
                            <div class="col text-start">
                                <p style="margin-top: 5px;">{{ $event->fecha_inicio }} - {{ $event->fecha_fin }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p class="pt-3" style="border-top:dashed; border-top-color:#f8d7da;">Resumen de la reservacion</p>
                    <p>Tipo de boleto: General</p>
                    <p class="pt-3" style="border-top: dashed; border-top-color:#f8d7da;">Cantidad: {{ $cantidad }}</p>
                    <p>Precio: {{ $cantidad }} * ${{ $event->precio }}MXN</p>
                    <p class="pt-3" style="border-top:dashed; border-top-color:#f8d7da;">Total: ${{ $cantidad * $event->precio }}MXN</p>
                </div>
            </div>
        </div>
        <div class="text-center my-4">
            <a class="btn btn-outline-primary btn-sm" href="{{url('crear-reservacion/'.Auth::user()->id.'/'.$event->id.'/'.$cantidad) }}">Confirmar</a>
        </div>
    </section>
@endsection