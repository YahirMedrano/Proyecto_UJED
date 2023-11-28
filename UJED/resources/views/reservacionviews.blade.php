@php
    use App\Models\Reservation;
@endphp
@extends('layouts.master-landing')
@section('content')
    <section>
        <h1>Información de reservacion</h1>
        <div class="row img-fluid">
            <div class="col">
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
            <div class="col">
                <h6>Detalles del evento</h6>
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('storage/'.$event->imagen) }}" class="img-fluid" style="width:80px;" alt="">
                    </div>
                    <div class="col">
                        <h5>{{ $event->nombre }}</h5>
                        <p>{{ $event->estate->nombre }} - {{ $event->estate->direccion }}</p>
                        <p>{{ $event->fecha_inicio }} - {{ $event->fecha_fin }}</p>
                    </div>
                </div>
                <div class="row">
                    <p>Resumen de la reservacion</p>
                    <p>Tipo de boleto: General</p>
                    <p>Cantidad: {{ $cantidad }}</p>
                    <p>Precio: {{ $cantidad }} * ${{ $event->precio }}MXN</p>
                    <p>Total: ${{ $cantidad * $event->precio }}MXN</p>
                </div>
            </div>
        </div>
        <div class="text-center mb-4">
            <a class="btn btn-outline-primary btn-sm" href="{{url('crear-reservacion/'.Auth::user()->id.'/'.$event->id.'/'.$cantidad) }}">Confirmar</a>
        </div>
    </section>
@endsection