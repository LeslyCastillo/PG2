@extends('plantilla')

@section('contenido')
    <h1>Marcas</h1>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Marca</th>

        </tr>
        </thead>
        <tbody>
        @foreach($marcas as $marca)
            <tr>
                <th scope="row">{{$marca->id}}</th>
                <td>{{$marca->marca}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
