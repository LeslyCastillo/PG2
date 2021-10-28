@extends('plantilla')

@section('contenido')
    <h1 class="text-center">CLIENTES</h1>
    @if(session('usuarioGuardado'))
        <div class="alert alert-success">
            {{ session('usuarioGuardado') }}
        </div>
    @endif

    <form action="{{route("clientes.store")}}" method="post">

        @csrf
        <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre</label>
            <input name="nombre" type="text" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label>Nit</label>
            <input name="nit" type="text" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label>Telefono</label>
            <input name="telefono" type="text" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label>Dirección</label>
            <input name="direccion" type="text" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label>Correo</label>
            <input name="correo" type="email" class="form-control">
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

@endsection
