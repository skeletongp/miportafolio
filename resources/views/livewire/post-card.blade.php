<div>
    <div class="max-w-6xl px-10  py-6  mx-auto bg-white rounded-lg shadow-md mt-4 bg-blue-100 bg-opacity-40">

        <div>
            
            <div class="flex items-center justify-between"><span
                    class="font-light text-gray-600">{{ substr($post->updated_at ,0,10)}}</span><a
                    href="{{ route('category', ['category' => $post->category]) }}"
                    class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{ $post->category->title }}</a>
            </div>
            <div class="max-w-xl m-4 mx-auto">
                <img src="{{$post->image}}" alt="" class="rounded-xl">
            </div>
            <div class="mt-2  lg:max-h-96 lg:overflow-auto">
                <span id="span-content" class="mt-2 text-gray-900">{!! $post->description !!}</span>
            </div>
            <div class="lg:flex-1 items-center justify-between mt-4 text-xl">
                <div >
                    <span class="flex items-center">
                        <img src="https://res.cloudinary.com/dboafhu31/image/upload/v1624813664/avatar-icon-png-105-images-in-collection-page-3-avatarpng-512_512_djffio.png"
                            alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                        <h1 class="font-bold text-gray-700 select-none">{{ $post->autor->name }}</h1>
                        <div class="ml-auto">
                            <small class="text-right ml-auto"> <span class="fas fa-eye text-green-500"></span><span class="bg-gray-100 px-2 rounded-xl">{{$views}}</span></small>
                        <small class="text-right ml-auto"> 
                            <span class="fas fa-thumbs-up text-blue-500 {{$is_liked?'':'cursor-pointer'}}" wire:click="{{$is_liked?'':'like'}}">
                            </span>
                            <span class="bg-gray-100 px-2 rounded-xl" >{{$likes}}
                            </span>
                        </small>
                        </div>
                    </span>
                </div>
                    <div class="grid gap-1 grid-cols-3 lg:grid-cols-5 mt-1">
                       @foreach ($post->labels as $label)
                       <span
                       class="inline-block rounded-full bg-gray-200 text-xs font-bold mr-1 md:mr-2  px-2 md:px-4 py-1  mx-2 select-none">
                     {{$label->title}}
                   </span>
                       @endforeach
                    </div>
                </div>
            </div>
            <style>
                #span-content p {
                    margin-bottom: 1.3rem !important;
                }

            </style>
        </div>
    </div>
