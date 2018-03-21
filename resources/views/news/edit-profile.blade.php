@extends('layouts.master')
@section('content')
<div class="container">
	{!! Form::open(array('novalidate'=>true,"files"=>true)) !!}
	 <?php if(!empty($user->background_image)) { ?>
		<div class="feature-img" style="background-image: url('/uploads/background/<?php echo $user->background_image;?>')">
		<?php } else { ?>
			<div class="feature-img" style="background-image: url('{{ asset('img/slider001.jpg') }}')">
		<?php }?>
			    <label class="btn btn-default btn-file hover-color" style="float:right; background-color:#fff; paddding:20px; margin-top:10px;margin-right:10px; padding:10px;">
					<i class="fa fa-pencil" aria-hidden="true"></i>			
					Change background Image <input type="file" style="display: none;" name="background_image">
				</label>
			<div class="user-imgText">
			<?php if(!empty($user->profile_image)) { ?>
				<div class="user-img" >
						<img src="/uploads/avatars/{{ $user->profile_image }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">				
				</div>
				<?php } else { ?>
				<div class="user-img" >
					<img src="{{URL::to('img/user-dummy.jpg')}}" class="img-fluid" alt="user" width="180" height="180">
				</div>
					<?php }?>
				<div class="user-text">
					<?php echo ucfirst($user->first_name);?><br/>
					Wedding Planning Website
				</div>
		</div>		
		</div>
		<div class="user-nav user-nav-ext">
			<label class="btn btn-default btn-file hover-color" style="background-color:#f7f7f7; paddding:20px; margin-top:10px;margin-right:10px; padding:10px;"> 
				<i class="fa fa-pencil" aria-hidden="true"></i>	 
					Change Profile Image <input type="file" style="display:none;" name="profile_image" class="">
				</label>
					 <a href="{{ url('/p') }}/{{$user->id}}-{{$user->first_name}}-{{$user->last_name}}" title="Your Profile" class="">Your Profile</a>
							<a href="/vision_book" class="" title="My Vision Books">My Vision Books</a> 
						 <?php if (Auth::user()->user_type_id == 2){ ?> 
							<a href="/my_work" title="My Work" class="">My Work</a>	 
							<?php }?>
					
					  <a href="/message/{{$user->id}}" title="Messages" >Messages<?php if($messageCount != 0) {?> <i class="badge">{{$messageCount}}</i><?php }?></a>
					
					 <a href="/review/{{$user->id}}" title="Reviews" class="">Reviews</a>
		</div>
		<div class="dashboard-wrapper">
			
				@include('includes.follower')
				<div class="dashboard-form">
					<div class="row">
						<div class="col-sm-6 form-group">
							{!! Form::label('firstname', 'First Name', ['class' => 'control-label required']) !!}
							{!! Form::text('firstname', (isset($user->first_name)?$user->first_name:''), ['class' => 'form-control']) !!}
						</div>
						<div class="col-sm-6 form-group">
							{!! Form::label('lastname', 'Last Name', ['class' => 'control-label required']) !!}
							{!! Form::text('lastname', (isset($user->last_name)?$user->last_name:''), ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 form-group">
							{!! Form::label('email', 'Email', ['class' => 'control-label required' ]) !!}
							{!! Form::email('email', (isset($user->email)?$user->email:''), ['class' => 'form-control']) !!}
						</div>
						<div class="col-sm-6 form-group">
							{!! Form::label('phone', 'Phone No', ['class' => 'control-label ']) !!}
							{!! Form::email('phone', (isset($user->phone_no)?$user->phone_no:''), ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 form-group">
							<label class="required">Gender</label>
							{!! Form::select('gender', ["m"=>"Male","f"=>"Female","o"=>"Other"],(isset($user->gender)?$user->gender:''), array("class"=>"form-control custom-select")) !!}
						</div>
						<div class="col-sm-6 form-group">
							<label class="required">Dob</label>
							<div class="input-group date" >
							{!! Form::text('dob', (isset($user->dob)?$user->dob:''), ['class' => 'form-control', 'id'=> 'event_date']) !!}
							  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>
					<br>

					<?php if($user->porfessional_request == 1 And $user->user_type_id == 3) { ?>
						<input name="agree" type="checkbox" value="1" id="checkbox_professional" checked>If you are a Professional, then please tick this box and fill out some additional info below in order to send us a Professional Profile request. </input>
					<?php } else if($user->user_type_id == 3) {?>
						<input name="agree" type="checkbox" value="1" id="checkbox_professional">If you are a Professional, then please tick this box and fill out some additional info below in order to send us a Professional Profile request. </input>
					<?php }?>
					   
					
					<?php if($user->porfessional_request == 1 OR $user->user_type_id == 2){ ?>
						<div class="professional_status">
					<?php } else {?>
						<div class="professional_status hide">
					<?php }?>
						
						<div class="row">
							<div class="col-sm-12 form-group">
								{!! Form::label('website', 'Website', ['class' => 'control-label']) !!}
								{!! Form::email('website', (isset($user->website)?$user->website:''), ['class' => 'form-control']) !!}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label class="required">Business Category</label>
								{!! Form::select('category_id',[-1=>'Please Select Category']+ $catagory,(isset($user->category_id)?$user->category_id:''), array("class"=>"form-control custom-select", "id"=>"category_selected")) !!}
							</div>
								<?php if(!empty($user->other_category)) { ?>
									<div class="col-sm-6 form-group" id="other_cate">
								<?php } else { ?>
									<div class="col-sm-6 form-group hide" id="other_cate">
								<?php } ?>
								<label class="required">Other Category</label>
								<input type="text" name="other_category" class="form-control" value="<?php echo isset($user->other_category)?$user->other_category:''?>"/>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 form-group">
								<label class="required">Street Address</label>
								<textarea class="form-control" placeholder="Street and number, P.O. box, c/o." name="address"> <?php echo isset($user->address)?$user->address:''?></textarea>
							</div>						
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label class="required">Country</label>
								<input type="text" name="country" class="form-control" value="<?php echo isset($user->country)?$user->country:''?>"/>
							</div>
							<div class="col-sm-4 form-group">
								<label class="required">State/County</label>
								<input type="text" name="state" class="form-control" value="<?php echo isset($user->state)?$user->state:''?>"/>
							</div>
							<div class="col-sm-4 form-group">
								<label class="required">Zipcode</label>
								<input type="text" name="zipcode" class="form-control" value="<?php echo isset($user->zipcode)?$user->zipcode:''?>"/>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								{!! Form::label('location', 'City', ['class' => 'control-label required']) !!}
								{!! Form::select('location_id',[-1=>'Please Select Location'] +$location,(isset($user->location_id)?$user->location_id:''), array("class"=>"form-control custom-select", 'id'=>"location_select")) !!}
							</div>
							<?php if(!empty($user->other_location)){ ?>
								<div class="col-sm-6 form-group" id="other_loc">
							<?php } else { ?>
								<div class="col-sm-6 form-group hide" id="other_loc">
							<?php }?>
								<label class="required">Other City</label>
								<input type="text" name="other_location" class="form-control" value="<?php echo isset($user->other_location)?$user->other_location:''?>" />
							</div>
		
						</div>
						
<!--
						<div class="col-sm-12 form-group">
								<label>City</label>
								<input type="text" name="city" class="form-control" value="<?php echo isset($user->city)?$user->city:''?>" />
							</div>
						</div>
-->
							
						<div class="row">
							<div class="col-sm-6 form-group">
								<label class="required">Trade Description</label>
								<textarea class="form-control" placeholder="Tell us more about your products, services or business" name="trade_description"><?php echo isset($user->trade_description)?$user->trade_description:''?></textarea>
							</div>
							<div class="col-sm-6 form-group">
								<label class="required">Detail</label>
								<textarea class="form-control" placeholder="Tell us more about you as a person - what you’re like, what you love and what drives you" name="detail"><?php echo isset($user->detail)?$user->detail:''?></textarea>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-sm-12">Social Media:</label>
							<div class="col-sm-3 form-group">
								
								{!! Form::input('text','fb', (isset($socialVal['fb'])?$socialVal['fb']:''), ['class' => 'form-control facbook-icon', 'size' => 40,'placeholder' => 'Facebook' ]) !!}
							</div>
							<div class="col-sm-3 form-group">
								{!! Form::input('text','google', (isset($socialVal['google'])?$socialVal['google']:''), ['class' => 'form-control googlePlus-icon', 'size' => 40,'placeholder' => 'Google' ]) !!}
							</div>
							<div class="col-sm-3 form-group">
								{!! Form::input('text','twitter', (isset($socialVal['twitter'])?$socialVal['twitter']:''), ['class' => 'form-control twitter-icon', 'size' => 40,'placeholder' => 'Twitter' ]) !!}
							</div>
							<div class="col-sm-3 form-group">
								{!! Form::input('text','instagram', (isset($socialVal['instagram'])?$socialVal['instagram']:''), ['class' => 'form-control instagram-icon', 'size' => 40,'placeholder' => 'Instagram' ]) !!}
							</div>
						</div>
				</div>
				<br>
			<?php if($user->porfessional_request == 1 OR $user->user_type_id == 3) { ?>
			{!! Form::submit('Update Profile', ['class' => 'btn btn-submit read-more confirm ', 'data-confirm' => 'Thank you for filling out the information! We will review your details and activate your profile as soon as possible']) !!}
			<?php } else { ?>
			{!! Form::submit('Update Profile', ['class' => 'btn btn-submit read-more']) !!}
			<?php }?>
				</div>
		
		</div>
		
		
		{!! Form::close() !!}
	</div>
@endsection

