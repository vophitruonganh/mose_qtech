@extends('frontend.giaodien11.layouts.default')
@section('content')
<!-- Slider -->
<div id="magik-slideshow" class="magik-slideshow" style="margin-top:0px;">
   <div class="fvc">
      <div id="coverage-slider">
         <?php $slider = isset($slider) ? $slider: []; ?>
         @foreach( $slider as $row )
         <div class="item">
            <a href="{{ $row['url'] }}"><img src="{{ $row['image'] }}" /></a>
         </div>
         @endforeach
      </div>
   </div>
</div>
<!-- end Slider --> 
<section class="main-container col1-layout home-content-container">
   <div class="container">
      <div class="std row">
         <!-- Right -->
         <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-push-3 col-lg-push-3 ">
            <div class="best-seller-pro">
               <?php $products = get_product_tax_limit($product_type_1,$product_slug_1,'24'); ?>
               @if($products)
               <div class="slider-items-products">
                  <div class="new_title center">
                     <?php
                        $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
                        if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                     ?>
                     <h2>{{ $headingText }}</h2>
                  </div>
                  <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                     <div class="slider-items slider-width-col4">
                        <?php $i=0; ?>
                        <?php $count =count($products); ?>
                        @foreach($products as $product)
                            @if( $i%8==0 )
                            <div class="product-item-slide  multi-columns-row">
                            @endif
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 full_width480">
                                 <div class="col-item">
                                    @if($product['check_discount'])
                                    <div class="sale-label sale-top-right">-{{$product['percentage']}}%</div>
                                    @endif
                                    <div class="product-image-area"> 
                                       <a class="product-image" title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}"> 
                                       <img src="{{get_image_url($product['product_image_id'])}}" class="img-responsive" alt="{{$product['product_title']}}" /> 
                                       </a>
                                    </div>
                                    <div class="hidden_mobile  hidden-sm hidden-xs">
                                       <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                                         <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                         <input type="hidden" name="quantity" value="1" />
                                          <div class="hover_fly">
                                             <a class="exclusive ajax_add_to_cart_button btn-cart add_to_cart" onclick="order({{$product['product_id']}})" title="Cho vào giỏ hàng">
                                                <div><i class="icon-shopping-cart"></i><span>Mua hàng</span></div>
                                             </a>
                                             <input type="hidden" name="variantId" value="1850772" />
                                          </div>
                                          <a href="{{url('collections/'.$product['product_slug'])}}" class="over_bg"></a>
                                       </form>
                                    </div>
                                    <div class="info">
                                       <div class="info-inner">
                                          <div class="item-title">
                                             <h3><a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">{{$product['product_title']}}</a></h3>
                                          </div>
                                          <!--item-title-->
                                          <div class="item-content">
                                             <div class="price-box">
                                                <p class="special-price"> 
                                                   <span class="price">{{ number_format($product['price_new'],0,'.','.') }}₫</span> 
                                                </p>
                                                @if($product['price_old'])
                                                <p class="old-price"> 
                                                   <span class="price-sep">-</span> 
                                                   <span class="price">{{ number_format($product['price_old'],0,'.','.') }}₫</span> 
                                                </p>
                                                @endif
                                             </div>
                                          </div>
                                          <div class="button_mobile hidden-lg hidden-md">
                                             <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                                                <div class="actions">
                                                   <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                   <input type="hidden" name="quantity" value="1" />
                                                   <button class="button btn-cart btn-cart add_to_cart" title="Cho vào giỏ hàng" type="button"><span>Mua hàng</span></button>
                                                </div>
                                             </form>
                                          </div>
                                          <!--item-content--> 
                                       </div>
                                       <!--info-inner-->
                                       <div class="clearfix"></div>
                                    </div>
                                 </div>
                              </div>
                            <?php $i++; ?>
                            @if( $i%8==0)
                            </div>
                            @elseif( $count == $i )
                            </div>
                            @endif
                        @endforeach
                        <!-- </div> -->
                     </div>
                  </div>
               </div>
               @endif
            </div> <!-- best seller -->
            <div class="banner_center_index">
               <?php $first_banner = isset($firstBanner) ? $firstBanner : []; ?>
               @if( count($first_banner) > 0 )
               <a href="{{ $first_banner['url'] }}"><img src="{{ $first_banner['image'] }}" ></a>
               @endif
            </div>
            <div class="best-seller-pro">
               <?php $products = get_product_tax_limit($product_type_2,$product_slug_2,'24'); ?>
               @if($products)
               <div class="slider-items-products">
                  <div class="new_title center">
                     <?php
                        $headingText = get_taxonomy_name($product_type_2,$product_slug_2);
                        if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                     ?>
                     <h2>{{ $headingText }}</h2>
                  </div>
                  <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                     <div class="slider-items slider-width-col4">
                        <?php $i=0; ?>
                        <?php $count =count($products); ?>
                        @foreach($products as $product)
                            @if( $i%8==0 )
                            <div class="product-item-slide  multi-columns-row">
                            @endif
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 full_width480">
                                 <div class="col-item">
                                    @if($product['check_discount'])
                                    <div class="sale-label sale-top-right">-{{$product['percentage']}}%</div>
                                    @endif
                                    <div class="product-image-area"> 
                                       <a class="product-image" title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}"> 
                                       <img src="{{get_image_url($product['product_image_id'])}}" class="img-responsive" alt="{{$product['product_title']}}" /> 
                                       </a>
                                    </div>
                                    <div class="hidden_mobile  hidden-sm hidden-xs">
                                       <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                                         <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                         <input type="hidden" name="quantity" value="1" />
                                          <div class="hover_fly">
                                             <a class="exclusive ajax_add_to_cart_button btn-cart add_to_cart" onclick="order({{$product['product_id']}})" title="Cho vào giỏ hàng">
                                                <div><i class="icon-shopping-cart"></i><span>Mua hàng</span></div>
                                             </a>
                                             <input type="hidden" name="variantId" value="1850772" />
                                          </div>
                                          <a href="{{url('collections/'.$product['product_slug'])}}" class="over_bg"></a>
                                       </form>
                                    </div>
                                    <div class="info">
                                       <div class="info-inner">
                                          <div class="item-title">
                                             <h3><a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">{{$product['product_title']}}</a></h3>
                                          </div>
                                          <!--item-title-->
                                          <div class="item-content">
                                             <div class="price-box">
                                                <p class="special-price"> 
                                                   <span class="price">{{ number_format($product['price_new'],0,'.','.') }}₫</span> 
                                                </p>
                                                @if($product['price_old'])
                                                <p class="old-price"> 
                                                   <span class="price-sep">-</span> 
                                                   <span class="price">{{ number_format($product['price_old'],0,'.','.') }}₫</span> 
                                                </p>
                                                @endif
                                             </div>
                                          </div>
                                          <div class="button_mobile hidden-lg hidden-md">
                                             <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                                                <div class="actions">
                                                   <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                   <input type="hidden" name="quantity" value="1" />
                                                   <button class="button btn-cart btn-cart add_to_cart" title="Cho vào giỏ hàng" type="button"><span>Mua hàng</span></button>
                                                </div>
                                             </form>
                                          </div>
                                          <!--item-content--> 
                                       </div>
                                       <!--info-inner-->
                                       <div class="clearfix"></div>
                                    </div>
                                 </div>
                              </div>
                            <?php $i++; ?>
                            @if( $i%8==0)
                            </div>
                            @elseif( $count == $i )
                            </div>
                            @endif
                        @endforeach
                        <!-- </div> -->
                     </div>
                  </div>
               </div>
               @endif
            </div> <!-- best seller -->
         </div>
         <!-- End right -->
         <!-- Left -->
         <div class="col-left sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12 col-md-pull-9 col-lg-pull-9">
            <?php $list_cat = get_taxonomy_product('product_category') ?>
            @if($list_cat)
            <div class="box_collection_pr">
               <div class="title_st">
                  <h2>Danh mục sản phẩm</h2>
                  <span class="arrow_title visible-md visible-md"></span>
                  <div class="show_nav_bar hidden-lg hidden-md"></div>
               </div>
               <div class="list_item">
                  <ul>
                    @foreach($list_cat as $cat)
                    <li> <a href="{{url('collections/'.$cat->taxonomy_slug)}}">{{$cat->taxonomy_name}}</a> </li>
                    @endforeach
                  </ul>
               </div>
            </div>
            @endif

            <?php $products = get_product_tax_limit($product_type_3,$product_slug_3,'5' ); ?>
            @if($products)
            <div class="popular-posts widget widget__sidebar stl_list_item">
               <div class="title_st">
                  <?php
                     $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                     if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                  ?>
                  <h2>{{ $headingText }}</h2>
                  <span class="arrow_title"></span>
               </div>
               <div class="widget-content">
                  <ul class="posts-list unstyled clearfix">
                     @foreach($products as $product)
                     <li>
                        <figure class="featured-thumb" style="width:42%">
                           <a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">
                           <img alt="{{$product['product_title']}}" src="{{get_image_url($product['product_image_id'])}}" style=" width: 100px;">
                           </a> 
                        </figure>
                        <!--featured-thumb-->
                        <h3><a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">{{$product['product_title']}}</a></h3>
                        <div class="price-box">
                           <p class="special-price"> 
                              <span class="price">{{ number_format($product['price_new'],0,'.','.') }}₫</span> 
                           </p>
                           @if($product['price_old'])
                           <p class="old-price"> 
                              <span class="price-sep">-</span> 
                              <span class="price">{{ number_format($product['price_old'],0,'.','.') }}₫</span> 
                           </p>
                           @endif
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
               <!--widget-content--> 
            </div>
            @endif


         </div>
         <!-- End left -->
      </div> <!-- std row -->
   </div> <!-- end container -->
