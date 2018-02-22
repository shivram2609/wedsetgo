@extends('layouts.master')
@section('content')
<div class="container">	
	<!-- list container start -->
	<div class="productFull-viewList">
	<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
	<!-- Wrapper for slides -->
	 <div class="carousel-inner" role="listbox">
	<div class="carousel-item active">

		<div class="row">
		  <div class="holder col-sm-8 visionbook_image text-center">
			  <?php if(!empty($userphotogrid->images)) { ?>
				<img src="/work_image/{{$userphotogrid->images}}" alt="img012" class="img-fluid" width="981" height="844">
			 <?php } else { ?>
				<img src="img/img015.jpg" alt="img012" class="img-fluid" width="981" height="844">
			<?php } ?>
			<div class="slider-btn">
				 <a href="mailto:?subject=Wedsetgo:{{$userphotogrid->title}}&body={{$url}}" title="Email" text=""><i class="fa fa-envelope-o" aria-hidden="true"></i>
				 Email</a>
				  <a href="javascript:void(0);" title="Email" class="pullright"><i class="fa fa-expand" aria-hidden="true"></i>
				  <a href="javascript:void(0);" title="Email" class="pullleft hide" ><i class="fa fa-compress" aria-hidden="true"></i>
				</a>
			</div>
		  </div>
		  <div class="col-sm-4 visionbook_detail">
			<div class="carousel-caption">
				<div class="heading">
					<?php if(!empty($userphotogrid->profile_image)) { ?>
						<img src="/uploads/avatars/{{$userphotogrid->profile_image}}" alt="user" class="img-reponsive" width="47" height="51">
					<?php } else { ?>
						<img src="images/dummy-user.jpg" alt="user" class="img-reponsive" width="47" height="51">
					<?php } ?>
						{{$userphotogrid->title}}
					</div>
					<p>{{$userphotogrid->description}}</p>
					<p><b>Category:</b><br>
						{{$userphotogrid->name}}<br>
						<b>Date:</b><br>
						{{$userphotogrid->created_at}}<br>
						<b>Tags:</b><br>
						{{$userphotogrid->tag}} <br>
					</p>
						@if(Auth::check())
						<?php if($userphotogrid->user_id != Auth::user()->id) { ?>
						{!! Form::open() !!}
						    <?php if(!empty($visionbook)) { ?>
								
								<b id ="add_title"><label>Select vision book or </label><a id="" href="javascript:void(0);" class=""> Add New</a></b>
								{!! Form::select('vision_book_id', $visionbook,(isset($visionbook->vision_book_id)?$visionbook->vision_book_id:''), array("class"=>"form-control custom-select", "id"=>"vision_title")) !!}	
								<br>
								<b id ="new_title" class="hide"><label>Create new vision book or </label><a id="" href="javascript:void(0);" class=""> existing vision book</a></b>
								{!! Form::input('text', 'vision_title', null, ['class' => 'form-control hide', 'size' => 40, 'placeholder' => 'Enter Vision Book Title','required'=>'Please Enter Vision Book Title','id'=>'title' ,"disabled"=>"disabled" ]) !!}
								 <br>
								 {!! Form::input('text', 'comments', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Enter Comment','required'=>'Please Enter Comment' ]) !!}
								<br>
							<?php } else { ?>
								<label><b>Create new vision book</b></label>
								{!! Form::input('text', 'vision_title', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Enter Vision Book Title','required'=>'Please Enter Vision Book Title','id'=>'title'  ]) !!}
								<br>
								{!! Form::input('text', 'comments', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Enter Comment','required'=>'Please Enter Comment' ]) !!}
								
							 <?php } ?>
							 <br>
							 {!! Form::submit('Submit', ['class' => 'btn theme-btn-rct']) !!}
							{!! Form::close() !!}
						<?php } ?>
						@endif
						<div class="share-links">
						like the idea and the concept :
						<div class="social-links">
							 <a class="nav-link" href="#" title="Facebook"><img src="{{URL::to('img/facebook-icon.png')}}" alt="Facebook"></a>
							 <a class="nav-link" href="#" title="Twitter"><img src="{{URL::to('img/twitter-icon.png')}}" alt="Twitter"></a>
							 <a class="nav-link" href="#" title="Google Plus"><img src="{{URL::to('img/googlePlus-icon.png')}}" alt="Google Plus"></a>
							 <a class="nav-link" href="#" title="Linkedin"><img src="{{URL::to('img/linkedin-icon.png')}}" alt="Linkedin"></a>
							 </div>
						</div>  
						
			</div>
		  </div>
		 </div>
	</div>
		

	 </div>
	<div class="controllers col-sm-8 col-xs-12">
	<!-- Controls -->
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			  <span class="sr-only">Next</span>
			</a>
		  
	</div>

	 </div>	
	</div>	
</div>
@endsection
