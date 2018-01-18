@extends('layouts.admin')
@section('content')
<div class="categories form">
	{!! Form::open(array("files"=>true)) !!}
	<fieldset>
		<legend><?php echo $title; ?></legend>
			{!! Form::label('heading', 'Heading', ['class' => 'control-label']) !!}
			{!! Form::text('heading', (isset($slider->heading)?$slider->heading:''), ['class' => 'form-control']) !!}
			{!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
			{!! Form::text('description', (isset($slider->description)?$slider->description:''), ['class' => 'form-control']) !!}
			{!! Form::label('image', 'Slider Image', ['class' => 'control-label']) !!}
			<?php if(isset($slider->image)) { ?>
				<img class="admin_category" src="<?php echo asset("/slider/$slider->image")?>">
			<?php } else { ?>
				
			<?php } ?>

		<br/>
		{!! Form::file('image_file', array('class' => 'form-control')) !!}
	</fieldset>
		{!! Form::submit($title, ['class' => 'btn btn-submit']) !!}
		<a href="{{ url('sliders') }}" class="btn btn-submit add-btn clear-category"> Cancel</a>
		{!! Form::close() !!}
</div>
@endsection
