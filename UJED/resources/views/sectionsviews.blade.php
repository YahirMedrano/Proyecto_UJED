@extends('layouts.master-dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Secciones</h6>
            </div>
            <div class="card-body">
                <a class="btn btn-success mb-3" href="{{ url('agregar-seccion') }}">
                    <i class="fas fa-fw fa-plus"></i>
                    Agregar
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Disponibilidad</th>
                            <th>Inmueble</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->nombre }}</td>
                            <td>{{ $section->disponibilidad }}</td>
                            <td>{{ $section->estate->nombre }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ url('editar-seccion/'.$section->id) }}">
                                    <i class="fas fa-fw fa-edit"></i>
                                    Editar
                                </a>
                                    <a class="btn btn-danger btn-sm" href="{{ url('eliminar-seccion/'.$section->id) }}">
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