<?php

namespace App\Http\Controllers;

use App\Models\TipoPago;
use Illuminate\Http\Request;

class TiposPagosController extends Controller
{
    public function index(){
        $TiposPagos=TipoPago::all();
        return view("tipos_pagos.index", compact("TiposPagos"));
    }
}
