@extends('plantilla')

@section('contenido')
    <h1 class="text-center">REGISTRAR ORDEN DE TRABAJO</h1>


    <form autocomplete="off" action="{{route("orden_trabajo.store")}}" method="post">
        @csrf

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Placa:</label>
                    <input required name="placa" type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Modelo:</label>
                    <input required name="modelo" type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Color:</label>
                    <input required name="color" type="text" class="form-control">
                </div>

                <div class="form-group col-md-3">
                    <label>Marca:</label>
{{--                    <select  required name="marca" class="form-control" aria-label="Default select example">--}}
{{--                        <option value="" hidden>Selecciona una marca</option>--}}
{{--                        @foreach($marcas as $marca)--}}
{{--                            <option value="{{$marca->id}}">{{$marca->marca}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
                    <input autocomplete="off" type="text" maxlength="25" required class="form-control text-uppercase" name="marca" id="marca">

                </div>
                <br>
                <br>
                <div class="form-group col-md-3">
                    <label>Línea:</label>
{{--                    <select required name="linea" class="form-control" aria-label="Default select example">--}}
{{--                        <option value="" hidden>Selecciona una línea</option>--}}
{{--                        @foreach($lineas as $linea)--}}
{{--                            <option value="{{$linea->id}}">{{$linea->linea}}</option>--}}
{{--                        @endforeach--}}

{{--                    </select>--}}
                    <input autocomplete="off" type="text" maxlength="25" required class="form-control text-uppercase" name="linea" id="linea">

                </div>
                <div class="form-group col-md-3">

                    <div>
                        <label STYLE="margin-right: 155px;" >Tipo de vehiculo:</label>
                        <a title="NUEVO TIPO" href="{{route("tipos_vehiculos.created")}}" >
                            <i  class="fas fa-plus-circle "></i>
                            </a>
                    </div>
                    <select required name="tipovehiculo" class="form-control" aria-label="Default select example">
                        <option value="" hidden>Selecciona un tipo</option>
                        @foreach($tipo_vehiculo as $tipovehiculo)
                            <option value="{{$tipovehiculo->id}}">{{$tipovehiculo->descripcion}}</option>
                        @endforeach
                    </select>
                </div>

            <div class="form-group col-md-3">
            <label>Fecha Recepción:</label>
            <input  required name="fecha_recepcion" type="date" class="form-control">
            </div>
                <br>
                <h1 class=" form-group col-md-12 text-center">DATOS DEL CLIENTE</h1>

        <div class="form-group col-md-4">
            <label>Nombre Completo:</label>
            <input id="cliente" required name="nombre" type="text" class="form-control">
        </div>
                <div class="form-group col-md-4">
                    <label>Nit:</label>
                    <input id="nit" required name="nit" type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Dirección:</label>
                    <input id="direccion" required name="direccion" type="text" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Teléfono:</label>
                    <input id="telefono" required name="telefono" type="tel" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Correo Electrónico:</label>
                    <input id="correo" name="correo" type="email" class="form-control">
                </div>

            </div>
        <br>
        <h1 class="text-center">SERVICIOS SOLICITADOS</h1>




{{--        <div  class=" d-flex mt-4 justify-content-center">--}}
{{--            <button type="submit" class="btn btn-primary">Registrar</button>--}}
{{--        </div>--}}
    </form>
    <form action="POST" id="ingreso">
        <div class="form-row">
            <div class="form-group col-md-4 ">

                <select id="servicio" required name="servicio" class="form-control" aria-label="Default select example">
                    <option value="" hidden>Selecciona un servicio</option>
                    @foreach($servicios as $item)
                        <option value="{{$item->id}}">{{$item->servicio}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-4">
                <input type="text" maxlength="250" id="observaciones" class="form-control" placeholder="Observaciones">
            </div>
            <div class="col-md-2 col-4">
                <div  class=" input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Q</div>
                    </div>
                    <input type="text" class="form-control" id="precio" placeholder="Precio servicio">
                </div>
            </div>
            <div class="col-md-2 col-4 form-group">
                <button  id="btn-agregarServicio" class="btn btn-primary"> Agregar Servicio</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
        <tr class="text-center">
            <th>No.</th>
            <th>Descripción del Servicio</th>
            <th>Observaciones</th>
            <th>Precio</th>
        </tr>
        </thead>
    </table>
    <form id="registrar_ot">
    <div  class=" d-flex mt-4 justify-content-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
    </form>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var marca = $('#marca');

        marca.autocomplete({
                source: function (request, response) {
                    var query = marca.val();
                    $.ajax({
                        url: '{{route('marca.buscar')}}',
                        method: 'POST',
                        data: {query: query},
                        success: function (data) {
                            let resp = $.map(data, function (obj) {
                                return obj.marca;
                            });
                            response(resp);
                        }
                    })
                },
                minLength: 2
            }
        );

        var linea   = $('#linea');

        linea.autocomplete({
                source: function (request, response) {
                    var query = linea.val();
                    $.ajax({
                        url: '{{route('linea.buscar')}}',
                        method: 'POST',
                        data: {query: query},
                        success: function (data) {
                            let resp = $.map(data, function (obj) {
                                return obj.linea;
                            });
                            response(resp);
                        }
                    })
                },
                minLength: 2
            }
        );

        var cliente   = $('#cliente');

        cliente.autocomplete({
                source: function (request, response) {
                    var query = cliente.val();
                    $.ajax({
                        url: '{{route('cliente.buscar')}}',
                        method: 'POST',
                        data: {query: query},
                        success: function (data) {
                            let resp = $.map(data, function (obj,key) {



                                    return {
                                        label: obj.nombre,
                                        value: obj.id,
                                        direccion: obj.direccion,
                                        telefono: obj.telefono,
                                        nit: obj.nit,
                                        correo: obj.correo,
                                    }

                                //return obj.nombre;
                            });
                            response(resp);
                        }
                    })
                },
            focus: function(event, ui) {
                event.preventDefault();
            },
            select: function(event, ui) {
                event.preventDefault();
                $('#cliente').val(ui.item.label);
                $('#direccion').val(ui.item.direccion);
                $('#telefono').val(ui.item.telefono);
                $('#nit').val(ui.item.nit);
                $('#correo').val(ui.item.correo);
            },
                minLength: 2
            }
        );
    </script>

    <script>
        function agregarC(){
            var codigo=$("#servicio option:selected").val();
            var servicio = $("#servicio option:selected").text(); //ISO
            var precio = $("#precio").val();
            var observaciones = $("#observaciones").val();//Codigo BD
            var i = $('.table tr').length - 1;
            var fila='<tr class="fila">'+
                '<td for="id_content" ><input class="form-control codigo_con" type="text" name="codigo['+i+'][numero_contenedor]" value="'+codigo+'" readonly></td>'+
                '<td><input class="form-control" type="text" value="'+servicio+'" readonly></td>'+
                '<td><input class="form-control" type="text" value="'+observaciones+'" name="observaciones" readonly></td>'+
                '<td><input class="form-control" type="text" value="'+precio+'" readonly></td>'+
                '</tr>';
            $('.table').append(fila);
            $('#id').val('');
            $("#servicios-select").prop('selectedIndex',0);
            $('#precio').val('');
        }

        $('#ingreso').submit(function(e){
            e.preventDefault();
            agregarC();
        });

    </script>

@endsection
