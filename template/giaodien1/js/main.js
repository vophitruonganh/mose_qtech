$(document).ready(function() {
	$("#nav-mobile").mmenu();
    $("#owl-slider").owlCarousel({
        pagination: true,
        autoPlay: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });
    $("#owl-news").owlCarousel({
        pagination: false,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });
    $("#owl-seminor").owlCarousel({
        pagination: false,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });
    $("#owl-testimonial").owlCarousel({
        autoPlay: 3000,
        items : 2,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [992,1],
        itemsMobile	: [767,1]
    });
    $("#owl-product-images").owlCarousel({
        autoPlay: 3000,
        pagination: false,
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [992,4],
        itemsMobile	: [767,4]
    });
    $("#owl-brand").owlCarousel({
        pagination: false,
        slideSpeed: 300,
        paginationSpeed: 400,
        items: 5,
        itemsDesktop : [1199,5],
        itemsDesktopSmall : [992,5]
    });    
//    if( $(window).width() < 768) {
//        $("#owl-school").owlCarousel({
//            slideSpeed: 300,
//            paginationSpeed: 400,
//            singleItem: true
//        });
//    }
//    $(window).resize(function(){
//        if( $(window).width() < 768) {
//            $("#owl-school").owlCarousel({
//                slideSpeed: 300,
//                paginationSpeed: 400,
//                singleItem: true
//            });
//        }
//    });
    $("#owl-product-images .item a").on("click", function(){
        var data_image = $(this).attr("data-image");
        $("#product-image-feature img").attr( "src", data_image);
    });
    $(".product-tabs-title li a").on("click", function(){
        var data_tab = $(this).attr("data-tab");
        $(".product-tabs-title li").removeClass("active");
        $(this).parent().addClass("active");
        $(".tab-content").removeClass("active");
        $("#" + data_tab).addClass("active");
    });
    $("#owl-product-related").owlCarousel({
        autoPlay: 3000,
        pagination: false,
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [992,4],
        itemsMobile	: [767,1]
    });
    
    

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");

	sync1.owlCarousel({
		singleItem : true,
		slideSpeed : 1000,
		navigation: true,
		pagination:false,
		afterAction : syncPosition,
		responsiveRefreshRate : 200,
	});

	sync2.owlCarousel({
		items : 5,
		itemsDesktop      : [1199,5],
		itemsDesktopSmall     : [979,5],
		itemsTablet       : [768,4],
		itemsMobile       : [479,3],
		pagination:false,
		responsiveRefreshRate : 100,
		afterInit : function(el){
			el.find(".owl-item").eq(0).addClass("synced");
		}
	});
        function syncPosition(el){
		var current = this.currentItem;
		$("#sync2")
			.find(".owl-item")
			.removeClass("synced")
			.eq(current)
			.addClass("synced")
		if($("#sync2").data("owlCarousel") !== undefined){
		}
	}

	$("#sync2").on("click", ".owl-item", function(e){
		e.preventDefault();
		var number = $(this).data("owlItem");
		sync1.trigger("owl.goTo",number);
	});
    
    
    
    
    
});