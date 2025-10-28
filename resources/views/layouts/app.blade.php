<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Cargar estilos/JS con Vite (Tailwind incluido en resources/css/app.css) --}}
    @vite(['resources/css/app.css', 'resources/js/app.tsx'])

    @stack('preload')
    @stack('styles')
    @yield('head')
</head>
<body class="min-h-screen bg-gray-50 text-gray-900 antialiased @yield('body_class')">
    @yield('body_start')

    <header class="bg-red-400 border-b border-gray-200">
        <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Primary">
            <div class="flex h-16 items-center justify-between">
                <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-900 hover:text-gray-700">{{ config('app.name', 'Laravel') }}</a>
                <div class="flex items-center gap-6">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900 transition-colors">Home</a>
                    <a href="{{ url('/empleados') }}" class="text-gray-700 hover:text-gray-900 transition-colors">Lista de empleados</a>
                </div>
            </div>
        </nav>
    </header>

    <main id="app" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    @yield('body_end')
    @stack('scripts')
</body>
</html>