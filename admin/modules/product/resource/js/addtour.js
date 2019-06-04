$(document).ready(function() {
    $('#addtienich').click(function() {
        var add = '<div class="col-xs-12 add_tt" style="margin:20px 0;"><div class="col-md-2"><label class="control-label required">Ngày khởi hành</label><input type="text" class="form-control maxlength-handler" name="info_day[]" maxlength="60" placeholder="27/12/2018"></div><div class="col-md-2"><label class="control-label required">Mã tour</label><input type="text" class="form-control maxlength-handler" name="info_code[]" maxlength="60" placeholder="STN084-2018-03586"></div><div class="col-md-2"><label class="control-label required">Giá người lớn</label><input type="text" class="form-control maxlength-handler" name="price_men[]" maxlength="60" placeholder="1000000"></div><div class="col-md-2"><label class="control-label required">Giá trẻ em</label><input type="text" class="form-control maxlength-handler" name="price_child[]" maxlength="60" placeholder="500000"></div><div class="col-md-2"><label class="control-label required">Giá em bé</label><input type="text" class="form-control maxlength-handler" name="price_baby[]" maxlength="60" placeholder="1000000"></div><div class="col-md-2"><span class="delete_btn">Xóa</span></div></div>';
        $('#add_info').append(add);
    });
    $('body').on('click', '.delete_btn', function() {
        $(this).parents('.add_tt').remove();
    });
    $('.add_date').click(function() {
        var array_date = [];
        var price_lon = $('#price_1').val();
        if (price_lon == "") {
            toastr["error"]("Bạn chưa nhập giá người lớn");
        } else {
            var price_em = $('#price_2').val();
            var price_be = $('#price_3').val();
            $('.array_date :selected').each(function(i, sel) {
                var add = '<div class="col-xs-12 add_tt" style="margin:20px 0;"><div class="col-md-2"><label class="control-label required">Ngày khởi hành</label><input type="text" class="form-control maxlength-handler" name="info_day[]" maxlength="60" value="' + $(sel).text() + '"></div><div class="col-md-2"><label class="control-label required">Mã tour</label><input type="text" class="form-control maxlength-handler" name="info_code[]" maxlength="60" placeholder="Mã tour sẽ tự sinh" disabled></div><div class="col-md-2"><label class="control-label required">Giá người lớn</label><input type="text" class="form-control maxlength-handler" name="price_men[]" maxlength="60" value="' + price_lon + '"></div><div class="col-md-2"><label class="control-label required">Giá trẻ em</label><input type="text" class="form-control maxlength-handler" name="price_child[]" maxlength="60" placeholder="500000"  value="' + price_em + '"></div><div class="col-md-2"><label class="control-label required">Giá em bé</label><input type="text" class="form-control maxlength-handler" name="price_baby[]" maxlength="60" placeholder="1000000"  value="' + price_be + '"></div><div class="col-md-2"><span class="delete_btn">Xóa</span></div></div>';
                $('#add_info').append(add);
            });
        }

    });
    $('.add_7day').click(function() {
        var a;
        var price_lon = $('#price_1').val();
        var price_em = $('#price_2').val();
        var price_be = $('#price_3').val();
        var day = $(this).attr('data-day');
        var date_select = $('.array_date').val();
        $('.array_date :selected').each(function(i, sel) {
            a = $(sel).val();
        });
        var date = new Date(a),
            d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear();
        if (price_lon == "") {
            toastr["error"]("Bạn chưa nhập giá người lớn");
        } else {
            for (i = 2; i < day; i++) {
                var curdate = new Date(y, m, d + i);
                var date1 = new Date(curdate),
                    mm = ("0" + (date1.getMonth() + 1)).slice(-2),
                    dd = ("0" + date1.getDate()).slice(-2);
                var conver_date = [dd, mm, date1.getFullYear()].join("/");
                var add = '<div class="col-xs-12 add_tt" style="margin:20px 0;"><div class="col-md-2"><label class="control-label required">Ngày khởi hành</label><input type="text" class="form-control maxlength-handler" name="info_day[]" maxlength="60" value="' + conver_date + '"></div><div class="col-md-2"><label class="control-label required">Mã tour</label><input type="text" class="form-control maxlength-handler" name="info_code[]" maxlength="60" placeholder="Mã tour sẽ tự sinh" disabled></div><div class="col-md-2"><label class="control-label required">Giá người lớn</label><input type="text" class="form-control maxlength-handler" name="price_men[]" maxlength="60" value="' + price_lon + '"></div><div class="col-md-2"><label class="control-label required">Giá trẻ em</label><input type="text" class="form-control maxlength-handler" name="price_child[]" maxlength="60" placeholder="500000"  value="' + price_em + '"></div><div class="col-md-2"><label class="control-label required">Giá em bé</label><input type="text" class="form-control maxlength-handler" name="price_baby[]" maxlength="60" placeholder="1000000"  value="' + price_be + '"></div><div class="col-md-2"><span class="delete_btn">Xóa</span></div></div>';
                $('#add_info').append(add);
            }
        }

    });
});