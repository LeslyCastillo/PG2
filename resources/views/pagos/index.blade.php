@extends('plantilla')

@section('contenido')
    <h1>Pagos</h1>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha</th>
            <th scope="col">Total</th>
            <th scope="col">Orden de Trabajo</th>
            <th scope="col">Tipo de Pago</th>

        </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pago)
            <tr>
                <th scope="row">{{$pago->id}}</th>
                <td>{{$pago->fecha}}</td>
                <td>{{$pago->total}}</td>
                <td>{{$pago->orden_trabajo_id}}</td>
                <td>{{$pago->tipos_de_pagos_id}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
