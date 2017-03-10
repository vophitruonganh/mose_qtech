$(document).ready(function() {
	$('#custom1').owlCarousel({
		autoplay:true,
		autoplayTimeout:2000,
		autoplayHoverPause:false,
		loop:true,
		items:1,
		autoHeight:false
	});

	$(".owl-sale").owlCarousel({
		slideSpeed: 300,
		paginationSpeed: 400,
		items:1,
		navText: [ 
			'<span class="button-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>', 
			'<span class="button-next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>' 
		],
	});

	$('.owl-pronews').owlCarousel({
		loop:false,
		margin:30,
		navText: [ 
			'<span class="button-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>', 
			'<span class="button-next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>' 
		],
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
			},
			544:{
				items:1,
			},
			768:{
				items:2,
			},
			992:{
				items:3,
			}
		}
	});

	$('.owl-promotion').owlCarousel({
		loop:false,
		margin:10,
		navText: [ 
			'<span class="button-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>', 
			'<span class="button-next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>' 
		],
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
			},
			544:{
				items:1,
			},
			768:{
				items:2,
			},
			992:{
				items:4,
			}
		}
	});

	$('.owl-profeatured').owlCarousel({
		loop:false,
		margin:10,
		responsiveClass:true,
		navText: [ 
			'<span class="button-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>', 
			'<span class="button-next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>' 
		],
		responsive:{
			0:{
				items:1,
			},
			544:{
				items:1,
			},
			768:{
				items:2,
			},
			992:{
				items:4,
			}
		}
	});

	$(".owl-muanhieu").owlCarousel({
		slideSpeed: 300,
		paginationSpeed: 400,
		items:1,
		navText: [ 
			'<span class="button-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>', 
			'<span class="button-next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>' 
		],
	});

});



jQuery(document).ready(function ($) {

	var $sync1 = $(".product-images"),
		$sync2 = $(".thumbnail-product"),
		flag = false,
		duration = 300;

	$sync1
		.owlCarousel({
		items: 1,
		margin: 10,
		nav: true,
		dots: false,
		navText: [ 
			'<i class="fa fa-chevron-left" aria-hidden="true"></i>', 
			'<i class="fa fa-chevron-right" aria-hidden="true"></i>' 
		],
	})
		.on('changed.owl.carousel', function (e) {
		if (!flag) {
			flag = true;
			$sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
			flag = false;
		}
	});

	$sync2
		.owlCarousel({
		margin: 20,
		items: 4,
		nav: false,
		dots: false,
	})
		.on('click', '.owl-item', function () {
		$sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);

	})
		.on('changed.owl.carousel', function (e) {
		if (!flag) {
			flag = true;		
			$sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
			flag = false;
		}
	});
});