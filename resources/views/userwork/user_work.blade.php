@extends('layouts.master')
@section('content')
@include('includes.top')

		<div class="dashboard-wrapper">
				@include('includes.follower')
				<div class="dashboard-form text-center">
				<div class="dashboard-form">
					
				</div>
				
			 	
				 <br/>
				<div class="file-loading create-vision-book">
					<a href="/add_work"><span class="add-icon"></span></a>
					<br>
					 Add Work
				</div>
				</div>
				<section class="photo-stream">
			 <h2 class="heading">My Photo Stream</h4>
			 <form method="get" action="" name="select_category">
				 <div class="form-group col-sm-12">
					Select Category
					{!! Form::select('catagory_id', [null=>'Please Select'] +$catagory,(isset($tmpQuery['catagory_id'])?$tmpQuery['catagory_id']:''), array("class"=>"custom-select", "id"=>"my_work_select")) !!}
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
								<img src="/work_image/{{ $userworks->images }}" alt="<?php echo $userworks->images?>" class="img-reponsive" width="512" height="375">
								<?php } else { ?>
								<img src="" alt="" class="img-reponsive" width="512" height="375">
								<?php } ?>
						</div>
						<div class="text-box">
							<?php if(!empty($userworks->profile_image)) { ?>
							<div class="img"><img src="/uploads/avatars/{{ $userworks->profile_image }}" alt="<?php echo $userworks->profile_image?>" class="img-reponsive" width="47" height="51"></div>
							<?php } else { ?>
							<div class="img"><img src="{{URL::to('img/user-dummy.jpg')}}" alt="" class="img-reponsive" width="47" height="51"></div>
							<?php } ?>
							<div class="text">
							<b><a href="{{ url('/v') }}/{{$userworks->id}}-{{$user->first_name}}-{{$user->last_name}}" > {{$userworks->title}}</a></b>
								{{ str_limit($userworks->description, 30) }}
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
	    
   
