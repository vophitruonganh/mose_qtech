@extends('frontend.giaodien9.layouts.default')
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
      <div class="wrapper archive-product single-product">
         <div class="fix-width">
            <div id="primary">
               <!-- Begin breadcrumb -->
               <div class="breadcrumb clearfix">
                  <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://lkt-business.myharavan.com" title="LKT-Business" itemprop="url"><span itemprop="title">Trang chủ</span></a></span>
                  <span class="arrow-space">&#62;</span>
                  <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                  <a href="/collections/tat-ca-san-pham" title="Tất Cả Sản Phẩm">Tất Cả Sản Phẩm</a>
                  </span>
                  <span class="arrow-space">&#62;</span>
                  <strong>{{$title}}</strong>
               </div>
               <!-- End breadcrumb -->
               <div id="product" class="main-product website-ban-hang-01">
                  <div class="product-slider">
                     <div class="list-zoom">
                        <div data-id="image_1014222547" class="jqzoom">
                          <!--
                           <img alt="" src="a//hstatic.net/668/1000057668/1/2015/12-21/website-san-pham-1_1024x1024.png" jqimg="//hstatic.net/668/1000057668/1/2015/12-21/website-san-pham-1_1024x1024.png">
                          -->
                          <img alt="" src="{{ $featureImage }}" jqimg="//hstatic.net/668/1000057668/1/2015/12-21/website-san-pham-1_1024x1024.png">
                        </div>
                        <div data-id="image_1014222674" class="jqzoom">							
                           <img alt="" src="//hstatic.net/668/1000057668/1/2015/12-21/website-san-pham-1-detail_1024x1024.png" jqimg="//hstatic.net/668/1000057668/1/2015/12-21/website-san-pham-1-detail_1024x1024.png">
                        </div>
                     </div>
                  </div>
                  <header class="header-product">
                     <h1 class="product-title">{{$title}}</h1>
                     <ul class="meta-product">
                        <li class="purchase">
                           <p class="product-price"><span class="price">{{$priceNew}}₫</span></p>
                        </li>
                        <li class="description">
                          {{$excerpt}}
                        </li>
                        <li class="cart">
                           <form id="add-item-form" action="{{url('cart/order/'.$slug)}}" method="post" class="variants clearfix">
                              <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <!-- Begin product options -->	
                              <div class="select clearfix" style="display:none">
                                 <select id="product-select" name="id">
                                    <option value="1004984987" selected="selected"  data-sku="ST001">Default Title - {{$priceNew}}₫</option>
                                 </select>
                                 <div class="selector-wrapper">
                                    <label>Số lượng</label>
                                    <span class="value">
                                    <input id="quantity" type="number" name="quantity" value="1" class="tc item-quantity" />
                                    </span>
                                 </div>
                              </div>
                              <div class="purchase-section">
                                 <div class="purchase">
                                    <button type="submit" class="btn addtocart add-to-cart" name="add" value="fav_HTML">Giỏ Hàng</button>
                                    <div class="cart-animation">1</div>
                                 </div>
                              </div>
                              <!-- End product options -->
                           </form>
                        </li>
                     </ul>
                  </header>
                  <!-- Begin description -->
                  <div class="product-content entry-content clearfix">
                     {{$content}}
                  </div>
                  <!-- End description -->
                  <!-- Begin social buttons -->
                  <div class="socials-sharing">
                     <div class="social-sharing " data-permalink="{{url('collections/'.$slug)}}">
                        <a target="_blank" href="//www.facebook.com/sharer.php?u={{url('collections/'.$slug)}}" class="share-facebook">
                        <span class="icon icon-facebook" aria-hidden="true"></span>
                        <span class="share-title">Facebook</span>
                        <span class="share-count">0</span>
                        </a>
                        <a target="_blank" href="//twitter.com/share?url={{url('collections/'.$slug)}}&amp;text=Website%20B%C3%A1n%20H%C3%A0ng%2001" class="share-twitter">
                        <span class="icon icon-twitter" aria-hidden="true"></span>
                        <span class="share-title">Twitter</span>
                        <span class="share-count">0</span>
                        </a>
                        <a target="_blank" href="//pinterest.com/pin/create/button/?url={{url('collections/'.$slug)}}&amp;media=http://hstatic.net/668/1000057668/1/2015/12-21/website-san-pham-1_1024x1024.png&amp;description=Website%20B%C3%A1n%20H%C3%A0ng%2001" class="share-pinterest">
                        <span class="icon icon-pinterest" aria-hidden="true"></span>
                        <span class="share-title">Pinterest</span>
                        <span class="share-count">0</span>
                        </a>
                        <a target="_blank" href="http://www.thefancy.com/fancyit?ItemURL={{url('collections/'.$slug)}}&amp;Title=Website%20B%C3%A1n%20H%C3%A0ng%2001&amp;Category=Other&amp;ImageURL=//hstatic.net/668/1000057668/1/2015/12-21/website-san-pham-1_1024x1024.png" class="share-fancy">
                        <span class="icon icon-fancy" aria-hidden="true"></span>
                        <span class="share-title">Fancy</span>
                        </a>
                        <a target="_blank" href="//plus.google.com/share?url={{url('collections/'.$slug)}}" class="share-google">
                           <!-- Cannot get Google+ share count with JS yet -->
                           <span class="icon icon-google" aria-hidden="true"></span>
                           <span class="share-count">+1</span>
                        </a>
                     </div>
                  </div>
                  <!-- End social buttons -->
                  <div id="haravan-product-reviews" data-id="1001418214"></div>
                  <div id="comments">
                     <h4 class="heading"><span>Bình luận</span></h4>
                     <div class="container-fluid">
                        <div id="fb-root"></div>
                        <div class="fb-comments" data-href="{{url('collections/'.$slug)}}" data-numposts="5" width="100%" data-colorscheme="light"></div>
                        <!-- script comment fb -->
                        <script type="text/javascript">(function(d, s, id) {
                           var js, fjs = d.getElementsByTagName(s)[0];
                           if (d.getElementById(id)) return;
                           js = d.createElement(s); js.id = id;
                           js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                           fjs.parentNode.insertBefore(js, fjs);
                           }(document, 'script', 'facebook-jssdk'));
                        </script>
                     </div>
                  </div>
               </div>
               <!-- Begin related product -->
                  <!-- Widget ggggg -->
                     {!!showWidget('widgetggggg')!!}
                  <!-- End Widget ggggg -->
             
               
                  
                     


                  
               </div>
            </div>
            <div id="secondary" class="sidebar">

               <!-- Widget 5555 -->
                  {!!showWidget('widgeteeeee')!!}
               <!-- End Widget 5555 -->
         
               <!-- Widget 6666 -->
                  {!!showWidget('widgetfffff')!!}
               <!-- End Widget 6666 -->

            </div>
         </div>
        
      </div>
      
   @stop