<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>{{ config('lab2.title') }}</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 20px auto; padding: 0 15px; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f4f4f4; }
        label { display: block; margin: 8px 0 4px; }
        input, button { padding: 6px 10px; }
        .error { color: red; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('catalog.index') }}">Головна</a> |
        <a href="{{ route('catalog.about') }}">Про застосунок</a>
    </nav>
    <hr>
    @yield('content')
</body>
</html>
