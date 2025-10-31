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
