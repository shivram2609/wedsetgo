@extends('layouts.admin')
@section('content')
<div class="categories form">
	{!! Form::open() !!}
	<fieldset>
		<legend><?php echo $title; ?></legend>
		{!! Form::label('name', 'Location Name', ['class' => 'control-label']) !!}
		{!! Form::text('name', (isset($location->location_name)?$location->location_name:''), ['class' => 'form-control']) !!}
	</fieldset>
		{!! Form::submit($title, ['class' => 'btn btn-submit']) !!}
		<a href="{{ url('locations') }}" class="btn btn-submit add-btn clear-category"> Cancel</a>
		{!! Form::close() !!}
</div>
@endsection
