/*
*
* 2015 Apollo Theme
*
*/
var pattern = {"ä|æ|ǽ": "ae", "ö|œ": "oe", "ü": "ue", "à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª": "a", "ç|ć|ĉ|ċ|č": "c", "ĝ|ğ|ġ|ģ": "g", "ĥ|ħ": "h", "ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı": "i", "ĵ": "j", "ķ": "k", "ĺ|ļ|ľ|ŀ|ł": "l", "ñ|ń|ņ|ň|ŉ": "n", "ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º": "o", "/ŕ|ŗ|ř": "r", "ś|ŝ|ş|š|ſ": "s", "è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ": "e", "ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ": "u", "ý|ÿ|ŷ": "y", "ì|í|ị|ỉ|ĩ": "i", "ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ": "o", "ỳ|ý|ỵ|ỷ|ỹ": "y", "đ": "d"};
function slugify(str) {
  str = str.replace(/^\s+|\s+$/g, '');
  str = str.toLowerCase();
  $.each(pattern, function(k) {
      var arr = k.split("|");
      var val = pattern[k];
      var len = arr.length;
      for(var i = 0 ; i < len; i++) {
               str = str.replace(new RegExp(arr[i], 'g'), val);
      }
  });
  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

  return str;
}

var responsiveflag = false;
var loadIcon = "//hstatic.net/470/1000036470/1000066366/loading.gif?v=657";
new WOW().init({offset:50});
$(document).ready(function() {
  	initApollo();
	initQuickView();
    initWishlist();
	responsiveResize();
  	productImage();
	$(window).resize(responsiveResize);
  	responsiveProductZoom();
	offCanvas();
	floatHeader();
	floatTopbar();
	backtotop();
	changeFloatHeader();
	changeLayoutMode();
	changeHeaderStyle();
	addFilterEffect();
  	accordionNewletter('enable');

		panelTool();

});
function replaceUrlParam(url, paramName, paramValue) {
    var pattern = new RegExp('('+paramName+'=).*?(&|$)'),
        newUrl = url.replace(pattern,'$1' + paramValue + '$2');
    if ( newUrl == url ) {
        newUrl = newUrl + (newUrl.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue;
    }
    return newUrl;
}
function initApollo() {
	$(".swatch :radio").change(function() {
      	var t = $(this).closest(".swatch").attr("data-option-index");
      	var n = $(this).val();
      	$(this).closest("form").find(".single-option-selector").eq(t).val(n).trigger("change")
    });
  	$(".hover-bimg").mouseenter(function() {
  		$(this).closest('.product-image-container').find('.product_img_link').first().find('img').first().attr('src', $(this).data('bimg'));
	});
    $(".nav-verticalmenu .caret").click(function(e) {
		$(this).closest("li").toggleClass("menu-open");
		e.stopPropagation();
	});
}


function initWishlist(){
  	if (window.wishlist_enable) {
        $(".wishlist button.btn-wishlist").click(function(e){
            e.preventDefault();
            var d = $(this).parent();
            $.ajax({
                type:"POST",
                url:"/contact",
                data:d.serialize(),
                beforeSend:function(){

                },
                success:function(n){
                    d.html('<a class="btn btn-outline-inverse btn-wishlist" href="'+ window.wishlist_url +'"><i class="fa fa-heart"></i><span>Tới mục Ưa thích</span></a>');
                    if (!!$.prototype.fancybox)
                        $.fancybox.open([{
                            type: 'inline',
                            autoScale: true,
                            minHeight: 30,
                            content: '<p class="fancybox-error">' + 'Đã được thêm vào mục Ưa thích.' + '</p>'
                        }], {
                            padding: 0
                        });
                    else
                        alert('Đã được thêm vào mục Ưa thích.');
                },
                error:function(){

                }
            })
        });
    }
}
function accordionNewletter(status){
 	if(status == 'enable') {
       	if(!$('#newsletter_block').hasClass('accordion')){
          	$('#newsletter_block .title_block').on('click', function(){
              	$(this).toggleClass('active').parent().find('.block_content').stop().slideToggle('medium');
          	})
        }
  		$('#newsletter_block').addClass('accordion').find('.block_content').slideUp('fast');
 	}
 	else {
  		$('#newsletter_block .title_block').removeClass('active').off().parent().find('.block_content').removeAttr('style').slideDown('fast');
  		$('#newsletter_block').removeClass('accordion');
 	}
}
var product = {};
var currentLinkQuickView = '';
var option1 = '';
var option2 = '';
function setButtonNavQuickview() {
  	$("#quickview-nav-button a").hide();
  	$("#quickview-nav-button a").attr("data-index", "");
  	var listProducts = $(currentLinkQuickView).closest(".slide").find("a.quick-view");
  	if(listProducts.length > 0) {
    	var currentPosition = 0;
    	for(var i = 0; i < listProducts.length; i++) {
      		if($(listProducts[i]).data("handle") == $(currentLinkQuickView).data("handle")) {
        		currentPosition = i;
        		break;
      		}
        }
    	if(currentPosition < listProducts.length - 1) {
      		$("#quickview-nav-button .btn-next-product").show();
      		$("#quickview-nav-button .btn-next-product").attr("data-index", currentPosition + 1);
    	}
    	if(currentPosition > 0) {
      		$("#quickview-nav-button .btn-previous-product").show();
      		$("#quickview-nav-button .btn-previous-product").attr("data-index", currentPosition - 1);
    	}
    }
  	$("#quickview-nav-button a").click(function() {
  		$("#quickview-nav-button a").hide();
    	var indexLink = parseInt($(this).data("index"));
    	if(!isNaN(indexLink) && indexLink >= 0) {
      		var listProducts = $(currentLinkQuickView).closest(".slide").find("a.quick-view");
      		if(listProducts.length > 0 && indexLink < listProducts.length) {
          		//$(".quickview-close").trigger("click");
      			$(listProducts[indexLink]).trigger("click");
        	}
    	}
  	});
}
function initQuickView(){
	if (window.quickview_enable){
      	$(document).on("click", "#thumblist_quickview li", function() {
            changeImageQuickView($(this).find("img:first-child"), "#product-featured-image-quickview");
        });
		$(document).on('click', '.quick-view', function(e){
			var producthandle = $(this).data("handle");
          	currentLinkQuickView = $(this);
			QM.getProduct(producthandle,function(product) {
				var qvhtml = $("#quickview-modal").html();
				$(".quick-view-product").html(qvhtml);
				var quickview= $(".quick-view-product");
				var productdes = product.description.replace(/(<([^>]+)>)/ig,"");
				var featured_image = product.featured_image;
              	//Reset current link quickview and button navigate in Quickview - Disable
              	//setButtonNavQuickview();
				productdes = productdes.split(" ").splice(0,30).join(" ")+"...";
				quickview.find(".view_full_size img").attr("src",featured_image);
				quickview.find(".view_full_size img").attr("alt",product.title);
              	quickview.find(".view_full_size a").attr("title",product.title);
              	quickview.find(".view_full_size a").attr("href",product.url);

				quickview.find(".price").html(QM.formatMoney(product.price, window.money_format));
				quickview.find(".price").data("price",product.price);
                quickview.find(".product-item").attr("id", "product-" + product.id);
                quickview.find(".variants").attr("id", "product-actions-" + product.id);
				quickview.find(".variants select").attr("id", "product-select-" + product.id);

				quickview.find(".product-info .qwp-name").text(product.title);
              	quickview.find(".product-info .brand").append("<span>Người bán: </span>" + product.vendor);
                if(product.available){
                  	quickview.find(".product-info .availability").append("<p class=\"available instock\">Còn Hàng</p>");
                }else{
                  	quickview.find(".product-info .availability").append("<p class=\"available outstock\">Hết Hàng</p>");
                }
				quickview.find(".product-info .product-sku").append("<p>Mã Sản Phẩm: <span>"+product.variants[0].sku+"</span></p>");
				quickview.find(".product-description").text(productdes);



                if (product.compare_at_price > product.price) {
                    quickview.find(".compare-price").html(QM.formatMoney(product.compare_at_price_max, window.money_format)).show();
                    quickview.find(".price").addClass("on-sale")
                }
                else {
                    quickview.find(".compare-price").html("");
                    quickview.find(".price").removeClass("on-sale")
                }
                if (!product.available) {
                    quickview.find("select, input, .dec, .inc, .variants label").remove();
                    quickview.find(".add_to_cart_detail").text("Sold Out").addClass("disabled").attr("disabled", "disabled");
                  	$(".quantity_wanted_p").css("display", "none");
                }
                else {
                  	quickViewVariantsSwatch(product, quickview);
                }
                $("#quick-view-product").fadeIn(500);

                $(".view_scroll_spacer").removeClass("hidden");
                loadQuickViewSlider(product, quickview);

                $(".quick-view").fadeIn(500);
                if ($(".quick-view .total-price").length > 0) {
                  	$(".quick-view input[name=quantity]").on("change", updatePricingQuickView)
                }
              	updatePricingQuickView();
              	// Setup listeners to add/subtract from the input
                $(".js-qty__adjust").on("click", function() {
                  	var el = $(this),
                      	id = el.data("id"),
                      	qtySelector = el.siblings(".js-qty__num"),
                      	qty = parseInt(qtySelector.val().replace(/\D/g, ''));
                  	var qty = validateQty(qty);
                  	// Add or subtract from the current quantity
                  	if (el.hasClass("js-qty__adjust--plus")) {
                    	qty = qty + 1;
                  	} else {
                    	qty = qty - 1;
                    	if (qty <= 1) qty = 1;
                  	}
                  	// Update the input's number
                  	qtySelector.val(qty);
                  	updatePricingQuickView();
                });
                $(".js-qty__num").on("change", function() {
                  	updatePricingQuickView();
                });
			});
			return false;
		});
	}
}
function loadQuickViewSlider(n, r) {
    productImage();
    var loadingImgQuickView = $('.loading-imgquickview');
    var s = QM.resizeImage(n.featured_image, "grande");
    r.find(".quickview-featured-image").append('<a href="' + n.url + '"><img src="' + s + '" title="' + n.title + '"/><div style="height: 100%; width: 100%; top:0; left:0 z-index: 2000; position: absolute; display: none; background: url(' + window.loading_url + ') 50% 50% no-repeat;"></div></a>');
    if (n.images.length > 0) {
        var o = r.find(".more-view-wrapper ul");
        for (i in n.images) {
            var u = QM.resizeImage(n.images[i], "grande");
            var a = QM.resizeImage(n.images[i], "compact");
            var f = '<li><a href="javascript:void(0)" data-imageid="' + n.id + '" data-image="' + n.images[i] + '" data-zoom-image="' + u + '" ><img src="' + a + '" alt="Proimage" /></a></li>';
            o.append(f)
        }
        o.find("a").click(function() {
            var t = r.find("#product-featured-image-quickview");
            if (t.attr("src") != $(this).attr("data-image")) {
                t.attr("src", $(this).attr("data-image"));
                loadingImgQuickView.show();
                t.load(function(t) {
                    loadingImgQuickView.hide();
                    $(this).unbind("load");
                    loadingImgQuickView.hide()
                })
            }
        });
        o.owlCarousel({
            navigation: true,
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
            itemsTablet: [768, 3],
            itemsTabletSmall: [540, 3],
            itemsMobile: [360, 3]
        }).css("visibility", "visible")
    } else {
        r.find(".quickview-more-views").remove();
        r.find(".quickview-more-view-wrapper-jcarousel").remove()
    }
}
function updateQuantity(){
	$('.js-qty__adjust').on('click', function() {
		var el = $(this),
			id = el.data('id'),
			qtySelector = el.siblings('.js-qty__num'),
            qty = parseInt(qtySelector.val().replace(/\D/g, ''));

        var qty = validateQty(qty);

        // Add or subtract from the current quantity
        if (el.hasClass('js-qty__adjust--plus')) {
          qty = qty + 1;
        } else {
          qty = qty - 1;
          if (qty <= 1) qty = 1;
        }

        // Update the input's number
        qtySelector.val(qty);
      	updatePricing();
  	});
}
validateQty = function (qty) {
    // Make sure we have a valid integer
    if((parseFloat(qty) == parseInt(qty)) && !isNaN(qty)) {
      // We have a number!
    } else {
      // Not a number. Default to 1.
      qty = 1;
    }
    return qty;
	};
var convertToSlug = function (e) {
    return e.toLowerCase().replace(/[^a-z0-9 -]/g, "").replace(/\s+/g, "-").replace(/-+/g, "-")
}
var selectCallback = function(variant, selector) {

};

// $(document).on('click', '.quick-view', function(e){
// 	e.preventDefault();
// });
$(document).on('click', '.quickview-close, #quick-view-product .quickview-overlay', function(e){
	$("#quick-view-product").fadeOut(500);
});
function displayImage(domAAroundImgThumb)
{
	if (domAAroundImgThumb.attr('href'))
	{
		var new_src = domAAroundImgThumb.attr('href').replace('1024x1024', 'large');
		var new_title = domAAroundImgThumb.attr('title');
		var new_href = domAAroundImgThumb.attr('href');
		if ($('#bigpic').attr('src') != new_src)
		{
			$('#bigpic').attr({
				'src' : new_src,
				'alt' : new_title,
				'title' : new_title
			});
		}
		$('#views_block li a').removeClass('shown');
		$(domAAroundImgThumb).addClass('shown');
	}
}
function productZoom(status){
  	if(status == 'enable') {
  		$("#proimage").elevateZoom({

          	zoomType: "inner",
            cursor: 'crosshair',

            gallery:'thumbs_list',
            galleryActiveClass: 'active',
            imageCrossfade: true,
          	scrollZoom : true,
          	onImageSwapComplete: function() {
              	$(".zoomWrapper div").hide()
            },
            loadingIcon: loadIcon
        });
        $("#proimage").bind("click", function(e) {
            var ez = $('#proimage').data('elevateZoom');
            $.fancybox(ez.getGalleryList());
            return false;
        });
    }
  	else{
    	$(document).on('click', '#thumblist .thumb_item a', function(){
            if ($(this).attr('href'))
            {
                var new_src = $(this).data('image');
                var new_title = $(this).attr('title');
                var new_href = $(this).attr('href');
                if ($('#proimage').attr('src') != new_src)
                {
                    $('#proimage').attr({
                        'src' : new_src,
                        'alt' : new_title,
                        'title' : new_title
                    });
                }
            }
        });
    }

}
function productImage() {
	$('#thumblist').owlCarousel({
        navigation: true,
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 4],
        itemsTablet: [768, 4],
        itemsTabletSmall: [540, 4],
        itemsMobile: [360, 4]
    });
    $('.thumbs_list_frame').height(parseInt($('.thumbs_list_frame >li').outerHeight(true) * $('.thumbs_list_frame >li').height) + 'px');
    $('.thumbs_list').serialScroll({
        items:'li:visible',
        prev:'.view_scroll_left',
        next:'.view_scroll_right',
        axis:'y',
        start:0,
        stop:true,
        duration:700,
        step: 2,
        lazy: true,
        lock: false,
        force:false,
        cycle:false
    });
	if (!!$.prototype.fancybox){
		$('li:visible .fancybox, .fancybox.shown').fancybox({
			'hideOnContentClick': true,
			'openEffect'	: 'elastic',
			'closeEffect'	: 'elastic'
		});
	}
}
function scrollCompensate()
{
    var inner = document.createElement('p');
    inner.style.width = "100%";
    inner.style.height = "200px";

    var outer = document.createElement('div');
    outer.style.position = "absolute";
    outer.style.top = "0px";
    outer.style.left = "0px";
    outer.style.visibility = "hidden";
    outer.style.width = "200px";
    outer.style.height = "150px";
    outer.style.overflow = "hidden";
    outer.appendChild(inner);

    document.body.appendChild(outer);
    var w1 = inner.offsetWidth;
    outer.style.overflow = 'scroll';
    var w2 = inner.offsetWidth;
    if (w1 == w2) w2 = outer.clientWidth;

    document.body.removeChild(outer);

    return (w1 - w2);
}
function responsiveResize()
{
	compensante = scrollCompensate();
	if (($(window).width()+scrollCompensate()) <= 767 && responsiveflag == false)
	{

      		accordion('enable');

	    accordionFooter('enable');
		responsiveflag = true;
	}
	else if (($(window).width()+scrollCompensate()) >= 768)
	{
		accordion('disable');
		accordionFooter('disable');
	    responsiveflag = false;
	}
}
function responsiveProductZoom()
{
	if (($(window).width()) >= 992){
    	productZoom('enable');
    }
  	else if (($(window).width()) <= 991){
  		productZoom('disable');
    }
}
function offCanvas(){
	$('[data-toggle="offcanvas"]').click(function () {
	    var menuCanvas = $(this).data('target');
	    $(this).toggleClass('open');
	    $(menuCanvas).toggleClass('active');
	    $('body').toggleClass('off-canvas-active');
	    var heightCanvas = $(window).height();
	    $(menuCanvas).css({'min-height' : heightCanvas});
  	});
  	$('.off-canvas-nav').click(function () {
  		$('[data-toggle="offcanvas"]').click();
  	});
}
function accordion(status)
{
 	leftColumnBlocks = $('#left_column');
 	if(status == 'enable')
 	{
      	if(!$('#left_column').hasClass('accordion')){
        	$('#left_column .block .title_block').on('click', function(){
   				$(this).toggleClass('active').parent().find('.block_content').stop().slideToggle('medium');
  			});
      	}
      	if(!$('#right_column').hasClass('accordion')){
        	$('#right_column .block .title_block').on('click', function(){
   				$(this).toggleClass('active').parent().find('.block_content').stop().slideToggle('medium');
  			});
      	}
      	$('#left_column').addClass('accordion').find('.block .block_content').slideUp('fast');
  		$('#right_column').addClass('accordion').find('.block .block_content').slideUp('fast');
 	}
 	else
 	{
  		$('#right_column .block .title_block, #left_column .block .title_block').removeClass('active').off().parent().find('.block_content').removeAttr('style').slideDown('fast');
  		$('#left_column, #right_column').removeClass('accordion');
 	}
}
function accordionFooter(status){
 	if(status == 'enable') {
       	if(!$('#footercenter').hasClass('accordion')){
          	$('#footercenter .footer-block h4').on('click', function(){
              	$(this).toggleClass('active').parent().find('.block_content').stop().slideToggle('medium');
          	})
        }
  		$('#footercenter').addClass('accordion').find('.block_content').slideUp('fast');
 	}
 	else {
  		$('.footer-block h4').removeClass('active').off().parent().find('.block_content').removeAttr('style').slideDown('fast');
  		$('#footercenter').removeClass('accordion');
 	}
}
function processFloatHeader(headerAdd, scroolAction){
	if(headerAdd){
		$("#header").addClass( "navbar-fixed-top" );
	    $("#page").css( "padding-top", $("#header").height());
	    var hideheight =  $("#header").height()+120;
	    var pos = $(window).scrollTop();
	    if( scroolAction && pos >= hideheight ){
	        $("#topbar").addClass('hide-bar');
	        $(".hide-bar").css( "margin-top", - $("#topbar").height() );
	    }else {
	        $("#topbar").css( "margin-top", 0 );
	    }
	}else{
		$("#header").removeClass( "navbar-fixed-top" );
	    $("#page").css( "padding-top", '');
        $("#header-main").removeClass('hidden');
        $("#apollo-menu").removeClass('hidden');
        $("#topbar").css( "margin-top", 0 );

	}

}
function processFloatTopbar(topbarAdd, scroolAction){
	if(topbarAdd){
		$("#header").addClass( "navbar-fixed-top" );
	    $("#page").css( "padding-top", $("#header").height());
	    var hideheightBar =  $("#header").height()+120;
	    var pos = $(window).scrollTop();
	    if( scroolAction && pos >= hideheightBar ){
	        $("#header-main").addClass('hidden');
			$("#apollo-menu").addClass('hidden');
	    }else {
	        $("#header-main").removeClass('hidden');
	        $("#apollo-menu").removeClass('hidden');
	    }
	}else{
		$("#header").removeClass("navbar-fixed-top");
	    $("#page").css( "padding-top", '');
	    $("#header-main").removeClass('hidden');
	    $("#apollo-menu").removeClass('hidden');
        $("#topbar").css( "margin-top", 0 );
	}

}
function floatHeader(){
	$(window).resize(function(){
		if (!$("body").hasClass("keep-header") || $(window).width() <= 990){
			return;
		}
		if ($(window).width() <= 990)
		{
			processFloatHeader(0,0);
		}
		else if ($(window).width() > 990)
		{
			if ($("body").hasClass("keep-header"))
				processFloatHeader(1,1);
		}
	});
    $(window).scroll(function() {
    	if (!$("body").hasClass("keep-header")) return;
    	if($(window).width() > 990){
	         processFloatHeader(1,1);

    	}
    });
}
function floatTopbar(){
	$(window).resize(function(){
		if (!$("body").hasClass("keep-topbar") || $(window).width() <= 990){
			return;
		}
		if ($(window).width() <= 990)
		{
			processFloatTopbar(0,0);
		}
		else if ($(window).width() > 990)
		{
			if ($("body").hasClass("keep-topbar"))
				processFloatTopbar(1,1);
		}
	});
    $(window).scroll(function() {
    	if (!$("body").hasClass("keep-topbar")) return;
    	if($(window).width() > 990){
	         processFloatTopbar(1,1);

    	}
    });
}
function backtotop(){
	$("#back-top").hide();
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
}
function panelTool(){
	$('#paneltool .panelbutton').click(function(){
		$('#paneltool .paneltool').toggleClass('active');
	});
}
function changeFloatHeader(){
	$('#floatHeader').click(function(){
		if ($('body').hasClass('keep-header')) {
			$('body').removeClass('keep-header');
			processFloatHeader(0,0);
		}
		else{
			processFloatTopbar(0,0);
			$('body').addClass('keep-header');
			$('body').removeClass('keep-topbar');
			$("#floatTopbar").prop("checked", false);
		};
	});
	$('#floatTopbar').click(function(){
		if ($('body').hasClass('keep-topbar')) {
			$('body').removeClass('keep-topbar');
			processFloatTopbar(0,0);
		}
		else{
			processFloatHeader(0,0);
			$('body').addClass('keep-topbar');
			$('body').removeClass('keep-header');
			$("#floatHeader").prop("checked", false);
		};
	});
}
function changeLayoutMode(){
    $('.dynamic-update-layout').click(function(){
        var currentLayoutMode = $('.dynamic-update-layout.selected').data('layout-mode');
        if(!$(this).hasClass('selected'))
        {
            $('.dynamic-update-layout').removeClass('selected');
            $(this).addClass('selected');
            selectedLayout = $(this).data('layout-mode');
            $('body').removeClass(currentLayoutMode);
            $('body').addClass(selectedLayout);
        }
    });
}
function changeHeaderStyle(){
    $('.dynamic-update-header').click(function(){
        var currentHeaderMode = $('.dynamic-update-header.selected').data('header-style');
        if(!$(this).hasClass('selected'))
        {
            $('.dynamic-update-header').removeClass('selected');
            $(this).addClass('selected');
            selectedHeaderStyle = $(this).data('header-style');
            $('body').removeClass(currentHeaderMode);
            $('body').addClass(selectedHeaderStyle);
        }
    });
}
function addFilterEffect(){
	if($("#catalog_block").length && $("#catalog_block").hasClass('ajax-filter')){
		//if this page is collection page
		if($('.catalog_filters').length){
			$('.advanced-filter').each(function(){
				dataGroup = $(this).data('group');
				if(dataGroup != "Vendor"){
					activeFilter='';
					if($(this).hasClass('active-filter'))
						activeFilter=' checked="checked"';

					$('a', $(this)).each(function(){
						var dataHandle = slugify($(this).parent().data("handle"));
						//put link for filter when not in collection page
						if(!$('body').hasClass('template-collection')){
							$(this).attr('href','/collections/all/'+dataHandle);
							$(this).unbind( "click" );
						}else{
							$('<input class="chkval" type="checkbox" name='+dataGroup+activeFilter+' value="'+dataHandle+'"/>').insertBefore($(this));
							$(this).click(function(event){
								chkVal = $(this).parent().find('.chkval');
								chkVal.prop("checked", !chkVal.prop("checked"));
								$(this).parent().toggleClass("active-filter");
								FilterLoadResult();
								return false;
							});
						}
					})
				}
			});
		}
	}
		//add ajax for sort
		// $("#SortBy").change(function(event){
		// 	event.preventDefault();

		// 	var url      = window.location.href;
		// 	if(url.indexOf('search') > 0){
		// 		switch($(this).val()){
		// 			case 'title-ascending':
		// 				url = replaceUrlParam(url, 'sortby', '(title:product=asc)');
		// 				break;
		// 			case 'title-descending':
		// 				url = replaceUrlParam(url, 'sortby', '(title:product=des)');
		// 				break;
		// 			case 'price-ascending':
		// 				url = replaceUrlParam(url, 'sortby', '(price:product=asc)');
		// 				break;
		// 			case 'price-descending':
		// 				url = replaceUrlParam(url, 'sortby', '(price:product=des)');
		// 				break;
		// 			case 'created-ascending':
		// 				url = replaceUrlParam(url, 'sortby', '(created:product=asc)');
		// 				break;
		// 			case 'created-descending':
		// 				url = replaceUrlParam(url, 'sortby', '(created:product=des)');
		// 				break;
		// 		}
		// 	}else{
		// 		url = replaceUrlParam(url, 'sort_by', $(this).val());
		// 	}

		// 	processCollectionAjax(url);
		// 	return false;
		// });
		//add ajax for view
		// $(".change-view").click(function(event){
		// 	event.preventDefault();
		// 	if($(this).hasClass('change-view--active')) return false;
		// 	$(".change-view").removeClass('change-view--active');
		// 	$(this).addClass('change-view--active');
		// 	var url = window.location.href;
		// 	url = replaceUrlParam(url, 'view', $(this).data('view'));
		// 	//add class for product list
		// 	processCollectionAjax(url);
		// 	$('.product_list').removeClass('list').removeClass('grid').addClass($(this).data('view'));
		// 	return false;
		// });

		pagingCollection();

}

