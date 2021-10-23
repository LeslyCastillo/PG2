@extends('plantilla')

@section('contenido')
    <h1>Vehiculos</h1>
{{--    <a class="btn btn-primary"  style=background-color:forestgreen href="{{route('vehiculos.created')}}">--}}
{{--        <i class="fas fa-plus-circle"></i>--}}
{{--         Crear vehiculo</a>--}}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Placa</th>
            <th scope="col">Modelo</th>
            <th scope="col">color</th>
            <th scope="col">Línea</th>
            <th scope="col">Marca</th>
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
                <td>{{$vehiculo->linea}}</td>
                <td>{{$vehiculo->marca}}</td>
                <td>{{$vehiculo->descripcion}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
