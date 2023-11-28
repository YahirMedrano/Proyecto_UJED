@extends('layouts.master-landing')
@section('content')
<section>
    <div>
        <div>
            <div class="text-center py-5">
                <img src="{{ asset('storage/'.$events->imagen) }}" style="width: 40%;" class="img-fluid" alt="">
            </div>
            <div class="row img-fluid text-center">
                <div class="col-sm-6">
                    <div class="">
                        <p>{{ $events->nombre }}</p>
                    </div>
                    <div class="">
                        <p>{{ $events->estate->nombre }}</p>
                        <p>{{ $events->estate->direccion }}</p>
                    </div>
                    <div class="">
                        <p>Fecha de inicio: {{ $events->fecha_inicio }}</p>
                        <p>Fecha de fin: {{ $events->fecha_fin }}</p>
                    </div>
                </div>
                    <div class="col-sm-6">
                        <form action="{{ url('reservacion/'.$events->id) }}" method="post">
                        @csrf
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Precio de boletos:</h5>
                              <h4 class="card-text">${{ $events->precio }}</h4>
                              <div class="input-group my-3">
                                <span class="input-group-text" for="cantidad">Cantidad</span>
                                <input id="cantidad" type="text" name="cantidad" class="form-control" value="{{ old('cantidad') }}" aria-label="cantidad" aria-describedby="cantidad" required>
                              </div>
                              <button type="submit" class="btn btn-outline-danger mt-3">
                                <i class="fas fa-fw fa-buy"></i>
                                Comprar boleto(s)
                                </button>                            
                            </div>
                        </div>
                        </form>
                    </div>
            </div>
        </div>
        <div class="row img-fluid">
            <h3>información del evento</h3>
            <div class="col-sm-4">
                <p>Duracion</p>
                <p>{{ $events->duracion }}</p>
            </div>
            <div class="col-sm-4">
                <p>Audiencia</p>
                <p>Recomendado para todo el público</p>
            </div>
            <div class="col-sm-4">
                <p>Medidas de seguridad</p>
                <p>Es obligatorio el uso de mascarilla si no se puede mantener la distancia de seguridad</p>
            </div>
        </div>
        <div class="row img-fluid">
            <p>Descripcion</p>
            <p>{{ $events->descripcion }}</p>
        </div>
    </div>
</section>
@endsection