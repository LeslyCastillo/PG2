@extends('plantilla')

@section('contenido')
    <h1>Clientes</h1>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nit</th>
            <th scope="col">Telefono</th>
            <th scope="col">Dirección</th>
            <th scope="col">Correo</th>

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
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
