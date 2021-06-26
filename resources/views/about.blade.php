<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-900 leading-tight">
            {{ __('Sobre mí') }}
        </h2>
    </x-slot>
    @slot('title')
        Sobre Mí
    @endslot
    <div class="pt-16 lg:pt-20 space-y-2 h-full flex-1 ">
        <div class="">
            <div class="w-11/12 lg:w-9/12 mx-auto flex-1 space-y-2 items-center justify-center"
                style="min-height: 80vh">
                {{-- Presentación --}}
                <div
                    class="bg-white shadow-xl overflow-hidden rounded-xl py-8 px-8 lg:flex space-y-2 lg:space-y-0 w-11/12 lg:w-5/6 mx-auto">
                    <div class="lg:w-2/6 h-48 lg:h-96 flex items-center justify-center relative">
                        <div class="w-36 h-36 lg:w-72 lg:h-72 bg-cover rounded-full mb-4"
                            style="background-image:url('{{ asset('storage/ismael.png') }}')">

                        </div>
                        <h1 class="absolute font-bold text-center bottom-0 uppercase text-xl lg:text-4xl">Este Soy Yo
                        </h1>
                    </div>
                    <div class="lg:w-4/6 h-96 inline p-3">
                        <h2 class="text-lg lg:text-2xl">Me llamo <b>Ismael Contreras</b></h2>
                        <p class="text-lg">
                            Estudiante de <cite><b> Ingeniería de Software</b></cite><br>
                            Tengo @php
                                $fecha_nacimiento = new DateTime('1994-09-01');
                                $hoy = new DateTime();
                                $edad = $hoy->diff($fecha_nacimiento);
                                echo $edad->y;
                            @endphp
                            años de edad. <br>
                            Soy de Santo Domingo, Rep. Dominicana
                        </p>
                        <hr class="mt-2">
                        <p class="text-lg text-justify">
                            Me defino como una persona proactiva, a la que le gusta aprender cosas nuevas, innovar y
                            crecer intelectualmente. Me gustan las tecnologías y aprender cada día de ellas. Entre mis
                            pasatiempos se cuentan: la lectura, la programación, los videojuegos y las series
                            criminalistas.
                        </p> <br>
                        <p class="text-lg text-justify">
                            Quienes me conocen dicen que soy simpático, aunque muy estricto en cuanto al cumplimiento de
                            las reglas. Mis principios de trabajo se basan en la planificación de todo y el apego a las
                            normas establecidas. Mi frase de negocio: <cite><b>No hay mejor forma de agradecer un buen
                                    servicio, que la sincera recomendación a otros.</b></cite>
                        </p>
                    </div>
                </div>
                {{-- Fin de presentación --}}
                <div>
                    @livewire('tricard', [
                    'bigTitle' => 'Más sobre mí',
                    'bigImage' =>
                    'https://res.cloudinary.com/dboafhu31/image/upload/v1624718362/pexels-photo-698808_j6n0rm.jpg   ',
                    'title1' => 'Libro Favorito',
                    'title2' => 'Lenguaje Favorito',
                    'title3' => 'Serie Favorita',
                    'icon1' => 'fa fa-book',
                    'icon2' => 'fa fa-code',
                    'icon3' => 'fa fa-film',
                    'image1' => 'https://res.cloudinary.com/dboafhu31/image/upload/v1624715202/41Rd9WsT52L_m2yuzv.jpg',
                    'image2' =>
                    'https://res.cloudinary.com/dboafhu31/image/upload/v1624715303/0020_999_1618382081_php7_256_g4gt2e.png',
                    'image3' => 'https://res.cloudinary.com/dboafhu31/image/upload/v1624715413/dest_1_gbukdd.jpg',
                    ]
                    )
                </div>
            </div>
           
        </div>
    </div>
</x-app-layout>
