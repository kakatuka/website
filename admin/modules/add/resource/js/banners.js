
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
            var abc = jQuery.parseJSON(JSON.stringify(data));
            document.getElementById("uploadPreview").src = abc.html;
            $('.modal-image-choose').find('.hidden_thumb_pages').val(abc.html_1);
            $(this).parents('.modal-image-choose').find('.load-img').attr('src', baseUrlcloud + 'timthumb.php?src=' + baseUrlcloud + 'cdn/' + abc.html + '&h=150&w=210&zc=2');
            $('#myModalPages').modal('hide');
            $('.icon-loading').removeClass('display-none');
            $('.loading').removeClass('animate-loading-center');
            $('.loading').empty();
            $('.fade_loading').empty();
            if (data.status == true) {
                $('#myModalPages').find('.modal-body').fadeOut(100, function() {
                    $('#myModalPages').find('.modal-body').html(data.html123).fadeIn();
                });
                toastr["success"](data.mess);

            } else {
                toastr["warning"](data.mess);
            }
        });
});
$(document).ready(function() {
    $.ajax({
            url: baseUrlcloud + 'media/media/openOneFilesDirectory',
            type: 'POST',
            dataType: 'json',
            data: {
                open: security_key
            },
        })
        .done(function(data) {
            $("#loadMediaModel").append(data.html);
        });
});


$('body').on('dblclick', '#myModalPages .media-col img.img-folder-media', function(event) {
    event.preventDefault();
    var check_folder = $(this).parent('.media-col').attr('data-folder');
    var directory = $('#directory').val();
    $.ajax({
            url: baseUrlcloud + 'settings/settings/openDirectory',
            type: 'POST',
            dataType: 'json',
            data: { check_folder: check_folder, directory: directory },
        })
        .done(function(data) {
            //console.log(current_folder);
            if (data.status == true) {
                $('#myModalPages').find('.modal-body').fadeOut(100, function() {
                    $('#myModalPages').find('.modal-body').html(data.html).fadeIn();
                });
            }
        });


});



$('body').on('dblclick', '#back_folder', function(event) {
    event.preventDefault();
    var current_folder = $(this).parent('.modal-body');
    var directory = $('#directory').val();
    $.ajax({
            url: baseUrlcloud + 'settings/settings/backDirectory',
            type: 'POST',
            dataType: 'json',
            data: { back: 'true', directory: directory },
        })
        .done(function(data) {
            if (data.status == true) {
                current_folder.fadeOut(100, function() {
                    current_folder.html(data.html).fadeIn();
                    //$('#loadMedia').html(data.html).fadeIn().delay(600);
                });
            }

        });

});

$('body').on('click', '.choose_img', function(event) {
    event.preventDefault();
    var body_img = $(this).parents('.modal-image-choose').find('.modal-body');
    var list = new Array();
    body_img.find('.img-active').each(function() {
        list.push($(this).attr('data-src'));
    });
    //console.log(list);
    if (list.length == 0) {
        toastr["error"](body_img.attr('data-mess-one'));
    } else if (list.length > 1) {
        toastr["error"](body_img.attr('data-mess-two'));
    } else {
        var src = list[0];
        if (body_img.attr('data-title') == 'thumbnail_pages') {
            var title = 'thumbnail_pages';
        } else {
            var title = '';
        }
        $('.modal-image-choose').find('.hidden_thumb_pages').val(src);
        $(this).parents('.modal-image-choose').find('.load-img').attr('src', baseUrlcloud + 'timthumb.php?src=' + baseUrlcloud + 'cdn/' + src + '&h=150&w=210&zc=2');
        body_img.find('.img-load-folder').each(function() {
            $(this).removeClass('img-active');
        });
        $(this).parents('.modal-image-choose').find('.modal').modal('hide');
    }
});



$('body').on('click', '.del-image-choose-pages', function(event) {
    event.preventDefault();
    $(this).parents('.modal-image-choose').find('.hidden_thumb_pages').val('');
    $(this).parents('.modal-image-choose').find('.pages-website').attr('src', baseUrlcloud + 'timthumb.php?src=' + baseUrl + 'tmp/public/images/img.png&h=150&w=210&zc=2');
});








$('body').on('click', '.deleteDialog', function(event) {
    event.preventDefault();
    var href = $(this).attr('data-href');
    $('#agree_del').attr('href', href);
});



$('body').on('click', '#del_list_user', function(event) {
    event.preventDefault();
    var allVals = [];
    $(".checkboxes:checked").each(function() {
        allVals.push($(this).val());
    });
    if (allVals.length >= 1) {
        $('#modelDeleteAll').modal('show');
    } else {
        toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
    }
});


