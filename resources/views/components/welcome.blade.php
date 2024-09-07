<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Bienvendio a SCANQR SMTVYS
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        Con SMTVYS SCANNQR, escanear y generar códigos QR nunca ha sido tan fácil. Ya sea que necesites acceder a un
        enlace, compartir información de contacto o crear códigos personalizados para tus eventos, nuestra aplicación te
        ofrece una solución rápida y eficiente. ¡Empieza ahora y descubre la comodidad de tener toda la información al
        alcance de tu cámara!
    </p>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <!-- Escanear Usuarios -->
    <div>
        <div class="flex items-center">
            <svg class="w-6 h-6 stroke-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25M16.5 6.75l1.5 1.5M21 12h-2.25M16.5 17.25l1.5-1.5M12 21v-2.25M7.5 17.25l-1.5-1.5M3 12h2.25M7.5 6.75l-1.5-1.5M12 6.75l.75.75-.75.75-.75-.75.75-.75zM12 16.5l.75-.75-.75-.75-.75.75.75.75z" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                <a href="/admin/scan">Escanear Usuarios</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
            Inicia el escáner de códigos QR para capturar la información de los usuarios durante el evento o convención. 
            Escanea rápidamente y almacena los datos de manera eficiente.
        </p>

        <p class="mt-4 text-sm">
            <a href="/admin/scan" class="inline-flex items-center font-semibold text-indigo-700">
                Comenzar a Escanear

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="ms-1 w-5 h-5 fill-indigo-500" stroke-width="1.5">
                    <path fill-rule="evenodd"
                        d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <!-- Captura de Datos -->
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                <a href="/admin/usuarios-capturados">Capturar Usuarios</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
            Visualiza y administra la lista de usuarios escaneados y capturados durante el evento. Asegúrate de que toda la información capturada esté disponible y sea gestionada correctamente.
        </p>

        <p class="mt-4 text-sm">
            <a href="/admin/usuarios-capturados" class="inline-flex items-center font-semibold text-indigo-700">
                Ver Usuarios Capturados

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500">
                    <path fill-rule="evenodd"
                        d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <!-- Crear Usuarios (Solo para Administrador) -->
    @can('roles', App\Models\User::class) 
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                <a href="/admin/users/create">Crear Usuario</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
            Añade nuevos usuarios manualmente para eventos, conferencias o convenciones. Permite una fácil creación y gestión de participantes.
        </p>

        <p class="mt-4 text-sm">
            <a href="/admin/users/create" class="inline-flex items-center font-semibold text-indigo-700">
                Crear Usuario

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500">
                    <path fill-rule="evenodd"
                        d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>
    @endcan

    <!-- Próximamente -->
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v12m3-3h6M9 12H3" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                Próximamente
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
            Estamos trabajando en nuevas funcionalidades para mejorar tu experiencia en la gestión de eventos. ¡Mantente atento a las próximas actualizaciones!
        </p>
    </div>
</div>
