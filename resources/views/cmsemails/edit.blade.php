@extends('layouts.admin')
@section('content')
<div class="categories form">
	{!! Form::open() !!}
<fieldset>
		<legend><?php echo $title; ?></legend>
		{!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
		{!! Form::text('title', (isset($cmsemails->title)?$cmsemails->title:''), ['class' => 'form-control']) !!}
		{!! Form::label('emailfrom', 'Email From', ['class' => 'control-label']) !!}
		{!! Form::text('emailfrom', (isset($cmsemails->emailfrom)?$cmsemails->emailfrom:''), ['class' => 'form-control']) !!}
		{!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
		{!! Form::text('subject', (isset($cmsemails->subject)?$cmsemails->subject:''), ['class' => 'form-control']) !!}
		{!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
		{!! Form::textarea('editor', (isset($cmsemails->content)?$cmsemails->content:''), ['class' => 'form-control', 'id' =>'content']) !!}

	</fieldset>
	{!! Form::submit($title, ['class' => 'btn btn-submit']) !!}
	<a href="{{ url('cmsemails') }}" class="btn btn-submit add-btn clear-category"> Cancel</a>
	{!! Form::close() !!}
</div>
<script type="text/javascript" src="{!! asset('js/ckeditor/ckeditor.js') !!}"></script>
	<script>
	    CKEDITOR.replace( 'editor' );
	</script>
@endsection
