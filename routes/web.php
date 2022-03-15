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

$router->get('', ['uses' => 'AuthController@index']);
$router->post('otp', ['uses' => 'AuthController@otp']);
$router->post('otp/resend', ['uses' => 'AuthController@resendOtp']);
$router->post('token', ['uses' => 'AuthController@token']);

$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('token/check', ['uses' => 'AuthController@checkToken']);
});
