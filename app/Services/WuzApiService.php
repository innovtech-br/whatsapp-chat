<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WuzApiService
{
    protected $token;
    protected $instance;

    public function __construct()
    {
        $this->token = env('WUZAPI_TOKEN');
        $this->instance = env('WUZAPI_INSTANCE');
    }

    /**
     * Envia uma mensagem de texto via WuzAPI
     */
    public function sendMessage($to, $message)
    {
        $url = "https://wuzapi.syscorban.com.br/api/{$this->instance}/message/sendText";

        return Http::withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->post($url, [
            'chatId' => "{$to}@s.whatsapp.net",
            'text' => $message,
        ]);
    }
}
