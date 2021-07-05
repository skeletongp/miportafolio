<x-app-layout>
    @slot('header')
        <div class="flex justify-end lg:items-center">
            <h2 class="font-bold text-xl text-gray-900 uppercase leading-tight mr-2 hidden lg:flex">
                {{ $post->title }}
            </h2>
            <div class="flex">
                <form action="{{ route('post_search') }}" method="POST">
                    @csrf
                    <x-jet-input type="search" placeholder="Buscar..." name="search" required>

                    </x-jet-input>
                    <x-jet-button><span class="fas fa-search"></span></x-jet-button>
                </form>
            </div>
        </div>
    @endslot
    @slot('title')
        Blog
    @endslot
    <div class="pt-16 lg:pt-24 space-y-2 h-full flex-1 flex-1 justify-center w-full">
        
            @slot('og')
            <meta property="og:image" content="{{ $post->image }}">
            <meta property="og:title" content="{{$post->title}}" />
            <meta property="og:description" content="{{$post->extract}}" />
            @endslot
      
        <!-- component -->
        <div class="max-w-screen-2xl mx-auto">
           <main class="mt-10">
            


            <div class="block lg:flex lg:space-x-2 px-2 lg:p-0 mt-10 mb-10">
                <!-- post cards -->
                <div class="w-full lg:w-2/3 h-full ">
                    <h1 class="font-bold uppercase  text-xl lg:text-4xl sticky">{{$post->title}}</h1>
                    
                    @livewire('post-card', ['post'=>$post, 'views'=>$views->count(), 'is_view'=>$is_view])


                </div>

                <!-- Barra de la derecha -->
                <div class="w-full lg:w-1/3 px-3 bg-red-100 bg-opacity-40">
                    <!-- Temas destacados -->
                    <h5 class="font-bold text-lg uppercase text-gray-700 px-1 mb-2"> Temas destacados </h5>

                    <div class="mb-4 ">
                        <ul class="">
                           @foreach ($topics as $topic)
                           <li
                           class="px-1 py-4 border-b border-t border-white hover:border-gray-200 transition duration-300">
                           <a href="#" class="flex items-center text-gray-600 cursor-pointer">
                               <span class="inline-block h-4 w-4 bg-green-300 mr-3"></span>
                               {{$topic->title}}
                               <span class="text-gray-500 ml-auto">{{$topic->posts->count()}} posts</span>
                               <i class='text-gray-500 bx bx-right-arrow-alt ml-1'></i>
                           </a>
                       </li>
                           @endforeach

                        </ul>
                    </div>
                    {{-- Fin de los temas destacados --}}
                    <!-- divider -->
                    <div class="border border-dotted "></div>
                   <div class="overflow-auto" style="max-height: 46rem">
                        @foreach ($services as $service)
                        @livewire('service-card', ['service' => $service])
                    @endforeach
                   </div>


                </div>

            </div>
            </main>
          
            <!-- main ends here -->

            <!-- footer -->
            @if (Auth::check())
                <a href="{{ route('insert') }}"
                    class="w-8 h-8 rounded-full bg-red-500 fixed right-2 inset-y-3/4 flex items-center justify-center text-xl z-30">
                    <span class="fas fa-plus text-white"></span>
                </a>
                <a href="{{route('update',['post'=>$post])}}"
                    class="w-8 h-8 rounded-full bg-blue-500 fixed right-2 inset-y-2/4 flex items-center justify-center text-xl z-30">
                    <span class="fas fa-pen text-white"></span>
                </a>
            @endif
        </div>
        <script>
            $(document).ready(function() {

            })
        </script>
        <style>
             ::-webkit-scrollbar {
                display: none;
            }
        </style>
    </div>
</x-app-layout>