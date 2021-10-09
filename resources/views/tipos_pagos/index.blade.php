@extends('plantilla')

@section('contenido')
    <h1>Formas de Pagos</h1>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Forma de Pago</th>

        </tr>
        </thead>
        <tbody>
        @foreach($TiposPagos as $TipoPago)
            <tr>
                <th scope="row">{{$TipoPago->id}}</th>
                <td>{{$TipoPago->forma_de_pago}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
