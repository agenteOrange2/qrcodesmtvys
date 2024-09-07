<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-8">
            <div class="flex space-x-2 py-3 justify-end" x-data="{ open: false }">                
                <a href="{{ route('admin.users.create') }}"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Crear Nuevo Usuario
                </a>

                <a href="{{ route('admin.roles.index') }}"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Ver Roles
                </a>
            </div>
            <div class="overflow-hidden shadow-xl sm:rounded-lg p-8">                                
                <livewire:users-table />
            </div>
        </div>
    </div>
</x-app-layout>
