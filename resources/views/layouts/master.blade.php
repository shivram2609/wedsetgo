<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles -->
	<link rel="stylesheet" href="css/style.css">
   <title>@yield('title')</title>	
    </head>
   <body>
	   
		@if(Session::has('flash_message'))
            <div style="color:green; border:1px solid #aaa; padding:4px; margin-top:10px">
                {{ Session::get('flash_message') }}
            </div>
        @endif
			@include('includes.header')			
			@if($errors->any())
				<div style="color:red; border:1px solid #aaa; padding:4px; margin-top:10px">
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
