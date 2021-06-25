<div>
    <div class="w-40 lg:w-44 h-16 rounded-xl bg-white mx-auto py-2 flex mt-1">
        <div class="w-4/12 flex items-center justify-center">
            <img src="{{$image}}" alt="imagen" class="w-16 h-12 ml-1">
        </div>
        <div class="w-8/12 rounded-r-xl flex-1 justify-center items-center h-full pr-2">
            <h3 class="font-bold">Level</h3>
            <div class="w-24 mx-auto flex">
               @for ($i = 0; $i < $level; $i++)
               <span class="fas fa-star text-yellow-300"></span>
               @endfor
               @for ($i = 0; $i < 5-$level; $i++)
               <span class="fas fa-star text-gray-300"></span>
               @endfor
            </div>
        </div>
    </div>
</div>
