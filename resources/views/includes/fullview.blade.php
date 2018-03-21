	<!-- list container start -->
<div class="productFull-viewList">
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
<!-- Wrapper for slides -->
 <div class="carousel-inner" role="listbox">
@foreach($userphotogrid as $userphotogrids)

<div class="carousel-item active">

	<div class="row">
	
	  <div class="holder col-sm-8">
		  <?php if(!empty($userphotogrids->images)) { ?>
			<img src="/work_image/{{$userphotogrids->images}}" alt="img012" class="img-fluid form-group" width="981" height="844">
		 <?php } else { ?>
			<img src="img/img015.jpg" alt="img012" class="img-fluid form-group" width="981" height="844">
		<?php } ?>
		
		<div class="text-center">
			<?php if(Auth::check()){ ?>
				<a href="{{ url('/v') }}/{{$userphotogrids->id}}-{{$userphotogrids->title}}" class="btn btn-bdrSml"> Add to vision book</a>
			<?php } else { ?>
				<a href="#" title="Login" data-toggle="modal" data-target="#signIn" class="btn btn-bdrSml">Add to vision book</a>
			<?php }?>
	</div>
	  </div>
	  <div class="col-sm-4">
		<div class="carousel-caption">
			<div class="heading">
				<?php if(!empty($userphotogrids->profile_image)) { ?>
					<img src="/uploads/avatars/{{$userphotogrids->profile_image}}" alt="user" class="img-reponsive" width="47" height="51">
				<?php } else { ?>
					<img src="images/dummy-user.jpg" alt="user" class="img-reponsive" width="47" height="51">
				<?php } ?>
					{{$userphotogrids->title}}
				</div>
				<p>{{$userphotogrids->description}}</p>
				<p><b>Category:</b><br>
					{{$userphotogrids->name}}<br>
					<b>Date:</b><br>
					{{$userphotogrids->created_at}}<br>
					<b>Tags:</b><br>
					{{$userphotogrids->tag}} <br>
					<div class="share-links">
					like the idea and the concept :
					<div class="social-links">
						 <a class="nav-link" href="#" title="Facebook"><img src="img/facebook-icon.png" alt="Facebook"></a>
						 <a class="nav-link" href="#" title="Twitter"><img src="img/twitter-icon.png" alt="Twitter"></a>
						 <a class="nav-link" href="#" title="Google Plus"><img src="img/googlePlus-icon.png" alt="Google Plus"></a>
						 <a class="nav-link" href="#" title="Linkedin"><img src="img/linkedin-icon.png" alt="Linkedin"></a>
						 </div>
					</div>  
		</div>
	  </div>
	 </div>
</div>


@endforeach
 </div>
<div class="controllers col-sm-8 col-xs-12">
<!-- Controls -->
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
	  
</div>

 </div>	
</div>


