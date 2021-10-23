@extends('plantilla')

@section('contenido')
    <h1>Lineas</h1>
    <a class="btn btn-primary" href="{{route('lineas.created')}}">
        <i class="fas fa-plus-circle"></i>
        Nueva Linea</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Linea</th>
            <th scope="col">Marca</th>

        </tr>
        </thead>
        <tbody>
        @foreach($lineas as $linea)
            <tr>
                <th scope="row">{{$linea->id}}</th>
                <td>{{$linea->linea}}</td>
                <td>{{$linea->marca}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
