<?php
use App\Http\Controllers\ControllerApuestas;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/apuestas', [ControllerApuestas::class, 'index'])->name('apuestas.index');
Route::get('/apuestas/jugadores', [ControllerApuestas::class, 'jugadores'])->name('apuestas.jugadores');
Route::get('/apuestas/checarDinero', [ControllerApuestas::class, 'check'])->name('apuestas.check');
Route::get('/apuestas/buscarApuestas', [ControllerApuestas::class, 'buscar'])->name('apuestas.buscar');
Route::post('/apuestas', [ControllerApuestas::class, 'store'])->name('apuestas.store');
Route::get('/apuestas/crearApuesta', [ControllerApuestas::class, 'create'])->name('apuestas.create');