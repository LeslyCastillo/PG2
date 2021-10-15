@extends('plantilla')

@section('contenido')
    <h1>Marcas</h1>

    <form action="{{route("marcas.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input name="marca" type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

@endsection
