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
}
