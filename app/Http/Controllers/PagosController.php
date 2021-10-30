<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\TipoPago;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    public function index(){
        $pagos=pago::all();
        return view("pagos.index", compact("pagos"));
    }

    public function created(){
        $tipo_pago=TipoPago::all();
        return view('pagos.created', compact("tipo_pago"));
    }

    public function store(Request $request){
        $pago=new pago;//modelo
        $pago->fecha=$request->fecha;
        $pago->total=$request->total;
        $pago->save();
        return redirect()->route('pagos.index');//name de la ruta
    }
}
