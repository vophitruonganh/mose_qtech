$(document).ready( function(){
        if( $(window).width() < 991 ){
                        $(".header_user_info").addClass('popup-over');
                        $(".header_user_info .links").addClass('dropdown-menu');
                }
                else{
                        $(".header_user_info").removeClass('popup-over');
                        $(".header_user_info .links").removeClass('dropdown-menu');
                }
        $(window).resize(function() {
                if( $(window).width() < 991 ){
                        $(".header_user_info").addClass('popup-over');
                        $(".header_user_info .links").addClass('dropdown-menu');
                }
                else{
                        $(".header_user_info").removeClass('popup-over');
                        $(".header_user_info .links").removeClass('dropdown-menu');
                }
        });
});

//slider
$(document).ready(function() {
    $('#sliderlayer').nivoSlider({
            effect: 'random',
            animSpeed: 500,
            pauseTime: 8000
    });
    $('#sliderlayer').on('swipeleft',function(e){
                    $('a.nivo-nextNav').trigger('click');
                    e.stopPropagation();
        return false;
            });
    $('#sliderlayer').on('swiperight',function(e){
                    $('a.nivo-prevNav').trigger('click');
                    e.stopPropagation();
        return false;
            });
});

//left ban chay nhat
$(document).ready(function() {
    $('#productlistsidebar').each(function(){
        $(this).carousel({
            pause: 'hover',
            interval: 10000
        });
    });

});

//right san pham moi
$(document).ready(function() {
$('#productlist01').each(function(){
    $(this).carousel({
        pause: 'hover',
        interval: 8000
    });
});

});
//right productlist02

$(document).ready(function() {

    $('#productlist02 .owl-carousel').each(function(){
            $(this).owlCarousel({
            items : 4,
            lazyLoad : true,
            navigation : true,
            addClassActive: true,
            afterInit : SetOwlCarouselFirstLast,
            afterAction : SetOwlCarouselFirstLast,

            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 2],
            itemsTabletSmall: [480, 1],
            itemsMobile: [360, 1],
            navigationText : ["Quay lại", "Tiếp"]
            });
    });
            function SetOwlCarouselFirstLast(el){
                    el.find(".owl-item").removeClass("first");
                    el.find(".owl-item.active").first().addClass("first");

                    el.find(".owl-item").removeClass("last");
                    el.find(".owl-item.active").last().addClass("last");
            };

});

//right productlist02


$(document).ready(function() {

       $('#productlist03 .owl-carousel').each(function(){
                       $(this).owlCarousel({
                       items : 4,
                       lazyLoad : true,
                       navigation : true,
               addClassActive: true,
                       afterInit : SetOwlCarouselFirstLast,
                       afterAction : SetOwlCarouselFirstLast,

                               itemsDesktop: [1199, 3],
                       itemsDesktopSmall: [979, 2],
                       itemsTablet: [768, 2],
                       itemsTabletSmall: [480, 1],
                       itemsMobile: [360, 1],

                       navigationText : ["Quay lại", "Tiếp"]
               }); 
               });
                       function SetOwlCarouselFirstLast(el){
                       el.find(".owl-item").removeClass("first");
                       el.find(".owl-item.active").first().addClass("first");

                       el.find(".owl-item").removeClass("last");
                       el.find(".owl-item.active").last().addClass("last");
               };

});








             