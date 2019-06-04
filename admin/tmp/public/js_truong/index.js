// Hamburger button --------------------------------------------------------
$(document).ready(function() {
    $('.opennav').click(function() {
        $(this).toggleClass('shownav');
        $('.sidenav').toggleClass('shownav');
        $('.circle-plus').toggleClass('showplus');
        $('.main-content').toggleClass('show-main-content');
    });
});
// Notification button --------------------------------------------------------
$(document).ready(function() {
    $('.noti').click(function(e) {
        e.preventDefault();
        $(".popup-noti").fadeIn(300, function() { $(this).focus(); });
        $('.counting').addClass('hide');
    });
});
$(".popup-noti").on('blur', function() {
    $(this).fadeOut(300);
});
// User button --------------------------------------------------------
$(".user").click(function(e) {
    e.preventDefault();
    $(".user-function").fadeIn(300, function() { $(this).focus(); });
});

$(".user-function").on('blur', function() {
    $(this).fadeOut(300);
});
// Plus/minus button ---------------------------------------------------------
$('.circle-plus').on('click', function() {
    $(this).toggleClass('opened');
})