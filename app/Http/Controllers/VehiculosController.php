<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    public function index(){
        $vehiculos=Vehiculo::all();
        return view("vehiculos.index", compact("vehiculos"));
    }

    public function created(){
        return view('vehiculos.created');
    }

    public function store(Request $request){
        $vehiculo=new vehiculo;//modelo
        $vehiculo->placa=$request->placa;
        $vehiculo->modelo=$request->modelo;
        $vehiculo->color=$request->color;
        $vehiculo->save();
        return redirect()->route('vehiculos.index');//name de la ruta
    }
}
