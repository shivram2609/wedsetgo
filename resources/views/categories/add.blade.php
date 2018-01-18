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
		<br/>
		<br/>
		<?php if (isset($category->is_active) && $category->is_active == 1 ) { ?>
			<input type="checkbox" name="is_active" id="is_active" checked /><label for="is_active">Active</label>
		<?php } else { ?>
			<input type="checkbox" name="is_active" id="is_active" /><label for="is_active">Active</label>
		<?php } ?>
	</fieldset>
		{!! Form::submit($title, ['class' => 'btn btn-submit']) !!}
		<a href="{{ url('catagories') }}" class="btn btn-submit add-btn clear-category"> Cancel</a>
		{!! Form::close() !!}
</div>
@endsection
