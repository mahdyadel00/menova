@extends('layouts.app')
@section('pageTitle', __('site.raise'))
@section('content')
 
    <!-- main content -->
    <div class="list-section pt-80 pb-80 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
                    <div class="blue-textt">
                        We are
                    </div>
                    <p class="blue-title">
                        Coming soon
                    </p>

                    <div class="greyy-text">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour, or randomised words which don't look even slightly
                        believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                        anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the
                        Internet tend to repeat predefined chunks as necessary, making this the first true generator on
                        the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model
                        sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum
                        is therefore always free from repetition, injected humour, or non-characteristic words etc.
                    </div>
                    <br> <br>
                    <div class="row dflex">
                        <div class="form-group col-6">
                            <input type="email" class="form-control" id="exampleInputEmail1"
                              aria-describedby="emailHelp" placeholder="Enter Your Email Address">
                        </div>
                        <div class="mt-1 col-3 p-0">
                            <button class=" btn-pink btn ml-0">Notify me</button>
                        </div>
                        
                    </div>

                </div>
                <div class="col-6 mt-5 pl-5">
                    <div class="imgg">
                        <img src="{{ asset('frontend') }}/assets/img/Investment data-amico.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