</section>
<!-- Bán chạy -->
<section class="featured-pro bg_spc">
<?php $products = get_product_tax_limit($product_type_4,$product_slug_4,'12'); ?>
   @if($products)
   <div class="slider-items-products container">
      <div class="new_title center">
         <?php
            $headingText = get_taxonomy_name($product_type_4,$product_slug_4);
            if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
         ?>
         <h2>{{ $headingText }}</h2>
         <span></span>
      </div>
      <div id="featured-slider" class="product-flexslider hidden-buttons block_btn_cart">
         <div class="slider-items slider-width-col4">
            @foreach($products as $product)
                 <div class="item">
               <div class="col-item">
                  @if($product['check_discount'])
                 <div class="sale-label sale-top-right">-{{$product['percentage']}}%</div>
                 @endif
                  <div class="product-image-area"> 
                     <a class="product-image" title="{{$product['product_title']}}" href="{{$product['product_title']}}"> 
                     <img src="{{get_image_url($product['product_image_id'])}}" class="img-responsive" alt="{{$product['product_title']}}" /> 
                     </a>
                  </div>
                  <div class="hidden_mobile  hidden-sm hidden-xs">
                     <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="quantity" value="1" />
                        <div class="hover_fly">
                           <a class="exclusive ajax_add_to_cart_button btn-cart add_to_cart" onclick="order({{$product['product_id']}})" title="Cho vào giỏ hàng">
                              <div><i class="icon-shopping-cart"></i><span>Mua hàng</span></div>
                           </a>
                        </div>
                        <a href="{{url('collections/'.$product['product_slug'])}}" class="over_bg"></a>
                     </form>
                  </div>
                  <div class="info">
                     <div class="info-inner">
                        <div class="item-title">
                           <h3><a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">{{$product['product_title']}}</a></h3>
                        </div>
                        <!--item-title-->
                        <div class="item-content">
                           <div class="price-box">
                              <p class="special-price"> 
                                 <span class="price">{{ number_format($product['price_new'],0,'.','.') }}₫</span> 
                              </p>
                              @if($product['price_old'])
                              <p class="old-price"> 
                                 <span class="price-sep">-</span> 
                                 <span class="price">{{ number_format($product['price_old'],0,'.','.') }}₫</span> 
                              </p>
                              @endif
                           </div>
                        </div>
                        <div class="button_mobile hidden-lg hidden-md">
                           <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                              <div class="actions">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="quantity" value="1" />
                                  <button class="button btn-cart btn-cart add_to_cart" title="Cho vào giỏ hàng" type="submit"><span>Mua hàng</span></button>
                              </div>
                           </form>
                        </div>
                        <!--item-content--> 
                     </div>
                     <!--info-inner-->
                     <div class="clearfix"> </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   @endif
