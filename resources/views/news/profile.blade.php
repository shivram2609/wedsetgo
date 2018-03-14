@extends('layouts.master')
@section('content')
@include('includes.top')
	<div class="dashboard-wrapper">
		@include('includes.follower')
		<?php $rate = (number_format($rating['aggregateRating'],2,".",""))*20;  ?>
		<?php if($user->user_type_id == 3) { ?>
		<div class="dashboard-form overview">
			<div class="row">
				<div class="col-md-9 form-group">
<!--
					<?php if(!empty($sellerProfile->detail)) { ?>
						<p>{{$sellerProfile->detail}}</p>
					<?php } else {?>
						Welcome new user, Please start your work.
					<?php }?>
					<h1 class="heading-main">Services Provided</h1>
					<?php if(!empty($sellerProfile->trade_description)){ ?>
						<p class="short_desc">{{ str_limit($sellerProfile->trade_description, 70) }}</p>
						<p class="long_desc hide">{{ $sellerProfile->trade_description }}</p>
					<?php if(strlen($sellerProfile->trade_description) > 70) { ?>
					<a href="javascript:void(0);" title="Read more" class="btn read-more" id="read-more">Read more <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					<?php } ?>
					
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
												<div class="img"><img src="{{URL::to('img/user-dummy.jpg')}}" alt="user" class="img-reponsive" width="35" height="51"></div>
										<?php }?>
									
										<div class="text">
												<b><a href="{{ url('/v') }}/{{$sellerworks->id}}-{{$sellerworks->title}}"> {{$sellerworks->title}}</a></b>
											{{ str_limit($sellerworks->description, 50) }}
										</div>
									</div>
								</div>
							</div>
							
							
							
						@endforeach
						</div>
					<?php } ?>
-->
					</div>
					
				
			
				<div class="col-md-3 form-group">
					<div class="right-row">
							
						<b><i class="fa fa-user" aria-hidden="true"></i> Contact:</b> 
						<span>{{ucfirst($user->first_name)}} {{ucfirst($user->last_name)}}</span>
<!--
					</div>
					<div class="right-row">
						<span class="grey-rating">
							<span class="gold-rating" style="width:<?php echo $rate; ?>px;"></span>
						</span>
					</div><br>
-->
					
<!--
					<div class="right-row">
						<b><i class="fa fa-map-marker" aria-hidden="true"></i> Location:</b> 
						<?php if((!empty($sellerProfile->location_name)) || (!empty($sellerProfile->state)) || (!empty($sellerProfile->country))) { ?>
							<span>{{$sellerProfile->location_name}}  {{$sellerProfile->state}} {{$sellerProfile->country}} </span>
						<?php } else { ?>
							<span> N/A </span>
						<?php }?>
					</div>
-->
					<div class="right-row">
						<b><i class="fa fa-envelope" aria-hidden="true"></i> Email:</b> 
						<?php if(!empty($user->email)) { ?>
							<span>{{$user->email}}</span>
						<?php } else { ?>
							<span>N/A</span>
						<?php } ?>
					</div>
					
					<div class="right-row">
						<b><i class="fa fa-calendar" aria-hidden="true"></i> D.O.B:</b> 
						<?php if(!empty($user->dob)) { ?>
							<span>{{$user->dob}}</span>
						<?php } else { ?>
							<span>N/A</span>
						<?php } ?>
					</div>
					
					<div class="right-row">
						<b><i class="fa fa-venus-mars" aria-hidden="true"></i> Gender:</b> 
						<?php if(!empty($user->gender)) { ?>
							<span>{{$user->gender}}</span>
						<?php } else { ?>
							<span>N/A</span>
						<?php } ?>
					</div>
					
<!--
					<div class="right-row social-links"> 
						
						<?php if(!empty($socialVal['fb'])) { ?>
							<a class="nav-link" href="//<?php echo $socialVal['fb']?>" title="Facebook" target="_blank"><img src="{{URL::to('img/facebook-icon.png')}}" alt="Facebook"></a>
						<?php }?>
						 <?php if(!empty($socialVal['twitter'])) { ?>
							<a class="nav-link" href="//<?php echo $socialVal['twitter']?>" title="Twitter" target="_blank"><img src="{{URL::to('img/twitter-icon.png')}}" alt="Twitter"></a>
						 <?php } ?>
						 <?php if(!empty($socialVal['google'])) { ?>
							<a class="nav-link" href="//<?php echo $socialVal['google']?>" title="Google Plus" target="_blank"><img src="{{URL::to('img/googlePlus-icon.png')}}" alt="Google Plus"></a>
						 <?php } ?>
						 <?php if(!empty($socialVal['instagram'])) { ?>
							<a class="nav-link" href="//<?php echo $socialVal['instagram']?>" title="Instagram" target="_blank"><img src="{{URL::to('img/instagram-icon.png')}}" alt="Instagram"></a>
						  <?php } ?>
				</div>
