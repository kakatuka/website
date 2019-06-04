$('.fancybox').fancybox();

$(document).ready(function() {
	$.ajax({
		url: baseUrlcloud+'media/uploadfile/openOneDirectory',
		type: 'POST',
		dataType: 'json',
		data: {
			open: security_key
		},
	})
	.done(function(data) {
		console.log(data);
		$( "#loadMediaFiles" ).append(data.html);
	});
});

$('body').on('click', '#loadMediaFiles .rename', function(event) {
	event.preventDefault();
	var old_name = $(this).attr('data-title');
	$('#myModalRenameFiles #old_name').val(old_name);
	$('#myModalRenameFiles').modal("show");
});


// create folder files
$('body').on('click', '#sales-chart .create_folder', function(event) {
	event.preventDefault();
	$('#myModalCreateFolderFiles').modal("show");
});

$('body').on('click', '#myModalCreateFolderFiles #create_acept', function(event) {
	event.preventDefault();
	var new_name_folder = $('#myModalCreateFolderFiles #new_name_folder').val().trim();
	var directory = $('#loadMediaFiles #directory').val();
	if (new_name_folder=="") {
		$('#myModalCreateFolderFiles #new_name_folder').focus();
		toastr["error"]("Bạn cần nhập tên mới cho thư mục!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrlcloud+'media/uploadfile/createNameFolder',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name_folder,directory:directory},
		})
		.done(function(data) {
			
			if (data.status==true) {
				$('#myModalCreateFolderFiles #new_name_folder').val("");
				$('#myModalCreateFolderFiles').modal("hide");
				var messager = data.mess;
				$.ajax({
					url: baseUrlcloud+'media/uploadfile/refesh',
					type: 'POST',  
			        dataType:'json',
			        data: {directory:directory},
				})
				.done(function(data) {
					toastr["success"](messager);
					if (data.status==true) {
						$('#loadMediaFiles').fadeOut(100, function(){
		                    $('#loadMediaFiles').html(data.html).fadeIn();
		                });
					}
					$('#myModalRenameFiles #new_name').val('');
					$('#myModalRenameFiles #old_name').val('');
					$('#myModalRenameFiles').modal("hide");
					offLoading();
				});

				
			}else{
				offLoading();
				toastr["error"](data.mess);
			}
		});
	}
	
	
});





$('body').on('click', '#myModalRenameFiles #rename', function(event) {
	event.preventDefault();
	var new_name = $('#myModalRenameFiles #new_name').val().trim();
	var old_name = $('#myModalRenameFiles #old_name').val();
	var directory = $('#loadMediaFiles #directory').val();
	if (new_name=="") {
		$('#myModalRenameFiles #new_name').focus();
		toastr["error"]("Bạn cần nhập tên mới cho tệp tin!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrlcloud+'media/uploadfile/renameFile',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name,old_name:old_name,directory:directory},
		})
		.done(function(data) {
			
			if (data.status==true) {
				var messager = data.mess;
				var directory = $('#loadMediaFiles #directory').val();
				$.ajax({
					url: baseUrlcloud+'media/uploadfile/refesh',
					type: 'POST',  
			        dataType:'json',
			        data:{directory:directory}
				})
				.done(function(data) {
					toastr["success"](messager);
					if (data.status==true) {
						$('#loadMediaFiles').fadeOut(100, function(){
		                    $('#loadMediaFiles').html(data.html).fadeIn();
		                });
					}
					$('#myModalRenameFiles #new_name').val('');
					$('#myModalRenameFiles #old_name').val('');
					$('#myModalRenameFiles').modal("hide");
					offLoading();
				});

				
			}else{
				offLoading();
				toastr["error"](data.mess);
			}
		});
	}
	
	
});


$('body').on('click', '#myModalRenameFiles #copy_rename', function(event) {
	event.preventDefault();
	var new_name = $('#myModalRenameFiles #new_name').val().trim();
	var old_name = $('#myModalRenameFiles #old_name').val();
	var directory = $('#loadMediaFiles #directory').val();
	if (new_name=="") {
		$('#myModalRenameFiles #new_name').focus();
		toastr["error"]("Bạn cần nhập tên mới cho tệp tin!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrlcloud+'media/uploadfile/renameCopyFile',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name,old_name:old_name,directory:directory},
		})
		.done(function(data) {
			
			if (data.status==true) {
				var messager = data.mess;
				var directory = $('#loadMediaFiles #directory').val();
				$.ajax({
					url: baseUrlcloud+'media/uploadfile/refesh',
					type: 'POST',  
			        dataType:'json',
			        data:{directory:directory}
				})
				.done(function(data) {
					toastr["success"](messager);
					if (data.status==true) {
						$('#loadMediaFiles').fadeOut(100, function(){
		                    $('#loadMediaFiles').html(data.html).fadeIn();
		                });
					}
					$('#myModalRenameFiles #new_name').val('');
					$('#myModalRenameFiles #old_name').val('');
					$('#myModalRenameFiles').modal("hide");
					offLoading();
				});

				
			}else{
				offLoading();
				toastr["error"](data.mess);
			}
		});
	}
});



