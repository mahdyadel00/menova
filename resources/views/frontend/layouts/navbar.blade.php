<nav id="navbar" class="navbar" >
    <ul>
      <li><a class="nav-link scrollto active" href="{{ route('home') }}">@lang('site.home')</a></li>
      <li><a class="nav-link scrollto" href="{{ route('about_us.index') }}">@lang('site.about_us')</a></li>
      <li><a class="nav-link scrollto" href="{{ route('services.index') }}">@lang('site.services')</a></li>
      <li><a class="nav-link scrollto" href="{{ route('connect.index') }}">@lang('site.connects')</a></li>
      <li><a class="nav-link scrollto" href="{{ route('rais.index') }}">@lang('site.rais')</a></li>
      <li><a class="nav-link scrollto" href="{{ route('blogs.index') }}">@lang('site.blog')</a></li>
      <li><a class="nav-link scrollto" href="/discuss">@lang('site.discuss')</a></li>
      <li><a class="nav-link scrollto" href="{{ route('contacts.index') }}">@lang('site.contacts')</a></li>

      <a href="/login" class="btn-sign sign-in ">@lang('site.sign_in')</a>
      <a href="#" class="btn-sign sign-up">@lang('site.sign_up')</a>
      @if(auth()->check())
       <a href="#"><img src="{{ auth()->user()->image }}" alt="@lang('site.profile')"></a>
      @endif
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav>
  <!-- .navbar -->
