jQuery(document).ready(function($){

   function addItem(form) {
      $.ajax({
        type: 'POST',
        url: '/cart/add.js',
        dataType: 'json',
        data: form.serialize(),
        success: function(data){
        	QMTECH.onSuccess(form);
        },
        error: QMTECH.onError
      });
   }


   // $('.addtocart').click(function(e) {
   //    e.preventDefault();
   //    var form = $(this).parents('form');
   //    $(this).prop('disabled', true);
   //    addItem(form);
   // });


   QMTECH.onSuccess = function(form) {

      var elem = form.find('.addtocart');

      elem.removeAttr("disabled");

      var quantity = parseInt(jQuery('[name="quantity"]').val(), 10) || 1;

      //$("html, body").animate({ scrollTop: 0 }, 250, 'swing');

      function animate(form) {
		var window_scroll_top = $(window).scrollTop();
        var addtocartWidth = elem.outerWidth() / 2;
        var addtocartHeight = elem.outerHeight() / 2;
		var addtocartLeft = elem.offset().left + addtocartWidth;
        var addtocartTop = elem.offset().top + addtocartHeight ;

        $("#cart-animation").css({top: addtocartTop + 'px', left: addtocartLeft + 'px'}).show();

        var buttonAreaWidth = $("#cart-target .cart").outerWidth();
        var buttonAreaHeight = $("#cart-target .cart").outerHeight();

        var buttonAreaLeft = $("#cart-target .cart").offset().left;
        var buttonAreaTop = $("#cart-target .cart").offset().top - buttonAreaHeight;
        var path = {
          start: {
            x: addtocartLeft,
            y: addtocartTop - window_scroll_top,
            angle: 190.012,
            length: 0.2
          },
          end: {
            x: buttonAreaLeft,
            y: buttonAreaTop,
            angle: 90.012,
            length: 0.50
          }
        };
		form.closest('.actions').addClass('adding-to-cart');
		$('html,body').animate({scrollTop:0},1200);
        $("#cart-animation").text(quantity).animate(
	        {
	          path : new $.path.bezier(path)
	        },
        	1200,
	        function() {
	          $("#cart-animation").fadeOut(500, function() {
	            $(elem).prop("disabled", false)
	            var cartCount =  parseInt($('#cart-count').text())? parseInt($('#cart-count').text()) + quantity:quantity;
	            $('#cart-count').text(cartCount)
	            $('#cart-target').addClass('has-items');
	            form.closest('.actions').removeClass('adding-to-cart');
	          })
	        }
        );
      }
      animate(form);
    };

    QMTECH.onError = function(XMLHttpRequest, textStatus) {
      // QMTECH returns a description of the error in XMLHttpRequest.responseText.
      // It is JSON.
      // Example: {"description":"The product 'Amelia - Small' is already sold out.","status":500,"message":"Cart Error"}
      var data = eval('(' + XMLHttpRequest.responseText + ')');
      if (!!data.message) {
        alert(data.message + '(' + data.status  + '): ' + data.description);
      } else {
        alert('Error : ' + QMTECH.fullMessagesFromErrors(data).join('; ') + '.');
      }

      $('.addtocart').removeAttr("disabled");
    };

    QMTECH.fullMessagesFromErrors = function(errors) {
      var fullMessages = [];
      jQuery.each(errors, function(attribute, messages) {
        jQuery.each(messages, function(index, message) {
          fullMessages.push(attribute + ' ' + message);
        });
      });
      return fullMessages;
    };

	$('#menu-top').on('click','form.search:not(.open) #go',function(e){
		if($('#menu-top .menu-wrap .menu li.search .search_box').width() == 0){
			$(this).parents('form').addClass('open');
			e.preventDefault();
		}
	});
	$('body').on('click','*',function(e){
		if($(this).hasClass('search') || $(this).parents('.search').length > 0){
			e.stopPropagation();
		}else{
			$('form.search').removeClass('open');
		}
	});
	//var header_offset_top = $('#menu-top').offset().top;
	/*if($('body.home').length == 0){
		$('#menu-top').css('margin-bottom',$('header.header').outerHeight(true));
	} */
	/*if($('#slider').length == 0 && $('.banner-page').length == 0){
		$('#menu-top').css('margin-bottom',$('header.header').outerHeight(true));
	} else {
		$('#menu-top').css('margin-bottom',0);
	}*/

	if($('#slider > .slides > .slide:first-child img').length == 0) {
		var container_offset_top = $('.wrapper').length > 0 ? $('.wrapper').offset().top : 0;
		if($('.banner-page').length > 0){
			container_offset_top += $('.banner-page').outerHeight();
		}
	} else {
		var container_offset_top = $('#slider').offset().top + $('#slider > .slides > .slide:first-child img').height();
	}
	//var menutop_pos = $('#menu-top').outerHeight() + header_offset_top;
	$(window).scroll(function() {
	});

	 $('.parallax .layer_back').each(function(){
        var $parallax = $(this); // assigning the object
        if($parallax.find('>img').height() > $parallax.parent().outerHeight()){
        	if($parallax.data('position') > ($parallax.parent().outerHeight() - $parallax.find('>img').height())){
        		var position_top = $parallax.data('position');
        	} else {
        		var position_top = $parallax.parent().outerHeight() - $parallax.find('>img').height();
        	}
	        $parallax.css({top: position_top + 'px'});
	        var parent_offset_top = $parallax.parent().offset().top;
	        $(window).scroll(function() {
	        	var ytop = ($(window).scrollTop() - parent_offset_top - position_top) / $parallax.data('speed');
	        	if($(window).scrollTop() >= parent_offset_top + position_top){
		            if($parallax.data('direct') == 'top'){
			            if( (ytop + $parallax.outerHeight()) > $parallax.parent().height()){
			            	ytop = ytop + 'px';
	          				$parallax.css({ top: ytop});
			            }

		            } else {//default 'up'
			            ytop = ytop + position_top;
			            if(ytop > 0) ytop = 0;
			            ytop = ytop + 'px';
	          			$parallax.css({ top: ytop});
		            }
	           }
	        });
        } else {
        	$parallax.css({'top':0,'bottom':0});
        	$parallax.find('>img').css({'min-width':'100%','min-height':'100%','display':'inline-block','max-width':'auto', 'width':'auto'});
        }
    });

	$("#main-nav .menu-mobile").click(function() {
		$("body").toggleClass("show-menu-mobile");
	});
	$('#mobile-menu .close-menu-mobile, .overlay-background').on('click',function(){
		$("#main-nav .menu-mobile").click();
		return false;
	});
	$('#slider .slides').owlCarousel({
		nav: true,
		dots: false,
		loop: true,
		smartSpeed : 2000,
		navSpeed :2000,
		singleItem:true,
		autoplay:true,
	    autoplayTimeout:4000,
	    autoplayHoverPause:true,
		loop: true,
		stopOnHover: true,
		items: 1
	});
	var home_project = $('.home-projects .owl-carousel');
	home_project.owlCarousel({
		dots: false,
		margin: 20,
		smartSpeed : 400,
		navSpeed : 1000,
		autoPlay: 3000,
		stopOnHover: true,
		items: 4,
		autoplay:true,
	    autoplayTimeout:4000,
	    autoplayHoverPause:true,
		loop: true,
		responsive:{
	        0:{
	            items:1,
	            slideBy: 1
	        },
	        480:{
	            items:2,
	            slideBy: 2
	        },
	        768:{
	            items:3,
	            slideBy: 3
	        },
	        960:{
	            items:4,
	            slideBy: 4
	        }
	    }
	});
	$(".home-projects .next").click(function(){
	    home_project.trigger('next.owl.carousel');
	});
	$(".home-projects .prev").click(function(){
	    home_project.trigger('prev.owl.carousel');
	});
	var testimonials = $('.list-testimonials .slides');
	testimonials.owlCarousel({
		nav: false,
		dots: false,
		smartSpeed : 400,
		navSpeed : 1000,
		singleItem:true,
		autoplay:true,
	    autoplayTimeout:8000,
	    autoplayHoverPause:true,
		items: 1
	});
	$(".list-testimonials .next").click(function(){
	    testimonials.trigger('next.owl.carousel');
	});
	$(".list-testimonials .prev").click(function(){
	    testimonials.trigger('prev.owl.carousel');
	});
	var home_news = $('.list-news .owl-carousel');
	home_news.owlCarousel({
		dots: false,
		margin: 20,
		smartSpeed : 400,
		navSpeed : 1000,
		autoplay:true,
	    autoplayTimeout:8000,
	    autoplayHoverPause:true,
		loop: true,
		items: 3,
		responsive:{
	        0:{
	            items:1,
	            slideBy: 1
	        },
	        480:{
	            items:2,
	            slideBy: 2
	        },
	        640:{
	            items:3,
	            slideBy: 3
	        }
	    }
	});
	$(".list-news .next").click(function(){
	    home_news.trigger('next.owl.carousel');
	});
	$(".list-news .prev").click(function(){
	    home_news.trigger('prev.owl.carousel');
	});
	$('#partners .slides').owlCarousel({
		items: 6,
		responsive:{
	        0:{
	            items:2,
	            slideBy: 2
	        },
	        480:{
	            items:3,
	            slideBy: 3
	        },
	        768:{
	            items:4,
	            slideBy: 4
	        },
	        860:{
	            items:5,
	            slideBy: 5
	        },
	        960:{
	            items:6,
	            slideBy: 6
	        }
	    },
		pagination: false,
		nav: true,
		dots: false,
		slideSpeed : 600,
		paginationSpeed : 400,
		autoplay:true,
	    autoplayTimeout:8000,
	    autoplayHoverPause:true,
		loop: true
	});
	new WOW().init();

  $("select.loc_on_change").change(function(){
  	if($(this).attr("value") == "#") return false;f
  	window.location = $(this).attr("value");
  });
  /*load layout cookie*/
 var product_layout = getCookie('product_layout');
 if(product_layout){
 	$(".change-layout .layout").removeClass('select');
 	$(".change-layout .layout[data-name="+product_layout+"]").addClass('select');
 	$('#primary .change-layout').removeClass('grid row').addClass(product_layout);
 }
  $(".change-layout .layout").on('click',function(){
  	var class_layout = $(this).data('name');
  	if(class_layout){
	  	$(".change-layout .layout").removeClass('select');
	  	$(this).addClass('select');
	  	$(this).parents('#primary').find('.products').removeClass('row').removeClass('grid').addClass(class_layout);
	  	setCookie('product_layout',class_layout);
  	}
  });
	function setCookie(key, value) {
	    var expires = new Date();
	    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
	    document.cookie = key + '=' + value +';path=/'+ ';expires=' + expires.toUTCString();
	}

	function getCookie(key) {
	    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
	    return keyValue ? keyValue[2] : null;
	}

	if($('.product-slider .list-zoom .jqzoom > img').length > 0){
		function create_jqzoom(){
			$(".jqzoom").each(function(){
				var xzoom = 0;
				var yzoom = 0;
				var offset = 10;
				xzoom = $(this).parents('.main-product').width() - $(this).outerWidth(true);
				//console.log($(this).parents('.entry').width() + ' - ' + $(this).outerWidth(true));
				//console.log(xzoom + ' / ' + $(this).outerWidth() + ' * ' +$(this).outerHeight());
				yzoom = (xzoom/$(this).outerWidth())*$(this).outerHeight();
				$(this).jqueryzoom({xzoom: xzoom - offset, yzoom: yzoom, offset: offset});
			});
		}
		var firstImage = $('.product-slider .list-zoom .jqzoom > img').filter(':first');
	    var checkforloaded = setInterval(function() {
	        var image = firstImage.get(0);
	        if (image.complete || image.readyState == 'complete' || image.readyState == 4) {
	            clearInterval(checkforloaded);
	            create_jqzoom();
	        }

	    }, 20);

		$(window).resize(function() {create_jqzoom();});
		$('.product-slider .list-zoom').each(function(){
			var html_ul = '<ul class="gallery clear">';
			$(this).find('.jqzoom').each(function(){
				var active = 'active';
				if($(this).index() > 0){
					$(this).addClass('hidden');
					active = '';
				} else $(this).addClass('active');
				html_ul += '<li class="'+active+'" data-id="'+$(this).attr('data-id')+'">'+$(this).html()+'</li>';
			});
			html_ul += '</ul>';
			$(this).after(html_ul);
		});
		$('.product-slider ul.gallery li').on('click',function(){
			$(this).parent().find('li').removeClass('active');
			$(this).addClass('active');
			$(this).parents('.product-slider').find('.list-zoom .jqzoom.active').removeClass('active').fadeOut(0).addClass('hidden');
			$(this).parents('.product-slider').find('.list-zoom .jqzoom[data-id='+$(this).attr('data-id')+']').fadeIn(500).removeClass('hidden').addClass('active');
			create_jqzoom();
		});
	}

});