</section>
<!-- End bán chạy -->
<!-- Xem nhiều -->
<section class="middle-slider container">
   <div class="row">
      <?php $products = get_product_tax_limit($product_type_5,$product_slug_5,'12'); ?>
      @if($products)
      <div class="col-md-4 col-sm-4">
         <div class="new_title center">
            <?php
               $headingText = get_taxonomy_name($product_type_5,$product_slug_5);
               if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            <h2>{{ $headingText }}</h2>
         </div>
         <div class="widget-content" id="shoes-slider">
            <ul class="posts-list slider-items-products unstyled clearfix slider-items">
              <?php $i=0; ?>
              @foreach( $products as $product)
              
              @if($i%2==0)    
              <li class="product-item-slide">
              @endif
                  <div class="box_width">
                    <figure class="featured-thumb">
                      <a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">
                        <img alt="{{$product['product_title']}}" src="{{get_image_url($product['product_image_id'])}}" style=" width: 100px;">
                      </a> 
                    </figure>
                    <!--featured-thumb-->
                      <h3><a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">{{$product['product_title']}}</a></h3>
                    <div class="price-box">
                      <p class="special-price"> 
                        <span class="price">{{ number_format($product['price_new'],0,'.','.') }}₫</span> 
                      </p>
                      @if($product['price_old'])
                      <p class="old-price"> 
                        <span class="price-sep">-</span> 
                        <span class="price">{{ number_format($product['price_old'],0,'.','.') }}₫</span> 
                      </p>
                      @endif
                    </div>
                  </div>
              <?php $i++; ?>
              @if($i%2==0)    
              </li>
              @endif

              @endforeach

            </ul>
         </div>
      </div>
      @endif

      <?php $products = get_product_tax_limit($product_type_6,$product_slug_6,'13'); ?>
      @if($products)
      <div class="col-md-4 col-sm-4">
         <div class="new_title center">
            <?php
               $headingText = get_taxonomy_name($product_type_6,$product_slug_6);
               if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            <h2>{{ $headingText }}</h2>
         </div>
         <div class="widget-content" id="shoes-slider">
            <ul class="posts-list slider-items-products unstyled clearfix slider-items">
              <?php $i=0; ?>
              @foreach( $products as $product)
              
              @if($i%2==0)    
              <li class="product-item-slide">
              @endif
                  <div class="box_width">
                    <figure class="featured-thumb">
                      <a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">
                        <img alt="{{$product['product_title']}}" src="{{get_image_url($product['product_image_id'])}}" style=" width: 100px;">
                      </a> 
                    </figure>
                    <!--featured-thumb-->
                      <h3><a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">{{$product['product_title']}}</a></h3>
                    <div class="price-box">
                      <p class="special-price"> 
                        <span class="price">{{ number_format($product['price_new'],0,'.','.') }}₫</span> 
                      </p>
                      @if($product['price_old'])
                      <p class="old-price"> 
                        <span class="price-sep">-</span> 
                        <span class="price">{{ number_format($product['price_old'],0,'.','.') }}₫</span> 
                      </p>
                      @endif
                    </div>
                  </div>
              <?php $i++; ?>
              @if($i%2==0)    
              </li>
              @endif

              @endforeach

            </ul>
         </div>
      </div>
      @endif

      <?php $products = get_product_tax_limit($product_type_7,$product_slug_7,'7'); ?>
      @if($products)
      <div class="col-md-4 col-sm-4">
         <div class="new_title center">
            <?php
               $headingText = get_taxonomy_name($product_type_7,$product_slug_7);
               if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
            ?>
            <h2>{{ $headingText }}</h2>
         </div>
         <div class="widget-content" id="shoes-slider">
            <ul class="posts-list slider-items-products unstyled clearfix slider-items">
              <?php $i=0; ?>
              @foreach( $products as $product)
              
              @if($i%2==0)    
              <li class="product-item-slide">
              @endif
                  <div class="box_width">
                    <figure class="featured-thumb">
                      <a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">
                        <img alt="{{$product['product_title']}}" src="{{get_image_url($product['product_image_id'])}}" style=" width: 100px;">
                      </a> 
                    </figure>
                    <!--featured-thumb-->
                      <h3><a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">{{$product['product_title']}}</a></h3>
                    <div class="price-box">
                      <p class="special-price"> 
                        <span class="price">{{ number_format($product['price_new'],0,'.','.') }}₫</span> 
                      </p>
                      @if($product['price_old'])
                      <p class="old-price"> 
                        <span class="price-sep">-</span> 
                        <span class="price">{{ number_format($product['price_old'],0,'.','.') }}₫</span> 
                      </p>
                      @endif
                    </div>
                  </div>
              <?php $i++; ?>
              @if($i%2==0)    
              </li>
              @endif

              @endforeach

            </ul>
         </div>
      </div>
      @endif


   </div>
