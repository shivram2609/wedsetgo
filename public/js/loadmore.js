$(document).ready(function() {	

	var tmpLoadString = '<div class="img-item"><div class="img-box"><div class="overlay"><a href="add_work/{ID}" class="btn-edit" title="Edit">Edit</a></div><img src="/work_image/{IMG}" alt="img001" class="img-reponsive" width="512" height="375"></div><div class="text-box"><div class="img"><img src="/uploads/avatars/{PROFILE_IMAGE}" alt="user" class="img-reponsive" width="47" height="51"></div><div class="text"><b>{HEADING}</b>{DESCRIPTION}</div></div></div>';
	$("#loadmore").on("click",function(){
		var i = 0;
		$(".img-item").each(function(){
			
			if ($(this).hasClass("hide")) {
				if ( i < 1 ) {
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
				if ( i < 1 ) {
					$(this).removeClass("hide");
					$(this).show();
					++i;
				}
			}
		});
		if($(".hide").length <= 0) {
			$("#load_more").hide();
		}
	});
});
