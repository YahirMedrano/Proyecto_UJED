<!-- resources/views/attendance/confirm.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Confirmar Asistencia</h1>

    <p>Escanea el código QR para confirmar tu asistencia al evento:</p>
    
    <img src="{{ asset('storage/'.$event->qr_code) }}" alt="Código QR para confirmar asistencia">
    
    <p>O haz clic en el enlace: <a href="{{ url('/confirmar-asistencia/'.$event->id) }}">Confirmar Asistencia</a></p>
@endsection