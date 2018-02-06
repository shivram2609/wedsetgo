@extends('layouts.master')
@section('title', $title)
@section('content')
    {!! Form::open() !!}
<!-- SwankCook Signup Section-->
        <div class="top-space signup-container">
			<div class="login-inner">
			<h3 class="heading">{{ $title }}</h3>
  			  
			  <div class="tab-content">
				<div id="cook-sign-up" class="tab-pane fade  in active">
					
						<div class="form-group">
						{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}	
						{!! Form::password('password', null, ['class' => 'form-control', 'size' => 64, ]) !!}					
						</div>
						<div class="form-group">
						{!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) !!}	
						{!! Form::password('password_confirmation', null, ['class' => 'form-control', 'size' => 64, ]) !!}					
						</div>
						<div class="form-group text-right border-top">
						{!! Form::submit('Reset Password', ['class' => 'btn btn-submit']) !!}
						</div>					
				</div>
				
				
			  </div>
			</div>
        </div>
{!! Form::close() !!}
 
@endsection
