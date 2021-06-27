<x-app-layout>
    @slot('header')
        <h2 class="font-bold text-xl text-gray-900 leading-tight">
            {{ isset($categoria)? $categoria: __('Servicios')   }}
        </h2>
    @endslot
    @slot('title')
        Servicios
    @endslot

    <div class="pt-16 lg:pt-24 space-y-2 h-full flex-1 ">
        <div class="">
            <div class="w-11/12 lg:w-9/12 mx-auto flex-1 space-y-2 items-center justify-center  bg-blue-200 bg-opacity-20 mb-4"
                style="min-height: 40vh">
                <div class="md:flex md:items-center">
                    <div class="w-full h-64 md:w-1/2 lg:h-96">
                        <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{ $show->image }}"
                            alt="Nike Air">
                    </div>
                    <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                        <h3 class="text-gray-900 uppercase text-3xl font-bold">{{ $show->title }}</h3>
                        <span class="text-green-700 text-lg mt-3 font-bold">{{ $show->price }}</span>
                        <hr class="my-3">
                        <div class="mt-2 text-lg">
                            {{ $show->description }}
                        </div>
                        <div class="flex items-center mt-6">
                            <a href="https://api.whatsapp.com/send?phone=+18493153337&text=Saludos.%20Me%20interesa%20el%20servicio%20de%20{{$show->title}}"
                                class="px-8 py-2 bg-white text-blue-800 text-sm font-bold border-2 border-blue-800 rounded hover:bg-blue-200 focus:outline-none focus:bg-indigo-500">
                                SOLICITAR SERVICIO
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            @livewire('carrusel', ['object'=>App\Models\Service::all()])


            <div class="w-11/12 lg:w-8/12 mx-auto flex-1  pt-8 pb-16 items-center justify-center mb-4">
                <div class="flex lg:ml-8">
                    <div>
                        <x-jet-label for="category" class="text-lg">Categoría</x-jet-label>
                        <select name="category" id="category"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="">Todas</option>
                            <option value="academico" {{$slug=='academico'?'selected':''}}>Académico</option>
                            <option value="asesoria" {{$slug=='asesoria'?'selected':''}}>Asesoría</option>
                            <option value="programacion" {{$slug=='programacion'?'selected':''}}>Programación</option>
                        </select>
                    </div>
                </div>
                <div class="lg:grid grid-flow-row grid-cols-3 gap-2 mx-auto  relative pb-4">

                    @foreach ($services as $service)
                        @livewire('service-card', ['service' => $service], key($service->id))

                    @endforeach
                </div>
                <div class="w-11/12 lg:w-8/12">
                    {{ $services->links() }}
                </div>
            </div>

        </div>
        <script>
            $(document).ready(function() {
                $('#category').on('change',function(){
                    let type=$('#category').val();

                    let newUrl="<?php echo route('services');?>";
                    window.location.href=newUrl+'/'+type;
                })
            })
        </script>
    </div>
</x-app-layout>
