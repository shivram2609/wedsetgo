@extends('layouts.master')
@section('content') 
@include('includes.top')
	<div class="dashboard-wrapper">
			
			{!! Form::open(array("files"=>true)) !!}
			<fieldset>
				<legend><?php echo $title; ?></legend>
					{!! Form::label('title', 'Title', ['class' => 'control-label required']) !!}
					{!! Form::text('title', (isset($user_work->title)?$user_work->title:''), ['class' => 'form-control']) !!}
					{!! Form::label('description', 'Description', ['class' => 'control-label required']) !!}
					{!! Form::textarea('description', (isset($user_work->description)?$user_work->description:''), ['class' => 'form-control']) !!}
					{!! Form::label('tag', 'Tag', ['class' => 'control-label required']) !!}
					{!! Form::text('tag', (isset($user_work->tag)?$user_work->tag:''), ['class' => 'form-control']) !!}
					{!! Form::label('catagory_id', 'Business Category', ['class' => 'control-label required']) !!}
					{!! Form::select('catagory_id', $catagory,(isset($user_work->catagory_id)?$user_work->catagory_id:''), array("class"=>"form-control custom-select form-group")) !!}
					{!! Form::label('image_file', 'Work Image', ['class' => 'control-label required']) !!}
					<?php if(isset($user_work->images)) { ?>
					<img class="admin_category form-group" src="<?php echo asset("/work_image/$user_work->images")?>" >
					<?php } else { ?>
						
					<?php } ?>
					<br/>
					{!! Form::file('image_file', array('class' => 'form-control')) !!}
			</fieldset>
			<br/>
				{!! Form::submit($title, ['class' => 'btn clear-grid']) !!}
				{!! Form::close() !!}
	</div>

@endsection
	<!-- body container end -->
	    
   
