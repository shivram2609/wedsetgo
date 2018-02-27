<div class="masonry">
<?php if (!empty($userphotogrid)) { ?> 
@foreach($userphotogrid as $userphotogrids)
			<div class="list-box img-item">
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
								<p>{{ str_limit($userphotogrids->description, 30) }}</p>
								<?php if(Auth::check()){ ?>
								<a href="{{ url('/v') }}/{{$userphotogrids->id}}-{{$userphotogrids->title}}" class="btn btn-bdrSml"> Add to vision book</a>
								<?php } else { ?>
									<a href="#" title="Login" data-toggle="modal" data-target="#signIn" class="btn btn-bdrSml">Add to vision book</a>
								<?php }?>
						</div>
					</div>
				</div>
			</div>
@endforeach

						

<?php } ?>
</div>
