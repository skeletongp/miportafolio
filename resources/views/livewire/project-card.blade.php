<div>
    <div class="shadow-lg h-80 rounded-2xl pt-4 relative max-w-lg ">
        <div class="flex p-2 bg-blue-100 rounded-t-lg">
            <div class="w-24 h-24 bg-cover bg-center rounded-full" style="background-image: url('{{$project->image}}')">
                
            </div>
            <div class="w-2/3 flex items-center justify-center text-center p-2">
                <a href="{{route('project_show',['project'=>$project])}}"><h2 class="font-bold uppercase">{{$project->shortname}}</h2></a>
            </div>
        </div>
        <div class="p-2 text-justify xl:px-4">
            <span>{{$project->longname}}</span>
           
        </div>
        <div class="absolute w-full h-12 bg-gray-100 bg-opacity-40 bottom-0 flex items-center px-2 xl:px-8 justify-between space-x-4">
            
            <a href="{{route('project_show',['project'=>$project])}}" class="uppercase font-bold hover:text-blue-500">Detalles</a>
           @livewire('modal-fotos', ['images' => $project->images])
        </div>
    </div>
</div>
