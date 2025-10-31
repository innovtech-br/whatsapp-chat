<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Atendimento CorbanSys') }}</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Optional custom styles --}}
    <style>
        body {
            background-color: #f8f9fa;
        }
        .chat-container {
            height: 80vh;
            overflow-y: auto;
        }
        .message-bubble {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 15px;
            max-width: 75%;
            word-break: break-word;
        }
        .from-me {
            background-color: #0d6efd;
            color: white;
        }
        .from-them {
            background-color: #e9ecef;
        }
    </style>
    {{-- Scripts do Echo + Pusher (necessários para Reverb) --}}
<script src="https://cdn.jsdelivr.net/npm/pusher-js@8.3.0/dist/web/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.16.1/dist/echo.iife.js"></script>

<script>
    window.Echo = new Echo({
        broadcaster: 'reverb',
        key: "{{ env('REVERB_APP_KEY') }}",
        wsHost: "{{ env('REVERB_HOST') }}",
        wsPort: {{ env('REVERB_PORT', 443) }},
        wssPort: {{ env('REVERB_PORT', 443) }},
        forceTLS: true,
        disableStats: true,
        enabledTransports: ['wss'],
    });

    Echo.channel('chat.559181482346@s.whatsapp.net')
        .listen('NewChatMessage', (e) => {
            console.log('Nova mensagem recebida:', e);
            const container = document.querySelector('.chat-container');
            const div = document.createElement('div');
            div.className = 'mb-2 text-start';
            div.innerHTML = `<span class="message-bubble from-them">${e.message}</span>`;
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        });
</script>




</head>

<body>
    <nav class="navbar navbar-dark bg-primary mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">💬 Atendimento CorbanSys</a>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
