<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-8">
            <div class="flex justify-between heading py-5">
                <h1 class="text-2xl font-extrabold text-gray-800">Editar Marca</h1>
                <a href="{{ route('admin.marcas.index') }}"
                   class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Volver
                </a>
            </div>

            <form action="{{ route('admin.marcas.update', $marca->id) }}" class="space-y-6" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div x-data="{
                    files: null,
                    previewUrl: null,
                    existingImage: '{{ $marca->imagen ? asset('storage/' . $marca->imagen) : '' }}',
                    removeImage: false,
                    updatePreview() {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.previewUrl = e.target.result;
                        }
                        reader.readAsDataURL(this.files[0]);
                        this.removeImage = false; // Si elige una nueva imagen, no eliminar la actual
                    },
                    clearPreview() {
                        this.files = null;
                        this.previewUrl = null;
                        this.removeImage = true; // Marcar la imagen para eliminar
                    }
                }" class="relative border-2 border-dashed border-gray-300 rounded-lg p-6">

                    <!-- Input para subir la imagen -->
                    <input type="file" name="imagen" 
                        class="absolute inset-0 w-full h-full opacity-0 z-50 cursor-pointer"
                        @change="files = $event.target.files; updatePreview()" accept="image/*">
                    
                    <!-- Mensaje inicial si no hay una imagen seleccionada -->
                    <div class="text-center" x-show="!previewUrl && !existingImage">
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

                    <!-- Vista previa de la nueva imagen seleccionada -->
                    <div x-show="previewUrl" class="mt-2">
                        <img :src="previewUrl" alt="Vista previa de la imagen" class="mx-auto max-h-48 rounded-lg">
                    </div>

                    <!-- Mostrar la imagen existente si no se ha seleccionado una nueva -->
                    <div x-show="!previewUrl && existingImage && !removeImage" class="relative mt-2">
                        <img :src="existingImage" alt="Imagen actual" class="mx-auto max-h-48 rounded-lg">
                        <!-- Botón para quitar la imagen -->
                        <button type="button" class="absolute top-0 right-0 bg-red-600 text-white p-1 rounded-full" @click="clearPreview()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <!-- Input oculto para manejar la eliminación de la imagen actual -->
                    <input type="hidden" name="remove_image" :value="removeImage">
                </div>
                
                <div class="space-y-2">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la marca</label>
                    <input type="text" id="nombre" name="nombre" value="{{ $marca->nombre }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            
                <div class="space-y-2">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $marca->descripcion }}</textarea>
                </div>

                <div class="flex justify-end">
                    <x-button>
                        Actualizar Marca
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
