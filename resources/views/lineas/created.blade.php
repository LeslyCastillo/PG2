@extends('plantilla')

@section('contenido')
    <h1>Lineas</h1>

    <form action="{{route("lineas.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Linea</label>
            <input name="linea" type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

@endsection
