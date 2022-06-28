@extends('frontend.layouts.app')
@section('pageTitle', auth()->user()->first_name)
@section('content')
<div class="edit-profile mt-100 mb-70">
  <div class="container">
    <div class="row" >
      <div class="col-lg-4 col-md-6" id="setting">
        <br>
          <div class="widgetsetting">
            <div class="widget-title1">
              <h3>@lang('site.settings')</h3>
            </div>
            <ul class="ulsetting" id="ulsetting">
              <br>
              <li class="profilewidget" >
                <a href="{{route('frontend.profile')}}"> 
                  <i class="fa fa-user-circle usericon"></i>
                  <span class="name">@lang('site.profile')</span>
                </a></li>
              <li class="planwidget">
                <a href="#" class="plan"> <i class="fa fa-wallet usericon"></i>
                  <span class="name">@lang('site.billing')</span>
                </a> 
              </li>
            </ul>
          </div>  
      </div>

      <div class="col-lg-8 col-md-6 profilesetting ">
        <div class="single-product-item">
          <div class="container rounded bgsetting mt-4 mb-5">
            <div class="row">
              <div class="col-md-12 border-right">
                <div class="p-3 ">
                  <div class=" row pt-3 ">
                    <h4 class="col-md-12 text-left profilepicname">@lang('site.profile_picture')</h4>
                    <p class="col-12 text-left profilepictext">@lang('site.profile_hint')</p>
                    <div class="row">
                      <div class="col-2 text-left">
                        <label class="imgupload">
                          <img  src="{{ asset('storage/uploads/images/users' . '/' . $user->image) }}" class="photo rounded-circle profile-loaded-image" 
                          style="display: {{ auth()->user()->hasImage() ? 'block' : 'none' }};">
                        </label>
                        <form action="{{route('frontend.user_change_image')}}" method="post" enctype="multipart/form-data">
                          @csrf        
                          <div class="col-8 text-left">
                            @php
                                $input="image";
                            @endphp
                            <label for="fileUpload" class="file-upload btn btn-pink btn-block shadow">
                              <i class="fa fa-upload mr-2"></i>@lang('site.change')
                              <input id="fileUpload" type="file" name="{{$input}}" class="profile-load-image">
                            </label>
                            @error($input)
                              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                          </div>
                          <div class="mt-5 text-right">
                            <button class="btn btn-pink btnsave" type="submit">@lang('site.save')</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </div>

          <div class="container rounded bgsetting mt-4 mb-5">
            <form action="{{route('frontend.update_profile')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-12 border-right">
                  <div class="p-3 py-5">
                    <div class=" row  ">
                      <h4 class=" col-md-12 text-left profilepicname">@lang('site.personal_information')</h4>
                      <p class="col-md-12 text-left profilepictext">@lang('site.tell_us_about_your_self')</p>
                      <div class="row"></div>
                    </div>
                      <div class="row mt-2 pb-3">
                        @php
                            $input = "first_name";
                        @endphp
                        <div class="col-md-6">
                          <label class="labels">@lang('site.first_name')</label>
                          <input type="text" name="{{$input}}" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" 
                            value="{{ auth()->user()->{$input} }}" 
                            placeholder="@lang('site.first_name')">
                            @error($input)
                              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                          @php
                              $input = "last_name";
                          @endphp
                        <div class="col-md-6">
                          <label class="labels">@lang('site.last_name')</label>
                          <input type="text" name="{{$input}}" id="{{$input}}" class="form-control @error($input) is-invalid @enderror" 
                            value="{{ auth()->user()->{$input} }}" 
                            placeholder="@lang('site.last_name')">
                            @error($input)
                              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                      </div>
                      <div class="row mt-2 pb-3">
                        @php
                          $input = "location";
                        @endphp
                        <div class="col-md-6">
                          <label class="labels">@lang('site.location')</label>
                          <input type="text" name="{{$input}}" class="form-control @error($input) is-invalid @enderror"
                          value="{{ auth()->user()->{$input} }}" placeholder="@lang('site.location')">
                          @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                          @enderror
                        </div>
                        <!-- @php
                          $input = "phone";
                        @endphp -->
                        <div class="col-md-6">
                          <label class="labels">@lang('site.phone')</label>
                          <input type="text" name="phone" class="form-control @error($input) is-invalid @enderror"
                          value="{{ auth()->user()->phone}}" placeholder="@lang('site.location')">
                          @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                          @enderror
                        </div>
                      
                      </div>
                      <div class="row mt-2 pb-3 pb-3">
                        <div class="col-md-6">
                          @php
                            $input = "roles";
                          @endphp
                          <label class="labels">@lang('site.role')</label>
                          <select class="form-control @error($input) is-invalid @enderror" name="{{$input}}[]" multiple>
                            @foreach ($roles as $role)
                              <option value="{{$role->name}}" {{ in_array($role->name, auth()->user()->roles->pluck('name')->toArray()) ? 'selected':''}}>
                                  {{$role->display_name}}
                              </option>
                            @endforeach
                          </select>
                          @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          @php
                            $input = "domain_id";
                          @endphp
                          <label class="labels">@lang('site.domain_of_interest')</label>
                          <select class="form-control @error($input) is-invalid @enderror" name="{{$input}}">
                            @foreach ($domains as $domain)
                              <option value="{{$domain->id}}" {{auth()->user()->domain_id == $domain->id ? 'selected':''}}>{{$domain->name}}</option>
                            @endforeach
                          </select>
                          @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                          @enderror	
                        </div>
                      </div>
                      <div class="row mt-3 pb-3">
                        @php
                          $input="email";
                        @endphp
                        <div class="col-md-12">
                          <label class="labels">@lang('site.email')</label>
                          <input type="email" class="form-control @error($input) is-invalid @enderror" 
                          name="{{$input}}" value="{{ auth()->user()->{$input} }}" placeholder="@lang('site.email')">
                          @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                          @enderror	
                        </div>
                      </div>
                      <div class="row mt-3 pb-3">
                        @php
                            $input="summary";
                        @endphp
                        <div class="col-md-12">
                          <label class="labels">@lang('site.personal_summary')</label>
                          <textarea class="form-control @error($input) is-invalid @enderror" name="{{$input}}" rows="5">{{ auth()->user()->{$input} }}</textarea>
                          @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                          @enderror						
                        </div>
                      </div>
                      <div class="mt-5 text-right">
                        <button class="btn btn-pink btnsave" type="submit">@lang('site.save')</button>
                      </div>
                    </div>
                  </div>
              </div>
            </form>
          </div>

          <div class="container rounded bgsetting mt-4 mb-5">
            <form action="{{route('frontend.user_change_privacy')}}" method="post">
              @csrf 
              <div class="row">
                <div class="col-md-12 border-right">
                  <div class="p-3 py-5">
                    <div class=" row  ">
                      <h4 class=" col-md-12 text-left profilepicname">@lang('site.profile_settings')</h4>
                      <p class="col-12 text-left profilepictext">@lang('site.choose_how_profile_presented')</p>
                      <div class="row"></div>
                      </div>
                      @php
                        $input = 'is_private';
                      @endphp
                      <div class="row mt-2 ">
                        <div class="col-md-6"> 
                          <input type="radio" id="public" name="{{$input}}" class="check"
                          value="1" {{auth()->user()->{$input} == 1 ? 'checked':'' }}>
                          <label class="labels pl-3" for="public">@lang('site.public')</label>
                        </div>
                      </div>
                      <div class="row mt-2 ">
                        <div class="col-md-6"> 
                          <input type="radio" id="private" name="{{$input}}" class="check" 
                          value="0" {{auth()->user()->{$input} == 0 ? 'checked':'' }}>
                          <label class="labels pl-3" for="private">@lang('site.private')</label>
                        </div>
                      </div>
                      <div class="mt-5 text-right">
                        <button class="btn btn-pink btnsave" type="submit">@lang('site.save')</button>
                      </div>
                    </div>
                  </div>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
