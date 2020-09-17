<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Retornar todas as pessoas
$router->get('/pessoa', ['uses' => 'PessoaController@index']);

// Retornar uma pessoa
$router->get('/pessoa/{id}', ['uses' => 'PessoaController@show']);

// Criar uma nova pessoa
$router->post('/pessoa', ['uses' => 'PessoaController@store']);

// Atualizar uma pessoa
$router->put('/pessoa/{id}', ['uses' => 'PessoaController@update']);

// Apagar uma pessoa
$router->delete('/pessoa/{id}', ['uses' => 'PessoaController@delete']);
