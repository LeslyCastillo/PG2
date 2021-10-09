@extends('plantilla')

@section('contenido')
    <h1>Tipos de Vehiculos</h1>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descripcion</th>

        </tr>
        </thead>
        <tbody>
        @foreach($TiposVehiculos as $TipoVehiculo)
            <tr>
                <th scope="row">{{$TipoVehiculo->id}}</th>
                <td>{{$TipoVehiculo->descripcion}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
