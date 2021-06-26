<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$title." | Ismael Digitador" }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/menu.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 

        @livewireStyles

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ mix('js/menu.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-cover bg-top bg-fixed" style="background-image:url('https://images.unsplash.com/photo-1566041510394-cf7c8fe21800?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80')">
        <x-jet-banner />

        <div class="min-h-screen ">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="shadow ">
                    <div class=" px-4 mx-auto py-6 px-4 sm:px-6 lg:px-8 text-right bg-cover bg-top fixed w-full z-30"  style="background-image:url('https://images.unsplash.com/photo-1470811976196-8ee4fa278c5d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1053&q=80')">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
                <div class="flex fixed x-20 bottom-2 right-1">
                    <a href="https://wa.me/message/VRCUBIBSD5RRN1" target="_blank"
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
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
