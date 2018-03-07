 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="{{URL::to('img/logo.png')}}" alt="wedding" width="75" height="79"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
<div class="header-rt-top">
			<div class="search-box">
				{!! Form::open(["method"=>"get","url"=>"photostream", 'id'=>"photostream_form"]) !!}
					<input type="text" name="search_key" placeholder="Search Professional, Products, Services And More..." id="search_text" autocomplete="off"> 
					<input type="hidden" name="option" id="optsearch" value="" />
					<input type="hidden" name="keysearch" id="keysearch" value="" />
					<button class="search-btn" type="submit" >Search</button>
					<ul class="auto_helper hide">
						<li class='select_text' id="txt1" val='1'></li>
						<li class='select_text' id="txt2" val='2'></li>
						<li class='select_text' id="txt3" val='3'></li>
					</ul>	
					
				{!! Form::close() !!}
			</div>
			
			<?php if (Auth::check()) { ?>
	
			
				<div class="header_right">
					<span class="profile-img">
					<?php if(!empty(Session::get("users"))) { ?>
						<?php if(!empty(Session::get("users")->profile_image)) { ?>
							<span class="head_image" style="background:url(/uploads/avatars/{{ $user->profile_image }});" ></span>
						<!--img class="img-fluid rounded-circle" src="/uploads/avatars/{{ $user->profile_image }}" alt='{{$user->first_name}} {{$user->last_name}}' style="height:auto;width:23%;" -->
					<?php } 	else { ?>
						<img class="img-fluid rounded-circle" src="{{URL::to('img/user-dummy.jpg')}}" alt='{{$user->first_name}} {{$user->last_name}}' width="25" height="25">
					<?php }?>
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" title="Edit Profile">{{$user->first_name}} {{$user->last_name}}<b class="caret"></b></a>
					<div class="dropdown-menu new_menu">
					  <a class="dropdown-item" href="{{ url('/p') }}/{{Auth::user()->id}}-{{$user->first_name}}-{{$user->last_name}}">Profile</a>
					  <a class="dropdown-item" href="/edit_profile">Edit Profile</a>
					  <a class="dropdown-item" href="/my_work">My Work</a>
					  <a class="dropdown-item" href="/message/{{Auth::user()->id}}">Messages</a>
					  <a class="dropdown-item" href="/review/{{Auth::user()->id}}">Reviews</a>
					  <a class="dropdown-item" href="/vision_book">My Vision Books</a>
					  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepassword">Change Password</a>
					  <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="{{ url('logout') }}"><i class="fa fa-power-off"></i> Log Out</a>
					</div>
					</span>
					<?php } ?>
					
					
				
			</div>
		<?php }else{ ?>
			<div class="login-signup"><a href="#" title="Login" data-toggle="modal" data-target="#signIn">Login</a> / <a href="#" title="Login" data-toggle="modal" data-target="#signUp">Signup</a></div>
		<?php } ?>
		</div>		
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/" title="HOME">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/photostream" title="PHOTO STREAM" class="">PHOTO STREAM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" title="FIND PROFESSIONALS" data-toggle="dropdown">FIND PROFESSIONALS <b class="caret"></b></a>
			  <ul class="dropdown-menu">
				  @foreach ($headCategory as $headCategories)
				<li><a href="/seller?catagory_id=<?php echo $headCategories->id; ?>" title="<?php echo $headCategories->name; ?>" class=""><img class="nav_image" src="/categories/<?php echo $headCategories->image;?>" >{{$headCategories->name}}</a></li>
				@endforeach
			</ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/st/about-us" title="ABOUT">ABOUT</a>
            </li>
			<li class="nav-item social-links">
             <a class="nav-link" href="https://www.facebook.com/WedSetGoOfficial/?ref=br_rs" title="Facebook"><img src="{{URL::to('img/facebook-icon.png')}}" alt="Facebook" target="_blank"></a>
			 <a class="nav-link" href="https://twitter.com/Wed_Set_Go" title="Twitter"><img src="{{URL::to('img/twitter-icon.png')}}" alt="Twitter" target="_blank"></a>
			 <a class="nav-link" href="https://plus.google.com/u/0/114969599777634821732" title="Google Plus"><img src="{{URL::to('img/googlePlus-icon.png')}}" alt="Google Plus" target="_blank"></a>
			 <a class="nav-link" href="https://www.linkedin.com/company/wed-set-go/" title="Linkedin"><img src="{{URL::to('img/linkedin-icon.png')}}" alt="Linkedin" target="_blank"></a>
			 <a class="nav-link" href="https://www.instagram.com/wedsetgo/" title="Instagram"><img src="{{URL::to('img/instagram-icon.png')}}" alt="Instagram" target="_blank"></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--SignUp Modal -->
	<div class="modal fade" id="signUp">
	  <div class="modal-dialog signup-signin">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Sign Up</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>

		  <!-- Modal body -->
		  <div class="modal-body">
		 {!! Form::open(['route' => 'user.store']) !!}
		 <input type="hidden" name="u_type" value="1" id="u_type"/>
			<div class="input-group form-group">
			 <span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
			  {!! Form::input('text', 'first_name', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'First Name','required'=>'Please enter first name' ]) !!}
			 </div>
			 <div class="input-group form-group">
			 <span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
			  {!! Form::input('text', 'last_name', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Last Name' ,'required'=>'Please enter last name']) !!}
			 </div>
			 <div class="input-group form-group">
			 <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
			  {!! Form::input('email', 'email', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Email' ,'required'=>'Please enter email']) !!}
			 </div> 
			 <div class="input-group form-group">
			 <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
			  {!! Form::input('password', 'password', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Password','required'=>'Please enter password' ]) !!}
			 </div>
			 <div class="input-group form-group">
			 <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
			  {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Confirm Password' ,'required'=>'Please enter confirm password']) !!}
			 </div>
			 <div class="text-center">
				<!--div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div-->
			  
			 </div>
			  <div class="form-group text-center">
			  {!! Form::submit('Signup', ['class' => 'theme-btn-rct']) !!} <a href="/login" title="Already have an account?" class="already-account" data-toggle="modal" id="signinmodal" data-target="#signIn">Already have an account?</a>
			  <p>By clicking Sign up  you agree to our <a href="javascript:void(0);" title="Terms of Use">Terms of Use</a></p>	
			 </div>
			 <div class="text-center form-group">
				<span class="signin-with"> Sign In With </span>
			 </div>
			 <div class="signin-with-social">
				 <a href="socialAuth/facebook" title="Facebook" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
				  <a href="socialAuth/google" title="Google+" class="gplus"><i class="fa fa-google-plus" aria-hidden="true"></i> Google+</a>
				   <a href="socialAuth/twitter" title="Twitter" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
			 </div>
			{!! Form::close() !!}
		  </div>
		</div>
	  </div>
	</div>
	
	<!--SignIn Modal -->
	<div class="modal fade" id="signIn">
	  <div class="modal-dialog signup-signin">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Sign In</h4>
			<button type="button" class="close" data-dismiss="modal" id="">&times;</button>
		  </div>

		  <!-- Modal body -->
		  <div class="modal-body">
		     {!! Form::open(['route' => 'user.authenticate']) !!}
		    <input type="hidden" value="{{$url}}" name="url" />
			<div class="input-group form-group">
			  <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
			 	{!! Form::input('email', 'email', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Email', 'required'=>'Please enter email.']) !!}	

			 </div> 
			 <div class="input-group form-group">
			  <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
			  {!! Form::input('password', 'password', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Password','required'=>'Please enter password' ]) !!}	
			 </div>
			  <div class="form-group text-center">
			  {!! Form::submit('Login', ['class' => 'btn theme-btn-rct']) !!}
			  <p>Not a member? <a href="/register" title="Sign Up" id="signup" data-toggle="modal" data-target="#signUp">Sign Up</a> | <a href="#" title="Forgot Password?" data-toggle="modal" data-target="#forgotpassword" id="forgotlink">Forgot Password?</a></p>	
			 </div>
			 <div class="text-center form-group">
				<span class="signin-with"> Sign In With </span>
			 </div>
			 <div class="signin-with-social">
				 <a href="socialAuth/facebook" title="Facebook" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
				  <a href="socialAuth/google" title="Google+" class="gplus"><i class="fa fa-google-plus" aria-hidden="true"></i> Google+</a>
				   <a href="socialAuth/twitter" title="Twitter" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
			 </div>
			 </form>
			<!--{!! Form::close() !!}-->
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="modal fade" id="forgotpassword">
	  <div class="modal-dialog signup-signin">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Forgot Password</h4>
			<button type="button" class="close" data-dismiss="modal" id="">&times;</button>
		  </div>
		  <!-- Modal body -->
		  <div class="modal-body">
		       {!! Form::open(['route' => 'news.forgotpassword']) !!}
			<div class="input-group form-group">
			  <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
			 	{!! Form::input('email', 'email', null, ['class' => 'form-control', 'size' => 40, 'placeholder' => 'Email','required'=>'Please enter email' ]) !!}	
			 </div> 
			  <div class="form-group text-center">
			  {!! Form::submit('submit', ['class' => 'btn theme-btn-rct']) !!}
			 </div>
			{!! Form::close() !!}
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="modal fade" id="changepassword">
	  <div class="modal-dialog signup-signin">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i>Change Password</h4>
			<button type="button" class="close" data-dismiss="modal" id="">&times;</button>
		  </div>
		  <!-- Modal body -->
		  <div class="modal-body">
		       {!! Form::open(['route' => 'news.changepassword']) !!}
			<div class="input-group form-group">
			 <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
			  {!! Form::input('password', 'currentpassword', null, ['class' => 'form-control', 'placeholder' => 'Current password','required'=>'Please enter password' ]) !!}
			 </div>
			 <div class="input-group form-group">
			 <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
			  {!! Form::input('password','password', null, ['class' => 'form-control','placeholder' => 'Password']) !!}
			 </div>
			 <div class="input-group form-group">
			 <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
			  {!! Form::input('password','password_confirmation', null, ['class' => 'form-control','placeholder' => 'Confirm Password']) !!}
			 </div> 
			  <div class="form-group text-center">
			  {!! Form::submit('Change Password', ['class' => 'theme-btn-rct']) !!} 
			  </div>
			{!! Form::close() !!}
		  </div>
		</div>
	  </div>
	</div>

