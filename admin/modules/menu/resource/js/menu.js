//menu
function reloadMenuStruct(pos) {
    $("#nestable").empty();
    $.ajax({
            url: baseUrl + 'menu/menu/loadMenu&pos=' + pos,
            type: 'GET',
            dataType: 'html',
        })
        .done(function(data) {
            $("#nestable").append(data);
        });
}

function onLoading(load = null) {
    if (load == null) {
        load = 'Đang xử lý...';
    }
    $('.icon-loading').addClass('display-none');
    $('.loading').addClass('animate-loading-center');
    $('.loading').html('<div class="icon-loading"><i class="fa fa-spinner fa-pulse fa-4x"></i> <p style="font-size:20px;"> ' + load + '</p></div>');
    $('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
}

function offLoading() {
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
    } else {
        $(this).addClass('closed').removeClass('opened');
        $(this).parents('.widget').find('.widget-body').slideUp(200);
    }
});


// menu categories
$('body').on('click', '.box-links-for-menu .list-item li a', function(event) {
    event.preventDefault();
    if ($(this).parent('li').hasClass('active')) {
        $(this).parent('li').removeClass('active');
    } else {
        $(this).parent('li').addClass('active');
    }

});


// add to menu
$('body').on('click', '.btn-add-to-menu', function(event) {
    event.preventDefault();
    // onLoading('Đang tải dữ liệu...');


    var position = $('#position').val();
    var active = $(this).parents('.box-links-for-menu').find('ul.list-item li.active');
    var type = $(this).parents('.box-links-for-menu').find('ul.list-item').attr('data-type');
    var i = [];
    var t = [];
    console.log(type);
    var title = $(this).parents('.box-links-for-menu').find('ul.list-item').attr('data-title');
    active.each(function(index, el) {
        i.push($(this).find('a').attr('data-link'));
        t.push($(this).find('a').attr('data-title'));
    });
    if (i.length >= 1) {
        $.ajax({
                url: baseUrl + 'menu/menu/addPagesToMenu',
                type: 'POST',
                dataType: 'json',
                data: { link: i, type: type, position: position, title: t },
            })
            .done(function(data) {
                // offLoading();
                if (data.status == true) {
                    toastr["success"](data.mess);
                    reloadMenuStruct(position);


                }
                $('.box-links-for-menu ul.list-item li').removeClass('active');
            });
    } else {
        offLoading();
        toastr["error"]("Bạn phải chọn ít nhất mục!");
    }

});


// add to menu Categories

$('body').on('click', '.btn-add-to-menu-cate', function(event) {
    event.preventDefault();
    // onLoading();
    var position = $('#position').val();
    var active = $(this).parents('.box-links-for-menu').find('ul.list-item li.active');
    var type = $(this).parents('.box-links-for-menu').find('ul.list-item').attr('data-type');
    var type_cate = $(this).parents('.box-links-for-menu').find('ul.list-item').attr('data-type-cate');
    // var images = $(this).parents('.box-links-for-menu').find('ul.list-item').attr('data-img');
    var i = [];
    var id_cate = [];
    var t = [];
    var img = [];
    var name = [];
    var content = [];
    
    active.each(function(index, el) {
        i.push($(this).find('a').attr('data-link'));
        id_cate.push($(this).find('a').attr('data-id'));
        img.push($(this).find('a').attr('data-img'));
        t.push($(this).find('a').attr('data-title'));
        name.push($(this).find('a').attr('data-name'));
        content.push($(this).find('a').attr('data-content'));
    });
    console.log(id_cate);
    if (i.length >= 1) {
        $.ajax({
                url: baseUrl + 'menu/menu/addCategoriesToMenu',
                type: 'POST',
                dataType: 'json',
                data: { link: i, img: img, type: type, position: position, title: t, name: name, content: content,type_cate:type_cate,id_cate:id_cate },
            })
            .done(function(data) {
                // offLoading();
                if (data.status == true) {
                    toastr["success"](data.mess);
                    reloadMenuStruct(position);


                }
                $('.box-links-for-menu ul.list-item li').removeClass('active');
            });
    } else {
        offLoading();
        toastr["error"]("Bạn phải chọn ít nhất mục!");
    }

});


