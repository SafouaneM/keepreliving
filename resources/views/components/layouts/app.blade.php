<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="h-full antialiased scroll-smooth">
        <main class="w-full min-h-[100vh]">
            {{ $slot }}
        </main>
        <x-toaster-hub />
    </body>
</html>
