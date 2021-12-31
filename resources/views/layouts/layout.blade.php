<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
    <ul class="flex items-center justify-end pt-4 pr-2">
        @if (!Auth::user())
            <li class="ml-2 mr-2">
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li class="ml-2 mr-2">
                <a href="{{ route('register') }}">Register</a>
            </li>
        @else
            <li class="ml-2 mr-2">
                <a href="{{ route('workspace.index') }}">Workspaces</a>
            </li>
            <li class="ml-2 mr-2">
                <a href="{{ route('workspace.create') }}">Create workspace</a>
            </li>
            <li class="ml-2 mr-2">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="ml-2 mr-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @endif
    </ul>
    <main style="height: 100vh">
        {{ $slot }}
    </main>
</body>
</html>
