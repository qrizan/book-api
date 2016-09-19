<?php

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


$app->get('/', function () use ($app) {
    return response()->json([
        'success' => TRUE, 
        'message' => "Welcome to book web api!"
    ]);   	
});

$app->post('/login', 'LoginController@index');
$app->post('/register', 'UserController@register');

// resultoute using middlerware
$app->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@getUser']);