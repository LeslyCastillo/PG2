<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleOrdenes;
use App\Models\Linea;
use App\Models\Marca;
use App\Models\OrdenTrabajo;
use App\Models\Servicio;
use App\Models\TipoVehiculo;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;


class OrdenesTrabajosController extends Controller
{
    public function index(){
        $OrdenesTrabajos=OrdenTrabajo::all();
        return view("orden_trabajo.index", compact("OrdenesTrabajos"));
    }

    public function created(){
        $marcas=Marca::all();
        $lineas=Linea::all();
        $tipo_vehiculo=TipoVehiculo::all();
        $servicios=Servicio::all();
        return view('orden_trabajo.created', compact("marcas", "lineas", "tipo_vehiculo", "servicios"));
    }

    public function store(Request $request){

        try{
            $vehiculo = new Vehiculo; //Modelo
            $vehiculo->placa=$request->vehiculo['placa'];
            $vehiculo->modelo=$request->vehiculo['modelo'];
            $vehiculo->color=$request->vehiculo['color'];
            $vehiculo->marcas_id=$request->vehiculo['marca'];
            $vehiculo->lineas_id=$request->vehiculo['linea'];
            $vehiculo->tipo_vehiculos_id=$request->vehiculo['tipoVehiculo'];
            $vehiculo->save();

            //Buscamos cliente mediante nit
            $cliente = Cliente::where('nit', $request->cliente['nit'])->first();

            //Comprobamos si no existe se ejecuta el if para registrarlo
            if(empty($cliente)){
                $nuevo_cliente = new Cliente;
                $nuevo_cliente->nombre = $request->cliente['nombre'];
                $nuevo_cliente->nit = $request->cliente['nit'];
                $nuevo_cliente->telefono = $request->cliente['telefono'];
                $nuevo_cliente->direccion = $request->cliente['direccion'];
                $nuevo_cliente->correo = $request->cliente['correo'];
                $nuevo_cliente->save();

                //Guardamos en variable $cliente para colocarlos en la Orden De Trabajo
                $cliente = $nuevo_cliente;
            }

            $orden_trabajo = new OrdenTrabajo; //Modelo
            $orden_trabajo->fecha_recepcion=$request->vehiculo['fechaRecepcion'];
            $orden_trabajo->vehiculos_id=$vehiculo->id;
            $orden_trabajo->clientes_id=$cliente->id;
            $orden_trabajo->users_id=Auth::user()->id;
            $orden_trabajo->save();

            foreach ($request->servicios as $servicio){
                $detalleOrden = new DetalleOrdenes;
                $detalleOrden->orden_de_trabajo_id = $orden_trabajo->id;
                $detalleOrden->servicios_id = $servicio['servicio']['id'];
                $detalleOrden->observaciones = $servicio['observaciones'];
                $detalleOrden->total = $servicio['precio'];
            }


            return redirect()->route('orden_trabajo.index');//name de la ruta
        }catch (Throwable $t){
            return response()->json('Ocurrio un error', 500);
        }
    }
}