-->
				
				</div>
			</div>
			<?php } ?>
			
			<?php if($user->user_type_id == 2) { ?>
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
					<?php if(strlen($sellerProfile->trade_description) > 70) { ?>
					<a href="javascript:void(0);" title="Read more" class="btn read-more" id="read-more">Read more <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					<?php } ?>
					
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
												<div class="img"><img src="{{URL::to('img/user-dummy.jpg')}}" alt="user" class="img-reponsive" width="35" height="51"></div>
										<?php }?>
									
										<div class="text">
												<b><a href="{{ url('/v') }}/{{$sellerworks->id}}-{{$sellerworks->title}}"> {{$sellerworks->title}}</a></b>
											{{ str_limit($sellerworks->description, 50) }}
										</div>
									</div>
								</div>
							</div>
							
							
							
						@endforeach
						</div>
					<?php } ?>
					</div>
				<div class="col-md-3 form-group">
					<div class="right-row">
							
						<b><i class="fa fa-user" aria-hidden="true"></i> Contact:</b> 
						<span>{{ucfirst($sellerProfile->first_name)}} {{ucfirst($sellerProfile->last_name)}}</span>
					</div>
					<div class="right-row">
						<span class="grey-rating">
							<span class="gold-rating" style="width:<?php echo $rate; ?>px;"></span>
						</span>
					</div><br>
					
					<div class="right-row">
						<b><i class="fa fa-map-marker" aria-hidden="true"></i> Location:</b> 
						<?php if((!empty($sellerProfile->location_name)) || (!empty($sellerProfile->state)) || (!empty($sellerProfile->country))) { ?>
							<span>{{$sellerProfile->location_name}}  {{$sellerProfile->state}} {{$sellerProfile->country}} </span>
						<?php } else { ?>
							<span> N/A </span>
						<?php }?>
					</div>
					<div class="right-row">
						<b><i class="fa fa-globe" aria-hidden="true"></i> Website:</b> 
						<?php if(!empty($sellerProfile->website)) { ?>
							<span>{{$sellerProfile->website}}</span>
						<?php } else { ?>
							<span>N/A</span>
						<?php } ?>
					</div>
					<b><i class="fa fa-handshake-o" aria-hidden="true"></i> Get in touch with</b>
					<div class="right-row social-links"> 
						
						<?php if(!empty($socialVal['fb'])) { ?>
							<a class="nav-link" href="//<?php echo $socialVal['fb']?>" title="Facebook" target="_blank"><img src="{{URL::to('img/facebook-icon.png')}}" alt="Facebook"></a>
						<?php }?>
						 <?php if(!empty($socialVal['twitter'])) { ?>
							<a class="nav-link" href="//<?php echo $socialVal['twitter']?>" title="Twitter" target="_blank"><img src="{{URL::to('img/twitter-icon.png')}}" alt="Twitter"></a>
						 <?php } ?>
						 <?php if(!empty($socialVal['google'])) { ?>
							<a class="nav-link" href="//<?php echo $socialVal['google']?>" title="Google Plus" target="_blank"><img src="{{URL::to('img/googlePlus-icon.png')}}" alt="Google Plus"></a>
						 <?php } ?>
						 <?php if(!empty($socialVal['instagram'])) { ?>
							<a class="nav-link" href="//<?php echo $socialVal['instagram']?>" title="Instagram" target="_blank"><img src="{{URL::to('img/instagram-icon.png')}}" alt="Instagram"></a>
						  <?php } ?>
				</div>
				
				</div>
			</div>
			<?php } ?>
			<?php if (isset($j) && $j >3) {  ?>
				<div class="text-center"><button class="btn btn-border" id="load_more">Load More</button></div>
			<?php } ?>
		</div>
	</div>		
			
@endsection
