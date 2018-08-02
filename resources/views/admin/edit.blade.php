@extends('layouts.admin')
@section('content')
<div class="categories form">
	{!! Form::open() !!}
<fieldset>
		<legend><?php echo $title; ?></legend>
		{!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
		{!! Form::text('first_name', (isset($users->first_name)?$users->first_name:''), ['class' => 'form-control', 'readonly' => 'true']) !!}
		
		{!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
		{!! Form::text('last_name', (isset($users->last_name)?$users->last_name:''), ['class' => 'form-control', 'readonly' => 'true']) !!}
		
		{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
		{!! Form::email('email', (isset($users->email)?$users->email:''), ['class' => 'form-control', 'readonly' => 'true']) !!}
		<?php if ($users->is_change == '0') { ?>
		{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
		{!! Form::text('password', (isset($users->user_password)?$users->user_password:''), ['class' => 'form-control', 'readonly' => 'true']) !!}
		<?php } else if(($users->is_change == Null)) { ?>
		{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
		{!! Form::password('password', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
		<?php }?>
		{!! Form::label('user_type_id', 'User Type', ['class' => 'control-label']) !!}
		{!! Form::select('user_type_id', ["2"=>"Professional","3"=>"Bride/Groom"],(isset($users->user_type_id)?$users->user_type_id:''), array("class"=>"form-control", "id"=>"user_type_id", "placeholder"=>"Please select your user type")) !!}
		
<!--
		{!! Form::label('user_type_id', 'User Type', ['class' => 'control-label']) !!}
		<?php  $user_type = (!empty($users->user_type_id==2)?'Professional':'Buyer'); ?>
		{!! Form::text('user_type_id', $user_type, ['class' => 'form-control', 'readonly' => 'true']) !!}
-->
		<br/>
		<br/>
		<?php if (isset($users->is_active) && $users->is_active == 1 ) { ?>
			<input type="checkbox" name="is_active" id="is_active" checked /><label for="is_active">Active</label>
		<?php } else { ?>
			<input type="checkbox" name="is_active" id="is_active" /><label for="is_active">Active</label>
		<?php } ?>
		
	</fieldset>
	{!! Form::submit($title, ['class' => 'btn btn-submit']) !!}
	<a href="{{ url('users') }}" class="btn btn-submit add-btn clear-category"> Cancel</a>
	{!! Form::close() !!}
</div>
@endsection
