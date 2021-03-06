@extends('frontend.layouts.master')

@section('title')
Menovahub-contact
@endsection

@section('style')
@endsection

@section('content')
<section class="breadcrumbs">
  <div class="container">
    <div class="breadcrumbs-text">
      <ol>
        <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
        <li>@lang('front.contact_us')</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->
{{-- @dd(setting('email'));  --}}
<!-- ======= Contact Section ======= -->
<div id="contact" class="contact-area">
  <div class="contact-inner area-padding">
    <div class="contact-overly"></div>
    <div class="container ">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>@lang('front.contact_us')</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start contact icon column -->
        <div class="col-md-4">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="bi bi-phone"></i>
              <p>
              @lang('front.phone'): {{ setting('phone1')  }}<br>
                <span>Monday-Friday ({{ setting('open_hours_en')  }})</span>
              </p>
            </div>
          </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="bi bi-envelope"></i>
              <p>
              @lang('front.email'): {{ setting('email') }}<br>
                <span> {{ setting('dribbble') }}</span>
              </p>
            </div>
          </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="bi bi-geo-alt"></i>
              <p>
              @lang('front.location'): {{ setting('address1_en') }}<br>
                <span>{{ setting('address2_en') }}</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">

        <!-- Start Google Map -->
        <div class="col-md-6">
          <!-- Start Map -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
          <!-- End Map -->
        </div>
        <!-- End Google Map -->

        <!-- Start  contact -->
        <div class="col-md-6">
          @if(session()->has('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
          @endif
          <div class="form contact-form">
            <form action="{{ route('contacts.store') }}" method="post" role="form">
              @csrf
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="@lang('front.name')">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="@lang('front.email') ">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="@lang('front.subject')">
                @error('subject')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="@lang('front.message')"></textarea>
                @error('message')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="text-center ">
                <button class=" btn-contact" type="submit">
                  @lang('front.send_message')
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- End Left contact -->
      </div>
    </div>
  </div>
</div><!-- End Contact Section -->

@endsection
