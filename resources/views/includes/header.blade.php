<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="img/logo.png" alt="wedding" width="75" height="79"></a>
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
			<div class="login-signup">Welcome  {{Session::get("users")->first_name}} / <a href="logout" title="Login">Logout</a></div>
			<?php }else{ ?>
			<div class="login-signup"><a href="login" title="Login">Login</a> / <a href="register" title="Login">Signup</a></div>
			<?php } ?>
		</div>		
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#" title="HOME">HOME</a>
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
