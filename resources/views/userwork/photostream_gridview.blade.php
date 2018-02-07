@extends('layouts.master')
@section('content')
<!-- filter bar -->
	<div class="filter-bar">
		{!! Form::open(["method"=>"get"]) !!}
		<div class="container">
			I am looking for 
			{!! Form::select('catagory_id', [null=>'Please Select'] +$catagory,(isset($tmpQuery['catagory_id'])?$tmpQuery['catagory_id']:''), array("class"=>"custom-select")) !!}
			{!! Form::input("hidden",'view',($view)) !!}
			<div class="views-icons">
				<a href="?view=grid<?php echo $tmpQString; ?>" title="Grid View" class="<?php echo (($view == 'grid')?'active':''); ?>" id="photostream_gridview"><i class="fa fa-th" aria-hidden="true"></i></a>
				<a href="?view=list<?php echo $tmpQString; ?>" title="List View" class="<?php echo (($view == 'list')?'active':''); ?>" id="photostream_listview"><i class="fa fa-th-list" aria-hidden="true"></i></a>
				<a href="?view=full_view" title="Full View" class="<?php echo (($view == 'full_view')?'active':''); ?>" id="photostream_fullview"><i class="fa fa-bars" aria-hidden="true"></i></a>
			</div>
			<div class="filter-sections">
				Sort by 
				{!! Form::select('sort_by', ["Newest"=>"Newest","Oldest"=>"Oldest"],(isset($tmpQuery['sort_by'])? ($tmpQuery['sort_by']=='Newest'? 'Newest':'Oldest') :''), array("class"=>"custom-select")) !!}
				
			</div>
			<div class="filter-sections">
				Show Per Page
				{!! Form::select('record_per_page', ["5"=>"5","10"=>"10","15"=>"15"],(isset($tmpQuery['record_per_page'])? ($tmpQuery['record_per_page']=='5'?'5':($tmpQuery['record_per_page']=='10'?'10':'15')) :''), array("class"=>"custom-select")) !!}
				
			</div>
			<div class="filter-sections">
				{!! Form::input('text','search_key',isset($tmpQuery['search_key'])?$tmpQuery['search_key']:'', ['class' => 'form-control','placeholder' => "What's on your mind? eg. lehenga" ]) !!}
				
			</div>
			<div class="submit_grid">
			{!! Form::submit('Submit', ['class' => 'btn btn-submit clear-grid']) !!}
			<a href="{{ url('/photostream?view=') }}<?php echo $view; ?>" class="btn btn-submit clear-grid"> Clear</a>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
	 <!-- filter bar end-->
	 <!-- list container start -->
	<div class="container">	
		<?php if ($view == 'grid') {  ?>	
		<div class="product-grid-list">
			@include('includes.photostream')
		</div>
		<?php } elseif ($view == "list") { ?>
		<div class="listview">
			@include('includes.listview')
		</div>
		<?php } elseif ($view == "full_view") { ?>
		<div class="fullview">
			@include('includes.fullview')
		</div>
		<?php } ?>
		<!-- pagination start -->
		<nav>
			@include('includes.pagination', ['paginator' => $userphotogrid->appends(request()->query())])
		</nav>
	</div>
	<!-- list container end -->
@endsection
