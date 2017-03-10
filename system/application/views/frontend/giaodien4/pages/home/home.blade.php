@extends('frontend.giaodien4.layouts.default')
@section('content')
<script>
   //<![CDATA[
   var CUSTOMMENU_POPUP_EFFECT = 0;
   var CUSTOMMENU_POPUP_TOP_OFFSET = 65;
   //]]>
</script>
<script>
   $(window).resize(function(){
      $('li.dropdown li.active').parents('.dropdown').addClass('active');
      if($('.right-menu').width() + $('#navbar').width() > $('.check_nav.nav-wrapper').width() - 40)
      {
         $('.container-mp.nav-wrapper').addClass('responsive-menu');
      }
      else
      {
         $('.container-mp.nav-wrapper').removeClass('responsive-menu');
      }
   })
   $(document).on("click", "ul.mobile-menu-icon .dropdown-menu ,.drop-control .dropdown-menu, .drop-control .input-dropdown", function (e) {
      e.stopPropagation();
   });
</script>
<script>
   var viewout = true;
   $(document).ready(function(){
      $('.icon_search').hover(function() {
         $('#search_block_top').stop().slideDown();
      }, function() {
         setTimeout(function() {
            if(viewout) $('#search_block_top').stop().slideUp();
         }, 500)
      })
      $('#search_block_top').hover(function() {
         viewout = false;
      }, function() {
         viewout = true;
         $('#search_block_top').stop().slideUp();
      })
   });
</script>

<!-- end menu -->

<!-- slider -->
<div class="home-index-hero">
   <div class="home-hero-container container">
      <div class="home-hero">
         <div class="home-hero-slider">
            <!-- Begin slider -->
            <div class="slider-default col-md-12 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="flexslider-container">
                     <div class="flexslider">
                        <ul class="slides">
                              <?php $slider = isset($slider) ? $slider: []; ?>
                              @foreach( $slider as $row )
                              <li>
                                 <a href="{{ $row['url'] }}"><img src="{{ $row['image'] }}" /></a>
                              </li>
                              @endforeach
                          </ul>
                          <div class="flex-controls"></div>
                       </div>
                    </div>
                 </div>
              </div>
              <!-- End slider -->
           </div>
            
            <!--menu left-->
           <div class="home-hero-menu">


<nav id="main-nav" role="navigation">
   <ul id="main-menu" class="sm sm-vertical sm-blue">
      <?php $slider_menu = isset($slider_menu) ? $slider_menu: []; ?>
      @foreach( $slider_menu as $row )
      <li><a href="{{ $row['url'] }}">{{ $row['title'] }}</a></li>
      @endforeach
   </ul>
</nav>


           </div>
             <!--end menu left-->
            
        </div>
     </div>
    
     <div class="container">
        <div class="row box-span12">
           <div class="col-lg-3 col-sm-12 col-md-3 col-lg-span3">
              <div class="home-hero-sub">
                 <div class="span4">
                    <ul class="home-channel-list clearfix">
                        @foreach( $channel as $row )
                        <li class="top left"><a href="{{ $row['url'] }}"><img src="{{ $row['image'] }}">{{ $row['title'] }}</a></li>
                        @endforeach
                    </ul>
                 </div>
              </div>
           </div>
           <div class="col-lg-9  col-sm-12  col-lg-span9 col-md-9 hidden-xs">
              <ul class="home-promo-list clearfix">
                 <li class="first">
                    <a class="item" href="{{ $firstBanner['url'] }}" ><img alt="" src="{{ $firstBanner['image'] }}"></a>
                 </li>
                 <li>
                    <a class="item" href="{{ $secondBanner['url'] }}"><img alt="" src="{{ $secondBanner['image'] }}"></a>
                 </li>
                 <li>
                    <a class="item" href="{{ $thirdBanner['url'] }}"><img alt="" src="{{ $thirdBanner['image'] }}"></a>
                 </li>
              </ul>
           </div>
        </div>
     </div>
     <!-- home-star-goods -->
  </div>
<!-- end slider -->

