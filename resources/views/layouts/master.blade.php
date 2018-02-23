<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo (isset($title)?($title ." - WedSetGo"):'WedSetGo'); ?></title>

    <!-- Bootstrap core CSS -->
    <!--link href="css/bootstrap.min.css" rel="stylesheet"-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/star-rating.css') }}" rel="stylesheet" type="text/css" >
    
	<!-- Custom styles -->
	 <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
	 <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5a8fa318e3b02a00133b2f2c&product=inline-share-buttons' async='async'></script>
	 </head>
   <body>
	   
		@if(Session::has('flash_message'))
            <div class="success_message">
                {{ Session::get('flash_message') }}
            </div>
        @endif
		@if(Session::has('error'))
            <div class="error_message">
                {{ Session::get('flash_message') }}
            </div>
        @endif
			@include('includes.header')			
			@if($errors->any())
				<div class="error_message">
					@foreach($errors->all() as $error)
						<p>{{ $error }}</p>
					@endforeach
				</div>
			@endif
			 
			 
				<div id="content">
					@yield('content')
				
			 </div>
			@include('includes.footer')
	</body>
</html>
