@extends('layouts.app')
@section('pageTitle', __('site.my_projects'))
@section('content')

<div class="product-section mt-70 pt-80 " id="connect">
		<div class="container">
			<div class="row">
			
			
				<div class="col-lg-12 col-md-6 mb-4 mb-lg-0">
					<div class=" d-flex align-items-center col-12">
					<video src="{{ $project->attachment }}" controls height="400px" width="100%"></video>	
					</div>
				</div>
			
			</div>
			
			<div class="row lightplue mb-5 ">
			
				
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0 ">
					<div class="align-items-center col-12">
						
						<div class="center mt-51">
							 <center class="m-50"> 
								 <h4> @lang('site.project_name')</h4>
								 <p>{{ $project->title}} </p>	
							</center>
						
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0 ">
					<div class="align-items-center col-12">
						
						<div class="center mt-51">
							 <center class="m-50"> 
								 <h4>@lang('site.project_type')</h4>
								 
								 <p>{{ $project_type->data->isNotEmpty() ? $project_type->data->first()->name : '' }} </p>	
							</center>
						
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0 ">
					<div class="align-items-center col-12">
						
						<div class="center mt-51">
							 <center class="m-50"> 
								 <h4>@lang('site.domain_of_interest')</h4>
								 
								 <p>{{ $domain->data->isNotEmpty() ? $domain->data->first()->name : ''}}</p>	
							</center>
						
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="product-section  mb-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-left">
					<div class="section-title1 text-left ">	
						<h3><span class="pink-text">@lang('site.project_details') </span> </h3>
						<p class="gr">{{ $project->description }}</p>
					</div>
				</div>
				<div class="col-lg-10 offset-lg-1 text-left mt-5">
					<div class="section-title1 text-left ">	
							<img src="{{ $project->image_path }}" width="100%" height="300px">
					</div>
				</div>
			</div>
			<!-- <div class="row">
		
				<div class="col-lg-5 offset-lg-1 text-left mt-5">
					<div class="section-title1 text-left ">	
							<img src="assets/img/home2.jpg" width="100%" height="300px">
					</div>
				</div>
				<div class="col-lg-5  text-left mt-5">
					<div class="section-title1 text-left ">	
							<img src="assets/img/home3.jfif" width="100%" height="300px">
					</div>
				</div>
			</div> -->
			<div class="row">
		
				<div class="col-lg-10 offset-lg-1 text-left mt-5">
						<a class=" btn-pinkbg2 btn w-100 ">
							<center class="Preimium mt-51">Discuss project with us</center>
						</a>
				</div>
		
			</div>

			
		</div>
	</div>
@endsection
