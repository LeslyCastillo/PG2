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
            <th scope="col">Fecha de Recepción</th>
            <th scope="col">Nit</th>
            <th scope="col">Nombre del Cliente</th>
            <th scope="col">Placa</th>
            <th scope="col">Total</th>
            <th scope="col">Estado</th>
            <th scope="col" class="text-center">Vista Previa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($OrdenesTrabajos as $OrdenTrabajo)
            <tr>
                <th scope="row">{{$OrdenTrabajo->id}}</th>
                <td>{{$OrdenTrabajo->fecha_recepcion}}</td>
                <td>{{$OrdenTrabajo->clientes_id}}</td>
                <td>{{$OrdenTrabajo->vehiculos_id}}</td>
                <td>{{$OrdenTrabajo->users_id}}</td>
                <td>{{$OrdenTrabajo->users_id}}</td>
                <td>{{$OrdenTrabajo->users_id}}</td>
                <td class="text-center"> <form>
                        {{--                        @csrf @method('DELETE')--}}
                        <a href="{{route('orden_trabajo.index')}}" class="btn btn-outline-info btn-sm ">
                            <i class=" far fa-eye"> </i>
                            VER</a>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
