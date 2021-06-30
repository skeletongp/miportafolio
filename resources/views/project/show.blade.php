<x-app-layout>
    @slot('header')
        <h2 class="font-bold text-xl text-gray-900 leading-tight">
            <a href="{{ route('projects') }}">Proyectos</a>
        </h2>
    @endslot
    @slot('title')
        Proyectos
    @endslot
    <div class="pt-16 lg:pt-20 space-y-2 h-full flex-1 ">
        <div class="container lg:flex">
            
            <div class="header py-3 bg-cover relative ">
               
                <h1 class="text-lg lg:text-3xl font-bold hidden lg:flex">{{ $project->longname }}
                </h1>
                <div class="flex lg:block items-center lg:space-y-4 text-center">
                    <img src="{{ $project->image }}" class="w-20 h-20 lg:w-96 lg:h-96 lg:mx-auto rounded-full ">
                    <p class="font-bold text-lg lg:text-3xl"> {{ $project->shortname }}</p>
                </div>
                <div class=" bottom-0 mb-2 lg:top-0 lg:mt-4 text-xl lg:text-4xl select-none">
                    @livewire('modal-fotos', ['images' => $project->images])
                </div>
            </div>

            <div class="content">
                <div class="text px-4 lg:px-8">
                    <h1 class="font-bold text-xl lg:text-2xl mb-2 lg:mb-4">{{ $project->shortname }}</h1>
                    {!! $project->description !!}

                </div>

            </div>

        </div>
        @if (Auth::check())
            <a href="{{ route('project_insert') }}"
                class="w-8 h-8 rounded-full bg-red-500 fixed right-2 inset-y-3/4 flex items-center justify-center text-xl z-30">
                <span class="fas fa-plus text-white"></span>
            </a>
        @endif
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap');


            * {
                box-sizing: border-box;
            }

            .container {
                background-color: #ffffff;
                -webkit-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
                -moz-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
                box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
                height: 90vh;
                width: 90vw;
                margin: auto;
            }

            .header {
                background-color: rgb(11, 30, 46);
                color: #ffffff;
                display: flex;
                flex: 3;
                flex-direction: column;
                justify-content: space-evenly;
                padding: 1rem;
            }

            .header h1 {
                position: relative;
            }

            .header h1::after {
                background-color: #EECDA3;
                content: '';
                position: absolute;
                bottom: -10px;
                left: 0;
                height: 6px;
                width: 30%;
            }

            ::-webkit-scrollbar {
                display: none;
            }

            .content {
                background-color: #ffffff;
                flex: 4;
                padding: 1% 2% 3% 2%;
                position: relative;
                max-height: 100%;
                overflow: hidden;
            }

            .text {
                overflow: scroll;
                height: 100%;
                color: #616161;
            }

            .text p {
                margin-bottom: 1.15rem;
                line-height: 1.75rem
            }

            .info {
                background-color: #ffffff;
                padding: 2%;
                position: absolute;
                width: 100%;
                bottom: 0;
                left: 0;
            }

            .info a {
                color: #464646;
                text-decoration: none;
            }

            @media screen and (max-width: 800px) {
                .blog-container {
                    flex-direction: column;
                    height: auto;
                }

                .content {
                    max-height: 55vh;
                    overflow: auto;
                }
                .header{
                    width: 80vw !important;
                    margin: auto;
                }
            }

        </style>
    </div>
</x-app-layout>
