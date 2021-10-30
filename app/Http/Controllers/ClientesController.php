<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index() {
        $clientes=Cliente::all();
        return view("clientes.index", compact("clientes"));

    }
    public function created(){
        return view('clientes.created');
    }

    public function store(Request $request){
        $cliente=new cliente;//modelo
        $cliente->nombre=$request->nombre;
        $cliente->nit=$request->nit;
        $cliente->telefono=$request->telefono;
        $cliente->direccion=$request->direccion;
        $cliente->correo=$request->correo;
        $cliente->save();
        return redirect()->route('clientes.index');//name de la ruta
    }

    //Eliminar Usuarios
    public function delete($id){
        Cliente::destroy($id);

        return back()->with('clienteEliminado','Cliente Eliminado');
    }

    public function find(){
        return Cliente::all();
    }
    //editar
    public function edit($id){
        $cliente=Cliente::find($id);
        return view("clientes.edit", compact("cliente"));
    }

    public function updated(Request $request, $id){
        $cliente=Cliente::find($id);
        $cliente->fill($request->all())->save();
        return redirect()->route("clientes.index");
    }

//    public function inicio(){
//        return view('index');
//
//    }
    //
}
