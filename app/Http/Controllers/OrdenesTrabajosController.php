<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use App\Models\Marca;
use App\Models\OrdenTrabajo;
use App\Models\Servicio;
use App\Models\TipoVehiculo;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $buscar_marca=Marca::where('marca', strtoupper($request->marca))->first();
        if (empty($buscar_marca)){
            $marca=new Marca();
            $marca->marca=$request->marca;
            $marca->save();
            $marca=$marca->id;

        }
        else{
            $marca=$buscar_marca->id;
        }
        $vehiculo=new Vehiculo;//modelo
        $vehiculo->placa=$request->placa;
        $vehiculo->modelo=$request->modelo;
        $vehiculo->color=$request->color;
        $vehiculo->marcas_id=$marca;
        $vehiculo->lineas_id=$request->linea;
        $vehiculo->tipo_vehiculos_id=$request->tipovehiculo;
        $vehiculo->save();
        $orden_trabajo=new ordentrabajo;//modelo
        $orden_trabajo->fecha_recepcion=$request->fecha_recepcion;
        $orden_trabajo->propietario=$request->propietario;
        $orden_trabajo->vehiculos_id=$vehiculo->id;
        $orden_trabajo->users_id=Auth::user()->id;
        $orden_trabajo->save();
        return redirect()->route('orden_trabajo.index');//name de la ruta
    }
}
