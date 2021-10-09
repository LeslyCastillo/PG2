<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/servicios', [\App\Http\Controllers\ServiciosController::class, 'index'])->name('servicios.index');
route::get("/clientes", [\App\Http\Controllers\ClientesController::class, 'index'])->name("clientes.index");
route::get("/vehiculos", [\App\Http\Controllers\VehiculosController::class, 'index'])->name("vehiculos.index");
route::get("/lineas", [\App\Http\Controllers\LineasController::class, 'index'])->name("lineas.index");
route::get("/marcas", [\App\Http\Controllers\MarcasController::class, 'index'])->name("marcas.index");
route::get("/ordenestrabajos",[\App\Http\Controllers\OrdenesTrabajosController::class, 'index'])->name("orden_trabajo.index");
route::get("/pagos", [\App\Http\Controllers\PagosController::class, 'index'])->name("pagos.index");
route::get("/tiposvehiculos",[\App\Http\Controllers\TiposVehiculosController::class,'index'])->name("tipos_vehiculos.index");
route::get("/tipospagos",[\App\Http\Controllers\TiposPagosController::class,'index'])->name("tipos_pagos.index");


