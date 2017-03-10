// Biến khởi tạo
var view_collection = true;
var viewout = true;
var timeOut_modalCart;
var check_show_modal = true;
var timeOut_tabIndex;
var check_show_tabIndex = true;
var cur_scrollTop = 0;
if ( typeof(formatMoney) == 'undefined' ){
	formatMoney = '';
}
var check_header_fixTop = false;

// Change grid list in collection
function changeTemplate(element) {
	if ( $(element).hasClass('active') ) {

	} else {
		$('#event-grid > div:not(.icon-loading),.loadmore[data-load=true]').hide();
		$('.icon-loading').show();

		$('.btn-change-list').removeClass('active');
		$(element).addClass('active');
		if( $(element).attr('data-template') == 'template-list' ) {
			$('#event-grid').addClass('template-list');
		} else {
			$('#event-grid').removeClass('template-list');
		}
	}
	jQuery('#event-grid').imagesLoaded(function() {
		$('.icon-loading').hide();
		jQuery(window).resize();
		$('#event-grid > div:not(.icon-loading),.loadmore[data-load=true]').show();
	});
}

// Keyup find item in list filter collection
function filterItemInList(object) {
	q = object.val().toLowerCase();
	object.parent().next().find('li').show();
	if (q.length > 0) {
		object.parent().next().find('li').each(function() {
			if ($(this).find('label').attr("data-filter").indexOf(q) == -1)
				$(this).hide();
		})
	}
}

// Check owl item next/prev show or hide
function checkItemOwlShow(object,tab,a,b,c,d) {
	if ( tab == 'tab' ) {
		item = object.find('.active').find('.owl-carousel');
	} else {
		item = object.find('.owl-carousel');
	}	
	if ( item.find('.owl-item.active').length < a && $(window).width() >= 1200 ) {
		item.find('.owl-controls').hide();
	}
	if ( item.find('.owl-item.active').length < b && $(window).width() >= 992 && $(window).width() < 1199 ) {
		item.find('.owl-controls').hide();
	}
	if ( item.find('.owl-item.active').length < c && $(window).width() >= 768 && $(window).width() < 991 ) {
		item.find('.owl-controls').hide();
	}
	if ( item.find('.owl-item.active').length < d && $(window).width() < 768 ) {
		item.find('.owl-controls').hide();
	}
}

// Destroy resize image
function destroyResize(url){
	if ( url != undefined ) {
		if ( url.indexOf('_pico') != -1 || url.indexOf('_icon') != -1 || url.indexOf('_thumb') != -1
				|| url.indexOf('_small') != -1 || url.indexOf('_compact') != -1 || url.indexOf('_medium') != -1
				|| url.indexOf('_large') != -1 || url.indexOf('_grande') != -1 || url.indexOf('_1024x1024') != -1
				|| url.indexOf('_2048x2048') != -1 || url.indexOf('_master') != -1 ) {		
			link_image = (url.split('_')[url.split('_').length - 1]).split('.')[0];
			switch (link_image) {
				case 'pico': 
					link_image = url.split('_pico').join('').replace('http:','').replace('https:','');;
					break;
				case 'icon': 
					link_image = url.split('_icon').join('').replace('http:','').replace('https:','');;
					break;
				case 'thumb': 
					link_image = url.split('_thumb').join('').replace('http:','').replace('https:','');;
					break;
				case 'small':
					link_image = url.split('_small').join('').replace('http:','').replace('https:','');; 
					break;
				case 'compact': 
					link_image = url.split('_compact').join('').replace('http:','').replace('https:','');;
					break;
				case 'medium': 
					link_image = url.split('_medium').join('').replace('http:','').replace('https:','');;
					break;
				case 'large': 
					link_image = url.split('_large').join('').replace('http:','').replace('https:','');;
					break;
				case 'grande': 
					link_image = url.split('_grande').join('').replace('http:','').replace('https:','');;
					break;
				case '1024x1024': 
					link_image = url.split('_1024x1024').join('').replace('http:','').replace('https:','');;
					break;
				case '2048x2048': 
					link_image = url.split('_2048x2048').join('').replace('http:','').replace('https:','');;
					break;
				case 'master':
					link_image = url.split('_master').join('').replace('http:','').replace('https:','');;
					break;
			}
			return link_image;
		}
		return url;
	}
}



