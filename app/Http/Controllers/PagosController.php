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
}