$('body').on('click', '.btn-add-to-menu-custom-link', function(event) {
    event.preventDefault();
    onLoading();
    var position = $('#position').val();
    var type = $(this).parents('.box-links-for-menu').attr('data-type');
    var title = $(this).parents('.box-links-for-menu').find('#node-title').val();
    var link = $(this).parents('.box-links-for-menu').find('#node-url').val();
    var avatar = $(this).parents('.box-links-for-menu').find('#node-css').val();
    $.ajax({
            url: baseUrl + 'menu/menu/addCustomToMenu',
            type: 'POST',
            dataType: 'json',
            data: { title: title, link: link, type: type, avatar: avatar, position: position },
        })
        .done(function(data) {
            offLoading();
            if (data.status == true) {
                toastr["success"](data.mess);
                reloadMenuStruct(position);
            }
        });
});




// menu struct 
$('body').on('click', '.nestable-menu ol.dd-list li a.show-item-details', function(event) {
    event.preventDefault();
    var position = $('#position').val();
    var li_item = $(this).parents('li');
    var li_parent_id = $(this).parents('li').attr('data-parent');
    $.ajax({
            url: baseUrl + 'menu/menu/callMenuSelecBox&pos=' + position,
            type: 'GET',
            dataType: 'html',
        })
        .done(function(data) {
            var status = true;
            li_item.find('.item-details .pad-bot-5').each(function(index, el) {
                if ($(this).hasClass('check_sort_menu')) {
                    status = false;
                }
            });
            if (status == true) {
                li_item.find('.item-details .button_update_menu').before(data);
            }
            li_item.find('.item-details .check_sort_menu #parent_menu option').each(function(index, el) {
                if ($(this).attr('value') == li_parent_id) {
                    $(this).attr('selected', 'selected');
                }
                //console.log($(this).attr('value'));
            });
        });
    //li_parent_id
    // selected="selected"

    if ($(this).parents('li.dd-item').hasClass('closed')) {
        $(this).parents('li.dd-item').addClass('opened').removeClass('closed');
        $(this).parents('.li.dd-item').find('.item-details').slideDown(200);
    } else {
        $(this).parents('li.dd-item').addClass('closed').removeClass('opened');
        $(this).parents('.li.dd-item').find('.item-details').slideUp(200);
    }

});




// update menu 
$('body').on('click', '.update_menu', function(event) {
    event.preventDefault();

    onLoading();
    var position = $('#position').val();
    var li_item = $(this).parents('li.dd-item');
    var id = li_item.attr('data-id');
    var title = li_item.find('.item-details #title').val();
    var link = li_item.find('.item-details #link').val();
    var sort = li_item.find('.item-details #sort').val();
    var avatar = li_item.find('.item-details #avatar').val();
    var parent_menu = li_item.find('.item-details #parent_menu').val();
    $.ajax({
            url: baseUrl + 'menu/menu/updateMenu',
            type: 'POST',
            dataType: 'json',
            data: { id: id, title: title, link: link, sort: sort, avatar: avatar, parent_menu: parent_menu, position: position },
        })
        .done(function(data) {
            offLoading();
            if (data.status == true) {
                toastr["success"](data.mess);
                reloadMenuStruct(position);
            } else {
                toastr["error"](data.mess);
            }
        });



});




// delete menu

$('body').on('click', '.remove_menu', function(event) {
    event.preventDefault();
    var position = $('#position').val();
    var li_item = $(this).parents('li.dd-item');
    var id = li_item.attr('data-id');
    $('#myModalConfirmMenu .accept_del_menu').attr('href', baseUrl + 'menu/menu/deleteMenu/' + id + '&pos=' + position);
    $('#myModalConfirmMenu').modal('show');
    $.ajax({
            url: baseUrl + 'index.php?mod=menu&controller=menu&action=deleteMenu',
            type: 'POST',
            dataType: 'json',
            data: { id: id },
        })
        .done(function() {
            console.log("success");
        });

});

$('body').on('click', '.cancel_menu', function(event) {
    event.preventDefault();
    $(this).parents('li.dd-item').addClass('closed').removeClass('opened');
    $(this).parents('.li.dd-item').find('.item-details').slideUp(200);
});










/// update title menu 

$('body').on('click', '#submit_update_name', function(event) {
    event.preventDefault();
    onLoading();
    var title_menu = $('#title_menu').val();
    var position = $('#position').val();
    if (title_menu != "") {
        $.ajax({
                url: baseUrl + 'menu/menu/updateTitleMenu',
                type: 'POST',
                dataType: 'json',
                data: { title_menu: title_menu, position: position },
            })
            .done(function(data) {
                offLoading();
                if (data.status == true) {
                    window.location.assign(data.href);
                }
            });

    } else {
        toastr["error"]("Không được để trống tên điều hướng.");
        offLoading();
    }

});