<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;


class OrdenesTrabajosController extends Controller
{
    public function index(){
        $OrdenesTrabajos=OrdenTrabajo::all();
        return view("orden_trabajo.index", compact("OrdenesTrabajos"));
    }

    public function created(){
        return view('orden_trabajo.created');
    }

    public function store(Request $request){
        $orden_trabajo=new ordentrabajo;//modelo
        $orden_trabajo->fecha_recepcion=$request->fecha_recepcion;
        $orden_trabajo->save();
        return redirect()->route('orden_trabajo.index');//name de la ruta
    }
}
