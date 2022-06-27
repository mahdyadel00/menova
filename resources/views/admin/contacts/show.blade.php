@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('contacts.contacts')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">@lang('contacts.contacts')</a></li>
        <li class="breadcrumb-item">@lang('site.show')</li>
    </ul>

    <div class="row">

        <div class="col-12 col-md-8 mx-auto">

            <div class="tile shadow">

              <h2>@lang('contacts.subject') : {{$contact->subject}}</h2>

              <div class="mt-4">
                <span><i class="fas fa-envelope"></i></span>  
                <span>{{$contact->email}}<br>{{$contact->name}}</span>
              </div><!-- end of user -->

              <div class="my-4 border-1">
                <strong class="d-block">@lang('contacts.message')</strong>
                {!! $contact->message !!}
              </div><!-- end of message -->

              <h3>@lang('contacts.reply'):</h3>
              <form action="{{route('admin.contacts.replay', $contact->id)}}" method="post">
                @csrf
                @php
                  $input='reply';
                @endphp
                <div class="form-group">
                  <textarea name="{{$input}}" id="{{$input}}" class="form-control" cols="30" rows="10" required>{{old($input)}}</textarea>
                  @error($input)<div class="text-danger">{{$message}}</div>@enderror
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-reply"></i> @lang('site.reply')</button>
                </div>
              </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection


