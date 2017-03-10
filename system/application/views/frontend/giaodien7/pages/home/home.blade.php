@extends('frontend.giaodien7.layouts.default')
@section('content')
     <div class="header-service">
         <div class="container">
            <div class="row">
              @foreach( $service as $row )
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-3">
                <div class="content">
                  <h5 class="txt_u">{{ $row['heading'] }}</h5>
                  <span class="cl_old">{{ $row['text'] }}</span>
                </div>
              </div>
              @endforeach
            </div>
         </div>
      </div>

<!--end header service-->

<div class="main-content index">
   <div class="container">
      <div class="row">
        <!-- Left -->
          <div class="col-lg-3 col-md-3 hidden-sm hidden-xs left-panel">
            <!-- Danh mục sản phẩm -->
            <?php $list_tax = get_taxonomy_product('product_category'); ?>
            @if( $list_tax )
            <div class="block bl_danhmucsanpham hidden-xs">
               <div class="block-title">
                  <h5>
                     <a href="collections/all">
                     <span>
                     <i class="fa fa-bars" aria-hidden="true"></i> &nbsp; Danh mục sản phẩm
                     </span>
                     </a>
                  </h5>
               </div>
               <div class="block-content">
                  <ul>
                    @foreach($list_tax as $tax)
                    <li class="level0 parent "><a href="{{ url('collections/'.$tax->taxonomy_slug) }}"><i class="fa fa-caret-right" aria-hidden="true"></i><span>{{ $tax->taxonomy_name }}</span></a></li>
                    @endforeach
                  </ul>
               </div>
            </div>
            @endif
            <!-- End Danh Mục Sản Phẩm -->
            <!-- Sản Phẩm Mới -->
            <?php
              $products = get_product_tax_limit($product_type_1,$product_slug_1,8);
              $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
              if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            @if( $products )
            <div class="sanphambanchay block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5 class="fw600"><span>{{ $headingText }}</span></h5>
               </div>
               <div class="block-content bd_old">
                  <div id="slideshowproboxwrapper">
                     <div class="slideshowprobox_best_sale_products">
                        <ul class="menu">
                          @foreach( $products as $product )
                           <li class="product-loop-list">
                              <div class="prd-loop-list">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 loop-img">
                                    <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                    <img src="{{ get_image_url($product['product_image_id']) }}" alt="{{ $product['product_title'] }}">
                                    </a>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 loop-content">
                                    <p class="item-name"><a href="/benro-a1681tb0">{{ $product['product_title'] }}</a></p>
                                    <p class="item-price cl_main fw600"><span>{{ number_format($product['price_new'],0,'.','.') }}₫</span></p>
                                    @if( $product['price_old'] > 0 )
                                    <p class="item-price cl_old txt_line fs12"><span>{{ number_format($product['price_old'],0,'.','.') }}₫</span></p>
                                    @endif
                                 </div>
                              </div>
                           </li>
                          @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            @endif
            <!-- End Sản Phẩm Mới -->
            <!--
            <div class="hotrotructuyen block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5 class="fw600"><span>Hỗ trợ trực tuyến</span></h5>
               </div>
               <div class="block-content bd_old pd_10">
                  <div class="support_loop">
                     <p class="fw600">Hỗ trợ bán hàng</p>
                     <p>Hotline<span class="cl_main">1900 6750</span></p>
                     <div class="support_loop_content">
                        <div class="support_loop_img">
                           <img src="//bizweb.dktcdn.net/thumb/thumb/100/091/136/themes/137517/assets/skype.png?1468549824886" height="24" width="50" alt="Skype">
                        </div>
                        <div class="support_loop_chat">
                           <span class="support_loop_style">Chat ngay để nhận tư vấn</span>
                        </div>
                     </div>
                  </div>
                  <div class="support_loop">
                     <p class="fw600">Hỗ trợ bán hàng</p>
                     <p>Hotline<span class="cl_main">1900 6750</span></p>
                     <div class="support_loop_content">
                        <div class="support_loop_img">
                           <img src="//bizweb.dktcdn.net/thumb/thumb/100/091/136/themes/137517/assets/skype.png?1468549824886" height="24" width="50" alt="Skype">
                        </div>
                        <div class="support_loop_chat">
                           <span class="support_loop_style">Chat ngay để nhận tư vấn</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            -->
            <div class="fanpage_facebook block mg_bt mg_top hidden-xs">
               <div class="block-content">
                  <div class="fb-page" data-href="{{ $facebook['url'] }}" data-tabs="timeline" data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                     <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/MOSEVN">
                           <a href="https://www.facebook.com/MOSEVN">Facebook</a>
                        </blockquote>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tin tức -->
            <?php
              $posts = get_post_cat_limit($post_slug_1,3);
              $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
              if( $headingText == '' ) $headingText = 'Bài viết Mới';
            ?>
            @if( $posts )
            <div class="news_blogs block mg_bt mg_top">
               <div class="block-title pd_bt_10">
                  <h5><a href="tin-tuc"><span class="fw600">{{ $headingText }}</span></a></h5>
               </div>
               <div class="block-content bd_old pd_10">
                  <div id="owl-news-blog" class="owl-carousel owl-theme">
                    @foreach( $posts as $post )
                    <?php
                      $username = (!empty($post->user_fullname)) ? $post->user_fullname : $post->user_email;
                      $excerpt = !empty($post->post_excerpt) ? get_excerpt($post->post_excerpt,30) : get_excerpt($post->post_content,30);
                    ?>
                    <div class="item blog-post">
                        <div class="blog-image">
                           <a href="{{ url($post->post_slug) }}"><img src="{{ get_image_url($post->post_image) }}" alt="{{ $post->post_title }}"/></a>
                        </div>
                        <div>
                           <h5 class="fw600"><a href="{{ url($post->post_slug) }}">{{ $post->post_title }}</a></h5>
                           <p class="cl_old fs13">
                              <span><i class="fa fa-user" aria-hidden="true"></i> {{ $username }}</span> &nbsp;
                              <span><i class="fa fa-calendar" aria-hidden="true"></i> {{ date('d/m/Y',$post->post_date) }}</span>
                           </p>
                           <p class="cl_old">{{ $excerpt }}</p>
                        </div>
                     </div>
                    @endforeach
                  </div>
               </div>
            </div>
            @endif
            <!-- End Tin Tức -->
        </div>
        <!-- End -->
        
        <!-- Right -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 right-panel">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slide ">
                  <div id="magik-slideshow" class="magik-slideshow">
                     <div id="owl-slide" class="owl-carousel">
                        <?php $slider = isset($slider) ? $slider: []; ?>
                         @foreach( $slider as $row )
                         <div class="item"><a href="{{ $row['url'] }}"><img src="{{ $row['image'] }}"></a></div>
                         @endforeach
                     </div>
                  </div>
               </div>
               <!-- Sản Phẩm Mới -->
               <?php
                  $products = get_product_tax_limit($product_type_2,$product_slug_2,12);
                  $headingText = get_taxonomy_name($product_type_2,$product_slug_2);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                ?>
                @if( $products )
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block pd_0 mg_bt sanphambankhuyenmai" style="margin-top: 20px;">
                  <div class="block-title  pd_bt_10">
                     <h5 class="fw600"><span><a href="{{ url('collections/'.$product_slug_2) }}">{{ $headingText }}</a></span></h5>
                  </div>
                  <div class="block-content prd-loop">
                     <div id="promo-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 row">
                            <?php
                              $i = 0;
                              $count = count($products);
                            ?>
                            @foreach( $products as $product )
                            @if( $i%2 == 0 )
                           <div class="item">
                            @endif
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pd0">
                                 <div class="prd-loop-grid" style="margin: 10px 0;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loop-img">
                                       <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}"><img src="{{ get_image_url($product['product_image_id']) }}" title="{{ $product['product_title'] }}" alt="{{ $product['product_title'] }}"></a>
                                       <div class="view_buy hidden_xs">
                                          <div class="actions">
                                             <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <button class="btn btn-buy btn-cus add_to_cart" onclick="order({{$product['product_id']}})" title="Mua ngay"><span>Mua ngay</span></button>
                                             </form>
                                          </div>
                                          <button class="btn btn-view btn-cus" onclick="location.href='{{ url('collections/'.$product['product_slug']) }}'" title="Xem sản phẩm"><span>Xem chi tiết</span></button>
                                       </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loop-content">
                                       <p class="item-name txt_center"><a href="{{ url('collections/'.$product['product_slug']) }}">{{ $product['product_title'] }}</a></p>
                                       <p class="prc">
                                          <span class="item-price cl_main fw600">{{ number_format($product['price_new'],0,'.','.') }}₫</span>
                                          @if( $product['price_old'] > 0 )
                                          <span class="item-price cl_old txt_line">{{ number_format($product['price_old'],0,'.','.') }}₫</span>
                                          @endif
                                       </p>
                                    </div>
                                    @if($product['check_discount'])
                                    <div class="on_sale">
                                       <span>-{{ $product['percentage'] }}%</span>
                                    </div>
                                    @endif
                                 </div>
                              </div>
                            <?php $i++; ?>
                            @if( $i%2==0)
                            </div>
                            @elseif( $count == $i )
                            </div>
                            @endif
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               @endif
               <!-- End Sản Phẩm Mới -->
               <div class="col-lg-6 col-md-6 hidden-sm hidden-xs block-quangcao bl-qc-1">
                  <a href="{{ $firstBanner['url'] }}"><img src="{{ $firstBanner['image'] }}" /></a>
               </div>
               <div class="col-lg-6 col-md-6 hidden-sm hidden-xs block-quangcao bl-qc-2">
                  <a href="{{ $secondBanner['url'] }}"><img src="{{ $secondBanner['image'] }}" /></a>
               </div>
                <!-- Khuyến Mãi -->
                <?php
                  $products = get_product_tax_limit($product_type_3,$product_slug_3,12);
                  $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                ?>
                @if( $products )
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block pd_0 mg_bt mg_top sanphammoi">
                  <div class="block-title pd_bt_10">
                     <h5 class="fw600"><span><a href="{{ url('collections/'.$product_slug_3) }}">{{ $headingText }}</a></span></h5>
                  </div>
                  <div class="block-content prd-loop">
                     <div id="new-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4">
                            <?php
                              $i = 0;
                              $count = count($products);
                            ?>
                            @foreach( $products as $product )
                            @if( $i%2 == 0 )
                           <div class="item">
                            @endif
                              <div class="prd-loop-grid" style="margin: 10px 0;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loop-img">
                                       <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}"><img src="{{ get_image_url($product['product_image_id']) }}" title="{{ $product['product_title'] }}" alt="{{ $product['product_title'] }}"></a>
                                       <div class="view_buy hidden_xs">
                                          <div class="actions">
                                             <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <button class="btn btn-buy btn-cus add_to_cart" onclick="order({{$product['product_id']}})" title="Mua ngay"><span>Mua ngay</span></button>
                                             </form>
                                          </div>
                                          <button class="btn btn-view btn-cus" onclick="location.href='{{ url('collections/'.$product['product_slug']) }}'" title="Xem sản phẩm"><span>Xem chi tiết</span></button>
                                       </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loop-content">
                                       <p class="item-name txt_center"><a href="{{ url('collections/'.$product['product_slug']) }}">{{ $product['product_title'] }}</a></p>
                                       <p class="prc">
                                          <span class="item-price cl_main fw600">{{ number_format($product['price_new'],0,'.','.') }}₫</span>
                                          @if( $product['price_old'] > 0 )
                                          <span class="item-price cl_old txt_line">{{ number_format($product['price_old'],0,'.','.') }}₫</span>
                                          @endif
                                       </p>
                                    </div>
                                    @if($product['check_discount'])
                                    <div class="on_sale">
                                       <span>-{{ $product['percentage'] }}%</span>
                                    </div>
                                    @endif
                                 </div>
                            <?php $i++; ?>
                            @if( $i%2==0)
                            </div>
                            @elseif( $count == $i )
                            </div>
                            @endif
                            @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               @endif
               <!-- End Khuyến Mãi -->
               <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs block-quangcao bl-qc-3">
                  <a href="{{ $thirdBanner['url'] }}"><img src="{{ $thirdBanner['image'] }}"/></a>
               </div>

                <!-- Sản Phẩm Xem Nhiều -->
                <?php
                  $products = get_product_tax_limit($product_type_4,$product_slug_4,12);
                  $headingText = get_taxonomy_name($product_type_4,$product_slug_4);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                ?>
                @if( $products )
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block pd_0 mg_bt mg_top phukienbankem">
                  <div class="block-title pd_bt_10">
                     <h5 class="fw600"><span><a href="{{ url('collections/'.$product_slug_4) }}">{{ $headingText }}</a></span></h5>
                  </div>
                  <div class="block-content prd-loop">
                     <div id="sub-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4">
                            <?php
                              $i = 0;
                              $count = count($products);
                            ?>
                            @foreach( $products as $product )
                            @if( $i%3 == 0 )
                           <div class="item">
                            @endif
                              <div class="prd-loop-list">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 loop-img">
                                    <a href="{{ url('collections/'.$product['product_slug']) }}">
                                    <img src="{{ get_image_url($product['product_image_id']) }}" title="{{ $product['product_title'] }}" alt="{{ $product['product_title'] }}">
                                    </a>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 loop-content">
                                    <p class="item-name"><a href="{{ url('collections/'.$product['product_slug']) }}">{{ $product['product_title'] }}</a></p>
                                    <p class="item-price cl_main fw600"><span>{{ number_format($product['price_new'],0,'.','.') }}₫</span></p>
                                    @if( $product['price_old'] > 0 )
                                    <p class="item-price cl_old txt_line fs12"><span>{{ number_format($product['price_old'],0,'.','.') }}₫</span></p>
                                    @endif
                                 </div>
                              </div>
                           <?php $i++; ?>
                            @if( $i%3==0)
                            </div>
                            @elseif( $count == $i )
                            </div>
                            @endif
                            @endforeach
                        </div>
                     </div>
                  </div>
               </div>
                @endif
                <!-- End Sản Phẩm Xem Nhiều -->
            </div>
<!-- End -->
         </div>
      </div>
   </div>
   <script>
      $(document).ready(function() {
         $("#owl-slide").owlCarousel({
             slideSpeed : 300,
             paginationSpeed : 400,
             pagination: false,
             itemsCustom : [
                 [0, 1],
                 [450, 1],
                 [600, 1],
                 [700, 1],
                 [1000, 1],
                 [1200, 1],
                 [1400, 1],
                 [1600, 1]
             ],
             autoPlay: true
         });
      });
   </script>
</div>
        <!-- End -->

@stop