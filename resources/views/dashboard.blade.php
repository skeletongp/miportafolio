<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-900 leading-tight">
            {{ __('Portada') }}
        </h2>
    </x-slot>
    @slot('title')
        Home
    @endslot
    @if (isset($msg))
        <x-jet-dialog-modal>
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                <h1  class="text-center text-sm">{{$msg}}</h1>
            </x-slot>
            <x-slot name="footer"></x-slot>
        </x-jet-dialog-modal>
    @endif
    <div class="pb-12 pt-16 lg:pt-20 space-y-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg sm:mx-2 rounded-xl">
                @livewire('banner',
                [ 'titulo'=>'Hola, soy Ismael Contreras',
                'cuerpo'=>"Estudiante de Ingeniería de Software, Digitador, Asesor Académico Independiente y Geek de las
                Tecnologías."
                ])
            </div>
        </div>
        @livewire('carrusel', ['object'=>App\Models\Skill::all()])
        <div
            class="max-w-7xl mx-auto md:grid grid-flow-row md:grid-cols-2  lg:grid-cols-3 grid-rows-1 gap-4 text-center mx-auto">
       
            @foreach ($categories as $category)
                <div class="shadow-xl bg-white bg-opacity-50  rounded-xl h-96 py-2 mx-2 m-2 relative">
                    <div class="rounded-full left-1 top-1 relative ">
                        <img src="{{ $category->icon }}" alt="" class="w-16 h-16 absolute ">
                    </div>
                    <h2 class="text-white text-xl py-2 uppercase font-bold w-max bg-gray-900 mx-auto p-4 rounded-xl">
                        {{ $category->name }}</h2>
                       @if (Auth::check())
                       <a href="{{route('newskill', ['category'=>$category->id])}}"  
                        class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center absolute right-1 top-1">
                            <span class="fas fa-plus text-xl"></span>
                        </a>
                       @endif
                    @if ($category->skills)

                        <div class="grid grid-flow-row grid-cols-2 grid-rows-1 gap-1 mt-8">
                            @foreach ($category->skills as $skill)
                                @livewire('micro-card',
                                [
                                'title'=> $skill->title,
                                'level'=> $skill->level,
                                'image'=>$skill->image,
                                ], key($skill->id))
                            @endforeach

                        </div>
                    @endif
                </div>
            @endforeach
               
        </div>
    </div>
</x-app-layout>
