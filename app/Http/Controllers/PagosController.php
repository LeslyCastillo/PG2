<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    public function index(){
        $pagos=pago::all();
        return view("pagos.index", compact("pagos"));
    }

    public function created(){
        return view('pagos.created');
    }

    public function store(Request $request){
        $pago=new pago;//modelo
        $pago->fecha=$request->fecha;
        $pago->total=$request->total;
        $pago->save();
        return redirect()->route('pagos.index');//name de la ruta
    }
}
