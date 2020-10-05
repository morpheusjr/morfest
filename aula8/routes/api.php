<?php

use App\Http\Controllers\PessoaController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/pessoa', 'PessoaController@index');
Route::get('/pessoa', [PessoaController::class, 'index']);
Route::get('/pessoa/{id}', [PessoaController::class, 'show']);
Route::post('/pessoa', [PessoaController::class, 'store']);
Route::put('/pessoa/{id}', [PessoaController::class, 'update']);
Route::delete('/pessoa/{id}', [PessoaController::class, 'delete']);
