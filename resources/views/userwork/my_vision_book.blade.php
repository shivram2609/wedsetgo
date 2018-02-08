@extends('layouts.master')
@section('content')
@include('includes.top')
	<div class="dashboard-wrapper">
			<h1 class="form-group heading">Vision Book’s Ideas <a href="javascript:void(0)" title="Edit" class="btn btn-white btn-secondary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> 
			</a> </h1>
			<h2 class="heading-sub"><span><i class="fa fa-home" aria-hidden="true"></i> Add Photos</h2>
				<div class="file-loading">
					<a href="/photostream"><span class="add-icon"></span></a>
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Add Vision Book
				</div>
		
			<!--div class="masonry"-->
			<?php $i = 1; ?>
					@foreach($myVisionBook as $myVisionBooks)
					<?php  if ($i == 1) { ?> <div class="masonry"> <?php  } ?>
					<?php ++$i;  ?>
				    <div class="img-item >">
						<div class="img-box">
							<?php if(!empty($myVisionBooks->images)) { ?>
								<img src="/visionbook_images/{{$myVisionBooks->images}}" alt="img001" class="img-reponsive" width="512" height="375">
								<?php } else { ?>
								<img src="" alt="img001" class="img-reponsive" width="512" height="375">
								<?php } ?>
						</div>
						<div class="text-box">
							<div class="text">
								<b>{{$myVisionBooks->old_title}}</b>
								<br/>
								{{$myVisionBooks->comments}}
							</div>
						</div>
					  </div>
				
				<?php if ($i == 4) { ?> </div> <?php  $i = 1; } ?>
				@endforeach
				<?php if ($i < 4) { ?> </div> <?php   } ?>
		</div>
	</div>


	
	<!-- body container end -->

@endsection
