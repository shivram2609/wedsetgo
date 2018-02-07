@extends('layouts.master')
@section('content')
@include('includes.top')
	<div class="dashboard-wrapper">
			
		@include('includes.follower')
		<div class="dashboard-form overview">
			<div class="row">
				<div class="col-md-9 form-group">
					<?php if(!empty($sellerProfile->detail)) { ?>
						<p>{{$sellerProfile->detail}}</p>
					<?php }?>
					<h1 class="heading-main">Services Provided</h1>
					<?php if(!empty($sellerProfile->trade_description)){ ?>
						<p class="short_desc">{{ str_limit($sellerProfile->trade_description, 150) }}</p>
						<p class="long_desc hide">{{ $sellerProfile->trade_description }}</p>
					<a href="javascript:void(0);" title="Read more" class="btn read-more" id="read-more">Read more <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					<?php }?>
					<?php if($user->user_type_id == 2) { 
						if($count > 0 ) { ?>
							<h2 class="heading-main">{{$count}} Works <i class="fa fa-angle-right" aria-hidden="true"></i></h2>
						<?php } else { ?>
							<h2 class="heading-main">{{$count}} Work <i class="fa fa-angle-right" aria-hidden="true"></i></h2>
						<?php } $i = 0; $j =0; ?>
						@foreach ($sellerwork as $sellerworks)
							<?php if ($i == 0) {  ?><div class="product-grid-list"> <?php } ?>
							<?php  ++$i; 
							++$j; ?>
							
							<div class="list-box <?php echo ($j>5)?"hide":""; ?>" >
								<div class="inner-box">
									<div class="img-box">
										<?php if(!empty($sellerworks->images)) { ?>
											<img src="/work_image/{{ $sellerworks->images }}" alt="img001" class="img-reponsive" width="493" height="437">
										<?php } else { ?>
											<img src="img/img013.jpg" class="img-reponsive" alt="img013" width="493" height="437">
										<?php }?>
									</div>
									<div class="text-box">
										<?php if(!empty($sellerworks->profile_image)) { ?>
												<div class="img"><img src="/uploads/avatars/{{ $sellerworks->profile_image }}" alt="user" class="img-reponsive" width="35" height="51"></div>
											<?php } else { ?>
												<div class="img"><img src="img/dummy-user.jpg" alt="user" class="img-reponsive" width="35" height="51"></div>
										<?php }?>
									
										<div class="text">
											<b>{{$sellerworks->title}}</b>
											{{ str_limit($sellerworks->description, 50) }}
										</div>
									</div>
								</div>
							</div>
							
							
							
							<?php if ($i == 3) { ?></div> <?php $i = 0; } ?>
						@endforeach
							<?php if ($i > 0 && $i < 3) { ?></div> <?php } ?>
						
					<?php } ?>
					
				</div>	
				
				<div class="col-md-3 form-group">
					<div class="right-row">
						<b><i class="fa fa-user" aria-hidden="true"></i> Contact:</b> 
						<span>{{ucfirst($sellerProfile->first_name)}} {{ucfirst($sellerProfile->last_name)}}</span>
					</div>
					<div class="right-row">
						<b><i class="fa fa-map-marker" aria-hidden="true"></i> Location:</b> 
						<span>{{$sellerProfile->address}}</span>
					</div>
				</div>
			</div>
			<?php if (isset($j) && $j >5) {  ?>
				<div class="text-center"><button class="btn btn-border" id="load_more">Load More</button></div>
			<?php } ?>
		</div>
	</div>		
			
@endsection
