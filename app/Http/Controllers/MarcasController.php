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
}
