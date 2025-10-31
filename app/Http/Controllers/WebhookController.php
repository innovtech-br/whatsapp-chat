<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function receive(Request $request)
    {
        Log::info('Webhook recebido:', $request->all());

        $data = $request->all();

        if (isset($data['messages'])) {
            foreach ($data['messages'] as $msg) {
                $from = $msg['from'] ?? 'desconhecido';
                $text = $msg['text'] ?? 'sem texto';
                Log::info("Mensagem de {$from}: {$text}");
            }
        }

        return response()->json(['status' => 'ok']);
    }
}
