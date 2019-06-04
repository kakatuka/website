$('[data-toggle="tooltip"]').tooltip()

$(document).ready(function() {
	$("#list-feature-home").sortable({
	  	handle : '.handle',
	  	update : function (e,ui) {
	    	var order = $('#list-feature-home').sortable('serialize');
	     	//$("#info").load("process-sortable.php?"+order);
	     	$.ajax({
	     		url: baseUrl+'posts/manager/sortable?'+order,
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
});


$('body').on('dblclick', '#list-feature-home strong', function(event) {
	event.preventDefault();
	$(this).fadeOut('slow');
	$(this).parents('.item').find('.title').attr('type', 'text');
});

$('body').on('change', '.title', function(event) {
	event.preventDefault();
	onLoading();
	var str = $(this).val();
	var item = $(this).parents('.item');
	var id = item.attr('data-id');
	if (str!="") {
		$.ajax({
			url: baseUrl+'posts/manager/edit',
			type: 'POST',
			dataType: 'json',
			data: {title: str,id:id},
		})
		.done(function(data) {
			if (data.status==true) {
				toastr["success"](data.mess);
				$('#modelAdd').modal('hide');
				$('#title_manager').val('');
				item.find('.title').val(data.title);
				item.find('strong').val(data.title);
				$.ajax({
					url: baseUrl+'posts/manager/getOption',
					type: 'POST',
					dataType: 'html',
					data: {param: 1},
				})
				.done(function(data) {
					$('#choose_cate_home').html(data);
				});
				
				
			}
			offLoading();
		});
		$(this).parents('.item').find('strong').css('display','initial').text(str);
	}
	$(this).attr('type', 'hidden');
});


// add 
$('body').on('click', '#submit_manager', function(event) {
	event.preventDefault();
	$(this).attr("disabled", true);
	var count = $('#list-feature-home li').length;
	onLoading();
	var title = $('#title_manager').val();
	if (title=="") {
		toastr["error"]("Bạn không được để trống tiêu đề !");
	}else{
		$.ajax({
			url: baseUrl+'posts/manager/add',
			type: 'POST',
			dataType: 'json',
			data: {title: title,count:count},
		})
		.done(function(data) {
			$('#submit_manager').removeAttr("disabled");
			if (data.status==true) {
				toastr["success"](data.mess);
				$('#modelAdd').modal('hide');
				$('#title_manager').val('');
				var data_title_warning = $('.ui-sortable-home').attr('data-title-warning');
				var htm = '<li id="listItem_'+data.id+'" class="item" data-id="'+data.id+'">'+
							'<img src="'+baseUrl+'modules/posts/resource/images/arrow.png" alt="move" width="16" class="handle">'+
							'<input type="hidden" class="form-control title title_'+data.id+'" value="'+data.title+'"/><strong data-toggle="tooltip" data-placement="top" title="'+data_title_warning+'">'+data.title+'</strong>'+
							'<div class="checker del_manager_home"><span>'+
                            '<input type="checkbox" name="name_id[]" class="checkboxes" value="'+data.id+'">'+
                            '</span></div>'+
							'</li>';
				$('#list-feature-home').append(htm);
			}
			offLoading();
		});
		
	}
});




$('body').on('click', '#del_list_manager', function(event) {
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


	$('body').on('click', '#modelDeleteAll #agree_del_all_manager', function(event) {
		event.preventDefault();
		var allVals = [];
	    $(".checkboxes:checked").each(function(){
		   allVals.push($(this).val());
		});
		if (allVals.length >= 1) {
			$.ajax({
				url: baseUrl+'posts/manager/dellAll',
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







	$('body').on('click', '#lock_manager', function(event) {
		event.preventDefault();
		var allVals = [];
	    $(".checkboxes:checked").each(function(){
		   allVals.push($(this).val());
		});
		if (allVals.length >= 1) {
			var status = 'public';
			$.ajax({
				url: baseUrl+'posts/manager/status',
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
			toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
		}
	});

	$('body').on('click', '#unlock_manager', function(event) {
		event.preventDefault();
		var allVals = [];
	    $(".checkboxes:checked").each(function(){
		   allVals.push($(this).val());
		});
		if (allVals.length >= 1) {
			var status = 'private';
			$.ajax({
				url: baseUrl+'posts/manager/status',
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
			toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
		}
	});


	$('body').on('click', '.list-all-product-manager .imgs', function(event) {
		event.preventDefault();
		if ($(this).hasClass('active')==true) {
            $(this).removeClass('active');
		}else{
			$(this).addClass('active');
		}
	});

	$('body').on('change', '#cate_product_left', function(event) {
		event.preventDefault();
		var id_cate = $(this).val();
		$.ajax({
			url: baseUrl+'posts/manager/getPostByCate',
			type: 'POST',
			dataType: 'json',
			data: {id: id_cate},
		})
		.done(function(data) {
			if (data.status==true) {
				$('#load-more-all-data-product').attr('data-start',data.start);
				$('#list-all-product-manager .row').html(data.html);
				var fruits = [];
				$('#list-all-product-manager .row .col-md-12').each(function(index, el) {
					fruits.push($(this).attr('data-id'));
			    });
			    $('#hidden_not_id').val(fruits.toString());
			}
		});
		
	});
	$(document).ready(function() {
		$('#cate_product_left option').each(function() {
		    if ($(this).prop("selected") == true) {
		       // do something
		       
		       var id_cate = $(this).val();
		       	$.ajax({
					url: baseUrl+'posts/manager/getPostByCate',
					type: 'POST',
					dataType: 'json',
					data: {id: id_cate},
				})
				.done(function(data) {
					if (data.status==true) {
						$('#load-more-all-data-product').attr('data-start',data.start);
						$('#list-all-product-manager .row').html(data.html);
						var fruits = [];
						$('#list-all-product-manager .row .col-md-12').each(function(index, el) {
							fruits.push($(this).attr('data-id'));
					    });
					    $('#hidden_not_id').val(fruits.toString());
					}
				});
		       
		    }
		})
	});

	$('body').on('click', '#load-more-all-data-product', function(event) {
		event.preventDefault();
		var start 	= $(this).attr('data-start');
		var id_not 	= $('#hidden_not_id').val();
		var cate_id = $('#cate_product_left').val();
		var data = {
			'start': start,
			'not_id': id_not,
			'cate_id': cate_id
		};
		$.ajax({
			url: baseUrl+'posts/manager/ajaxLoadMore',
			type: 'POST',
			dataType: 'json',
			data: {data},
		})
		.done(function(data) {
			$('#load-more-all-data-product').attr('data-start',data.start);
			if($('.notProduct').length==0){
				$('#list-all-product-manager .row').append(data.html);
			}
			var fruits = [];
			$('#list-all-product-manager .row .col-md-12').each(function(index, el) {
				fruits.push($(this).attr('data-id'));
		    });
		    $('#hidden_not_id').val(fruits.toString());
		});
		
	});


	$('body').on('click', '#add_product_home', function(event) {
		event.preventDefault();
		var fruits = [];
		$('#list-all-product-manager .row .col-md-12').each(function(index, el) {
			var id_d = $(this).find('.active').parents('.col-md-12').attr('data-id');
			if (id_d!=undefined) {
				fruits.push(id_d);
			}
		});
		var status = true;
		var cate_id = $('#choose_cate_home').val();
		if (fruits.length==0) {
			status = false;
			toastr["error"]("Bạn chưa chọn sản phẩm nào!");
		}
		if (cate_id==0) {
			status = false;
			toastr["error"]("Bạn chưa chọn danh mục để hiển thị!");
		}
		if (status==true) {
			$.ajax({
				url: baseUrl+'posts/manager/ajaxAddProductHome',
				type: 'POST',
				dataType: 'json',
				data: {id_cate: cate_id,data: fruits},
			})
			.done(function(data) {
				if(data.status==true){
					$('#list_item_product_'+data.id_cate).removeClass('margin_top_none');
					$('#list_item_product_'+data.id_cate+' .row').removeClass('height_none');
					$('#list_item_product_'+data.id_cate+' .row').html(data.html);
					toastr["success"](data.mess);

					$('.list-all-product-manager .col-md-12 .imgs').removeClass('active');
				}
			});
			
		}
		
	});

	$('body').on('dblclick', '.list_item_product .row .col-md-12', function(event) {
		event.preventDefault();
		var this_click = $(this);
		var key = $(this).attr('data-key');
		var id_product = $(this).attr('data-id');
		var id_home = $(this).parents('.list_item_product').attr('data-id');
		var data = {
			key: key,
			id_home: id_home,
			id_product: id_product
		}
		$.ajax({
			url: baseUrl+'posts/manager/ajaxRemoveProduct',
			type: 'POST',
			dataType: 'json',
			data: {data},
		})
		.done(function(data) {
			if(data.status==true){
				toastr["success"](data.mess);
				this_click.fadeOut('slow', function() {
					this_click.remove();
				});
			}
		});
		
		
		
	});
