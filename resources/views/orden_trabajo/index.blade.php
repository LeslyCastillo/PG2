@extends('plantilla')

@section('contenido')
    <h1 class="text-center">ORDENES DE TRABAJO</h1>

    <div class="d-flex justify-content-end">
    <a class=" btn btn-success" href="{{route('orden_trabajo.created')}}">
        <i class="fas fa-plus-circle"></i>
         Nueva Orden de Trabajo</a>
    </div>
    <br>
    <table class="table table-hover">
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
                <td>{{date_format(date_create($OrdenTrabajo->fecha_recepcion), 'd-m-Y')}}</td>
                <td>{{$OrdenTrabajo->nit}}</td>
                <td>{{$OrdenTrabajo->nombre}}</td>
                <td>{{$OrdenTrabajo->placa}}</td>
                <td>Q. {{number_format($OrdenTrabajo->total,2)}}</td>
                <td>@if($OrdenTrabajo->estatus == 1)
                        <h5><span class="badge badge-primary">Creada</span></h5>
                        @endif
                </td>
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
