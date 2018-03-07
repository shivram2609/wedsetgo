@extends('layouts.master')
@section('content')
@include('includes.top')
<div class="dashboard-wrapper">			
		@include('includes.follower')
		<div class="dashboard-form overview">
		<div class="row">
				<div class="col-md-12 form-group">
						<div class="col-md-12 table-responsive">
					<h2>Messages</h2>
					
					<?php if (!empty($count)) {  ?>
						<ul class="rating-list">
						@foreach($message as $messages)
						
							<li>
								<p class="add_class"><a href="/message_list/{{$messages->id}}">{{$messages->last_message}}</a></p>
								<p class="short-message add_class">
									
									<?php if(!empty($messages->senderimage)) { ?>
										<img src="/uploads/avatars/{{ $messages->senderimage }}" alt="user" class="img-reponsive" width="20" height="40"> {{$messages->senderfname}} {{$messages->senderlname}}
									<?php } else { ?>
										<img src="{{URL::to('img/user-dummy.jpg')}}" alt="user" class="img-reponsive" width="20" height="40"> {{$messages->senderfname}} {{$messages->senderlname}}
									<?php }?>
									<?php if(!empty($messages->reciverimage)) { ?>
										<img src="/uploads/avatars/{{ $messages->reciverimage }}" alt="user" class="img-reponsive" width="20" height="40"> {{$messages->reciverfname}} {{$messages->reciverlname}}
									<?php } else { ?>
										<img src="{{URL::to('img/user-dummy.jpg')}}" alt="user" class="img-reponsive" width="20" height="40"> {{$messages->reciverfname}} {{$messages->reciverlname}}
									<?php }?>
								
								
								</p>
							</li>
						@endforeach
						</ul>
					<?php } else { ?>
						<div class="empty">Sorry, No record found.</div>
				<?php } ?>
						
				</div>
				<nav>
			@include('includes.pagination', ['paginator' => $message->appends(request()->query())])
		</nav>
		</div>
	 </div>
</div>


@endsection
