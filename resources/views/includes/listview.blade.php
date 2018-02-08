@foreach($userphotogrid as $userphotogrids)
<div class="product-list">
<div class="img-sec">
		<?php if(!empty($userphotogrids->images)) { ?>
					<img src="/work_image/{{$userphotogrids->images}}" alt="img012" class="img-reponsive" width="981" height="844">
				<?php } else { ?>
					<img src="{{URL::to('img/img014.jpg')}}" alt="img012" class="img-reponsive" width="981" height="844">
				<?php } ?>
			</div>
			<div class="text-sec">
				<div class="heading">
					<?php if(!empty($userphotogrids->profile_image)) { ?>
						<img src="/uploads/avatars/{{$userphotogrids->profile_image}}" alt="user" class="img-reponsive" width="47" height="51">
					<?php } else { ?>
						<img src="{{URL::to('img/user-dummy.jpg')}}" alt="user" class="img-reponsive" width="47" height="51">
					<?php } ?>
					{{$userphotogrids->title}}
				</div>
				<p>{{$userphotogrids->description}} </p>
				<b>Category:</b><br>
					{{$userphotogrids->name}}<br>
					<b>Date:</b><br>
					{{$userphotogrids->created_at}}<br>
					<b>Tags:</b><br>
					{{$userphotogrids->tag}}
					<br>
					<b><a href="{{ url('/v') }}/{{$userphotogrids->id}}-{{$userphotogrids->title}}" class="btn btn-submit"> Add to vision book</a></b>
					<div class="share-links">
					like the idea and the concept :
						<div class="social-links">
							 <a class="nav-link" href="#" title="Facebook"><img src="{{URL::to('img/facebook-icon.png')}}" alt="Facebook"></a>
							 <a class="nav-link" href="#" title="Twitter"><img src="{{URL::to('img/twitter-icon.png')}}" alt="Twitter"></a>
							 <a class="nav-link" href="#" title="Google Plus"><img src="{{URL::to('img/googlePlus-icon.png')}}" alt="Google Plus"></a>
							 <a class="nav-link" href="#" title="Linkedin"><img src="{{URL::to('img/linkedin-icon.png')}}" alt="Linkedin"></a>
						</div>
					</div>
			</div>
			</div>
@endforeach
