@extends('layouts.admin')
@section('content')
<div class="categories index">
	<h2><?php echo 'Messages conversations'; ?></h2>
	{!! Form::open() !!}
			<table class="table table-hover">
									<ul class="rating-list">
									@foreach($listMessage as $messages)
									
										<li>
											<p class="add_class">{{$messages->message}}</p>
											<p class="short-message add_class">
												
												<?php if(!empty($messages->profile_image)) { ?>
													<img src="/uploads/avatars/{{$messages->profile_image }}" alt="user" class="img-reponsive" width="20" height="40"> {{$messages->first_name}} {{$messages->last_name}}
												<?php } else { ?>
													<img src="{{URL::to('img/user-dummy.jpg')}}" alt="user" class="img-reponsive" width="20" height="40"> {{$messages->first_name}} {{$messages->last_name}}
												<?php }?>
											</p>
										</li>
										@endforeach
									</ul>
									<br>
			<textarea class="form-control" placeholder="Address" name="message"> </textarea><br>
			<input type="hidden" name="message_list" value="{{$messages->id}}"></input><br>
			{!! Form::submit('Reply', ['class' => 'btn btn-submit read-more']) !!}

	{!! Form::close() !!}
	</div>
@endsection
