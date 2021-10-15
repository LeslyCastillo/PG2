@extends('plantilla')

@section('contenido')
    <h1>Vehiculos</h1>

    <form action="{{route("vehiculos.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Placa</label>
            <input name="placa" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Modelo</label>
            <input name="modelo" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Color</label>
            <input name="color" type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

@endsection
