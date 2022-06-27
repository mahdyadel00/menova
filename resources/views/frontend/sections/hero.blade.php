<!-- hero area -->
<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				
				<div class="col-12">
					
					<img class="heroimg" src="{{ asset('frontend') }}/assets/img/G1.png">

				</div>
			</div>
		</div>
	</div>
	<div class="product-section mt-150 mb-50">
		@auth
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="blue-text">Welcome   {{auth()->user()->fist_name}}  {{ auth()->user()->last_name }} ?? {{ auth()->user()->email }} </span> </h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
					</div>
				</div>
			</div>
			@endauth

			
		</div>
	</div>
	<!-- end hero area -->