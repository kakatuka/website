var onLoading = function(load=null){
    if (load==null) {
        load = 'Đang xử lý...';
    }
    $('.icon-loading').addClass('display-none');    
    $('.loading').addClass('animate-loading-center');
    $('.loading').html('<div class="icon-loading"><i class="fa fa-spinner fa-pulse fa-4x"></i> <p style="font-size:20px;"> '+ load + '</p></div>');
    $('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
}
var offLoading = function(){
    $('.icon-loading').removeClass('display-none'); 
    $('.loading').removeClass('animate-loading-center');
    $('.loading').empty();
    $('.fade_loading').empty();
}
	$('body').on('click', '#del_list_user', function(event) {
		event.preventDefault();
		var allVals = [];
	    $(".checkboxes:checked").each(function(){
		   allVals.push($(this).val());
		});
		if (allVals.length >= 1) {
			$('#modelDeleteAll').modal('show'); 
		}else{
			toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
		}
	});
$('body').on('click', '.deleteDialog', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		$('#agree_del').attr('href', href);
	});


		$('body').on('click', '#modelDeleteAll #agree_del_all', function(event) {
		event.preventDefault();
		var allVals = [];
	    $(".checkboxes:checked").each(function(){
		   allVals.push($(this).val());
		});
		if (allVals.length >= 1) {
			$.ajax({
				url: baseUrl+'order/order/dellAll',
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
			toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
		}
		
		
	});


$('body').on('click', '#save_order', function(event) {
	event.preventDefault();	
	onLoading();
	var id = $(this).attr('data-id');
	var status = $('#status').val();
	var note = $('#note').val();
	var data = {
		id:id,
		status: status,
		note:note
	};

	$.ajax({
		url: baseUrl+'order/order/saveOrder',
		type: 'POST',
		dataType: 'json',
		data: {data: data},
	})
	.done(function(data) {
		offLoading();
		if (data.status==true) {
			toastr["success"](data.mess);
		}
	});
	

});

