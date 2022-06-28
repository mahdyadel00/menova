@extends('frontend.layouts.app')
@section('pageTitle', __('site.my_projects'))
@section('content')
@php
    $user = auth()->user();
@endphp
<div class="wave"></div>
    <div class="mysoftware mt-100  pb-80 ">
		<div class="container">
    
            <div class="row">
  
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">	
                        <br>
						<h3><span class="pink-text">{{ $user->first_name }} </span> </h3>
					</div>
               
				</div>
             

            </div>
     
            <div class="row softcard">
                @foreach($projects as $project)
				<div class="col-lg-4 col-md-6 card2" id="setting">
                    <div class="wrapper">
                        <div class="product-card">
                          <a href="#" class="product-link">
                            <center>
                                <img src='{{ $project->image_path }}'/>
                                </center>
                            <div class="overlay">
                                <div class="row mt-100">
                                    <div class="col-12 text-center">
                                        <a href="{{ route('frontend.projects.details' , $project->id) }}" class="btn-pinkbg1 btn "><i class="fa fa-eye"></i> {{ $project->title }}  </a> 
                                    </div>
                                   
                                </div>
                            </div>
                            <span class="info1">
                                <center class="softname">{{ $project->title }}</center>

                            </span>  
                            <span class="info">
                                    
                                <span class="title pargraph">
                                    {{ $project->description }}
                                </span>

                            </span>      
                          </a>
                       
                        </div>
                      </div>
				</div>
               @endforeach
				
            
            </div>
          
        </div>
        
    </div>
    @if(count($projects))
        {!! $projects->links() !!}
    @endif
@endsection
