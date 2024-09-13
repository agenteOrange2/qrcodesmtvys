<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Escanear Código QR</h1>
                <div class="container text-center">
                    <div class="box-scanner">
                        <div id="reader" class="mx-auto  p-4  rounded-lg shadow-md"
                            style="height: 80vh; align-content:center;">
                        </div>
                    </div>
                    <div id="qr-result" class="mt-4  p-4 bg-gray-100 rounded-lg shadow-md hidden">
                        <h2 class="text-xl font-bold text-blue-800">Información Escaneada:</h2>
                        {{-- <ul id="scanned-info" class="mt-2 text-gray-700 list-none mx-auto" style="width: 500px; text-align: left;">                            
                        </ul> --}}

                        <div id="scanned-info" class="mt-4 w-full">
                            <div class="mb-4">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-bold text-blue-900  md:text-left sm:text-center">Nombre:</label>
                                <input type="text" id="nombre" aria-label="disabled input"
                                    class="mb-6 text-center md:text-left bg-gray-100 border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="Disabled input" disabled>
                            </div>

                            <div class="mb-4">
                                <label for="apellidos"
                                    class="block mb-2 text-sm font-bold text-blue-900 md:text-left sm:text-center">Apellidos:</label>
                                <input type="text" id="apellidos" aria-label="disabled input"
                                    class="mb-6 text-center md:text-left bg-gray-100 border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="Disabled input" disabled>
                            </div>

                            <div class="mb-4">
                                <label for="puesto"
                                    class="block mb-2 text-sm font-bold text-blue-900 md:text-left sm:text-center">Puesto:</label>
                                <input type="text" id="puesto" aria-label="disabled input"
                                    class="mb-6 text-center md:text-left bg-gray-100 border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="Disabled input" disabled>
                            </div>

                            <div class="mb-4">
                                <label for="empresa"
                                    class="block mb-2 text-sm font-bold text-blue-900 md:text-left sm:text-center">Empresa:</label>
                                <input type="text" id="empresa" aria-label="disabled input"
                                    class="mb-6 text-center md:text-left bg-gray-100 border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="Disabled input" disabled>
                            </div>

                            <div class="mb-4">
                                <label for="telefono"
                                    class="block mb-2 text-sm font-bold text-blue-900 md:text-left sm:text-center">Teléfono:</label>
                                <input type="text" id="telefono" aria-label="disabled input"
                                    class="mb-6 text-center md:text-left bg-gray-100 border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="Disabled input" disabled>
                            </div>

                            <div class="mb-4">
                                <label for="rol"
                                    class="block mb-2 text-sm font-bold text-blue-900 md:text-left sm:text-center">Rol:</label>
                                <input type="text" id="rol" aria-label="disabled input"
                                    class="mb-6 text-center md:text-left bg-gray-100 border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="Disabled input" disabled>
                            </div>

                            <div class="mb-4">
                                <label for="correo"
                                    class="block mb-2 text-sm font-bold text-blue-900 md:text-left sm:text-center">Correo:</label>
                                <input type="text" id="correo" aria-label="disabled input"
                                    class="mb-6 text-center md:text-left bg-gray-100 border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="Disabled input" disabled>
                            </div>

                            <!-- Campos adicionales -->
                            <div id="additional-fields" class="mb-4">
                                <!-- Se llenarán dinámicamente los campos adicionales aquí -->
                            </div>
                        </div>


                        <!-- Textarea para datos adicionales -->
                        <label for="additional-info" class="block text-left mt-4 text-blue-800 font-bold">Datos
                            adicionales:</label>
                        <textarea id="additional-info" rows="4"
                            class="block p-2.5 pb-5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Ingrese los datos adicionales por favor"></textarea>
                        <div class="py-3">
                            <button id="send-button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Enviar Información
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let scanCount = 1;
                let lastScannedCode = ''; // Para almacenar el último código escaneado

                function resetFields() {
                    // Limpiar todos los campos de entrada
                    document.getElementById('nombre').value = '';
                    document.getElementById('apellidos').value = '';
                    document.getElementById('puesto').value = '';
                    document.getElementById('empresa').value = '';
                    document.getElementById('telefono').value = '';
                    document.getElementById('rol').value = '';
                    document.getElementById('correo').value = '';
                    document.getElementById('additional-fields').innerHTML = ''; // Limpiar los campos adicionales
                    document.getElementById('additional-info').value = ''; // Limpiar el campo de info adicional
                    document.getElementById('qr-result').classList.add('hidden'); // Ocultar la sección de resultado
                }

                function onScanSuccess(decodedText, decodedResult) {
                    // Si el nuevo código es igual al último escaneado, no hacemos nada
                    if (decodedText === lastScannedCode) {
                        return;
                    }

                    lastScannedCode = decodedText; // Actualizamos el último código escaneado

                    // Formateo del texto del QR usando delimitadores
                    let delimiters = ['^', '*', '-', '|'];
                    let delimiter = delimiters.find(d => decodedText.includes(d)) || '^';
                    let values = decodedText.split(delimiter);

                    // Si el primer valor es una cadena vacía, elimínalo
                    if (values[0] === '') {
                        values.shift();
                    }

                    let data = {
                        nombre: values[0],
                        apellidos: values[1] || '',
                        puesto: values[2] || '',
                        empresa: values[3] || '',
                        telefono: values[4] || '',
                        rol: values[5] || '',
                        correo: values[6] || '',
                        campos_adicionales: values.slice(7) // Inicia con los campos extra del QR
                    };

                    // Rellenar los campos de texto con los datos escaneados
                    document.getElementById('nombre').value = data.nombre;
                    document.getElementById('apellidos').value = data.apellidos;
                    document.getElementById('puesto').value = data.puesto;
                    document.getElementById('empresa').value = data.empresa;
                    document.getElementById('telefono').value = data.telefono;
                    document.getElementById('rol').value = data.rol;
                    document.getElementById('correo').value = data.correo;

                    // Limpiar los campos adicionales anteriores
                    let additionalFieldsContainer = document.getElementById('additional-fields');
                    additionalFieldsContainer.innerHTML = ''; // Limpiar los campos adicionales

                    // Agregar los campos adicionales si los hay
                    data.campos_adicionales.forEach((field, index) => {
                        let input = document.createElement('input');
                        input.type = 'text';
                        input.value = field;
                        input.disabled = true;
                        input.classList.add('w-full', 'p-2', 'border', 'rounded', 'mb-4');
                        additionalFieldsContainer.appendChild(input);
                    });

                    document.getElementById('qr-result').classList.remove('hidden'); // Mostrar la sección de resultado

                    // Acción del botón de enviar
                    document.getElementById('send-button').addEventListener('click', function() {
                        // Agregar el valor del textarea a los campos adicionales
                        let additionalInfo = document.getElementById('additional-info').value;
                        if (additionalInfo) {
                            data.campos_adicionales.push(additionalInfo); // Agregarlo a los campos adicionales
                        }

                        fetch('/admin/usuarios-capturados', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content')
                                },
                                body: JSON.stringify(data)
                            })
                            .then(response => response.json())
                            .then(json => {
                                if (json.error) {
                                    // Mostrar alerta de error si ya fue registrado
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: json.error
                                    });
                                } else {
                                    // Mostrar alerta de éxito si todo salió bien
                                    Swal.fire({
                                        icon: 'success',
                                        title: '¡Éxito!',
                                        text: json.message
                                    }).then(() => {
                                        resetFields(); // Limpiar los campos después del envío
                                        lastScannedCode = ''; // Permitir escanear otro código QR
                                    });
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    });
                }

                function onScanError(errorMessage) {
                    console.error(`Error de escaneo: ${errorMessage}`);
                }

                var html5QrcodeScanner = new Html5QrcodeScanner(
                    "reader", {
                        fps: 10,
                        qrbox: {
                            width: 250,
                            height: 250
                        },
                        verbose: true
                    }
                );

                html5QrcodeScanner.render(onScanSuccess, onScanError);

                // Añadir evento para limpiar todo al parar el escaneo
                document.querySelector(".stop-scanning-button").addEventListener("click", function() {
                    resetFields(); // Limpiar los campos cuando se detenga el escaneo
                });
            });
        </script>
    @endpush
</x-app-layout>
