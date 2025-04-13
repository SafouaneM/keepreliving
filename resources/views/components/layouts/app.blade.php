<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="h-full antialiased scroll-smooth">
    @auth
        <livewire:dashboard.sidebar/>
    @endauth
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
         <main class="ml-64 mx-auto max-w-3xl px-4">
            {{ $slot }}
         </main>
        </div>
        <livewire:toast />
    </body>
</html>
