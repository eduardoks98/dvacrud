<?php

use App\Http\Controllers\UsuariosController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Retorna todos os usuarios
Route::get('usuarios', [UsuariosController::class, 'get_all']);

//Retorna um usuarios especifico
Route::get('usuario/{id}', [UsuariosController::class, 'get_one']);

//Novo Usuario
Route::post('addusuario', [UsuariosController::class, 'add']);

//Atualizar Usuario
Route::post('editusuario/{id}', [UsuariosController::class, 'edit']);

//Deletar Usuario
Route::delete("delUsuario/{id}", [UsuariosController::class, 'delete']);