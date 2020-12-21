<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Image64Controller extends Controller
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

    public function base64ToImage($base64_string, $output_file): bool
    {
        try {
            $file = fopen($output_file, "w+");

            $data = explode(',', $base64_string);

            fwrite($file, base64_decode($data[1]));
            fclose($file);
        } catch (Exception $e) {
            Log::info($e);
            return false;
        }

        return true;
    }

    public function getImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // "first_name" => "required|string",
            "photo" => "required"
            ]);
            
        if ($validator->fails()) return $validator->errors()->first();
        
        
        $requestedImage = 'data:image/jpeg;base64,' . '' . $request->photo; //your base64 encoded data
        $base64 = base64_encode($requestedImage);
        
        $allowed_mimes = ['data:image/jpeg;base64', 'data:image/png;base64'];
        $the_image = explode(',', $requestedImage);

        $mime = $the_image[0];
        $image = $the_image[1];
        $extension = explode("/", explode(":", explode(";", $requestedImage)[0]) [1]) [1];

        if(!in_array($mime, $allowed_mimes)) 
        {
            $response = [
                'status' => false,
                'message' => "Hacker ni e, jowo uploadu aworan ti o ni png, jpg, pdf, jpeg"
            ];
            return response()->json($response);
        }

        $imageName = 'image_' . time() . ".{$extension}";

        $uploads_dir = base_path('/storage/app/images');

        if (!$this->base64ToImage($requestedImage, "../public/images/{$imageName}")) {
        // if (!$this->base64ToImage($requestedImage, $uploads_dir . '/' . $imageName . $extension)) {
            Log::info("failed to convert file");
            return ("Failed to convert file");
        }

        $response = [
            'status' => true,
            'message' => 'Omo daadaa, o seun!'
        ];

        return response()->json($response);
    }
}
