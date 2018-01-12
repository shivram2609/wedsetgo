@extends('layouts.admin')
@section('content')
<div class="categories form">
	{!! Form::open(array("files"=>true)) !!}
	<fieldset>
		<legend><?php echo $title; ?></legend>
		{!! Form::label('name', 'Catagory Name', ['class' => 'control-label']) !!}
		{!! Form::text('name', (isset($category->name)?$category->name:''), ['class' => 'form-control']) !!}
		<br/>
		 
			{!! Form::label('image', 'Catagory Image', ['class' => 'control-label']) !!}
			<?php if(isset($category->image)) { ?>
				<img class="admin_category" src="<?php echo asset("/categories/$category->image")?>">
			<?php } else { ?>
				
			<?php } ?>

		<br/>
		{!! Form::file('image_file', array('class' => 'form-control')) !!}
	</fieldset>
		{!! Form::submit($title, ['class' => 'btn btn-submit']) !!}
		<a href="{{ url('catagories') }}" class="btn btn-submit add-btn clear-category"> Cancel</a>
		{!! Form::close() !!}
</div>
@endsection
