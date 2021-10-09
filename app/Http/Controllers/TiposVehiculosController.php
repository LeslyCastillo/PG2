<?php

namespace App\Http\Controllers;

use App\Models\TipoVehiculo;
use Illuminate\Http\Request;

class TiposVehiculosController extends Controller
{
    public function index(){
        $TiposVehiculos=TipoVehiculo::all();
        return view("tipos_vehiculos.index", compact("TiposVehiculos"));
    }
}
