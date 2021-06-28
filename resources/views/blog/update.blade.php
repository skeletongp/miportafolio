<x-app-layout>
    @slot('header')
        <h2 class="font-bold text-xl text-gray-900 leading-tight mr-2 ">
            {{ __('Editar Post') }}
        </h2>
    @endslot
    @slot('title')
        Editar Post
    @endslot
    <div class="pt-16 lg:pt-24 space-y-2 h-full flex-1 flex-1 justify-center w-full">
        <div class="max-w-screen-2xl mx-auto shadow pb-8">
            <form action="{{ route('post_edit',['post'=>$post]) }}" method="POST" class="p-4 lg:p-8" 
                autocomplete="off" id="form" name="form">
                @csrf
                @method('put')
                <div class="lg:flex">
                    <div class="space-y-2 lg:w-2/3 lg:mx-2 mb-4 lg:mb-1">
                        <x-jet-label for="title" class="font-bold lg:text-xl">Título del post </x-jet-label>
                        <x-jet-input type="text" name="title" id="title" class="w-full" maxlength="100"
                        value="{{old('title', $post->title)}}"></x-jet-input>
                        <x-jet-input-error for="title"></x-jet-input-error>
                    </div>
                    <div class="space-y-2 lg:w-1/3 lg:mx-2 mb-4 lg:mb-1">
                        <x-jet-label for="slug" class="font-bold lg:text-xl">Slug</x-jet-label>
                        <x-jet-input type="text" name="slug" id="slug" class="w-full" value="{{old('slug', $post->slug)}}"
                            readonly></x-jet-input>
                        <x-jet-input-error for="slug"></x-jet-input-error>
                    </div>
                </div>
                <div class="mt-3 lg:mx-2 mb-4 lg:mb-4">
                    <x-jet-label for="extract" class="font-bold lg:text-xl">Resumen</x-jet-label>
                    <textarea
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                        name="extract">{{old('extract', $post->extract)}}</textarea>
                    <x-jet-input-error for="extract" class="mt-2"></x-jet-input-error>
                </div>
                <div class="mt-3 lg:mx-2 mb-4 lg:mb-4">
                    <x-jet-label for="description" class="font-bold lg:text-xl">Contenido del post</x-jet-label>
                    <textarea class="ckeditor form-control" name="description">{{old('description', $post->description)}}</textarea>
                    <x-jet-input-error for="description" class="mt-2"></x-jet-input-error>
                </div>

                <div class="lg:flex">
                    <div class="space-y-2 lg:w-1/4 lg:mx-2 mb-4 lg:mb-1">
                        <x-jet-label for="title" class="font-bold lg:text-xl">Categoría </x-jet-label>
                        <select name="topic_id" id="topic_id"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                            <option value=""></option>
                            @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}" {{$topic->id==$post->category->id?'selected':''}}>{{ $topic->title }}</option>
                            @endforeach

                        </select>
                        <x-jet-input-error for="topic_id"></x-jet-input-error>
                    </div>
                   
                </div>
                <div class="mt-2 mb-4 pr-4 lg:pr-8 lg:mx-2 pl-4 lg:flex justify-end">
                    <!-- Estado del post -->
                    <div class="flex  relative items-center w-full lg:w-1/2">
                        <input type="radio" id="option0" name="is_active" value="2" class="appearance-none" />
                        <label for="option0"
                            class="cursor-pointer mr-2 w-1/2 lg:w-1/4 flex items-center justify-center truncate uppercase select-none font-semibold text-lg rounded-full py-2 ">Borrador</label>
                        <input type="radio" id="option1" name="is_active" class="appearance-none" value="1" checked />
                        <label for="option1"
                            class="cursor-pointer mr-2 lg:w-1/4 flex items-center justify-center truncate uppercase select-none font-semibold text-lg rounded-full py-2 focus:text-white">Público</label>
                        <div
                            class="w-1/2  lg:w-1/4 flex items-center justify-center truncate uppercase select-none font-semibold text-lg rounded-full p-0 h-full bg-gray-200 absolute transform transition-transform tabAnim text-white">
                        </div>

                        <x-jet-input-error for="is_active" class="mt-2"></x-jet-input-error>
                    </div>
                    <x-jet-button type='submit' form="form" class="font-bold mt-4 lg:mt-0">
                        Actualizar
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
                $("#title").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
               
                $("input[type=radio]").on('click',function(){
                    $('#is_active').val($('input:checked').val());
                })
            });
        </script>

</x-app-layout>