/*============================*/
/* Update main product image. */
/*============================*/
var switchImage = function(newImageSrc, newImage, mainImageDomEl) {
  // newImageSrc is the path of the new image in the same size as originalImage is sized.
  // newImage is QMTECH's object representation of the new image, with various attributes, such as scr, id, position.
  // mainImageDomEl is the passed domElement, which has not yet been manipulated. Let's manipulate it now.
  jQuery(mainImageDomEl).attr('src', newImageSrc);

  if ($(window).width() > 782) {jQuery(mainImageDomEl).parent().trigger('zoom.destroy').zoom( { url: newImageSrc.replace('_master', '') } );}

};
/* jQuery css bezier animation support -- Jonah Fox */

;(function($){

  $.path = {};

  var V = {
    rotate: function(p, degrees) {
      var radians = degrees * Math.PI / 180,
        c = Math.cos(radians),
        s = Math.sin(radians);
      return [c*p[0] - s*p[1], s*p[0] + c*p[1]];
    },
    scale: function(p, n) {
      return [n*p[0], n*p[1]];
    },
    add: function(a, b) {
      return [a[0]+b[0], a[1]+b[1]];
    },
    minus: function(a, b) {
      return [a[0]-b[0], a[1]-b[1]];
    }
  };

  $.path.bezier = function( params, rotate ) {
    params.start = $.extend( {angle: 0, length: 0.3333}, params.start );
    params.end = $.extend( {angle: 0, length: 0.3333}, params.end );

    this.p1 = [params.start.x, params.start.y];
    this.p4 = [params.end.x, params.end.y];

    var v14 = V.minus( this.p4, this.p1 ),
      v12 = V.scale( v14, params.start.length ),
      v41 = V.scale( v14, -1 ),
      v43 = V.scale( v41, params.end.length );

    v12 = V.rotate( v12, params.start.angle );
    this.p2 = V.add( this.p1, v12 );

    v43 = V.rotate(v43, params.end.angle );
    this.p3 = V.add( this.p4, v43 );

    this.f1 = function(t) { return (t*t*t); };
    this.f2 = function(t) { return (3*t*t*(1-t)); };
    this.f3 = function(t) { return (3*t*(1-t)*(1-t)); };
    this.f4 = function(t) { return ((1-t)*(1-t)*(1-t)); };

    /* p from 0 to 1 */
    this.css = function(p) {
      var f1 = this.f1(p), f2 = this.f2(p), f3 = this.f3(p), f4=this.f4(p), css = {};
      if (rotate) {
        css.prevX = this.x;
        css.prevY = this.y;
      }
      css.x = this.x = ( this.p1[0]*f1 + this.p2[0]*f2 +this.p3[0]*f3 + this.p4[0]*f4 +.5 )|0;
      css.y = this.y = ( this.p1[1]*f1 + this.p2[1]*f2 +this.p3[1]*f3 + this.p4[1]*f4 +.5 )|0;
      css.left = css.x + "px";
      css.top = css.y + "px";
      return css;
    };
  };

  $.path.arc = function(params, rotate) {
    for ( var i in params ) {
      this[i] = params[i];
    }

    this.dir = this.dir || 1;

    while ( this.start > this.end && this.dir > 0 ) {
      this.start -= 360;
    }

    while ( this.start < this.end && this.dir < 0 ) {
      this.start += 360;
    }

    this.css = function(p) {
      var a = ( this.start * (p ) + this.end * (1-(p )) ) * Math.PI / 180,
        css = {};

      if (rotate) {
        css.prevX = this.x;
        css.prevY = this.y;
      }
      css.x = this.x = ( Math.sin(a) * this.radius + this.center[0] +.5 )|0;
      css.y = this.y = ( Math.cos(a) * this.radius + this.center[1] +.5 )|0;
      css.left = css.x + "px";
      css.top = css.y + "px";
      return css;
    };
  };

  $.fx.step.path = function(fx) {
    var css = fx.end.css( 1 - fx.pos );
    if ( css.prevX != null ) {
      $.cssHooks.transform.set( fx.elem, "rotate(" + Math.atan2(css.prevY - css.y, css.prevX - css.x) + ")" );
    }
    fx.elem.style.top = css.top;
    fx.elem.style.left = css.left;
  };

})(jQuery);