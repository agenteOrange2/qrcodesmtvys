<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-8 bg-white p-6 shadow-xl">
            <div class="flex justify-between heading py-5" x-data="{ open: false }">
                <h1 class="text-2xl font-extrabold text-gray-800">Lista de Marcas</h1>
                <a href="{{ route('admin.marcas.create') }}"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Crear Nueva Marca
                </a>
            </div>            
            <div class="overflow-hidden  sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Descripción
                                </th>                                
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($marcas as $marca)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full" src="{{ $marca->imagen ? asset('storage/' . $marca->imagen) : asset('path/to/default-image.jpg') }}" alt="Imagen de Marca">                                    
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">{{ $marca->nombre }} </div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $marca->descripcion }}
                                    </td>                                    
                                    <td class="px-6 py-4">
                                        <!-- Modal toggle -->
                                        <a href="{{ route('admin.marcas.edit', $marca) }}" type="button"
                                            data-modal-target="editUserModal" data-modal-show="editUserModal"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar
                                        </a>

                                        <button onclick="deletePermission()">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b">
                                    <td colspan="5" class="px-6 py-4 text-center  bg-gray-700 text-white">No hay
                                        Marcas
                                        registradas.</td>
                                </tr>
                            @endforelse
                        </tbody>

                        <form action="{{ route('admin.marcas.destroy', $marca) }}" method="POST"
                            id="formDelete">
                            @csrf
                            @method('DELETE')
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        function deletePermission() {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('formDelete');
                    form.submit(); // Envía el formulario de eliminación
                }
            });
        }
    </script>
@endpush
</x-app-layout>
