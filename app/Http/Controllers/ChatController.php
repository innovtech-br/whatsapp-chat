<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        // para simplificar, carrega todas as mensagens de um contato específico
        $messages = ChatMessage::where('chat_id', '559181482346@s.whatsapp.net')
            ->orderBy('id', 'asc')
            ->get();

        return view('chat.index', compact('messages'));
    }
}
