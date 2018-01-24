@extends('layouts.admin')
@section('content')
<div class="categories index">
	<h2><?php echo 'Professional More Information'; ?></h2>
	{!! Form::open() !!}
			{!! Form::textarea('information', null, ['class' => 'form-control']) !!}</br></br>
			{!! Form::submit('Submit', ['class' => 'btn btn-submit']) !!}
	{!! Form::close() !!}
</div>
@endsection
