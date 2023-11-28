@extends('layouts.master-landing')
@section('content')
<section>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/escudo.jpg" class="d-block w-100" alt="...">
            {{--<div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>--}}
          </div>
          <div class="carousel-item">
            <img src="img/fuente.jpg" class="d-block w-100" alt="...">
            {{--<div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>--}}
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</section>
  <section class="section">
    <div class="container">
        <h2 class="h4 text-center m-4 text-danger">Proximos eventos</h2>
        <div class="row">
        @foreach ($events as $event)
            <div class="col-lg-3 text-center">
                <div class="card img-fluid">
                    <img src="{{ asset('storage/'.$event->imagen) }}" class="pt-1" style="width: 80%; align-self:center;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->nombre }}</h5>
                        <p class="card-text">{{ $event->descripcion }}</p>
                        <a href="detalle-eventos/{{ $event->id }}" class="btn btn-primary">Más información</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection