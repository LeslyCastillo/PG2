@extends('plantilla')

@section('contenido')
    <h1>Lineas</h1>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Linea</th>
            <th scope="col">Marca</th>

        </tr>
        </thead>
        <tbody>
        @foreach($lineas as $linea)
            <tr>
                <th scope="row">{{$linea->id}}</th>
                <td>{{$linea->linea}}</td>
                <td>{{$linea->marcas_id}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
