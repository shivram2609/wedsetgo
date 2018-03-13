@extends('layouts.admin')
@section('content')
<div class="categories index">
	<h2><?php echo 'Messages'; ?></h2>
	<div class="input-group" >
			
					<a href="{{ url('message') }}" class="btn btn-submit add-btn clear-category" style="float: right;
font-size: 80%;"> Clear</a>
				</span>
			</div>
					<table cellpadding="0" cellspacing="0">
						<thead>
							<tr>
									<th>Message</th>
									<th>Sender</th>
									<th>Receiver</th>
									<th class="actions"><?php echo 'Actions'; ?></th>
							</tr>
						</thead>
						<tbody>
							@foreach($message as $messages)
							<tr>
								<td><a href="/admin_message_list/{{$messages->id}}">{{$messages->last_message}}</a></td>
								<td><?php if(!empty($messages->senderimage)) { ?>
										<img src="/uploads/avatars/{{ $messages->senderimage }}" alt="user" class="img-reponsive" width="20" height="40"> {{$messages->senderfname}} {{$messages->senderlname}}
									<?php } else { ?>
										<img src="{{URL::to('img/user-dummy.jpg')}}" alt="user" class="img-reponsive" width="20" height="40"> {{$messages->senderfname}} {{$messages->senderlname}}
									<?php }?></td>
								<td><?php if(!empty($messages->reciverimage)) { ?>
										<img src="/uploads/avatars/{{ $messages->reciverimage }}" alt="user" class="img-reponsive" width="20" height="40"> {{$messages->reciverfname}} {{$messages->reciverlname}}
									<?php } else { ?>
										<img src="{{URL::to('img/user-dummy.jpg')}}" alt="user" class="img-reponsive" width="20" height="40"> {{$messages->reciverfname}} {{$messages->reciverlname}}
									<?php }?></td>
								<td class="actions">
									<a href="/admin_message_list/{{$messages->id}}" class="btn btn-submit add-btn"> view conversation</a>
								</td>
							</tr>
						@endforeach
						</tbody>
						</table>
			<div class="paging">
				{!! $message->render() !!}		
			</div>
	</div>
</div>
@endsection
