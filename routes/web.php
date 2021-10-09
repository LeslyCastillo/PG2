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
