<?php

use App\Http\Controllers\api\DesejoController;
use App\Http\Controllers\api\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Rota de Usuários
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

//Rotas da Lista de Desejos
Route::get('/desejos', [DesejoController::class, 'index']);
Route::post('/desejos/filtrar', [DesejoController::class, 'filtrar']);
Route::post('/desejos', [DesejoController::class, 'store']);
Route::get('/desejos/{id}', [DesejoController::class, 'show']);
Route::put('/desejos/{id}', [DesejoController::class, 'update']);
Route::delete('/desejos/{id}', [DesejoController::class, 'destroy']);


