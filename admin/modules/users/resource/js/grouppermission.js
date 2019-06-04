$('body').on('click', '.deleteDialog', function(event) {
	event.preventDefault();
	var href = $(this).attr('data-href');
	$('#agree_del').attr('href', href);
});
$('body').on('click', '#modelDeleteAll_group_permission #agree_del_all', function(event) {
    event.preventDefault();
    var allVals = [];
    $(".checkboxes:checked").each(function(){
       allVals.push($(this).val());
    });
    if (allVals.length >= 1) {
        $.ajax({
            url: baseUrl+'users/grouppermission/dellAll',
            type: 'POST',
            dataType: 'json',
            data: {all: allVals},
        })
        .done(function(data) {
            if (data.status==true) {
                $('#modelDeleteAll_group_permission').modal('show'); 
                window.location.assign(data.redirect);
            }else{
                toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
            }
        });
    }else{
        toastr["error"]("Cảnh báo! Bạn chưa chọn tài khoản nào.");
    }
    
    
});

$('body').on('click', '#del_list_permission', function(event) {

    event.preventDefault();
    var allVals = [];
    $(".checkboxes:checked").each(function(){
       allVals.push($(this).val());
    });
    if (allVals.length >= 1) {
        $('#modelDeleteAll_group_permission').modal('show'); 
    }else{
        toastr["error"]("Cảnh báo! Bạn chưa chọn tài khoản nào.");
    }
});