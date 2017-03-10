jQuery(document).ready(function() {
	"use strict";
	jQuery('.toggle').click(function() {
		if (jQuery('.submenu').is(":hidden"))
		{
			jQuery('.submenu').slideDown("fast");
		} else {
			jQuery('.submenu').slideUp("fast");
		}
		return false;
	});

	/*  Phone Menu  */

	jQuery(".topnav").accordion({
		accordion:false,
		speed: 300,
		closedSign: '<i class="fa fa-angle-down" aria-hidden="true"></i>',
		openedSign: '<i class="fa fa-angle-up" aria-hidden="true"></i>'
	});

	$("#nav > li").hover(function() {
		var el = $(this).find(".level0-wrapper");
		el.hide();
		el.css("left", "0");
		el.stop(true, true).delay(150).fadeIn(300, "easeOutCubic");
	}, function() {
		$(this).find(".level0-wrapper").stop(true, true).delay(300).fadeOut(300, "easeInCubic");
	});	
	var scrolled = false;

	jQuery("#nav li.level0.drop-menu").mouseover(function(){
		if(jQuery(window).width() >= 740){
			jQuery(this).children('ul.level1').fadeIn(100);
		}
		return false;
	}).mouseleave(function(){
		if(jQuery(window).width() >= 740){
			jQuery(this).children('ul.level1').fadeOut(100);
		}
		return false;
	});
	jQuery("#nav li.level0.drop-menu li").mouseover(function(){
		if(jQuery(window).width() >= 740){
			jQuery(this).children('ul').css({top:0,left:"165px"});
			var offset = jQuery(this).offset();
			if(offset && (jQuery(window).width() < offset.left+325)){
				jQuery(this).children('ul').removeClass("right-sub");
				jQuery(this).children('ul').addClass("left-sub");
				jQuery(this).children('ul').css({top:0,left:"-167px"});
			} else {
				jQuery(this).children('ul').removeClass("left-sub");
				jQuery(this).children('ul').addClass("right-sub");
			}
			jQuery(this).children('ul').fadeIn(100);
		}
	}).mouseleave(function(){
		if(jQuery(window).width() >= 740){
			jQuery(this).children('ul').fadeOut(100);
		}
	});				

	jQuery("#promo-products-slider .slider-items").owlCarousel({
		items : 2, //10 items above 1000px browser width
		itemsDesktop : [1024,2], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,2],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></a>","<a class=\"flex-next\"><i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i></a>"],
		slideSpeed : 500,
		pagination : false
	});
	jQuery("#new-products-slider .slider-items").owlCarousel({
		items : 4, //10 items above 1000px browser width
		itemsDesktop : [1024,4], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,4], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,2],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></a>","<a class=\"flex-next\"><i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i></a>"],
		slideSpeed : 500,
		pagination : false
	});
	jQuery("#sub-products-slider .slider-items").owlCarousel({
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1024,3], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></a>","<a class=\"flex-next\"><i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i></a>"],
		slideSpeed : 500,
		pagination : false
	});


	jQuery("#best-seller-slider .slider-items").owlCarousel({
		items : 4, //10 items above 1000px browser width
		itemsDesktop : [1024,4], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : false,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : true
	});
	jQuery("#featured-product-slider .slider-items").owlCarousel({
		items : 4, //10 items above 1000px browser width
		itemsDesktop : [1024,4], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : false
	});


	jQuery("#bag-seller-slider .slider-items").owlCarousel({
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1024,3], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : false
	});
	jQuery("#bag-seller-slider1 .slider-items").owlCarousel({
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1024,3], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : false
	});

	jQuery("#featured-slider .slider-items").owlCarousel({
		items : 4, //10 items above 1000px browser width
		itemsDesktop : [1024,4], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : false
	});
	jQuery("#recommend-slider .slider-items").owlCarousel({
		items : 6, //10 items above 1000px browser width
		itemsDesktop : [1024,4], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : false
	});
	jQuery("#brand-logo-slider .slider-items").owlCarousel({
		autoplay : true,
		items : 6, //10 items above 1000px browser width
		itemsDesktop : [1024,4], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : false			
	});
	jQuery("#category-desc-slider .slider-items").owlCarousel({
		autoplay : true,
		items : 1, //10 items above 1000px browser width
		itemsDesktop : [1024,1], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : false			
	});
	jQuery("#more-views-slider .slider-items").owlCarousel({
		autoplay : true,
		items : 5, //10 items above 1000px browser width
		itemsDesktop : [1024,4], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : false
	});
	jQuery("#related-products-slider .slider-items").owlCarousel({
		items : 4, //10 items above 1000px browser width
		itemsDesktop : [1024,4], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : false
	});
	jQuery("#upsell-products-slider .slider-items").owlCarousel({
		items : 5, //10 items above 1000px browser width
		itemsDesktop : [1024,4], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 1000,
		pagination : false
		//autoPlay: true
	});
	jQuery("#more-views-slider .slider-items").owlCarousel({
		autoplay : true,
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1024,4], //5 items between 1024px and 901px
		itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0;
		itemsMobile : [320,1],
		navigation : true,
		navigationText : ["<a class=\"flex-prev\"></a>","<a class=\"flex-next\"></a>"],
		slideSpeed : 500,
		pagination : false
	});
	jQuery("ul.accordion li.parent, ul.accordion li.parents, ul#magicat li.open").each(function(){
		jQuery(this).append('<em class="open-close">&nbsp;</em>');
	});
	jQuery('ul.accordion, ul#magicat').accordionNew();
	jQuery("ul.accordion li.active, ul#magicat li.active").each(function(){
		jQuery(this).children().next("div").css('display','block');
	});


});


