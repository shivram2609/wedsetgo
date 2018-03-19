<html>
    <head>
		<link rel="stylesheet" href="/css/admin/admin.css">
		<link rel="stylesheet" href="/css/admin/banner.css">
		<link rel="stylesheet" href="/css/admin/jquery-ui.css">
		<link rel="stylesheet" href="/css/admin/ui.css">
		<script type="text/javascript" src="/js/admin/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="/js/admin/jquery.validate.js"></script>
		<script type="text/javascript" src="/js/admin/validationmessages.js"></script>
		<script type="text/javascript" src="/js/admin/validate.js"></script>
        <title>@yield('title')</title>
    </head>
    <body>
		@if(Session::has('flash_message'))
            <div style="color:green; border:1px solid #aaa; padding:4px; margin-top:10px">
                {{ Session::get('flash_message') }}
            </div>
        @endif
		<div class="main_box">
			@include('includes.adminheader')
			
			 <div id="container">
				<div id="content">
					@if($errors->any())
						<div style="color:red; border:1px solid #aaa; padding:4px; margin-top:10px;float:left;text-align:-moz-center;width:100%;">
							@foreach($errors->all() as $error)
								<p>{{ $error }}</p>
							@endforeach
						</div>
					@endif
					@if(Auth::check())
						@include('includes.adminleft')
					@endif
					@yield('content')
				</div>
			 </div>
			@include('includes.adminfooter')
		</div>	
	</body>
</html>
