@extends('layouts.master')
@section('content')
  <!-- Page Content -->
	<!-- body container start -->
	<div class="container">
		
		<div class="contactUs-top">
			<h1 class="heading"><?php echo $page->name; ?></h1>
		</div>
		<div class="row contact-address">
			<?php echo nl2br($page->content); ?>
		</div>


	</div>
	
@endsection





	<!-- body container end -->
	    
