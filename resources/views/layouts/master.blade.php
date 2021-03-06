<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta itemprop="name" content="<?php echo (isset($title)?($title ." - WedSetGo" ):'WedSetGo'); ?>">
	<meta itemprop="description" content="<?php echo (isset($ogdesc)?($ogdesc):'WedSetGo'); ?>">
	<meta itemprop="image" content="<?php echo isset($ogimage)?$ogimage:''; ?>">
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo (isset($title)?($title ." - WedSetGo" ):'WedSetGo'); ?>" />
	<meta property="og:description" content="<?php echo (isset($ogdesc)?($ogdesc):'WedSetGo'); ?>" />
	<meta property="og:url" content="<?php echo isset($url)?$url:''; ?>" />
	<meta property="og:site_name" content="wedsetgo" />
	<meta property="og:image" content="<?php echo isset($ogimage)?$ogimage:''; ?>" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@zestmindstech">
	<meta name="twitter:description" content="<?php echo (isset($ogdesc)?($ogdesc):'WedSetGo'); ?>" />
	<meta name="twitter:title" content="<?php echo (isset($title)?($title." -WedSetGo "):'WedSetGo'); ?>" />
	<meta name="twitter:creator" content="@zestmindstech">
	<meta name="twitter:image:src" content="<?php echo isset($ogimage)?$ogimage:''; ?>" />
    <title><?php echo (isset($title)?($title ." - WedSetGo"):'WedSetGo'); ?></title>
	<link rel="shortcut icon" href="/img/favicon.ico" type="img/x-icon"> 
	<link rel="icon" href="/img/favicon.ico" type="img/x-icon">
    <!-- Bootstrap core CSS -->
    <!--link href="css/bootstrap.min.css" rel="stylesheet"-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
   <!-- Custom styles -->
	 <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
	 <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5a8fa318e3b02a00133b2f2c&product=inline-share-buttons' async='async'>
		
	 </script>
	 </head>
   <body>
	   
		@if(Session::has('flash_message'))
            <div class="success_message">
                {{ Session::get('flash_message') }}
            </div>
        @endif
		@if(Session::has('error'))
            <div class="error">
                {{ Session::get('flash_message') }}
            </div>
        @endif
			@include('includes.header')			
			@if($errors->any())
				<div class="error">
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
