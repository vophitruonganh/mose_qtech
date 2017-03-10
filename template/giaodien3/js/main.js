function isAlphaNum(event) {
	var regex = new RegExp("^[0-9]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
		event.preventDefault();
		return false;
	}
}
$(document).ready(function() {
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
			center(current)
		}
	}

	$("#sync2").on("click", ".owl-item", function(e){
		e.preventDefault();
		var number = $(this).data("owlItem");
		sync1.trigger("owl.goTo",number);
	});

	function center(number){
		var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
		var num = number;
		var found = false;
		for(var i in sync2visible){
			if(num === sync2visible[i]){
				var found = true;
			}
		}

		if(found===false){
			if(num>sync2visible[sync2visible.length-1]){
				sync2.trigger("owl.goTo", num - sync2visible.length+2)
			}else{
				if(num - 1 === -1){
					num = 0;
				}
				sync2.trigger("owl.goTo", num);
			}
		} else if(num === sync2visible[sync2visible.length-1]){
			sync2.trigger("owl.goTo", sync2visible[1])
		} else if(num === sync2visible[0]){
			sync2.trigger("owl.goTo", num-1)
		}

	}
	if(typeof(ArticleShare) != "undefined")
	{
		ArticleShare.init();

	}
	//Contact page notification
	setTimeout(function(){
		if (window.location.href.indexOf("?contact_posted=true") > -1) {
			alert("Gửi email thành công");
		}
	}, 1000);
	$( ".show_nav_bar1" ).click(function() {
		$( ".show1" ).toggle( "slow", function() {
		});
	});
	$( ".show_nav_bar2" ).click(function() {
		$( ".show2" ).toggle( "slow", function() {
		});
	});
	$(".menu_index_left .menu_index_lv1 li a").click(function(){
        $(this).tab('show');
    });
	$(".btn_show_search").click(function(){
        $(".header-search").toggle();
    });
});

///add
$(document).ready(function(){
	
    $(".themmoi").click(function(){
          $('.add_address').toggleClass('show');
    });
	
	
	//theme_sua
	 $(".theme_sua2").click(function(){
          $('.addthemsua2').toggleClass('show');
    });
});