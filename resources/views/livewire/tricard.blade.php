<div>
    <div class="flex justify-center">
        <!-- component -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <style>
            .bannerFondo {
                height: 300px;
            }

        </style>
        <div>
            <div class="bannerFondo bg-white bg-left-top bg-cover bg-no-repeat rounded-xl"
                style="background-image: url('{{$bigImage}}')">
            </div>

            <div class="-mt-48 ">
                <div class="w-full text-center bg-gray-600 py-2 bg-opacity-40">
                    <p class="text-sm tracking-widest text-white"></p>
                    <h1 class="font-bold text-3xl  lg:text-5xl text-white px-2">
                        {{ $bigTitle }}
                    </h1>
                </div>

                <div class="lg:grid grid-cols-1 gap-2 sm:grid-cols-3 ">

                    <div class="p-2 sm:p-10 text-center cursor-pointer">
                        <div
                            class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-white transition duration-500  bg-blue-50">
                            <div class="space-y-10 text-center">
                                <i class="{{ $icon1 }}" style="font-size:48px;"></i>

                                <div onclick="window.location='{{$link1}}';" class="px-6 py-4 ">
                                    <div class="space-y-5 w-full lg:w-72">
                                        <div class="font-bold text-xl ">{{ $title1 }}</div>
                                        <p class="h-64 bg-cover" style="background-image:url('{{ $image1 }}')">

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-2 sm:p-10 text-center cursor-pointer text-white">
                        <div
                            class="py-16 max-w-sm rounded overflow-hidden shadow-lg bg-gray-700 hover:bg-gray-900 transition duration-500">
                            <div class="space-y-10 text-center">
                                <i class="{{ $icon2 }}" style="font-size:48px;"></i>
                                <div onclick="window.location='{{$link2}}';" class="px-6 py-4">
                                    <div class="space-y-5 w-full lg:w-72">
                                        <div class="font-bold text-xl ">{{ $title2 }}</div>
                                        <p class="h-64 bg-cover" style="background-image:url('{{ $image2 }}')">

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-2 sm:p-10 text-center cursor-pointer translate-x-2">
                        <div
                            class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-white transition duration-500 bg-blue-50 ">
                            <div class="space-y-10 text-center">
                                <i class="{{ $icon3 }}" style="font-size:48px;"></i>

                                <div onclick="window.location='{{$link3}}';" class="px-6 py-4">
                                    <div class="space-y-5 w-full lg:w-72">
                                        <div class="font-bold text-xl ">{{ $title3 }}</div>
                                        <p class="h-64 bg-cover" style="background-image:url('{{ $image3 }}')">

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
