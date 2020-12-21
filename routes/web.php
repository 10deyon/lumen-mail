<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

$router->post('/image', 'Image64Controller@getImage');
    // $base64_image = "data:image/jpeg;base64, blahblahablah";

    // if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
    //     $data = substr($base64_image, strpos($base64_image, ',') + 1);

    //     $data = base64_decode($data);
    //     Storage::disk('local')->put("test.png", $data);

    //     dd("stored");
    // }

    // $validator = Request->file;

    // $image_64 = $validator['photo']; //your base64 encoded data
    // // $image_64 = "photo"; //your base64 encoded data

    // $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

    // $replace = substr($image_64, 0, strpos($image_64, ',') + 1);

    // // find substring from replace here eg: data:image/png;base64,

    // $image = str_replace($replace, '', $image_64);

    // $image = str_replace(' ', '+', $image);

    // $imageName = Str::random(10) . '.' . $extension;

    // Storage::disk('public')->put($imageName, base64_decode($image));

    // dd('Stored');

$router->get('xender-mail', 'MailController@mail2');
$router->get('xender', 'MailController@mail');