<!-- san phảm -->
 <div class="container">
    <div class="home-star-goods">
       <div class="box-hd-title">
         <?php
            $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
            if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
         ?>
          <h2 class="title">{{ $headingText }}</h2>
       </div>
        
        
       <div class="row box-bd-content">
          <div class="col-lg-12 content-product-list" id="rainbow-list">
         <?php $products = get_product_tax_limit($product_type_1,$product_slug_1,10); ?>
         @if( $products )
            @foreach( $products as $product )
             <div class="item">
                <!--sử dụng  -->
                <div class="product-block product-resize rainbow_0">
                   <div class="product-img image-resize view view-third clearfix">
                      @if($product['check_discount'])
                      <div class="product-sale" >
                         <span><label class="sale-lb">-</label> {{$product['percentage']}}%</span>
                      </div>
                      @endif
                      <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                      <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}" />
                      </a>
                   </div>
                   <div class="product-detail clearfix">
                      <h3 class="pro-name"><a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">{{ $product['product_title'] }}</a></h3>
                      <!-- sử dụng pull-left -->
                      <div class="content_price">
                         <p class="pro-price">{{ number_format($product['price_new'],0,'.','.') }}₫</p>
                         @if($product['price_old'])
                         <p class="pro-price-del"><del class="compare-price">{{ number_format($product['price_old'],0,'.','.') }}₫</del></p>
                         @endif
                      </div>
                      <div class="actions clearfix">
                         <!-- <a class="btn-like mask-view" href="#" data-handle="/products/pin-sac-du-phong-10000-mah-x-mobile" ><i class="fa fa-bar-chart"></i><span>Xem nhanh</span></a> -->
                         <a class="btn-buy ajax_add_to_cart " data-variant="1004706200" onclick="order({{ $product['product_id'] }})" href="javascript:void(0);">
                         <span> + Thêm vào giỏ </span> <i class="shoppping-cart"><img src=//hstatic.net/796/1000055796/1000090795/Capture.PNG?v=138></i></a> 
                         <form id="form_order_{{ $product['product_id'] }}" action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <input type="hidden" name="quantity" value="1" />
                          </form>
                      </div>
                   </div>
                </div>
             </div>
            @endforeach
         @endif
          </div>
       </div>
    </div>
 </div>
<!-- End sản phẩm -->

<!-- Sản phẩm mới -->
<div class="page-main home-main">
<div class="container">
 <!--dong the bai viet moi-->
    
<div class="home-brick-box">
    <div class="box-hd-title">
      <?php
         $headingText = get_taxonomy_name($product_type_2,$product_slug_2);
         if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
      ?>
       <h2 class="title">{{ $headingText }}</h2>
    </div>
    <div class="row box-bd-content">
       <div class="col-lg-3 col-lg-span3 hidden-xs">
          <div class="banner-left">
             <a href="{{ $fourthBanner['url'] }}">
             <img src="{{ $fourthBanner['image'] }}">
             </a>
          </div>
       </div>
       <div class="col-lg-9 col-lg-span9 col-xs-12">
          <div class="row-span content-product-list">
            <?php $products = get_product_tax_limit($product_type_2,$product_slug_2,8); ?>
            @if( $products )
            @foreach( $products as $product )
             <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12 pro-loop  ">
                <!--sử dụng  -->
                <div class="product-block product-resize">
                   <div class="product-img image-resize view view-third clearfix">
                      @if($product['check_discount'])
                      <div class="product-sale" >
                         <span><label class="sale-lb">-</label> {{$product['percentage']}}%</span>
                      </div>
                      @endif
                      <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                      <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}" />
                      </a>
                   </div>
                   <div class="product-detail clearfix">
                      <h3 class="pro-name"><a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">{{ $product['product_title'] }}</a></h3>
                      <!-- sử dụng pull-left -->
                      <div class="content_price">
                         <p class="pro-price">{{ number_format($product['price_new'],0,'.','.') }}₫</p>
                         @if($product['price_old'])
                         <p class="pro-price-del"><del class="compare-price">{{ number_format($product['price_old'],0,'.','.') }}₫</del></p>
                         @endif
                      </div>
                      <div class="actions clearfix">
                         <!-- <a class="btn-like mask-view" href="#" data-handle="/products/xiaomi-redmi-note-3" ><i class="fa fa-bar-chart"></i><span>Xem nhanh</span></a> -->
                         <a class="btn-buy ajax_add_to_cart " data-variant="1004703251" onclick="order({{ $product['product_id'] }})" href="javascript:void(0);">
                         <span> + Thêm vào giỏ </span> <i class="shoppping-cart"><img src=//hstatic.net/796/1000055796/1000090795/Capture.PNG?v=138></i></a> 
                         <form id="form_order_{{ $product['product_id'] }}" action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <input type="hidden" name="quantity" value="1" />
                          </form>
                      </div>
                   </div>
                </div>
             </div>
            @endforeach
            @endif
          </div>
          <div class="read_more">
             <a class="more-link" href="{{ url('collections/'.$product_slug_2) }}">Xem thêm<i class="fa fa-angle-right"></i>
             </a>
          </div>
       </div>
    </div>
 </div>
