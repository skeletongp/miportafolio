<div>
        <link rel="stylesheet" href="{{mix('css/carousel.css')}}">
        <!-- Start cssSlider.com -->
        <div class="slider ">
            <div class="slide-track">
                @foreach ($object as $obj)
                <div class="slide  flex items-center mx-8 mt-4">
                    <img src="{{$obj->image}}" class="w-24" alt="" />
                    <h2 class="ml-2 font-bold uppercase text-xs">{{$obj->title}}</h2>
                </div>
                @endforeach
                
            </div>
        </div>
</div>
