@extends('frontend.giaodien17.layouts.default')
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

<div class="fvc" style="float:left;width:100%;">
         <div class="banner_page_list">
            <h1>{{$title}}</h1>
         </div>
         <div class="breadcrumbs">
            <div class="container">
               <ul>
                  <li class="home"> <a href="/" title="Trang chủ">Trang chủ &nbsp;</a></li>
                 <!--  <li><a href="san-pham-noi-bat"> Sản phẩm nổi bật &nbsp;</a></li> -->
                  <li><strong>{{$title}}</strong>
                  <li>
               </ul>
            </div>
         </div>
         <div class="product-view-area" itemscope itemtype="http://schema.org/Product">
            <meta itemprop="url" content="//mendover-theme-1.bizwebvietnam.net/nha-pho-dep-3-tang-khac-phuc-nang-huong-tay">
            <meta itemprop="image" content="//bizweb.dktcdn.net/thumb/grande/100/069/071/products/16.jpg?v=1458793722490">
            <meta itemprop="shop-currency" content="VND">
            <div class="container">
               <div class="row">
                  <div class="col-xs-12 col-sm-5 col-lg-5 col-md-5">
                     <div id="sync1" class="owl-carousel large-image">
                        <div class="item">
                          <!--
                           <img class="sp-image" src="//bizweb.dktcdn.net/thumb/large/100/069/071/products/16.jpg?v=1458793722490" alt="Nhà phố đẹp 3 tầng khắc phục nắng hướng tây" />
                          -->
                          <img class="sp-image" src="{{ $featureImage }}" alt="Nhà phố đẹp 3 tầng khắc phục nắng hướng tây" />
                        </div>
                        <div class="item">
                           <img class="sp-image" src="//bizweb.dktcdn.net/thumb/large/100/069/071/products/15.jpg?v=1458793722490" alt="Nhà phố đẹp 3 tầng khắc phục nắng hướng tây" />
                        </div>
                     </div>
                     <div id="sync2" class="owl-carousel">
                        <div class="item">
                           <img src="//bizweb.dktcdn.net/thumb/small/100/069/071/products/16.jpg?v=1458793722490" alt="Nhà phố đẹp 3 tầng khắc phục nắng hướng tây" />
                        </div>
                        <div class="item">
                           <img src="//bizweb.dktcdn.net/thumb/small/100/069/071/products/15.jpg?v=1458793722490" alt="Nhà phố đẹp 3 tầng khắc phục nắng hướng tây" />
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7">
                     <div class="product-details-area">
                        <div class="product-description">
                           <form action="{{url('cart/order/'.$slug)}}" method="post" enctype="multipart/form-data" id="add-to-cart-form" class="cart">
                              <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <h2 itemprop="name">{{$title}}</h2>
                              <div class="short-description">
                                 <p class="stock-status">Còn hàng</p>
                                 <div class="price-box-small">
                                    <span itemprop="price" class="special-price" style="font-size: 24px;">
                                    {{$priceNew}}&#8363;
                                    </span>
                                 </div>
                                 <p class="des_content">{{$excerpt}}</p>
                              </div>
                              <input type="hidden" name="variantId" value="2783498" />
                              <div class="add-to-cart">
                                 <label for="qty">Số lượng:</label>
                                 <div class="pull-left">
                                    <div class=" pull-left">
                                       <input onkeypress="isAlphaNum(event);"  type="text" title="Số lượng" value="1" maxlength="12" id="qty" name="quantity" class="input-text qty"  oninput="validity.valid||(value='');" >
                                       <div class="btn_count">
                                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-angle-up"></i></button>
                                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-angle-down"></i></button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="qnt-addcart clearfix">
                                 <button class="btn-cart add_to_cart button_detail_product"  title="MUA NGAY" type="submit">Mua ngay</button>
                              </div>
                              <div class="detailcall clearfix">
                                 <div class="callphoneicon">
                                    <i class="fa fa-phone"></i>
                                 </div>
                                 <a href="tel:19001500">Gọi ngay 1900 1500 <br><span>(Đặt hàng nhanh chóng)</span></a>
                              </div>
                              <div class="social-media">
                                 <ul>
                                    <li>
                                       <a style="padding: 10px 15px;" class="color-tooltip facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=http://mendover-theme-1.bizwebvietnam.net/nha-pho-dep-3-tang-khac-phuc-nang-huong-tay&t=Nhà phố đẹp 3 tầng khắc phục nắng hướng tây" data-toggle="tooltip" title="" data-original-title="Facebook">
                                       <i class="fa fa-facebook"></i>
                                       </a>
                                    </li>
                                    <li>
                                       <a style="padding: 10px 13px;" class="color-tooltip twitter" target="_blank" data-toggle="tooltip" title="" href="http://twitter.com/share?url=http://mendover-theme-1.bizwebvietnam.net/nha-pho-dep-3-tang-khac-phuc-nang-huong-tay&text=Nhà phố đẹp 3 tầng khắc phục nắng hướng tây&via=TWITTER_NAME" data-original-title="Twitter">
                                       <i class="fa fa-twitter"></i>
                                       </a>
                                    </li>
                                    <li>
                                       <a style="padding: 10px 10px;" class="color-tooltip google-plus" target="_blank" data-toggle="tooltip" title="" href="https://plus.google.com/share?url=http://mendover-theme-1.bizwebvietnam.net/nha-pho-dep-3-tang-khac-phuc-nang-huong-tay" data-original-title="Google-plus">
                                       <i class="fa fa-google-plus"></i>
                                       </a>
                                    </li>
                                    <li>
                                       <a style="padding: 10px 13px;" class="color-tooltip dribbble" target="_blank" data-toggle="tooltip" title="" href="http://www.pinterest.com/pin/create/button/?url=http://mendover-theme-1.bizwebvietnam.net/nha-pho-dep-3-tang-khac-phuc-nang-huong-tay&description=Nhà phố đẹp 3 tầng khắc phục nắng hướng tây&media=//bizweb.dktcdn.net/100/069/071/products/16.jpg?v=1458793722490" data-original-title="instagram">
                                       <i class="fa fa-instagram"></i>
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- PRODUCT-VIEW-AREA-END -->
         <!-- PRODUCT-OVERVIEW-TAB-START -->
         <div class="product-overview-tab">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <div class="tab-menu-area">
                        <ul class="tab-menu">
                           <li class="active">
                              <a style="padding-left:0px;" data-toggle="tab" href="#description">Thông tin sản phẩm</a>
                           </li>
                           <!-- <li>
                              <a data-toggle="tab" href="#reviews">Giới thiệu</a>
                           </li> -->
                           <li>
                              <a data-toggle="tab" href="#reviews2">Tags</a>
                           </li>
                        </ul>
                     </div>
                     <div class="tab-content">
                        <div id="description" class="tab-pane fade in active">
                           {!! $content !!}
                        </div>
                        <!-- <div id="reviews" class="tab-pane fade">
                           <div class="tags">
                              Giới thiệu
                           </div>
                        </div> -->
                       
                        <div id="reviews2" class="tab-pane fade">
                            <!-- Widget fffffffff -->
                              {!!showWidget('widgetfffffffff')!!}
                           <!-- End Widget fffffffff -->
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- PRODUCT-OVERVIEW-TAB-END -->
         <!-- Widget ggggggggg -->
            {!!showWidget('widgetggggggggg')!!}
         <!-- End Widget ggggggggg -->
        
         <!--end class tz-lastest-shop-->
         
         
         <!--end class partner-->
      </div>

<script type="text/javascript">

      function order(i)
      {
        $("#form_order_"+i).submit();   
      }
</script>
@stop