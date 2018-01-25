@extends('layouts.admin')
@section('content')
<div class="categories index">
	<h2><?php echo 'Professional More Information'; ?></h2>
	{!! Form::open() !!}
			{!! Form::textarea('information', null, ['class' => 'form-control']) !!}</br></br>
			{!! Form::submit('Submit', ['class' => 'btn btn-submit']) !!}
			<span class="input-group-btn">
					<a href="/view_professional/{{$id}}" class="btn btn-submit add-btn clear-category"> Cancle</a>
				</span>
	{!! Form::close() !!}
</div>
@endsection
				