$('body').on('click', '#modelDeleteAll #agree_del_all', function(event) {
    event.preventDefault();
    var allVals = [];
    $(".checkboxes:checked").each(function() {
        allVals.push($(this).val());
    });
    if (allVals.length >= 1) {
        $.ajax({
                url: baseUrl + 'add/add/dellAll',
                type: 'POST',
                dataType: 'json',
                data: { all: allVals },
            })
            .done(function(data) {
                if (data.status == true) {
                    $('#modelDeleteAll').modal('show');
                    window.location.assign(data.redirect);
                } else {
                    toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
                }
            });
    } else {
        toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
    }


});







$('body').on('click', '#lock_user', function(event) {
    event.preventDefault();
    var allVals = [];
    $(".checkboxes:checked").each(function() {
        allVals.push($(this).val());
    });
    if (allVals.length >= 1) {
        var status = 'public';
        $.ajax({
                url: baseUrl + 'add/add/status',
                type: 'POST',
                dataType: 'json',
                data: { status: status, all: allVals },
            })
            .done(function(data) {
                if (data.status == true) {
                    window.location.assign(data.redirect);
                } else {
                    toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
                }
            });
    } else {
        toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
    }
});

$('body').on('click', '#unlock_user', function(event) {
    event.preventDefault();
    var allVals = [];
    $(".checkboxes:checked").each(function() {
        allVals.push($(this).val());
    });
    if (allVals.length >= 1) {
        var status = 'private';
        $.ajax({
                url: baseUrl + 'add/add/status',
                type: 'POST',
                dataType: 'json',
                data: { status: status, all: allVals },
            })
            .done(function(data) {
                if (data.status == true) {
                    window.location.assign(data.redirect);
                } else {
                    toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
                }
            });
    } else {
        toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
    }
});


// LOck categories
$('body').on('click', '#lock_categories', function(event) {
    event.preventDefault();
    var allVals = [];
    $(".checkboxes:checked").each(function() {
        allVals.push($(this).val());
    });
    if (allVals.length >= 1) {
        var status = 'public';
        $.ajax({
                url: baseUrl + 'posts/categories/status',
                type: 'POST',
                dataType: 'json',
                data: { status: status, all: allVals },
            })
            .done(function(data) {
                if (data.status == true) {
                    window.location.assign(data.redirect);
                } else {
                    toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
                }
            });
    } else {
        toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
    }
});

$('body').on('click', '#unlock_categories', function(event) {
    event.preventDefault();
    var allVals = [];
    $(".checkboxes:checked").each(function() {
        allVals.push($(this).val());
    });
    if (allVals.length >= 1) {
        var status = 'private';
        $.ajax({
                url: baseUrl + 'posts/categories/status',
                type: 'POST',
                dataType: 'json',
                data: { status: status, all: allVals },
            })
            .done(function(data) {
                if (data.status == true) {
                    window.location.assign(data.redirect);
                } else {
                    toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
                }
            });
    } else {
        toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
    }
});

$('body').on('click', '#del_list_categories', function(event) {
    event.preventDefault();
    var allVals = [];
    $(".checkboxes:checked").each(function() {
        allVals.push($(this).val());
    });
    if (allVals.length >= 1) {
        $('#modelDeleteAll').modal('show');
    } else {
        toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
    }
});


$('body').on('click', '#modelDeleteAll #agree_del_all_categories', function(event) {
    event.preventDefault();
    var allVals = [];
    $(".checkboxes:checked").each(function() {
        allVals.push($(this).val());
    });
    if (allVals.length >= 1) {
        $.ajax({
                url: baseUrl + 'posts/categories/dellAll',
                type: 'POST',
                dataType: 'json',
                data: { all: allVals },
            })
            .done(function(data) {
                if (data.status == true) {
                    $('#modelDeleteAll').modal('show');
                    window.location.assign(data.redirect);
                } else {
                    toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
                }
            });
    } else {
        toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
    }


});

$('body').on('click', '.search_button_categories', function(event) {
    event.preventDefault();
    var search = $('.search_categories').val();
    if (search == "") {
        window.location.assign(baseUrl + 'posts/categories/index');
    } else {
        window.location.assign(baseUrl + 'posts/categories/index&s=' + search);
    }

});



$('body').on('click', '.search_button_users', function(event) {
    event.preventDefault();
    var search = $('.search_users').val();
    if (search == "") {
        window.location.assign(baseUrl + 'add/add/index');
    } else {
        window.location.assign(baseUrl + 'add/add/index&s=' + search);
    }

});

$(document).ready(function() {
    $('.baner').click(function() {
        var status = $(this).attr('status');
        var id = $(this).attr('id_status');
        // alert(id);
        $.ajax({
            url: baseUrl + 'add/add/uploadStatus',
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
});