</section>
<!-- End xem nhiều -->
<!-- Tin tức -->
<section class="latest-blog container">
<?php
   $posts = get_post_cat_limit($post_slug_1,3);
   $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
   if( $headingText == '' ) $headingText = 'Bài viết Mới';
?>
@if($posts)
   <div class="col-xs-12">
      <div class="new_title center">
         <h2><span>{{ $headingText }}</span></h2>
      </div>
   </div>
   @foreach($posts as $post)
    <?php 
      $user_name = !empty($post->user_fullname) ? $post->user_fullname : $post->user_email;
      $excerpt = !empty($post->post_excerpt) ? get_excerpt($post->post_excerpt,30) : get_excerpt($post->post_content,30) ;
    ?>
   <div class="col-xs-12 col-sm-4">
      <div class="blog-img">
         <a href="{{url($post->post_slug)}}">
         <img alt="{{$post->post_title}}" src="{{get_image_url($post->post_image)}}">
         </a>
         <div class="mask"> <a class="info" href="{{url($post->post_slug)}}">Xem thêm</a> </div>
      </div>
      <div class="box_content_blog">
         <h2><a href="{{url($post->post_slug)}}">{{$post->post_title}}</a></h2>
         
         <div class="post-date"><i class="fa fa-calendar"></i> {{date('d/m/Y',$post->post_date)}} - <i class="fa fa-user"></i> {{ $user_name }} @if($post->comment_status == 'yes')- <i class="fa fa-comment-o"></i><span class="fb-comments-count" data-href="{{ url($post->post_slug) }}"></span>  bình luận  @endif</div>
        
         <p>
         <p style="text-align: justify;">{{$excerpt}}</p>
         </p>
         <a style="font-weight: normal;font-size: 13px;" href="{{url($post->post_slug)}}">Đọc thêm <i class="fa fa-angle-right"></i></a>
      </div>
   </div>
  @endforeach
@endif
</section>
<!-- End tin tức -->

<script type="text/javascript">
   function order(i)
     {
          $("#form_order_"+i).submit();   
     }
</script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1136963499687042";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(".comments").on('click', function() {
    var btn = $(this);
    // alert($(btn).attr('slug')) 
   $(".fb-comments-"+ $(btn).attr('slug')).toggle();

});
</script>
@stop