function slideEffectAjax() {
	var ww = $(window).width();
	if (ww > 960){
		$('.top-cart-contain').mouseenter(function() {
			$(this).find(".top-cart-content").stop(true, true).slideDown();
		});

		$('.top-cart-contain').mouseleave(function() {
			$(this).find(".top-cart-content").stop(true, true).slideUp();
		});
	} else {
		$('.top-cart-contain').click(function(){
			$(this).find(".top-cart-content").toggle(300);
		});
	}
}


$(document).ready(function(){
	slideEffectAjax();
});



/* Mega Menu */

var isTouchDevice = ('ontouchstart' in window) || (navigator.msMaxTouchPoints > 0);
jQuery(window).on("load", function() {
	if (isTouchDevice)
	{
		jQuery('#nav a.level-top').click(function(e) {
			$t = jQuery(this);
			$parent = $t.parent();
			if ($parent.hasClass('parent'))
			{
				if ( !$t.hasClass('menu-ready'))
				{                    
					jQuery('#nav a.level-top').removeClass('menu-ready');
					$t.addClass('menu-ready');
					return false;
				}
				else
				{
					$t.removeClass('menu-ready');
				}
			}
		});
	}
	//on load
	jQuery().UItoTop();
}); 

$(window).scroll(function() {
	if ($(this).scrollTop() > 1){  
		$('nav').addClass("sticky");
	}
	else{
		$('nav').removeClass("sticky");
	}
});

/* UItoTop */

(function($){
	jQuery.fn.UItoTop = function(options) {
		var defaults = {
			text: '',
			min: 200,
			inDelay:600,
			outDelay:400,
			containerID: 'toTop',
			containerHoverID: 'toTopHover',
			scrollSpeed: 1200,
			easingType: 'linear'
		};

		var settings = $.extend(defaults, options);
		var containerIDhash = '#' + settings.containerID;
		var containerHoverIDHash = '#'+settings.containerHoverID;
		jQuery('body').append('<a href="#" id="'+settings.containerID+'">'+settings.text+'</a>');
		jQuery(containerIDhash).hide().click(function(){
			jQuery('html, body').animate({scrollTop:0}, settings.scrollSpeed, settings.easingType);
			jQuery('#'+settings.containerHoverID, this).stop().animate({'opacity': 0 }, settings.inDelay, settings.easingType);
			return false;
		})
			.prepend('<span id="'+settings.containerHoverID+'"></span>')
			.hover(function() {
			jQuery(containerHoverIDHash, this).stop().animate({
				'opacity': 1
			}, 600, 'linear');
		}, function() { 
			jQuery(containerHoverIDHash, this).stop().animate({
				'opacity': 0
			}, 700, 'linear');
		});

		jQuery(window).scroll(function() {
			var sd = $(window).scrollTop();
			if(typeof document.body.style.maxHeight === "undefined") {
				jQuery(containerIDhash).css({
					'position': 'absolute',
					'top': $(window).scrollTop() + $(window).height() - 50
				});
			}
			if ( sd > settings.min ) 
				jQuery(containerIDhash).fadeIn(settings.inDelay);
			else 
				jQuery(containerIDhash).fadeOut(settings.Outdelay);
		});

	};
})(jQuery);


