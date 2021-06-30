<x-app-layout>
    @slot('header')
        <h2 class="font-bold text-xl text-gray-900 leading-tight mr-2 ">
            {{ __('Nuevo Servicio') }}
        </h2>
    @endslot
    @slot('title')
        Nuevo Servicio
    @endslot
    <div class="pt-16 lg:pt-24 space-y-2 h-full flex-1 flex-1 justify-center w-full">
        <div class="max-w-4xl mx-auto shadow pb-8">
            <form action="{{ route('services_store') }}" method="POST" class="p-4 lg:p-8"
                enctype="multipart/form-data" autocomplete="off" id="form" name="form">
                @csrf
                <div class="lg:flex">
                    <div class="space-y-2 lg:w-2/3 lg:mx-2 mb-4 lg:mb-1">
                        <x-jet-label for="title" class="font-bold lg:text-xl">Nombre del servicio </x-jet-label>
                        <x-jet-input type="text" name="title" id="title" class="w-full" maxlength="100"
                            value="{{old('title')}}"></x-jet-input>
                        <x-jet-input-error for="title"></x-jet-input-error>
                    </div>
                    <div class="space-y-2 lg:w-1/3 lg:mx-2 mb-4 lg:mb-1 hidden">
                        <x-jet-label for="slug" class="font-bold lg:text-xl">Slug</x-jet-label>
                        <x-jet-input type="text" name="slug" id="slug" class="w-full" value="{{old('slug')}}" readonly
                            ></x-jet-input>
                        <x-jet-input-error for="slug"></x-jet-input-error>
                    </div>
                    <div class="space-y-2 lg:w-1/3 lg:mx-2 mb-4 lg:mb-1">
                        <x-jet-label for="price" class="font-bold lg:text-xl">Precio</x-jet-label>
                        <x-jet-input type="text" name="price" id="price" class="w-full"  value="{{old('price')}}">
                        </x-jet-input>
                        <x-jet-input-error for="price"></x-jet-input-error>
                    </div>
                </div>
                <div class="mt-3 lg:mx-2 mb-4 lg:mb-4">
                    <x-jet-label for="description" class="font-bold lg:text-xl">Descripción</x-jet-label>
                    <textarea
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                        name="description" maxlength="225">{{old('title')}}</textarea>
                    <x-jet-input-error for="description" class="mt-2"></x-jet-input-error>
                </div>


                <div class="lg:flex">
                    <div class="space-y-2 lg:w-2/4 lg:mx-2 mb-4 lg:mb-1">
                        <x-jet-label for="type_id" class="font-bold lg:text-xl">Categoría </x-jet-label>
                        <select name="type_id" id="type_id" 
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                            <option value=""></option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                            @endforeach

                        </select>
                        <x-jet-input-error for="type_id"></x-jet-input-error>
                    </div>
                    <div class="lg:w-2/4 lg:mx-2 mb-4 lg:mb-1 flex-1 items-center">
                        <x-jet-label for="slug" class="font-bold lg:text-xl mb-1">Imagen principal</x-jet-label>
                        <label for="image"
                            class="bg-gray-900 hover:bg-blue-light text-white font-bold py-2 px-4 w-full inline-flex items-center rounded-lg cursor-pointer">
                            <span class="fas fa-cloud-upload-alt text-xl"></span>
                            <span class="ml-2 text-lg uppercase" id="span_image">Subir imagen</span>
                        </label>
                        <input class="hidden" type="file" name="image" id="image" accept="image/*">
                        <x-jet-input-error for="image" class="mt-2"></x-jet-input-error>
                    </div>
                </div>
                <div class="mt-2 mb-4 pr-4 lg:pr-8 lg:mx-2 pl-4 lg:flex justify-end">

                    <x-jet-button type='submit' form="form" class="font-bold mt-4 lg:mt-0">
                        Guardar
                    </x-jet-button>
                </div>

            </form>
            @if (session('error'))
                <span class="text-red-700 mx-auto">Este servicio ya está registrado</span>
            @endif
        </div>
        <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
        <script src="{{ asset('stringtoslug/jquery.stringToSlug.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#title").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
                $('#image').on('change', function() {
                    var filename = $('input[type=file]').val().split('\\').pop();
                    $('#span_image').text(filename);
                })
                $("input[type=radio]").on('click', function() {
                    $('#is_active').val($('input:checked').val());
                })
            });
        </script>
    </div>

</x-app-layout>
