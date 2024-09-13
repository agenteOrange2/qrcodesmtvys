<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SMTVYS Scann QRCode</title>
    <!-- favicon -->
    <link href="{{ asset('img/smtvys-favicon.png') }}" rel="shortcut icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('build/css/frontend.css') }}">
    @vite('resources/css/app.css') <!-- Aquí se cargan los estilos que configuraste en Vite -->
</head>

<body class="antialiased">

    <nav class="navbar" id="navbar">
        <div class="container relative flex flex-wrap items-center justify-between">
            <a class="navbar-brand md:me-8" href="{{route('welcome')}}">
                <img src="{{ asset('img/logo_smtvys.png') }}" class="h-5 inline-block dark:hidden" alt="">
                <img src="{{ asset('img/logo_smtvys.png') }}" class="h-5 hidden dark:inline-block" alt="">
            </a>            
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto bg-gray-100">
                        <path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="#FF2D20"/>
                    </svg>
            <div class="nav-icons flex items-center lg_992:order-2 md:ms-6">
                <!-- Navbar Button -->
                <ul class="list-none menu-social mb-0">
                    <li class="inline">
                        <a href=""
                            class="size-8 inline-flex items-center justify-center rounded-full align-middle bg-red-500/10 hover:bg-blue-700 text-blue-700 hover:text-white"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-user size-4">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg></a>
                    </li>


                    @if (Route::has('login'))
                        <li class="inline">
                            @auth
                                <a href="{{ route('admin.dashboard') }}"
                                    class="h-8 px-4 text-[12px] tracking-wider inline-flex items-center justify-center font-medium rounded-full bg-blue-700 text-white uppercase">Dashboard</a>
                            @else
                                <a href="{{ url('/login') }}"
                                    class="h-8 px-4 text-[12px] tracking-wider inline-flex items-center justify-center font-medium rounded-full bg-blue-700 text-white uppercase">Iniciar
                                    Sesión</a>
                                @if (Route::has('register'))
                                    <a href="{{ url('/login') }}"
                                        class="h-8 px-4 text-[12px] tracking-wider inline-flex items-center justify-center font-medium rounded-full bg-blue-700 text-white uppercase">Registrar</a>
                                @endif


                            @endauth
                        </li>
                    @endif
                </ul>
                <!-- Navbar Collapse Manu Button -->
                <button data-collapse="menu-collapse" type="button"
                    class="collapse-btn inline-flex items-center ms-2 text-slate-900 dark:text-white lg_992:hidden"
                    aria-controls="menu-collapse" aria-expanded="false">
                    <span class="sr-only">Navigation Menu</span>
                    <i class="mdi mdi-menu text-[24px]"></i>
                </button>
            </div>

            <!-- Navbar Manu -->
            <div class="navigation lg_992:order-1 lg_992:flex hidden ms-auto" id="menu-collapse">
                <ul class="navbar-nav" id="navbar-navlist">
                    <li class="nav-item active">
                        <a class="nav-link active" href="#home">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Proximamente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Start -->
    <section
        class="relative overflow-hidden md:py-36 py-24 bg-slate-50/50 dark:bg-slate-800/20 bg-[url('../../assets/images/bg1.html')] bg-no-repeat bg-center bg-cover"
        id="home">
        <div class="container relative">
            <div class="grid md:grid-cols-2 grid-cols-1 items-center mt-6 gap-[30px] relative">
                <div class="md:me-6">
                    <h6 class="text-blue-700 uppercase text-sm font-bold tracking-wider mb-3">SMTVYS APP</h6>
                    <h4 class="font-bold lg:leading-normal leading-normal text-[42px] lg:text-[54px] mb-5">SMTVYS Scan App</h4>
                    <p class="text-slate-400 text-lg max-w-xl">Plataforma enfocada en capturar datos mediante un código QR, Generar QR para poder compartir con los conocidos o bien para compartir las redes de manera mas intuitiva</p>

                    <div class="mt-6">
                        <a href="#"><img src="assets/images/app.png" class="h-12 inline-block m-1"
                                alt=""></a>
                        <a href="#"><img src="assets/images/play.png" class="h-12 inline-block m-1"
                                alt=""></a>
                    </div>
                </div>

                <div class="relative">
                    <img src="{{ asset('img/mockup_app.png') }}" class="mx-auto w-80 rotate-12 relative z-2"
                        alt="">
                    <div
                        class="overflow-hidden absolute md:size-[500px] size-[400px] bg-gradient-to-tl to-blue-500/20 via-blue-700/70 from-blue-700 bottom-1/2 translate-y-1/2 md:start-0 start-1/2 ltr:md:translate-x-0 ltr:-translate-x-1/2 rtl:md:translate-x-0 rtl:translate-x-1/2 z-1 shadow-md shadow-red-500/10 rounded-full">
                    </div>

                    <div
                        class="overflow-hidden after:content-[''] after:absolute after:size-16 after:bg-blue-500/20 after:top-0 after:end-6 after:z-1 after:rounded-lg after:animate-[spin_10s_linear_infinite]">
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->


    <!-- Inicio -->
    <section class="relative md:py-24 py-16" id="features">
        <div class="container relative">
            <div class="grid grid-cols-1 pb-6 text-center">
                <h6 class="text-blue-700 uppercase text-sm font-bold tracking-wider mb-3">Características</h6>
                <h4 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-bold">Descubre Poderosas
                    Funcionalidades</h4>

                <p class="text-slate-400 max-w-xl mx-auto">Desata el poder de nuestra plataforma con una multitud de
                    funciones poderosas, permitiéndote lograr tus objetivos.</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-6 gap-6">
                <div
                    class="p-6 hover:shadow-xl hover:shadow-slate-100 dark:hover:shadow-slate-800 transition duration-500 rounded-3xl">
                    <div
                        class="size-16 bg-red-500/5 text-blue-700 rounded-2xl flex align-middle justify-center items-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-maximize size-5">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg>
                    </div>

                    <div class="content mt-7">
                        <a href="#"
                            class="text-lg hover:text-blue-700 dark:text-white dark:hover:text-blue-700 transition-all duration-500 ease-in-out font-semibold">Totalmente
                            funcional</a>
                        <p class="text-slate-400 mt-3">El generador de códigos QR es completamente funcional y
                            personalizable para tus necesidades.</p>

                        <div class="mt-3">
                            <a href="#"
                                class="hover:text-blue-700 dark:hover:text-blue-700 after:bg-red-500 dark:text-white transition duration-500">Leer
                                más <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!--end content-->

                <div class="p-6 shadow-xl shadow-slate-100 dark:shadow-slate-800 transition duration-500 rounded-3xl">
                    <div
                        class="size-16 bg-red-500/5 text-blue-700 rounded-2xl flex align-middle justify-center items-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-pie-chart size-5">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                            <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                        </svg>
                    </div>

                    <div class="content mt-7">
                        <a href="#"
                            class="text-lg hover:text-blue-700 dark:text-white dark:hover:text-blue-700 transition-all duration-500 ease-in-out font-semibold">Datos
                            seguros</a>
                        <p class="text-slate-400 mt-3">Tus datos están protegidos con medidas de seguridad y cifrado de
                            primer nivel.</p>

                        <div class="mt-3">
                            <a href="#"
                                class="hover:text-blue-700 dark:hover:text-blue-700 after:bg-red-500 dark:text-white transition duration-500">Leer
                                más <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!--end content-->

                <div
                    class="p-6 hover:shadow-xl hover:shadow-slate-100 dark:hover:shadow-slate-800 transition duration-500 rounded-3xl">
                    <div
                        class="size-16 bg-red-500/5 text-blue-700 rounded-2xl flex align-middle justify-center items-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-navigation-2 size-5">
                            <polygon points="12 2 19 21 12 17 5 21 12 2"></polygon>
                        </svg>
                    </div>

                    <div class="content mt-7">
                        <a href="#"
                            class="text-lg hover:text-blue-700 dark:text-white dark:hover:text-blue-700 transition-all duration-500 ease-in-out font-semibold">Seguimiento
                            de ubicación</a>
                        <p class="text-slate-400 mt-3">Rastrea fácilmente el origen y destino de los datos capturados a
                            través de códigos QR.</p>

                        <div class="mt-3">
                            <a href="#"
                                class="hover:text-blue-700 dark:hover:text-blue-700 after:bg-red-500 dark:text-white transition duration-500">Leer
                                más <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!--end content-->

                <div class="p-6 shadow-xl shadow-slate-100 dark:shadow-slate-800 transition duration-500 rounded-3xl">
                    <div
                        class="size-16 bg-red-500/5 text-blue-700 rounded-2xl flex align-middle justify-center items-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-database size-5">
                            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                        </svg>
                    </div>

                    <div class="content mt-7">
                        <a href="#"
                            class="text-lg hover:text-blue-700 dark:text-white dark:hover:text-blue-700 transition-all duration-500 ease-in-out font-semibold">Análisis
                            de datos</a>
                        <p class="text-slate-400 mt-3">Genera información valiosa al analizar los datos capturados a
                            través de códigos QR.</p>

                        <div class="mt-3">
                            <a href="#"
                                class="hover:text-blue-700 dark:hover:text-blue-700 after:bg-red-500 dark:text-white transition duration-500">Leer
                                más <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6">
                <div class="lg:col-span-5 md:col-span-6">
                    <div class="pt-6 px-6 rounded-2xl bg-red-500/5 dark:bg-red-500/10 shadow shadow-red-500/20">
                        <img src="{{ asset('img/mock_up_proximamente.png') }}" alt="Mockup SMTVYS">
                    </div>
                </div><!--end grid-->

                <div class="lg:col-span-7 md:col-span-6">
                    <div class="lg:ms-10">
                        <h6 class="text-blue-700 uppercase text-sm font-bold tracking-wider mb-3">Personalizable</h6>
                        <h4 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-bold">Trabaja más
                            rápido con <br> Herramientas poderosas</h4>
                        <p class="text-slate-400 max-w-xl">Desata el poder de nuestra plataforma con una multitud de
                            funciones poderosas, permitiéndote lograr tus objetivos.</p>

                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-6">
                            <div
                                class="group flex relative overflow-hidden p-6 rounded-md shadow dark:shadow-gray-800 bg-slate-50/50 dark:bg-slate-800/20 hover:bg-red-500 dark:hover:bg-red-500 duration-500">
                                <span class="text-blue-700 group-hover:text-white text-5xl font-semibold duration-500">
                                    <i data-feather="shield" class="size-8 mt-2"></i>
                                </span>
                                <div class="flex-1 ms-3">
                                    <h5 class="group-hover:text-white text-lg font-semibold duration-500">Mejora la
                                        seguridad</h5>
                                    <p class="text-slate-400 group-hover:text-white/50 duration-500 mt-2">Asegura todos
                                        los datos capturados a través de interacciones con códigos QR con cifrado de
                                        primer nivel.</p>
                                </div>
                                <div
                                    class="absolute start-1 top-5 text-slate-900/[0.02] dark:text-white/[0.03] text-8xl group-hover:text-white/[0.1] duration-500">
                                    <i data-feather="shield" class="size-24"></i>
                                </div>
                            </div>

                            <div
                                class="group flex relative overflow-hidden p-6 rounded-md shadow dark:shadow-gray-800 bg-slate-50/50 dark:bg-slate-800/20 hover:bg-red-500 dark:hover:bg-red-500 duration-500">
                                <span class="text-blue-700 group-hover:text-white text-5xl font-semibold duration-500">
                                    <i data-feather="aperture" class="size-8 mt-2"></i>
                                </span>
                                <div class="flex-1 ms-3">
                                    <h5 class="group-hover:text-white text-lg font-semibold duration-500">Alto
                                        rendimiento</h5>
                                    <p class="text-slate-400 group-hover:text-white/50 duration-500 mt-2">Disfruta de
                                        capacidades de generación y escaneo de códigos QR ultrarrápidas.</p>
                                </div>
                                <div
                                    class="absolute start-1 top-5 text-slate-900/[0.02] dark:text-white/[0.03] text-8xl group-hover:text-white/[0.1] duration-500">
                                    <i data-feather="aperture" class="size-24"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="#"
                                class="hover:text-blue-700 dark:hover:text-blue-700 after:bg-blue-500 dark:text-white transition duration-500 font-medium">Aprender
                                más <i class="mdi mdi-arrow-right align-middle"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Fin -->



    <!-- Start Footer -->
    <footer class="py-8 bg-slate-800 dark:bg-gray-900">
        <div class="container">
            <div class="grid md:grid-cols-12 items-center">
                <div class="md:col-span-3">
                    <a href="#" class="logo-footer">
                        <img src="assets/images/logo-light.png" class="md:ms-0 mx-auto" alt="">
                    </a>
                </div>

                <div class="md:col-span-5 md:mt-0 mt-8">
                    <div class="text-center">
                        <p class="text-gray-400">©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> SMTVYS. Diseño y Desarrollado por <i class="mdi mdi-heart text-red-700"></i>
                            <a href="https://kuiraweb.com" target="_blank" class="text-reset">Kuiraweb</a>.
                        </p>
                    </div>
                </div>

                <div class="md:col-span-4 md:mt-0 mt-8">
                    <ul class="list-none foot-icon ltr:md:text-right rtl:md:text-left text-center">
                        <li class="inline"><a href="https://1.envato.market/appever" target="_blank"
                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-700 hover:border-red-500 rounded-md text-slate-300 hover:text-white hover:bg-red-500"><i
                                    data-feather="shopping-cart" class="h-4 w-4 align-middle"
                                    title="Buy Now"></i></a></li>
                        <li class="inline"><a href="https://dribbble.com/shreethemes" target="_blank"
                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-700 hover:border-red-500 rounded-md text-slate-300 hover:text-white hover:bg-red-500"><i
                                    data-feather="dribbble" class="h-4 w-4 align-middle" title="dribbble"></i></a>
                        </li>
                        <li class="inline"><a href="http://linkedin.com/company/shreethemes" target="_blank"
                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-700 hover:border-red-500 rounded-md text-slate-300 hover:text-white hover:bg-red-500"><i
                                    data-feather="linkedin" class="h-4 w-4 align-middle" title="Linkedin"></i></a>
                        </li>
                        <li class="inline"><a href="https://www.facebook.com/shreethemes" target="_blank"
                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-700 hover:border-red-500 rounded-md text-slate-300 hover:text-white hover:bg-red-500"><i
                                    data-feather="facebook" class="h-4 w-4 align-middle" title="facebook"></i></a>
                        </li>
                        <li class="inline"><a href="https://www.instagram.com/shreethemes/" target="_blank"
                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-700 hover:border-red-500 rounded-md text-slate-300 hover:text-white hover:bg-red-500"><i
                                    data-feather="instagram" class="h-4 w-4 align-middle" title="instagram"></i></a>
                        </li>
                        <li class="inline"><a href="https://x.com/shreethemes" target="_blank"
                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-700 hover:border-red-500 rounded-md text-slate-300 hover:text-white hover:bg-red-500"><i
                                    data-feather="twitter" class="h-4 w-4 align-middle" title="twitter"></i></a></li>
                        <li class="inline"><a href="mailto:support@shreethemes.in"
                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-700 hover:border-red-500 rounded-md text-slate-300 hover:text-white hover:bg-red-500"><i
                                    data-feather="mail" class="h-4 w-4 align-middle" title="email"></i></a></li>
                    </ul><!--end icon-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </footer><!--end footer-->
    <!-- End Footer -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 h-9 w-9 text-center bg-red-500 text-white leading-9"><i
            class="mdi mdi-arrow-up"></i></a>
    <!-- Back to top -->

    <!-- LTR & RTL Mode Code -->
    <div class="fixed top-1/3 -right-3 z-50">
        <a href="#" id="switchRtl">
            <span
                class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold rtl:block ltr:hidden">LTR</span>
            <span
                class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold ltr:block rtl:hidden">RTL</span>
        </a>
    </div>
    <!-- LTR & RTL Mode Code -->

    <script src="{{ asset('build/js/app.js') }}"></script>
</body>

</html>
