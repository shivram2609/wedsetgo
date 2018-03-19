@extends('layouts.admin')
@section('content')
<div class="categories form">
	{!! Form::open() !!}
	<fieldset>
		<legend><?php echo $title; ?></legend>
		{!! Form::label('name', 'Location Name', ['class' => 'control-label']) !!}
		{!! Form::text('name', (isset($location->location_name)?$location->location_name:''), ['class' => 'form-control']) !!}
		<br/>
		<br/>
		<?php if (isset($slider->is_active) && $slider->is_active == 1 ) { ?>
			<input type="checkbox" name="is_active" id="is_active" checked /><label for="is_active">Active</label>
		<?php } else { ?>
			<input type="checkbox" name="is_active" id="is_active" /><label for="is_active">Active</label>
		<?php } ?>
	</fieldset>
		{!! Form::submit($title, ['class' => 'btn btn-submit']) !!}
		<a href="{{ url('locations') }}" class="btn btn-submit add-btn clear-category"> Cancel</a>
		{!! Form::close() !!}
</div>
@endsection
