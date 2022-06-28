@extends('frontend.layouts.app')
@section('pageTitle', __('site.my_projects'))
@section('content')

<div class="mysoftware mt-100  pb-80 ">
		<div class="container">
    
            <div class="row">
  
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">	
                        <br>
						<h3><span class="pink-text">@lang('site.project_and_sevices') </span> </h3>
					</div>
               
				</div>
                <div class="col-md-12 text-center">
                    
                    <div class="container">
                        <div class="row height d-flex justify-content-center align-items-center">
                            <div class="col-md-5 ">
                                <div class="formsearch "> <i class="fa fa-search"></i> <input type="text" class="form-control form-inputsearch searchback" placeholder="Search anything..."> <span class="left-pan"></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
               

            </div>
            <div class="row mt-50">
                <div class="col-md-12 text-center ">
                    
                    <div class="container ">
                        <div class="row height d-flex justify-content-center align-items-center ">
                            <div class="col-sm-1 mt-10">
                                <div class="" >
                                    <img src="{{ asset('frontend') }}/assets/img/filter.svg">
                                </div>
                               
                            </div>
                            <div class="col-sm-2 mt-10">
                                <select class="form-select form-control form-inputsearch searchback" aria-label="Default select example">
                                    <option selected disabled>Country</option>
                                    <option value="1">Egypt</option>
                                    <option value="2">America</option>
                                    <option value="3">Egypt</option>
                                  </select>
                                  
                            </div>
                            <div class="col-sm-2 mt-10">
                                <select class="form-select form-control form-inputsearch searchback" aria-label="Default select example">
                                    <option selected disabled>City</option>
                                    <option value="1">Alexandria</option>
                                    <option value="2">Cairo</option>
                                    <option value="3">El Mansourah</option>
                                  </select>
                                  
                            </div>
                            <div class="col-sm-2 mt-10">
                                <select class="form-select form-control form-inputsearch searchback" aria-label="Default select example">
                                    <option selected disabled>Roles</option>
                                    <option value="1">Investor</option>
                                    <option value="2">Founder</option>
                                    <option value="3">Student</option>
                                    <option value="4">Freelancer</option>

                                  </select>
                                  
                            </div>
                            <div class="col-sm-3 mt-10">
                                <select class="form-select form-control form-inputsearch searchback" aria-label="Default select example">
                                    <option selected disabled>Domain of interest</option>
                                    <option value="1">Programming</option>
                                    <option value="2">Agriculture</option>
                                    <option value="3">Education</option>
                                    <option value="4">Commerce</option>

                                  </select>
                                  
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
       @php
        $user = Auth::user();
       
       @endphp
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card  product-card1" >
                      <div class="card-block m-5" >
                        <div class="row">
                            <div class="col-4">
                                <img  src="{{ $user->image_path}}" width="75px" height="75px">
                            </div>
                            <div class="card-title col-7">
                                <h5 class="mt-4 m-0 card-header11" > {{ $user->last_name }}  </h5>

                            </div>
                        </div>
                        <div class="row mt-3">
                            <p class="card-subtitle text-muted mt-2 col-12">test</p>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <a class=" btn-pinkbg btn " href="{{ route('frontend.chat.index') }}" ><i class="fa fa-envelope m-1 "></i>@lang('site.message')</a>

                            </div>
                            <div class="col-6">
                                <a class=" btn-pinkbg btn " href="{{ route('frontend.projects.show' , $user->id) }}" ><i class="fa fa-eye  m-1  "></i>@lang('site.view')</a>
        
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            
            </div>
                
        </div>
   
    </div>
    @if(count($projects))
        {!! $projects->links() !!}
    @endif
@endsection
