@extends('layouts.app')
@section('pageTitle', __('site.home'))
@section('content')

    @include('frontend.includes._header')
    @include('frontend.sections.hero')
    @include('frontend.sections.services')
    @include('frontend.sections.faq')
    @include('frontend.sections.collaborate')
    @include('frontend.sections.educate')
    @include('frontend.sections.raise')
    @include('frontend.sections.testimonial')
    @include('frontend.sections.contact')

@endsection

