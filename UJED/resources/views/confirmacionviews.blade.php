@extends('layouts.master-landing')
@section('content')
    <section>
        <div class="text-center">
            <div class="mt-5">
                <img src="{{ asset('img/Confirmacion.png') }}" class="img-fluid" alt="">
                <p>Escanea el Codigo QR para confirmar tu asistencia</p>
            </div>
            <img src="{{ asset('storage/'.$events->qr_code) }}" class="img-fluid" width="15%" height="15%" alt="">
            <p>O</p>
            <div class="text-center mb-4">
                <a class="btn btn-outline-danger btn-sm" href="{{url('confirmacion/'.$reservacion)}}">Confirmar Asistencia</a>
            </div>
            <p>¿Necesitas ayuda? Contactanos</p>
            <p>618-827-12-00 ujed@ujed.mx</p>
        </div>
    </section>
@endsection