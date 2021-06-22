<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

$router->post('/sign-in', function (Request $request) {
    class Data  {
        public $password;
        public $email;
    }
    $status = 200;
    $message = "";

    $password = $request->input('password');
    $email = $request->input('email');

    // $response = new Response();
    $newData = new Data();

    if ($email && $password) {
        $status = 200;
        $message = "success";

        $newData->password = $password;
        $newData->email = $email;
    }

    if (!$email || !$password) {
        $status = 400;
        $message = "password or email is required";
        $data = $newData;
    }
    
    return response()->json([
        'status' => $status,
        'message' => $message,
        'data' => $newData
    ]);
});

