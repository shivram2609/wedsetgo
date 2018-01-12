$(document).ready(function() {	

	
  $(document).on('click', '.chk', function () {
    if ($('.chk:checked').length == $('.chk').length) {
       $("#checkall").prop("checked", true);
    }
	});	
	$(document).on('click', '#checkall', function () {	
		$(".chk").prop("checked",this.checked);	
		$(".chk").attr("checked",this.checked);	
	});	
	
	$('.common_search').bind('keypress', function (event) {
		var regex = new RegExp("^[a-zA-Z0-9]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
		   event.preventDefault();
		   return false;
		}
	});
	
	//~ $(document).on('click', '.multile-images', function () {	
		//~ var r = confirm('Are you sure you want to delete image?');
		//~ alert(r); return false;
		//~ if(r == true) {
			//~ return true;
		//~ } else {
			//~ return false;
		//~ }
	//~ });
	
	$(document).on('click', '.submitsearch', function () {
		
		 $("select").val("0");
	});

	$("#resetbtn").hide();
	var searchval = $(".searchvalue").val();
	if(searchval != '') {
		$("#resetbtn").show();
	}
	$(".searchvalue").keyup(function () {
		var searchval = $(".searchvalue").val();
		if(searchval != '') {
			$("#resetbtn").show();
		} else {
			$("#resetbtn").hide();
		}
	});
	$(".submitsearch").click(function () {
		var searchval = $(".searchvalue").val();
		if(searchval != '') {
			$("#resetbtn").show();
		} else {
			$("#resetbtn").hide();
		}
	});

	
	$(document).on('click', '#resetbtn', function () {
		$(".searchvalue").val("");
		$('#search_err').hide();
	});
	/*$(document).on("click",".makeurl",function(){ 				
		var srchval = $("#searchid").val();
		var current_url = window.location.href;		
		var url = current_url+"/index/"+srchval;  
		window.location.replace(url);
        return false;
	});*/
	
	$(".chk").click(function(){	
		if($(".chk").length == $(".chk:checked").length){			
			$("#checkall").attr("checked","checked");
		}else{
			$("#checkall").removeAttr("checked");
		}
	});	
	var searchButton 	= '';	
	$(".submitsearch").click(function() {		
		searchButton = $(this).attr('attr');		
	});	
	/* below code is to validate checkall functionality for every page on which we perform delete multiple or update multiple functionalioty*/
	$("#CategoryAdminIndexForm,#LocationAdminIndexForm,#CuisineAdminIndexForm,#DishAdminIndexForm,#UserAdminIndexForm").submit(function(){  if(searchButton == ''){ return validatemultipleaction(); }else{ $(".chk").removeAttr("checked"); return true; } });
	/* end here */
	
    
    $.validator.addMethod('lessThanEqual', function(value, element, param) {
    return this.optional(element) || parseInt(value) <= parseInt($(param).val());
	}, "The value {0} must be less than {1}");

    
	/* remove flash message when we retype password input*/
    $('#AdminCurrentpassword').change(function() {
        $('#flashMessage').hide();
    });

    $('#AdminCurrentpassword,#AdminNewpassword,#AdminConfirmpassword').bind("cut copy paste", function(e) {
        e.preventDefault();
    });

	$('#CategoryEditForm input').attr("disabled",true);     
    
    $(document).on('click', '#cat_edit', function () {
	    $('#CategoryEditForm input').attr("disabled",false);
	});
	
	$(document).on('click','#cat_rej',function(){
		if (confirm('Are you sure you want to reject this category.')) {			
		} else {
			return false;
		}
	});
	$(document).on('click','#cat_accpt',function(){
		if (confirm('Are you sure you want to accept this category.')) {			
		} else {
			return false;
		}
	});
    $("#UserLoginForm").validate({
        rules: {
            'data[User][email]': {
                required: true,
                email: true
            },
            'data[User][password]': {
                required: true,
                //minlength: 6
            }
        },
        messages: {
            'data[User][email]': {
                required: 'Please enter email address.',
                email: 'Please enter a valid email address.'
            },
            'data[User][password]': {
                required: 'Please enter your password',
                //minlength: 'Password must be 6 characters long. '
            }
        }
    });
    
    $("#RequestcategoryRequestcategoryForm").validate({
        rules: {
            'data[Requestcategory][category_name]': {
                required: true
            },
            'data[Requestcategory][category_description]':{
				 required: true
			 }
        },
        messages: {
            'data[Requestcategory][category_name]': {
                required: "Please enter category name"
            },
            'data[Requestcategory][category_description]':{
				 required: "Please enter category description"
			 }
        }
    });
    

    $("#UserAdminEditForm").validate({
        rules: {
            'data[User][txtpassword]': {
                required: false,
                minlength: 5,
                maxlength: 15
            },
            'data[User][txtCpassword]': {
                required: false,
                equalTo: "#UserTxtpassword"
            }
        },
        messages: {
            'data[User][txtpassword]': {
                required: EMPTYNEWPASSWORD,
                minlength: PASSWORD5LENGTHMESSAGE,
                maxlength: PASSWORDMAX15MESSAGE
            },
            'data[User][txtCpassword]': {
                required: EMPTYCONFIRMPASSWORD,
                equalTo: PASSWORDMISMATCHMESSAGE
            }
        }
    });


    /* end of block */

    /*
     * @below block of code is used to validate change password page in forgot password process
     * @Error messages are defined in validationmessages.js file in app/webroot/js
     * @common function removeSpaces is declared and defined in common_functions.js file in app/webroot/js
     */
    $("#AdminResetpasswordForm").validate({
        rules: {
            'data[Admin][newpassword]': {
                required: true,
                minlength: 6,
                maxlength: 15
            },
            'data[Admin][confirmpassword]': {
                required: true,
                equalTo: "#AdminNewpassword"
            }
        },
        messages: {
            'data[Admin][newpassword]': {
                required: EMPTYNEWPASSWORD,
                minlength: PASSWORD6LENGTHMESSAGE,
                maxlength: PASSWORDMAX15MESSAGE
            },
            'data[Admin][confirmpassword]': {
                required: EMPTYCONFIRMPASSWORD,
                equalTo: PASSWORDMISMATCHMESSAGE
            }
        }
    });

   
	/*
     * @below block of code is used to validate change password page in admin panel
     * @Error messages are defined in validationmessages.js file in app/webroot/js
     * @common function removeSpaces is declared and defined in common_functions.js file in app/webroot/js
     */
     
         
    $("#ConfigurationEditForm").validate({
        rules: {
            'data[Configuration][min_order]': {
                required: true,
                number: true                                
            }
        },
        messages: {
            'data[Configuration][min_order]': {
                required: 'Please enter min order.',
                number: 'Please enter valid minimum order cost.'
                
            }
        }
    });
    /* end of block */
    
    $("#AdminAddForm, #AdminChangeemailForm").validate({
        rules: {
            'data[Admin][username]': {
                required: true,
                email: true
            },
            'data[Admin][currentemail]': {
                required: true,
                email: true
            },
            'data[Admin][newemail]': {
                required: true,
                email: true
            },
            'data[Admin][password]': {
                required: true,
                minlength: 5,
                maxlength: 15
            },
            'data[Admin][domain]': {
                required: true
            },
            'data[Admin][confirm password]': {
                required: true,
                equalTo: "#AdminPassword"
            }
        },
        messages: {
            'data[Admin][username]': {
                required: EMPTYUSERMESSAGE,
                email: VALIDEMAILMESSAGE
            },
            'data[Admin][currentemail]': {
                required: EMPTYCURRENTEMAILMESSAGE,
                email: VALIDEMAILMESSAGE
            },
            'data[Admin][newemail]': {
                required: EMPTYNEWEMAILMESSAGE,
                email: VALIDEMAILMESSAGE
            },
            'data[Admin][password]': {
                required: EMPTYPASSWORDMESSAGE,
                minlength: PASSWORD5LENGTHMESSAGE,
                maxlength: PASSWORDMAX15MESSAGE
            },
            'data[Admin][domain]': {
                required: 'Enter domain',
            },
            'data[Admin][confirm password]': {
                required: EMPTYCONFIRMPASSWORD,
                equalTo: PASSWORDMISMATCHENTER
            }
        }
    });
    /* end of block */

   
	$("#ConfigurationAddForm, #config_edit").validate({
        rules: {
            'data[Configuration][heading]': {
                required: true               
            },
            'data[Configuration][value]': {
                required: true               
            }
        },
        messages: {
            'data[Configuration][heading]': {
                required: 'Please enter heading name.'                
            },
            'data[Configuration][value]': {
                required: 'Please enter value.'                
            }
        }
    });
    /* end of block */

    $('.email').change(function() {
        $(this).val($.trim($(this).val()));
    });
    /*
     * @below block of code is used to validate forgot password page in admin panel
     * @Error messages are defined in validationmessages.js file in app/webroot/js
     * @common function removeSpaces is declared and defined in common_functions.js file in app/webroot/js
     */
    $("#UserForgotpasswordForm").validate({
        rules: {
            'data[User][email]': {
                required: true,
                email: true
            }
        },
        messages: {
            'data[User][email]': {
                required: EMPTYEMAILMESSAGE,
                email: VALIDEMAILMESSAGE
            }
        }
    });

    /* end of block */

   /* for toggeling the left menus in admin panel */

    $(".loc").click(function(e) {
        $(".hide").slideUp("slow");
        var val = removeSpaces($(this).next(".sublist-menu1").attr("style"));
        if (val == 'display:block;') {
            $(this).next(".sublist-menu1").slideUp("slow");
        } else if (val == '') {
            $(this).next(".sublist-menu1").slideUp("slow");
        } else {
            $(".sublist-menu1").slideUp("slow");
            $(this).next(".sublist-menu1").slideDown("slow");
        }
    });
   
    $(".admintoggel").click(function() {
        $(".hide0").slideUp("slow");
        var clas = $(this).parent("ul").attr("class");
        if (clas != 'sublist-menu1') {
            $(".sublist-menu1").slideUp("slow");
        }
        if ((removeSpaces($(this).next().attr("style"))) == 'display:none;') {
            ($(this).next()).slideDown("slow");
        } else if ((removeSpaces($(this).next().attr("style"))) == 'display:block;') {
            ($(this).next()).slideDown("slow");
        }

    });

    $(".hide").hide();
    $(".hide0").hide();
    $(".hide1").addClass("hide0");


    /* end here */
	/* below code is to perform  functionality */
	/*
	$(document).on('click', '#checkall', function () {	
		$(".chk").prop("checked",this.checked);	
		$(".chk").attr("checked",this.checked);	
	});	
	
	$(".chk").click(function(){	
		if($(".chk").length == $(".chk:checked").length){			
			$("#checkall").attr("checked","checked");
		}else{
			$("#checkall").removeAttr("checked");
		}
	});
	/* end here 
	var searchButton 	= '';
	
	$(".submitsearch").click(function() {
		
		searchButton = $(this).attr('attr');
		
	});

	   $("#CategoryIndexForm,#StoreproductForm,#ProductIndexForm").submit(function(){ if(searchButton == ''){ return validatemultipleaction(); }else{ $(".chk").removeAttr("checked"); return true; } });
   
*/
		/* below code is to perform  functionality */


	});


	/*
	 * @function name	: validatemultipleaction
	 * @purpose			: validate if any checkbox checked before changing status or deleting with it also validate if there is any data to be prossesed or not
	 * @arguments		: none
	 * @return			: none 
	 * @created by		: shivam sharma
	 * @created on		: 10th oct 2012
	 * @description		: NA
	*/
	function validatemultipleaction(){
		
		var count		= $(".chk:checked").length;
		var counter		= $(".chk").length;
		var PageOptions	= $(".options").val();
		var appmessage  = " "+count+" record(s)";
		if(PageOptions == ''){
			$("#checkerr").html(CHECKBLANKERROR);
			$("#checkerr").show();
			$(".options").focus();
			return false;
		}
		
		if(counter < 1){
			$("#checkerr").html(CHECKMULTIPLENONEERROR);
			$("#checkerr").show();
			return false;
		}
		
		if(count < 1){
			$("#checkerr").html(CHECKMULTIPLEERROR);
			$("#checkerr").show();
			return false;
		}
		
		
		
		if(PageOptions == 'Delete'){
			if(confirm(DELETEALERTMESSAGE+appmessage+"?")){
				
			}else{
				return false;
			}
			
		}
		
		if(PageOptions == 'Active'){
			
			if(confirm(ACTIVEALERTMESSAGE+appmessage+" active?")){
				
			}else{
				return false;
			}
			
		}
		
		if(PageOptions == 'Inactive'){
			
			if(confirm(INACTIVEALERTMESSAGE+appmessage+" inactive?")){
				
			}else{
				return false;
			}
			
		}
	}
	/*end here*/

function __n(string, data) {
    $.each(data, function(k, v) {
        string = string.replace('%s', v);
    });
    return string;
}
/*
 * @function name	: hidepanel
 * @purpose			: show and hide right panel in admin module
 * @arguments		: none
 * @return			: none
 * @created by		: shivam sharma
 * @created on		: 15th oct 2012
 * @description		: NA
 */
function hidepanel() {
    if ($("body").attr('class') == 'folded') {
        $("#btn").attr("title", "Click here to hide panel");
        $("body").removeClass("folded");
    } else {
        $("#btn").attr("title", "Click here to show panel");
        $("body").addClass("folded");
    }
}
/*end here*/


function getContent(textarea) {
    CKEDITOR.instances[textarea.id].updateElement(); // update textarea
    var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
    return editorcontent;
}

function check_file_extension(id) {
    var res_field = document.getElementById(id).value;
    var extension = res_field.substr(res_field.lastIndexOf('.') + 1).toLowerCase();
    var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (res_field.length > 0)
    {
        if (allowedExtensions.indexOf(extension) === -1)
        {
            alert('Invalid File Type');
            return false;
        } else {
            return true;
        }
    }
}
