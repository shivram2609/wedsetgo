@extends('layouts.admin')
@section('content')
<div class="categories form">
	{!! Form::open() !!}
<fieldset>
		<legend><?php echo $title; ?></legend>
		{!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
		{!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
		{!! Form::textarea('editor', null, ['class' => 'form-control', 'id' =>'content']) !!}
		{!! Form::label('metatitle', 'Metatitle', ['class' => 'control-label']) !!}
		{!! Form::text('metatitle', null, ['class' => 'form-control']) !!}
		{!! Form::label('seourl', 'Seourl', ['class' => 'control-label']) !!}
		{!! Form::text('seourl', null, ['class' => 'form-control']) !!}
		{!! Form::label('metadesc', 'Metadesc', ['class' => 'control-label']) !!}
		{!! Form::text('metadesc', null, ['class' => 'form-control']) !!}
		{!! Form::label('metakeyword', 'Metakeyword', ['class' => 'control-label']) !!}
		{!! Form::text('metakeyword', null, ['class' => 'form-control']) !!}
		{!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
		{!! Form::text('status', null, ['class' => 'form-control']) !!}

	</fieldset>
	{!! Form::submit($title, ['class' => 'btn btn-submit']) !!}
	{!! Form::close() !!}
</div>
<script type="text/javascript" src="{!! asset('js/ckeditor/ckeditor.js') !!}"></script>
	<script>
	    CKEDITOR.replace( 'editor' );
	</script>
@endsection
