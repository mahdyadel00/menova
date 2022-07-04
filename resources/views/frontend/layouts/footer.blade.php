<!-- ======= Footer ======= -->
<footer id="footer" class="footer ">
    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>@lang('site.our_newsletter')</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="{{ route('email_sub.store') }}" method="post">
                @csrf
              <input type="email" name="email"><input type="submit" value="Subscribe">
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
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="{{ route('about_us.index') }}">@lang('site.about_us')</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services.index') }}">@lang('site.services')</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="{{ route('blogs.index') }}">@lang('site.blog')</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">@lang('site.terms_of_service')</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">@lang('site.privacy_policy')</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
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
        &copy; Copyright <strong><span>menovahub 2022</span></strong>. All Rights Reserved
      </div>
    </div>
</footer>
<!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
