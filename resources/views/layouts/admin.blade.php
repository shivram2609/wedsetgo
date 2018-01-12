<html>
    <head>
		<link rel="stylesheet" href="/css/admin/admin.css">
		<link rel="stylesheet" href="/css/admin/banner.css">
		<link rel="stylesheet" href="/css/admin/jquery-ui.css">
		<link rel="stylesheet" href="/css/admin/ui.css">
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
			@if($errors->any())
				<div style="color:red; border:1px solid #aaa; padding:4px; margin-top:10px">
					@foreach($errors->all() as $error)
						<p>{{ $error }}</p>
					@endforeach
				</div>
			@endif
			 <div id="container">
				<div id="content">
					@include('includes.adminleft')
					@yield('content')
				</div>
			 </div>
			@include('includes.adminfooter')
		</div>	
	</body>
</html>
