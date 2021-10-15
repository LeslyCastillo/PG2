@extends('plantilla')

@section('contenido')
    <h1>Ordenes de Trabajo</h1>
    <a class="btn btn-primary" href="{{route('orden_trabajo.created')}}">Nueva Orden de Trabajo</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Fecha de Recepcion</th>

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
