<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="icon" href="{{ asset('pretobranco.png') }}?v={{ filemtime(public_path('pretobranco.png')) }}" type="image/png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
        <a href="/dashboard">Dashboard</a>
    </body>
</html>
