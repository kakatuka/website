$('body').on('click', '#user_add_permission_form', function(event) {
        event.preventDefault();
        var status=true;
        var url = baseUrl+'users/permission/ajaxAdd';
        var name = $('#user_add_permission .permission_name').val();
        var description = $('#user_add_permission .description').val();
        var parent_id = $('#user_add_permission .parent_id').val();
        if (name=='') {
            status = false;
            toastr["error"]("Bạn khong được để trống tên quyền!");
        }
        if (description=='') {
            status = false;
            toastr["error"]("Bạn không được để trống chú thích!");
        }
        if (status==true) {
            $('#user_add_permission_form').prop('disabled', true);
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {permissionname:name,description:description,parent_id:parent_id},
            })
            .done(function(data) {
                if (data.status==true) {
                    $('#user_add_permission .permission_name').val('');
                    $('#user_add_permission .description').val('');
                    $('#user_add_permission .parent_id').val('');
                    $('#user_add_permission_form').prop('disabled', false);
                    toastr["success"](data.mess);
                    $('#invite_modal').modal('hide');
                    setTimeout(function(){ window.location.assign(baseUrl+'users/permission/index'); }, 800);
                    
                }else{
                    $('#user_add_permission_form').prop('disabled', false);
                    toastr["error"](data.mess);
                }
            });

        }
        
    });

$('body').on('click', '#modelDeleteAll_permission #agree_del_all', function(event) {
    event.preventDefault();
    var allVals = [];
    $(".checkboxes:checked").each(function(){
       allVals.push($(this).val());
    });
    if (allVals.length >= 1) {
        $.ajax({
            url: baseUrl+'users/permission/dellAll',
            type: 'POST',
            dataType: 'json',
            data: {all: allVals},
        })
        .done(function(data) {
            if (data.status==true) {
                $('#modelDeleteAll_permission').modal('show'); 
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
        $('#modelDeleteAll_permission').modal('show'); 
    }else{
        toastr["error"]("Cảnh báo! Bạn chưa chọn tài khoản nào.");
    }
});