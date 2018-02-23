@extends('layouts.master')
@section('content')
<header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
         <div class="carousel-inner" role="listbox">
			
          <!-- Slide One - Set the background img for this slide in the line below -->
          <?php $i = 0; ?>
           @foreach ($slider as $sliders)
          <div class="carousel-item <?php $class = (($i==0)?"active":""); echo $class; ++$i; ?>" style="background-image: url('slider/<?php echo $sliders->image; ?>')">
            <div class="carousel-caption d-none d-md-block">
              <h3>{{$sliders->heading}}</h3>
              <p>{{$sliders->description}}</p>
            </div>
          </div>
            @endforeach
          <!-- Slide Two - Set the background img for this slide in the line below -->
          <!-- Slide Three - Set the background img for this slide in the line below -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
	<div class="container">
		<h1 class="main-heading">Design the wedding you’ve always wanted...</h1>
		<div class="btn-outer">
			<a href="#" title="Brides & Grooms Get Started" class="theme-btn btn" data-toggle="modal" data-target="#signUp">Brides & Grooms Get Started</a> <a href="#" title="Professionals Get Started " class="theme-btn btn" data-toggle="modal" data-target="#signUp">Professionals Get Started </a>
		</div>
		<div class="text-center links-icon">
			 @foreach ($catgagory as $catgagories)
				<a href="/photostream?catagory_id=<?php echo $catgagories->id; ?>" title="<?php echo $catgagories->name; ?>" class="icon-links">
					<img src="categories/<?php echo $catgagories->image; ?>" alt="<?php echo $catgagories->name; ?>" class="img-reponsive" width="90" height="75">{{$catgagories->name}}
				</a>
			@endforeach
				
		</div>
	</div>
    <section class="home-gallery">
	
	<div class="masonry">
	@foreach ($userworks as $userwork)
		<?php if(!empty($userwork->images)) { ?>
		  <div class="img-item"><img src="/work_image/{{$userwork->images }}" alt="{{$userwork->images }}" class="img-reponsive" width="512" height="375"></div>
		<?php } ?>
	@endforeach
	   <!--div class="img-item"><img src="img/img004.jpg" alt="img004" class="img-reponsive" width="512" height="260"></div>
	  <div class="img-item"><img src="img/img005.jpg" alt="img006" class="img-reponsive" width="512" height="520"></div>
	   <div class="img-item"><img src="img/img009.jpg" alt="img009" class="img-reponsive" width="512" height="375"></div>
	  <div class="img-item"><img src="img/img003.jpg" alt="img003" class="img-reponsive" width="512" height="375"></div>
	  <div class="img-item"><img src="img/img006.jpg" alt="img005" class="img-reponsive" width="512" height="260"></div>
	  <div class="img-item"><img src="img/img010.jpg" alt="img010" class="img-reponsive" width="512" height="375"></div>
	  <div class="img-item"><img src="img/img002.jpg" alt="img002" class="img-reponsive" width="512" height="375"></div>
	  <div class="img-item"><img src="img/img007.jpg" alt="img007" class="img-reponsive" width="512" height="260"></div>
	  <div class="img-item"><img src="img/img008.jpg" alt="img008" class="img-reponsive" width="512" height="260"></div>
	  <div class="img-item"><img src="img/img011.jpg" alt="img011" class="img-reponsive" width="512" height="375"></div -->
	 
	</div>

    </section>
@endsection