function clone_item(product){
	var item_product = jQuery('#clone-item-cart').find('.item_2');
	item_product.find('img').attr('src',Haravan.resizeImage(product.image,'small')).attr('alt', product.url);
	item_product.find('a').attr('href', product.url).attr('title', product.url);
	item_product.find('.pro-title-view').html(product.title);
	item_product.find('.pro-quantity-view').html('Số lượng: ' + product.quantity);
	item_product.find('.pro-price-view').html('Giá: ' + Haravan.formatMoney(product.price,formatMoney));
	item_product.clone().removeClass('hidden').prependTo('#cart-view');
}

// Delete variant in modalCart


// Update product in modalCart


// Add a product in checkout
var buy_now = function(id) {
	var quantity = 1;
	var params = {
		type: 'POST',
		url: '/cart/add.js',
		data: 'quantity=' + quantity + '&id=' + id,
		dataType: 'json',
		success: function(line_item) {
			window.location = '/checkout';
		},
		error: function(XMLHttpRequest, textStatus) {
			Haravan.onError(XMLHttpRequest, textStatus);
		}
	};
	jQuery.ajax(params);
}

// Add a product in cart
var add_item = function(id) {
	var quantity = 1;
	var params = {
		type: 'POST',
		url: '/cart/add.js',
		data: 'quantity=' + quantity + '&id=' + id,
		dataType: 'json',
		success: function(line_item) {
			window.location = '/cart';
		},
		error: function(XMLHttpRequest, textStatus) {
			Haravan.onError(XMLHttpRequest, textStatus);
		}
	};
	jQuery.ajax(params);
}

// Add a product and show modal cart


// Plus number quantiy product detail 
var plusQuantity = function() {
	if ( jQuery('input[name="quantity"]').val() != undefined ) {
		var currentVal = parseInt(jQuery('input[name="quantity"]').val());
		if (!isNaN(currentVal)) {
			jQuery('input[name="quantity"]').val(currentVal + 1);
		} else {
			jQuery('input[name="quantity"]').val(1);
		}
	}else {
		console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
	}
}

// Minus number quantiy product detail 
var minusQuantity = function() {
	if ( jQuery('input[name="quantity"]').val() != undefined ) {
		var currentVal = parseInt(jQuery('input[name="quantity"]').val());
		if (!isNaN(currentVal) && currentVal > 1) {
			jQuery('input[name="quantity"]').val(currentVal - 1);
		}
	}else {
		console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
	}
}

// Change handleize
var slug = function(str) {
	str = str.toLowerCase();
	str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
	str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
	str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
	str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
	str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
	str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
	str = str.replace(/đ/g, "d");
	str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
	str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1- 
	str = str.replace(/^\-+|\-+$/g, "");
	return str;
}

// Resize image article thumb for blog home
var imageThumbResize = function(){
	if ( jQuery('.lists-thumb-resize .box-thumb-resize').length > 1 ) {
		var height_thumb_resize = 0;
		jQuery.each(jQuery('.lists-thumb-resize .box-thumb-resize'),function(i,v){
			if ( jQuery(this).find('.image-thumb-resize').height() > height_thumb_resize ) {
				height_thumb_resize = jQuery(this).find('.image-thumb-resize').height();
			}
		});
		jQuery('.lists-thumb-resize .box-thumb-resize .image-thumb-resize').css('height',height_thumb_resize);
	}
}
// Resize image article thumb for blog home
var imageBlogResize = function(){
	if ( jQuery('.lists-blog-resize').length > 1 ) {
		var height_blog_resize = 0;
		jQuery.each(jQuery('.lists-blog-resize .image-blog-resize'),function(i,v){
			if ( jQuery(this).height() > height_blog_resize ) {
				height_blog_resize = jQuery(this).height();
			}
		});
		jQuery('.lists-blog-resize .image-blog-resize').css('height',height_blog_resize);
	}
}

