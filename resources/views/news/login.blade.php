@extends('layouts.master')
@section('title', $title)
@section('content')
    {!! Form::open([
        'route' => 'user.authenticate'
    ]) !!}
 <div class="top-space login-container">
			<div class="login-inner">
			<h1 class="heading">{{ $title }}</h1>
  			    <div class="tab-content">
				<div id="user" class="tab-pane fade in active">
					<div class="form-group">
						{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}	
						{!! Form::email('email', null, ['class' => 'form-control', 'size' => 40, ]) !!}				
					</div>
					<div class="form-group">
						{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
						{!! Form::password('password', null, ['class' => 'form-control', 'size' => 64, ]) !!}
					</div>
					<div class="row">
						<div class="col-sm-6 form-group">
							
						</div>
						<div class="col-sm-6 form-group text-right">
							<a href="forgotpassword" title="Forgot Password?">Forgot Password?</a>
						</div>
					</div>
					<div class="form-group text-right border-top">
						{!! Form::submit('Login', ['class' => 'btn btn-submit']) !!}
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
