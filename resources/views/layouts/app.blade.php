<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="flex min-h-screen flex-col bg-white font-sans text-slate-700 antialiased">
        <livewire:public.header />

        <main class="flex-1">
            {{ $slot }}
        </main>

        <livewire:public.footer />

        @livewireScripts
    </body>
</html>
