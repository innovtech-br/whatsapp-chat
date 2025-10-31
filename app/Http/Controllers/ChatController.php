<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Services\WuzApiService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chatId = '559181482346@s.whatsapp.net';

        $messages = ChatMessage::where('chat_id', $chatId)
            ->orderBy('id', 'asc')
            ->get();

        return view('chat.index', compact('messages', 'chatId'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'chat_id' => 'required|string',
            'message' => 'required|string|max:2000',
        ]);

        // Normaliza o número (remove @s.whatsapp.net)
        $phone = str_replace('@s.whatsapp.net', '', $request->chat_id);

        // Envia via serviço
        $wuz = new WuzApiService();
        $wuz->sendText($phone, $request->message);

        // Salva no banco
        ChatMessage::create([
            'chat_id' => $request->chat_id,
            'sender'  => 'me',
            'message' => $request->message,
            'from_me' => true,
            'sent_at' => now(),
        ]);

        return redirect()->route('chat.index');
    }
}
