@extends('frontend.giaodien9.layouts.default')
@section('content')
<!-- Slider -->
<div id="slider" class="flexslider main-slider">
    <ul class="slides">
      <?php $slider = isset($slider) ? $slider : []; ?>
      @foreach( $slider as $row )
       <li class="slide @if( $loop->first ) active @endif">
          <a href="{{ $row['url'] }}">
          <img src="{{ $row['big_image'] }}" alt="" />
          </a>
       </li>
      @endforeach
    </ul>
 </div>
<!-- End Slider -->

<!-- Dich Vu -->
<section class="home-services home-section">
  <div class="fix-width">
    <div class="section-header">
      <h3 class="section-title wow fadeInUp">{{ $service['heading'] }}</h3>
      <div class="section-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">{{ $service['text'] }}</div>
    </div>
    <div class="section-content">
      <?php unset($service['heading']); unset($service['text']); ?>
      @foreach( $service as $row )
      <div class="entry service wow fadeInDown" data-wow-delay="0.5s">
        <a class="thumb" href="{{ $row['url'] }}"><img src="{{ $row['image'] }}" alt="{{ $row['title'] }}" /></a>
        <h2 class="entry-title"><a href="{{ $row['url'] }}">{{ $row['title'] }}</a></h2>
        <div class="excerpt">{{ $row['text'] }}</div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- End Dich Vu -->

<!-- About -->
<section class="home-section home-aboutus wow fadeInUp" data-wow-duration="2s">
  <div class="parallax not-margin">
    <div data-position="-450" data-speed="3" class="layer_back">
      <img alt="banner thumb" src="{{ $about['image'] }}">
    </div>
    <div class="background_layer">
      <div class="fix-width">
        <h3 class="section-title">{{ $about['heading'] }}</h3>
        <div class="section-description">{{ $about['text'] }}</div>
      </div>
    </div>
  </div>
</section>
<!-- End About -->

<!-- Du an -->
<section class="home-projects home-section">
<div class="fix-width">
<div class="section-header">
  <h3 class="section-title wow fadeInUp">Sản phẩm</h3>
  <div class="section-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">{{ $productText }}</div>
  <p class="readmore wow fadeInUp" data-wow-delay="0.5s"><a href="{{ url('collections') }}">Xem tất cả Sản Phẩm</a></p>
</div>
<!-- Sản Phẩm -->
<?php
  $products = get_product_tax_limit($product_type_1,$product_slug_1,4);
  // $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
  // if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
?>
@if( $products )
<div class="products section-content clearfix wow slideInLeft">
  @foreach($products as $product)
  <div class="product project clear">
     <a href="{{ url('collections/'.$product['product_slug']) }}" class="thumb">
     <img src="{{get_image_url($product['product_image_id'])}}" alt="{{$product['product_title']}}" />
     </a>
     <div class="details">
        <h4 class="title"><a href="{{ url('collections/'.$product['product_slug']) }}">
           {{$product['product_title']}}
           </a>
        </h4>
        <p class="product-price">
           <span class="price"><span class="contact">Giá: {{ number_format($product['price_new'],0,'.','.') }}₫</span></span>
        </p>
        <p class="product-description">
        </p>
        <form action="{{ url('cart/order/'.$product['product_slug']) }}" id="form_order_{{$product['product_id']}}" method="post" class="variants clearfix form-add-to-cart">
           <!-- Begin product options -->
           <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           <input type="hidden" name="id" value="1004984987" />
           <input type="hidden" name="quantity" value="1" />
           <button type="submit" class="add-to-cart btn addtocart" name="add" value="fav_HTML">Giỏ Hàng</button>
           <div class="cart-animation">1</div>
           <!-- End product options -->
        </form>
        <a class="readmore button" href="{{ url('collections/'.$product['product_slug']) }}">
        Chi tiết
        </a>
        <span class="haravan-product-reviews-badge" data-id="1001418214"></span>
     </div>
  </div>
  @endforeach
</div>
@endif
<!-- End Du an -->

<!-- Nhan xet -->
<section class="home-section home-news-testimonials">
    <div class="fix-width">
      <div class="list-testimonials wow fadeInLeft">
        <h3 class="section-title">{{ $comment['heading'] }}</h3>
        <div class="section-content slides">
          <?php unset($comment['heading']); ?>
          @foreach( $comment as $row )
          <div class="slide">
            <div class="article entry">
              <div class="thumb">
                <img src="{{ $row['image'] }}" />
              </div>
              <div class="entry-content">{!! $row['content'] !!}</div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="customNavigation">
          <span class="btn prev">Trước</span>
          <span class="btn next">Sau</span>
        </div>
      </div>
      <?php
       $posts = get_post_cat_limit($post_slug_1,5);
       $headingText = get_taxonomy_name($post_type_1,$post_slug_1);
       if( $headingText == '' ) $headingText = 'Bài viết Mới';
      ?>
      @if($posts)
      <div class="list-news wow fadeInRight" data-wow-delay=".5s">
          <h3 class="section-title"><?php echo $headingText; ?></h3>
          <div class="section-content">
          <?php $i=0; ?>
          @foreach($posts as $post)
            @if( $i==0 )
             <div class="article entry">
                <h4 class="entry-title"><a href="{{url($post->post_slug)}}">{{$post->post_title}}</a></h4>
                <div class="excerpt">
                   <div><img src="{{get_image_url($post->post_image)}}" alt="{{$post->post_title}}"></div>
                   {{$post->post_excerpt}}
                </div>
             </div>
            @else
            <div class="article entry">
                <h4 class="entry-title"><a href="{{url($post->post_slug)}}">{{$post->post_title}}</a></h4>
                <div class="excerpt">
                   <div><img src="{{get_image_url($post->post_image)}}" alt="{{$post->post_title}}"></div>
                   {{$post->post_excerpt}}
                </div>
             </div>
            @endif
            <?php $i++; ?>
          @endforeach
          </div>
       </div>
      @endif
    

    </div>
 </section>

<!-- End Nhan xet -->
@stop