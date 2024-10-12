<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-8">
            <div class="flex justify-between heading py-5">
                <h1 class="text-2xl font-extrabold text-gray-800">Nueva Marca</h1>
                <a href="{{ route('admin.marcas.index') }}"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Volver</a>
            </div>
            <form id="crearMarcaForm" class="space-y-6" action="{{ route('admin.marcas.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <x-validation-errors class="my-4" />

                <div x-data="{
                    files: null,
                    previewUrl: null,
                    updatePreview() {
                        const reader = new FileReader()
                        reader.onload = (e) => {
                            this.previewUrl = e.target.result
                        }
                        reader.readAsDataURL(this.files[0])
                    }
                }" class="relative border-2 border-dashed border-gray-300 rounded-lg p-6">
                    <!-- Asegúrate de agregar name="imagen" aquí -->
                    <input type="file" name="imagen"
                        class="absolute inset-0 w-full h-full opacity-0 z-50 cursor-pointer"
                        @change="files = $event.target.files; updatePreview()" accept="image/*">
                    <div class="text-center" x-show="!previewUrl">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                            viewBox="0 0 48 48" aria-hidden="true">
                            <path
                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="mt-1 text-sm text-gray-600">
                            Arrastra y suelta una imagen aquí, o haz clic para seleccionar una
                        </p>
                    </div>
                    <div x-show="previewUrl" class="mt-2">
                        <img :src="previewUrl" alt="Vista previa de la imagen" class="mx-auto max-h-48 rounded-lg">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la marca</label>
                    <input type="text" id="nombre" name="nombre" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="space-y-2">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                </div>

                <div class="flex justify-end">
                    <x-button>
                        Crear Marca
                    </x-button>
                </div>
            </form>

        </div>
    </div>


</x-app-layout>