function pagingCollection(){
	activeNumber = parseInt($('.pagination li.active span').html());

	$('#pagination .pagination a').click(function(){
		var pageNumber = 0;
		//previous

		if($(this).parent().hasClass('pagination_previous')){
			pageNumber = activeNumber-1;
		}
		//next
		else if($(this).parent().hasClass('pagination_next')){
			pageNumber = activeNumber+1;
		}
		//normal paging
		else{
			pageNumber = parseInt($(this).html());
		}
		if(pageNumber >0){
			var url      = window.location.href;
			url = replaceUrlParam(url, 'page', pageNumber);

			processCollectionAjax(url);
		}
		return false;
	});
}
function FilterLoadResult(){
	var ismore = 0;
	collecionid = $("#catalog_block").data("collection");
	if(collecionid)
			q="filter=((collectionid:product="+collecionid+")";
	else
			q="filter=((collectionid:product>=0)";

	//search by size
	textsize = '';
	$('#ul_catalog_size .chkval').each(function(){
		if($(this).is(":checked")){
			ismore++;
			vc = $(this).val().toLowerCase();
			textsize += (textsize?"||":"")+"(variant:product="+vc+")";
		}
	});
	textcolor = '';
	$('#ul_catalog_color .chkval').each(function(){
		if($(this).is(":checked")){
			ismore++;
			vc = $(this).val().toLowerCase();
			textcolor += (textcolor?"||":"")+"(variant:product="+vc+")";
		}
	});
	textPrice = '';
	$('#ul_catalog_price .chkval').each(function(){
		if($(this).is(":checked")){
			ismore++;
			vc = $(this).val().toLowerCase();
			if(vc.indexOf('duoi')>-1)
			{
				vc = vc.replace('duoi-','<=');
				textPrice += (textPrice?"||":"")+"(price:product"+vc+")";
			}else if(vc.indexOf('tren')>-1){
				vc = vc.replace('tren-','>');
				textPrice += (textPrice?"||":"")+"(price:product"+vc+")";
			}else{
				vc = vc.split("-");
				tmpprice = '';
				for (var i in vc) {
					tmpprice += (tmpprice?"&&":"")+"(price:product"+(i==0?">":"<=")+vc[i]+")";
				}
				textPrice += (textPrice?"||":"")+"("+tmpprice+")";
			}
		}
	});



		var url = '/search?q='+q;
		if(textsize){
			if(textsize.split("||").length>1){
				url += "&&"+"("+textsize+")";
			}else{
				url += "&&"+textsize;
			}
		}
		if(textcolor){
			if(textcolor.split("||").length>1){
				url += "&&"+"("+textcolor+")";
			}else{
				url += "&&"+textcolor;
			}
		}
		if(textPrice){
			if(textPrice.split("||").length>1){
				url += "&&"+"("+textPrice+")";
			}else{
				url += "&&"+textPrice;
			}
		}


		url = url+")";
		//check change view
		view = $('.change-view--active').data('view');
		if (view == "list") {
			url = replaceUrlParam(url, 'view', $(this).data('view'));
		}
		//check change sort
		sortby = $("#SortBy").val();
		if(sortby!="manual"){
			switch(sortby){
				case 'title-ascending':
					url = replaceUrlParam(url, 'sortby', '(title:product=asc)');
					break;
				case 'title-descending':
					url = replaceUrlParam(url, 'sortby', '(title:product=des)');
					break;
				case 'price-ascending':
					url = replaceUrlParam(url, 'sortby', '(price:product=asc)');
					break;
				case 'price-descending':
					url = replaceUrlParam(url, 'sortby', '(price:product=des)');
					break;
				case 'created-ascending':
					url = replaceUrlParam(url, 'sortby', '(created:product=asc)');
					break;
				case 'created-descending':
					url = replaceUrlParam(url, 'sortby', '(created:product=des)');
					break;
			}
		}
		processCollectionAjax(url);
}
function processCollectionAjax(url){
	$.ajax({
        type: 'GET',
        url: url,
        data: {},
        beforeSend:function(){
        	$('.product_list').addClass('loading');
		},
		complete: function (data) {
			//console.log(data.responseText);
			if($(".product_list", data.responseText).length){
				$('.product_list').html($(".product_list", data.responseText).html());
				$('#pagination').remove();

				$('.content_sortPagiBar').html($(".content_sortPagiBar", data.responseText).html());
			}else{
				$('.product_list').html('');
				$('.content_sortPagiBar').html('');
			}
			$('.product_list').removeClass('loading');

			history.pushState({
				page: url
			}, url, url);
			pagingCollection();
		}
    });
}
function addCheckedSwatch(){
  $('.swatch .color label').on('click', function () {
    $('.swatch .color').each(function(){
      $(this).find('label').removeClass('checkedBox');
    });
    $(this).addClass('checkedBox');
  });
}
function SetOwlCarouselFirstLast(el){
    el.find(".owl-item").removeClass("first");
    el.find(".owl-item.active").first().hide();
    el.find(".owl-item.active").first().addClass("first");
    el.find(".owl-item").removeClass("last");
    el.find(".owl-item.active").last().addClass("last");
}
function activeParentMenu(){
  $('.megamenu').find('li.active').first().each(function(){
    addClassActive($(this).parent().closest('li'));
  });
}
function addClassActive(e){
  $(e).addClass('active');
  if(!$(e).parent().hasClass('megamenu')){
    addClassActive($(e).parent().closest('li'));
  }
}
/*START LEFT- RIGHT MENU*/
function setLeftColumn() {
  	if($("#left_column").length > 0) {
        if($(".over-cover").length == 0) {
            $('body').append($('<div class="over-cover"></div><div class="drag-target-left"><div class="drag-panel-left"></div></div>'));
            $('body').append($('<a href="javascript:;" data-activates="slide-out" class="button-collapse-left"><i class="mdi-navigation-menu"></i></a>'));
        }

        $(".button-collapse-left").click(function() {
            $(".drag-target-left, .button-collapse-left").addClass("hide");
          	$("body").addClass("move-left-to-right");
            $('#left_column').css("left", "-400px");
            setTimeout(function() {
                $("#left_column").parent().addClass("side-nav-container-left");
                $("#left_column").addClass("side-nav-left");
            }, 200);
        });
        $(".over-cover").click(function() {
          	$(".drag-target-left, .button-collapse-left").removeClass("hide");
            $("#left_column").parent().removeClass("side-nav-container-left");
            $("#left_column").removeClass("side-nav-left");
            $("body").removeClass("move-left-to-right");
            $(".box-left-menu").addClass("menu-close");
            $('#left_column').css("left", "");
        });
        $(".drag-target-left").click(function() {
            console.log("drag-target click");
            $(".button-collapse-left").trigger("click");
        });
    }
}
function setRightColumn() {
  	if($("#right_column").length > 0) {
        if($(".over-cover").length == 0) {
            $('body').append($('<div class="over-cover"></div><div class="drag-target-right"><div class="drag-panel-right"></div></div>'));
            $('body').append($('<a href="javascript:;" data-activates="slide-out" class="button-collapse-right"><i class="mdi-navigation-menu"></i></a>'));
        }

        $(".button-collapse-right").click(function() {
            $(".drag-target-right, .button-collapse-right").addClass("hide");
          	$("body").addClass("move-right-to-left");
            $('#right_column').css("right", "-400px");
            setTimeout(function() {
                $("#right_column").parent().addClass("side-nav-container-right");
                $("#right_column").addClass("side-nav-right");
            }, 200);
        });
        $(".over-cover").click(function() {
          	$(".drag-target-right, .button-collapse-right").removeClass("hide");
            $("#right_column").parent().removeClass("side-nav-container-right");
            $("#right_column").removeClass("side-nav-right");
            $("body").removeClass("move-right-to-left");
            $(".box-right-menu").addClass("menu-close");
            $('#right_column').css("right", "");
        });
        $(".drag-target-right").click(function() {
            console.log("drag-target click");
            $(".button-collapse-right").trigger("click");
        });
    }
}
/*END LEFT- RIGHT MENU*/