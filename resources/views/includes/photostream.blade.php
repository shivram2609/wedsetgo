<?php $i = 1; ?>
<?php if (!empty($userphotogrid)) { ?> 
@foreach($userphotogrid as $userphotogrids)
<?php if ($i == 1) { ?> <div class="data"> <?php  } ?>
<?php ++$i;  ?>
			<div class="list-box">
				<div class="inner-box">
					<div class="img-box">
						<?php if(!empty($userphotogrids->images)) { ?>
							<img src="/work_image/{{$userphotogrids->images}}" class="img-reponsive" alt="img013" width="493" height="437">
						<?php } else { ?>
							<img src="img/img013.jpg" class="img-reponsive" alt="img013" width="493" height="437">
						<?php } ?>
					</div>
					<div class="text-box">
						<?php if(!empty($userphotogrids->profile_image)) { ?>
							<div class="img"><img src="/uploads/avatars/{{$userphotogrids->profile_image}}" alt="user" class="img-reponsive" width="47" height="51"></div>
						<?php } else { ?>
							<div class="img"><img src="img/dummy-user.jpg" alt="user" class="img-reponsive" width="47" height="51"></div>
						<?php } ?>
						<div class="text">
							<b>{{$userphotogrids->title}}</b>
								{{ str_limit($userphotogrids->description, 30) }}
							@if(Auth::check())
							<a href="{{ url('/v') }}/{{$userphotogrids->id}}-{{$userphotogrids->title}}" class="btn btn-submit"> Add to vision book</a>
							@endif
						</div>
					</div>
				</div>
			</div>
<?php if ($i == 4) { ?> </div> <?php  $i = 1; } ?>
@endforeach
<?php if ($i < 4) { ?> </div> <?php   } ?>

<?php } ?>
