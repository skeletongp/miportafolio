<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta property="og:site_name" content="Ismael Digitador" />
    @if (isset($og))
    {{$og}}
    
    @else
    <meta property="og:image" content="{{ asset('logo.png') }}">
    <meta property="og:title" content="Ismael Digitador" />
    <meta property="og:description" content="Digitador profesional y asesor académico, con dominio en programación y manejo de múltiples herramientas tecnológicas. Consejos para la productividad" />
    @endif
    
    <meta property="og:url" content="http://ismaeldigitador.com/">
    <meta property="og:type" content="educacion" />
    <title>{{ $title . ' | Ismael Digitador' }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/menu.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles

    <!-- Scripts -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/menu.js') }}" defer></script>
</head>

<body class="font-sans antialiased bg-cover bg-top bg-fixed" style="background-image:url('')">
    <x-jet-banner />

    <div class="min-h-screen ">
     

        <!-- Page Heading -->
        @if (isset($header))
            <header class="shadow ">
                @livewire('navigation-menu')
                <div class=" px-4 mx-auto {{Str::contains(Request::url(), 'blog')?'py-3':'py-6'}} px-4 sm:px-6 lg:px-8 text-right bg-cover bg-top fixed w-full z-30 flex justify-end"
                    style="background-image:url('https://images.unsplash.com/photo-1470811976196-8ee4fa278c5d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1053&q=80')">
                    {{ $header }}
                   
                </div>
            </header>
        @endif
        <!-- Page Content -->
        <main>
            {{ $slot }}
            <div class="flex fixed  bottom-2 right-1">
                <a href="https://api.whatsapp.com/send?phone=18493153337&text=." target="_blank"
                    class="tracking-wider text-green-600 bg-white border-2 border-green-600 px-3 py-1 text-xs lg:text-sm rounded leading-loose mx-2 font-semibold"
                    title="WhatsApp">
                    <i class="fab fa-whatsapp" aria-hidden="true"></i> WhatsApp
                </a>

                <a href="https://www.facebook.com/Ismael-Digitador-105508274847069" target="_blank"
                    class="tracking-wider text-blue-600 bg-white border-2 border-blue-600 px-3 py-1 text-xs lg:text-sm rounded leading-loose mx-2 font-semibold"
                    title="Facebook">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i> Facebook
                </a>

                <a href="https://www.linkedin.com/in/ismael-contreras-michel-77b190211/" target="_blank"
                    class="tracking-wider text-blue-600 bg-white border-2 border-blue-600 px-3 py-1 text-xs lg:text-sm rounded leading-loose mx-2 font-semibold"
                    title="LinkedInd">
                    <i class="fab fa-linkedin-in" aria-hidden="true"></i> LinkedIn
                </a>
            </div>
            <div class="fixed right-1 top-24 lg:top-28 blog-div z-20">
                <a href="{{ route('blog') }}"
                    class="tracking-wider text-red-600 bg-white border-2 border-blue-600 px-1 py-1 text-xl lg:text-2xl rounded leading-loose mx-2 font-bold"
                    title="LinkedInd">
                    <i class="fas fa-blog mr-0" aria-hidden="true"></i> <span class="blog-text">Blog</span>
                </a>
                
            </div>

            @if (Auth::check())
            <div class="fixed right-4 inset-y-1/3  h-16  blog-div z-40">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                        <span class="fas fa-sign-out-alt text-2xl"></span>
                    </button>
                </form>
            </div>
           
            @endif
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <style>
        .blog-text {
            font-size: 0;
            margin-left: -5px;
            transition: all 0.5s linear;
        }

        .blog-div:hover .blog-text {
            font-size: 1.2rem;
        }

    </style>
    
</body>

</html>
