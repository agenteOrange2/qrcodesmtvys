<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Escanear Código QR</h1>
                <div class="container text-center">
                    <div class="box-scanner">
                    <div id="reader" class="mx-auto  p-4 border-2 border-gray-300 rounded-lg shadow-md"
                        style="width: 500px; height: auto;"></div>
                    </div>
                    <div id="qr-result" class="mt-4  p-4 bg-gray-100 rounded-lg shadow-md hidden">
                        <h2 class="text-xl font-bold">Información Escaneada:</h2>
                        <ul id="scanned-info" class="mt-2 text-gray-700 list-disc list-inside"></ul>

                        <!-- Textarea para datos adicionales -->
                        <label for="additional-info" class="block text-left mt-4 text-gray-700">Datos adicionales:</label>
                        <textarea id="additional-info" rows="4" class="w-full mt-2 p-2 border rounded"></textarea>

                        <button id="send-button" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg">Enviar
                            Información</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let scanCount = 1;

                function onScanSuccess(decodedText, decodedResult) {
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

                    let formattedInfo = [`Identificador: ${scanCount}`];
                    let fields = ['Nombre', 'Apellidos', 'Puesto', 'Empresa', 'Teléfono', 'Rol', 'Correo'];

                    fields.forEach((field, index) => {
                        if (values[index]) {
                            formattedInfo.push(`${field}: ${values[index]}`);
                        }
                    });

                    // Agregar campos adicionales si los hay
                    for (let i = fields.length; i < values.length; i++) {
                        formattedInfo.push(`Campo Adicional ${i - fields.length + 1}: ${values[i]}`);
                    }

                    scanCount++;

                    // Mostrar la información escaneada en la lista
                    let scannedInfoList = document.getElementById('scanned-info');
                    scannedInfoList.innerHTML = ''; // Limpiar la lista
                    formattedInfo.forEach(info => {
                        let li = document.createElement('li');
                        li.textContent = info;
                        scannedInfoList.appendChild(li);
                    });

                    document.getElementById('qr-result').classList.remove('hidden');

                    // Acción del botón de enviar
                    document.getElementById('send-button').addEventListener('click', function () {
                        // Agregar el valor del textarea a los campos adicionales
                        let additionalInfo = document.getElementById('additional-info').value;
                        if (additionalInfo) {
                            data.campos_adicionales.push(additionalInfo); // Agregarlo a los campos adicionales
                        }

                        fetch('/admin/usuarios-capturados', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
                                    // Redirigir a la lista de registros después del éxito
                                    window.location.href = '/admin/usuarios-capturados';
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
            });
        </script>
    @endpush
</x-app-layout>
