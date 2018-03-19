@extends('layouts.master')
@section('content')
<!-- filter bar -->
	<div class="filter-bar">
		{!! Form::open(["method"=>"get"]) !!}
		<div class="container">
			<div class="filter-sections">
			<label>Filter by Category</label> 
			{!! Form::select('catagory_id', [null=>'Please Select'] +$catagory,(isset($tmpQuery['catagory_id'])?$tmpQuery['catagory_id']:''), array("class"=>"custom-select")) !!}
			{!! Form::input("hidden",'view',($view)) !!}
			</div>
			<div class="filter-sections">
				<label>&nbsp;</label>
				<div class="views-icons">
					<a href="?view=grid<?php echo $tmpQString; ?>" title="Grid View" class="<?php echo (($view == 'grid')?'active':''); ?>" id="photostream_gridview"><i class="fa fa-th" aria-hidden="true"></i></a>
					<a href="?view=list<?php echo $tmpQString; ?>" title="List View" class="<?php echo (($view == 'list')?'active':''); ?>" id="photostream_listview"><i class="fa fa-th-list" aria-hidden="true"></i></a>
					<a href="?view=full_view" title="Full View" class="<?php echo (($view == 'full_view')?'active':''); ?>" id="photostream_fullview"><i class="fa fa-bars" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="filter-sections">
				<label>Sort by</label>
				{!! Form::select('sort_by', ["Newest"=>"Newest","Oldest"=>"Oldest"],(isset($tmpQuery['sort_by'])? ($tmpQuery['sort_by']=='Newest'? 'Newest':'Oldest') :''), array("class"=>"custom-select")) !!}
				
			</div>
			<div class="filter-sections">
				<label>Show Per Page</label>
				{!! Form::select('record_per_page', ["6"=>"6","12"=>"12","18"=>"18"],(isset($tmpQuery['record_per_page'])? ($tmpQuery['record_per_page']=='6'?'6':($tmpQuery['record_per_page']=='12'?'12':'18')) :''), array("class"=>"custom-select")) !!}
				
			</div>
			<div class="filter-sections">
				<label>&nbsp;</label>
				{!! Form::input('text','search_key',isset($tmpQuery['search_key'])?$tmpQuery['search_key']:'', ['class' => 'form-control search','placeholder' => "Search by keyword" ]) !!}
				
			</div>
			<div class="filter-sections">
				<label>Search In</label>
				{!! Form::select('search_val', [null=>'Please 
					Select',"pName"=>"Professional who uploaded","uwName"=>"Description/Title/Tag "],(isset($tmpQuery['search_val'])? ($tmpQuery['search_val']=='pName'?'pName':($tmpQuery['search_val']=='uwName'?'uwName':'pName')) :''), array("class"=>"custom-select")) !!}
				
			</div>
			<div  class="filter-sections">
				<label>&nbsp;</label>
			{!! Form::submit('Submit', ['class' => 'btn btn-submit clear-grid']) !!}
			<a href="{{ url('/photostream?view=') }}<?php echo $view; ?>" class="btn btn-submit clear-grid"> Clear</a>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
	 <!-- filter bar end-->
	 <!-- list container start -->
	<div class="container">	
		<?php $message = "Search result "; if (isset($tmpQuery['search_key']) && !empty($tmpQuery['search_key']) ) { 
			$message .= 'for "'.$tmpQuery['search_key'].'"';
		 } if ( isset($tmpQuery['search_val']) && !empty($tmpQuery['search_val']) ) { 
			 $message .= ' of "'.($tmpQuery['search_val']=='pName'?'Professional Name':'Title/Description').'"'; 
		 } else {
			 $message .= ' of "Professionals Name"'; 
		 }
		 if ( isset($tmpQuery['catagory_id']) && !empty($tmpQuery['catagory_id']) ) { 
			 $message .= ' in Category "'.$catagory[$tmpQuery['catagory_id']].'"'; 
		 }  ?>
		<p class="photostream"><?php echo $message; ?></p>
		
		
		<?php if (!empty($count)) {  ?>
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
		<?php } else { ?>
			<div class="empty">Sorry, No record found.</div>
		<?php } ?>
		<!-- pagination start -->
		<nav>
			@include('includes.pagination', ['paginator' => $userphotogrid->appends(request()->query())])
		</nav>
	</div>
	<!-- list container end -->
@endsection
