@extends('plantilla')

@section('contenido')
    <h1 class="text-center">ORDENES DE TRABAJO</h1>

    <div class="d-flex justify-content-end">
    <a class=" btn btn-success" href="{{route('orden_trabajo.created')}}">
        <i class="fas fa-plus-circle"></i>
         Nueva Orden de Trabajo</a>
    </div>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Fecha de Recepcion</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($OrdenesTrabajos as $OrdenTrabajo)
            <tr>
                <th scope="row">{{$OrdenTrabajo->id}}</th>
                <td>{{$OrdenTrabajo->cleintes_id}}</td>
                <td>{{$OrdenTrabajo->vehiculos_id}}</td>
                <td>{{$OrdenTrabajo->fecha_recepcion}}</td>
                <td>{{$OrdenTrabajo->users_id}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
