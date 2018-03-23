@extends('layouts.master')
@section('content')
@include('includes.top')
	<div class="dashboard-wrapper">
		<?php if(Auth::user()->id == $vision_title->user_id){?>
			<h1 class="form-group heading">{{$vision_title->vision_title}}<a href="javascript:void(0)" title="Edit" class="btn btn-white"></i></a> 
			</h1>
			<h2 class="heading-sub"><span><i class="fa fa-home" aria-hidden="true"></i> Add new photo in vision book</h2>
			<div class="file-loading">
				<a href="/photostream"><span class="add-icon"></span></a>
						<br>
						 Add new photo in vision book
			</div>
			<a href="mailto:?subject=Wedsetgo:Album&body={{$album_url}}" title="Share Album with friends"  class="btn btn-gray btn-block form-group"><i class="fa fa-user-plus" aria-hidden="true"></i></i> Share Album with friends</a>
			<?php } else { ?>
				
			<h1 class="form-group heading">{{ucfirst($vision_title->first_name)}} {{ucfirst($vision_title->last_name)}} 's Album {{$vision_title->vision_title}}<a href="javascript:void(0)" title="Edit" class="btn btn-white"></i> </a> 
			</h1>
			<?php } ?>
			<div class="modal fade" id="visionImage">
			  <div class="modal-dialog signup-signin">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" id="">&times;</button>
					  </div>
					  <div class="modal-body">
						<img src="" class="img-reponsive" width="512" height="375" id="popup_image">
					 </div>
					</div>
				</div>
			</div>
			@foreach($album as $albums)
			
			<div class="added-thumb">
				<div class="img-boxes view_image">
					<div class="overlay "><a href="#" class="btn-edit" title="View Image" data-toggle="modal" data-target="#visionImage">View Image</a></div>
					<?php if(!empty($albums->images)) { ?>
					<img src="/visionbook_images/{{$albums->images }}" alt="{{$albums->old_title}}" class="img-reponsive imgp" width="512" height="375">
					<?php } else { ?>
					<img src="" alt="$albums->old_title" class="img-reponsive" width="512" height="375">
					<?php } ?>
				</div>
				<div class="text-box">
					<div class="">
						<b>	{{$albums->old_title}}</b>
							<div>{{$albums->comments}}</div>
					<?php if(Auth::user()->id == $vision_title->user_id){?>
							<a href="/v_delete/{{$albums->vbc}}" onclick=" return confirm('do you really want to delete it?')" class="btn btn-bdrSml">Delete</a>
					<?php } ?>
					</div>
			   </div>
			</div>
			@endforeach
	</div>
</script>
@endsection
