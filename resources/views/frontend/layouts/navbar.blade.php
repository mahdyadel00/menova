<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto active" href="{{ route('home') }}">@lang('site.home')</a></li>
        <li><a class="nav-link scrollto" href="{{ route('about_us.index') }}">@lang('site.about_us')</a></li>
        <li><a class="nav-link scrollto" href="{{ route('services.index') }}">@lang('site.services')</a></li>
        <li><a class="nav-link scrollto" href="{{ route('connect.index') }}">@lang('site.connects')</a></li>
        <li><a class="nav-link scrollto" href="{{ route('rais.index') }}">@lang('site.rais')</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="/collaborat" id="navbarDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">
                @lang('site.collaborat')
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <!-- <li><a class="dropdown-item" href="/projects">@lang('site.projects')</a></li>
                  <li> -->
                <!-- <hr class="dropdown-divider"> -->
        </li>
        <li><a class="dropdown-item" href="{{ route('discusses.index') }}">@lang('site.discuss')</a></li>
    </ul>
    </li>
    <li><a class="nav-link scrollto" href="{{ route('blogs.index') }}">@lang('site.blog')</a></li>
    <li><a class="nav-link scrollto" href="{{ route('contacts.index') }}">@lang('site.contacts')</a></li>
    @guest
        <li><a href="{{ route('login') }}" class="btn-1 sign-in">@lang('site.sign_in')</a> </li>
        <li> <a href="/sign_up" class="btn-1 sign-up">@lang('site.sign_up')</a></li>
    @endguest
    @auth
        <li class="nav-item dropdown">
            <img class="nav-link dropdown-toggle img-profile" src="{{ auth()->user()->image_path }}" id="navbarDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
            </img>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/user-profile">@lang('site.my_profile')</a></li>
                <li><a class="dropdown-item" href="{{ route('frontend.projects.index') }}">@lang('site.my_projects')</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li class="dropdown-item"> <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                                                          document.getElementById('logout-form').submit();"
                        class="nav-link">@lang('site.logout')</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    @endauth
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav>
<!-- .navbar -->
