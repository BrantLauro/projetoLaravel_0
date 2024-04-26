<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    </head>

    <body>

        @yield('main');

    </body>
    <script>
        @if (session('message'))
            alert("{{ session('message') }}");
        @endif
    </script>
</html>