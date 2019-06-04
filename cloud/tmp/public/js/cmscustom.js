$( document ).ready(function() {
	$('body').on('click','.lang_hd',function(){
		var lang = $(this).attr('data-lang'); 
		$.ajax({
			url: baseUrl + 'home/home/setLang',
			type: 'POST',
			dataType: 'json',
			data: {lang: lang},
		})
		.done(function(data) {
			if (data.status==true) {
				location.reload();
			}else{
				console.log("error");
			}
		});
		
		
	})
	
	$('body').on('click', '.img-load-folder', function(event) {
		event.preventDefault();
		
		if ($(this).hasClass('img-active')) {
			$(this).removeClass('img-active');
    	}else{
    		$(this).addClass('img-active');
    	}
		/* Act on the event */
	});



	$('[data-toggle="tooltip"]').tooltip();









	



	$('body').on('click', '.del-image-choose-logo', function(event) {
		event.preventDefault();
		var status = 1;
		$.ajax({
			url: baseUrl+'settings/settings/loadImageDefault',
			type: 'POST',
			dataType: 'json',
			data: {status: status},
		})
		.done(function(data) {
			if (data.status==true) {
				$('.del-image-choose-logo').parents('.modal-image-choose').find('.logo-website').attr('src',baseUrl+'tmp/public/images/img.png')
			}
		});
		
	});
	$('body').on('click', '.del-image-choose-favicon', function(event) {
		event.preventDefault();
		var status = 0;
		$.ajax({
			url: baseUrl+'settings/settings/loadImageDefault',
			type: 'POST',
			dataType: 'json',
			data: {status: status},
		})
		.done(function(data) {
			if (data.status==true) {
				$('.del-image-choose-favicon').parents('.modal-image-choose').find('.logo-favicon').attr('src',baseUrl+'tmp/public/images/img.png')
			}
		});
		
	});



	// Manager User : mod=users&controller=manager&action=index 
	$('#checkboxAll').click(function() {
            if ($(this).prop("checked") == true) {
                $('.checkboxes').each(function(index) {
                    $(this).prop("checked", true);
                    $(this).parent().addClass('checked after_opacity');
                });

                $(".btn-del a").removeClass('disabled');                
            } else if ($(this).prop("checked") == false) {
                $('.checkboxes').each(function(index) {
                    $(this).prop("checked", false);
                    $(this).parent().removeClass('checked after_opacity');
                });               
            }
    });
    $('.checkboxes').click(function() {
        if ($(this).prop("checked") == false) {
            $('#checkboxAll').prop("checked", false);
            $('#checkboxAll').parent().removeClass('checked');
        }
    });

    // Manager User - Add : mod=users&controller=manager&action=index 
    $('body').on('change', '#form_add_user .username', function(event) {
    	var username = $(this).val();
	  	$.ajax({
    		url: baseUrl+'users/manager/checkUsername',
    		type: 'POST',
    		dataType: 'json',
    		data: {username: username},
    	})
    	.done(function(data) {
    		if (data.status==true) {
    			$('#form_add_user').attr('username-error','');
    			toastr["success"](data.mess);
    		}else{
    			$('#form_add_user').attr('username-error','Your Username has users.');
    			toastr["error"](data.mess);
    		}
    	});
    });
    $('body').on('change', '#form_add_user .email', function(event) {
    	var email = $(this).val();
	  	$.ajax({
    		url: baseUrl+'users/manager/checkEmail',
    		type: 'POST',
    		dataType: 'json',
    		data: {email: email},
    	})
    	.done(function(data) {
    		if (data.status==true) {
    			$('#form_add_user').attr('email-error','');
    			toastr["success"](data.mess);
    		}else{
    			$('#form_add_user').attr('email-error','Your Email has users.');
    			toastr["error"](data.mess);
    		}
    	});
    });
    $('body').on('click', '#user_add', function(event) {
    	event.preventDefault();
    	var status=true;
    	var url = baseUrl+'users/manager/ajaxAdd';
    	var username = $('#form_add_user .username').val();
    	var role = $('#form_add_user .roles-list').val();
    	var first_name = $('#form_add_user .first_name').val();
    	var last_name = $('#form_add_user .last_name').val();
    	var email = $('#form_add_user .email').val();
    	var address = $('#form_add_user .address').val();
    	var password = $('#form_add_user .password').val();
    	var re_password = $('#form_add_user .re-password').val();
    	if (username=='') {
            status = false;
            toastr["error"]("This field Username should not be empty!");
    	}
    	if (role=='') {
            status = false;
            toastr["error"]("This field Role should not be empty!");
    	}
    	if (first_name=='') {
            status = false;
            toastr["error"]("This field Firsr name should not be empty!");
    	}
    	if (last_name=='') {
            status = false;
            toastr["error"]("This field Last name should not be empty!");
    	}
    	if (email=='') {
            status = false;
            toastr["error"]("This field Email should not be empty!");
    	}else if (!validateEmail(email)) {
    		status = false;
            toastr["error"]("This field Email is not valid!");
    	}
    	if (address=='') {
            status = false;
            toastr["error"]("This field Address should not be empty!");
    	}
    	if (password=='') {
            status = false;
            toastr["error"]("This field Password should not be empty!");
    	}
    	if (re_password=='') {
            status = false;
            toastr["error"]("This field Re-Password should not be empty!");
    	}
    	if ($('#form_add_user').attr('username-error')!='') {
    		status = false;
            toastr["error"]($('#form_add_user').attr('username-error'));
    	}
    	if ($('#form_add_user').attr('email-error')!='') {
    		status = false;
            toastr["error"]($('#form_add_user').attr('email-error'));
    	}
    	if (status==true) {
    		$('#user_add').prop('disabled', true);
    		$.ajax({
	    		url: url,
	    		type: 'POST',
	    		dataType: 'json',
	    		data: {username:username,role:role,first_name:first_name,last_name:last_name,email:email,address:address,password:password,re_password:re_password},
	    	})
	    	.done(function(data) {
	    		if (data.status==true) {
	    			$('#form_add_user').attr('email-error','');
	    			$('#form_add_user').attr('username-error','');
	    			$('#form_add_user .username').val('');
			    	$('#form_add_user .first_name').val('');
			    	$('#form_add_user .last_name').val('');
			    	$('#form_add_user .email').val('');
			    	$('#form_add_user .address').val('');
			    	$('#form_add_user .password').val('');
			    	$('#form_add_user .re-password').val('');
			    	$('#user_add').prop('disabled', false);
	    			toastr["success"](data.mess);
	    			$('#invite_modal').modal('hide');
	    			setTimeout(function(){ window.location.assign(baseUrl+'users/manager/index'); }, 800);
	    			
	    		}else{
	    			$('#user_add').prop('disabled', false);
	    			toastr["error"](data.mess);
	    		}
	    	});
    	}
    	
    });


});

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

















$('body').on('change', '.checker input[type=checkbox]', function(event) {
	event.preventDefault();
	/* Act on the event */
	if($(this).is(':checked')){
        $(this).parents('.checker').find('span').addClass('after_opacity');
	}else{
		$(this).parents('.checker').find('span').removeClass('after_opacity');
	}
});




function onLoading(load=null){
    if (load==null) {
        load = 'Đang xử lý...';
    }
    $('.icon-loading').addClass('display-none');    
    $('.loading').addClass('animate-loading-center');
    $('.loading').html('<div class="icon-loading"><i class="demo-icon icon-spin4 animate-spin">&#xe834;</i> '+ load + '</div>');
    $('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
}
function offLoading(){
    $('.icon-loading').removeClass('display-none'); 
    $('.loading').removeClass('animate-loading-center');
    $('.loading').empty();
    $('.fade_loading').empty();
}
