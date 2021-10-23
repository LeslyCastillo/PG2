@extends('plantilla')

@section('contenido')
    <h1>Servicios</h1>
    <a class="btn btn-primary" href="{{route('servicios.created')}}">
        <i class="fas fa-plus-circle"></i>
         Crear Servicios</a>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
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
