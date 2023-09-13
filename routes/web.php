<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\Tarefa;

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

$router->group(['prefix' => 'tasks'], function() use($router){
    $router->get('', 'TaskController@index');
    $router->get('{id}', 'TaskController@show');
    $router->post('', 'TaskController@store');
    $router->put('{id}', 'TaskController@update');
    $router->delete('{id}', 'TaskController@destroy');
});

$router->group(['prefix' => 'subtasks'], function() use($router){
    $router->get('', 'SubtaskController@index');
    $router->get('{id}', 'SubtaskController@show');
    $router->post('', 'SubtaskController@store');
    $router->put('{id}', 'SubtaskController@update');
    $router->delete('{id}', 'SubtaskController@destroy');
});


