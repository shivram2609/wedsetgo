@extends('layouts.admin')
@section('content')
<div class="categories form">
	{!! Form::open() !!}
<fieldset>
		<legend><?php echo $title; ?></legend>
		{!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
		{!! Form::text('name', (isset($pages->name)?$pages->name:''), ['class' => 'form-control']) !!}
		{!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
		{!! Form::textarea('editor', (isset($pages->content)?$pages->content:''), ['class' => 'form-control', 'id' =>'content']) !!}
		{!! Form::label('metatitle', 'Metatitle', ['class' => 'control-label']) !!}
		{!! Form::text('metatitle', (isset($pages->metatitle)?$pages->metatitle:''), ['class' => 'form-control']) !!}
		{!! Form::label('seourl', 'Seourl', ['class' => 'control-label']) !!}
		{!! Form::text('seourl', (isset($pages->seourl)?$pages->seourl:''), ['class' => 'form-control']) !!}
		{!! Form::label('metadesc', 'Metadesc', ['class' => 'control-label']) !!}
		{!! Form::text('metadesc', (isset($pages->metadesc)?$pages->metadesc:''), ['class' => 'form-control']) !!}
		{!! Form::label('metakeyword', 'Metakeyword', ['class' => 'control-label']) !!}
		{!! Form::text('metakeyword', (isset($pages->metakeyword)?$pages->metakeyword:''), ['class' => 'form-control']) !!}
		{!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
		{!! Form::checkbox('status', 1,(isset($pages->status)?$pages->status:''), ['class' => 'form-control']) !!}

	</fieldset>
	{!! Form::submit($title, ['class' => 'btn btn-submit']) !!}
	<a href="{{ url('staticpages') }}" class="btn btn-submit add-btn clear-category"> Cancel</a>
	{!! Form::close() !!}
</div>
<script type="text/javascript" src="{!! asset('js/ckeditor/ckeditor.js') !!}"></script>
	<script>
	    CKEDITOR.replace( 'editor' );
	</script>
@endsection
