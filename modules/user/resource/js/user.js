$('body').on('click', '#f5capt_cha', function(event) {
	event.preventDefault();
	$("#cap_md").val(0);
	var src = $("#capt_img_ct").attr("src");
	$("#capt_img_ct").attr("src", src);
});