<!-- End sản phẩm mới -->

<!-- Của hàng -->
<div class="home-brick-box">
   <div class="product_tabs_slider">
      <div class="box-hd-title">
         <!-- <h2 class="title">IN OUR STORE</h2> -->
         <ul class="tabs tab-list">
            <li class=" active " rel="tab_feature_product">
               <?php
                  $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
               ?>
               <h3>{{ $headingText }}</h3>
            </li>
            <li class="" rel="tab_besseller_product">
               <?php
                  $headingText = get_taxonomy_name($product_type_4,$product_slug_4);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
               ?>
               <h3>{{ $headingText }}</h3>
            </li>
            <li class="" rel="tab_new_product">
               <?php
                  $headingText = get_taxonomy_name($product_type_5,$product_slug_5);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
               ?>
               <h3>{{ $headingText }}</h3>
            </li>
         </ul>
      </div>
      <div class="row box-bd-content">
         <div class="col-lg-3 col-lg-span3 hidden-xs">
            <div class="list-banner-1 banner-left">
               <a href="{{ $fifthBanner['url'] }}">
               <img src="{{ $fifthBanner['image'] }}">
               </a>
            </div>
            <div class="list-banner-2 banner-left">
               <a href="{{ $sixthBanner['url'] }}">
               <img src="{{ $sixthBanner['image'] }}">
               </a>
            </div>
         </div>
         <div class="col-lg-9 col-lg-span9 col-xs-12">
            <div class="row-span">
               <div class="tab_container">
                  <div class="row_edited content-product-list">
                     <div id="tab_feature_product" class="tab_content">
                        <div id="tab_feature_product_in" class="tabSlide">
                           <?php $products = get_product_tax_limit($product_type_3,$product_slug_3,8); ?>
                           @if( $products )
                           @foreach( $products as $product )
                           <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12 pro-loop  ">
                              <!--sử dụng  -->
                              <div class="product-block product-resize">
                                 <div class="product-img image-resize view view-third clearfix">
                                   @if($product['check_discount'])
                                    <div class="product-sale" >
                                       <span><label class="sale-lb">-</label> {{$product['percentage']}}%</span>
                                    </div>
                                    @endif
                                    <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                    <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}" />
                                    </a>
                                 </div>
                                 <div class="product-detail clearfix">
                                    <h3 class="pro-name"><a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">{{ $product['product_title'] }}</a></h3>
                                    <!-- sử dụng pull-left -->
                                    <div class="content_price">
                                       <p class="pro-price">{{ number_format($product['price_new'],0,'.','.') }}₫</p>
                                        @if($product['price_old'])
                                       <p class="pro-price-del"><del class="compare-price">{{ number_format($product['price_old'],0,'.','.') }}₫</del></p>
                                        @endif
                                    </div>
                                    <div class="actions clearfix">
                                       <!-- <a class="btn-like mask-view" href="#" data-handle="/products/qua-tang-1" ><i class="fa fa-bar-chart"></i><span>Xem nhanh</span></a> -->
                                       <a class="btn-buy ajax_add_to_cart " data-variant="1004845499" onclick="order({{ $product['product_id'] }})" href="javascript:void(0);">
                                       <span> + Thêm vào giỏ </span> <i class="shoppping-cart"><img src=//hstatic.net/796/1000055796/1000090795/Capture.PNG?v=138></i></a> 
                                       <form id="form_order_{{ $product['product_id'] }}" action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                          <input type="hidden" name="quantity" value="1" />
                                      </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="row_edited content-product-list">
                     <div id="tab_besseller_product" class="tab_content">
                        <div id="tab_besseller_product_in" class="tabSlide">
                           <?php $products = get_product_tax_limit($product_type_4,$product_slug_4,8); ?>
                           @if( $products )
                           @foreach( $products as $product )
                           <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12 pro-loop  ">
                              <!--sử dụng  -->
                              <div class="product-block product-resize">
                                 <div class="product-img image-resize view view-third clearfix">
                                    @if($product['check_discount'])
                                    <div class="product-sale" >
                                       <span><label class="sale-lb">-</label> {{$product['percentage']}}%</span>
                                    </div>
                                    @endif
                              
                                    <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                    <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}" />
                                    </a>
                                 </div>
                                 <div class="product-detail clearfix">
                                    <h3 class="pro-name"><a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">{{ $product['product_title'] }}</a></h3>
                                    <!-- sử dụng pull-right -->
                                    <div class="content_price">
                                       <p class="pro-price">{{ number_format($product['price_new'],0,'.','.') }}₫</p>
                                        @if($product['price_old'])
                                       <p class="pro-price-del"><del class="compare-price">{{ number_format($product['price_old'],0,'.','.') }}₫</del></p>
                                        @endif
                                    </div>
                                    <div class="actions clearfix">
                                       <!-- <a class="btn-like mask-view" href="#" data-handle="/products/qua-tang-1" ><i class="fa fa-bar-chart"></i><span>Xem nhanh</span></a> -->
                                       <a class="btn-buy ajax_add_to_cart " data-variant="1004845499" onclick="order({{ $product['product_id'] }})" href="javascript:void(0);">
                                       <span> + Thêm vào giỏ </span> <i class="shoppping-cart"><img src=//hstatic.net/796/1000055796/1000090795/Capture.PNG?v=138></i></a> 
                                       <form id="form_order_{{ $product['product_id'] }}" action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                          <input type="hidden" name="quantity" value="1" />
                                      </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="row_edited content-product-list">
                     <div id="tab_new_product" class="tab_content">
                        <div id="tab_new_product_in" class="tabSlide">
                           <?php $products = get_product_tax_limit($product_type_5,$product_slug_5,8); ?>
                           @if( $products )
                           @foreach( $products as $product )
                           <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12 pro-loop  ">
                              <!--sử dụng  -->
                              <div class="product-block product-resize">
                                 <div class="product-img image-resize view view-third clearfix">
                                    @if($product['check_discount'])
                                    <div class="product-sale" >
                                       <span><label class="sale-lb">-</label> {{$product['percentage']}}%</span>
                                    </div>
                                    @endif
                                    <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                    <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}" />
                                    </a>
                                 </div>
                                 <div class="product-detail clearfix">
                                    <h3 class="pro-name"><a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">{{ $product['product_title'] }}</a></h3>
                                    <!-- sử dụng pull-left -->
                                    <div class="content_price">
                                       <p class="pro-price">{{ number_format($product['price_new'],0,'.','.') }}₫</p>
                                        @if($product['price_old'])
                                       <p class="pro-price-del"><del class="compare-price">{{ number_format($product['price_old'],0,'.','.') }}₫</del></p>
                                        @endif
                                    </div>
                                    <div class="actions clearfix">
                                       <!-- <a class="btn-like mask-view" href="#" data-handle="/products/tai-nghe-bluetooth-neva-hm7000" ><i class="fa fa-bar-chart"></i><span>Xem nhanh</span></a> -->
                                       <a class="btn-buy ajax_add_to_cart " data-variant="1004976148" onclick="order({{ $product['product_id'] }})" href="javascript:void(0);">
                                       <span> + Thêm vào giỏ </span> <i class="shoppping-cart"><img src=//hstatic.net/796/1000055796/1000090795/Capture.PNG?v=138></i></a> 
                                       <form id="form_order_{{ $product['product_id'] }}" action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                          <input type="hidden" name="quantity" value="1" />
                                      </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script type="text/javascript">
      $(document).ready(function() {
      $(".product_tabs_slider .tab_content").hide();
      $(".product_tabs_slider .navi").hide();
      $(".product_tabs_slider .tab_content:first").show(); 
      $(".product_tabs_slider .navi:first").show(); 
      $(".product_tabs_slider ul.tabs li").click(function() {
      $(".product_tabs_slider ul.tabs li").removeClass("active");
      $(this).addClass("active");
      $(".product_tabs_slider .tab_content").hide();
      $(".product_tabs_slider .navi").hide();
      var activeTab = $(this).attr("rel"); 
      $(".product_tabs_slider #"+activeTab).fadeIn(); 
      $(".product_tabs_slider ."+activeTab).fadeIn(); 
      });
      });
   </script>
