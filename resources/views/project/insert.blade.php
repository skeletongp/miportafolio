<x-app-layout>
    @slot('header')
        <h2 class="font-bold text-xl text-gray-900 leading-tight mr-2 ">
            {{ __('Nuevo Proyecto') }}
        </h2>
    @endslot
    @slot('title')
        Nuevo Proyecto
    @endslot
    <div class="pt-16 lg:pt-24 space-y-2 h-full flex-1 flex-1 justify-center w-full">
        <div class="max-w-screen-2xl mx-auto shadow pb-8">
            <form action="{{ route('project_store') }}" method="POST" class="p-4 lg:p-8" enctype="multipart/form-data"
                autocomplete="off" id="form" name="form">
                @csrf
                <div class="lg:flex">
                    <div class="space-y-2 lg:w-2/3 lg:mx-2 mb-4 lg:mb-1">
                        <x-jet-label for="shortname" class="font-bold lg:text-xl">Nombre del proyecto </x-jet-label>
                        <x-jet-input type="text" name="shortname" id="shortname" class="w-full" maxlength="100" value="{{old('shortname')}}"></x-jet-input>
                        <x-jet-input-error for="shortname"></x-jet-input-error>
                    </div>
                    <div class="space-y-2 lg:w-1/3 lg:mx-2 mb-4 lg:mb-1">
                        <x-jet-label for="slug" class="font-bold lg:text-xl">Slug</x-jet-label>
                        <x-jet-input type="text" name="slug" id="slug" class="w-full" readonly value="{{old('slug')}}"></x-jet-input>
                        <x-jet-input-error for="slug"></x-jet-input-error>
                    </div>
                </div>
                <div class="mt-3 lg:mx-2 mb-4 lg:mb-4">
                    <x-jet-label for="longname" class="font-bold lg:text-xl">Resumen</x-jet-label>
                    <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" name="longname">{{old('longname')}}</textarea>
                    <x-jet-input-error for="longname" class="mt-2"></x-jet-input-error>
                </div>
                <div class="mt-3 lg:mx-2 mb-4 lg:mb-4">
                    <x-jet-label for="description" class="font-bold lg:text-xl">Descripción del proyecto</x-jet-label>
                    <textarea class="ckeditor form-control" name="description">{{old('description')}}</textarea>
                    <x-jet-input-error for="description" class="mt-2"></x-jet-input-error>
                </div>

                <div class="lg:flex">
                   
                    <div class="space-y-2 lg:w-2/4 lg:mx-2 mb-4 lg:mb-1">
                        <x-jet-label for="link" class="font-bold lg:text-xl">Enlace del proyecto</x-jet-label>
                        <x-jet-input type="text" name="link" id="link" class="w-full" maxlength="100" value="{{old('link')}}"></x-jet-input>
                        <x-jet-input-error for="link"></x-jet-input-error>
                    </div>
                   
                    <div class=" lg:mx-2 mb-4 lg:mb-1 flex-1 items-center lg:w-1/4">
                        <x-jet-label for="image" class="font-bold lg:text-xl mb-1">Imagen principal</x-jet-label>
                        <label for="image"
                            class="bg-gray-900 hover:bg-blue-light text-white font-bold py-2 px-4 w-full inline-flex items-center rounded-lg cursor-pointer">
                            <span class="fas fa-cloud-upload-alt text-xl"></span>
                            <span class="ml-2 text-lg uppercase" id="span_image">Subir imagen</span>
                        </label>
                        <input class="hidden" type="file" name="image" id="image" accept="image/*">
                        <x-jet-input-error for="image" class="mt-2"></x-jet-input-error>
                    </div>
                    <div class=" lg:mx-2 mb-4 lg:mb-1 flex-1 items-center lg:w-1/4">
                        <x-jet-label for="extra" class="font-bold lg:text-xl mb-1">Imágenes Extras</x-jet-label>
                        <label for="extra"
                            class="bg-gray-900 hover:bg-blue-light text-white font-bold py-2 px-4 w-full inline-flex items-center rounded-lg cursor-pointer">
                            <span class="fas fa-cloud-upload-alt text-xl"></span>
                            <span class="ml-2 text-lg uppercase" id="span_extra">Subir imagen</span>
                        </label>
                        <input class="hidden" type="file" name="extra[]" id="extra" accept="image/*" multiple>
                        <x-jet-input-error for="extra[]" class="mt-2"></x-jet-input-error>
                    </div>
                </div>
                <div class="mt-2 mb-4 pr-4 lg:pr-8 lg:mx-2 pl-4 lg:flex justify-end">
                    <!-- Estado del post -->
                   
                    <x-jet-button type='submit' form="form" class="font-bold mt-4 lg:mt-0">
                        Publicar
                    </x-jet-button>
                </div>

            </form>
        </div>
        <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
        <script src="{{ asset('stringtoslug/jquery.stringToSlug.js') }}"></script>

        <script type="text/javascript">
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{ route('ckeditor.image-upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });
            $(document).ready(function() {
                $("#shortname").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
                $('#image').on('change', function() {
                    var filename = $('input[name=image]').val().split('\\').pop();
                    $('#span_image').text(filename);
                })
                $('#extra').on('change', function() {
                    var filename = $('#extra')[0].files.length;
                    $('#span_extra').text("Subidas: "+filename+" imágenes");
                })
                $("input[type=radio]").on('click',function(){
                    $('#is_active').val($('input:checked').val());
                })
            });
        </script>
    </div>

</x-app-layout>
