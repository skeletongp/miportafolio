<div>
    <a role="button" wire:click="toggleModal">
        <span class="fas fa-camera"></span><span class="text-sm lg:text-xl ml-2">Ver fotos</span>
    </a>
    <div>
        <x-jet-dialog-modal wire:model="open">
            @slot('title')
                <h1 class="text-gray-900 font-bold text-xl lg:text-2xl"> Fotos del proyecto</h1>
            @endslot
            @slot('content')

                <section class="carousel" aria-label="Gallery">
                    <ol class="carousel__viewport">
                        @foreach ($images as $image)
                            <li id="carousel__slide{{ $image->id }}" tabindex="0"
                                class="carousel__slide bg-cover bg-center"
                                style="background-image: url('{{ $image->url }}')">

                            </li>
                        @endforeach

                    </ol>
                    <aside class="carousel__navigation">
                        <ol class="carousel__navigation-list">
                            @foreach ($images as $image)
                                <li class="carousel__navigation-item">
                                    <a href="#carousel__slide{{ $image->id }}"
                                        id="carousel__slide{{$image->id}}"
                                        class="carousel__navigation-button {{ Str::contains('<script>window.location.hash</script>', 'carousel__slide' . $image->id) ? 'text-red-500' : 'text-white' }}">
                                        Go to slide 1
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </aside>
                </section>
               

            @endslot
            @slot('footer')

            @endslot
        </x-jet-dialog-modal>
        <style>
            @keyframes tonext {
                75% {
                    left: 0;
                }

                95% {
                    left: 100%;
                }

                98% {
                    left: 100%;
                }

                99% {
                    left: 0;
                }
            }

            @keyframes tostart {
                75% {
                    left: 0;
                }

                95% {
                    left: -300%;
                }

                98% {
                    left: -300%;
                }

                99% {
                    left: 0;
                }
            }

            @keyframes snap {
                96% {
                    scroll-snap-align: center;
                }

                97% {
                    scroll-snap-align: none;
                }

                99% {
                    scroll-snap-align: none;
                }

                100% {
                    scroll-snap-align: center;
                }
            }



            * {
                box-sizing: border-box;
                scrollbar-color: transparent transparent;
                /* thumb and track color */
                scrollbar-width: 0px;
            }

            *::-webkit-scrollbar {
                width: 0;
            }

            *::-webkit-scrollbar-track {
                background: transparent;
            }

            *::-webkit-scrollbar-thumb {
                background: transparent;
                border: none;
            }

            * {
                -ms-overflow-style: none;
            }

            ol,
            li {
                list-style: none;
                margin: 0;
                padding: 0;
            }

            .carousel {
                position: relative;
                padding-top: 75%;
                filter: drop-shadow(0 0 10px #0003);
                perspective: 100px;
            }

            .carousel__viewport {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                display: flex;
                overflow-x: scroll;
                counter-reset: item;
                scroll-behavior: smooth;
                scroll-snap-type: x mandatory;
            }

            .carousel__slide {
                position: relative;
                flex: 0 0 100%;
                width: 100%;
                background-color: #f99;

            }

            .carousel__slide:nth-child(even) {
                background-color: #99f;
            }

            .carousel__slide:before {

                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate3d(-50%, -40%, 70px);
                color: #fff;
                font-size: 2em;
            }

            .carousel__snapper {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                scroll-snap-align: center;
            }

            @media (hover: hover) {
                .carousel__snapper {
                    animation-name: tonext, snap;
                    animation-timing-function: ease;
                    animation-duration: 4s;
                    animation-iteration-count: infinite;
                }

                .carousel__slide:last-child .carousel__snapper {
                    animation-name: tostart, snap;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                .carousel__snapper {
                    animation-name: none;
                }
            }

            .carousel:hover .carousel__snapper,
            .carousel:focus-within .carousel__snapper {
                animation-name: none;
            }

            .carousel__navigation {
                position: absolute;
                right: 0;
                bottom: 0;
                left: 0;
                text-align: center;
            }

            .carousel__navigation-list,
            .carousel__navigation-item {
                display: inline-block;
            }

            .carousel__navigation-button {
                display: inline-block;
                width: 2.5rem;
                height: 2.5rem;
                background-color: #333;
                background-clip: content-box;
                border: 0.15rem solid transparent;
                border-radius: 50%;
                font-size: 0;
                transition: transform 0.1s;
                counter-increment: item;
            }

            .carousel__navigation-button::before {
                content: counter(item);
                font-size: 1.1rem;
            }

            @media only screen and (max-width: 600px) {
                .carousel__navigation-button {
                    width: 1.5rem;
                    height: 1.5rem;
                    border: 0rem solid transparent;

                }

                .carousel__navigation-button::before {
                    content: counter(item);
                    font-size: 0.75rem;
                    color: #fff;
                    margin-top: 0
                }

                .jetstream-modal div {
                    min-width: 80vw;
                }
            }

            .carousel::before,
            .carousel__prev {
                left: -1rem;
            }

            .carousel::after,
            .carousel__next {
                right: -1rem;
            }

            .carousel::before,
            .carousel::after {
                content: '';
                z-index: 1;
                background-color: #333;
                background-size: 1.5rem 1.5rem;
                background-repeat: no-repeat;
                background-position: center center;
                color: #fff;
                font-size: 2.5rem;
                line-height: 4rem;
                text-align: center;
                pointer-events: none;
            }

        </style>
        <script>
            $('.carousel__navigation-button').on('click',function(){
                let id=$(this).attr('id');
                console.log(id)
                let hash=window.location.hash;

                console.log(hash)

                if(id==hash){
                    $(this).toggleClass('text-red-500')
                }
            })
        </script>
    </div>
</div>
