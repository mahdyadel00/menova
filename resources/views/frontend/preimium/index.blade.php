@extends('frontend.layouts.app')
@section('pageTitle', __('site.Get Preimium'))
@section('content')
	<!-- main content -->
	<div class="list-section pt-80 pb-80">
		<div class="container">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section">
					<h3><span class="pink-text">Premium Plan </span> </h3>
					<p>Unlock premium features to take your startup to the next level.</p>
				</div>
			</div> <br>
			<div class="row">
				<div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
					<div class="section-title">
						<span class="blue-text">Accelerate your startup journey </span>
						<p>Get the tools. Learn the skills. Accelerate your startup journey.</p>
					</div>

					<label class="d-flex">
						<span class="grey-text"> Monthly
						</span> <!-- Default switch -->
						<div class="custom-control custom-switch ml-2 m-1">

							<input type="checkbox" class="custom-control-input pink ml-3" id="customSwitches">
							<label class="custom-control-label" for="customSwitches"></label>
						</div>
						<span class="blue-text"> Annual
						</span>

					</label>

					<div class="container ">
						<div class="row ">
							<div class="black-text">
								$150
							</div>
							<div class="col">
								<div class="col-2 top-text">$30 off

								</div>
								<div class="col-6 col-sm-3">/ year</div>
							</div>
						</div>
					</div>
					<br>
					<div class="blueshade-text">
						What's Included?
					</div> <br>
					<ul class="list-group">
						<li class="list-group-item greyy-text"><img src="{{ asset( 'frontend' ) }}/assets/img/pinkk-check.png"> Unlimited
							Co-Founder Search.</li>
						<li class="list-group-item greyy-text"><img src="{{ asset( 'frontend' ) }}/assets/img/pinkk-check.png"> Access to
							exclusive events.</li>
						<li class="list-group-item greyy-text"><img src="{{ asset( 'frontend' ) }}/assets/img/pinkk-check.png"> Qualify to pitch
							to vetted investors ready to fund your dream.</li>
						<li class="list-group-item greyy-text"><img src="{{ asset( 'frontend' ) }}/assets/img/pinkk-check.png"> Access exclusive
							offers from our partners.</li>
						<li class="list-group-item greyy-text"><img src="{{ asset( 'frontend' ) }}/assets/img/pinkk-check.png"> Get full access
							to our learning center.</li>
					</ul> <br>
					<button class=" btn-pink btn " data-toggle="button" aria-pressed="false">Subscribe</button>
				</div>

				<div class="col-lg-6 col-md-6 mb-lg-0">
					<div class="h-100 w-100">
						<img src="{{ asset( 'frontend' ) }}/assets/img/pre.png">
					</div>
				</div>

			</div>

		</div>
	</div>
@endsection
