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
						<a href="#" title="Send Message" class="pull-right btn btn-white" data-toggle="modal" data-target="#sendmessage">Send Message</a>
						<a href="#" title="Rate Me" class="pull-right btn btn-white" data-toggle="modal" data-target="#rating">Rate Me</a>
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
			<a href="/message/{{$user->id}}" title="Messages">Messages</a>
	<?php }}?>	
	
		<a href="/review/{{$user->id}}	" title="Reviews">Reviews</a>
	
	
</div>

<div class="modal fade" id="sendmessage">
	  <div class="modal-dialog signup-signin">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Message</h4>
			<button type="button" class="close" data-dismiss="modal" id="">&times;</button>
		  </div>
		  <!-- Modal body -->
		  <div class="modal-body">
		       {!! Form::open(['route' => 'message.user_message']) !!}
			<div class="input-group form-group">
			  <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
			 	<textarea class="form-control" placeholder="Please enter message" name="user_message"></textarea>
			 	<input type="hidden" value="<?php echo $id; ?>" name="hidden_user_id"></input>
			 </div> 
			  <div class="form-group text-center">
			  {!! Form::submit('Send Message', ['class' => 'btn theme-btn-rct']) !!}
			 </div>
			{!! Form::close() !!}
		  </div>
		</div>
	  </div>
	</div>


<div class="modal fade" id="rating">
	  <div class="modal-dialog signup-signin">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Rating and Reviews</h4>
			<button type="button" class="close" data-dismiss="modal" id="">&times;</button>
		  </div>
		  <!-- Modal body -->
		  <div class="modal-body">
			  <b>Ratings:</b>
		      {!! Form::open(['route' => 'message.rating']) !!}
		      <?php //print_r($rating['getProfessionalRate']->rating_points); die; ?>
		      <?php if(!isset($rating['getProfessionalRate']) || empty($rating['getProfessionalRate'])){ ?>
				  <input type="hidden" id="rate_val" name="rate_val" />
				  <ul class="rate_me">
					<li val="1" class="rate grey-star">&nbsp;</li>
					<li val="2" class="rate grey-star">&nbsp;</li>
					<li val="3" class="rate grey-star">&nbsp;</li>
					<li val="4" class="rate grey-star">&nbsp;</li>
					<li val="5" class="rate grey-star">&nbsp;</li>
				  </ul>
				  <textarea class="form-control" placeholder="Enter Review" name="review" value=""></textarea><br>
			 <?php } else { ?>
				 <input type="hidden" id="rate_val" name="rate_val" value="<?php echo $rating['getProfessionalRate']->rating_points; ?>" />
				  <ul class="rate_me">
				  <?php for($i = 1; $i <= 5; $i++) { ?>
					  <?php if ( $i <= $rating['getProfessionalRate']->rating_points ) { ?>
					  <li val="<?php echo $i; ?>" class="rate grey-star gold-star">&nbsp;</li>
				  <?php } else { ?>
					  <li val="<?php echo $i; ?>" class="rate grey-star">&nbsp;</li>
				  <?php } } ?>
				  </ul>
				  <b>Review:</b>
				  <textarea class="form-control" placeholder="Enter Review" name="review" value=""><?php echo $rating['getProfessionalRate']->comment;?></textarea><br>
			 <?php } ?>	  
			  <input type="hidden" value="<?php echo $id; ?>" name="professional_id"></input>
			  {!! Form::submit('Rating & Reviews', ['class' => 'btn btn-submit clear-grid']) !!}
			{!! Form::close() !!}
		  </div>
		</div>
	  </div>
	</div>
