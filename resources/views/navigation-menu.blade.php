<input type="checkbox" id="burger-toggle" >
<a href="{{route('home')}}" class="fixed mt-5 xl:mt-0 pt-1 left-1 w-6 sm:w-16 " style="z-index: 110 !important"><img src="{{asset('logo.png')}}" alt="" class=" "/></a>
<label for="burger-toggle" class="burger-menu ml-5">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    
</label>
<div class="menu z-20" id="menu">
    <div class="menu-inner">
        <ul class="menu-nav">
            <li class="menu-nav-item"><a class="menu-nav-link" href="{{ route('home') }}"><span>
                        <div>PORTADA</div>
                    </span></a></li>
            <div class="w-16 h-1 bg-white mt-2 divisor lg:mt-4 mx-auto mb-2 lg:mb-0"></div>
            <li class="menu-nav-item"><a class="menu-nav-link" href="{{ route('about') }}"><span>
                        <div>SOBRE MÍ</div>
                    </span></a></li>
            <div class="w-16 h-1 bg-white mt-2 divisor lg:mt-4 mx-auto mb-2 lg:mb-0"></div>
            <li class="menu-nav-item"><a class="menu-nav-link" href="{{ route('services') }}"><span>
                        <div>SERVICIOS</div>
                    </span></a></li>
            <div class="w-16 h-1 bg-white mt-2 divisor lg:mt-4 mx-auto mb-2 lg:mb-0"></div>
            <li class="menu-nav-item"><a class="menu-nav-link" href="{{ route('projects') }}"><span>
                        <div>PROYECTOS</div>
                    </span></a></li>
            <div class="w-16 h-1 bg-white mt-2 divisor lg:mt-4 mx-auto mb-2 lg:mb-0"></div>

                    <li class="menu-nav-item"><a class="menu-nav-link uppercase" href="{{ route('blog') }}"><span>
                        <div>Blog</div>
                    </span></a></li>
            <div class="w-16 h-1 bg-white mt-2 divisor lg:mt-4 mx-auto mb-2 lg:mb-0"></div>
        </ul>
        <div class="gallery">
            <div class="title">
                <h1>PROYECTOS DESTACADOS</h1>
            </div>
            <div class="images">
                @foreach (App\Models\Project::paginate(4) as $project)
                    <a class="image-link" href="{{ $project->link }}" target="_blank">
                        <div class="image" data-label="{{ $project->shortname }}"><img src="{{ $project->image }}"
                                alt="{{ $project->shortname }}"></div>
                    </a>
                @endforeach


            </div>
        </div>
    </div>
</div>
