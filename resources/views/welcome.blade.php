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
