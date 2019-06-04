// var flag =0;
// var b = 8;
// $('body').on('click','.cate', function(){
// 	flag = 0;
// 	b = 8;
// 	var id = $(this).attr('data-id');
// 	$('#loadmore').attr('data-id',id);
// 	// $('#loadmore').attr('data-start',4);
// 	$.ajax({
// 		url: baseUrl+ 'home/home/ajaxProduct',
// 		type: 'POST',
// 		dataType: 'json',
// 		data: {id:id},
// 	}).done(function(data){
// 		// console.log(data);
// 		if(data.status == true){
// 			$('#addproduct').html(data.html);
// 		}
// 	});
// });

// $('body').on('click' , '#loadmore' , function(){
// 		// var start = $(this).attr('data-start');
// 		var id = $(this).attr('data-id');
// 		// var check = $('.cate').hasClass('active');
// 		flag += 8;
// 	    $.ajax({
// 	    	url: baseUrl+ 'home/home/ajaxLoadmore',
// 	    	type: 'POST',
// 	    	dataType: 'json',
// 	    	data:{  
// 	    		'offset': flag,
// 	            'limit': b,
// 	            'id':id
// 	        },
// 	    }).done(function(data){
// 	         $('#addproduct').append(data.htm);
// 	    });
// 	});
// // $('body').on('click' , '.contact' , function(){
	
// // });

// 	// $('#hihi').carousel({
// 	// 	  interval: 100
// 	// 	})
//       var owll = $('#hihi');
//       owll.owlCarousel({
// 		autoplay:true,
//     	autoplayTimeout:2000,
//         margin: 10,
//         loop: true,
//         autoplayHoverPause:true,
//         responsive: {
//           0: {
//             items: 1
//           },
//           600: {
//             items: 2
//           },
//           1000: {
//             items: 3
//           }
//         }
//       });
//       var owl = $('.owl-carousel');
//       owl.owlCarousel({
// 		autoplay:true,
//     	autoplayTimeout:2500,
//         margin: 10,
//         loop: true,
//         autoplayHoverPause:true,
//         responsive: {
//           0: {
//             items: 1
//           },
//           600: {
//             items: 2
//           },
//           1000: {
//             items: 6
//           }
//         }
//       });
//       $('.play').on('click',function(){
//     owl.trigger('play.owl.autoplay',[1000])
// })
// $('.stop').on('click',function(){
//     owl.trigger('stop.owl.autoplay')
// })