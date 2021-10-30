@extends('plantilla')

@section('contenido')
    <h1 class="text-center">CLIENTES</h1>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{route('clientes.created')}}">
            <i class="fas fa-plus-circle"></i> Nuevo Cliente</a>
    </div>
    <br>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nit</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Dirección</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">Acciones</th>

        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <th scope="row">{{$cliente->id}}</th>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->nit}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->correo}}</td>
                <td>
{{--               <td> <form action="{{route('delete', $cliente->id)}}" method="post">--}}
{{--                    @csrf @method('DELETE')--}}
{{--                    <button title="ELIMINAR REGISTRO" type="submit" onclick="return confirm('¿Seguro de borrar datos?');" class="btn btn-danger btn-sm">--}}
{{--                        <i class="fas fa-trash-alt"></i>--}}
{{--                    </button>--}}
                       <a title="EDITAR DATOS" class="btn btn-primary btn-sm" href="{{route("clientes.edit", $cliente->id)}}"><i class="fas fa-edit"></i>
                       </a>
                </form>

               </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
