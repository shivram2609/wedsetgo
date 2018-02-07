$(document).ready(function() {	

	
	$("#loadmore").on("click",function(){
		var i = 0;
		$(".img-item").each(function(){
			
			if ($(this).hasClass("hide")) {
				if ( i < 12 ) {
					$(this).removeClass("hide");
					$(this).show();
					++i;
				}
			}
		});
		if($(".hide").length <= 0) {
			$("#loadmore").hide();
		}
	});
	
	$("#load_more").on("click",function(){
		var i = 0;
		$(".list-box").each(function(){
			
			if ($(this).hasClass("hide")) {
				if ( i < 3 ) {
					$(this).removeClass("hide");
					$(this).show();
					++i;
				}
			}
		});
		console.log($(".hide").length);
		if($(".hide").length <= 1) {
			$("#load_more").hide();
		}
	});
});
