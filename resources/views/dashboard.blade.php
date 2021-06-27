<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-900 leading-tight">
            {{ __('Portada') }}
        </h2>
    </x-slot>
    @slot('title')
        Home 
    @endslot
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
        <div class="max-w-7xl mx-auto lg:grid grid-flow-row grid-cols-3 grid-rows-1 gap-4 text-center ">

            @foreach ($categories as $category)
                <div class="shadow-xl bg-white bg-opacity-50  rounded-xl h-96 py-2 mx-2 m-2 relative">
                    <div class="rounded-full left-1 top-1 relative ">
                        <img src="{{ $category->icon }}" alt="" class="w-16 h-16 absolute ">
                    </div>
                    <h2 class="text-white text-xl py-2 uppercase font-bold w-max bg-gray-900 mx-auto p-4 rounded-xl">
                        {{ $category->name }}</h2>

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
