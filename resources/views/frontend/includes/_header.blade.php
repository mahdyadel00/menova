<!-- header -->
<div class="top-header-area" id="sticker" style="height: 82px;background: #ffffff;">
		<div class="container">
			<div class="col-12">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{ route('home') }}">
								<img  src="{{ asset('frontend') }}/assets/img/menova.png"  alt="" height="40px" width="60px">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li>
                                <a href="{{ route('home') }}">@lang('site.home')</a>
								</li>
								<li><a href="#" class="dropdown-toggle">@lang('site.connect') </a>
									<ul class="sub-menu">
                                    <li><a href="#">@lang('site.find_a_co_founder')</a></li>
                                    <li><a href="#">@lang('site.find_a_freelancer_or_it_company')</a></li>
									</ul>
								</li>
								<li><a href="" class="dropdown-toggle" >@lang('site.collaborate')</a>
									<ul class="sub-menu">
                                    <li><a href="{{route('frontend.discusses.create')}}">@lang('site.discuss')</a></li>
									</ul>
								</li>
								<!-- <li><a href=""class="dropdown-toggle">@lang('site.educate')</a>
									<ul class="sub-menu">
										<li><a href="shop.html">@lang('site.learning_center')</a></li>
									</ul>
								</li> -->
							
								<li><a href="#" class="dropdown-toggle">@lang('site.raise') </a>
									<ul class="sub-menu">
										<li><a href="{{ url('raise') }}">@lang('site.find_an_investor')</a></li>
									</ul>
								</li>
								<li>
                                <a href="{{route('frontend.blogs')}}">@lang('site.blogs')</a>
								
								</li>
								<li >
                                <a  href="{{ route('frontend.get_premium.index') }}" class="btn-pink btn"  data-toggle="button" aria-pressed="false" >@lang('site.get_premium')</a>
								</li>
								<!-- <li>
									<a href=""><i class="fa fa-envelope"></i>
									</a>
								
								</li> -->
								<li>
										<a href="">	<i class="fa fa-users"></i>
									</a>
								
								</li>
                            @auth
								<li><a href="#" class="dropdown-toggle"><i class="fa fa-user"></i> {{ auth()->user()->last_name ?? auth()->user()->email  }}   </a> 
									<ul class="sub-menu">
										<li><a href="{{route('frontend.profile')}}">@lang('site.edit_profile')</a></li>
										<li><a href="{{route('frontend.my_profile')}}">@lang('site.my_profile')</a></li>
										<li><a href="{{route('frontend.projects.index')}}">@lang('site.my_projects')</a></li> 
										<li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('site.logout')</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li> 
										
									</ul>
								</li>
                            @else
                                    <li>
                                        <a class="getstarted scrollto" href="{{route('login')}}"
                                            style="background: #191970;">@lang('site.sign_in')</a>
                                    </li>
                                    <li>
                                        <a class="getstarted scrollto" href="{{route('register')}}"
                                            style="background: #ff9999;">@lang('site.sign_up')</a>
                                    </li>
                            @endauth
								
							</ul>
						</nav>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
