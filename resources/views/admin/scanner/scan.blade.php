<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Escanear Código QR</h1>
                <div class="container text-center">
                    <div class="box-scanner">
                        <div id="reader" class="mx-auto p-4 rounded-lg shadow-md"
                            style="height: 80vh; align-content:center;">
                        </div>
                    </div>
                    <div id="qr-result" class="mt-4  p-4 bg-gray-100 rounded-lg shadow-md hidden">
                        <h2 class="text-xl font-bold text-blue-800">Información Escaneada:</h2>

                        <div id="scanned-info" class="mt-4 w-full">
                            <!-- Datos escaneados -->
                            <div class="mb-4">
                                <label for="nombre" class="block mb-2 text-sm font-bold text-blue-900">Nombre:</label>
                                <input type="text" id="nombre"
                                    class="mb-6 bg-white border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                                    value="" disabled>
                            </div>

                            <div class="mb-4">
                                <label for="apellidos"
                                    class="block mb-2 text-sm font-bold text-blue-900">Apellidos:</label>
                                <input type="text" id="apellidos"
                                    class="mb-6 bg-white border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                                    value="" disabled>
                            </div>

                            <div class="mb-4">
                                <label for="puesto" class="block mb-2 text-sm font-bold text-blue-900">Puesto:</label>
                                <input type="text" id="puesto"
                                    class="mb-6 bg-white border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                                    value="" disabled>
                            </div>

                            <!-- Información escaneada adicional -->
                            <div class="mb-4">
                                <label for="empresa"
                                    class="block mb-2 text-sm font-bold text-blue-900">Empresa:</label>
                                <input type="text" id="empresa"
                                    class="mb-6 bg-white border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                                    value="" disabled>
                            </div>

                            <div class="mb-4">
                                <label for="telefono"
                                    class="block mb-2 text-sm font-bold text-blue-900">Teléfono:</label>
                                <input type="text" id="telefono"
                                    class="mb-6 bg-white border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                                    value="" disabled>
                            </div>

                            <div class="mb-4">
                                <label for="correo" class="block mb-2 text-sm font-bold text-blue-900">Correo:</label>
                                <input type="text" id="correo"
                                    class="mb-6 bg-white border border-blue-800 font-semibold text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                                    value="" disabled>
                            </div>

                            <!-- Campos adicionales generados dinámicamente -->
                            <div id="additional-fields" class="mb-4">
                                <!-- Se llenarán dinámicamente los campos adicionales aquí -->
                            </div>

                            <!-- Checkboxes para las marcas -->
                            <!-- Checkboxes para las marcas -->
                            <div class="mt-4">
                                <h3 class="text-lg font-bold text-blue-800">Seleccione las Marcas</h3>
                                <div class="grid grid-cols-1 gap-4 py-4">
                                    @foreach ($marcas as $marca)
                                        <div class="flex items-center">
                                            <input type="checkbox" id="marca_{{ $marca->id }}" name="marcas[]"
                                                value="{{ $marca->id }}"
                                                class="mr-2 focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                            <label for="marca_{{ $marca->id }}"
                                                class="text-sm font-medium text-gray-700">{{ $marca->nombre }}</label>
                                        </div>
                                        <!-- Campo adicional oculto -->
                                        <div id="custom_field_{{ $marca->id }}" class="hidden mt-2">
                                            <label for="campo_marca_{{ $marca->id }}"
                                                class="block text-sm font-bold text-blue-900">
                                                Campo adicional para {{ $marca->nombre }}:
                                            </label>
                                            <textarea id="campo_marca_{{ $marca->id }}" name="campo_marca_{{ $marca->id }}" rows="2"
                                                class="block w-full p-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                                        </div>
                                        <hr class="mt-6 border-b-1 border-blueGray-300">
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <!-- Textarea para datos adicionales -->
                        <label for="additional-info" class="block text-left mt-4 text-blue-800 font-bold">Datos
                            adicionales:</label>
                        <textarea id="additional-info" rows="4"
                            class="block p-2.5 pb-5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ingrese los datos adicionales por favor"></textarea>
                        <div class="py-3">
                            <button id="send-button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
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

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let scanCount = 1;
                let lastScannedCode = ''; // Para almacenar el último código escaneado

                function resetFields() {
                    // Limpiar todos los campos de entrada
                    const campos = ['nombre', 'apellidos', 'puesto', 'empresa', 'telefono', 'rol', 'correo'];
                    campos.forEach(campo => {
                        const input = document.getElementById(campo);
                        if (input) input.value = '';
                    });

                    document.getElementById('additional-fields').innerHTML = ''; // Limpiar los campos adicionales
                    const additionalInfo = document.getElementById('additional-info');
                    if (additionalInfo) additionalInfo.value = ''; // Limpiar el campo de info adicional

                    document.getElementById('qr-result').classList.add('hidden'); // Ocultar la sección de resultado

                    // Limpiar los campos de marcas adicionales
                    const customFields = document.querySelectorAll('[id^="custom_field_"]');
                    customFields.forEach(field => {
                        field.classList.add('hidden');
                        field.querySelector('textarea').value = ''; // Limpiar el campo de texto
                    });

                    // Desmarcar todos los checkboxes de marcas
                    const checkboxes = document.querySelectorAll('input[name="marcas[]"]');
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = false;
                    });
                }

                function handleCheckboxChange(id) {
                    const customField = document.getElementById(`custom_field_${id}`);
                    if (customField) {
                        // Mostrar u ocultar el campo personalizado basado en si el checkbox está seleccionado
                        const checkbox = document.getElementById(`marca_${id}`);
                        if (checkbox && checkbox.checked) {
                            customField.classList.remove('hidden');
                        } else {
                            customField.classList.add('hidden');
                            customField.querySelector('textarea').value =
                                ''; // Limpiar el campo de texto cuando se deselecciona
                        }
                    }
                }

                function bindCheckboxEvents() {
                    // Vincular el evento change para los checkboxes
                    const checkboxes = document.querySelectorAll('input[name="marcas[]"]');
                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            handleCheckboxChange(checkbox.value);
                        });
                    });
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
                    const campos = ['nombre', 'apellidos', 'puesto', 'empresa', 'telefono', 'rol', 'correo'];
                    campos.forEach((campo, index) => {
                        const input = document.getElementById(campo);
                        if (input) input.value = data[campo];
                    });

                    // Limpiar los campos adicionales anteriores
                    let additionalFieldsContainer = document.getElementById('additional-fields');
                    if (additionalFieldsContainer) {
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
                    }

                    const qrResult = document.getElementById('qr-result');
                    if (qrResult) {
                        qrResult.classList.remove('hidden'); // Mostrar la sección de resultado
                    }

                    // Esperar a que el botón "Enviar Información" esté disponible y agregar el evento "click"
                    const sendButton = document.getElementById('send-button');
                    if (sendButton) {
                        sendButton.addEventListener('click', function() {
                            // Agregar el valor del textarea de datos adicionales a los campos adicionales
                            let additionalInfo = document.getElementById('additional-info').value;
                            if (additionalInfo) {
                                data.campos_adicionales.push(
                                    additionalInfo); // Agregarlo a los campos adicionales
                            }

                            // Agregar los campos personalizados por cada marca seleccionada
                            const selectedMarcas = document.querySelectorAll('input[name="marcas[]"]:checked');
                            selectedMarcas.forEach(checkbox => {
                                const marcaId = checkbox.value;
                                const customField = document.getElementById(`campo_marca_${marcaId}`)
                                    .value;
                                data[`marca_${marcaId}_custom_field`] =
                                    customField; // Agregar campo personalizado de la marca
                            });

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
                                            title: 'Usuario ya registrado',
                                            text: json.error,
                                            showCancelButton: true,
                                            confirmButtonText: 'Editar Información',
                                            cancelButtonText: 'Cerrar'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Redirigir a la página de edición con el ID correcto
                                                window.location.href =
                                                    `/admin/usuarios-capturados/${json.existingScanId}/edit`;
                                            }
                                        });
                                    } else {
                                        // Mostrar alerta de éxito si todo salió bien
                                        Swal.fire({
                                            icon: 'success',
                                            title: '¡Éxito!',
                                            text: json.message
                                        }).then(() => {
                                            resetFields(); // Limpiar los campos después del envío
                                            lastScannedCode =
                                                ''; // Permitir escanear otro código QR
                                        });
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        }, {
                            once: true
                        }); // El { once: true } asegura que el evento solo se ejecute una vez
                    }
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

                // Vincular eventos de checkboxes cuando la página esté lista
                bindCheckboxEvents();
            });
        </script>
    @endpush


</x-app-layout>
