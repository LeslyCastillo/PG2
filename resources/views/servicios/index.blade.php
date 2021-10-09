@extends('plantilla')

@section('contenido')
    <h1>Servicios</h1>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Servicios</th>

            </tr>
            </thead>
            <tbody>
            @foreach($servicios as $servicio)
            <tr>
                <th scope="row">{{$servicio->id}}</th>
                <td>{{$servicio->servicio}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

@endsection
