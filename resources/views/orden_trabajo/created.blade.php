@extends('plantilla')

@section('contenido')
    <h1>Ordenes de Trabajo</h1>

    <form action="{{route("orden_trabajo.store")}}" method="post">
        @csrf

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Placa</label>
                    <input required name="placa" type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Modelo</label>
                    <input required name="modelo" type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Color</label>
                    <input required name="color" type="text" class="form-control">
                </div>

                <div class="form-group col-md-4">
                    <label>Marca</label>
                    <select required name="marca" class="form-control" aria-label="Default select example">
                        <option value="" hidden>Selecciona una marca</option>
                        @foreach($marcas as $marca)
                            <option value="{{$marca->id}}">{{$marca->marca}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <br>
                <div class="form-group col-md-4">
                    <label>Línea</label>
                    <select required name="linea" class="form-control" aria-label="Default select example">
                        <option value="" hidden>Selecciona una línea</option>
                        @foreach($lineas as $linea)
                            <option value="{{$linea->id}}">{{$linea->linea}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Tipo de vehiculo</label>
                    <select required name="tipovehiculo" class="form-control" aria-label="Default select example">
                        <option value="" hidden>Selecciona un tipo</option>
                        @foreach($tipo_vehiculo as $tipovehiculo)
                            <option value="{{$tipovehiculo->id}}">{{$tipovehiculo->descripcion}}</option>
                        @endforeach
                    </select>
                </div>


            <div class="form-group col-md-6">
            <label>Fecha Recepcion</label>
            <input  required name="fecha_recepcion" type="date" class="form-control">
            </div>

        <div class="form-group col-md-6">
            <label>Propietario</label>
            <input required name="propietario" type="text" class="form-control">
        </div>
        </div>
        <div  class=" d-flex mt-4 justify-content-center">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>

@endsection
