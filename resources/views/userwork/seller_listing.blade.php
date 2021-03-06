@extends('layouts.master')
@section('content')
<div class="filter-bar ">
		{!! Form::open(["method"=>"get"]) !!}
		<div class="container">
			<div class="filter-sections">
			<label>Filter by Category</label>
			{!! Form::select('catagory_id', [null=>'Please Select'] +$catagory,(isset($tmpQuery['catagory_id'])?$tmpQuery['catagory_id']:''), array("class"=>"custom-select")) !!}
			</div>
			<div class="filter-sections">
			<label>Search By Location</label>
			{!! Form::select('location_id', [null=>'Please Select'] +$location,(isset($tmpQuery['location_id'])?$tmpQuery['location_id']:''), array("class"=>"custom-select")) !!} 
			</div>
			<div class="filter-sections">
				<label>Show Per Page</label>
				{!! Form::select('record_per_page', ["5"=>"5","10"=>"10","15"=>"15"],(isset($tmpQuery['record_per_page'])? ($tmpQuery['record_per_page']=='5'?'5':($tmpQuery['record_per_page']=='10'?'10':'15')) :''), array("class"=>"custom-select")) !!}			
			</div>
			<div class="filter-sections">
				<label>&nbsp;</label>
				{!! Form::input('text','search_key',isset($tmpQuery['search_key'])?$tmpQuery['search_key']:'', ['class' => 'form-control search','placeholder' => "Search by keyword" ]) !!}
				
			</div>
			<div class="filter-sections">
				<label>&nbsp;</label>
			{!! Form::submit('Submit', ['class' => 'btn btn-submit clear-grid']) !!}
			<a href="{{ url('/seller') }}" class="btn btn-submit clear-grid"> Clear</a>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
	 <!-- filter bar end-->
	 <!-- list container start -->
<div class="container">	
	<?php if (!empty($count)) {  ?>
	@foreach($sellerList as $sellerLists)
	<div class="product-list">
				<div class="img-sec seller-list-new">
					<?php if(!empty($sellerLists->profile_image)) { /* ?>
						<img src="/uploads/avatars/{{$sellerLists->profile_image}}" alt="img012" class="img-reponsive seller_profile" width="981" height="844">
						*/ ?>
						<div class="profile_image img-responsive" style="background:url(/uploads/avatars/{{$sellerLists->profile_image}})" ></div>
					<?php } else { ?>
						<div class="profile_image" style="background:url({{URL::to('img/user-dummy.jpg')}})" ></div>
						
					<?php } ?>
				</div>
				<div class="text-sec">
					<div class="heading">
						
						<a href="{{ url('/p') }}/{{$sellerLists->id}}-{{$sellerLists->first_name}}-{{$sellerLists->last_name}}" title="{{ucfirst($sellerLists->first_name)}} {{ucfirst($sellerLists->last_name)}}" >{{ucfirst($sellerLists->first_name)}} {{ucfirst($sellerLists->last_name)}}</a>
					</div>
					<b>Description:</b><br>
						{{$sellerLists->trade_description}}
						<br>
					<b>Category:</b><br>
						{{$sellerLists->name}}<br>
						<br>
						<!--div class="share-links">
						like the idea and the concept :
							<div class="social-links">
								 <a class="nav-link" href="#" title="Facebook"><img src="{{URL::to('img/facebook-icon.png')}}" alt="Facebook"></a>
								 <a class="nav-link" href="#" title="Twitter"><img src="{{URL::to('img/twitter-icon.png')}}" alt="Twitter"></a>
								 <a class="nav-link" href="#" title="Google Plus"><img src="{{URL::to('img/googlePlus-icon.png')}}" alt="Google Plus"></a>
								 <a class="nav-link" href="#" title="Linkedin"><img src="{{URL::to('img/linkedin-icon.png')}}" alt="Linkedin"></a>
							</div>
						</div -->
				
				</div>
				</div>
				 @endforeach
			<?php } else { ?>
				<div class="empty">Sorry, No record found.</div>
			<?php } ?>
	<nav>
		@include('includes.pagination', ['paginator' => $sellerList->appends(request()->query())])
	</nav>
	
</div>

@endsection
