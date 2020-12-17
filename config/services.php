<?php 


// return [

//     'ses' => [
//         'driver' => 's3',
//         'key' => env('AWS_ACCESS_KEY_ID'),
//         'secret' => env('AWS_SECRET_ACCESS_KEY'),
//         'region' => env('AWS_DEFAULT_REGION', 'us-east-2'),
//         'version' => 'latest',
//     ],
// ];


return [
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],
];