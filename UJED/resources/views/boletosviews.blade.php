@extends('layouts.master-landing')
@section('content')
    <section>
        <div>
            <div class="text-center">
                <h4 class="py-5">Mis boletos</h4>
            </div>
            <div class="row img-fluid">
                <div class="col">
                    <div class="text-center mb-4">
                        <button class="btn btn-secondary btn-sm" href="" disabled>Eventos Proximos</button>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center mb-4">
                        <a class="btn btn-outline-secondary btn-sm" href="{{url('boletos-pasados')}}">Eventos Pasados</a>
                    </div>
                </div>
                @foreach($reservaciones as $reservacion)
                <div style="text-align: -weblit-center;">
                    <div class="card border-danger m-5 img-fluid text-center" style="background-color: cornsilk; inline-size: fit-content; width:95%;">
                        <div class="row g-0">
                          <div class="col-md-4 text-center align-self-center">
                            <img class="rounded" style="width: 50%;" src="{{ asset('storage/'.$reservacion->event->imagen) }}" alt="">
                          </div>
                          <div class="col-md-4 align-self-center">
                            <div class="card-body">
                              <h5 class="card-title">{{$reservacion->event->nombre}}</h5>
                              <p class="card-text">{{$reservacion->event->estate->nombre}} - {{ $reservacion->event->estate->direccion}}</p>
                              <p class="card-text"><small class="text-body-secondary">{{$reservacion->event->fecha_inicio}} - {{ $reservacion->event->fecha_fin}}</small></p>
                            </div>
                          </div>
                          <div class="col-md-4 align-self-center">
                            <div class="text-center mb-4">
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$reservacion->id}}">
                                    Información del boleto
                                </button>
                            </div>
                            <div class="text-center mb-4">
                                @if ($reservacion->asistencia == "Confirmada")
                                <p>¡Gracias por confirmar tu asistencia!</p>   
                                @else
                                <a class="btn btn-outline-dark btn-sm" href="{{url('confirmar-asistencia/'.$reservacion->event->id.'/'.$reservacion->id)}}">Confirmar Asistencia</a>
                                @endif
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$reservacion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">UJED</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      ¡Tu boleto se encuentra en tu correo electronico! 
                                      Folio: 00{{ $reservacion->id }}
                                      Correo: {{ $reservacion->user->email }}
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Ok</button>
                                    </div>
                                  </div>
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