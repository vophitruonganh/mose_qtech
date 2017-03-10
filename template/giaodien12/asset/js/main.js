//--DOCUMENT READY FUNCTION BEGIN
$(document).ready(function() {
	//tooltip
	$('[data-toggle="tooltip"]').tooltip(); 
	
	//Home slide
    $("#owl-demo").owlCarousel({
        navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		autoPlay: 6000,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });

	// 404 page
    if ($(window).width() < 767) {
        $(".big-row-eq-height").removeClass("row-eq-height");
        $(".not_found").removeClass("row-eq-height");
        }
	else{
         $(".big-row-eq-height").addClass("row-eq-height");
         $(".not_found").addClass("row-eq-height");
        }

	//Contact page notification
	setTimeout(function(){
			var url = window.location.href;
            
			if(url.indexOf("contact_error_notification") > -1) {
				
			}
			else
			{			
				if(url.indexOf("contact_posted=true") > -1) {
				
				  $(".notification_contact").fadeIn(400).delay(3000).fadeOut();
				  $(".overlayopacity").fadeIn(400).delay(3000).fadeOut();
					disableScroll();
					setTimeout(function(){
						enableScroll();
					}, 3000);
				}
			}
		
        }, 1000);

    /* Quatity buttons */
    $('#q_up').on("click", function() {
        var q_val_up=parseInt($("input#quantity_wanted").val(), 10);
        if(isNaN(q_val_up)) {
            q_val_up=0;
        }
        $("input#quantity_wanted").val(q_val_up+1).keyup(); 
        return false; 
    });
    
    $('#q_down').on("click", function() {
        var q_val_up=parseInt($("input#quantity_wanted").val(), 10);
        if(isNaN(q_val_up)) {
            q_val_up=0;
        }
        
        if(q_val_up>1) {
            $("input#quantity_wanted").val(q_val_up-1).keyup();
        } 
        return false; 
    });

//============== product img thumbnail ==================
	if ($(window).width() > 767) {      
		$("#image").elevateZoom({
		zoomType : "inner",
		cursor: "crosshair"
		});//-- end. elevateZoom
	}//-- end. windown > 767

//============== product img popup ==================
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title');
            }
        }
    });

//============== product img slide ==================
    $(".thumbnails-carousel").owlCarousel({
        autoPlay: 6000, //Set AutoPlay to 3 seconds
        navigation: true,
        navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        itemsCustom: [
            [0, 2],
            [450, 3],
            [550, 3],
            [768, 3],
            [1200, 3]
        ],
    });

});
//--DOCUMENT READY FUNCTION END





//--WINDOW RESIZE FUNCTION BEGIN
$(window).resize(function() {

	// 404 page
    if ($(window).width() < 767) {
        $(".big-row-eq-height").removeClass("row-eq-height");
         $(".not_found").removeClass("row-eq-height");
    } else {

        $(".big-row-eq-height").addClass("row-eq-height");
        $(".not_found").addClass("row-eq-height");
    }

	//============== product img thumbnail ==================
	if ($(window).width() < 767) {      
		$('.zoomContainer').remove();
		$("#image").removeData('elevateZoom');	
	}
	//-- end. windown < 767
	
	
			$('.thumbnails a, .thumbnails-carousel a').click(function() {
				//if image different size > fit new zoomContainer size = image size
				$('.zoomContainer').remove();
				$("#image").removeData('elevateZoom');
				$("#image").attr('src', $(this).data('image'));
				$("#image").data('zoom-image', $(this).data('zoom-image'));
					if ($(window).width() > 767) {   
					$("#image").elevateZoom({
					zoomType : "inner",
					cursor: "crosshair"
					});//-- end. elevateZoom
					}
				// swap small img vs larger img to zoom
				var smallImage = $(this).attr('data-image');
				var largeImage = $(this).attr('data-zoom-image');
				var ez = $('#image').data('elevateZoom');
				$('#ex1').attr('href', largeImage);
				ez.swaptheimage(smallImage, largeImage);
				return false;
			});//-- end. click function
	
	
	
//navagation
//$('.dropdown-menu.multi-level').hide();
if ($(window).width() > 991) {
	$('.childlink_a').click(function() {
		document.location.href = $(this).attr('href');
	});
}
else
{
	$('.childlink_a').click(function(e) {
		e.preventDefault();
    	e.stopPropagation();
		
		
		
			var childlink_last = $(this).parent().find('.dropdown-menu.multi-level');

			if( childlink_last.is(":visible"))
			{
				childlink_last.hide();
				$('.dropdown-menu.multi-level').hide();
			}
			else
			{	$('.dropdown-menu.multi-level').hide();
				childlink_last.show();
				childlink_last.find('a').click(function() {
					document.location.href = $(this).attr('href');
				});
				
					
			}
		
			
		
	});
}//End. navagation
	
});
//--WINDOW RESIZE FUNCTION END




//navagation
if ($(window).width() > 991) {
	$('.childlink_a').click(function() {
		document.location.href = $(this).attr('href');
	});
}
else
{
	$('.childlink_a').click(function(e) {
		e.preventDefault();
    	e.stopPropagation();
		
		
		
			var childlink_last = $(this).parent().find('.dropdown-menu.multi-level');

			if( childlink_last.is(":visible"))
			{
				childlink_last.hide();
				$('.dropdown-menu.multi-level').hide();
			}
			else
			{	$('.dropdown-menu.multi-level').hide();
				childlink_last.show();
				childlink_last.find('a').click(function() {
					document.location.href = $(this).attr('href');
				});
				
					
			}
		
			
		
	});
}//End. navagation



$('.thumbnails a, .thumbnails-carousel a').click(function() {
	//if image different size > fit new zoomContainer size = image size
	$('.zoomContainer').remove();
	$("#image").removeData('elevateZoom');
	$("#image").attr('src', $(this).data('image'));
	$("#image").data('zoom-image', $(this).data('zoom-image'));
	if ($(window).width() > 767) {   
		$("#image").elevateZoom({
		zoomType : "inner",
		cursor: "crosshair"
		});//-- end. elevateZoom
	}
	// swap small img vs larger img to zoom
	var smallImage = $(this).attr('data-image');
	var largeImage = $(this).attr('data-zoom-image');
	var ez = $('#image').data('elevateZoom');
	$('#ex1').attr('href', largeImage);
	ez.swaptheimage(smallImage, largeImage);
	return false;
});//-- end. click function

// Cart btn click
	$('.header-cart').click(function() {
		document.location.href = $(this).attr('href');
	});
	$('.header-cart-small').click(function() {
		document.location.href = $(this).attr('href');
	});

//====================== disable Scroll & enable Scroll function =================
	var keys = {37: 1, 38: 1, 39: 1, 40: 1};
	function preventDefault(e) {
	  e = e || window.event;
	  if (e.preventDefault)
		  e.preventDefault();
	  e.returnValue = false;  
	}
	function preventDefaultForScrollKeys(e) {
		if (keys[e.keyCode]) {
			preventDefault(e);
			return false;
		}
	}
	function disableScroll() {
	  if (window.addEventListener) // older FF
		  window.addEventListener('DOMMouseScroll', preventDefault, false);
	  window.onwheel = preventDefault; // modern standard
	  window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
	  window.ontouchmove  = preventDefault; // mobile
	  document.onkeydown  = preventDefaultForScrollKeys;
	}
	function enableScroll() {
		if (window.removeEventListener)
			window.removeEventListener('DOMMouseScroll', preventDefault, false);
		window.onmousewheel = document.onmousewheel = null; 
		window.onwheel = null; 
		window.ontouchmove = null;  
		document.onkeydown = null;  
	}