<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\MisOtsController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\RepuestoController;
use App\Http\Controllers\RepuestoOrdenController;
use App\Http\Controllers\RepuestoSolicitudController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ingreso y salida de sesión
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Registro
Route::get('/registrar', [RegisterController::class, 'index'])->name('register');
Route::post('/registrar', [RegisterController::class, 'store']);

// Rutas accesibles solo para el administrador
Route::middleware(['auth', 'role:Admi'])->group(function () {
    Route::get('/', function () {
        return view('principal');
    })->name('index');

    Route::resource('user', UserController::class);
    Route::resource('ubicacion', UbicacionController::class);
    Route::resource('maquina', MaquinaController::class);
    Route::resource('catalogo', CatalogoController::class);
    Route::get('/generar', [OrdenController::class, 'index'])->name('generar.index');
    Route::get('/repuestos', [RepuestoController::class, 'index'])->name('repuestos.index');
    Route::get('/compras', [CompraController::class, 'index'])->name('compras.index');
    Route::get('/Repuesto/Orden', [RepuestoOrdenController::class, 'index'])->name('rep_orden.index');
    Route::get('/Repuesto/Solicitud', [RepuestoSolicitudController::class, 'index'])->name('rep_sol.index');
});

// Rutas accesibles para técnico, administrador y almacén
Route::middleware(['auth', 'role:tecnico,Admi,almacen'])->group(function () {
    Route::get('/misots', [MisOtsController::class, 'index'])->name('misots.index');
});

// Rutas accesibles para solicitante y administrador
Route::middleware(['auth', 'role:solicitante,Admi'])->group(function () {
    Route::get('/solicitud', [SolicitudController::class, 'index'])->name('solicitud.index');
});

// Rutas accesibles para almacén y administrador
Route::middleware(['auth', 'role:almacen,Admi'])->group(function () {
    Route::get('/misots', [MisOtsController::class, 'index'])->name('misots.index');
    Route::get('/compras', [CompraController::class, 'index'])->name('compras.index');
    Route::get('/Repuesto/Orden', [RepuestoOrdenController::class, 'index'])->name('rep_orden.index');
    Route::get('/repuestos', [RepuestoController::class, 'index'])->name('repuestos.index');
});
