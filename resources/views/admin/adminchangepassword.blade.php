@extends('layouts.admin')
@section('content')
<div class="users index">
    <div class="public-profile">
<div class="signin-outer">
<section class="sign-in">
		<?php //echo $this->Session->flash(); ?>
		<!--<h1><em class="signin-signup-icn"></em><?php echo 'CHANGE PASSWORD'; ?></h1>-->

		{!! Form::open() !!}
		<fieldset>
		<legend><?php echo ('Change Password'); ?></legend>
		
		<div class="fields">
			{!! Form::label('currentpassword', 'Current Password', ['class' => 'control-label']) !!}
			{!! Form::password('currentpassword', null, ['class' => 'form-control']) !!}
		</div>	

		<div class="fields">
			{!! Form::label('password', 'New Password', ['class' => 'control-label']) !!}
			{!! Form::password('password', null, ['class' => 'form-control']) !!}
		</div>	

		<div class="fields">
			{!! Form::label('Confirmed password_confirmation', 'New Confirmed Password', ['class' => 'control-label']) !!}
			{!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
		</div>	
                </fieldset>
		<!-- =====Button section start===== -->
		<div class="signup-signin-btn">
			{!! Form::submit('Submit', ['class' => 'btn btn-submit']) !!}
			 {!! Form::close() !!}
		</div>
		
</section>
</div>
</div>
</div>
@endsection