jQuery.extend( jQuery.easing,
			  {	
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},	
});

(function(jQuery){
	jQuery.fn.extend({
		accordion: function() {       
			return this.each(function() {

				function activate(el,effect){	
					jQuery(el).siblings( panelSelector )[(effect || activationEffect)](((effect == "show")?activationEffectSpeed:false),function(){
						jQuery(el).parents().show();	
					});	
				}	
			});
		}
	}); 
})
(jQuery);

jQuery(function($) {
	$('.accordion').accordion();	
	$('.accordion').each(function(index){
		var activeItems = $(this).find('li.active');
		activeItems.each(function(i){
			$(this).children('ul').css('display', 'block');
			if (i == activeItems.length - 1)
			{
				$(this).addClass("current");
			}
		});
	});

});

/*  Responsive Menu  */

(function($){
	$.fn.extend({	
		accordion: function(options) {	
			var defaults = {
				accordion: 'true',
				speed: 300,
				closedSign: '[+]',
				openedSign: '[-]'
			};	
			var opts = $.extend(defaults, options);	
			var $this = $(this);	
			$this.find("li").each(function() {
				if($(this).find("ul").size() != 0){
					$(this).find("a:first").after("<em>"+ opts.closedSign +"</em>");	
					//$(this).find("a:first").after("<em><i class=\"fa fa-angle-down\" aria-hidden=\"true\"></i></em>");	
					if($(this).find("a:first").attr('href') == "#"){
						$(this).find("a:first").click(function(){return false;});
					}
				}
			});	
			$this.find("li em").click(function() {
				if($(this).parent().find("ul").size() != 0){
					if(opts.accordion){
						//Do nothing when the list is open
						if(!$(this).parent().find("ul").is(':visible')){
							parents = $(this).parent().parents("ul");
							visible = $this.find("ul:visible");
							visible.each(function(visibleIndex){
								var close = true;
								parents.each(function(parentIndex){
									if(parents[parentIndex] == visible[visibleIndex]){
										close = false;
										return false;
									}
								});
								if(close){
									if($(this).parent().find("ul") != visible[visibleIndex]){
										$(visible[visibleIndex]).slideUp(opts.speed, function(){
											$(this).parent("li").find("em:first").html(opts.closedSign);
										});		
									}
								}
							});
						}
					}
					if($(this).parent().find("ul:first").is(":visible")){
						$(this).parent().find("ul:first").slideUp(opts.speed, function(){
							$(this).parent("li").find("em:first").delay(opts.speed).html(opts.closedSign);
						});	
					}else{
						$(this).parent().find("ul:first").slideDown(opts.speed, function(){
							$(this).parent("li").find("em:first").delay(opts.speed).html(opts.openedSign);
						});
					}
				}
			});
		}
	});
})(jQuery);

/* Sidebar Dropdown */

(function(jQuery){
	jQuery.fn.extend({
		accordionNew: function() {       
			return this.each(function() {	
				var jQueryul			= jQuery(this),
					elementDataKey			= 'accordiated',
					activeClassName			= 'active',
					activationEffect 		= 'slideToggle',
					panelSelector			= 'ul, div',
					activationEffectSpeed 	= 'fast',
					itemSelector			= 'li';	
				if(jQueryul.data(elementDataKey))
					return false;							
				jQuery.each(jQueryul.find('ul, li>div'), function(){
					jQuery(this).data(elementDataKey, true);
					jQuery(this).hide();
				});	
				jQuery.each(jQueryul.find('em.open-close'), function(){
					jQuery(this).click(function(e){
						activate(this, activationEffect);
						return void(0);
					});	
					jQuery(this).bind('activate-node', function(){
						jQueryul.find( panelSelector ).not(jQuery(this).parents()).not(jQuery(this).siblings()).slideUp( activationEffectSpeed );
						activate(this,'slideDown');
					});
				});	
				var active = (location.hash)?jQueryul.find('a[href=' + location.hash + ']')[0]:jQueryul.find('li.current a')[0];	
				if(active){
					activate(active, false);
				}	
				function activate(el,effect){	
					jQuery(el).parent( itemSelector ).siblings().removeClass(activeClassName).children( panelSelector ).slideUp( activationEffectSpeed );	
					jQuery(el).siblings( panelSelector )[(effect || activationEffect)](((effect == "show")?activationEffectSpeed:false),function(){	
						if(jQuery(el).siblings( panelSelector ).is(':visible')){
							jQuery(el).parents( itemSelector ).not(jQueryul.parents()).addClass(activeClassName);
						} else {
							jQuery(el).parent( itemSelector ).removeClass(activeClassName);
						}	
						if(effect == 'show'){
							jQuery(el).parents( itemSelector ).not(jQueryul.parents()).addClass(activeClassName);
						}	
						jQuery(el).parents().show();	
					});	
				}	
			});
		}
	}); 
})(jQuery);


