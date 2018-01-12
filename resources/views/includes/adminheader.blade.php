<div class="admin_header">
	<img src="/img/1.png" class="logo_home" alt="a picture">
	 <?php if (Auth::check()) { ?>
	<h2 class="user-name">Hi! {{Session::get("users")->first_name}} <a href="{{ url('logout') }}">Logout</a></h2>
        <div class="clear"></div>
      <?php } else { ?>
		  
      <?php } ?>
</div>



