$(document).ready(function() {	

	
	$("#loadmore").on("click",function(){
		//console.log("here");
		var i = 0;
		var flag = false;
		$(".img-item").each(function(){
			
			if ($(this).hasClass("hide")) {
				if ( i < 12 ) {
					$(this).removeClass("hide");
					$(this).show();
					++i;
				} else {
					flag = true;
				}
			}
		});
		//console.log($(".hide").length);
		if(flag) {
			$("#loadmore").hide();
		}
	});
	
	$("#load_more").on("click",function(){
		console.log("here");
		var i = 0;
		var flag = true;
		$(".list-box").each(function(){
			
			if ($(this).hasClass("hide")) {
				if ( i < 3 ) {
					$(this).removeClass("hide");
					$(this).show();
					++i;
				} else {
					flag = false;
				}
			}
		});
		if(flag) {
			$("#load_more").hide();
		}
	});
});
