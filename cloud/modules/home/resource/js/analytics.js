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
$('body').on('click', '.view_chart_table', function(event) {
	event.preventDefault();
	if ($('#revenue-chart-table').hasClass("view_all_more")) {
		$(this).html('<i class="fa fa-angle-double-down" aria-hidden="true"></i>&nbsp; Xem tất cả');
		
		$('#revenue-chart-table').removeClass("view_all_more");
	}else{
		$(this).html('<i class="fa fa-angle-double-up" aria-hidden="true"></i>&nbsp; Thu gọn');
		$('#revenue-chart-table').addClass("view_all_more");
	}
	
});


$('body').on('click', '#theme-panel .panel-btn', function(event) {
	event.preventDefault();
	var panel = $(this).parents('#theme-panel').attr('class');
	$(this).parents('#theme-panel').removeClass(panel);
	if (panel=='panel-open') {
		$(this).parents('#theme-panel').addClass('panel-close');
	}else{
        $(this).parents('#theme-panel').addClass('panel-open');
	}
});


$('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd',
  language: 'vi'
});

$('body').on('click', '.btn_getData', function(event) {
	event.preventDefault();
	/* Act on the event */
	onLoading();
	var start_time = $('#datepicker_start').val();
	var end_time = $('#datepicker_end').val();
	var status = true;
	if (start_time=='') {
		status=false;
		toastr["error"]("Không dược để trống start date!");
		return false;
	}
	if (end_time=='') {
		status=false;
		toastr["error"]("Không dược để trống end date!");
		return false;
	}
	if (status==true) {
		$.ajax({
			url: baseUrl+'home/home/getAjaxAnalytics',
			type: 'POST',
			dataType: 'json',
			data: {start_time: start_time,end_time:end_time},
		})
		.done(function(data) {
			if (data.status==true) {
				$('#revenue-chart-table').find('table.table tbody').html(data.html);
				$('#theme-panel').removeClass('panel-open').addClass('panel-close');
			}
			offLoading();
		});
		
	}else{
		offLoading();
	}
	
	
});