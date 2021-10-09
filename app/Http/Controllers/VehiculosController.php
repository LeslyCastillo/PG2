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
}
