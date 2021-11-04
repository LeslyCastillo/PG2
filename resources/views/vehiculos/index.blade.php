@extends('plantilla')

@section('contenido')
    <h1 class="text-center">VEHICULOS</h1>
    <br>
{{--    <a class="btn btn-primary"  style=background-color:forestgreen href="{{route('vehiculos.created')}}">--}}
{{--        <i class="fas fa-plus-circle"></i>--}}
{{--         Crear vehiculo</a>--}}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nit</th>
            <th scope="col">Cliente</th>
            <th scope="col">Placa</th>
            <th scope="col">Modelo</th>
            <th scope="col">color</th>
            <th scope="col">Línea</th>
            <th scope="col">Marca</th>
            <th scope="col" class="text-center">Tipo de Vehiculo</th>
            <TH scope="col" class="text-center">Orden de Trabajo</TH>

        </tr>
        </thead>
        <tbody>
        @foreach($vehiculos as $vehiculo)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$vehiculo->nit}}</td>
                <td>{{$vehiculo->nombre}}</td>
                <td>{{$vehiculo->placa}}</td>
                <td>{{$vehiculo->modelo}}</td>
                <td>{{$vehiculo->color}}</td>
                <td>{{$vehiculo->linea}}</td>
                <td>{{$vehiculo->marca}}</td>
                <td class="text-center">{{$vehiculo->descripcion}}</td>
                <td class="text-center"> <form>
{{--                        @csrf @method('DELETE')--}}
                        <a href="{{route('orden.pdf', $vehiculo->no_orden)}}" target="_blank" class="btn btn-outline-info btn-sm ">
                            <i class=" far fa-eye"> </i>
                              VER</a>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
