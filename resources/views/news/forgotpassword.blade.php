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
						{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}	
						{!! Form::email('email', null, ['class' => 'form-control', 'size' => 40, ]) !!}					
						</div>
						<div class="form-group text-right border-top">
						{!! Form::submit('Submit', ['class' => 'btn btn-submit']) !!}
						</div>					
				</div>
				
				
			  </div>
			</div>
        </div>
{!! Form::close() !!}
 
@endsection

