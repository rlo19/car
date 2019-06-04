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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function() use ($router) {

    //users
    $router->group(['prefix' => 'users'], function() use ($router) {

        $router->get('/', 'UserController@showAll');
        $router->get('/{id}', 'UserController@show');

        $router->post('/create', 'UserController@create'); 
        $router->post('/{id}', 'UserController@update');       
    });

    //cars
    $router->group(['prefix' => 'cars'], function() use ($router) {

        $router->get('/', 'CarController@showAll');             
        $router->get('/', 'CarController@show'); 
        $router->get('/{id}', 'CarController@show');  

        $router->post('/create', 'CarController@create'); 
        $router->post('/{id}', 'CarController@update');   
    });
    

    //rentals
    $router->group(['prefix' => 'rentals'], function() use ($router) {

        $router->get('/', 'RentalController@showAll');  
        $router->post('/create', 'RentalController@create');   
    });

});
