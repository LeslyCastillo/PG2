@extends('plantilla')

@section('contenido')
    <h1 class="text-center">PAGOS</h1>
    <div  class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{route('pagos.created')}}">
            <i class="fas fa-plus-circle"></i>
            Nuevo Pago</a>
    </div>

        <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Fecha</th>
            <th scope="col">Nit</th>
            <th scope="col">CLiente</th>
            <th scope="col">Orden de Trabajo</th>
            <th scope="col">Total</th>
            <th scope="col">Forma de Pago</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pago)
            <tr>
                <th scope="row">{{$pago->id}}</th>
                <td>{{date_format(date_create($pago->fecha), 'd-m-Y H:i')}}</td>
                <td>{{$pago->nit}}</td>
                <td>{{$pago->nombre}}</td>
                <td>#{{$pago->orden_de_trabajo_id}}</td>
                <td>Q{{number_format($pago->total,2)}}</td>
                <td>
                    @if($pago->tipo_de_pago==1)
                        Efectivo
                    @else
                    Cheque

                        @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
