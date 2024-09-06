<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SMTVYS Scann QR Code') }}</title>
    <link href="{{asset('img/smtvys-favicon.png')}}" rel="shortcut icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/cc7eb48181.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Styles -->
    @livewireStyles

    @stack('css')
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>


    <!-- Botón flotante con contador de escaneos -->
    <div id="scan-counter" class="fixed bottom-4 right-4">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-full shadow-lg flex items-center">
            <span class="mr-2">
                <!-- Icono de escaneo (puedes usar Font Awesome o un SVG) -->
                <i class="fas fa-qrcode"></i>
            </span>
            <a href="{{ route('admin.usuarios-capturados.index') }}">
                <span>Escaneos: <span id="scan-count">{{ $scanCount }}</span></span>
            </a>
        </button>
    </div>

    @stack('modals')

    @livewireScripts
    @stack('js')
    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')))
        </script>
    @endif

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    


</body>

</html>
