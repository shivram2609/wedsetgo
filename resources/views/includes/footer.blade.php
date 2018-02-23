  <!-- Footer -->
    <footer class="py-5 footer">
      <div class="container">
	  <div class="row">
		<div class="col-sm-3">
			 <a class="navbar-brand" href="/"><img src="{{URL::to('img/logo.png')}}" alt="wedding" width="75" height="79"></a>
		</div>
		<div class="col-sm-3">
			<h3 class="footer-heading">About wed.Set.Go</h3>
			<ul class="footer-links">
				<li><a href="/" title="Home">Home</a></li>
				<li><a href="/st/about-us" title="About">About</a></li>
				<li><a href="/contact_us" title="Contact Us">Contact Us</a></li>
				<li><a href="/photostream" title="Photo Stream">Photo Stream</a></li>
				<li><a href="#" title="Create a free account" data-toggle="modal" data-target="#signUp">Create a free account</a></li>
				<li><a href="/seller" title="Find professionals">Find professionals</a></li>
			</ul>
		</div>
		<div class="col-sm-3">
			<h3 class="footer-heading">Get in touch</h3>
			<p>Phone: +1 123 457 653<br>
			Fax: +1 496 457 654<br>
			Email: our-mail@example.com<br>
			Adress: 121 King Street, Melbourne </p>
		</div>
		<div class="col-sm-3">
			<h3 class="footer-heading">Follow Us On :</h3>
			<div class="social-links"> 
			 <a class="nav-link" href="#" title="Facebook"><img src="{{URL::to('img/facebook-icon.png')}}" alt="Facebook"></a>
			 <a class="nav-link" href="#" title="Twitter"><img src="{{URL::to('img/twitter-icon.png')}}" alt="Twitter"></a>
			 <a class="nav-link" href="#" title="Google Plus"><img src="{{URL::to('img/googlePlus-icon.png')}}" alt="Google Plus"></a>
			 <a class="nav-link" href="#" title="Linkedin"><img src="{{URL::to('img/linkedin-icon.png')}}" alt="Linkedin"></a>
			 </div>
		</div>		
	  </div>
        <p class="m-0 text-center">Copyright &copy; 2018 wedsetgo All Rights Reserved.</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="http://masonry.desandro.com/jquery.masonry.min.js"></script>
	<script>
	$( function() {

		$('#container').masonry({
			itemSelector: '.img-item',
			//columnWidth: 70
		});

	});
	</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.pt-BR.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-star-rating.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/nicescroll.min.js') }}"></script>
	<?php if (Auth::check()) { ?>
	<?php } else { ?>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	<?php } ?>
	<script>
		
		 $(document).ready(function(){
			 
				setTimeout(function() {
					$('.flash_message').fadeOut('fast');
					$('.error_message').fadeOut('fast');
					$('.success_message').fadeOut('fast');
				}, 3000);
				
				$("#signup").on("click",function(e){
					$("#signIn").modal("hide");
				});
				
				$("#signinmodal").on("click",function(e){
					$("#signUp").modal("hide");
				});
				
				$("#forgotlink").on("click",function(e){
					$("#signIn").modal("hide");
					$("#signUp").modal("hide");
				});
				
			  $('#my_work_select').on('change', function() {
				document.forms['select_category'].submit();
			  });
			  
			 if ( $('.input-group.date') ) { 
				$('.input-group.date').datepicker({
					format: 'yyyy-mm-dd',
					language: 'pt-BR',
					weekStart: 0,
					todayHighlight: true
				});
			}
			  if ( $('#add_title') ) { 
				$('#add_title').click(function(){
					
					$("#new_title").removeClass('hide');
					$("#title").prop('disabled', false);
					$("#vision_title").prop('disabled', true);
					$("#title").removeClass('hide');
					$("#add_title").addClass('hide');
					$("#vision_title").addClass('hide');
					});
			}	
			  if ( $('#new_title') ) { 
				$('#new_title').click(function(){
					
					$("#add_title").addClass('hide');
					$("#title").prop('disabled', true);
					$("#vision_title").prop('disabled', false);
					$("#title").addClass('hide');
					$("#add_title").removeClass('hide');
					$("#vision_title").removeClass('hide');
					$("#new_title").addClass('hide');
					});
			}	
			
			$("#read-more").on("click",function(){
				$(".short_desc").hide();
				$(".long_desc").removeClass("hide");
				$(".long_desc").show();
				$(this).hide();
			});
			
			
		$('.pullright').click(function(){
			$('.visionbook_detail').addClass('hide');
			$('.pullright').addClass('hide');
			$('.pullleft').removeClass('hide');
			$('.visionbook_image').addClass('holder col-sm-12');
			
			
		});	
		$('.pullleft').click(function(){
			$('.visionbook_detail').removeClass('hide');
			$('.pullright').removeClass('hide');
			$('.pullleft').addClass('hide');
			$('.visionbook_image').removeClass('holder col-sm-12');
			
			
		});	
			
	   // initialize with defaults
		$("#input-id").rating();
		 
		// with plugin options
		$("#input-id").rating({min:1, max:10, step:2, size:'lg'});
			
			  
		});
	
	</script>
	
	<script>
		$(window).scroll(function() {
		  if ($(document).scrollTop() > 50) {
			$('nav').addClass('shrink');
		  } else {
			$('nav').removeClass('shrink');
		  }
		});
	</script>
	<script type="text/javascript" src="{{ asset('js/loadmore.js') }}"></script>
	 <script>
        $(document).ready(function () {
            $(".rate").on("click",function(){
				var index = $(this).attr("val");
				$(".rate").each(function(obj){
					if ( $(this).attr("val") <= index ) {
						$(this).addClass("gold-star");
					} else {
						$(this).removeClass("gold-star");
					}
				});
				$("#rate_val").val($(this).attr("val"));
			});
            
            $(".rate").on("mouseover",function(){
				var index = $(this).attr("val");
				$(".rate").each(function(obj){
					if ( $(this).attr("val") <= index ) {
						$(this).addClass("gold-star");
					}
				});
			});
            $(".rate").on("mouseout",function(){
				//console.log("here");
				var index = $(this).attr("val");
				var rateVal = $("#rate_val").val();
				$(".rate").each(function(obj){
					//console.log($(this).attr("val"));
					
					if ( $(this).attr("val") > rateVal ) {
						$(this).removeClass("gold-star");
					}
				});
			});
			
		$("#checkbox_professional").click(function() {
			if($(this).is(":checked")) {
				$('.professional_status').removeClass("hide");
				}
			});
		
            
        });
    </script>
 <script>
  $(document).ready(function() {
      $("html").niceScroll({cursorborder:"",cursoropacitymax:0.7,boxzoom:true,scrollspeed:60,mousescrollstep:40,cursorwidth:6,cursorborder:0,cursorcolor:"#808080",autohidemode:!1,zindex:9999999,horizrailenabled:!1,cursorborderradius:0});
  });
  $(document).ready(function(){
			//alert("here");
			$(".st-last").removeAttr("style");
		});
  
</script>