jQuery(document).ready(function(){
	jQuery('.product-comments .tab-content > div').eq(0).addClass('active');

	// Menu sidebarleft
	$('#menusidebarleft li a').click(function(e){
		if ( $(this).parent('li').attr('aria-expanded') == 'false' ) {
			e.preventDefault();
			if ( $(this).parent('.submenu-parent').length > 0 ) {
				$(this).parent('.submenu-parent').parent('ul').find('li.submenu-parent,li.submenu-children').attr('aria-expanded','false').children('ul').slideUp();

			} else {
				if ( $(this).parent('.submenu-children').length > 0 ) {
					$(this).parent('.submenu-children').parent('ul').children('li.submenu-parent,li.submenu-children').attr('aria-expanded','false').children('ul').slideUp();
				}
			}
			$(this).parent('li').attr('aria-expanded','true');
			$(this).nextAll(".dropdown-menu").slideDown();
			$(this).next('ul').slideDown();			
		} else {
			$(this).nextAll(".dropdown-menu").slideUp();
			$(this).parent('li').attr('aria-expanded','false');
		}
	});

	// Menu mobile
	new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
		type : 'cover'
	});

	// Scroll Top
	jQuery(document).on("click", ".back-to-top", function(){
		jQuery(this).removeClass('display');
		jQuery('html, body').animate({
			scrollTop: 0			
		}, 600);
	});

	// Event click dropdown catalog mobile
	jQuery(document).on("click", ".event-drop-list", function(){
		if ( jQuery(this).hasClass('fa-angle-up') ){
			jQuery(this).removeClass('fa-angle-up').addClass('fa-angle-down');
			jQuery(this).parents('.box-section-collection').find('.catalog-list').css('margin-bottom','0px').slideUp('normal');		
		}else {
			jQuery(this).removeClass('fa-angle-down').addClass('fa-angle-up');
			jQuery(this).parents('.box-section-collection').find('.catalog-list').css('margin-bottom','10px').slideDown('normal');
		}
	});

	// Add attribute data-spy=scroll in element <a> when you click, it'll scroll to href="#abc"
	jQuery(document).on("click", "a[data-spy=scroll]", function(e) {
		e.preventDefault();
		jQuery('body').animate({scrollTop: (jQuery(jQuery(this).attr('href')).offset().top - 70) + 'px'}, 500);
	});

	// Add a product when you change variant in cart ( product detail )
	jQuery(document).on("click", "#buy-now", function(e) {
		e.preventDefault() ;
		var params = {
			type: 'POST',
			url: '/cart/add.js',
			data: jQuery('#add-item-form').serialize(),
			dataType: 'json',
			success: function(line_item) {
				window.location = '/checkout';
			},
			error: function(XMLHttpRequest, textStatus) {
				Haravan.onError(XMLHttpRequest, textStatus);
			}
		};
		jQuery.ajax(params);
	});

	// Active image thumb and change image featured ( product detail )
	jQuery(document).on("click", ".product-thumb img", function() {
		jQuery('.product-thumb').removeClass('active');
		jQuery(this).parents('.product-thumb').addClass('active');
		jQuery(".product-image-feature").attr("src",jQuery(this).attr("data-image"));
		jQuery(".product-image-feature").attr("data-zoom-image",jQuery(this).attr("data-zoom-image"));
	});

	// Click change slide next image featured ( product detail )
	jQuery(document).on("click", ".slide-next", function() {
		if(jQuery(".product-thumb.active").prev().length > 0){
			jQuery(".product-thumb.active").prev().find('img').click();
		}
		else{
			jQuery(".product-thumb:last img").click();
		}
	});

	// Click change slide prev image featured ( product detail )
	jQuery(document).on("click", ".slide-prev", function() {
		if(jQuery(".product-thumb.active").next().length > 0){
			jQuery(".product-thumb.active").next().find('img').click();
		}
		else{
			jQuery(".product-thumb:first img").click();
		}
	});

	// Menu breadcrumb
	jQuery(document).on("hover", ".dropdown-link-breadcrumb li,.box-menu-collection li", function(e) {
		jQuery(this).toggleClass('open');
	});

	// Change group box search in header
	jQuery(document).on("click", ".change-collection-id > li > a", function() {
		jQuery(this).parents('.group-collection-search').children('button').attr('data-id',$(this).attr('data-collectionid')).html(jQuery(this).html() + "<span class='caret'></span>");
	});

	// Hover show group collection in header fix scroll
	jQuery(document).on("hover", ".fix-menu-collection .title-danh-muc", function(e) {
		if (e.type === "mouseenter") { 
			jQuery('ul.dropdown-menu.box-menu-collection').slideDown(300);
		} else if (e.type === "mouseleave") { 
			setTimeout(function(){
				if ( view_collection ) {		
					jQuery('ul.dropdown-menu.box-menu-collection').slideUp(300);
				}
			},600);
		}
	});
	jQuery(document).on("hover", "ul.dropdown-menu.box-menu-collection", function(e) {
		if (e.type === "mouseenter") { 
			view_collection = false;
		} else if (e.type === "mouseleave") { 
			view_collection = true;
			jQuery('ul.dropdown-menu.box-menu-collection').slideUp(300);
		}
	});

	// Cart header hover
	jQuery('.cart-link').hover(function() {
		jQuery('.cart-view').slideDown(200);
	}, function() {
		setTimeout(function() {
			if (viewout) jQuery('.cart-view').slideUp(200);
		}, 500)
	})
	jQuery('.cart-view').hover(function() {
		viewout = false;
	}, function() {
		viewout = true;
		jQuery('.cart-view').slideUp(100);
	})

	// Click active icon index 
	jQuery(document).on("click", "#category_icon_floor li", function() {
		jQuery('#category_icon_floor li.active');
		jQuery('#category_icon_floor li').removeClass('active');
		jQuery(this).addClass('active');
	});

	// Event slider
	var owl_data = jQuery("#slider-menu .owl-carousel").data('owlCarousel');
	jQuery('#slider-thumb li .slider-image-thumb').click(function(){
		jQuery(this).parent('li').addClass('click-event');
		jQuery('#slider-thumb li').removeClass('active');
		jQuery(this).parent('li').addClass('active');
		var index = jQuery(this).parent('li').index();
		owl_data.to(index);
	});

	jQuery('#slider-thumb li').hover(
		function(){
			var index = jQuery(this).index();
			var obj = jQuery(this);
			if( obj.hasClass('click-event') ){
			} else {
				obj.addClass('click-event');
				jQuery('#slider-thumb li').removeClass('active');
				obj.addClass('active');
				owl_data.to(index);
			}
		},
		function(){
			var index = jQuery(this).index();
			var obj = jQuery(this);
		}
	);

	// Fix height image for blog home
	imageThumbResize();
	imageBlogResize();

	// Ajax get product in collection for page home
	$('#ajax-tab-collection').tabdrop({text: '<i class="fa fa-bars"></i>'});
	$('#tab-product-template').tabdrop({text: '<i class="fa fa-bars"></i>'});

	jQuery(document).on("click", "#ajax-tab-collection > li:not(.tabdrop), #ajax-tab-collection li .dropdown-menu > li", function(e) {
		var handle = jQuery(this).children('a').attr('data-handle');
		jQuery('.tabs-products .tab-item.active').find('.icon-loading.tab-index').show();
		if ( jQuery('.tabs-products .tab-item.active').attr('data-get') == 'false' && handle != '' ) {
			jQuery.ajax({
				url: 'collections/' + handle + '?view=filter-tab-home&page=1',
				success:function(data){
					$('.icon-loading.tab-index').hide();
					jQuery('.tabs-products .tab-item.active').attr('data-get','true').children('.owl-carousel').append(data);						
					jQuery('.tabs-products .tab-item.active').imagesLoaded(function() {
						var owl_tab = jQuery('.tabs-products .tab-item.active .owl-carousel');
						owl_tab.owlCarousel({
							items:6,
							nav:true,
							loop: true,
							responsive:{
								0:{
									items:2								
								},
								768:{
									items:3
								},
								992:{
									items:5
								},
								1200:{
									items:6
								}
							}
						});
						owl_tab.find('.owl-next').css({"position":"absolute","right":"5px","top":"40%"}).html("<img src='http://hstatic.net/851/1000080851/1000118934/btn-arrow-right.png?v=71' />");
						owl_tab.find('.owl-prev').css({"position":"absolute","left":"5px","top":"40%"}).html("<img src='http://hstatic.net/851/1000080851/1000118934/btn-arrow-left.png?v=71' />");
						checkItemOwlShow($('.tabs-products'),'tab',6,5,3,2);
					});
					jQuery(window).resize();
				}
			});
		}
		jQuery('.tabs-products .tab-item.active').find('.icon-loading.tab-index').hide();
		if ( jQuery('.tabs-products .tab-item.active').attr('data-get') == 'false' && handle == '' ) {				
			jQuery('.tabs-products .tab-item.active').attr('data-get','true').children('.owl-carousel').removeClass('product-lists').show().append("<div class='alertNoProduct'>Hiện tại cửa hàng mình đang cập nhật dữ liệu</div>");
		}
	});

	// Scroll show icon section index
	jQuery(window).on("scroll", function() {		
		/* Process scroll header top  */		 
		if ( jQuery(window).width() >= 768 ) {	
			if( jQuery(window).scrollTop() > 0 ) {			
				jQuery('header').addClass('fix-header');
				jQuery('header').removeClass("translateY");
			} else {
				jQuery('header').removeClass("fix-header");
			}
			if ( cur_scrollTop > jQuery(window).scrollTop() ) {
				jQuery('header').addClass('translateY');
			}
		} else {
			if( jQuery(window).scrollTop() > 0 ) {			
				jQuery('nav.navbar-main.navbar').addClass('affix-mobile');
			} else {
				jQuery('nav.navbar-main.navbar').removeClass("affix-mobile");
			}
			if ( cur_scrollTop > jQuery(window).scrollTop() ) {
				jQuery('nav.navbar-main.navbar').removeClass('affix-mobile');
			}
		}
		cur_scrollTop = jQuery(window).scrollTop();
		/* Process scroll btn addtocart in product */
		if ( jQuery('.btn-position').length > 0 && $(window).width() > 767 ) {
			if( jQuery(window).scrollTop() > jQuery('.addtocart-modal').offset().top ) {
				jQuery('.btn-position').show('slow');
			}else {
				jQuery('.btn-position').hide('slow');
			}
		}
		/* Scroll to top */
		if ( jQuery('.back-to-top').length > 0 && jQuery(window).scrollTop() > 500 ) {
			jQuery('.back-to-top').addClass('display');
		} else {
			jQuery('.back-to-top').removeClass('display');
		}
	});


	/******* Event searchbox with collection *******/
	// jQuery('.btn-searchbox').click(function(e){
	// 	e.preventDefault();
	// 	if ($('#dropdown-collection').attr('data-id') == undefined) {
	// 		window.location = '/search?q=filter=((collectionid:product>0)&&(title:product**' + $(this).parents('form').find('input[name=q]').val() + '))' ;
	// 	} else {
	// 		window.location = '/search?q=filter=((collectionid:product=' + $('#dropdown-collection').attr('data-id') + ')&&(title:product**' + $(this).parents('form').find('input[name=q]').val() + '))' ;
	// 	}		
	// });

});








