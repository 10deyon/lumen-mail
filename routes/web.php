<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Mail;

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
// use Mail;
$router->get('/', function () use ($router) {
    // return $router->app->version();

    $to_name = "Emmanuel Musk";
    $to_mail = "imanueldeyon@gmail.com";
    $data = array("name" => "John Doe", "body" => "Test mail");
    Mail::send('mail', $data, function ($message) use ($to_name, $to_mail) {
        $message->to($to_mail, $to_name)
            ->subject('Welcome mail');
    });
});

$router->get('xender-mail' ,'MailController@mail2');
$router->get('xender' ,'MailController@mail');