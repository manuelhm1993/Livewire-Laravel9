<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Fontawesome -->
        <link href="{{ asset('vendor/fontawesome-free-6.4.2-web/css/fontawesome-all.min.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        {{-- Pilas, útiles para definir estilos y scripts --}}
        @stack('css')
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        {{-- Pilas, útiles para definir estilos y scripts --}}
        @stack('js')

        {{-- Escuchar un evento desde un script normal lanzado desde un componente --}}
        <script>
            // Recibe el mensaje de feedback desde la fuente del evento
            Livewire.on('feedbackSA2', (title, feedback) => {
                Swal.fire(
                    title,
                    feedback,
                    'success'
                );
            });
        </script>
    </body>
</html>
