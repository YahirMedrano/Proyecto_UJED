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
            <p class="fw-bold">{{ $reservation->user->email }}</p>
            <p>¿Necesitas ayuda? Contactanos</p>
            <p class="fw-bold">618-827-12-00 ujed@ujed.mx</p>
        </div>
    </section>
@endsection