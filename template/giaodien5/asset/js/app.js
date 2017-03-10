jQuery(document).ready(function ($) {

	$('#mmenu').slicknav({
		label:'',
		prependTo:'#header-mobile-menu'
	});

	var lastId,
			topMenu = $("#top-navigation"),
			topMenuHeight = topMenu.outerHeight(),
			// All list items
			menuItems = topMenu.find("a"),
			// Anchors corresponding to menu items
			scrollItems = menuItems.map(function () {
				var href = $(this).attr("href");
				if(href.indexOf("#") === 0){
					var item = $($(this).attr("href"));
					if (item.length) {
						return item;
					}
				}
			});

	//Initial Out clients slider in client section
	$('#client-slider').bxSlider({
		pager: false,
		minSlides: 1,
		maxSlides: 5,
		moveSlides: 2,
		slideWidth: 210,
		slideMargin: 20,
		prevSelector: $('#client-prev'),
		nextSelector: $('#client-next'),
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>'
	});


	$('input, textarea').placeholder();

	// Bind to scroll
	$(window).scroll(function () {

		//Display or hide scroll to top button 
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
		if($(window).width() > 991){
			if($(window).scrollTop() > 100){
				$('.nav-header-fix').addClass('scroll-fixed');
			}else{
				$('.nav-header-fix').removeClass('scroll-fixed');
			}
		}else{
			if($(window).scrollTop() > 100){
				$('.nav-header-fix').addClass('scroll-fixed-mobile');
			}else{
				$('.nav-header-fix').removeClass('scroll-fixed-mobile');
			}
		}

		// Get container scroll position
		var fromTop = $(this).scrollTop() + topMenuHeight + 50;

		// Get id of current scroll item
		var cur = scrollItems.map(function () {
			if ($(this).offset().top < fromTop)
				return this;
		});

		// Get the id of the current element
		cur = cur[cur.length - 1];
		var id = cur && cur.length ? cur[0].id : "";

		if (lastId !== id) {
			lastId = id;
			// Set/remove active class
			menuItems
			.parent().removeClass("active")
			.end().filter("[href=#" + id + "]").parent().addClass("active");
		}
	});

	/*
    Function for scroliing to top
    ************************************/
	$('.scrollup').click(function () {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});


	$(window).load(function () {
		function filterPath(string) {
			return string.replace(/^\//, '').replace(/(index|default).[a-zA-Z]{3,4}$/, '').replace(/\/$/, '');
		}
		$('a[href*=#]').each(function () {
			if (filterPath(location.pathname) == filterPath(this.pathname) && location.hostname == this.hostname && this.hash.replace(/#/, '')) {
				var $targetId = $(this.hash),
						$targetAnchor = $('[name=' + this.hash.slice(1) + ']');
				var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;

				if ($target) {

					$(this).click(function () {

						//Hack collapse top navigation after clicking
						topMenu.parent().attr('style', 'height:0px').removeClass('in'); //Close navigation
						$('.navbar .btn-navbar').addClass('collapsed');

						var targetOffset = $target.offset().top - 63;
						$('html, body').animate({
							scrollTop: targetOffset
						}, 800);
						return false;
					});
				}
			}
		});
	});


	//Function for show or hide portfolio desctiption.
	$.fn.showHide = function (options) {
		var defaults = {
			speed: 1000,
			easing: '',
			changeText: 0,
			showText: 'Show',
			hideText: 'Hide'
		};
		var options = $.extend(defaults, options);
		$(this).click(function () {
			$('.toggleDiv').slideUp(options.speed, options.easing);
			var toggleClick = $(this);
			var toggleDiv = $(this).attr('rel');
			$(toggleDiv).slideToggle(options.speed, options.easing, function () {
				if (options.changeText == 1) {
					$(toggleDiv).is(":visible") ? toggleClick.text(options.hideText) : toggleClick.text(options.showText);
				}
			});
			return false;
		});
	};

	//Initial Show/Hide portfolio element.
	$('div.toggleDiv').hide();
	$('.show_hide').showHide({
		speed: 500,
		changeText: 0,
		showText: 'View',
		hideText: 'Close'
	});

	/************************
    Animate elements
    *************************/

	//Animate thumbnails 
	jQuery('.thumbnail').one('inview', function (event, visible) {
		if (visible == true) {
			jQuery(this).addClass("animated fadeInDown");
		} else {
			jQuery(this).removeClass("animated fadeInDown");
		}
	});


	//animate first team member
	jQuery('#first-person').bind('inview', function (event, visible) {
		if (visible == true) {
			jQuery('#first-person').addClass("animated pulse");
		} else {
			jQuery('#first-person').removeClass("animated pulse");
		}
	});

	//animate sectond team member
	jQuery('#second-person').bind('inview', function (event, visible) {
		if (visible == true) {
			jQuery('#second-person').addClass("animated pulse");
		} else {
			jQuery('#second-person').removeClass("animated pulse");
		}
	});

	//animate thrid team member
	jQuery('#third-person').bind('inview', function (event, visible) {
		if (visible == true) {
			jQuery('#third-person').addClass("animated pulse");
		} else {
			jQuery('#third-person').removeClass("animated pulse");
		}
	});

	//Animate price columns
	jQuery('.price-column, .testimonial').bind('inview', function (event, visible) {
		if (visible == true) {
			jQuery(this).addClass("animated fadeInDown");
		} else {
			jQuery(this).removeClass("animated fadeInDown");
		}
	});

	//Animate contact form
	jQuery('.contact-form').bind('inview', function (event, visible) {
		if (visible == true) {
			jQuery('.contact-form').addClass("animated bounceIn");
		} else {
			jQuery('.contact-form').removeClass("animated bounceIn");
		}
	});

	//Animate skill bars
	jQuery('.skills > li > span').one('inview', function (event, visible) {
		if (visible == true) {
			jQuery(this).each(function () {
				jQuery(this).animate({
					width: jQuery(this).attr('data-width')
				}, 3000);
			});
		}
	});
});