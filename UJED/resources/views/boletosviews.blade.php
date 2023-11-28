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
                        <div class="col">
                            <div class="text-center mb-4">
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$reservacion->id}}">
                                    Más información
                                </button>
                            </div>
                            <div class="text-center mb-4">
                                <a class="btn btn-outline-dark btn-sm" href="{{url('confirmar-asistencia/'.$reservacion->event->id)}}">Confirmar Asistencia</a>
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
                                      ¡Tus boletos se encuentan en tu correo electronico! 
                                      Con folio 00{{ $reservacion->id }}
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