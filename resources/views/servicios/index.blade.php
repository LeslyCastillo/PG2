@extends('plantilla')

@section('contenido')
    <h1 class="text-center">SERVICIOS </h1>
    <div class="d-flex justify-content-end">
    <a class="btn btn-success" href="{{route('servicios.created')}}">
        <i class="fas fa-plus-circle"></i>
         Crear Servicios</a>
    </div>
    <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Descripción del Servicio</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>

            </tr>
            </thead>
            <tbody>
            @foreach($servicios as $servicio)
            <tr>
                <th scope="row">{{$servicio->id}}</th>
                <td>{{$servicio->servicio}}</td>
                <td>{{$servicio->precio}}</td>
                <td> <form action="{{route('delete', $servicio->id)}}" method="post">
                        @csrf @method('DELETE')
                        <button title="ELIMINAR REGISTRO" type="submit" onclick="return confirm('¿Seguro de borrar datos?');" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <a title="EDITAR DATOS" class="btn btn-primary btn-sm" href="{{route("servicios.edit", $servicio->id)}}"><i class="fas fa-edit"></i>
                        </a>
                    </form>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

@endsection
