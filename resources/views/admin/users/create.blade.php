<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-8 py-6 bg-white ">

            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid gap-6 my-4 md:grid-cols-2">
                    <div class="profile_avatar flex justify-center relative">
                        <img class="rounded-full w-[50%]" src="{{ asset('img/profile_user.webp') }}" id="imgPreview"
                            alt="Extra small avatar">

                        <div class="input_file_box">
                            <div class="absolute top-8 right-8">
                                <label class="bg-white px-4 py-2 rounded-lg cursor-pointer">
                                    <i class="fa-solid fa-camera mr-2"></i>
                                    Actualizar imagen
                                    <input type="file" accept="image/*" name="image" class="hidden"
                                        onchange="previewImage(event, '#imgPreview')">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 rounded-lg mb-6 w-full max-w-lg">
                        <div class="mb-4">
                            <h3 class="mb-4 font-semibold text-gray-900 dark:text-gray-600">Roles</h3>
                            <ul
                            class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @foreach ($roles as $role)
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                            {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">

                                        <label for="vue-checkbox"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        </div>
                    </div>

                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="first_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Nombre</label>
                        <input type="text" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('name') }}"
                            placeholder="John"  />
                    </div>
                    <div>
                        <label for="last_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Apellidos</label>
                        <input type="text" name="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('last_name') }}"
                            placeholder="Doe"  />
                    </div>
                    <div>
                        <label for="position"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Posición</label>
                    <input type="text" name="position"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('position') }}"
                        placeholder="Ingeniero, Vendedor, Contratista"  />
                    </div>
                    <div>
                        <label for="company"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Empresa</label>
                        <input type="text" name="company"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('company') }}"
                            placeholder="Flowbite"  />
                    </div>
                    <div>
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Teléfono</label>
                        <input type="tel" name="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('phone') }}"
                            placeholder="123-45-678" />
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Email
                        </label>
                        <input type="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('email') }}"
                            placeholder="john.doe@company.com" />
                    </div>
                </div>
                <div class="mb-6">
                    <label for="website"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Sitio Web</label>
                <input type="text" name="website"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('website') }}"
                    placeholder="URl Sitio web"  />
                </div>
                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Contraseña</label>
                    <input type="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        
                        placeholder="•••••••••" />
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Confirmar
                        Contraseña</label>
                    <input type="password" name="password_confirmation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••"  />
                </div>

                <div class="mb-4 flex justify-end">
                    <label class="inline-flex items-center mb-5 cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" checked>
                        <span class="mr-3 text-md font-medium text-gray-900 dark:text-gray-600">Estatus</span>
                        <div
                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                    </label>
                </div>
                <div class="flex justify-end">
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        + Crear Usuario
                    </button>
                    <button
                        class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Discard
                    </button>
                </div>
            </form>
        </div>
    </div>


    @push('js')
        <script>
            /*Imagen Preview*/
            function previewImage(event, querySelector) {
                const input = event.target;
                const imgPreview = document.querySelector(querySelector);

                if (!input.files.length) return;

                const file = input.files[0];
                const objectURL = URL.createObjectURL(file);
                imgPreview.src = objectURL;
            }
        </script>
    @endpush
</x-app-layout>
