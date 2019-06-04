$('.fancybox').fancybox();

$(document).ready(function() {
	$.ajax({
		url: baseUrlcloud+'media/media/openOneDirectory',
		type: 'POST',
		dataType: 'json',
		data: {
			open: security_key
		},
	})
	.done(function(data) {
		// console.log(data);
		$( "#loadMedia" ).append(data.html);
	});
});

$('body').on('click', '#loadMedia .rename', function(event) {
	event.preventDefault();
	var old_name = $(this).attr('data-title');
	$('#myModalRename #old_name').val(old_name);
	$('#myModalRename').modal("show");
});


// create folder
$('body').on('click', '#revenue-chart .create_folder', function(event) {
	event.preventDefault();
	$('#myModalCreateFolder').modal("show");
});
$('body').on('click', '#myModalCreateFolder #create_acept', function(event) {
	event.preventDefault();
	var new_name_folder = $('#myModalCreateFolder #new_name_folder').val().trim();
	var directory = $('#loadMedia #directory').val();
	if (new_name_folder=="") {
		$('#myModalCreateFolder #new_name_folder').focus();
		toastr["error"]("Bạn cần nhập tên mới cho thư mục!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrlcloud+'media/media/createNameFolder',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name_folder,directory:directory},
		})
		.done(function(data) {
			
			if (data.status==true) {
				$('#myModalCreateFolder #new_name_folder').val("");
				$('#myModalCreateFolder').modal("hide");
				var messager = data.mess;
				$.ajax({
					url: baseUrlcloud+'media/media/refesh',
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
					$('#myModalRename #new_name').val('');
					$('#myModalRename #old_name').val('');
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





$('body').on('click', '#myModalRename #rename', function(event) {
	event.preventDefault();
	var new_name = $('#myModalRename #new_name').val().trim();
	var old_name = $('#myModalRename #old_name').val();
	var directory = $('#loadMedia #directory').val();
	if (new_name=="") {
		$('#myModalRename #new_name').focus();
		toastr["error"]("Bạn cần nhập tên mới cho tệp tin!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrlcloud+'media/media/renameImage',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name,old_name:old_name,directory:directory},
		})
		.done(function(data) {
			
			if (data.status==true) {
				var messager = data.mess;
				var directory = $('#loadMedia #directory').val();
				$.ajax({
					url: baseUrlcloud+'media/media/refesh',
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
					$('#myModalRename #new_name').val('');
					$('#myModalRename #old_name').val('');
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


$('body').on('click', '#myModalRename #copy_rename', function(event) {
	event.preventDefault();
	var new_name = $('#myModalRename #new_name').val().trim();
	var old_name = $('#myModalRename #old_name').val();
	var directory = $('#loadMedia #directory').val();
	if (new_name=="") {
		$('#myModalRename #new_name').focus();
		toastr["error"]("Bạn cần nhập tên mới cho tệp tin!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrlcloud+'media/media/renameCopyImage',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name,old_name:old_name,directory:directory},
		})
		.done(function(data) {
			
			if (data.status==true) {
				var messager = data.mess;
				var directory = $('#loadMedia #directory').val();
				$.ajax({
					url: baseUrlcloud+'media/media/refesh',
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
					$('#myModalRename #new_name').val('');
					$('#myModalRename #old_name').val('');
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



$('body').on('click', '#revenue-chart .refesh', function(event) {
	event.preventDefault();
	$('.icon-loading').addClass('display-none');	
	$('.loading').addClass('animate-loading-center');
	$('.loading').html('<div class="icon-loading"><i class="fa fa-spinner fa-pulse fa-4x"></i> <p style="font-size:20px;">Đang tải dữ liệu...</p></div>');
	$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
	var data = 1;
	var directory = $('#loadMedia #directory').val();
	$.ajax({
		url: baseUrlcloud+'media/media/refesh',
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



$('body').on('click', '#loadMedia .delete', function(event) {
	event.preventDefault();
	var directory = $('#loadMedia #directory').val();
	var title = $(this).attr('data-title');
	$('.icon-loading').addClass('display-none');	
	$('.loading').addClass('animate-loading-center');
	$('.loading').html('<div class="icon-loading"><i class="fa fa-spinner fa-pulse fa-4x"></i> <p style="font-size:20px;">Đang tải dữ liệu...</p></div>');
	$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
	$.ajax({
		url: baseUrlcloud+'media/media/deleteImage',
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


$('body').on('dblclick', '#loadMedia .media-col img.img-folder-media', function(event) {
	event.preventDefault();
	var check_folder = $(this).parent('.media-col').attr('data-folder');
	var directory = $('#loadMedia #directory').val();
	$.ajax({
		url: baseUrlcloud+'media/media/openDirectory',
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

$('body').on('dblclick', '#loadMedia #back_folder', function(event) {
	event.preventDefault();
	var directory = $('#loadMedia #directory').val();
	$.ajax({
		url: baseUrlcloud+'media/media/backDirectory',
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






	$('body').on('change', '#revenue-chart .fileUpload', function(event) {
		event.preventDefault();
		var directory = $('#loadMedia #directory').val();
		$('.icon-loading').addClass('display-none');	
		$('.loading').addClass('animate-loading-center');
		$('.loading').html('<div class="icon-loading"><i class="fa fa-spinner fa-pulse fa-4x"></i> <p style="font-size:20px;">Đang tải dữ liệu...</p></div>');
		$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
		var data = new FormData($("#revenue-chart #form-uploads-ajax")[0]);
		console.log(data);
		$.ajax({
			url: baseUrlcloud+'media/media/uploadImages',
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