@extends('plantilla')

@section('contenido')
    <h1>Clientes</h1>

    <form action="{{route("clientes.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input name="nombre" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Nit</label>
            <input name="nit" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Telefono</label>
            <input name="telefono" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Dirección</label>
            <input name="direccion" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Correo</label>
            <input name="correo" type="email" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

@endsection
