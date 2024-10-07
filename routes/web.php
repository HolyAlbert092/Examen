<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[App\Http\Controllers\agendaController::class, 'get'])->name('home');
Route::post('/cargarDatos/{aux}',[App\Http\Controllers\agendaController::class, 'datosGPS']);
Route::get('/add',[App\Http\Controllers\agendaController::class, 'create'])->name('form');
Route::post('/agregar',[App\Http\Controllers\agendaController::class, 'guardar'])->name('agregar');
Route::get('/edit/{id}',[App\Http\Controllers\agendaController::class, 'info'])->name('info');
Route::post('/actualizar/{id}',[App\Http\Controllers\agendaController::class, 'actualizar']);
Route::get('/eliminar/{id}',[App\Http\Controllers\agendaController::class, 'delete'])->name('delete');
Route::get('/descargar',[App\Http\Controllers\agendaController::class, 'descargar'])->name('download');