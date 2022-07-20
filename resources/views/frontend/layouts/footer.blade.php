<!-- ======= Footer ======= -->
<footer id="footer" class="footer ">
  <div class="footer-newsletter">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
          <h4>@lang('site.our_newsletter')</h4>
        </div>
        <div class="col-lg-6">
          <form action="{{ route('email_sub.store') }}" method="post">
            @csrf
            <input type="email" name="email"><input type="submit" value="@lang('front.Subscribe')">
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-top">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('frontend') }}/assets/img/logo.jpeg" alt="">
            <span>menovahub</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links mt-3">
            <a href="{{ setting('twitter') }}" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="{{ setting('facebook') }}" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="{{ setting('instagram') }}" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="{{ setting('linkedin') }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>@lang('front.Useful')</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('about_us.index') }}">@lang('site.about_us')</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services.index') }}">@lang('site.services')</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('blogs.index') }}">@lang('site.blog')</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">@lang('site.terms_of_service')</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">@lang('site.privacy_policy')</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>@lang('front.Services') </h4>
          @php
          $services = App\Models\Services::get();
          @endphp
          <ul>
            @foreach($services as $service)
            <li><i class="bi bi-chevron-right"></i> {{$service->name}}</li>
            @endforeach
        </div>
        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>@lang('front.Contact')</h4>
          <div class="contact-info">
            <p><i class="ri-map-pin-line"></i>{{ setting('address1_en') }}<br>{{ setting('address2_en') }}</p>
          </div>

          <div class="contact-info">
            <p><i class="ri-mail-send-line"></i> {{ setting('email') }}</p>
          </div>

          <div class="contact-info">
            <p><i class="ri-phone-line"></i> {{ setting('phone1') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="copyright">
      &copy;@lang('front.Copyright')  <strong><span>@lang('front.menovahub') 2022</span></strong>.@lang('front.Reserved')
    </div>
  </div>
</footer>
<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>