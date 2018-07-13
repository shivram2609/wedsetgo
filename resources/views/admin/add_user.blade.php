@extends('layouts.admin')
@section('content')
<div class="categories form">
	{!! Form::open() !!}
<fieldset>
		<legend><?php echo $title; ?></legend>
		{!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
		{!! Form::text('first_name', null, ['class' => 'form-control' ]) !!}
		
		{!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
		{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
		
		{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
		{!! Form::email('email', null, ['class' => 'form-control']) !!}
		
		{!! Form::label('user_type_id', 'User Type', ['class' => 'control-label']) !!}
		{!! Form::select('user_type_id', ["default"=>"Select User Type", "2"=>"Professional","3"=>"Bride/Groom"], array("class"=>"form-control", "id"=>"user_type_id", "placeholder"=>"Please select your user type")) !!}
		
		{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
		{!! Form::input('text', 'password', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Password','required'=>'Please enter password' ]) !!}
		<button type="button" class="btn btn-submit add-btn" onClick="populateform(this.form.thelength.value);" id="create_pass">Create Password</button>
		<input type="hidden" name="thelength" size=3 value="10">
		<br/>
		<br/>
		<?php if (isset($users->is_active) && $users->is_active == 1 ) { ?>
			<input type="checkbox" name="is_active" id="is_active" checked /><label for="is_active">Active</label>
		<?php } else { ?>
			<input type="checkbox" name="is_active" id="is_active" /><label for="is_active">Active</label>
		<?php } ?>
		
	</fieldset>
	{!! Form::submit($title, ['class' => 'btn btn-submit']) !!}
	{!! Form::close() !!}
</div>

@endsection

<script>
var keylist="abcdefghijklmABCDEFGHIJKLM1234567890nopqrstuvwxyz!@#$%^&*()_+NOPQRSTUVWXYZ"
var temp=''
 
function generatepass(plength){
temp=''
for (i=0;i<plength;i++)
temp+=keylist.charAt(Math.floor(Math.random()*keylist.length))
return temp
}
 
function populateform(enterlength){
document.getElementById('password').value=generatepass(12)
}
</script>

