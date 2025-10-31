@extends('layouts.default')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        Chat com {{ $chatId }}
    </div>

    {{-- Corpo do chat --}}
    <div class="card-body chat-container bg-light">
        @foreach ($messages as $msg)
            <div class="mb-2 {{ $msg->from_me ? 'text-end' : 'text-start' }}">
                <span class="message-bubble {{ $msg->from_me ? 'from-me' : 'from-them' }}">
                    {{ $msg->message }}
                </span>
            </div>
        @endforeach
    </div>

    {{-- Campo de envio --}}
    <div class="card-footer bg-white border-top">
        <form method="POST" action="{{ route('chat.send') }}">
            @csrf
            <input type="hidden" name="chat_id" value="{{ $chatId }}">

            <div class="input-group">
                <input type="text" name="message" class="form-control" placeholder="Digite sua mensagem..." required>
                <button class="btn btn-primary" type="submit">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
