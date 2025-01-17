<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de viagens</title>
        <!-- Styles /   Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                {!! Vite::content('resouces/css/app.css')!!}
            </style>
        @endif
    </head>
<body>
    @yield('content')
</body>
</html>

