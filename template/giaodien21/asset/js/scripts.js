

jQuery(document).ready(function(){

	if ( $('.slides li').size() > 1 ) {

		$('.flexslider').flexslider({
			animation: "slide",
			slideshow: true,
			animationDuration: 700,
			slideshowSpeed: 6000,
			animation: "fade",
			controlsContainer: false,
			controlNav: true,
			keyboardNav: true
		});
		//.hover(function(){ $('.flex-direction-nav').fadeIn();}, function(){$('.flex-direction-nav').fadeOut();});

	}

	$("select.loc_on_change").change(function(){
		if($(this).attr("value") == "#") return false;
		window.location = $(this).attr("value");
	});

	
	 });

	 jQuery(document).ready(function($){

		 $("nav.mobile select").change(function(){ window.location = jQuery(this).val(); });
		 $('#product .thumbs a').click(function(){
			 
			 $('#placeholder').attr('href', $(this).attr('href'));
				$('#placeholder img').attr('src', $(this).attr('data-original-image'))
				
				$('#zoom-image').attr('href', $(this).attr('href'));
				 return false;
				});

				$('input[type="submit"], input.btn, button').click(function(){ // remove ugly outline on input button click
					$(this).blur();
				})

				$("li.dropdown").hover(function(){
					$(this).children('.dropdown').show();
					$(this).children('.dropdown').stop();
					$(this).children('.dropdown').animate({
						opacity: 1.0
					}, 200);
				}, function(){
					$(this).children('.dropdown').stop();
					$(this).children('.dropdown').animate({
						opacity: 0.0
					}, 400, function(){
						$(this).hide();
					});
				});

			 }); // end document ready

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


			 function getCartAjax(){
				 var cart = null;
				 $('#cartform').hide();
				 $('#myCart #exampleModalLabel').text("Giỏ hàng");
				 jQuery.getJSON('/cart.js', function(cart, textStatus) {
					 if(cart)
					 {
						 $('#cartform').show();
						 $('.line-item:not(.original)').remove();
						 $.each(cart.items,function(i,item){
							 var total_line = 0;
							 var total_line = item.quantity * item.price;
							 tr = $('.original').clone().removeClass('original').appendTo('table#cart-table tbody');
							 if(item.image != null)
								 tr.find('.item-image').html("<img src=" + Haravan.resizeImage(item.image,'small') + ">");
							 else
								 tr.find('.item-image').html("<img src='//hstatic.net/0/0/global/noDefaultImage6_large.gif'>");
							 vt = item.variant_options;
							 if(vt.indexOf('Default Title') != -1)
								 vt = '';
							 tr.find('.item-title a').html(item.product_title + '<br><span>' + vt + '</span>').attr('href', item.url);
							 tr.find('.item-quantity').html("<input id='quantity1' name='updates[]' min='1' type='number' value=" + item.quantity + " class='' />");
							 tr.find('.item-price').html(Haravan.formatMoney(total_line, ""));
							 tr.find('.item-delete').html("<a href='#' onclick='deleteCart(" + item.variant_id + ")' >Xóa</a>");
						 });
						 $('.item-total').html(Haravan.formatMoney(cart.total_price, ""));
						 $('.modal-title b').html(cart.item_count);
						 $('*[id=cart-count]').html(cart.item_count);
						 if(cart.item_count == 0){
							 //$('#myCart button').attr('disabled', '');
							 $('#myCart #cartform').addClass('hidden');
							 $('#tp_header_price').html("0đ");
							 $('#myCart #exampleModalLabel').html('Giỏ hàng của bạn đang trống. Mời bạn tiếp tục mua hàng.');
							 
						 }
						 else{
							 $('#myCart #exampleModalLabel').html('Bạn có ' + cart.item_count + ' sản phẩm trong giỏ hàng.');
							 $('#myCart #cartform').removeClass('hidden');
							 $('#myCart button').removeAttr('disabled');
						 }

					 }
					 else{
						 $('#myCart #exampleModalLabel').html('Giỏ hàng của bạn đang trống. Mời bạn tiếp tục mua hàng.');
						 $('#cartform').hide();
					 }
				 });

			 }
			 

			 
			 $('#checkout').click(function(){
				 $('#cartform').submit();
			 })
			 // The following piece of code can be ignored.
			 $(function(){
				 $(window).resize(function() {
					 $('#info').text("Page width: "+$(this).width());
				 });
				 $(window).trigger('resize');
			 });
			 $(document).ready(function(){
				 $("#countries").mouseover(function(){
					 $(this).addClass("countries_hover");
					 $(".countries_ul").addClass("countries_ul_hover");});
				 $("#countries").mouseout(function(){
					 $(this).removeClass("countries_hover");
					 $(".countries_ul").removeClass("countries_ul_hover");});});;
			 $(document).ready(function(){
				 $("#setCurrency").mouseover(function(){
					 $(this).addClass("countries_hover");
					 $(".currencies_ul").addClass("currencies_ul_hover");});
				 $("#setCurrency").mouseout(function(){
					 $(this).removeClass("countries_hover");
					 $(".currencies_ul").removeClass("currencies_ul_hover");});});;

			 //Add Cart



			 //Menu danh mục trang collection
			 $(document).ready(function() {
				 $('ul.tree.dhtml').hide();

				 //to do not execute this script as much as it's called...
				 if (!$('ul.tree.dhtml').hasClass('dynamized')) {
					 //add growers to each ul.tree elements
					 $('ul.tree.dhtml ul').prev().before("<span class='grower OPEN'> </span>");

					 //dynamically add the '.last' class on each last item of a branch
					 $('ul.tree.dhtml ul li:last-child, ul.tree.dhtml li:last-child').addClass('last');

					 //collapse every expanded branch
					 $('ul.tree.dhtml span.grower.OPEN').addClass('CLOSE').removeClass('OPEN').parent().find('ul:first').hide();
					 $('ul.tree.dhtml').show();

					 //open the tree for the selected branch
					 $('ul.tree.dhtml .selected').parents().each(function() {
						 if ($(this).is('ul')) toggleBranch($(this).prev().prev(), true);
					 });
					 toggleBranch($('ul.tree.dhtml .selected').prev(), true);

					 //add a fonction on clicks on growers
					 $('ul.tree.dhtml span.grower').click(function() {
						 toggleBranch($(this));
					 });
					 //mark this 'ul.tree' elements as already 'dynamized'
					 $('ul.tree.dhtml').addClass('dynamized');

					 $('ul.tree.dhtml').removeClass('dhtml');
				 }
			 });

			 //animate the opening of the branch (span.grower jQueryElement)
			 function openBranch(jQueryElement, noAnimation) {
				 jQueryElement.addClass('OPEN').removeClass('CLOSE');
				 if (noAnimation) jQueryElement.parent().find('ul:first').show();
				 else jQueryElement.parent().find('ul:first').slideDown();
			 }
			 //animate the closing of the branch (span.grower jQueryElement)
			 function closeBranch(jQueryElement, noAnimation) {
				 jQueryElement.addClass('CLOSE').removeClass('OPEN');
				 if (noAnimation) jQueryElement.parent().find('ul:first').hide();
				 else jQueryElement.parent().find('ul:first').slideUp();
			 }

			 //animate the closing or opening of the branch (ul jQueryElement)
			 function toggleBranch(jQueryElement, noAnimation) {
				 if (jQueryElement.hasClass('OPEN')) closeBranch(jQueryElement, noAnimation);
				 else openBranch(jQueryElement, noAnimation);
			 }

			 // Chuyển ảnh trong collection
			 $(document).ready(function () {
				 $('.product-container').each(function() {
					 var i = 0;
					 var imageAll = $(this).find('.image').data('imgs-attr');
					 if (typeof imageAll != 'undefined') {
						 var imageListAll = imageAll.split(",");
					 }
					 if (typeof imageListAll != 'undefined') {
						 if (imageListAll.length > 1) {
							 $(this).find('.next-image').click(function(e) {
								 e.preventDefault();
								 if (i < imageListAll.length - 1) {
									 i++;
									 $(this).parent().parent().parent().siblings().find('img').attr({
										 'src': imageListAll[i]
									 });
								 } else {
									 i = 0;
									 $(this).parent().parent().parent().siblings().find('img').attr({
										 'src': imageListAll[i]
									 });
								 };
							 });
							 $(this).find('.prev-image').click(function(e) {
								 e.preventDefault();
								 if (i > 0) {
									 i--;
									 $(this).parent().parent().parent().siblings().find('img').attr({
										 'src': imageListAll[i]
									 });
								 } else {
									 i = imageListAll.length - 1;
									 $(this).parent().parent().parent().siblings().find('img').attr({
										 'src': imageListAll[i]
									 });
								 };
							 });
						 };
					 };
				 });
			 });


			 //begin jQuery view tab list/grid
			 function bindGrid() {
				 var view = $.totalStorage('display');

				 if (!view && (typeof displayList != 'undefined') && displayList) view = 'list';

				 if (view && view != 'grid') display(view);
				 else $('.display').find('li#grid').addClass('selected');

				 $(document).on('click', '#grid', function(e) {
					 e.preventDefault();
					 display('grid');
				 });

				 $(document).on('click', '#list', function(e) {
					 e.preventDefault();
					 display('list');
				 });
			 }

			 function display(view) {
				 if (view == 'list') {
					 $('ul.product_list').removeClass('grid').addClass('list');
					 $('.product_list > li').removeClass('col-xs-12 col-sm-6 col-md-4').addClass('col-xs-12');
					 $('.left-block_collection').addClass('col-xs-12 col-sm-5 col-md-4');
					 $('.right-block_collection').addClass('post_title col-xs-12 col-sm-7 col-md-8');
					 $('.pr-0').removeClass('product-contents');
					 $('.pr-0').addClass('right-block-content row');
					 $('.quick-view_list').show();
					 $('.ajax_add_to_cart_button').show();
					 $('.pr-q1').hide();
					 $('.hidde-quick-list').hide();
					 $('.display').find('li#list').addClass('selected');
					 $('.display').find('li#grid').removeAttr('class');
					 $.totalStorage('display', 'list');
				 } else {
					 $('ul.product_list').removeClass('list').addClass('grid');
					 $('.product_list > li').removeClass('col-xs-12').addClass('col-xs-12 col-sm-6 col-md-4');
					 $('.left-block_collection').removeClass('col-xs-12 col-sm-5 col-md-4');
					 $('.right-block_collection').removeClass('post_title col-xs-12 col-sm-7 col-md-8');
					 $('.pr-0').addClass('product-contents');
					 $('.pr-0').removeClass('right-block-content row');
					 $('.quick-view_list').hide();
					 $('.hidde-quick-list').show();
					 $('.pr-q1').show();
					 $('.display').find('li#grid').addClass('selected');
					 $('.display').find('li#list').removeAttr('class');
					 $.totalStorage('display', 'grid');
				 }
				 $("[data-toggle='tooltip']").tooltip();
			 }
			 $(document).ready(function(){
				 bindGrid()
			 });
			 //end jQuery view tab list/grid



