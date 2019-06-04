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
	// var type = parseInt($(this).parents('.box-links-for-widget').attr('data-type'));
	// console.log(type);
	var id_cate = $(this).parents('.box-links-for-widget').find('#cate').val();
	var number = $(this).parents('.box-links-for-widget').find('#number').val();
	var name_cate = $(this).parents('.box-links-for-widget').find('#cate_'+id_cate).text();
	console.log(name_cate);
	var data = {
	    title: name_cate,
	   	id_cate: id_cate,
	   	number: number
	};
	if (data!==null) {
		onLoading();
		$.ajax({
			url: baseUrl+'manager/manager/saveAjax',
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
		url: baseUrl+'manager/manager/deleteAjaxWidgets',
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
           	url: baseUrl+'manager/manager/updateWidgets',
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
	 		url: baseUrl+'manager/manager/sortable?'+sort,
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