<!-- Page Content -->
<div class="container">
	<?php if(!empty($user->background_image)) { ?>
	<div class="feature-img" style="background-image: url('/uploads/background/<?php echo $user->background_image;?>')">
	<?php } else { ?>
		<div class="feature-img" style="background-image: url('{{ asset('img/slider001.jpg') }}')">
	<?php }?>
		<div class="user-imgText">
		<?php if(!empty($user->profile_image)) { ?>
			<div class="user-img" >
					<img src="/uploads/avatars/{{$user->profile_image }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">				
			</div>
			<?php } else { ?>
			<div class="user-img" >
				<img src="{{URL::to('img/user-dummy.jpg')}}" class="img-fluid" alt="user" width="180" height="180">
			</div>
				<?php }?>
			<div class="user-text">
				<?php if(Auth::check()){ 
					if (Auth::user()->id == $id){ ?>
					<a href="/edit_profile" title="edit" class="pull-right btn btn-white">
						<i class="fa fa-pencil" aria-hidden="true"></i>  Edit Profile
					</a>
				<?php }} ?>
				
				<?php if(Auth::check()){ 
					if (Auth::user()->id != $id){ ?>
					{!! Form::open(array('novalidate'=>true)) !!}
					<?php if(!empty($follow) AND  $follow->professional_id == $id AND  $follow->status == 1){?>
						<a href="{{ url('/f') }}/{{$user->id}}-{{$user->first_name}}-{{$user->last_name}}" title="Unfollow" class="pull-right btn btn-white">Unfollow</a>
						<?php } else {?>
						<a href="{{ url('/f') }}/{{$id}}" title="Follow" class="pull-right btn btn-white">Follow</a>
						<?php }?>
					{!! Form::close() !!}
				<?php }} ?>
				<?php echo ucfirst($user->first_name);?><br/>
				Wedding Planning Website
			</div>
	</div>		
</div>
<div class="user-nav">
	
	<?php if(\Auth::check()){ 
		if (Auth::user()->id == $id){ ?>
			<a href="{{ url('/p') }}/{{$user->id}}-{{$user->first_name}}-{{$user->last_name}}" title="Your Profile">Your Profile</a>
			<?php if (Auth::user()->user_type_id == 2){ ?>
				<a href="/my_work" title="My Work">My Work</a>
			<?php }?>
			<a href="/vision_book" class="" title="My Vision Books">My Vision Books</a> 
			<a href="javascript:void(0);" title="Messages">Messages</a>
	<?php }}?>	
		<a href="javascript:void(0);" title="Reviews">Reviews</a>
	
	<?php if(($user->porfessional_request== 0) AND ($user->user_type_id== 3)) { ?>
			<a href="{{action('UserController@sendRquestProfessional')}}">Request for professional</a>
			<?php }?>
</div>
