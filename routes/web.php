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
$router->group(['prefix'=>'v1','namespace'=>'Api'],function()use ($router){
    $router->post('order', 'OrderController@order');
    $router->post('createcollections', 'CollectionsController@create');

});


$router->get('/', function () use ($router) {
    return $router->app->version();
});
