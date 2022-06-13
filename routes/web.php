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

$router->get('/state', 'StateController@getAllState');
$router->get('/state/{id}', 'StateController@getIdState');
$router->delete('/state/{id}', 'StateController@destroyStates');
$router->post('/state/new', 'StateController@createStates');
$router->put('/state/update/{id}', 'StateController@updateStates');

$router->get('/city', 'StateController@getAllState');
$router->get('/city/{id}', 'StateController@getIdState');
$router->delete('/city/{id}', 'StateController@destroyStates');
$router->post('/city/new', 'StateController@createStates');
$router->put('/city/update/{id}', 'StateController@updateStates');

$router->get('/students', 'StudentController@getAllStudent');
$router->get('/students/{id}', 'StudentController@getIdStudent');
$router->delete('/students/{id}', 'StudentController@destroy');
$router->post('/students/new', 'StudentController@createStudent');
$router->put('/students/update/{id}', 'StudentController@update');

