<div class="admin_header">
	<a class="navbar-brand" href="/"><img src="<?php echo asset("/img/logo.png")?>" alt="wedding" width="75" height="79"></a>
	 <?php if (Auth::check()) { ?>
	<h2 class="user-name">Hi! {{Session::get("users")->first_name}} <a href="{{ url('logout') }}">Logout</a></h2>
        <div class="clear"></div>
      <?php } else { ?>
		   <h2 class="user-name" ><a href="{{ url('/') }}">Home</a> <a href="{{ url('register') }}">signup</a><a href="{{ url('login') }}">Login</a></h2>
        <div class="clear"></div>
      <?php } ?>

</div>



