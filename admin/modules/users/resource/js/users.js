$('body').on('dblclick', '#myModalAvatar .media-col img.img-folder-media', function(event) {
	event.preventDefault();
	var check_folder = $(this).parent('.media-col').attr('data-folder');
	var directory = $('#directory').val();
	$.ajax({
		url: baseUrl+'settings/settings/openDirectory',
		type: 'POST',
		dataType: 'json',
		data: {check_folder: check_folder,directory:directory},
	})
	.done(function(data) {
		//console.log(current_folder);
		if (data.status==true) {
			$('#myModalAvatar').find('.modal-body').fadeOut(100, function(){
                $('#myModalAvatar').find('.modal-body').html(data.html).fadeIn();
            });
		}
	});
	
	
});

// Điều hướng thư viện ảnh sang cloud
$(document).ready(function() {
	$.ajax({
		url: baseUrlcloud+'media/media/openOneFilesDirectory',
		type: 'POST',
		dataType: 'json',
		data: {
			open: security_key
		},
	})
	.done(function(data) {
		$( "#loadMediaModel" ).append(data.html);
	});
});
// END Điều hướng thư viện ảnh sang cloud

$('body').on('dblclick', '#back_folder', function(event) {
	event.preventDefault();
	var current_folder = $(this).parent('.modal-body');
	var directory = $('#directory').val();
	$.ajax({
		url: baseUrlcloud+'media/media/backDirectory',
		type: 'POST',
		dataType: 'json',
		data: {back: 'true',directory:directory},
	})
	.done(function(data) {
		if (data.status==true) {
			current_folder.fadeOut(100, function(){
                current_folder.html(data.html).fadeIn();
                //$('#loadMedia').html(data.html).fadeIn().delay(600);
            });
		}

	});
	
});

$('body').on('click', '.choose_avatar', function(event) {
	event.preventDefault();
	var body_img = $(this).parents('.profile-userpic').find('.modal-body');
	var list = new Array();
	body_img.find('.img-active').each(function(){
		list.push($(this).attr('data-src'));
	});
	//console.log(list);
	if (list.length == 0) {
		toastr["warning"](body_img.attr('data-mess-one'));
	}else if(list.length > 1){
		toastr["warning"](body_img.attr('data-mess-two'));
	}else{
		var src = list[0];
		var id = body_img.attr('data-id');
		$.ajax({
			url: baseUrl+'users/manager/updateAvatar',
			type: 'POST',
			dataType: 'json',
			data: {src: src,id:id},
		})
		.done(function(data) {
			if (data.status) {
				toastr["success"](data.mess);
			}
		});
		$(this).parents('.profile-userpic').find('.avatar_img').attr('src', baseUrl+'tmp/public/plugins/image_tools/timthumb.php?src='+baseUrl+'tmp/cdn/'+src+'&h=132&w=132&zc=2');
		body_img.find('.img-load-folder').each(function(){
			$(this).removeClass('img-active');
		});
		$(this).parents('.profile-userpic').find('.modal').modal('hide');
	}
});


$('#datetimepicker').datepicker({
	autoclose: true,
  	// pickTime: false,
  	format: 'dd/mm/yyyy',
  	language: 'vi'
});

$('body').on('click', '#submit_pass', function(event) {
	event.preventDefault();
	var pass = $('.change_pass #password').val();
	var re_pass = $('.change_pass #password_confirmation').val();

	if (pass!="" && re_pass!="") {
		if (pass.length >= 6 && re_pass.length >= 6) {
				if (pass==re_pass) {
		       		var id = $('.change_pass #id_user_pass').val();
		       		$.ajax({
		       			url: baseUrl+'users/manager/updatePassw',
		       			type: 'POST',
		       			dataType: 'json',
		       			data: {id: id,password:pass},
		       		})
		       		.done(function(data) {
		       			if (data.status==true) {
		       				window.location.assign(data.redirect);
		       			}else{
		       				toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
		       			}
		       		});
		       		
		       }else{
		       		toastr["error"]("Cảnh báo! Mật khẩu và nhập lại mật khẩu không trùng khớp.");
		       }
		}else{
			toastr["error"]("Cảnh báo! Mật khẩu phải lớn hơn hoặc bằng 6 ký tự.");
		}
	}else{
		toastr["error"]("Cảnh báo! Mật khẩu không được để trống.");
	}
});

$('body').on('click', '.deleteDialog', function(event) {
	event.preventDefault();
	var href = $(this).attr('data-href');
	$('#agree_del').attr('href', href);
});


$('body').on('click', '.search_button_users', function(event) {
	event.preventDefault();
	var search = $('.search_users').val();
	if (search=="") {
		window.location.assign(baseUrl+'users/manager/index');
	}else{
		window.location.assign(baseUrl+'users/manager/index&s='+search);
	}
});

$('body').on('click', '#del_list_user', function(event) {
	event.preventDefault();
	var allVals = [];
    $(".checkboxes:checked").each(function(){
	   allVals.push($(this).val());
	});
	if (allVals.length >= 1) {
		$('#modelDeleteAll').modal('show'); 
	}else{
		toastr["error"]("Cảnh báo! Bạn chưa chọn tài khoản nào.");
	}
});


$('body').on('click', '#modelDeleteAll #agree_del_all', function(event) {
	event.preventDefault();
	var allVals = [];
    $(".checkboxes:checked").each(function(){
	   allVals.push($(this).val());
	});
	if (allVals.length >= 1) {
		$.ajax({
			url: baseUrl+'users/manager/dellAll',
			type: 'POST',
			dataType: 'json',
			data: {all: allVals},
		})
		.done(function(data) {
			if (data.status==true) {
				$('#modelDeleteAll').modal('show'); 
				window.location.assign(data.redirect);
			}else{
				toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
			}
		});
	}else{
		toastr["error"]("Cảnh báo! Bạn chưa chọn tài khoản nào.");
	}
	
	
});




$('body').on('click', '#lock_user', function(event) {
	event.preventDefault();
	var allVals = [];
    $(".checkboxes:checked").each(function(){
	   allVals.push($(this).val());
	});
	if (allVals.length >= 1) {
		var status = 'public';
		$.ajax({
			url: baseUrl+'users/manager/status',
			type: 'POST',
			dataType: 'json',
			data: {status: status,all:allVals},
		})
		.done(function(data) {
			if (data.status==true) {
				window.location.assign(data.redirect);
			}else{
				toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
			}
		});
		
	}else{
		toastr["error"]("Cảnh báo! Bạn chưa chọn tài khoản nào.");
	}
});

$('body').on('click', '#unlock_user', function(event) {
	event.preventDefault();
	var allVals = [];
    $(".checkboxes:checked").each(function(){
	   allVals.push($(this).val());
	});
	if (allVals.length >= 1) {
		var status = 'private';
		$.ajax({
			url: baseUrl+'users/manager/status',
			type: 'POST',
			dataType: 'json',
			data: {status: status,all:allVals},
		})
		.done(function(data) {
			if (data.status==true) {
				window.location.assign(data.redirect);
			}else{
				toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
			}
		});
	}else{
		toastr["error"]("Cảnh báo! Bạn chưa chọn tài khoản nào.");
	}
});