$('body').on('click', '#sales-chart .refesh', function(event) {
	event.preventDefault();
	$('.icon-loading').addClass('display-none');	
	$('.loading').addClass('animate-loading-center');
	$('.loading').html('<div class="icon-loading"><i class="fa fa-spinner fa-pulse fa-4x"></i> <p style="font-size:20px;">Đang tải dữ liệu...</p></div>');
	$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
	var data = 1;
	var directory = $('#loadMediaFiles #directory').val();
	$.ajax({
		url: baseUrlcloud+'media/uploadfile/refesh',
		type: 'POST',  
		data: data,
        dataType:'json',
        data: {directory:directory},
	})
	.done(function(data) {
		$('.icon-loading').removeClass('display-none');	
		$('.loading').removeClass('animate-loading-center');
		$('.loading').empty();
		$('.fade_loading').empty();
		if (data.status==true) {
			$('#loadMediaFiles').fadeOut(100, function(){
                $('#loadMediaFiles').html(data.html).fadeIn();
            });
		}
	});

	/* Act on the event */
});



$('body').on('click', '#loadMediaFiles .delete', function(event) {
	event.preventDefault();
	var directory = $('#loadMediaFiles #directory').val();
	var title = $(this).attr('data-title');
	$('.icon-loading').addClass('display-none');	
	$('.loading').addClass('animate-loading-center');
	$('.loading').html('<div class="icon-loading"><i class="fa fa-spinner fa-pulse fa-4x"></i> <p style="font-size:20px;">Đang tải dữ liệu...</p></div>');
	$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
	$.ajax({
		url: baseUrlcloud+'media/uploadfile/deleteFile',
		type: 'POST',
		dataType: 'json',
		data: {title: title,directory:directory},
	})
	.done(function(data) {
		$('.icon-loading').removeClass('display-none');	
		$('.loading').removeClass('animate-loading-center');
		$('.loading').empty();
		$('.fade_loading').empty();
		if (data.status==true) {
			$('#loadMediaFiles').fadeOut(100, function(){
                $('#loadMediaFiles').html(data.html).fadeIn();
            });
		}
	});
	
});


$('body').on('dblclick', '#loadMediaFiles .media-col img.img-folder-media', function(event) {
	event.preventDefault();
	var check_folder = $(this).parent('.media-col').attr('data-folder');
	var directory = $('#loadMediaFiles #directory').val();
	$.ajax({
		url: baseUrlcloud+'media/uploadfile/openDirectory',
		type: 'POST',
		dataType: 'json',
		data: {check_folder: check_folder,directory:directory},
	})
	.done(function(data) {
		if (data.status==true) {
			$('#loadMediaFiles').fadeOut(100, function(){
                $('#loadMediaFiles').html(data.html).fadeIn();
            });
		}
	});
	
	
});

$('body').on('dblclick', '#loadMediaFiles #back_folder_file', function(event) {
	event.preventDefault();
	var directory = $('#loadMediaFiles #directory').val();
	$.ajax({
		url: baseUrlcloud+'media/uploadfile/backDirectory',
		type: 'POST',
		dataType: 'json',
		data: {back: 'true',directory:directory},
	})
	.done(function(data) {
		if (data.status==true) {
			$('#loadMediaFiles').fadeOut(100, function(){
                $('#loadMediaFiles').html(data.html).fadeIn();
                //$('#loadMedia').html(data.html).fadeIn().delay(600);
            });
		}

	});
	
});






	$('body').on('change', '#sales-chart .fileUpload', function(event) {
		event.preventDefault();
		var directory = $('#loadMediaFiles #directory').val();
		$('.icon-loading').addClass('display-none');	
		$('.loading').addClass('animate-loading-center');
		$('.loading').html('<div class="icon-loading"><i class="fa fa-spinner fa-pulse fa-4x"></i> <p style="font-size:20px;">Đang tải dữ liệu...</p></div>');
		$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
		var data = new FormData($("#sales-chart #form-uploads-ajax")[0]);
		$.ajax({
			url: baseUrlcloud+'media/uploadfile/uploadFile',
			type: 'POST',  
			data: data,
	        cache: false,
	        contentType: false,
	        processData: false,
	        dataType:'json',
		})
		.done(function(data) {
			$('.icon-loading').removeClass('display-none');	
			$('.loading').removeClass('animate-loading-center');
			$('.loading').empty();
			$('.fade_loading').empty();
			if (data.status==true) {
				$('#loadMediaFiles').fadeOut(100, function(){
                    $('#loadMediaFiles').html(data.html).fadeIn();
                });
				toastr["success"](data.mess);
			}else{
				toastr["warning"](data.mess);
			}
		});
	
		/* Act on the event */
	});