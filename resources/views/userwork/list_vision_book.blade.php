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
			
				<div class="masonry">

					<?php $i = 0; ?>
					@foreach ($album as $albums)
					<?php ++$i; ?>
				    <div class="img-item <?php echo ($i>12)?"hide":""; ?>">
						<div class="img-box">
							<?php if(!empty($albums->images)) { ?>
								<img src="/visionbook_images/{{$albums->images }}" alt="img001" class="img-reponsive" width="512" height="375">
								<?php } else { ?>
								<img src="" alt="img001" class="img-reponsive" width="512" height="375">
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
@endsection