</div>
<!-- End cửa hàng -->

<!-- Sản phẩm nổi bật -->
 <div class="home-brick-box home-brick-right">
    <div class="box-hd-title">
      <?php
         $headingText = get_taxonomy_name($product_type_6,$product_slug_6);
         if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
      ?>
       <h2 class="title">{{ $headingText }}</h2>
    </div>
    <div class="row box-bd-content">
       <div class="col-lg-12 content-product-list">
          <div id="plain-list">
            <?php $products = get_product_tax_limit($product_type_6,$product_slug_6,10); ?>
            @if( $products )
            @foreach( $products as $product )
             <div class="item">
                <!--sử dụng end -->
                <div class="product-block product-resize rainbow_0">
                   <div class="product-img image-resize view view-third clearfix">
                      @if($product['check_discount'])
                      <div class="product-sale" >
                         <span><label class="sale-lb">-</label> {{$product['percentage']}}%</span>
                      </div>
                      @endif
                      <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                      <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}" />
                      </a>
                   </div>
                   <div class="product-detail clearfix">
                      <h3 class="pro-name"><a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">{{ $product['product_title'] }}</a></h3>
                      <!-- sử dụng pull-right -->
                      <div class="content_price">
                         <p class="pro-price">{{ number_format($product['price_new'],0,'.','.') }}₫</p>
                         @if($product['price_old'])
                        <p class="pro-price-del"><del class="compare-price">{{ number_format($product['price_old'],0,'.','.') }}₫</del></p>
                         @endif
                      </div>
                      <div class="actions clearfix">
                         <!-- <a class="btn-like mask-view" href="#" data-handle="/products/tai-nghe-bluetooth-neva-hm7000" ><i class="fa fa-bar-chart"></i><span>Xem nhanh</span></a> -->
                         <a class="btn-buy ajax_add_to_cart " data-variant="1004976148" onclick="order({{ $product['product_id'] }})" href="javascript:void(0);">
                         <span> + Thêm vào giỏ </span> <i class="shoppping-cart"><img src=//hstatic.net/796/1000055796/1000090795/Capture.PNG?v=138></i></a> 
                         <form id="form_order_{{ $product['product_id'] }}" action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <input type="hidden" name="quantity" value="1" />
                          </form>
                      </div>
                   </div>
                </div>
             </div>
             @endforeach
             @endif
          </div>
       </div>
    </div>
 </div>
