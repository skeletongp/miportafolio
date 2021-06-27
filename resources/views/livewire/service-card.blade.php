<div>
    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden mt-4">
        <div class="flex items-end justify-end h-56 w-full bg-cover"
            style="background-image: url('{{ $service->image }}')">
            <a href="https://api.whatsapp.com/send?phone=+18493153337&text=Saludos.%20Me%20interesa%20el%20servicio%20de%20{{$service->title}}"
                class=" p-2 rounded-full bg-white shadow border-2 border-green-800 text-green-700 text-2xl mx-5 -mb-4 focus:outline-none flex items-center hover:bg-green-300">
                <span class="fab fa-whatsapp"></span>
            </a>
        </div>
        <div class="px-5 py-3">
            <h3 class="text-gray-900 uppercase font-bold text-xl">{{ $service->title }}</h3>
            <div class="flex justify-between items-center w-full">
                <span class="text-green-600 font-bold  text-lg  mt-2 border-2 border-green-600 px-2 py-1 rounded-lg select-none hover:bg-green-200">{{ $service->price }}</span>
                <a href="{{url('service/'.$service->slug)}}" class="font-bold text-blue-500 mt-2 border-2 border-blue-500 px-2 py-1 hover:bg-blue-200 rounded-lg">Detalles</a>
            </div>
        </div>
    </div>
</div>
