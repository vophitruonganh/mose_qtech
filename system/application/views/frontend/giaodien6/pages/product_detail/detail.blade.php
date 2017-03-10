@extends('frontend.giaodien6.layouts.default')         
@section('content')      
<?php 
        $product_id = $product['product_id'];
        $title     = $product['product_title'];
        $slug      = $product['product_slug'];
        $excerpt   = $product['product_excerpt'];
        $content   = $product['product_content'];
        $featureImage = get_image_url($product['product_image_id']);
        $comment_status = $product['comment_status'];
        $priceNew  = number_format($product['price_new'], 0, ',', '.');
        $priceOld  = ($product['price_old'] == 0) ? 0 : number_format($product['price_old'], 0, ',', '.');
        $list_post_image = decode_serialize($product['product_image']);
?>

<div class="container-menu nav-wrapper">
                  <div class="mp-pusher" id="mp-pusher">
                     
                     <!-- MENU MAIN -->
                     <div class="scroller">
                        <!-- this is for emulating position fixed of the nav -->
                        <div class="scroller-inner">
                           
                          
                           <script>
                              $(window).resize(function(){
                              	$('li.dropdown li.active').parents('.dropdown').addClass('active');
                              	if($('.right-menu').width() + $('#navbar').width() > $('.check_nav.nav-wrapper').width() - 40)
                              	{
                              		$('.container-mp.nav-wrapper').addClass('responsive-menu');
                              	}
                              	else{
                              		$('.container-mp.nav-wrapper').removeClass('responsive-menu');
                              	}
                              });
                              $('#navbar li').hover(function(){
                              	$(this).toggleClass('open');
                              });
                              $(document).on("click", "ul.mobile-menu-icon .dropdown-menu ,.drop-control .dropdown-menu, .drop-control .input-dropdown", function (e) {
                              	e.stopPropagation();
                              });
                           </script>
                           <main class="padding-top-mobile">
                              <!-- Go to www.addthis.com/dashboard to customize your tools -->
                              <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5694bad6853f9425" async="async"></script>
                              <div class="header-navigate">
                                 <div class="container">
                                    <div class="row">
                                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
                                          <ol class="breadcrumb breadcrumb-arrow">
                                             <li><a href="/" target="_self">Trang chủ</a></li>
                                             <li><i class="fa fa-angle-right"></i></li>
                                             <li class="active"><span>{{ $title }}</span></li>
                                          </ol>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="container">
                                 <div class="row">
                                    <div class="col-lg-7 col-md-5 col-sm-12 col-xs-12">
                                       <div id="surround">
                                          <div class="row">
                                             <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 box-image-featured pd5">
                                                <!--
                                                <img class="product-image-feature" style="display:none" src="{{ asset('template/giaodien6/asset/images/1446785237503_8851437_1024x1024.jpg') }}" alt="Tivi LED Samsung 40 inch UA40J5000AKXXV">
                                                -->
                                                <img class="product-image-feature" style="display:none" src="{{ $featureImage }}" alt="{{$title}}">
                                                <div class="lazy-load-ball lazy-product-featured">
                                                   <div class="uil-ring-css">
                                                      <div></div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 pd5">
                                                <div class="product-thumb-vertical" id="sliderproduct" style="display:none;">
                                                   <ul>
                                                      @if( count($list_post_image) > 0 )
                                                           @foreach( $list_post_image as $img )
                                                               <li class="product-thumb 1446785237503">
                                                                  <a href="javascript:void(0);" data-image="{{ get_image_url($img) }}">
                                                                  <img src="{{ get_image_url($img) }}" />
                                                                  </a>
                                                               </li>
                                                           @endforeach
                                                       @endif
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 pd5 information-product">
                                       <div class="product-title">
                                          <h1>{{ $title }}</h1>
                                       </div>
                                       <div class="product-price" id="price-preview">
                                          <span>{{ $priceNew }}₫</span>
                                       </div>
                                       <form id="add-item-form" action="{{ url('cart/order/'.$slug) }}" method="post" class="variants clearfix variant-style">
                                       <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                       <input type="hidden" id="product_id" name="product_id" value="{{$product_id}}">
                                        <input type="hidden" id="variant_id" name="variant_id" value="">
                                          <div class="select clearfix" style="display:none">
                                             <div class="selector-wrapper opt1">
                                                <label>Tiêu đề</label>
                                                <ul class="data-opt1 clearfix style-variant-template">
                                                </ul>
                                             </div>
                                             <style>
                                                .selector-wrapper:not(.opt1):not(.opt1-quickview):not(.opt2):not(.opt2-quickview):not(.opt3):not(.opt3-quickview) {
                                                display: none;
                                                }
                                             </style>
                                             <select id="product-select" name="id" style="display:none">
                                                <option value="1006543330">Default Title - 7,300,000₫</option>
                                             </select>
                                          </div>
                                          <div class="variant">
                                             @if(count($list_variant_id)>1)
                                                 <?php $i=1; ?>
                                                 @foreach($list_variant_name as $variant_name)
                                                     <?php $list_variant_value = get_variant_meta_product_detail( $variant_name , $product_id ) ?>
                                                     @if(count($list_variant_value)>1)
                                                     <div class="variant-name">{{$variant_name}}</div>
                                                     <input type="hidden" value="{{$variant_name}}" id="variant_name_{{$i}}">
                                                     <select name="variant_option_{{$i}}" id="variant_option_{{$i}}">
                                                         @foreach($list_variant_value as $value)
                                                              <option @if(in_array($value->variant_value,$list_variant_meta_value)) selected @endif value="{{$value->variant_value}}">{{$value->variant_value}}</option>
                                                         @endforeach
                                                     </select>
                                                     <?php $i++; ?>
                                                     @endif
                                                     
                                                 @endforeach
                                             @endif
                                         </div>
                                          <div class="select-wrapper clearfix ">
                                             <label>Số lượng</label>
                                             <input type="button" value="-" onclick="minusQuantity()" class="qty-btn">
                                             <input type="text" id="quantity" name="quantity" value="1" min="1" class="quantity-selector">
                                             <input type="button" value="+" onclick="plusQuantity()" class="qty-btn">
                                          </div>
                                          <div class="clearfix button-submit">
                                             <button class="btn-style-add addtocart-modal" type="submit">Thêm vào giỏ</button>
                                             
                                          </div>
                                       </form>
                                       <div class="information-more">
                                          <strong>{{ $information_more['heading'] }}</strong>
                                          <ul>
                                             <?php unset($information_more['heading']); ?>
                                             @foreach( $information_more as $row )
                                             <li><i class="fa fa-check"></i> {{ $row['text'] }}</li>
                                             @endforeach
                                          </ul>
                                       </div>
                                       <?php $taxs = get_taxonomy_product_detail('product_tag', $slug) ?>
                                       @if( count($taxs) > 0 )
                                       <div class="tag-wrapper">
                                          <label>
                                          Tags:
                                          </label>
                                          <ul class="tags">
                                             @foreach($taxs as $tax)
                                             <li>
                                                <a href="{{ url('collections/'.$tax->taxonomy_slug) }}">{{ $tax->taxonomy_name }}</a>
                                             </li>
                                             @endforeach
                                          </ul>
                                       </div>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="row flex-order">
                                    <div class="col-md-3 col-sm-4 col-xs-12 flex-left pd5">
                                       <?php
                                         $products = get_product_tax_limit($product_type_3,$product_slug_3,12);
                                         $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                                         if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                                       ?>
                                       <!-- Sản phẩm mới -->
                                       @if( $products )
                                       <div class="box-group-collection mb10">
                                          <div class="group-collection-title">
                                             <span>{{ $headingText }}</span>
                                          </div>
                                          <div class="owl-carousel position-owlCarousel" id="group-collection-slide">
                                             <?php
                                                $i = 0;
                                                $count = count($products);
                                             ?>
                                             @foreach( $products as $product )
                                             @if( $i%4 == 0 )
                                             <div class="item">
                                             @endif
                                                <div class="information-group-collection clearfix">
                                                   <div class="col-xs-4 pd-none-l">
                                                      <a href="{{ url('collections/'.$product['product_slug']) }}">
                                                      <img src="{{ get_image_url($product['product_image_id']) }}" />
                                                      </a>
                                                   </div>
                                                   <div class="col-xs-8 pd-none-l">
                                                      <a href="{{ url('collections/'.$product['product_slug']) }}">
                                                         <h2>
                                                            {{ $product['product_title'] }}
                                                         </h2>
                                                      </a>
                                                      <div class="information-group-collection-price">
                                                         <span>{{ number_format($product['price_new'],0,'.','.') }}₫</span>
                                                      </div>
                                                   </div>
                                                </div>
                                             <?php $i++; ?>
                                             @if( $i%4 == 0)
                                             </div>
                                             @elseif( $count == $i )
                                             </div>
                                             @endif
                                             @endforeach
                                          </div>


                                          <script>
                                             var owl_tab = $('#group-collection-slide');
                                             owl_tab.owlCarousel({
                                                items:1,
                                                nav:true
                                             });
                                             owl_tab.find('.owl-next').html("<i class='fa fa-angle-right'></i>");
                                             owl_tab.find('.owl-prev').html("<i class='fa fa-angle-left'></i>");
                                          </script>   
                                       </div>
                                       @endif
                                       <!-- End -->
                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-12 flex-right pd5">
                                       <div class="product-comment">
                                          <!-- Nav tabs -->
                                          <ul class="product-tablist nav nav-tabs" id="tab-product-template">
                                             <li class="active">
                                                <a data-toggle="tab" data-spy="scroll" href="#description">
                                                <span> Mô tả sản phẩm</span>
                                                </a>
                                             </li>
                                             <li>
                                                <a data-toggle="tab" data-spy="scroll" href="#comment">
                                                <span>Bình luận</span>
                                                </a>
                                             </li>
                                             <li>
                                                <a data-toggle="tab" data-spy="scroll" href="#product-related">
                                                <span>
                                                Sản phẩm cùng nhóm
                                                </span>
                                                </a>
                                             </li>
                                          </ul>
                                          <!-- Tab panes -->
                                          <div id="description">
                                             <div class="container-fluid product-description-wrapper">
                                                <p class="col-md-12">{!! $content !!}</p>
                                             </div>
                                          </div>
                                          <div id="comment">
                                             <div class="box-group-collection">
                                                <div class="group-collection-title">
                                                   <span>Bình luận</span>
                                                </div>
                                             </div>
                                             <div class="container-fluid">
                                                <div class="row">
                                                   <div id="fb-root"></div>
                                                   <div class="fb-comments" data-href="{{url('collections/'.$slug)}}" data-numposts="5" width="100%" data-colorscheme="light"></div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Sản phẩm liên quan -->
                                          <?php $products = get_product_related('product_category', $slug, 8 ) ?>
                                          @if( $products )
                                          <div id="product-related">
                                             <div class="box-group-collection">
                                                <div class="group-collection-title">
                                                   <span>
                                                   Sản phẩm cùng nhóm
                                                   </span>
                                                </div>
                                             </div>
                                             <div class="clearfix">
                                                <div class="product-lists">
                                                   <div class="owl-carousel">
                                                      @foreach( $products as $product )
                                                      <div class="item product-item box-product-lists">
                                                         <div class="product-wrapper product-resize" style="margin: 1px 0px;">
                                                            <div class="product-information">
                                                               <div class="product-detail">
                                                                  <div class="product-image image-resize">
                                                                     <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                                                     <img class="respon-owlCarousel" src="{{ get_image_url($product['product_image_id']) }}" alt="Internet TV LED Sony 32 inch 32W600D" />
                                                                     </a>  
                                                                     <div class="label-product field-new countdown_1002078984" style="display: none">
                                                                        <span>new</span>
                                                                     </div>
                                                                  </div>
                                                                  <div class="product-info">
                                                                     <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                                                        <h2>
                                                                           {{ $product['product_title'] }}
                                                                        </h2>
                                                                     </a>
                                                                     <div class="price-info clearfix">
                                                                        <div class="price-new-old">
                                                                           <span>{{ number_format($product['price_new'],0,'.','.') }}&#8363;</span>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="product-buttons">
                                                                     <div>
                                                                        <a class="btn-detail hidden-xs quickview" href="javascript:void(0)" data-handle="/products/internet-tv-led-sony-32-inch-32w600d" title="">
                                                                        <i class="fa fa-eye"></i>
                                                                        </a>
                                                                        <a class="btn-addtocart" href="javascript:void(0)" onclick="order({{ $product['product_id'] }})" title="">Mua Ngay</a>
                                                                        <a class="btn-wishlist hidden-xs" href="/products/internet-tv-led-sony-32-inch-32w600d" title="">
                                                                        <i class="fa fa-heart"></i>
                                                                        </a>
                                                                        <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{ $product['product_id'] }}" enctype="multipart/form-data">
                                                                           <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                                           <input type="hidden" name="quantity" value="1" />
                                                                        </form>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      @endforeach
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <script>    
                                             var product_related = $('#product-related .owl-carousel');
                                             product_related.owlCarousel ({
                                                items:4,
                                                nav:true,
                                                margin:10,
                                                loop: true,
                                                responsive:{
                                                   0:{
                                                      items:2                       
                                                   },
                                                   768:{
                                                      items:3
                                                   },
                                                   992:{
                                                      items:4
                                                   },
                                                   1200:{
                                                      items:4
                                                   }
                                                }
                                             });
                                             product_related.find('.owl-next').css({"position":"absolute","right":"0","top":"40%"}).html("<svg class='svg-icon-size-30 svg-icon-bg svg-icon-inline' style='fill:#999'><use xlink:href='#icon-right-owlCarousel'></use></svg>");
                                             product_related.find('.owl-prev').css({"position":"absolute","left":"0","top":"40%"}).html("<svg class='svg-icon-size-30 svg-icon-bg svg-icon-inline' style='fill:#999'><use xlink:href='#icon-left-owlCarousel'></use></svg>");
                                             checkItemOwlShow($('#product-related'),'',4,4,3,2);      
                                          </script>
                                          <!-- End -->
                                          @endif
                                       </div>
                                    </div>
                                   
                                 </div>
                              </div>
                              <script>
                                 $(document).ready(function(){
                                 	if($(".product-thumb-vertical").length > 0 && $(window).width() >= 1200 ) {
                                 		$(".product-thumb-vertical").mThumbnailScroller({
                                 			axis:"y",
                                 			type:"click-thumb",
                                 			theme:"buttons-out",
                                 			type:"hover-precise",
                                 			contentTouchScroll: true
                                 		});
                                 		$('.product-thumb-vertical').css('height',$('.product-image-feature').height());
                                 		$('#sliderproduct').show();	
                                 	}
                                 	if($(".product-thumb-vertical").length > 0 && $(window).width() < 1200 ) {
                                 		$(".product-thumb-vertical").mThumbnailScroller({
                                 			axis:"x",
                                 			theme:"buttons-out",
                                 			contentTouchScroll: true
                                 		});
                                 		$('#sliderproduct').show();
                                 	}
                                 });
                              </script>
                              <script>
                                 var product = {"available":true,"compare_at_price_max":0.0,"compare_at_price_min":0.0,"compare_at_price_varies":false,"compare_at_price":0.0,"content":null,"description":null,"featured_image":"http://hstatic.net/851/1000080851/1/2016/4-14/1446785237503_8851437.jpg","handle":"tivi-led-samsung-40-inch-ua40j5000akxxv","id":1002078964,"images":["http://hstatic.net/851/1000080851/1/2016/4-14/1446785237503_8851437.jpg","http://hstatic.net/851/1000080851/1/2016/4-14/1446785242309_9524188.jpg"],"options":["Tiêu đề"],"price":730000000.0,"price_max":730000000.0,"price_min":730000000.0,"price_varies":false,"tags":["tivi"],"template_suffix":null,"title":"Tivi LED Samsung 40 inch UA40J5000AKXXV","type":"Khác","url":"/products/tivi-led-samsung-40-inch-ua40j5000akxxv","pagetitle":"Tivi LED Samsung 40 inch UA40J5000AKXXV","metadescription":null,"variants":[{"id":1006543330,"barcode":null,"available":true,"price":730000000.0,"sku":null,"option1":"Default Title","option2":"","option3":"","options":["Default Title"],"inventory_quantity":1,"old_inventory_quantity":1,"title":"Default Title","weight":0.0,"compare_at_price":0.0,"inventory_management":null,"inventory_policy":"deny","selected":false,"url":null,"featured_image":{"id":1019698320,"created_at":"0001-01-01T00:00:00","position":1,"product_id":1002078964,"updated_at":"0001-01-01T00:00:00","src":"http://hstatic.net/851/1000080851/1/2016/4-14/1446785237503_8851437.jpg","variant_ids":[1006543330]}}],"vendor":"SamSung","published_at":"2016-04-14T17:12:56.343Z","created_at":"2016-04-14T17:13:27.605Z"};
                                 var selectCallback = function(variant, selector) {
                                 	if (variant && variant.available) {
                                 		$('.product-image-feature').hide();
                                 		$('.lazy-product-featured').show();
                                 		$(".product-thumb").children('a.zoomGalleryActive').removeClass('zoomGalleryActive');
                                 		if(variant != null && variant.featured_image != null){
                                 			$(".product-thumb a[data-image='"+Haravan.resizeImage(variant.featured_image.src,'1024x1024')+"']").click();
                                 		}
                                 		$('.lazy-product-featured').hide();
                                 		$('.product-image-feature').show();
                                 		if (variant.sku != null ){
                                 			jQuery('#pro_sku').html('SKU: ' +variant.sku);
                                 		}
                                 		jQuery('.addtocart-modal').removeAttr('disabled');
                                 		jQuery('.addnow').removeAttr('disabled');
                                 		if(variant.price < variant.compare_at_price){
                                 			jQuery('#price-preview').html("<span>" + Haravan.formatMoney(variant.price, "{{$priceNew}}₫") + "</span><del>" + Haravan.formatMoney(variant.compare_at_price, "{{$priceNew}}₫") + "</del>");
                                 			var pro_sold = variant.price ;
                                 			var pro_comp = variant.compare_at_price / 100;
                                 			var sale = 100 - (pro_sold / pro_comp) ;
                                 			var kq_sale = Math.round(sale);
                                 			jQuery('#surround .product-sale span').html("<label class='sale-lb'>Sale</label> "+ kq_sale + '%');
                                 		} else {
                                 			jQuery('#price-preview').html("<span>" + Haravan.formatMoney(variant.price, "{{$priceNew}}₫" + "</span>"));
                                 		}
                                 	} else {
                                 		jQuery('.addtocart-modal').attr('disabled', 'disabled');
                                 		jQuery('.addnow').attr('disabled', 'disabled');
                                 		var message = variant ? "Hết hàng" : "Không có hàng";
                                 		jQuery('#price-preview').html('<span>' + message + '</span>');
                                 		$('.lazy-product-featured').hide();
                                 		$('.product-image-feature').show();
                                 	}
                                 };
                                 jQuery(document).ready(function($){
                                 	
                                 	$('.lazy-product-featured').hide();
                                 	 $('.product-image-feature').show();
                                 	
                                 			// Xữ lý render variant
                                 			if ($('#add-item-form select[data-option=option1] option').length > 0) {
                                 				var checked = $('select[data-option=option1]').val();
                                 				$('select[data-option=option1] option').each(function(){					
                                 					var arr_opt = '';
                                 					var opt_select_1 = $(this).val();
                                 					$.each(product.variants,function(i, v){						
                                 						var opt1 = v.option1;
                                 						if(opt_select_1 == opt1 && v.available ){			
                                 							arr_opt = arr_opt + ' ' + slug(v.option1);
                                 						}
                                 					});
                                 					if ( arr_opt == '' ) {
                                 						arr_opt = 'hidden';
                                 					}
                                 					if ( $(this).val() == checked ) {
                                 						$('.data-opt1').append("<li class='" + arr_opt + "'><label><input checked='checked' type='radio' value='" + $(this).val() + "' name='option1'><span>" + $(this).val() + "</span></label></li>");
                                 					} else {
                                 						$('.data-opt1').append("<li class='" + arr_opt + "'><label><input type='radio' value='" + $(this).val() + "' name='option1'><span>" + $(this).val() + "</span></label></li>");
                                 					}
                                 				});				
                                 			}
                                 			 if ($('#add-item-form select[data-option=option2] option').length > 0) {
                                 				 var checked = $('select[data-option=option2]').val();
                                 				 $('select[data-option=option2] option').each(function(){					 
                                 					 var arr_opt = '';					 
                                 					 var opt_select_2 = $(this).val();
                                 					 $.each(product.variants,function(i, v){						
                                 						 var opt2 = v.option2;
                                 						 if(opt_select_2 == opt2 && v.available ){			
                                 							 arr_opt = arr_opt + ' ' + slug(v.option1);
                                 						 }
                                 					 });
                                 					 if ( $(this).val() == checked ) {
                                 						 $('.data-opt2').append("<li class='" + arr_opt + "'><label><input checked='checked' type='radio' value='" + $(this).val() + "' name='option2'><span>" + $(this).val() + "</span></label></li>");
                                 					 } else {
                                 						 $('.data-opt2').append("<li class='" + arr_opt + "'><label><input type='radio' value='" + $(this).val() + "' name='option2'><span>" + $(this).val() + "</span></label></li>");
                                 					 }					 
                                 				 });
                                 			 }
                                 			 if ($('#add-item-form select[data-option=option3] option').length > 0) {
                                 				 var checked = $('select[data-option=option3]').val();
                                 				 $('select[data-option=option3] option').each(function(){
                                 					 var arr_opt = '';					 
                                 					 var opt_select_3 = $(this).val();
                                 					 $.each(product.variants,function(i, v){						
                                 						 var opt3 = v.option3;
                                 						 if(opt_select_3 == opt3 && v.available ){			
                                 							 arr_opt = arr_opt + ' ' + slug(v.option1 + '-' + v.option2);							 
                                 						 }
                                 					 });
                                 					 if ( $(this).val() == checked ) {
                                 						 $('.data-opt3').append("<li class='" + arr_opt + "'><label><input checked='checked' type='radio' value='" + $(this).val() + "' name='option3'><span>" + $(this).val() + "</span></label></li>");
                                 					 } else {
                                 						 $('.data-opt3').append("<li class='" + arr_opt + "'><label><input type='radio' value='" + $(this).val() + "' name='option3'><span>" + $(this).val() + "</span></label></li>");
                                 					 }					 
                                 				 });
                                 			 }
                                 			 jQuery(document).on('click', '#add-item-form ul.data-opt1 li', function(){				
                                 				 var v_opt1 = jQuery(this).find('span').html();
                                 				 jQuery('#add-item-form select[data-option=option1]').val(v_opt1).change();
                                 				 if( jQuery('#add-item-form ul.data-opt2 li:visible').length > 0 ) {
                                 					 jQuery('#add-item-form ul.data-opt2 li').hide();
                                 					 jQuery('#add-item-form ul.data-opt2 li.' + slug(v_opt1)).show();
                                 					 jQuery('#add-item-form ul.data-opt2 li:visible label')[0].click();
                                 				 }
                                 			 });
                                 			 jQuery(document).on('click', '#add-item-form ul.data-opt2 li', function(){
                                 				 var v_opt1 = slug(jQuery('#add-item-form select[data-option=option1]').val());
                                 				 var v_opt2 = jQuery(this).find('span').html();
                                 				 var both_v_opt = v_opt1 + '-' + slug(v_opt2);
                                 				 jQuery('#add-item-form select[data-option=option2]').val(v_opt2).change();
                                 				 if( jQuery('#add-item-form ul.data-opt3 li:visible').length > 0 ) {
                                 					 jQuery('#add-item-form ul.data-opt3 li').hide();
                                 					 jQuery('#add-item-form ul.data-opt3 li.' + both_v_opt).show();
                                 					 jQuery('#add-item-form ul.data-opt3 li:visible label')[0].click();
                                 				 }
                                 			 });
                                 			 jQuery(document).on('click', '#add-item-form ul.data-opt3 li', function(){
                                 				 var v_opt3 = $(this).find('span').html();
                                 				 jQuery('#add-item-form select[data-option=option3]').val(v_opt3).change();
                                 			 });	
                                 			
                                 			 
                                 			 
                                 			});
                                 
                                 			if($(".product-thumb-vertical").length > 0 && $(window).width() >= 1200 ) {
                                 				jQuery(".product-image-feature").elevateZoom({
                                 					gallery:'sliderproduct',
                                 					scrollZoom : true
                                 				});
                                 			}
                                 			if($(".product-thumb-vertical").length > 0 && $(window).width() < 1200 ) {
                                 				jQuery(".product-image-feature").elevateZoom({
                                 					gallery:'sliderproduct',
                                 					zoomEnabled : false
                                 				});
                                 			}
                                 			
                              </script>
                           </main>
 <script type="text/javascript">
        function order(i)
        {
          $("#form_order_"+i).submit();   
        }
      </script>
