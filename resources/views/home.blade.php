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
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('img/slider001.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/slider001.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/slider001.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div>
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
    <div class="container">
		<h1 class="main-heading">Design the wedding you’ve always wanted...</h1>
		<div class="btn-outer">
			<a href="#" title="Brides & Grooms Get Started" class="theme-btn btn">Brides & Grooms Get Started</a> <a href="#" title="Professionals Get Started " class="theme-btn btn">Professionals Get Started </a>
		</div>
		<div class="text-center links-icon">
			<a href="#" title="Wedding Planners" class="icon-links">
				<img src="img/calander.png" alt="Wedding Planners" class="img-reponsive" width="90" height="75">Wedding Planners
			</a>
			<a href="#" title="Invitations" class="icon-links">
				<img src="img/invitations.png" alt="Invitations" class="img-reponsive" width="90" height="75">Invitations
			</a>
			<a href="#" title="Venues" class="icon-links">
				<img src="img/venues.png" alt="Venues" class="img-reponsive" width="90" height="75">Venues
			</a>
			<a href="#" title="Photography" class="icon-links">
				<img src="img/photography.png" alt="Photography" class="img-reponsive" width="90" height="75">Photography
			</a>
			<a href="#" title="Bridalwear" class="icon-links">
				<img src="img/bridalwear.png" alt="Bridalwear" class="img-reponsive" width="90" height="75">Bridalwear
			</a>
			<a href="#" title="Muah" class="icon-links">
				<img src="img/muah.png" alt="Muah" class="img-reponsive" width="90" height="75">Muah
			</a>
			<a href="#" title="Caterers" class="icon-links">
				<img src="img/caterers.png" alt="Caterers" class="img-reponsive" width="90" height="75">Caterers
			</a>
			<a href="#" title="Jewellers " class="icon-links">
				<img src="img/jewellers.png" alt="Jewellers" class="img-reponsive" width="90" height="75">Jewellers
			</a>
			<a href="#" title="Music" class="icon-links">
				<img src="img/music.png" alt="Music" class="img-reponsive" width="90" height="75">Music
			</a>
			<a href="#" title="Cakes" class="icon-links">
				<img src="img/cake.png" alt="Cakes" class="img-reponsive" width="90" height="75">Cakes
			</a>
			<a href="#" title="Florists" class="icon-links">
				<img src="img/florists.png" alt="Florists" class="img-reponsive" width="90" height="75">Florists
			</a>
			<a href="#" title="Transport" class="icon-links">
				<img src="img/transport.png" alt="Transport" class="img-reponsive" width="90" height="75">Transport
			</a>
			<a href="#" title="Extras" class="icon-links">
				<img src="img/extra.png" alt="Extras" class="img-reponsive" width="90" height="75">Extras
			</a>
			<a href="#" title="Priests" class="icon-links">
				<img src="img/priests.png" alt="Priests" class="img-reponsive" width="90" height="75">Priests
			</a>
			
		</div>
	</div>
    <section class="py-5">
	
	<div id="container">
	  <div class="img-item"><img src="img/img001.jpg" alt="img001" class="img-reponsive" width="512" height="375"></div>
	  <div class="img-item"><img src="img/img002.jpg" alt="img002" class="img-reponsive" width="512" height="375"></div>
	  <div class="img-item"><img src="img/img003.jpg" alt="img003" class="img-reponsive" width="512" height="375"></div>
	  <div class="img-item"><img src="img/img004.jpg" alt="img004" class="img-reponsive" width="512" height="260"></div>
	  <div class="img-item"><img src="img/img006.jpg" alt="img005" class="img-reponsive" width="512" height="260"></div>
	  <div class="img-item"><img src="img/img005.jpg" alt="img006" class="img-reponsive" width="512" height="520"></div>
	  <div class="img-item"><img src="img/img007.jpg" alt="img007" class="img-reponsive" width="512" height="260"></div>
	  <div class="img-item"><img src="img/img008.jpg" alt="img008" class="img-reponsive" width="512" height="260"></div>
	  <div class="img-item"><img src="img/img009.jpg" alt="img009" class="img-reponsive" width="512" height="375"></div>
	  <div class="img-item"><img src="img/img010.jpg" alt="img010" class="img-reponsive" width="512" height="375"></div>
	  <div class="img-item"><img src="img/img011.jpg" alt="img011" class="img-reponsive" width="512" height="375"></div>
	</div>

    </section>
@endsection
