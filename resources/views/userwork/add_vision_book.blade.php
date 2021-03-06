@extends('layouts.master')
@section('content')
<style>#st1{float:left}</style>
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
				<img src="/work_image/{{$userphotogrid->images}}" alt="{{$userphotogrid->first_name}}" class="img-fluid" width="981" height="844">
			 <?php } else { ?>
				<img src="img/img015.jpg" alt="" class="img-fluid" width="981" height="844">
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
						<h3>{{ucfirst($userphotogrid->title)}}</h3>
					</div>
						<p><b>Description:</b><br>
						<p>{{$userphotogrid->description}}</p>
						<p><b>Category:</b><br>
							{{$userphotogrid->name}}<br>
							<b>Date:</b><br>
							{{ Carbon\Carbon::parse($userphotogrid->created_at)->format('d-m-Y') }}
							<br>
							<b>Tags:</b><br>
							{{$userphotogrid->tag}} <br>
						</p>
						<p class=""><b>Created by:</b><br/>
						<?php if(!empty($userphotogrid->profile_image)) { ?>
							<img src="/uploads/avatars/{{$userphotogrid->profile_image}}" alt="{{$userphotogrid->first_name}}" class="img-reponsive product-user" width="47" height="51">
						<?php } else { ?>
							<img src="{{URL::to('img/user-dummy.jpg')}}" alt="" class="img-reponsive product-user" width="47" height="51">
						<?php } ?>
						<a href="{{ url('/p') }}/{{$userphotogrid->user_id}}-{{$userphotogrid->first_name}}-{{$userphotogrid->last_name}}" title="Your Profile">{{ucfirst($userphotogrid->first_name)}} {{ucfirst($userphotogrid->last_name)}}</a>
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
						<p>Share the link with your friend:</p>
						<div class="sharethis-inline-share-buttons"></div>
						  
						
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
