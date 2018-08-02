@extends('layouts.admin')
@section('content')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
<div class="categories form">
	{!! Form::open() !!}
<fieldset>
		<legend><?php echo $title; ?></legend>
		{!! Form::label('first_name', 'First Name', ['class' => 'control-label required']) !!}
		{!! Form::text('first_name', null, ['class' => 'form-control', 'required'=>'Please enter your name' ]) !!}
		
		{!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
		{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
		
		{!! Form::label('email', 'Email', ['class' => 'control-label required']) !!}
		{!! Form::email('email', null, ['class' => 'form-control', 'required'=>'Please enter your name']) !!}
		
		
		{!! Form::label('user_type_id', 'User Type', ['class' => 'control-label']) !!}
		{!! Form::select('user_type_id', [""=>"Select User Type", "2"=>"Professional","3"=>"Bride/Groom"], array("class"=>"form-control")) !!}
		
		{!! Form::label('gender', 'Gender', ['class' => 'control-label']) !!}
		{!! Form::select('gender', ["f"=>"Female","m"=>"Male","o"=>"Other"], array("class"=>"form-control new")) !!}
		
		{!! Form::label('phone', 'Phone No', ['class' => 'control-label']) !!}
		{!! Form::text('phone', null, ['class' => 'form-control']) !!}
		
		{!! Form::label('website', 'Website', ['class' => 'control-label']) !!}
		{!! Form::text('website', null, ['class' => 'form-control']) !!}
		
		{!! Form::label('dob', 'Dob', ['class' => 'control-label']) !!}
		{!! Form::text('dob', null, ['class' => 'form-control', 'id'=> 'dob']) !!}
		
		{!! Form::label('category_id', 'Business Category', ['class' => 'control-label required']) !!}
		{!! Form::select('category_id',[""=>'Please Select Category']+ $catagory,(isset($user->category_id)?$user->category_id:''), array("class"=>"form-control", "id"=>"category_selected")) !!}

		<div class="col-sm-6 form-group hide" id="other_cate">
			<label class="required">Other Category</label>
			<input type="text" name="other_category" class="form-control" value=""/>
		</div>
		
		{!! Form::label('trade_description', 'Trade Discription', ['class' => 'control-label']) !!}
		{!! Form::text('trade_description', null, ['class' => 'form-control', ]) !!}

		{!! Form::label('detail', 'Detail', ['class' => 'control-label']) !!}
		{!! Form::text('detail', null, ['class' => 'form-control', ]) !!}
		
		{!! Form::label('address', 'Street Address', ['class' => 'control-label']) !!}
		{!! Form::text('address', null, ['class' => 'form-control', 'id'=> 'address']) !!}
		
		{!! Form::label('country', 'Country', ['class' => 'control-label']) !!}
		{!! Form::text('country', null, ['class' => 'form-control', 'id'=> 'country']) !!}
		
		{!! Form::label('state', 'State/County', ['class' => 'control-label']) !!}
		{!! Form::text('state', null, ['class' => 'form-control', 'id'=> 'state']) !!}
		
		{!! Form::label('zipcode', 'Zipcode', ['class' => 'control-label']) !!}
		{!! Form::text('zipcode', null, ['class' => 'form-control', 'id'=> 'zipcode']) !!}
		
		{!! Form::label('location', 'City', ['class' => 'control-label required']) !!}
		{!! Form::select('location_id',[-1=>'Please Select Location'] +$location,(isset($user->location_id)?$user->location_id:''), array("class"=>"form-control", 'id'=>"location_select")) !!}
		
		<div class="col-sm-6 form-group hide" id="other_loc">
			<label class="required">Other City</label>
			<input type="text" name="other_location" class="form-control" value="" />
		</div>
		{!! Form::label('password', 'Password', ['class' => 'control-label required']) !!}
		{!! Form::input('text', 'password', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Password','required'=>'Please enter password' ]) !!}
		
		<button type="button" class="btn btn-submit add-btn" onClick="populateform(this.form.thelength.value);" id="create_pass">Create Password</button>
		
		
		<div class="row form-group">
							<label class="col-sm-12">Social Media:</label>
							<div class="col-sm-3 form-group">
								
								{!! Form::input('text','fb', null, ['class' => 'form-control new facbook-icon', 'size' => 40,'placeholder' => 'Facebook' ]) !!}
							</div>
							<div class="col-sm-3 form-group">
								{!! Form::input('text','google', (isset($socialVal['google'])?$socialVal['google']:''), ['class' => 'form-control new googlePlus-icon', 'size' => 40,'placeholder' => 'Google' ]) !!}
							</div>
							<div class="col-sm-3 form-group">
								{!! Form::input('text','twitter', null, ['class' => 'form-control new twitter-icon', 'size' => 40,'placeholder' => 'Twitter' ]) !!}
							</div>
							<div class="col-sm-3 form-group">
								{!! Form::input('text','instagram', null, ['class' => 'form-control new instagram-icon', 'size' => 40,'placeholder' => 'Instagram' ]) !!}
							</div>
						</div>
		<input type="hidden" name="thelength" size=3 value="10">
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
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
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

 $(document).ready(function(){		
	 $('#location_select').on('change', function () {
			var optionSelected = $(this).val();
			if(optionSelected =='0'){
				$('#other_loc').show();
			} else {
				$('#other_loc').hide();
			}
		});
		
	
      //  $('#category_selected').attr('disabled','disabled');
		 $('#category_selected').on('change', function () {
			var optionSelected = $(this).val();
			if(optionSelected =='0'){
				$('#other_cate').show();
			} else {
				$('#other_cate').hide();
			}
		});			
	});			
</script>

