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
}
