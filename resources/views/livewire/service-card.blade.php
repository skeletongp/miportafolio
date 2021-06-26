<div>
    <div class="shadow w-80 rounded-lg bg-blue-50 mx-auto mb-16 relative" style="height: 19rem">
        <div class="w-32 h-32  rounded-full  -mt-16 absolute mx-auto bg-cover bg-center flex items-end justify-center"
            style="background-image: url('{{ $service->image }}')">
            <h6 class="bg-gray-900 text-white p-1 px-2 rounded-xl text-xs">{{$service->type->title}}</h6>
        </div>
        <div class=" w-full px-4">
            <h1 class="text-right font-bold text-xl uppercase w-3/5 ml-auto p-3 h-16">{{ $service->title }}</h1>
            <div class="mt-4 h-full px-2">
                <p class="text-base text-justify">
                    {{ $service->description }}
                </p>
            </div>
        </div>
        <span
            class="select-none tracking-wider text-green-900 font-bold  absolute bottom-2 border-2 border-green-600 px-3 py-1 text-xs lg:text-sm rounded leading-loose mx-2 font-semibold"
            title="Facebook">
            <i class="fas fa-dollar-sign" aria-hidden="true"></i> {{ $service->price }}
        </span>
        <a href="https://api.whatsapp.com/send?phone=+18493153337&text=Saludos.%20Me%20interesa%20el%20servicio%20de%20{{ $service->title }}"
            target="_blank"
            class="tracking-wider text-green-600 font-bold hover:text-green-400  absolute bottom-2 right-2 border-2 border-green-600 px-3 py-1 text-xs lg:text-sm rounded leading-loose mx-2 font-semibold"
            title="Facebook">
            <i class="fab fa-whatsapp" aria-hidden="true"></i> Solicitar
        </a>
    </div>
</div>
