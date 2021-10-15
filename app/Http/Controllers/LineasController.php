<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use Illuminate\Http\Request;

class LineasController extends Controller
{
    public function index(){
        $lineas=Linea::all();
        return view("lineas.index", compact("lineas"));
    }

    public function created(){
        return view('lineas.created');
    }

    public function store(Request $request){
        $linea=new linea;//modelo
        $linea->linea=$request->linea;
        $linea->save();
        return redirect()->route('lineas.index');//name de la ruta
    }
}