<!-- End sản phẩm nổi bật -->

<!-- Bài viết mới -->
 <div class="home-review-box">
        <div class="box-hd-title">
            <?php
              $posts = get_post_cat_limit($post_slug_1,4);
              $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
              if( $headingText == '' ) $headingText = 'Bài viết Mới';
            ?>
           <h2 class="title">
              {{ $headingText }}
           </h2>
        </div>
        <div class="box-bd-content list-articles-resize" >
           <div class="review-list row clearfix">
               @if($posts)
               @foreach($posts as $post)
              <div class="review-item article-resize col-lg-3 col-md-4 col-sm-4 col-xs-12">
                 <div class="review-itme-col">
                    <div class="figure figure-img image-article-resize">
                       <a href="{{ url($post->post_slug) }}">
                       <img src="{{ get_image_url($post->post_image) }}" >
                       </a>
                    </div>
                    <div class="blog_deatail">
                       <p class="review">
                          <a href="{{ url($post->post_slug) }}">{{ $post->post_title }}</a>
                       </p>
                       <p class="author">Ngày đăng: {{ date('d/m/Y',$post->post_date) }}</p>
                       <div class="info">
                          <a href="{{ url($post->post_slug) }}">Xem thêm</a>
                       </div>
                    </div>
                 </div>
              </div>
               @endforeach
              @endif
           </div>
        </div>
     </div>
     <script>
        var height_article = 0;
        jQuery('.list-articles-resize .article-resize').each(function(){
            if( jQuery(this).find('img').height() > height_article ) {
                    height_article = jQuery(this).find('.image-article-resize').height();
            }
        });
        jQuery('.list-articles-resize .article-resize .image-article-resize').css({'height':height_article ,'display':'table-cell','vertical-align':'middle'});
     </script>
          
 </div>
</div>
<!--dong the trong san pham moi--> 
<!-- End bài viết mới -->
<script type="text/javascript">
    function order(i)
    {
         $("#form_order_"+i).submit();   
    }
</script>

@stop