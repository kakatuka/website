$('body').on('change', '.fileUpload', function(event) {
    event.preventDefault();
    $('.icon-loading').addClass('display-none');
    $('.loading').addClass('animate-loading-center');
    $('.loading').html('<div class="icon-loading"><i class="fa fa-spinner fa-pulse fa-4x"></i> <p style="font-size:20px;">Đang tải dữ liệu...</p></div>');
    $('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
    var data = new FormData($("#form-uploads-ajax")[0]);
    $.ajax({
            url: baseUrlcloud + 'media/media/uploadImagesView',
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
        })
        .done(function(data) {
            console.log(data);
            var abc = jQuery.parseJSON(JSON.stringify(data));
            var list = new Array();
            list.push(data.html_1);
            $.ajax({
                    url: baseUrl + 'product/product/addImagesProduct1',
                    type: 'POST',
                    dataType: 'json',
                    data: { list: list },
                })
                .done(function(data) {
                    console.log(data);
                    if (data.status == true) {
                        //toastr["success"](data.mess);
                        if ($('#id_product').val() == null) {
                            $('#sortable').fadeOut(100, function() {
                                $('#sortable').html(data.html).fadeIn();
                            });
                        } else {
                            $('#sortable').append(data.html).fadeIn();
                        }

                    }
                    // offLoading();
                });
            // document.getElementById("uploadPreview").src = abc.html;
            $('.modal-image-choose').find('.hidden_thumb_pages').val(abc.html_1);
            $(this).parents('.modal-image-choose').find('.load-img').attr('src', baseUrlcloud + 'timthumb.php?src=' + baseUrlcloud + 'cdn/' + abc.html + '&h=150&w=210&zc=2');
            $('#myModalPages').modal('hide');
            $('.icon-loading').removeClass('display-none');
            $('.loading').removeClass('animate-loading-center');
            $('.loading').empty();
            $('.fade_loading').empty();
            if (data.status == true) {
                $('#loadMediaModel').fadeOut(100, function() {
                    $('#loadMediaModel').html(data.html123).fadeIn();
                });
                toastr["success"](data.mess);

            } else {
                toastr["warning"](data.mess);
            }
        });
});

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}
$(document).ready(function(event) {
    $("#Variant_CompareAtPrice").keyup(function(event) {
        var a = $(this).val();
        if ($.isNumeric(a)) {
            var number = parseInt(a);
            if (number >= 1 && number <= 100) {
                var price = $('#price').val();
                var content = $('#Variant_CompareAtPrice').val();
                var sale = price * content / 100;
                var price_sale = price - sale;
                $('.new_price').val(formatNumber(Math.round(price_sale)));
            } else {
                var price_sale = 0;
                $('.new_price').val(price_sale);
            }
        } else {
            var price_sale = 0;
            $('.new_price').val(price_sale);
        }
        if (a === "") {
            $("[name=discount_price]").val("")
        }

    });
});

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
$(document).ready(function() {

    $('.toan').click(function() {
        var status = $(this).attr('status');
        var id = $(this).attr('id_status');
        $.ajax({
            url: baseUrl + 'product/product/uploadStatus',
            type: 'POST',
            dataType: 'json',
            data: {
                status: status,
                id: id
            },
            success: function(data) {
                console.log(data);
            }
        });
        window.location.reload();
    });
    $('.cate').click(function() {
        var status = $(this).attr('status');
        var id = $(this).attr('id_status');
        $.ajax({
            url: baseUrl + 'product/category/uploadStatusCate',
            type: 'POST',
            dataType: 'json',
            data: {
                status: status,
                id: id
            },
            success: function(data) {
                console.log(data);
            }
        });
        window.location.reload();
    });
    // $('#addtienich').click(function() {
    //     var add = '<div class="col-md-12 add_tt" style="margin: 20px 0"><div class="col-md-3"><input type="text" name="title_tienich[]" placeholder="Tên tiện ích" class="form-control"></div><div class="col-md-3"><input type="text" name="content_tienich[]" placeholder="Mô tả ngắn tiện ích" class="form-control"></div><div class="col-md-4"><span class="fa fa-trash-o delete"> Xóa</span></div></div>';
    //     $('#add_tienich').append(add);
    // });
    // $('body').on('click', '.delete', function() {
    //     $(this).parents('.add_tt').remove();
    // });

});