<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <h1>Escanear Código QR</h1>
                    <div id="reader" style="width: 500px"></div>
                </div>
            </div>
        </div>
    </div>    

    @push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function onScanSuccess(decodedText, decodedResult) {
                console.log(`Resultado del escaneo: ${decodedText}`, decodedResult);
                html5QrcodeScanner.clear();
            }

            function onScanError(errorMessage) {
                console.error(`Error de escaneo: ${errorMessage}`);
            }

            // Crear el escáner QR usando la librería importada
            var html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", { fps: 10, qrbox: 250 });

            html5QrcodeScanner.render(onScanSuccess, onScanError);
        });
    </script>
    @endpush
</x-app-layout>
