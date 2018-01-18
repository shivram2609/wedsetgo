@extends('layouts.master')
@section('content')
  <!-- Page Content -->
	<!-- body container start -->
	<div class="container">
		
		<div class="contactUs-top">
			<h1 class="heading">Contact Us</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus 
			vitae condimentum egestas, libero dolor auctor tellus</p>
		</div>
		<div class="row contact-address">
			<div class="col-sm-4 text-center form-group">
			<i class="fa fa-map-marker" aria-hidden="true"></i>
			<h2 class="heading" >Address</h2>
			<p>25, Lomonosova St. <br>
			Moscow, Russia, 160059</p>
			</div>
			<div class="col-sm-4 text-center form-group address-sec">
			<i class="fa fa-phone" aria-hidden="true"></i>
			<h2 class="heading">Phone</h2>
			<p>+9034 949-08-83 <br>
			+90 239 505-58-01</p>
			</div>
			<div class="col-sm-4 text-center form-group">
			<i class="fa fa-envelope-o" aria-hidden="true"></i>
			<h2 class="heading">Email</h2>
			<p><a class="nav-link" href="mailto:wedsetgo@domain.com" title="contactwedsetgo@gmail.com">contactwedsetgo@gmail.com</a></p>
			</div>
		</div>


	</div>
	<div class="map-form">
		<div class="row">
			<div class="col-md-6" id="map" >
			</div>
			<div class="col-md-6 form-section">
			<h3 class="heading ml-3">Send Us a Message</h3>
				{!! Form::open() !!}
					<div class="row mr-0 ml-0">
						<div class="col-sm-6 form-group">
							{!! Form::input('text','firstname', null, ['class' => 'form-control', 'size' => 40, 'placeholder'=>'First Name' ]) !!}	
						</div>
						<div class="col-sm-6 form-group">
							{!! Form::input('text','lastname', null, ['class' => 'form-control', 'size' => 40, 'placeholder'=>'Last Name' ]) !!}	
						</div>
					</div>
					<div class="row mr-0 mr-0">
						<div class="col-sm-6 form-group">
							{!! Form::input('email', 'email', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'email' ]) !!}	
						</div>
						<div class="col-sm-6 form-group">
							{!! Form::input('text','phone', null, ['class' => 'form-control', 'size' => 40,'placeholder' => 'Phone Number' ]) !!}	
						</div>
					</div>
					<div class="row mr-0 mr-0">
						<div class="col-sm-12 form-group">
							<textarea class="form-control" name="message" cols="50" rows="10"></textarea>
						</div>
						
					</div>
					{!! Form::submit('Send Message', ['class' => 'btn theme-btn-rct']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection





	<!-- body container end -->
	    