$(document).ready(function() {
	var sync1 = $("#prd_view");
	var sync2 = $("#prd_view_thumbs");
	sync1.owlCarousel({
		singleItem: true,
		slideSpeed: 1000,
		navigation: true,
		pagination: false,
		navigationText: ["<i class=\"fa fa-caret-left\" aria-hidden=\"true\"></i>","<i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i>"],
		afterAction: syncPosition,
		responsiveRefreshRate: 200,
	});
	sync2.owlCarousel({
		items: 3,
		itemsDesktop: [1199, 3],
		itemsDesktopSmall: [979, 3],
		itemsTablet: [768, 2],
		itemsMobile: [479, 2],
		pagination: false,
		responsiveRefreshRate: 100,
		afterInit: function(el) {
			el.find(".owl-item").eq(0).addClass("synced");
		}
	});
	function syncPosition(el) {
		var current = this.currentItem;
		$("#prd_view_thumbs")
			.find(".owl-item")
			.removeClass("synced")
			.eq(current)
			.addClass("synced")
		if ($("#prd_view_thumbs").data("owlCarousel") !== undefined) {
			center(current)
		}
	}
	$("#prd_view_thumbs").on("click", ".owl-item", function(e) {
		e.preventDefault();
		var number = $(this).data("owlItem");
		sync1.trigger("owl.goTo", number);
	});
	function center(number) {
		var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
		var num = number;
		var found = false;
		for (var i in sync2visible) {
			if (num === sync2visible[i]) {
				var found = true;
			}
		}
		if (found === false) {
			if (num > sync2visible[sync2visible.length - 1]) {
				sync2.trigger("owl.goTo", num - sync2visible.length + 2)
			} else {
				if (num - 1 === -1) {
					num = 0;
				}
				sync2.trigger("owl.goTo", num);
			}
		} else if (num === sync2visible[sync2visible.length - 1]) {
			sync2.trigger("owl.goTo", sync2visible[1])
		} else if (num === sync2visible[0]) {
			sync2.trigger("owl.goTo", num - 1)
		}
	}
});

$(document).ready(function() {
	var owl = $("#owl-news-blog");
	owl.owlCarousel({
		autoPlay: 5000,
		pagination: false,
		navigation: false,
		navigationText: false,
		itemsCustom : [
			[0, 1],
			[450, 1],
			[600, 1],
			[700, 1],
			[1000, 1],
			[1200, 1],
			[1400, 1],
			[1600, 1]
		],
	});
	$(".next").click(function(){
		owl.trigger('owl.next');
	})
	$(".prev").click(function(){
		owl.trigger('owl.prev');
	})
});


jQuery(document).ready(function() {
	jQuery(".slideshowprobox_best_sale_products").jCarouselLite({
		auto: 1000,
		speed: 3000,
		visible: 4,
		vertical: true,
		hoverPause: 1
	});
});

jQuery(document).ready(function() {
	jQuery(".slideshowprobox_best_sale_products_mobile").jCarouselLite({
		auto: 1000,
		speed: 3000,
		visible: 4,
		vertical: true,
		hoverPause: 1
	});
});


$(document).ready(function() {
	var elements = $("input, select, textarea");
	for (var i = 0; i < elements.length; i++) {
		elements[i].oninvalid = function(e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity(e.target.getAttribute("requiredmsg"));
			}
		};
		elements[i].oninput = function(e) {
			e.target.setCustomValidity("");
		};
	}
})