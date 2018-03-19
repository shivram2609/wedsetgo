@extends('layouts.admin')
@section('title', $title)
@section('content')
    {!! Form::open() !!}
<!-- SwankCook Signup Section-->
        <div class="top-space signup-container">
			<div class="login-inner">
			<h3 class="heading">{{ $title }}</h3>
  			  
			  <div class="tab-content">
				<div id="cook-sign-up" class="tab-pane fade  in active">
					
						<div class="input-group form-group">
						 <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
						  {!! Form::input('password', 'currentpassword', null, ['class' => 'form-control', 'placeholder' => 'Current password','required'=>'Please enter password' ]) !!}
						 </div>
						 <div class="input-group form-group">
						 <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
						  {!! Form::input('password','password', null, ['class' => 'form-control','placeholder' => 'Password']) !!}
						 </div>
						 <div class="input-group form-group">
						 <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
						  {!! Form::input('password','password_confirmation', null, ['class' => 'form-control','placeholder' => 'Confirm Password']) !!}
						 </div> 
						  <div class="form-group text-center">
						  {!! Form::submit('Change Password', ['class' => 'theme-btn-rct']) !!} 
						  </div>				
				</div>
				
				
			  </div>
			</div>
        </div>
{!! Form::close() !!}
 
@endsection

