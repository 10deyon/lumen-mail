<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function mail()
    {
        echo 'working';
    }


    public function mail2()
    {
        // dd('working');/
        Mail::to("imanueldeyon@gmail.com")->send(new OrderShipped("Ellon Musk", "$960.80"));
        echo "Email Sent. Check your inbox.";
        
        //
        // $data = array("name" => "John Doe", "body" => "Test mail");
        // Mail::send('emails.mail', $data, function ($message) {
            //     $message->to("imanueldeyon@gmail.com", "Imanuel Deyon")->subject("Test Mail from John Doe");
        //     $message->from("sundaysemako@gmail.com", "John Doe");
        // });


        //
        // $to_name = "Emmanuel Musk";
        // $to_mail = "imanueldeyon@gmail.com";
        // $data = array("name" => "John Doe", "body" => "Test mail");
        // Mail::send('mail', $data, function ($message) use ($to_name, $to_mail) {
        //     $message->to($to_mail, $to_name)
        //         ->subject('Welcome mail');
        // });
    }
}
