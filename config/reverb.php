<?php

return [

    'apps' => [
        [
            'id' => env('REVERB_APP_ID', 'corbansys'),
            'name' => env('APP_NAME', 'Atendimento CorbanSys'),
            'key' => env('REVERB_APP_KEY', 'localkey123'),
            'secret' => env('REVERB_APP_SECRET', 'localsecret123'),
            'enable_client_messages' => true,
            'enable_statistics' => true,
        ],
    ],

    'server' => [
        'host' => env('REVERB_HOST', '0.0.0.0'),
        'port' => env('REVERB_PORT', 8080),
        'scheme' => env('REVERB_SCHEME', 'https'),
    ],

];
