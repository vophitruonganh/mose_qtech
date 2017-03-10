@extends('frontend.giaodien6.layouts.default')
@section('content')
    <!-- Slider -->
    <section id="slider">
       <div class="container">
          <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5 slide-banner" id="slider-menu">
                <div class="owl-carousel">
                    <?php $slider = isset($slider) ? $slider : []; ?>
                    @foreach( $slider as $row )
                   <div class="item @if( $loop->first ) active @endif">
                      <a href="{{ $row['url'] }}">
                      <img src="{{ $row['big_image'] }}" />
                      </a>
                   </div>
                   @endforeach
                </div>
                <div class="slider-thumb hidden-sm hidden-xs">
                   <ul id="slider-thumb">
                      @foreach( $slider as $row )
                      <li @if( $loop->first ) class="active" @endif>
                         <div class="slider-image-thumb">
                            <img src="{{ $row['thumb_image'] }}" />
                         </div>
                         <a href="{{ $row['url'] }}">
                            <div class="slider-detail">
                               <span class="title-image">{{ $row['title'] }}</span>
                               <span class="description-image">{{ $row['description'] }}</span>
                            </div>
                         </a>
                      </li>
                      @endforeach
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </section>
    <script>
       $('#slider-menu .owl-carousel').owlCarousel({
         items:1,
         loop: true,
         smartSpeed: 800,
         autoplay:true,
         autoplayTimeout:5000,
         autoplayHoverPause:true,
         onChange: function () {
                 if ( $('#slider-thumb li').hasClass('click-event') ){
                         $('#slider-thumb li').removeClass('click-event');
                 }else {	
                         var data = $("#slider-menu .owl-carousel").data('owlCarousel');
                         var current = data._current;
                         if( current == data._items.length + 1 ) {
                                 current = 1;
                         }
                         $('#slider-thumb li').removeClass('active');
                         $('#slider-thumb li').eq(current - 1).addClass('active');
                 }
         }
       });
    </script>
    <!-- End Slider -->
    <main >
       <div class="container box-section-collection">
          <div class="row flex-order">
             <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pd5 flex-left">
                <!-- Nhóm Sản Phẩm -->
                <?php $list_tax = get_taxonomy_product('product_category'); ?>
                @if( $list_tax )
                <div class="box-group-collection mb10">
                   <div class="group-collection-title">
                      <span>Danh mục sản phẩm</span>
                   </div>
                   <div class="group-menu-collection">
                      <ul id="menusidebarleft" class="clearfix">
                        @foreach($list_tax as $tax)
                         <li class="">
                            <a href="{{ url('collections/'.$tax->taxonomy_slug) }}" title="{{ $tax->taxonomy_name }}">{{ $tax->taxonomy_name }}</a>
                         </li>
                        @endforeach
                      </ul>
                   </div>
                </div>
                @endif
                <!-- End -->
                <div class="box-group-collection mb10">
                   <div class="group-collection-title">
                      <span>Facebook</span>
                   </div>
                   <div class="fb-page" data-href="{{ $facebook['url'] }}" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                      <div class="fb-xfbml-parse-ignore">
                         <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
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
                <div class="box-group-collection mb10">
                   <div class="group-collection-title">
                      <span>{{ $headingText }}</span>
                   </div>
                   <div class="owl-carousel position-owlCarousel" id="group-blog-slide">
                  @foreach($posts as $post)
                    <?php $excerpt = !empty($post->post_excerpt) ? get_excerpt($post->post_excerpt,30) : get_excerpt($post->post_content,30); ?>
                      <div class="item">
                         <div class="clearfix">
                            <div class="infor-blog-image-slide">
                               <a href="{{ url($post->post_slug) }}">
                               <img src="{{ get_image_url($post->post_image) }}" />
                               </a>
                            </div>
                            <div class="infor-blog-name-slide">
                               <a href="{{ url($post->post_slug) }}">
                                  <h2>
                                     {{ $post->post_title }}
                                  </h2>
                               </a>
                               <p>
                                  {{ $excerpt }}
                               </p>
                            </div>
                         </div>
                      </div>
                  @endforeach
                  </div>
                   <script>
                      var owl_tab_blog = $('#group-blog-slide');
                      owl_tab_blog.owlCarousel({
                         items:1,
                         nav:true
                      });
                      owl_tab_blog.find('.owl-next').html("<i class='fa fa-angle-right'></i>");
                      owl_tab_blog.find('.owl-prev').html("<i class='fa fa-angle-left'></i>");
                   </script>
                </div>
                @endif
                <!-- End -->

                <div class="box-group-collection mb10 ps-relative">
                   <a class="box-banner-index" href="{{ $firstBanner['url'] }}">
                   <img src="{{ $firstBanner['image'] }}" alt="" />
                   <span class="effect-banner"></span>
                   </a>
                </div>
                <div class="box-group-collection mb10 ps-relative">
                   <a class="box-banner-index" href="{{ $secondBanner['url'] }}">
                   <img src="{{ $secondBanner['image'] }}" alt="" />
                   <span class="effect-banner"></span>
                   </a>
                </div>
             </div>
             <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pd5 flex-right mb15">
            <?php
              $products = get_product_tax_limit($product_type_1,$product_slug_1,8);
              $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
              if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            @if( $products )
              <div class="box-group-collection">
              <div class="group-collection-title">
                <span>{{ $headingText }}</span>
                <a class="view-more-index" href="{{ url('collections/'.$product_slug_1) }}">
                  Xem thêm
                  <svg class="svg-icon-size-20 svg-icon-bg svg-icon-inline" style="fill:#0bd9a9;vertical-align: sub;">
                    <use xlink:href="#icon-viewmore"></use>
                  </svg>
                </a>
              </div>
              <div class="mb5 ps-relative">
                <a class="box-banner-index" href="{{ $thirdBanner['url'] }}">
                <img src="{{ $thirdBanner['image'] }}" alt="" />
                <span class="effect-banner"></span>
                </a>
              </div>
              <!-- Sản Phẩm Mới -->
              <div class="clearfix">
                <div class="list-collection-index product-item mt15 clearfix ">
                  @foreach( $products as $product )
                   <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb10 product-wrapper product-resize ">
                      <div class="product-information">
                         <div class="product-detail">
                            <div class="product-image image-resize">
                               <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                               <img src="{{ get_image_url($product['product_image_id']) }}" alt="{{ $product['product_title'] }}" />
                               </a> 
                               <div class="label-product field-new countdown_1002078935" style="display: none">
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
                                     <span>{{ number_format($product['price_new'],0,'.','.') }}₫</span>
                                    @if( $product['price_old'] > 0 )
                                    <del>{{ number_format($product['price_old'],0,'.','.') }}₫</del>
                                    @endif
                                  </div>
                               </div>
                               <div class="product-buttons">
                                  <div>
                                     <a class="btn-detail hidden-xs quickview" href="javascript:void(0)" data-handle="/products/apple-iphone-5s-16gb-xam" title="">
                                     <i class="fa fa-eye"></i>
                                     </a>
                                     <a class="btn-addtocart" href="javascript:;" onclick="order({{$product['product_id']}})" title="">Mua Ngay</a>
                                     <a class="btn-wishlist hidden-xs" href="/products/apple-iphone-5s-16gb-xam" title="">
                                     <i class="fa fa-heart"></i>
                                     </a>
                                    <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                                        <div class="actions">
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                           <input type="hidden" name="quantity" value="1" />
                                        </div>
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
             <!-- End -->
             </div>
            @endif
            
            <?php
              $products = get_product_tax_limit($product_type_2,$product_slug_2,8);
              $headingText = get_taxonomy_name($product_type_2,$product_slug_2);
              if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            @if( $products )
              <div class="box-group-collection">
              <div class="group-collection-title">
                <span>{{ $headingText }}</span>
                <a class="view-more-index" href="{{ url('collections/'.$product_slug_2) }}">
                  Xem thêm
                  <svg class="svg-icon-size-20 svg-icon-bg svg-icon-inline" style="fill:#0bd9a9;vertical-align: sub;">
                    <use xlink:href="#icon-viewmore"></use>
                  </svg>
                </a>
              </div>
              <div class="mb5 ps-relative">
                <a class="box-banner-index" href="{{ $fourthBanner['url'] }}">
                <img src="{{ $fourthBanner['image'] }}" alt="" />
                <span class="effect-banner"></span>
                </a>
              </div>
              <!-- Điện thoại -->
              <div class="clearfix">
                <div class="list-collection-index product-item mt15 clearfix ">
                  @foreach( $products as $product )
                   <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb10 product-wrapper product-resize ">
                      <div class="product-information">
                         <div class="product-detail">
                            <div class="product-image image-resize">
                               <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                               <img src="{{ get_image_url($product['product_image_id']) }}" alt="{{ $product['product_title'] }}" />
                               </a> 
                               <div class="label-product field-new countdown_1002078935" style="display: none">
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
                                     <span>{{ number_format($product['price_new'],0,'.','.') }}₫</span>
                                    @if( $product['price_old'] > 0 )
                                    <del>{{ number_format($product['price_old'],0,'.','.') }}₫</del>
                                    @endif
                                  </div>
                               </div>
                               <div class="product-buttons">
                                  <div>
                                     <a class="btn-detail hidden-xs quickview" href="javascript:void(0)" data-handle="/products/apple-iphone-5s-16gb-xam" title="">
                                     <i class="fa fa-eye"></i>
                                     </a>
                                     <a class="btn-addtocart" href="javascript:;" onclick="order({{$product['product_id']}})" title="">Mua Ngay</a>
                                     <a class="btn-wishlist hidden-xs" href="/products/apple-iphone-5s-16gb-xam" title="">
                                     <i class="fa fa-heart"></i>
                                     </a>
                                    <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                                        <div class="actions">
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                           <input type="hidden" name="quantity" value="1" />
                                        </div>
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
             <!-- End -->
             </div>
            @endif
            
          </div>
       </div>
    </main>
    <script type="text/javascript">
      function order(i)
      {
         $("#form_order_"+i).submit();   
      }
    </script>
@stop