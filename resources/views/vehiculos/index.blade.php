@extends('plantilla')

@section('contenido')
    <h1>Vehiculos</h1>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Placa</th>
            <th scope="col">Modelo</th>
            <th scope="col">color</th>
            <th scope="col">Linea</th>
            <th scope="col">Tipo de Vehiculo</th>

        </tr>
        </thead>
        <tbody>
        @foreach($vehiculos as $vehiculo)
            <tr>
                <th scope="row">{{$vehiculo->id}}</th>
                <td>{{$vehiculo->placa}}</td>
                <td>{{$vehiculo->modelo}}</td>
                <td>{{$vehiculo->color}}</td>
                <td>{{$vehiculo->lineas_id}}</td>
                <td>{{$vehiculo->tipo_vehiculo_id}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
