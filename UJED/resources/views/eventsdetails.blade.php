@extends('layouts.master-landing')
@section('content')
<section>
    <div>
        <div class="container">
            <div class="text-center py-5">
                <img src="{{ asset('storage/'.$events->imagen) }}" style="" class="img-fluid border border-5 border-danger rounded-4" alt="">
            </div>
            <div class="row img-fluid">
                <div class="col-sm-6 text-start mb-4" style="align-self: center; padding-left:15%;">
                    <div class="mb-3">
                        <h3>{{ $events->nombre }}</h3>
                    </div>
                    <div class="fst-italic text-body-secondary font-monospace">
                        <p style="margin-bottom: 5px"><small>{{ $events->estate->nombre }} - {{ $events->estate->direccion }}</small></p>
                    </div>
                    <div class="fst-italic text-body-secondary font-monospace">
                        <p style="margin-top: 5px"><small>{{ $events->fecha_inicio }} - {{ $events->fecha_fin }}</small></p>
                    </div>
                </div>
                    <div class="col-sm-6" style="text-align: -webkit-center">
                        <div class="card" style="width: 18rem; border-right-color: #dc3545; border-right-width: 4px; border-bottom-color: #dc3545; border-bottom-width: 4px;">
                            <div class="card-body">
                              <h5 class="card-title">Precio del boleto:</h5>
                              <h4 class="card-text fw-bold">${{ $events->precio }}</h4>
                              <a href="{{ url('reservacion/'.$events->id) }}" class="btn btn-outline-danger mt-3">
                                <i class="fas fa-solid fa-cart-shopping pe-1"></i>
                                Comprar boleto
                              </a>                            
                            </div>
                        </div>
                    </div>
            </div>
        </div>
       <div class="container">
        <hr class="mt-5">
            <div class="row img-fluid mt-5">
                <h3 class="mb-4 fw-bold">información del evento</h3>
                <div class="col-sm-4">
                    <div class="row">
                        <i class="col-1 fas fa-solid fa-clock text-danger" style="padding-top: 10px;"></i>
                        <div class="col text-start">
                            <h6 class="fw-bold" style="margin-bottom: 5px">Duracion</h6>
                            <p class="fst-italic text-body-secondary font-monospace" style="margin-top: 5px"><small>{{ $events->duracion }}</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="">
                    <div class="row">
                        <i class="col-1 fas fa-solid fa-user-group text-danger" style="padding-top: 10px"></i>
                        <div class="col text-start">
                            <h6 class="fw-bold" style="margin-bottom: 5px">Audiencia</h6>
                            <p class="fst-italic text-body-secondary font-monospace" style="margin-top: 5px"><small>Recomendado para todo el público</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <i class="col-1 fas fa-solid fa-triangle-exclamation text-danger" style="padding-top: 10px"></i>
                        <div class="col text-start">
                            <h6 class="fw-bold" style="margin-bottom: 5px">Medidas de seguridad</h6>
                            <p class="fst-italic text-body-secondary font-monospace" style="margin-top: 5px"><small>Es obligatorio el uso de mascarilla si no se puede mantener la distancia de seguridad</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row img-fluid mt-1">
                <h6 class="fw-bold" style="margin-bottom: 5px">Descripcion</h6>
                <p class="fst-italic text-body-secondary font-monospace" style="margin-top: 5px"><small>{{ $events->descripcion }}</small></p>
            </div>
            <br>
            <hr class="mb-5">
        </div>
    </div>
</section>
@endsection