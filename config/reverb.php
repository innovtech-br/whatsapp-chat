<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Reverb Applications
    |--------------------------------------------------------------------------
    |
    | Configure as credenciais e permissões para o servidor Reverb.
    |
    */

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

    /*
    |--------------------------------------------------------------------------
    | Servidor Reverb
    |--------------------------------------------------------------------------
    |
    | Configura o servidor WebSocket usado para broadcast.
    | Caso use HTTPS, mantenha o scheme = 'https' e porta 443.
    |
    */

    'server' => [
        'host' => env('REVERB_HOST', '0.0.0.0'),
        'port' => env('REVERB_PORT', 8080),
        'scheme' => env('REVERB_SCHEME', 'https'),
    ],

];
