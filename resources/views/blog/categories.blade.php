<x-app-layout>
    @slot('header')
        <div class="flex justify-end lg:items-center">
            <h2 class="font-bold text-xl text-gray-900 leading-tight mr-2 hidden lg:flex">
                {{ __('Blog de Ismael') }}
            </h2>
            <div class="flex">
                <form action="{{ route('post_search') }}" method="POST">
                    @csrf
                    <x-jet-input type="search" placeholder="Buscar..." name="search">

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
        <!-- component -->
        <div class="max-w-screen-2xl mx-auto">
           @if ($posts->count())
           <main class="mt-10">
            {{-- Dos post destacados --}}
            <div class="block md:flex md:space-x-2 px-2 lg:p-0">
                <a class="mb-4 md:mb-0 w-full md:w-2/3 relative rounded inline-block" style="height: 24em;"
                    href="{{route('show',['post'=>$post_1])}}">
                    <div class="absolute left-0 bottom-0 w-full h-full z-10"
                        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                    <img src="{{$post_1->image}}"
                        class="absolute left-0 top-0 w-full h-full rounded z-0 object-cover" />
                    <div class="p-4 absolute bottom-0 left-0 z-20">
                        <span
                            class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{$post_1->category->title}}</span>
                        <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                           {{$post_1->title}}.
                        </h2>
                        <div class="flex mt-3">
                            <img src="https://res.cloudinary.com/dboafhu31/image/upload/v1624813664/avatar-icon-png-105-images-in-collection-page-3-avatarpng-512_512_djffio.png"
                                class="h-10 w-10 rounded-full mr-2 object-cover" />
                            <div>
                                <p class="font-semibold text-gray-200 text-sm"> {{$post_1->autor->name}} </p>
                                <p class="font-semibold text-gray-400 text-xs"> {{substr($post_1->updated_at,0,16)}} </p>
                            </div>
                        </div>
                    </div>
                </a>

                <a class="w-full md:w-1/3 relative rounded hidden lg:inline" style="height: 24em;"
                    href="{{route('show',['post'=>$post_2])}}">
                    <div class="absolute left-0 top-0 w-full h-full z-10"
                        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                    <img src="{{$post_2->image}}"
                        class="absolute left-0 top-0 w-full h-full rounded z-0 object-cover" />
                    <div class="p-4 absolute bottom-0 left-0 z-20">
                        <span
                            class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{$post_2->category->title}}</span>
                        <h2 class="text-3xl font-semibold text-gray-100 leading-tight">{{$post_2->title}}.</h2>
                        <div class="flex mt-3">
                            <img src="https://res.cloudinary.com/dboafhu31/image/upload/v1624813664/avatar-icon-png-105-images-in-collection-page-3-avatarpng-512_512_djffio.png"
                                class="h-10 w-10 rounded-full mr-2 object-cover" />
                            <div>
                                <p class="font-semibold text-gray-200 text-sm"> {{$post_2->autor->name}} </p>
                                <p class="font-semibold text-gray-400 text-xs"> {{substr($post_2->updated_at,0,16)}} </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            {{-- Fin de los dos post --}}


            <div class="block lg:flex lg:space-x-2 px-2 lg:p-0 mt-10 mb-10">
                <!-- post cards -->
                <div class="w-full lg:w-2/3 h-full ">
                    {{$posts->links()}}
                    @foreach ($posts as $post)
                    @livewire('blog-card', ['post'=>$post])
                    @endforeach


                </div>

                <!-- Barra de la derecha -->
                <div class="w-full lg:w-1/3 px-3">
                    <!-- Temas destacados -->
                    <div class="mb-4">
                        <h5 class="font-bold text-lg uppercase text-gray-700 px-1 mb-2"> Temas destacados </h5>
                        <ul>
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
                    <div class="border border-dotted"></div>
                    @foreach ($services as $service)
                        @livewire('service-card', ['service' => $service])
                    @endforeach


                </div>

            </div>
            </main>
           @else
           @livewire('lost-page')
            @endif
            <!-- main ends here -->

            <!-- footer -->
            @if (Auth::check())
                <a href="{{ route('insert') }}"
                    class="w-12 h-12 rounded-full bg-red-500 fixed right-2 inset-y-1/2 flex items-center justify-center text-2xl z-30">
                    <span class="fas fa-plus text-white"></span>
                </a>
            @endif
        </div>
        <script>
            $(document).ready(function() {

            })
        </script>
    </div>
</x-app-layout>
