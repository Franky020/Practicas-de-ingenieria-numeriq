<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TemaController;
use App\Http\Controllers\Api\NivelController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\MateriaController;

Route::get('/niveles', [NivelController::class, 'index']);
Route::post('/niveles', [NivelController::class, 'store']);

Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);

Route::get('/materias', [MateriaController::class, 'index']);
Route::post('/materias', [MateriaController::class, 'store']);

Route::get('/temas', [TemaController::class, 'index']);
Route::post('/temas', [TemaController::class, 'store']);

Route::get('/materias/filtrar', [MateriaController::class, 'filtrar']);

Route::middleware('throttle:5,1')->get('/solicitud', function () {
    return response()->json([
        "ok" => true,
        "mensaje" => "Solicitud aceptada por el servidor"
    ]);
});