<script>
      $('#variant_option_1, #variant_option_2, #variant_option_3').change(function(){
             var data = {};
             var product_id   = $('#product_id').val();
             var token      = $('input[name="_token"]').val();
             var variant_value_1 = $('select[name="variant_option_1"]').val(); 
             var variant_value_2 = $('select[name="variant_option_2"]').val(); 
             var variant_value_3 = $('select[name="variant_option_3"]').val();
             var variant_name_1 = $('#variant_name_1').val(); 
             var variant_name_2 = $('#variant_name_2').val(); 
             var variant_name_3 = $('#variant_name_3').val(); 
             
             if(variant_value_1 != 'undefined' && variant_value_1 != undefined){
                  data[variant_name_1] = variant_value_1;
             }
             if(variant_value_2 != 'undefined' && variant_value_2 != undefined ){
                  data[variant_name_2] = variant_value_2;
             }
             if(variant_value_3 != 'undefined' && variant_value_3 != undefined ){
                  data[variant_name_3] = variant_value_3;
             }
             $.ajax({
                  type      : "POST",
                  url       : '/collections/get_variant_price',
                  dataType  : 'json',
                  data      : {"_token" : token,"variant_meta" : data, 'product_id': product_id},
                  success: function(data){
                      product_meta = data;
                      if(data ==0){
                          $('.product-image-feature').attr('src','');
                          $('.button-submit').html('<button class="btn-style-add addtocart-modal" type="button">Hết hàng</button>');
                          $('.price-box-small').html('<span class="old-price"> 0đ'); 
                          $('.product-price').html('<span itemprop="price" class="special-price" style="font-size: 18px;">0đ');
                          $('.old-price').html('<span id="old-price-48" class="price" display="none">');
                      }else{
                          $('.product-image-feature').attr('src',data.image);
                          $('.price-box-small').html('<span class="old-price">'+data.price_old); 
                          $('.product-price').html('<span>'+data.price_new+'</span>');
                          $('.button-submit').html('<button class="btn-style-add addtocart-modal" type="submit">Thêm vào giỏ</button>');
                          $('#variant_id').val(data.variant_id);
                      }    
                  },
              });
      });
          
  </script>

@stop