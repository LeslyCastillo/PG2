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
    return view('index');
});
//Servicios
Route::get('/servicios', [\App\Http\Controllers\ServiciosController::class, 'index'])->name('servicios.index');
Route::get('/crear_servicios',[\App\Http\Controllers\ServiciosController::class, 'created'])->name("servicios.created");
Route::post("/guardar_servicios", [\App\Http\Controllers\ServiciosController::class, 'store'])->name("servicios.store");
//Clientes
Route::get("/clientes", [\App\Http\Controllers\ClientesController::class, 'index'])->name("clientes.index");
Route::get("/vehiculos", [\App\Http\Controllers\VehiculosController::class, 'index'])->name("vehiculos.index");
Route::get("/lineas", [\App\Http\Controllers\LineasController::class, 'index'])->name("lineas.index");
Route::get("/marcas", [\App\Http\Controllers\MarcasController::class, 'index'])->name("marcas.index");
Route::get("/ordenestrabajos",[\App\Http\Controllers\OrdenesTrabajosController::class, 'index'])->name("orden_trabajo.index");
Route::get("/pagos", [\App\Http\Controllers\PagosController::class, 'index'])->name("pagos.index");
Route::get("/tiposvehiculos",[\App\Http\Controllers\TiposVehiculosController::class,'index'])->name("tipos_vehiculos.index");
Route::get("/tipospagos",[\App\Http\Controllers\TiposPagosController::class,'index'])->name("tipos_pagos.index");



