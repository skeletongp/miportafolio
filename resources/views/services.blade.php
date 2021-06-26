<x-app-layout>
    @slot('header')
        <h2 class="font-bold text-xl text-gray-900 leading-tight">
            {{ __('Servicios') }}
        </h2>
    @endslot
    @slot('title')
        Servicios
    @endslot
    <div class="pt-16 lg:pt-20 space-y-2 h-full flex-1 ">
        <div class="">
            <div class="w-11/12 lg:w-9/12 mx-auto flex-1 space-y-2 items-center justify-center"
                style="min-height: 80vh">

                <div>
                    @livewire('tricard', [
                    'bigTitle' => 'Descubre nuestros servicios',
                    'bigImage' =>
                    'https://res.cloudinary.com/dboafhu31/image/upload/v1624718362/pexels-photo-698808_j6n0rm.jpg ',
                    'title1' => $type1->title,
                    'title2' => $type2->title,
                    'title3' => $type3->title,
                    'icon1' => $type1->icon,
                    'icon2' => $type2->icon,
                    'icon3' => $type3->icon,
                    'image1' => $type1->image,
                    'image2' => $type2->image,
                    'image3' => $type3->image,
                    'link1' => route('services_search',["type"=>$type1->slug]),
                    'link2' => route('services_search',["type"=>$type2->slug]),
                    'link3' => route('services_search',["type"=>$type3->slug])
                    ]
                    )
                </div>
            </div>
            <div class="w-11/12 lg:w-8/12 mx-auto flex-1 space-y-16 py-16 items-center justify-center mb-4">
                <div class="lg:grid grid-flow-row grid-cols-3  gap-2 mx-auto  relative pb-4">

                    @foreach ($services as $service)
                        @livewire('service-card', ['service' => $service], key($service->id))
                       
                    @endforeach
                </div>
                <div class="w-11/12 lg:w-8/12">
                    {{$services->links()}}
                </div>
            </div>

        </div>
        <script>
            $(document).ready(function() {
                $("html, body").animate({
                    scrollTop: $(
                      'html, body').get(0).scrollHeight
                }, 2000);
            });
        </script>
    </div>
</x-app-layout>
