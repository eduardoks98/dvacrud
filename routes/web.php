<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuariosController;
use App\Models\Usuarios;

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

//Views routes
Route::get('/', [UsuariosController::class, 'index']);
Route::get('/usuarios/new', [UsuariosController::class, 'new']);
Route::get('/usuarios/update/{id}', [UsuariosController::class, 'update']);

//Database routes
Route::post('/usuarios/add', [UsuariosController::class, 'novo']);
Route::post('/usuarios/edit/{id}', [UsuariosController::class, 'editar']);
Route::delete('/usuarios/delete/{id}', [UsuariosController::class, 'deletar']);
