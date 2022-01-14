<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/index.js') }}" defer></script>
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <div id="root">
        <div class="container pt-64">
            <aside class="flex-column pr-24 w-17">
                <div class="square mb-56">
                    <img src="https://img.freepik.com/free-vector/mouse-mascot-logo-design_317408-45.jpg?size=338&ext=jpg" alt="">
                </div>
                <nav class="flex-grow pb-32">
                    <ul class="flex-column h-100">
                        <li><a href="" class="link py-8 is-active">Home</a></li>
                        <li><a href="" class="link py-8">Members</a></li>
                        <li><a href="" class="link py-8">Settings</a></li>
                        <li class="flex align-end flex-grow"><a href="" class="link py-8">Log out</a></li>
                    </ul>
                </nav>
            </aside>
            <div class="w-100">
                <header>
    
                </header>
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>
</html>
