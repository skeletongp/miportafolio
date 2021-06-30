<x-app-layout>
    @slot('header')
        <h2 class="font-bold text-xl text-gray-900 leading-tight">
            {{ isset($categoria) ? $categoria : __('Proyectos') }}
        </h2>
    @endslot
    @slot('title')
        Proyectos
    @endslot
    <div class="pt-16 lg:pt-20 space-y-2 h-full mx-auto">
        @if (count($projects))
            <div class="max-w-3xl lg:max-w-screen-xl mx-auto">

                <main class="mt-12">    
                    @livewire('carrusel', ['object' => $skills])
                </main>

                {{-- Sección de los proyectos --}}
                <h1 class="font-bold uppercase text-xl md:text-3xl xl:text-4xl my-2 text-center">Mis proyectos</h1>
                {{$projects->links()}}

                <div class="grid grid-flow-rows grid-cols-1 md:grid-cols-2 {{count($projects)<3? 'xl:grid-cols-'.count($projects):'xl:grid-cols-3'}} {{count($projects)<4? 'xl:grid-cols-'.count($projects):'xl:grid-cols-4'}} gap-2 xl:gap-4 mx-8 xl:mx-4 mb-8">
                    @foreach ($projects as $project)
                        @livewire('project-card', ['project' => $project], key($project->id))
                    @endforeach
                </div>
            </div>
        @else
            @livewire('lost-page')
        @endif
        @if (Auth::check())
            <a href="{{ route('project_insert') }}"
                class="w-8 h-8 rounded-full bg-red-500 fixed right-2 inset-y-3/4 flex items-center justify-center text-xl z-30">
                <span class="fas fa-plus text-white"></span>
            </a>
        @endif

    </div>
</x-app-layout>
