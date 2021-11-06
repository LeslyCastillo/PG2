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
                <input v-model="vehiculo.modelo" maxlength="4" required name="modelo" type="text" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label>Color:</label>
                <input v-model="vehiculo.color" maxlength="25" required name="color" type="text" class="form-control">
            </div>

            <div class="form-group col-md-3">
                <div>
                    <label>Marca:</label>
                    <a title="NUEVA MARCA" href="{{route("marcas.created")}}">
                        <i class="fas fa-plus-circle "></i>
                    </a>
                </div>

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
                <div>
                <label>Línea: &nbsp; &nbsp;</label>
                    <a title="NUEVA LÍNEA" href="{{route("lineas.created")}}">
                        <i class="fas fa-plus-circle "></i>
                    </a>
                </div>
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
                <select name="tipovehiculo" v-model="vehiculo.tipoVehiculo" class="selectpicker" required
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
                <input required name="fecha_recepcion" v-model="vehiculo.fechaRecepcion" type="date" class="form-control">
            </div>
            <br>
            <h2 class=" form-group col-md-12 text-center">DATOS DEL CLIENTE</h2>

            <div class="form-group col-md-2 col-sm-6">
                <label>Nit:</label>
                <input id="nit" v-on:keyup.enter="buscarCliente" v-model="cliente.nit" required name="nit" type="text" class="form-control">
            </div>
            <div class="form-group col-md-3 col-sm-6">
                <label>Nombre Completo:</label>
                <input maxlength="60"  id="cliente" v-model="cliente.nombre" required name="nombre" type="text" class="form-control">
            </div>

            <div class="form-group col-md-3 col-sm-6">
                <label>Dirección:</label>
                <input maxlength="60" id="direccion" v-model="cliente.direccion" required name="direccion" type="text" class="form-control">
            </div>

            <div class="form-group col-md-2 col-sm-6">
                <label>Teléfono:</label>
                <input maxlength="8" id="telefono" type="number" maxlength="8" required v-model="cliente.telefono" name="telefono" class="form-control">
            </div>
            <div class="form-group col-md-2 col-sm-6">
                <label>Correo:</label>
                <input maxlength="45"  id="correo" name="correo" v-model="cliente.correo" type="email" class="form-control">
            </div>

        </div>
        <br>
        <h2 class="text-center">SERVICIOS SOLICITADOS</h2>


        {{--        <div  class=" d-flex mt-4 justify-content-center">--}}
        {{--            <button type="submit" class="btn btn-primary">Registrar</button>--}}
        {{--        </div>--}}
    </form>
    <form autocomplete="off" action="POST" id="ingreso">
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
                           placeholder="Precio">
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
            <a href="#" id="btnRegistrarOrden" v-on:click="guardarOrden" class="btn btn-primary">Registrar</a>
        </div>
    </form>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


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
        new Vue({
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

                addServicioDefault: {
                    servicio: [],
                    observaciones: '',
                    precio: ''
                },
                vehiculo: {
                    placa: '',
                    modelo: '',
                    color: '',
                    marca: '',
                    linea: '',
                    tipoVehiculo: '',
                    fechaRecepcion: ''
                },

                cliente: {
                  nombre: '',
                  nit: '',
                  telefono: '',
                  direccion: '',
                  correo: ''
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
                buscarCliente: function () {
                    axios
                        .post('/buscar_clientes', {nit: this.cliente.nit})
                        .then(response => {
                            if (response.data !== '') {
                                this.cliente = response.data
                            } else {
                                this.cliente.nombre = ''
                                this.cliente.direccion = ''
                                this.cliente.correo = ''
                                this.cliente.telefono = ''
                            }
                        })
                },
                guardarOrden: function () {
                    if (this.serviciosAgregados.length!==0) {//que no sea igual a cero
                        document.getElementById("btnRegistrarOrden").disabled = true;
                        axios
                            .post('/guardar_ordenestrabajos', {
                                servicios: this.serviciosAgregados, cliente: this.cliente, vehiculo: this.vehiculo
                            })
                            .then(response => {
                                toastr.success('Orden de trabajo registrada con exito.')
                                setTimeout(function () {
                                    location.reload()

                                }, 3000)

                            })
                    }else{
                        toastr.error('No se rellenaron los campos.')
                    }
                },

                    agregarServicio: function () {
                        if (this.addServicio.servicio == '' || this.addServicio.precio == '') {
                            toastr.error('No se rellenaron los campos.')
                        } else {
                            let copyService = Object.assign({}, this.addServicio)
                            this.serviciosAgregados.push(copyService)
                            this.addServicio = Object.assign({}, this.addServicioDefault)
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
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection
