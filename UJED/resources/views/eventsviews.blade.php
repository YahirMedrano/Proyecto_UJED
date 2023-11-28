@extends('layouts.master-dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Eventos</h6>
            </div>
            <div class="card-body">
                <a class="btn btn-success mb-3" href="{{ url('agregar-evento') }}">
                    <i class="fas fa-fw fa-plus"></i>
                    Agregar
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Fechas</th>
                            <th>Duración</th>
                            <th>Expiración</th>
                            <th>QR</th>
                            <th>Inmueble</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->nombre }}</td>
                            <td>{{ $event->descripcion }}</td>
                            <td>
                                <img style="width: 80px;" src="{{ asset('storage/' .$event->imagen) }}" alt="">
                            </td>
                            <td>{{ $event->precio }}</td>
                            <td>{{ $event->fecha_inicio }}</td>
                            <td>{{ $event->duracion }}</td> 
                            <td>{{ $event->expiracion }}</td>
                            <td>{{ $event->qr_code }}</td>
                            <td>{{ $event->estate->nombre }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ url('editar-evento/'.$event->id) }}">
                                    <i class="fas fa-fw fa-edit"></i>
                                    Editar
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ url('eliminar-evento/'.$event->id) }}">
                                    <i class="fas fa-fw fa-trash"></i>
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection