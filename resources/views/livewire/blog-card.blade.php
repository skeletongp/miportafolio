<div>
    <div class="max-w-6xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md mt-3 mb-2 bg-blue-100 bg-opacity-40">

        <div>
            <div class="flex items-center justify-between"><span
                    class="font-light text-gray-600">{{ $post->updated_at }}</span><a
                    href="{{ route('category', ['category' => $post->category]) }}"
                    class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{$post->category->title}}</a>
            </div>
            <div class="mt-2"><a href="{{ route('show', ['post' => $post]) }}" class="text-2xl font-bold text-gray-700 hover:underline">{{$post->title}}</a>
                <p class="mt-2 text-gray-900">{{ $post->extract }}</p>
            </div>
            <div class="flex items-center justify-between mt-4"><a href="{{ route('show', ['post' => $post]) }}"
                    class="text-blue-800 font-bold hover:underline text-md lg:text-xl flex items-center">Leer <span class="fas fa-eye ml-1"></span></a> 
                    @if (Auth::check())
                    <a href="{{ route('update', ['post' => $post]) }}"
                        class="text-blue-800 font-bold hover:underline text-md lg:text-xl flex items-center">Editar <span class="fas fa-pen ml-1"></span></a>
                    @endif
                <div><span class="flex items-center text-xl"><img
                            src="https://res.cloudinary.com/dboafhu31/image/upload/v1624813664/avatar-icon-png-105-images-in-collection-page-3-avatarpng-512_512_djffio.png"
                            alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                        <h1 class="font-bold text-gray-700 select-none">{{ $post->autor->name }}</h1>
                    </span></div>
            </div>
        </div>
    </div>

</div>
