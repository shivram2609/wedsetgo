@extends('layouts.master')
@section('content')
@include('includes.top')
		<div class="dashboard-wrapper">
			
				@include('includes.follower')
				<div class="dashboard-form">
					
				</div>
				<div class="clearfix"></div>
			 <section class="photo-stream">	
				 <br/>
				<div class="file-loading create-vision-book">
					<a href="/add_work"><span class="add-icon"></span></a>
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Add Work
				</div>
			 <h2 class="heading">My Photo Stream</h4>
			 <form method="get" action="" name="select_category">
				 <div class="form-group col-sm-12">
					Select Category
					{!! Form::select('catagory_id', $catagory,(isset($user_work->category_id)?$user_work->category_id:''), array("class"=>"custom-select", "id"=>"my_work_select")) !!}
				</div>
				</form>
				<div class="masonry">
					<?php $i = 0; ?>
					@foreach ($userwork as $userworks)
					<?php ++$i; ?>
				    <div class="img-item <?php echo ($i>12)?"hide":""; ?>">
						<div class="img-box">
							<div class="overlay"><a href="add_work/{{$userworks->id}}" class="btn-edit" title="Edit">Edit</a></div>
							<?php if(!empty($userworks->images)) { ?>
								<img src="/work_image/{{ $userworks->images }}" alt="img001" class="img-reponsive" width="512" height="375">
								<?php } else { ?>
								<img src="" alt="img001" class="img-reponsive" width="512" height="375">
								<?php } ?>
						</div>
						<div class="text-box">
							<?php if(!empty($userworks->profile_image)) { ?>
							<div class="img"><img src="/uploads/avatars/{{ $userworks->profile_image }}" alt="user" class="img-reponsive" width="47" height="51"></div>
							<?php } else { ?>
							<div class="img"><img src="img/dummy-user.jpg" alt="user" class="img-reponsive" width="47" height="51"></div>
							<?php } ?>
							<div class="text">
								<b>{{$userworks->title}}</b>
								{{ str_limit($userworks->description, 50) }}
							</div>
						</div>
					  </div>
				
				@endforeach
				</div>
				<?php if ($i >12) {  ?>
					<div class="text-center"><button class="btn btn-border" id="loadmore">Load More</button></div>
				<?php } ?>
			</section>
		</div>
	
	</div>
@endsection

	<!-- body container end -->
	    
   
