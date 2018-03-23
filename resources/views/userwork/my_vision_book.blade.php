@extends('layouts.master')
@section('content')
@include('includes.top')
	<div class="dashboard-wrapper">
		<h1 class="form-group heading">Vision Book Album <a href="javascript:void(0)" title="Edit" class="btn btn-white"></i> 
			</a> </h1>
			<h2 class="heading-sub"><span><i class="fa fa-home" aria-hidden="true"></i> Add New Vision Book</h2>
				<div class="file-loading">
					<a href="/photostream"><span class="add-icon"></span></a>
					<br>
					 Add New Vision Book
				</div>
			@foreach($myVisionBook as $myVisionBooks)
			<div class="added-thumb">
				<div class="img-boxes">
					<div class="overlay"><a href="/album/{{$myVisionBooks->id}}-{{$myVisionBooks->vision_title}}" class="btn-edit" title="View Album">View Album</a></div>
					<?php if(!empty($myVisionBooks->images)) { ?>
					<img src="/visionbook_images/{{$myVisionBooks->images}}" alt="{{$myVisionBooks->vision_title}}" class="img-fluid" width="200" height="200">
					<?php } else { ?>
					<img src="{{URL::to('img/user-dummy.jpg')}}" alt="{{$myVisionBooks->vision_title}}" class="img-fluid" width="200" height="200">
					<?php } ?>
				</div>
				
			</div>
			@endforeach
	</div>
		<?php /*
		
		
			<h1 class="form-group heading">Vision Book’s Ideas <a href="javascript:void(0)" title="Edit" class="btn btn-white btn-secondary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> 
			</a> </h1>
			<section class="photo-stream">	
			<h2 class="heading-sub"><span><i class="fa fa-home" aria-hidden="true"></i> Add Photos</h2>
				<div class="file-loading">
					<a href="/photostream"><span class="add-icon"></span></a>
					<br>
					 Add Vision Book
				</div>
		
			<!--div class="masonry"-->
			<?php $i = 1; ?>
					@foreach($myVisionBook as $myVisionBooks)
					<?php  if ($i == 1) { ?> <div class="masonry"> <?php  } ?>
					<?php ++$i;  ?>
				    <div class="img-item">
						<div class="img-box">
							<div class="overlay"><a href="/v_list/{{$myVisionBooks->id}}-{{$myVisionBooks->vision_title}}" class="btn-edit" title="View Album">View Album</a></div>
							<?php if(!empty($myVisionBooks->images)) { ?>
								<img src="/visionbook_images/{{$myVisionBooks->images}}" alt="img001" class="img-reponsive" width="512" height="375">
								<?php } else { ?>
								<img src="{{URL::to('img/user-dummy.jpg')}}" alt="img001" class="img-reponsive" width="512" height="375">
								<?php } ?>
						</div>
						<div class="text-box">
							<div class="">
								<div><b>{{$myVisionBooks->vision_title}}</b></div>
								<a href="v_delete_album/{{$myVisionBooks->id}}-{{$myVisionBooks->vision_title}}" onclick=" return confirm('do you really want to delete it?')" class="btn btn-bdrSml"> Delete Album</a>
							</div>
						</div>
					  </div>
				
				<?php if ($i == 4) { ?> </div> <?php  $i = 1; } ?>
				@endforeach
				<?php if ($i < 4) { ?> </div> <?php   } ?>
		</div>
	</div>
</section>

	
	<!-- body container end -->


*/ ?>
@endsection
