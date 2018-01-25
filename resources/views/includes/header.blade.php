 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="img/logo.png" alt="wedding" width="75" height="79"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
		
        <div class="collapse navbar-collapse" id="navbarResponsive">
<div class="header-rt-top">
			<div class="search-box">
				<form>
					<input type="text" placeholder="Search Professional, Products, Services And More..."> <button class="search-btn" type="submit">Search</button>
				</form>
			</div>
			<?php if (Auth::check()) { ?>
			<div class="login-signup">Welcome  {{Session::get("users")->first_name}} /<a href="logout" title="Login">Logout</a></div>
			<?php }else{ ?>
			<div class="login-signup"><a href="#" title="Login" data-toggle="modal" data-target="#signIn">Login</a> / <a href="#" title="Login" data-toggle="modal" data-target="#signUp">Signup</a></div>
			<?php } ?>
		</div>		
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/" title="HOME">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" title="PHOTO STREAM">PHOTO STREAM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" title="FIND PROFESSIONALS">FIND PROFESSIONALS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" title="ABOUT">ABOUT</a>
            </li>
			<li class="nav-item social-links">
              <a class="nav-link" href="#" title="Facebook"><img src="img/facebook-icon.png" alt="Facebook"></a>
			 <a class="nav-link" href="#" title="Twitter"><img src="img/twitter-icon.png" alt="Twitter"></a>
			 <a class="nav-link" href="#" title="Google Plus"><img src="img/googlePlus-icon.png" alt="Google Plus"></a>
			 <a class="nav-link" href="#" title="Linkedin"><img src="img/linkedin-icon.png" alt="Linkedin"></a>
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
		 {!! Form::input('hidden', 'captcha', null) !!}
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
				<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
			  
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
			{!! Form::close() !!}
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

