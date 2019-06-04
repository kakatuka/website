
$('.fancybox').fancybox();

$('body').on('click', '.rename', function(event) {
	event.preventDefault();
	var old_name = $(this).attr('data-title');
	$('#old_name').val(old_name);
	$('#myModalRename').modal("show");
});


// create folder
$('body').on('click', '.create_folder', function(event) {
	event.preventDefault();
	$('#myModalCreateFolder').modal("show");
});
$('body').on('click', '#create_acept', function(event) {
	event.preventDefault();
	var new_name_folder = $('#new_name_folder').val().trim();
	var directory = $('#directory').val();
	if (new_name_folder=="") {
		$('#new_name_folder').focus();
		toastr["error"]("Bạn cần nhập tên mới cho thư mục!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrl+'media/media/createNameFolder',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name_folder,directory:directory},
		})
		.done(function(data) {
			
			if (data.status==true) {
				$('#new_name_folder').val("");
				$('#myModalCreateFolder').modal("hide");
				var messager = data.mess;
				$.ajax({
					url: baseUrl+'media/media/refesh',
					type: 'POST',  
			        dataType:'json',
			        data: {directory:directory},
				})
				.done(function(data) {
					toastr["success"](messager);
					if (data.status==true) {
						$('#loadMedia').fadeOut(100, function(){
		                    $('#loadMedia').html(data.html).fadeIn();
		                });
					}
					$('#new_name').val('');
					$('#old_name').val('');
					$('#myModalRename').modal("hide");
					offLoading();
				});

				
			}else{
				offLoading();
				toastr["error"](data.mess);
			}
		});
	}
	
	
});





$('body').on('click', '#rename', function(event) {
	event.preventDefault();
	var new_name = $('#new_name').val().trim();
	var old_name = $('#old_name').val();
	var directory = $('#directory').val();
	if (new_name=="") {
		$('#new_name').focus();
		toastr["error"]("Bạn cần nhập tên mới cho tệp tin!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrl+'media/media/renameImage',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name,old_name:old_name,directory:directory},
		})
		.done(function(data) {
			
			if (data.status==true) {
				var messager = data.mess;
				var directory = $('#directory').val();
				$.ajax({
					url: baseUrl+'media/media/refesh',
					type: 'POST',  
			        dataType:'json',
			        data:{directory:directory}
				})
				.done(function(data) {
					toastr["success"](messager);
					if (data.status==true) {
						$('#loadMedia').fadeOut(100, function(){
		                    $('#loadMedia').html(data.html).fadeIn();
		                });
					}
					$('#new_name').val('');
					$('#old_name').val('');
					$('#myModalRename').modal("hide");
					offLoading();
				});

				
			}else{
				offLoading();
				toastr["error"](data.mess);
			}
		});
	}
	
	
});


$('body').on('click', '#copy_rename', function(event) {
	event.preventDefault();
	var new_name = $('#new_name').val().trim();
	var old_name = $('#old_name').val();
	var directory = $('#directory').val();
	if (new_name=="") {
		$('#new_name').focus();
		toastr["error"]("Bạn cần nhập tên mới cho tệp tin!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrl+'media/media/renameCopyImage',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name,old_name:old_name,directory:directory},
		})
		.done(function(data) {
			
			if (data.status==true) {
				var messager = data.mess;
				var directory = $('#directory').val();
				$.ajax({
					url: baseUrl+'media/media/refesh',
					type: 'POST',  
			        dataType:'json',
			        data:{directory:directory}
				})
				.done(function(data) {
					toastr["success"](messager);
					if (data.status==true) {
						$('#loadMedia').fadeOut(100, function(){
		                    $('#loadMedia').html(data.html).fadeIn();
		                });
					}
					$('#new_name').val('');
					$('#old_name').val('');
					$('#myModalRename').modal("hide");
					offLoading();
				});

				
			}else{
				offLoading();
				toastr["error"](data.mess);
			}
		});
	}
});



$('body').on('click', '.refesh', function(event) {
	event.preventDefault();
	$('.icon-loading').addClass('display-none');	
	$('.loading').addClass('animate-loading-center');
	$('.loading').html('<div class="icon-loading"><i class="demo-icon icon-spin4 animate-spin">&#xe834;</i> Đang tải dữ liệu...</div>');
	$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
	var data = 1;
	var directory = $('#directory').val();
	$.ajax({
		url: baseUrl+'media/media/refesh',
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
			$('#loadMedia').fadeOut(100, function(){
                $('#loadMedia').html(data.html).fadeIn();
            });
		}
	});

	/* Act on the event */
});



$('body').on('click', '.delete', function(event) {
	event.preventDefault();
	var directory = $('#directory').val();
	var title = $(this).attr('data-title');
	$('.icon-loading').addClass('display-none');	
	$('.loading').addClass('animate-loading-center');
	$('.loading').html('<div class="icon-loading"><i class="demo-icon icon-spin4 animate-spin">&#xe834;</i> Đang tải dữ liệu...</div>');
	$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
	$.ajax({
		url: baseUrl+'media/media/deleteImage',
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
			$('#loadMedia').fadeOut(100, function(){
                $('#loadMedia').html(data.html).fadeIn();
            });
		}
	});
	
});


$('body').on('dblclick', '.media-col img.img-folder-media', function(event) {
	event.preventDefault();
	var check_folder = $(this).parent('.media-col').attr('data-folder');
	var directory = $('#directory').val();
	$.ajax({
		url: baseUrl+'media/media/openDirectory',
		type: 'POST',
		dataType: 'json',
		data: {check_folder: check_folder,directory:directory},
	})
	.done(function(data) {
		if (data.status==true) {
			$('#loadMedia').fadeOut(100, function(){
                $('#loadMedia').html(data.html).fadeIn();
            });
		}
	});
	
	
});

$('body').on('dblclick', '#back_folder', function(event) {
	event.preventDefault();
	var directory = $('#directory').val();
	$.ajax({
		url: baseUrl+'media/media/backDirectory',
		type: 'POST',
		dataType: 'json',
		data: {back: 'true',directory:directory},
	})
	.done(function(data) {
		if (data.status==true) {
			$('#loadMedia').fadeOut(100, function(){
                $('#loadMedia').html(data.html).fadeIn();
                //$('#loadMedia').html(data.html).fadeIn().delay(600);
            });
		}

	});
	
});






	$('body').on('change', '.fileUpload', function(event) {
		event.preventDefault();
		var directory = $('#directory').val();
		$('.icon-loading').addClass('display-none');	
		$('.loading').addClass('animate-loading-center');
		$('.loading').html('<div class="icon-loading"><i class="demo-icon icon-spin4 animate-spin">&#xe834;</i> Đang tải dữ liệu...</div>');
		$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
		var data = new FormData($("#form-uploads-ajax")[0]);
		$.ajax({
			url: baseUrl+'media/media/uploadImages',
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
				$('#loadMedia').fadeOut(100, function(){
                    $('#loadMedia').html(data.html).fadeIn();
                });
				toastr["success"](data.mess);
			}else{
				toastr["warning"](data.mess);
			}
		});
	
		/* Act on the event */
	});