<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function index(){
        $marcas=Marca::all();
        return view("marcas.index", compact("marcas"));
    }

    public function created(){
        return view('marcas.created');
    }

    public function store(Request $request){
        $marca=new marca;//modelo
        $marca->marca=$request->marca;
        $marca->save();
        return redirect()->route('marcas.index');//name de la ruta
    }
}
