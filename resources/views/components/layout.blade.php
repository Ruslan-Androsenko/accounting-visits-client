<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ url('/css/styles.css') }}" />
        <script src="{{ url('/js/jquery.js') }}"></script>
        <script src="{{ url('/js/jquery.maskedinput.min.js') }}"></script>
        <script src="{{ url('/js/scripts.js') }}"></script>

        <title>{{ $title ?? 'Todo Manager'  }}</title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="/employee/">Список сотрудников</a></li>
                    <li><a href="/employee/create/">Создать сотрудника</a></li>
                </ul>
            </nav>
        </header>

        <div class="content-wrapper">
            <h1>{{ $title ?? 'Todo Manager'  }}</h1>
            {{ $slot }}
        </div>

        <footer>

        </footer>
    </body>
</html>
