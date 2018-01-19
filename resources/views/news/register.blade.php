@extends('layouts.admin')
@section('title', $title)
@section('content')
   {!! Form::open([
        'route' => 'user.store'
    ]) !!}
 <div class="top-space login-container">
			<div class="login-inner">
			<h1 class="heading">{{ $title }}</h1>
  			    <div class="tab-content">
				<div id="user" class="">
					<div class="form-group">
						{!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}	
						{!! Form::text('first_name', null, ['class' => 'form-control', 'size' => 40, ]) !!}			
					</div>
					<div class="form-group">
						{!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
						{!! Form::text('last_name', null, ['class' => 'form-control', 'size' => 40, ]) !!}
					</div>
					<div class="form-group">
						{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
						{!! Form::email('email', null, ['class' => 'form-control', 'size' => 40, ]) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
						{!! Form::password('password', null, ['class' => 'form-control', 'size' => 64, ]) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) !!}
						{!! Form::password('password_confirmation', null, ['class' => 'form-control', 'size' => 64, ]) !!}
					</div>
					<a href="socialAuth/twitter">Login With Twitter</a>
					<a href="socialAuth/facebook">Login With Twitter</a>
					<div class="form-group text-right border-top">
						{!! Form::submit('Signup', ['class' => 'btn btn-submit']) !!}
					</div>
                   
                    <div class="text-center border-top">
                     <div class="form-group clearfix"></div>
					</div>
				 </div>
			</div>
			</div>
        </div>
{!! Form::close() !!}
 
@endsection
