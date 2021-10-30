@extends('plantilla')

@section('contenido')
    <h1 class="text-center">SERVICIOS </h1>

    <form action="{{route("servicios.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Descripción del Servicio:</label>
            <input name="descripcion" type="text" class="form-control">

        </div>

        <div class="form-group">
            <label>Precio:</label>
            <input name="precio" type="text" class="form-control">

        </div>

        <div  class=" d-flex mt-4 justify-content-center">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>
    </form>

@endsection
