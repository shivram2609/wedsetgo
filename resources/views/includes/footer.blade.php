  <!-- Footer -->
    <footer class="py-5 footer">
      <div class="container">
	  <div class="row">
		<div class="col-sm-3">
			 <a class="navbar-brand" href="/"><img src="{{URL::to('img/logo.png')}}" alt="wedding" width="75" height="79"></a>
		</div>
		<div class="col-sm-3">
			<h3 class="footer-heading">About Wed.Set.Go</h3>
			<ul class="footer-links">
				<li><a href="/" title="Home">Home</a></li>
				<li><a href="/st/about-us" title="About">About</a></li>
				<li><a href="/contact_us" title="Contact Us">Contact Us</a></li>
				<li><a href="/photostream" title="Photo Stream">Photo Stream</a></li>
				<li><a href="{{ url('register') }}" title="Create a free account" data-toggle="modal" data-target="#signUp">Create a free account</a></li>
				<li><a href="/seller" title="Find professionals">Find professionals</a></li>
			</ul>
		</div>
		<div class="col-sm-3">
			<h3 class="footer-heading">Get in touch</h3>
			<p><i class="fa fa-phone" aria-hidden="true"></i> +447570422465<br>
<!--
			<i class="fa fa-fax"></i> +1 496 457 654<br>
-->
			<i class="fa fa-envelope-o" aria-hidden="true"></i> contactwedsetgo@gmail.com<br>
			<i class="fa fa-map-marker" aria-hidden="true"></i> Coming Soon </p>
		</div>
		<div class="col-sm-3">
			<h3 class="footer-heading">Follow Us On :</h3>
			<div class="social-links"> 
			 <a class="nav-link" href="https://www.facebook.com/WedSetGoOfficial/?ref=br_rs" title="Facebook" target="_blank"><img src="{{URL::to('img/facebook-icon.png')}}" alt="Facebook"></a>
			 <a class="nav-link" href="https://twitter.com/Wed_Set_Go" title="Twitter" target="_blank"><img src="{{URL::to('img/twitter-icon.png')}}" alt="Twitter"></a>
			 <a class="nav-link" href="https://plus.google.com/u/0/114969599777634821732" title="Google Plus" target="_blank"><img src="{{URL::to('img/googlePlus-icon.png')}}" alt="Google Plus"></a>
			 <a class="nav-link" href="https://www.linkedin.com/company/wed-set-go/" title="Linkedin" target="_blank"><img src="{{URL::to('img/linkedin-icon.png')}}" alt="Linkedin"></a>
			 <a class="nav-link" href="https://www.instagram.com/wedsetgo/" title="Instagram" target="_blank"><img src="{{URL::to('img/instagram-icon.png')}}" alt="Linkedin"></a>
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
	<script type="text/javascript" src="{{ asset('js/nicescroll.min.js') }}" async='async'></script>
	<?php if (Auth::check()) { ?>
	<?php } else { ?>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	<?php } ?>
	<script>
		
		 $(document).ready(function(){
			 
				setTimeout(function() {
					$('.flash_message').fadeOut('fast');
					$('.error_message').fadeOut('fast');
					$('.error').fadeOut('fast');
					$('.success_message').fadeOut('fast');
				}, 3000);
				
				$("#signup").on("click",function(e){
					$("#signIn").modal("hide");
				});
				$("#signUp").on("hidden.bs.modal",function(){
					$("#u_type").val("1")
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
			
			//~ $("#checkbox_professional").click(function() {
			//~ if($(this).is(":checked")) {
			//~ $('#checkbox_professional').prop('checked', true);
			//~ }
			//~ else{
			//~ $('#checkbox_professional').prop('checked', false);	
				//~ }
			//~ });
			
			//~ $("#website").on("keyup", function(){
				//~ if(this.value!=""){
				//~ $('#checkbox_professional').prop("checked", "checked");
					//~ }else{
				//~ $('#checkbox_professional').prop('checked', ""); 
				//~ }
			//~ });
			
			
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
				else{
					$('.professional_status').addClass("hide");
					
					}
			});
			
			//~ $('#checkbox_professional').click(function(){
				//~ if($(this).is(":checked")){
				//~ $('#website').val('');
			//~ }
    //~ });
			//~ $('#checkbox_professional').click(function(){
				//~ if($(this).is(":checked")){
				//~ $('#street').val('');
			//~ }
    //~ });
			
	    $('.confirm').on('click', function (e) {
		 return !!confirm($(this).data('confirm'));
		 });
		 
		 $('#location_select').on('change', function () {
			var optionSelected = $(this).val();
			if(optionSelected =='0'){
				$('#other_loc').removeClass('hide');
			} else {
				$('#other_loc').addClass('hide');
			}
		});
		
		$(document).ready(function(){
      //  $('#category_selected').attr('disabled','disabled');
	});
		 $('#category_selected').on('change', function () {
			var optionSelected = $(this).val();
			if(optionSelected =='0'){
				$('#other_cate').removeClass('hide');
			} else {
				$('#other_cate').addClass('hide');
			}
		});
  });

    </script>
 <script>
  $(document).ready(function() {
	  
	  $("#brideSignin").on("click",function(){
		  $("#u_type").val("1");
	  });
	  
	  $("#sellerSignin").on("click",function(){
		  $("#u_type").val("2");
	  });
	var keyFlag = false;
	$("#search_text").on("keyup",function(){
		if ( $(this).val().length <= 0 ) {
			$(".auto_helper").hide();
		} else {
			$(".auto_helper").show();
		}	
		$("#txt1").html("<b>"+$(this).val()+"</b> in Photos.");
		$("#txt2").html("<b>"+$(this).val()+"</b> in Professionals.");
		$("#txt3").html("<b>"+$(this).val()+"</b> in Products/Services.");
		$(".auto_helper").removeClass("hide");
		
	});
	
	$("#search_text").on("focus",function(){	
		if ($("#keysearch").val().length > 0) {
			$("#search_text").val($("#keysearch").val());
			
			$("#txt1").html("<b>"+$(this).val()+"</b> in Photos.");
			$("#txt2").html("<b>"+$(this).val()+"</b> in Professionals.");
			$("#txt3").html("<b>"+$(this).val()+"</b> in Products/Services.");
			$(".auto_helper").removeClass("hide");
			$("#keysearch").val('');
			
		}
	});
	$("body").on("click",function(){
		$(".auto_helper").hide();;
	});
	
	$(".select_text").on("click",function(){
		$("#optsearch").val($(this).attr("val"));
		$("#keysearch").val($("#search_text").val());
		var str = $(this).html().replace("<b>","");
		var str = str.replace("</b>","");
		$("#search_text").val(str);
		$('#photostream_form').submit();
	});
	
});
      
  $(document).ready(function(){
			//alert("here");
		$(".st-last").removeAttr("style");
		
		$("#signup_from").submit(function(){
			var term = $("#term_condition").prop('checked')==true;
			if(term == true){
				
			} else {
				alert("Please check the box for term and conditons.")
				return false;
			}
			
			});
	});
  
</script>
<script async='async'>
	$(document).ready(function(){
		$("html").niceScroll({cursorborder:"",cursoropacitymax:0.7,boxzoom:true,scrollspeed:60,mousescrollstep:40,cursorwidth:6,cursorborder:0,cursorcolor:"#808080",autohidemode:!1,zindex:9999999,horizrailenabled:!1,cursorborderradius:0});
  });
</script>
