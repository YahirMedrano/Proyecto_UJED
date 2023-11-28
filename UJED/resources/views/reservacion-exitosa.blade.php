@php
    use App\Models\Reservation;
@endphp
@extends('layouts.master-landing')
@section('content')
    <section>
        <div class="text-center">
            <div class="mt-5">
                <img src="{{ asset('img/Completado.png') }}" class="img-fluid" alt="">
            </div>
            <img src="{{ asset('img/Completado2.png') }}" class="img-fluid" alt="">
            <p>Los boletos se han enviado a:</p>
            <p>{{ $reservation->user->email }}</p>

            <p>¿Algun problema recibiendo los boletos?</p>
            <div class="text-center mb-4">
                <a class="btn btn-outline-danger btn-sm" href="{{--url('crear-reservacion/'.Auth::user()->id.'/'.$event->id.'/'.$cantidad) --}}">Enviar de nuevo</a>
            </div>
            <p>¿Necesitas ayuda? Contactanos</p>
            <p>618-827-12-00 ujed@ujed.mx</p>
        </div>
    </section>
@endsection