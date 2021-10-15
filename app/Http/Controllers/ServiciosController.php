<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index(){
        $servicios = Servicio::all();

        return view('servicios.index', compact('servicios'));
    }

    public function created(){
        return view('servicios.created');
    }

    public function store(Request $request){
        $servicio=new Servicio;//modelo
        $servicio->servicio=$request->descripcion;
        $servicio->save();
        return redirect()->route('servicios.index');//name de la ruta
    }
}
