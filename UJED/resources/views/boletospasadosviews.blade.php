@extends('layouts.master-landing')
@section('content')
    <section>
        <div>
            <div class="text-center">
                <h5 class="py-5">Mis boletos</h5>
            </div>
            <div class="row img-fluid">
                <div class="col">
                    <div class="text-center mb-4">
                        <a class="btn btn-outline-secondary btn-sm" href="{{url('boletos-proximos')}}">Eventos Proximos</a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center mb-4">
                        <button class="btn btn-secondary btn-sm" href="" disabled>Eventos Pasados</button>
                    </div>
                </div>
                @foreach($reservaciones as $reservacion)
                <div>
                    <div class="row">
                        <div class="col">
                            <img style="width: 20%;" src="{{ asset('storage/'.$reservacion->event->imagen) }}" alt="">
                        </div>
                        <div class="col">
                            <p>{{$reservacion->event->nombre}}</p>
                            <p>{{$reservacion->event->estate->nombre}} - {{ $reservacion->event->estate->direccion}}</p>
                            <p>{{$reservacion->event->fecha_inicio}} - {{ $reservacion->event->fecha_fin}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>    
@endsection