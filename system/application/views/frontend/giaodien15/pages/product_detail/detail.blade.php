@extends('frontend.giaodien15.layouts.default')
@section('content')
<?php
    if(isset($product->value_postmeta)){
        $metaValue = decode_serialize($product->value_postmeta);
        $priceNew  = number_format($metaValue['price_new'], 0, ',', '.');
        $priceOld  = ($metaValue['price_old'] == 0) ? ' ' : number_format($metaValue['price_old'], 0, ',', '.') . '&#8363;';
        $title     = $product->post_title;
        $slug      = $product->post_slug;
        $excerpt   = $product->post_excerpt;
        $content   = $product->post_content;
        $featureImage = $metaValue['post_featured_image'];
    }else{
        $priceNew  = number_format($product['price_discount'], 0, ',', '.');
        $priceOld  = number_format($product['price_new'], 0, ',', '.') . '&#8363;';
        $title     = $product['post_title'];
        $slug      = $product['post_slug'];
        $excerpt   = $product['post_excerpt'];
        $content   = $product['post_content'];
        $featureImage = $product['featureImage'];
    }
  $featureImage = loadFeatureImage($featureImage);
?>
<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <img src='//hstatic.net/033/1000104033/1000147703/bg-breadcrumb.jpg?v=55' alt=''  />
      <div class="inner">
         <div class="breadcrumb-list">
            <a href="/" title="Quay lại trang chủ">Trang chủ</a>
            <!-- <span aria-hidden="true">/</span>
            <a href="/collections/san-pham-moi" title="">Sản phẩm mới</a> -->
            <span aria-hidden="true">/</span>
            <span>{{$title}}</span>
         </div>
         <h3 class="page_name">Chi tiết sản phẩm</h3>
      </div>
   </nav>
   <!-- /templates/product.liquid -->
   <div itemscope itemtype="http://schema.org/Product">
      <meta itemprop="url" content="http://basic.myharavan.com/products/ao-so-mi-nam-11">
      <meta itemprop="image" content="//hstatic.net/033/1000104033/1/2016/8-2/product_31_grande.jpg">
      <div class="grid product-single">
         <div class="grid__item large--one-half text-center">
            <div class="grid">
               <div class="product-single__photos grid__item large--four-fifths medium--four-fifths right" id="ProductPhoto">
                  <a href="//hstatic.net/033/1000104033/1/2016/8-2/product_31_master.jpg" class="cloud-zoom" title="{{$title}}" data-rel="useWrapper: false, showTitle: false, zoomWidth:'auto', zoomHeight:'auto', adjustY:0, adjustX:10">
                  <!--
                  <img src="//hstatic.net/033/1000104033/1/2016/8-2/product_31_grande.jpg" alt="" id="ProductPhotoImg">
                  -->
                  <img src="{{ $featureImage }}" alt="" id="ProductPhotoImg">
                  </a>
               </div>
               <div class="left grid__item large--one-fifth medium--one-fifth">
                  <div class="lite-carousel-play special-collection">
                     <a class="prev carousel-md" href="#">
                     <span class="fa fa-angle-up"></span>
                     </a>
                     <div data-carousel="lite" data-visible="4">
                        <ul class="product-single__thumbnails" id="ProductThumbs">
                           <li class="product__thumbnails">
                              <a href="//hstatic.net/033/1000104033/1/2016/8-2/product_31_master.jpg" class="product-single__thumbnail thumb-link" data-rel="//hstatic.net/033/1000104033/1/2016/8-2/product_31_grande.jpg">
                              <img src="//hstatic.net/033/1000104033/1/2016/8-2/product_31_compact.jpg" alt="">
                              </a>
                           </li>
                           <li class="product__thumbnails">
                              <a href="//hstatic.net/033/1000104033/1/2016/8-2/product_32_master.jpg" class="product-single__thumbnail thumb-link" data-rel="//hstatic.net/033/1000104033/1/2016/8-2/product_32_grande.jpg">
                              <img src="//hstatic.net/033/1000104033/1/2016/8-2/product_32_compact.jpg" alt="">
                              </a>
                           </li>
                           
                        </ul>
                     </div>
                     <a class="next carousel-md" href="#">
                     <span class="fa fa-angle-down"></span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="grid__item large--one-half">
            <h1 class="single-title" itemprop="name">{{$title}}</h1>
            <span class="haravan-product-reviews-badge" data-id="1002812796"></span> <!-- end rating -->
            <p class="des-short">{{$excerpt}}</p>
            <!-- end short des -->
            <span class="visually-hidden">Giá ban đầu</span>
            <span id="ProductPrice" class="h2" itemprop="price">{{$priceNew}}₫</span>
            <!-- end price -->
            <hr>
            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
               <meta itemprop="priceCurrency" content="VND">
               <link itemprop="availability" href="http://schema.org/InStock">
               <form action="{{url('cart/order/'.$slug)}}" method="post" enctype="multipart/form-data" id="AddToCartForm" class="form-vertical">
                  <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <label for="Quantity" class="quantity-selector">Số lượng</label>
                  <input type="number" id="Quantity" name="quantity" value="1" min="1" class="quantity-selector">
                  <button type="submit" name="add" id="AddToCart" class="btn btn--secondary">
                  <i class="lnr lnr-cart "></i>
                  <span id="AddToCartText">Thêm vào giỏ</span>
                  </button>
                  
               </form>
            </div>
            <div class="add-this">
               <div class="addthis_toolbox addthis_default_style"  >
                  <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                  <a class="addthis_button_tweet"></a>
                  <a class="addthis_counter addthis_pill_style"></a>
               </div>
              
               <script type='text/javascript' src='//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-525fbbd6215b4f1a'></script>
            </div>
         </div>
      </div>
      <div class="product-tabs">
         <!-- Nav tabs -->
         <ul class="nav nav-tabs tab-v7" role="tablist">
            <li role="presentation" class="active"><a href="#product-detail" aria-controls="home" role="tab" data-toggle="tab">Miêu tả</a></li>
           <!--  <li role="presentation">
               <a href="#product-shipping"  data-toggle="tab">Chính sách vận chuyển</a>
            </li> -->
            <li role="presentation"><a href="#product-reviews" aria-controls="product-reviews" role="tab" data-toggle="tab">Xem lại </a></li>
         </ul>
         <!-- Tab panes -->
         <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="product-detail">
               <div class="product-description rte" itemprop="description">
                  {!! $content !!}
               </div>
            </div>
            <!-- <div role="tabpanel" class="tab-pane" id="product-shipping">
               <div class="rte">
                  xxx
               </div>
            </div> -->
            <div role="tabpanel" class="tab-pane" id="product-reviews">
               <div id="haravan-product-reviews" data-id="1002812796"></div>
            </div>
         </div>
      </div>
            <!-- Widget eeeeeeee -->
               {!!showWidget('widgeteeeeeeee')!!}
            <!-- End Widget eeeeeeee -->

   </div>
   
</main>
      
@stop