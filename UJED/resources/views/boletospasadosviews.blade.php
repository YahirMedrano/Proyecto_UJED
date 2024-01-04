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
                <div style="text-align: -webkit-center;">
                    <div class="card border-danger m-5 img-fluid text-center" style="background-color: cornsilk; inline-size: fit-content;">
                        <div class="row g-0">
                          <div class="col-md-6 text-center align-self-center">
                            <img class="rounded" style="width: 50%;" src="{{ asset('storage/'.$reservacion->event->imagen) }}" alt="">
                          </div>
                          <div class="col-md-6 align-self-center">
                            <div class="card-body">
                              <h5 class="card-title">{{$reservacion->event->nombre}}</h5>
                              <p class="card-text">{{$reservacion->event->estate->nombre}} - {{ $reservacion->event->estate->direccion}}</p>
                              <p class="card-text"><small class="text-body-secondary">{{$reservacion->event->fecha_inicio}} - {{ $reservacion->event->fecha_fin}}</small></p>
                            </div>
                          </div>
                      </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>    
@endsection