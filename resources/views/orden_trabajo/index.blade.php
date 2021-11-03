@extends('plantilla')

@section('contenido')
    <h1 class="text-center">ORDENES DE TRABAJO</h1>

    <div class="d-flex justify-content-end">
        <a class=" btn btn-success" href="{{route('orden_trabajo.created')}}">
            <i class="fas fa-plus-circle"></i>
            Nueva Orden de Trabajo</a>
    </div>
    <br>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Fecha de Recepción</th>
            <th scope="col">Nit</th>
            <th scope="col">Nombre del Cliente</th>
            <th scope="col">Placa</th>
            <th scope="col">Total</th>
            <th scope="col">Estado</th>
            <th scope="col" class="text-center">Vista Previa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($OrdenesTrabajos as $OrdenTrabajo)
            <tr>
                <th scope="row">{{$OrdenTrabajo->id}}</th>
                <td>{{date_format(date_create($OrdenTrabajo->fecha_recepcion), 'd-m-Y')}}</td>
                <td>{{$OrdenTrabajo->nit}}</td>
                <td>{{$OrdenTrabajo->nombre}}</td>
                <td>{{$OrdenTrabajo->placa}}</td>
                <td>Q {{number_format($OrdenTrabajo->total,2)}}</td>
                <td>@if($OrdenTrabajo->estatus == 1)
                        <button v-on:click="cambiarEstatus({{$OrdenTrabajo->id}})" class="btn btn-sm btn-primary">
                            CREADA
                        </button>
                    @elseif($OrdenTrabajo->estatus == 2)
                        <button v-on:click="cambiarEstatus({{$OrdenTrabajo->id}})" class="btn btn-sm btn-secondary">EN
                            PROCESO
                        </button>
                    @elseif($OrdenTrabajo->estatus == 3)
                        <button v-on:click="cambiarEstatus({{$OrdenTrabajo->id}})" class="btn btn-sm btn-danger">EN
                            ESPERA
                        </button>
                    @elseif($OrdenTrabajo->estatus == 4)
                        <button v-on:click="pagarBoleta({{$OrdenTrabajo->id}}, {{$OrdenTrabajo->total}})"
                                class="btn btn-sm btn-warning text-white">PENDIENTE PAGO
                        </button>
                    @else
                        <button class="btn btn-sm btn-success">PAGADA</button>
                    @endif
                </td>
                <td class="text-center">
                    <form>
                        {{--                        @csrf @method('DELETE')--}}
                        <a href="{{route('orden_trabajo.index')}}" class="btn btn-outline-info btn-sm ">
                            <i class=" far fa-eye"> </i>
                            VER</a>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="modalCreada" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cambiar Estado Orden # @{{ ordenTrabajo }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <select v-model="estado" class="custom-select">
                            <option value="0" hidden>Seleccione un estado</option>
                            <option value="2">EN PROCESO</option>
                            <option value="3">EN ESPERA</option>
                            <option value="4">PENDIENTE PAGO</option>
                        </select>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" v-on:click="guardarOrden" id="btnCambiarEstado" class="btn btn-primary">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalPago" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pagar Orden # @{{ ordenTrabajo }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <h3>Total a Pagar: Q @{{ total.toFixed(2) }}</h3>
                    <select v-model="tipoPago" class="custom-select">
                        <option value="0" hidden>Tipo de Pago</option>
                        <option value="1">EFECTIVO</option>
                        <option value="2">CHEQUE</option>
                    </select>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" v-on:click="registrarPago" id="btnRealizarPago" class="btn btn-primary">
                        Registrar Pago
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        new Vue({
            el: '#app',
            created() {
            },
            data: {
                ordenTrabajo: '',
                estado: 0,

                tipoPago: 0,
                total: 0,
            },
            methods: {
                cambiarEstatus: function (id) {
                    this.ordenTrabajo = id
                    $('#modalCreada').modal('show')
                },
                guardarOrden: function () {
                    document.getElementById("btnCambiarEstado").disabled = true;
                    axios
                        .post('/cambiar_estado', {id: this.ordenTrabajo, estado: this.estado})
                        .then(response => {
                            toastr.success('Estado de orden de trabajo modificada.')
                            $('#modalCreada').modal('hide')
                            setTimeout(function () {
                                location.reload()
                            }, 2000)
                        })
                },
                pagarBoleta: function (id, total) {
                    this.ordenTrabajo = id
                    this.total = total
                    $('#modalPago').modal('show')
                },
                registrarPago: function () {
                    document.getElementById("btnRealizarPago").disabled = true

                    axios
                        .post('/realizar_pago', {id: this.ordenTrabajo, tipoPago: this.tipoPago, total: this.total})
                        .then(response => {
                            toastr.success('Pago Realizado.')
                            $('#modalPago').modal('hide')
                            setTimeout(function () {
                                location.reload()
                            }, 2000)
                        })
                }
            }
        })
    </script>
@endsection
