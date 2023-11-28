@extends('layouts.master-dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Inmuebles</h6>
            </div>
            <div class="card-body">
                <a class="btn btn-success mb-3" href="{{ url('agregar-inmueble') }}">
                    <i class="fas fa-fw fa-plus"></i>
                    Agregar
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Disponibilidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estates as $estate)
                        <tr>
                            <td>{{ $estate->id }}</td>
                            <td>{{ $estate->nombre }}</td>
                            <td>{{ $estate->direccion }}</td>
                            <td>{{ $estate->disponibilidad }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ url('editar-inmueble/'.$estate->id) }}">
                                    <i class="fas fa-fw fa-edit"></i>
                                    Editar
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ url('eliminar-inmueble/'.$estate->id) }}">
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