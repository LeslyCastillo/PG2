@extends('plantilla')

@section('contenido')
    <h1>Pagos</h1>

    <form action="{{route("pagos.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Fecha</label>
            <input name="fecha" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Total</label>
            <input name="total" type="text" class="form-control">
        </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

@endsection
