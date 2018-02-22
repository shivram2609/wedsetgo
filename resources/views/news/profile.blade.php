@extends('layouts.master')
@section('content')
@include('includes.top')
	<div class="dashboard-wrapper">
		@include('includes.follower')
		<?php $rate = (number_format($rating['aggregateRating'],2,".",""))*20;  ?>
		<div class="dashboard-form overview">
			<div class="row">
				<div class="col-md-9 form-group">
					<?php if(!empty($sellerProfile->detail)) { ?>
						<p>{{$sellerProfile->detail}}</p>
					<?php } else {?>
						Welcome new user, Please start your work.
					<?php }?>
					<h1 class="heading-main">Services Provided</h1>
					<?php if(!empty($sellerProfile->trade_description)){ ?>
						<p class="short_desc">{{ str_limit($sellerProfile->trade_description, 70) }}</p>
						<p class="long_desc hide">{{ $sellerProfile->trade_description }}</p>
					<a href="javascript:void(0);" title="Read more" class="btn read-more" id="read-more">Read more <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					<?php } else {?>
						No Services Found
					<?php }?>
					
					<?php if($user->user_type_id == 2) { 
						if($count > 0 ) { ?>
							<h2 class="heading-main">{{$count}} Works <i class="fa fa-angle-right" aria-hidden="true"></i></h2>
						<?php } else { ?>
							<h2 class="heading-main">{{$count}} Work <i class="fa fa-angle-right" aria-hidden="true"></i></h2>
							
						<?php } $j =0; ?>
						<div class="product-grid-list masonry">
						@foreach ($sellerwork as $sellerworks)
							<?php ++$j; ?>
							
							<div class="list-box img-item <?php echo ($j>3)?"hide":""; ?>" >
								<div class="inner-box ">
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
												<b><a href="{{ url('/v') }}/{{$sellerworks->id}}-{{$user->first_name}}-{{$user->last_name}}"> {{$sellerworks->title}}</a></b>
											{{ str_limit($sellerworks->description, 50) }}
										</div>
									</div>
								</div>
							</div>
							
							
							
						@endforeach

					<?php } ?>
					</div>
				</div>	
				
				<div class="col-md-3 form-group">
					<div class="right-row">
						<b><i class="fa fa-user" aria-hidden="true"></i> Contact:</b> 
						<span>{{ucfirst($sellerProfile->first_name)}} {{ucfirst($sellerProfile->last_name)}}</span>
					</div>
					<div class="right-row">
						<b><i class="fa fa-map-marker" aria-hidden="true"></i> Location:</b> 
						<span>{{$sellerProfile->location_name}}</span>
					</div>
					<div class="right-row">
						<span class="grey-rating">
							<span class="gold-rating" style="width:<?php echo $rate; ?>px;"></span>
						</span>
					</div>
				</div>
			</div>
			<?php if (isset($j) && $j >3) {  ?>
				<div class="text-center"><button class="btn btn-border" id="load_more">Load More</button></div>
			<?php } ?>
		</div>
	</div>		
			
@endsection
