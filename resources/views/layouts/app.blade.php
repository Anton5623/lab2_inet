<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('lab2.title'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav>
        <a href="{{ route('catalog.index') }}">Головна</a> |
        <a href="{{ route('catalog.create') }}">Створити</a> |
        <a href="{{ route('catalog.about') }}">Про застосунок</a>
    </nav>

    @if (session('success'))
        <x-feedback.alert type="success">{{ session('success') }}</x-feedback.alert>
    @endif

    <main>
        @yield('content')
    </main>
</body>
</html>
