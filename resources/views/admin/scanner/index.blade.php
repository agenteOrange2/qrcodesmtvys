<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-8">

            <!-- Alerta estilizada -->
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    @if (Auth::user()->hasRole('Administrador'))
                        <span class="font-medium">Número total de escaneos realizados:</span> {{ $totalScanCount }}
                    @else
                        <span class="font-medium">Número de escaneos realizados por ti:</span> {{ $scanCount }}
                    @endif
                </div>
            </div>


            <!-- Exportar Usuarios -->
            <div class="flex space-x-2 py-3 justify-end" x-data="{ open: false }">
                <div class="flex space-x-2" x-data="{ open: false }">
                    <a href="{{ route('admin.usuarios-capturados.export') }}"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Exportar Usuarios
                    </a>
                </div>
            </div>

            <!-- Tabla de Livewire -->
            <div class="my-6">
                <livewire:qrscan-table />
            </div>
        </div>
    </div>


</x-app-layout>
