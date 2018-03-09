<div class="dashboard-left">
			<?php if(isset($profile_url) && !empty($profile_url)){ ?>
					<a href="mailto:?subject=Wedsetgo:Invite friend&body= Hello Dear,  I am sharing professional profile page link {{$profile_url}} I am encouraging you to view this link." title="Invite Friends"  class="btn btn-gray btn-block form-group"><i class="fa fa-user-plus" aria-hidden="true"></i></i> Invite Friends</a>
					<?php } else { ?>
					<a href="mailto:?subject=Wedsetgo:Invite friend&body=Hello Dear,  I am sharing professional profile page link {{$userProfile}} I am encouraging you to view this link." title="Invite Friends"  class="btn btn-gray btn-block form-group"><i class="fa fa-user-plus" aria-hidden="true"></i></i> Invite Friends</a>
					<?php } ?>
					 <div class="btn-group">
					<?php if(!empty($followerList)){ ?>
						<a href="javascript:void(0);" title="Invite Friends" class="btn btn-gray form-group" data-toggle="modal" data-target="#Follower">Followers<br>({{$followerList}})</a>
					 <?php } else { ?>
						<a href="javascript:void(0);" title="Invite Friends" class="btn btn-gray form-group" data-toggle="modal" data-target="#Follower">Followers<br>(0)</a>

					 <?php } if(!empty($followingList)){ ?>
						<a href="javascript:void(0);" title="Invite Friends" class="btn btn-gray form-group" data-toggle="modal" data-target="#Following">Following<br>({{$followingList}})</a></a>
					   <?php } else { ?>
						<a href="javascript:void(0);" title="Invite Friends" class="btn btn-gray form-group" data-toggle="modal" data-target="#Following">Following<br>(0)</a>
					 <?php } ?>
					  </div> 
</div>


<div class="modal fade" id="Follower">
	  <div class="modal-dialog signup-signin">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> List of Follower</h4>
			<button type="button" class="close" data-dismiss="modal" id="">&times;</button>
		  </div>
		  <!-- Modal body -->
		  <div class="modal-body">
			<ul>
			<?php if (!empty($follower_List)) { ?>
		    @foreach($follower_List as $follower_Lists)
				
					<?php if(!empty($follower_Lists->profile_image)) { ?>
							 <a href ="{{url('/p') }}/{{$follower_Lists->user_id}}-{{$follower_Lists->first_name}}-{{$follower_Lists->last_name}}" ><img src="/uploads/avatars/{{$follower_Lists->profile_image}}" alt="{{$follower_Lists->first_name}}{{$follower_Lists->last_name}}" class="img-reponsive product-user" width="47" height="51" title="{{$follower_Lists->first_name}}-{{$follower_Lists->last_name}}"></img></a>
						<?php } else { ?>
							 <a href ="{{url('/p') }}/{{$follower_Lists->user_id}}-{{$follower_Lists->first_name}}-{{$follower_Lists->last_name}}" ><img src="{{URL::to('img/user-dummy.jpg')}}" alt="{{$follower_Lists->first_name}}{{$follower_Lists->last_name}}" class="img-reponsive product-user" width="47" height="51" title="{{$follower_Lists->first_name}}{{$follower_Lists->last_name}}"></img></a>
						<?php } ?>
			
			@endforeach
			<?php } else { ?>
				
				<div class="empty_follower">Sorry, No record found.</div>
			<?php } ?>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="modal fade" id="Following">
	  <div class="modal-dialog signup-signin">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> List of Following</h4>
			<button type="button" class="close" data-dismiss="modal" id="">&times;</button>
		  </div>
		  <!-- Modal body -->
		  <div class="modal-body">
			<?php if (!empty($following_List)) { ?>
		    @foreach($following_List as $following_Lists)
					<?php if(!empty($following_Lists->profile_image)) { ?>
							<a href="{{ url('/p') }}/{{$following_Lists->user_id}}-{{$following_Lists->first_name}}-{{$following_Lists->last_name}}" ><img src="/uploads/avatars/{{$following_Lists->profile_image}}" alt="{{$following_Lists->first_name}}{{$following_Lists->last_name}}" class="img-reponsive product-user" width="47" height="51" title="{{$following_Lists->first_name}}{{$following_Lists->last_name}}"></img></a>
						<?php } else { ?>
							<a href="{{ url('/p') }}/{{$following_Lists->user_id}}-{{$following_Lists->first_name}}-{{$following_Lists->last_name}}" ><img src="{{URL::to('img/user-dummy.jpg')}}" alt="{{$following_Lists->first_name}}{{$following_Lists->last_name}}" class="img-reponsive product-user" width="47" height="51" title="{{ url('/p') }}/{{$following_Lists->user_id}}-{{$following_Lists->first_name}}-{{$following_Lists->last_name}}"></img></a>
						<?php } ?>
			@endforeach
			<?php } else { ?>
				
				<div class="empty_follower">Sorry, No record found.</div>
			<?php } ?>
			
		  </div>
		</div>
	  </div>
	</div>
