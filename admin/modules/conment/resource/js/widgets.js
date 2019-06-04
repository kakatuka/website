//menu
function reloadMenuStruct(pos){
	$("#nestable").empty();
	$.ajax({
		url: baseUrl+'menu/menu/loadMenu&pos='+pos,
		type: 'GET',
		dataType: 'html',
	})
	.done(function(data) {
		$("#nestable").append(data);
	});
}

function onLoading(load=null){
	if (load==null) {
		load = 'Đang xử lý...';
	}
	$('.icon-loading').addClass('display-none');	
	$('.loading').addClass('animate-loading-center');
	$('.loading').html('<div class="icon-loading"><i class="fa fa-spinner fa-pulse fa-4x"></i> <p style="font-size:20px;"> '+ load + '</p></div>');
	$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
}
function offLoading(){
	$('.icon-loading').removeClass('display-none');	
	$('.loading').removeClass('animate-loading-center');
	$('.loading').empty();
	$('.fade_loading').empty();
}




$('body').on('click', '.widget .widget-title', function(event) {
	event.preventDefault();
	if ($(this).hasClass('closed')) {
		$(this).addClass('opened').removeClass('closed');
		$(this).parents('.widget').find('.widget-body').slideDown(200);
	}else{
		$(this).addClass('closed').removeClass('opened');
		$(this).parents('.widget').find('.widget-body').slideUp(200);
	}
});


$('body').on('click', '.btn-add-widget', function(event) {
	event.preventDefault();
	var type = parseInt($(this).parents('.box-links-for-widget').attr('data-type'));
	var recent = $(this).parents('.box-links-for-widget').find('#parent_id').val();
	if (recent==0) {
		toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
	}else{
	var data = null;
	switch(type) {
	    case 1:
	    	data = {
	    		type: type,
	    		options: null,
	    		number: 0
	    	}
	        break;
	    case 2:
	    	var recent = $(this).parents('.box-links-for-widget').find('#recent').val();
	    	var number = $(this).parents('.box-links-for-widget').find('#number').val();
	        data = {
	    		type: type,
	    		options: recent,
	    		number: number
	    	}
	        break;
	    case 3:
	        data = {
	    		type: type,
	    		options: null,
	    		number: 0
	    	}
	        break;
	    case 4:
	        data = {
	    		type: type,
	    		options: null,
	    		number: 0,
	    		id_post:recent
	    	}
	        break;
	}
	if (data!==null) {
		onLoading();
		$.ajax({
			url: baseUrl+'posts/widgets/saveAjax',
			type: 'POST',
			dataType: 'json',
			data: {data: data},
		})
		.done(function(data) {
			if (data.status==true) {
				toastr["success"](data.mess);
				$('.dd-list-widgets').append(data.html);
			}
			offLoading();
		});
		
	}
		
			
	}		
				//toastr["success"](data.mess);

});




// menu struct 
$('body').on('click', '.nestable-menu ol.dd-list li a.show-item-details', function(event) {
	event.preventDefault();

	if ($(this).parents('li.dd-item').hasClass('closed')) {
		$(this).parents('li.dd-item').addClass('opened').removeClass('closed');
		$(this).parents('.li.dd-item').find('.item-details').slideDown(200);
	}else{
		$(this).parents('li.dd-item').addClass('closed').removeClass('opened');
		$(this).parents('.li.dd-item').find('.item-details').slideUp(200);
	}
	
});



// delete menu

$('body').on('click', '.btn-remove-widget', function(event) {
	event.preventDefault();
	var li_item = $(this).parents('li.dd-item');
	var id = li_item.attr('data-id');
	$('#myModalConfirmWidgets .accept_del_widgets').attr('data-id', id);
	$('#myModalConfirmWidgets').modal('show');
	
});

$('body').on('click', '#myModalConfirmWidgets .accept_del_widgets', function(event) {
	event.preventDefault();
	var id = $(this).attr('data-id');
	$.ajax({
		url: baseUrl+'posts/widgets/deleteAjaxWidgets',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
	})
	.done(function(data) {
		if (data.status==true) {
			$('#myModalConfirmWidgets').modal('hide');
			toastr["success"](data.mess);
			$('#listId_'+id).fadeOut("slow",function(){
		        $(this).remove();
		    });
		}
	});
});

$('body').on('click', '.btn-cancel-widget', function(event) {
	event.preventDefault();
	$(this).parents('li.dd-item').addClass('closed').removeClass('opened');
	$(this).parents('.li.dd-item').find('.item-details').slideUp(200);
});










/// update title menu 

$('body').on('click', '.btn-update-widget', function(event) {
	event.preventDefault();
	onLoading();
	var li_item = $(this).parents('li.dd-item');
	var id = li_item.attr('data-id');
	var title = li_item.find('#title').val();
	if (title!="") {
           $.ajax({
           	url: baseUrl+'posts/widgets/updateWidgets',
           	type: 'POST',
           	dataType: 'json',
           	data: {title: title,id:id},
           })
           .done(function(data) {
           	offLoading();
           	   if (data.status==true) {
           	   	   li_item.find('.pull-left').html('&nbsp;'+data.title);
           	   	   toastr["success"](data.mess);
           	   }
           });
           
	}else{
         toastr["error"]("Không được để trống tiêu đề.");
         offLoading();
	}
	
});
$(".dd-list-widgets").sortable({
  handle : '.dd-handle',
  update : function () {
      var sort = $('.dd-list-widgets').sortable('serialize');
      //console.log(sort);
     //$("#info").load("process-sortable.php?"+order);
     	$.ajax({
	 		url: baseUrl+'posts/widgets/sortable?'+sort,
	 		type: 'GET',
	 		dataType: 'json'
	 	})
	 	.done(function(data) {
	 		if (data.status==true) {
	 			toastr["success"](data.mess);
	 		}
	 	});
  }
});