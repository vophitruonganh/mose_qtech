@extends('frontend.giaodien12.layouts.default')
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

<div class="header-breadcrumb">
   <div class="container">
      <div class="row ">
         <div class="col-xs-12">
            <ol class="breadcrumb">
               <li><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a>
               </li>
               <!-- blog -->
               <!-- <li>
                  <a href="giay-the-thao-nam-1" title="Giầy thể thao nam">Giầy thể thao nam</a>
               </li> -->
               <li class="active breadcrumb-title">{{$title}}</li>
               <!-- search -->
               <!-- current_tags -->
            </ol>
         </div>
      </div>
   </div>
</div>

<section class="mtb25">
<div class="container">
<div class="row">
           <!--dong o left-->
           
<div class="megamenu-right col-md-9 col-md-push-3">
   <div class="row">
      <div class="product-detail" itemscope itemtype="http://schema.org/Product">
         <meta itemprop="url" content="//sport-theme.bizwebvietnam.net/giay-chay-bo-nx">
         <meta itemprop="image" content="//bizweb.dktcdn.net/thumb/grande/100/048/137/products/giay-7-min.jpg">
         <meta itemprop="shop-currency" content="VND">
         <form action="{{url('cart/order/'.$slug)}}" method="post" class="product_form_class">
            <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="product-detail-left col-md-6">
               <div class="popup-gallery">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="product-image inner-cloud-zoom">
                           <a href="//bizweb.dktcdn.net/100/048/137/products/giay-7-min.jpg" id="ex1">
                          <!--
                           <img src="//bizweb.dktcdn.net/100/048/137/products/giay-7-min.jpg" alt="Giày chạy bộ NX" id="image" data-zoom-image="//bizweb.dktcdn.net/100/048/137/products/giay-7-min.jpg">
                          -->
                          <img src="{{ $featureImage }}" alt="Giày chạy bộ NX" id="image" data-zoom-image="//bizweb.dktcdn.net/100/048/137/products/giay-7-min.jpg">
                           </a>
                        </div>
                     </div>
                     <div class="col-sm-12">
                        <div class="overflow-thumbnails-carousel">
                           <ul class="thumbnails-carousel owl-carousel">
                              <li>
                                 <a href="//bizweb.dktcdn.net/100/048/137/products/giay-7-min.jpg" data-image="//bizweb.dktcdn.net/100/048/137/products/giay-7-min.jpg" data-zoom-image="//bizweb.dktcdn.net/100/048/137/products/giay-7-min.jpg">
                                 <img src="//bizweb.dktcdn.net/100/048/137/products/giay-7-min.jpg" title="Giày chạy bộ NX" alt="Giày chạy bộ NX">
                                 </a>
                              </li>
                              <li>
                                 <a href="//bizweb.dktcdn.net/100/048/137/products/giay-8.jpg" data-image="//bizweb.dktcdn.net/100/048/137/products/giay-8.jpg" data-zoom-image="//bizweb.dktcdn.net/100/048/137/products/giay-8.jpg">
                                 <img src="//bizweb.dktcdn.net/100/048/137/products/giay-8.jpg" title="Giày chạy bộ NX" alt="Giày chạy bộ NX">
                                 </a>
                              </li>
                              <li>
                                 <a href="//bizweb.dktcdn.net/100/048/137/products/giay-9.jpg" data-image="//bizweb.dktcdn.net/100/048/137/products/giay-9.jpg" data-zoom-image="//bizweb.dktcdn.net/100/048/137/products/giay-9.jpg">
                                 <img src="//bizweb.dktcdn.net/100/048/137/products/giay-9.jpg" title="Giày chạy bộ NX" alt="Giày chạy bộ NX">
                                 </a>
                              </li>
                              <div class="owl-controls clickable" style="display: none;">
                                 <div class="owl-pagination">
                                    <div class="owl-page active"><span class=""></span></div>
                                 </div>
                                 <div class="owl-buttons">
                                    <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                                    <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                                 </div>
                              </div>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="product-detail-right col-md-6">
               <div class="">
                  <h1 class="product-name" itemprop="name"><a href="{{url('collections/'.$slug)}}" title="Giày chạy bộ NX">{{$title}}</a></h1>
                  <span class="product-price" itemprop="price">
                  <b class="productminprice">{{$priceNew}}&#8363;</b>
                  </span>
                  <div class="description">{{$excerpt}}
                  </div>
                  <input type="hidden" name="variantId" value="1814793" />
                  <!--số lượng-->
                  <div class="col-sm-12 no-padding-lr quantity_cartbtn ">
                     <!-- <div class="col-sm-6 no-padding-lr"> -->
                     <div class="product_quantity">
                        <label>Số lượng:</label>
                        <div class="quanitybtn">
                           <div class="input-group quantity">
                              <span class="input-group-btn">
                              <a id="q_down" class="btn btn-default" type="button">-</a>
                              </span>
                              <input type="text" class="form-control product-qty" name="quantity" id="quantity_wanted" size="2" value="1" onkeypress='validate(event)'/>
                              <span class="input-group-btn">
                              <a id="q_up" class="btn btn-default" type="button">+</a>
                              </span>
                           </div>
                        </div>
                     </div>
                     <!-- </div> -->
                     <div class="product_cart_btn">
                        <button class="product-action btn-red addtocart add-to-cart btn btn-default btn-lg" type="submit" id="button-cart">Mua hàng</button>
                     </div>
                  </div>
               </div>
               <div class="addthis">
                  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5620cf1235df3004" async="async"></script>	
                  <div class="addthis_native_toolbox"></div>
               </div>
            </div>
         </form>
         <div class="mtb25 section-product-tabs col-md-12">
            <div role="tabpanel" class="product-tab-wrapper">
               <!-- Nav tabs -->
               <ul class="nav nav-tabs product-tab-info" role="tablist">
                  <li role="presentation" class="active">
                     <a href="#product_top_detail" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Thông tin sản phẩm</a>
                  </li>
                  <li role="presentation">
                     <a href="#product_info" aria-controls="tab" role="tab" data-toggle="tab">Nhận xét</a>
                  </li>
                  <li role="presentation">
                     <a href="#product_cmt" aria-controls="tab" role="tab" data-toggle="tab">Đánh giá</a>
                  </li>
               </ul>
               <!-- Tab panes -->
               <div class="tab-content product-tab-content">
                   <div role="tabpanel" class="tab-pane active" id="product_top_detail">
                       {!! $content !!}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="product_info"> </div>
                    <div role="tabpanel" class="tab-pane" id="product_cmt">
                      <div class="comment">
                        <div class="fb-comments" data-href="{{url('collections/'.$slug)}}" data-width="100%" data-numposts="5"></div>
                      </div>
                    </div>
                    </div>
               
            </div>
         </div>
         
         
         
         <div class="section-products mtb25">
            <!-- sản phẩm liên quan -->
             <!-- Widget 7777777 -->
               {!!showWidget('widget777777')!!}
             <!-- End Widget 7777777 -->
           
            <!-- end sản phẩm liên quan -->

         </div>
      </div>
   </div>
</div>
           
           
<!-- left -->

<div class="megamenu-left col-md-3 col-md-pull-9">
    <div class="cd-dropdown-wrapper">
       <!-- Widget 111111 -->
        {!!showWidget('widget111111')!!}
        <!-- End Widget 111111 -->

    </div>
    <!-- .cd-dropdown-wrapper -->
    
       <!-- Widget 222222 -->
         {!!showWidget('widget222222')!!}
       <!-- End Widget 222222 -->

       <!-- Widget 333333 -->
         {!!showWidget('widget333333')!!}
       <!-- End Widget 333333 -->
   
    <!-- Widget 666666 -->
    {!!showWidget('widget666666')!!}
    <!-- End Widget 666666 -->
 </div>
<!--dong right-->
<!-- End Left -->
          
            
@stop
