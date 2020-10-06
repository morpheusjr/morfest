<?php

use App\Http\Controllers\PessoaController;
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

Route::get('/pessoa', [PessoaController::class, 'index']);
Route::get('/pessoa/{id}', [PessoaController::class, 'show']);
Route::get('/editar/{id}', [PessoaController::class, 'edit']);

Route::get('/cadastro', [PessoaController::class, 'storeForm']);
