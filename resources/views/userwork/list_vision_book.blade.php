@extends('layouts.master')
@section('content')
@include('includes.top')
<div class="dashboard-wrapper">
				<div class="dashboard-form">
					
				</div>
				<div class="clearfix"></div>
			 <section class="photo-stream">	
			 <h2 class="heading">My Photo Stream</h4>
			 <div class="text-center">
			 <div class="file-loading">
					<a href="/photostream"><span class="add-icon"></span></a>
					<br>
					Add Vision Book
				</div>
			</div>
			<?php if(!empty($album)){ ?>
				<!--a href="#" data-toggle="modal" data-target="#invitefrnd" class="btn btn-gray btn-block form-group" ><h4>Invite friend to view vision book</h4></a-->
			<?php }?>
				<div class="masonry">

					<?php $i = 0; ?>
					@foreach ($album as $albums)
					<?php ++$i; ?>
				    <div class="img-item <?php echo ($i>12)?"hide":""; ?>">
						<div class="img-box">
							<?php if(!empty($albums->images)) { ?>
								<img src="/visionbook_images/{{$albums->images }}" alt="img001" class="img-reponsive" width="512" height="375">
								<?php } else { ?>
								<img src="" alt="" class="img-reponsive" width="512" height="375">
								<?php } ?>
						</div>
						<div class="text-box">
							<div class="">
							<b>	{{$albums->old_title}}</b>
								<div>{{$albums->comments}}</div>
								<a href="/v_delete/{{$albums->vbc}}" onclick=" return confirm('do you really want to delete it?')" class="btn btn-bdrSml">Delete</a>
							</div>
						</div>
					  </div>
				
				@endforeach
				</div>
				<?php if ($i >12) {  ?>
					<div class="text-center"><button class="btn btn-border" id="loadmore">Load More</button></div>
				<?php } ?>
			</section>
			<div class="text-center">
			
			</div>
		</div>
	
	</div>
	
	<div class="modal fade" id="invitefrnd">
	  <div class="modal-dialog signup-signin">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Invite Friend</h4>
			<button type="button" class="close" data-dismiss="modal" id="">&times;</button>
		  </div>
		  <!-- Modal body -->
		  <div class="modal-body">
		       {!! Form::open(['route' => 'userwork.work_invitation']) !!}
			<div class="input-group form-group">
			  <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
			 	{!! Form::input('email', 'email', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Email','required'=>'Please enter email' ]) !!}	
			 	<input type="hidden" value="{{$vision_book_id}}" name="visionbook_id"></input>
			 </div> 
			  <div class="form-group text-center">
			  {!! Form::submit('submit', ['class' => 'btn theme-btn-rct']) !!}
			 </div>
			{!! Form::close() !!}
		  </div>
		</div>
	  </div>
	</div>
@endsection
