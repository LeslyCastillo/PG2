@extends('plantilla')

@section('contenido')
    <h1>Ordenes de Trabajo</h1>

    <form action="{{route("orden_trabajo.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Fecha Recepcion</label>
            <input name="fecha_recepcion" type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

@endsection
