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
}
