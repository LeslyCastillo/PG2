@extends('plantilla')

@section('contenido')
    <h1>Clientes</h1>
    <a class="btn btn-primary" href="{{route('clientes.created')}}">
        <i class="fas fa-plus-circle"></i> Nuevo Cliente</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nit</th>
            <th scope="col">Telefono</th>
            <th scope="col">Dirección</th>
            <th scope="col">Correo</th>
            <th scope="col">Acciones</th>

        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <th scope="row">{{$cliente->id}}</th>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->nit}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->correo}}</td>
               <td> <form action="{{route('delete', $cliente->id)}}" method="post">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Seguro de borrar usuario?');" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
