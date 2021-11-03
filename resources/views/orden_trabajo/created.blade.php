@extends('plantilla')

@section('contenido')
    <h2 class="text-center">REGISTRAR ORDEN DE TRABAJO</h2>
    <form id="form_general" autocomplete="off" action="{{route("orden_trabajo.store")}}" method="post">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Placa:</label>
                <input v-model="vehiculo.placa" maxlength="8" required name="placa" type="text" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label>Modelo:</label>
                <input v-model="vehiculo.modelo" required name="modelo" type="text" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label>Color:</label>
                <input v-model="vehiculo.color" required name="color" type="text" class="form-control">
            </div>

            <div class="form-group col-md-3">
                <label>Marca:</label>
                <select  v-model="vehiculo.marca" required name="marca" class="selectpicker"
                        data-none-Results-Text="No se encontro la marca"
                        data-none-Selected-Text="Escoja una marca" data-live-search="true">
                    <option value="" hidden>Selecciona una marca</option>
                    @foreach($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->marca}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3">
                <label>Línea: &nbsp; &nbsp;</label>
                <select v-model="vehiculo.linea" class="selectpicker" required name="linea"
                        data-none-Results-Text="No se encontro la linea"
                        data-none-Selected-Text="Escoja una linea" data-live-search="true">
                    <option value="" hidden>Selecciona una línea</option>
                    @foreach($lineas as $linea)
                        <option value="{{$linea->id}}">{{$linea->linea}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">

                <div>
                    <label>Tipo de vehiculo:</label>
                    <a title="NUEVO TIPO" href="{{route("tipos_vehiculos.created")}}">
                        <i class="fas fa-plus-circle "></i>
                    </a>
                </div>
                <select name="tipovehiculo" v-model="vehiculo.linea" class="selectpicker" required
                        data-none-Results-Text="No se encontro el tipo de vehiculo"
                        data-none-Selected-Text="Escoja una tipo de vehiculo" data-live-search="true">
                    <option value="" hidden>Selecciona un tipo</option>
                    @foreach($tipo_vehiculo as $tipovehiculo)
                        <option value="{{$tipovehiculo->id}}">{{$tipovehiculo->descripcion}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3">
                <label>Fecha Recepción:</label>
                <input required name="fecha_recepcion" type="date" class="form-control">
            </div>
            <br>
            <h2 class=" form-group col-md-12 text-center">DATOS DEL CLIENTE</h2>

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
        <h2 class="text-center">SERVICIOS SOLICITADOS</h2>


        {{--        <div  class=" d-flex mt-4 justify-content-center">--}}
        {{--            <button type="submit" class="btn btn-primary">Registrar</button>--}}
        {{--        </div>--}}
    </form>
    <form action="POST" id="ingreso">
        <div class="form-row">
            <div class="form-group col-md-4 ">

                <select v-model="addServicio.servicio" id="servicio" required name="servicio" class="form-control"
                        aria-label="Default select example">
                    <option value="" hidden>Selecciona un servicio</option>
                    <option v-for="item in servicios" v-bind:value="{ id: item.id, servicio: item.servicio }">@{{
                        item.servicio }}
                    </option>
                </select>
            </div>
            <div class="col-md-4 col-4">
                <input v-model="addServicio.observaciones" type="text" maxlength="250" id="observaciones"
                       class="form-control" placeholder="Observaciones">
            </div>
            <div class="col-md-2 col-4">
                <div class=" input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Q</div>
                    </div>
                    <input v-model="addServicio.precio" type="text" class="form-control" id="precio"
                           placeholder="Precio servicio">
                </div>
            </div>
            <div class="col-md-2 col-4 form-group">
                <a v-on:click="agregarServicio" class="btn btn-primary"> Agregar Servicio</a>
            </div>
        </div>
    </form>
    <form id="form_servicios">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th>Servicio</th>
                <th>Observaciones</th>
                <th>Precio</th>
                fdsafsd
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in serviciosAgregados" v-if="serviciosAgregados !== null">
                <td>@{{item.servicio.servicio}}</td>
                <td>@{{item.observaciones}}</td>
                <td>@{{item.precio}}</td>
            </tr>
            </tbody>
        </table>
    </form>
    <form id="registrar_ot">
        <div class=" d-flex mt-4 justify-content-center">
            <a href="#" onclick="ingresar_orden()" class="btn btn-primary">Registrar</a>
        </div>
    </form>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function ingresar_orden() {
            var form1 = $('#form_servicios').serialize()
            var form2 = $('#form_general').serialize()
            const searchParams = new URLSearchParams(form1);
            form1 = Object.fromEntries(searchParams);
            const searchParamss = new URLSearchParams(form2);
            form2 = Object.fromEntries(searchParamss);
            $.ajax({
                url: '{{route('orden_trabajo.store')}}',
                method: 'POST',
                data: {info: form2, servicios: form1},
                success: function (data) {
                    console.log(data)
                }
            })
        }

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

        var linea = $('#linea');

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

        var cliente = $('#cliente');

        cliente.autocomplete({
                source: function (request, response) {
                    var query = cliente.val();
                    $.ajax({
                        url: '{{route('cliente.buscar')}}',
                        method: 'POST',
                        data: {query: query},
                        success: function (data) {
                            let resp = $.map(data, function (obj, key) {


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
                focus: function (event, ui) {
                    event.preventDefault();
                },
                select: function (event, ui) {
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
        var app = new Vue({
            el: '#app',
            created() {
                this.getServicios()
            },
            data: {
                servicios: [],
                serviciosAgregados: [],
                addServicio: {
                    servicio: [],
                    observaciones: '',
                    precio: ''
                },

                vehiculo: {
                    placa: '',
                    modelo: '',
                    color: '',
                    marca: {},
                    linea: {},
                    tipoVehiculo: {},
                    fechaRecepcion: ''
                }
            },
            methods: {
                getServicios: function () {
                    axios
                        .get('/api/servicios')
                        .then(response => {
                            this.servicios = response.data

                        })
                },
                agregarServicio: function () {
                    if (this.addServicio.servicio == '' || this.addServicio.precio == '') {
                        toastr.error('No se rellenaron los campos.')
                    } else {
                        console.log(this.vehiculo)
                        this.serviciosAgregados.push(this.addServicio)
                        toastr.success('Se añadio el servicio!')
                    }
                }
            }
        })
    </script>
    <style>
        .btn-blanco{
            background-color: #ffffff !important;
            border-color: #797e87 !important;
        }
    </style>
@endsection
