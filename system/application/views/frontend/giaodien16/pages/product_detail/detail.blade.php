@extends('frontend.giaodien16.layouts.default')
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
        $percent_discount = 0;
        $featureImage = $metaValue['post_featured_image'];
    }else{
        $priceNew  = number_format($product['price_discount'], 0, ',', '.');
        $priceOld  = number_format($product['price_new'], 0, ',', '.') . '&#8363;';
        $title     = $product['post_title'];
        $slug      = $product['post_slug'];
        $excerpt   = $product['post_excerpt'];
        $content   = $product['post_content'];
        $percent_discount = $product['percent_discount'];
        $featureImage = $product['featureImage'];
    }
  $featureImage = loadFeatureImage($featureImage);
?>
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home"> <a title="Quay lại trang chủ" href="/">Trang chủ</a></li>
              <!--  <li>
                  <a href="/giay-di-choi"> / Giày đi chơi</a>
                  <span><i class="fa fa-angle-double-right" aria-hidden="true"></i> </span>
               </li> -->
               <li><span class="brn">{{$title}}</span>
               <li>
            </ul>
         </div>
      </div>
   </div>
</div>    
      
<div itemscope itemtype="http://schema.org/Product">
   <meta itemprop="url" content="/giay-converse-star-collar-break">
   <meta itemprop="image" content="//bizweb.dktcdn.net/100/091/132/products/13-min-9a0b67fc-1d89-4277-8906-7b4b50c664d3.jpg?v=1468200190343">
   <meta itemprop="shop-currency" content="">
   <section class="main-container col1-layout">
      <div class="main container">
         <div class="col-main">
            <div class="row product_info">
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 prd_view_slide">
                  <div id="prd_view" class="owl-carousel owl-theme large-image ">
                     <div class="prd_thumbs">
                     <!--
                     <img src="//bizweb.dktcdn.net/thumb/large/100/091/132/products/13-min-9a0b67fc-1d89-4277-8906-7b4b50c664d3.jpg?v=1468200190343" alt="{{$title}}">
                     -->
                     <img src="{{ $featureImage }}" alt="{{$title}}">
                     </div>
                     <div class="prd_thumbs"><img src="//bizweb.dktcdn.net/thumb/large/100/091/132/products/5-min-a34571b3-bd89-418a-99f3-09cac3f32a04.jpg?v=1468200190343" alt="{{$title}}"></div>
                     <div class="prd_thumbs"><img src="//bizweb.dktcdn.net/thumb/large/100/091/132/products/14-min-beb27b11-4bb2-4b57-bb4f-e26df5f679a1.jpg?v=1468200186480" alt="{{$title}}"></div>
                  </div>
                  <div id="prd_view_thumbs" class="owl-carousel owl-theme">
                     <div class="prd_thumbs"><img src="//bizweb.dktcdn.net/thumb/compact/100/091/132/products/13-min-9a0b67fc-1d89-4277-8906-7b4b50c664d3.jpg?v=1468200190343"></div>
                     <div class="prd_thumbs"><img src="//bizweb.dktcdn.net/thumb/compact/100/091/132/products/5-min-a34571b3-bd89-418a-99f3-09cac3f32a04.jpg?v=1468200190343"></div>
                     <div class="prd_thumbs"><img src="//bizweb.dktcdn.net/thumb/compact/100/091/132/products/14-min-beb27b11-4bb2-4b57-bb4f-e26df5f679a1.jpg?v=1468200186480"></div>
                  </div>
               </div>
               <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                  <div class="product_infomation">
                     <div class="product_title">
                        <h3 class="clc5 fw_600">{{$title}}</h3>
                        <div class="on_sale hidden-xs">
                           @if( $percent_discount>0 )
                              <span> -{{$percent_discount}}%</span>
                           @endif
                        </div>
                     </div>
                    <!--  <div class="product_vendor clc5">
                        <p class="cl_mobile_old">Thương hiệu : <span><span class="cl_main">Converse</span> <span class="hidden-xs">| Giày vải</span></span></p>
                     </div> -->
                    
                     <div class="product_price">
                        <div class="price-block">
                           <div class="price-box">
                              <p class="special-price"> <span class="price-label">Giá khuyến mại</span> <span class="price prd_price">{{$priceNew}}&#8363;</span> </p>
                              @if($priceOld >0)
                                 <p class="old-price"> <span class="price-label">Giá gốc:</span> <span class="old-price price">{{$priceOld}}&#8363;</span> </p>
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="product_content hidden-xs">
                        <h5 class="fw_600">Mô tả :</h5>
                        
                        <div class="cl_old"> {{$excerpt}}</div>
                     </div>
                  </div>
                  <div class="product_pre_buy">
                     <div class="add-to-box">
                        <div class="add-to-cart">
                           <form action="{{url('cart/order/'.$slug)}}" method="post" enctype="multipart/form-data" id="add-to-cart-form">
                              <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <!-- <select id="product-selectors" name="variantId" style="display:none">
                                 <option  selected="selected"  value="4566524">Xanh - 480.000&#8363;</option>
                                 <option  value="4566525">Rêu - 450.000&#8363;</option>
                                 <option  value="4566526">Đen - 500.000&#8363;</option>
                              </select> -->
                              <label for="qty" class="cl_old cl_mobile_old">Số lượng </label>
                              <div class="custom ">
                                 <input type="number" class="prd_quantity input-text qty" value="1" name="quantity" min="1" id="qty">
                              </div>
                              <div>
                                 <div class="actions">
                           <form action="" method="post" class="variants" id="product-actions-2815479" enctype="multipart/form-data">
                          
                           <button class="btn_muangay_list btn_item_loop_list add_to_cart" title="Mua ngay"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua ngay</span></button>
                           </form>
                           </div>
                           <button class="mobile_cart hidden-lg hidden-md hidden-sm" type="submit"><a href="tel: 123456789" class="btn_muangay"><i class="fa fa-mobile" aria-hidden="true">&nbsp;</i> Gọi điện</a></button>
                           </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs prd_detail_col3">
                  <div>
                     <img src="//bizweb.dktcdn.net/thumb/icon/100/091/132/themes/139143/assets/free_deliverd.jpg?1472118628278" height="23" width="29" alt="Miễn phí vận chuyển" />
                     <p>Miễn phí vận chuyển với đơn hàng lớn hơn <span class="fw_600">1.000.000 đ</span></p>
                  </div>
                  <div>
                     <img src="//bizweb.dktcdn.net/thumb/icon/100/091/132/themes/139143/assets/giaohangngaysaukhidat.jpg?1472118628278" height="30" width="29" alt="Giao hàng ngay">
                     <p>Giao hàng ngay sau khi đặt hàng <span class="txt_i">(áp dụng với Hà Nội & HCM)</span></p>
                  </div>
                  <div>
                     <img src="//bizweb.dktcdn.net/thumb/icon/100/091/132/themes/139143/assets/doitra.jpg?1472118628278" height="23" width="30" alt="Đổi trả trong 3 ngày">
                     <p>Đổi trả trong 3 ngày, thủ tục đơn giản</p>
                  </div>
                  <div>
                     <img src="//bizweb.dktcdn.net/thumb/icon/100/091/132/themes/139143/assets/hoadon.jpg?1472118628278" height="38" width="31" alt="Cung cấp hóa đơn">
                     <p>Nhà cung cấp xuất hóa đơn cho sản phẩm này</p>
                  </div>
               </div>
            </div>
            <div class="row product_description">
               <div class="prd_tabs">
                  <ul class="nav nav-tabs pd-nav" role="tablist">
                     <li role="presentation" class="active">
                        <a href="#pd-thongtin" aria-controls="pd-thongtin" role="tab" data-toggle="tab">
                           <h5>Thông tin sản phẩm</h5>
                        </a>
                     </li>
                     <!-- <li role="presentation">
                        <a href="#pd-danhgia" aria-controls="pd-danhgia" role="tab" data-toggle="tab">
                           <h5>Khách hàng đánh giá</h5>
                        </a>
                     </li> -->
                     <li role="presentation">
                        <a href="#pd-thetag" aria-controls="pd-thetag" role="tab" data-toggle="tab">
                           <h5>Thẻ tag</h5>
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane active" id="pd-thongtin">
                        <div class="thongtin_content cl_old">
                           {!! $content !!}
                        </div>
                     </div>
                     <!-- <div role="tabpanel" class="tab-pane" id="pd-danhgia">
                        <div class="danhgia_content cl_old">
                          
                        </div>
                     </div> -->
                     <div role="tabpanel" class="tab-pane" id="pd-thetag">
                        <!-- Widget 77777777 -->
                           {!!showWidget('widget77777777')!!}
                        <!-- End Widget 77777777 -->
                        
                     </div>
                  </div>
               </div>
            </div>
            <!-- Widget 88888888 -->
               {!!showWidget('widget88888888')!!}
            <!-- End Widget 88888888 -->
            
            
         </div>
      </div>
   </section>
</div> 
      
@stop