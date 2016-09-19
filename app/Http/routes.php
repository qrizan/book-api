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


$app->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@getUser']);

$app->get('/category', 'CategoryController@index');
$app->post('/category/create', 'CategoryController@create');	
$app->get('/category/{id}', 'CategoryController@read');
$app->post('/category/update/{id}', 'CategoryController@update');
$app->get('/category/delete/{id}', 'CategoryController@delete');

$app->get('/book', 'BookController@index');
$app->post('/book/create', 'BookController@create');
$app->get('/book/{id}', 'BookController@read');
$app->post('/book/update/{id}', 'BookController@update');
$app->get('/book/delete/{id}', 'BookController@delete');
