@extends('frontend.giaodien20.layouts.default')
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

<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <div class="inner">
         <a href="/" title="Quay lại trang chủ">Trang chủ</a>
         <span aria-hidden="true">/</span>
       <!--   <a href="/collections/san-pham-moi" title="">Sản phẩm mới</a> -->
         <span aria-hidden="true">/</span>
         <span>Máy tính xách tay lenovo</span>
      </div>
   </nav>
   <!-- /templates/product.liquid -->
   <div itemscope itemtype="http://schema.org/Product">
      <meta itemprop="url" content="http://oneshop-demo.myharavan.com/products/may-tinh-samsung-3">
      <meta itemprop="image" content="//hstatic.net/030/1000104030/1/2016/7-29/25_f1db371c-471a-40bd-5f62-cb348b4931fc_grande.jpeg">
      <div class="grid product-single">
         <div class="grid__item large--one-half text-center">
            <div class="grid">
               <div class="product-single__photos grid__item large--four-fifths medium--four-fifths small--four-fifths right" id="ProductPhoto">
                  <a href="//hstatic.net/030/1000104030/1/2016/7-29/25_f1db371c-471a-40bd-5f62-cb348b4931fc_master.jpeg" class="cloud-zoom" title="Máy tính xách tay lenovo" data-rel="useWrapper: false, showTitle: false, zoomWidth:'auto', zoomHeight:'auto', adjustY:0, adjustX:10">
                  <!--
                  <img src="//hstatic.net/030/1000104030/1/2016/7-29/25_f1db371c-471a-40bd-5f62-cb348b4931fc_grande.jpeg" alt="" id="ProductPhotoImg">
                  -->
                  <img src="{{ $featureImage }}" alt="" id="ProductPhotoImg">
                  </a>
               </div>
               <div class="left grid__item large--one-fifth medium--one-fifth small--one-fifth" id="ProductThumbnails">
                  <div class="lite-carousel-play special-collection">
                     <a class="prev carousel-md" href="#">
                     <span class="fa fa-angle-up"></span>
                     </a>
                     <div data-carousel="lite" data-visible="4">
                        <ul class="product-single__thumbnails" id="ProductThumbs">
                           <li class="product__thumbnails">
                              <a href="//hstatic.net/030/1000104030/1/2016/7-29/25_f1db371c-471a-40bd-5f62-cb348b4931fc_master.jpeg" class="product-single__thumbnail thumb-link" data-rel="//hstatic.net/030/1000104030/1/2016/7-29/25_f1db371c-471a-40bd-5f62-cb348b4931fc_grande.jpeg">
                              <img src="//hstatic.net/030/1000104030/1/2016/7-29/25_f1db371c-471a-40bd-5f62-cb348b4931fc_compact.jpeg" alt="">
                              </a>
                           </li>
                           <li class="product__thumbnails">
                              <a href="//hstatic.net/030/1000104030/1/2016/7-29/26_10d2fcb5-d85d-4507-9750-8389359e3f59_d3099f0e-3d0a-4cca-57f5-3b2612c69280_master.jpeg" class="product-single__thumbnail thumb-link" data-rel="//hstatic.net/030/1000104030/1/2016/7-29/26_10d2fcb5-d85d-4507-9750-8389359e3f59_d3099f0e-3d0a-4cca-57f5-3b2612c69280_grande.jpeg">
                              <img src="//hstatic.net/030/1000104030/1/2016/7-29/26_10d2fcb5-d85d-4507-9750-8389359e3f59_d3099f0e-3d0a-4cca-57f5-3b2612c69280_compact.jpeg" alt="">
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
            <h1 itemprop="name">Máy tính xách tay lenovo</h1>
            <span class="haravan-product-reviews-badge" data-id="1002754002"></span> <!-- end rating -->
            <span class="visually-hidden">Giá ban đầu</span>
            <div id="ProductPrice" class="h2" itemprop="price">
               8,000,000₫
            </div>
            <span class="visually-hidden">Giảm giá</span>
            <p id="ComparePrice">
               So sánh 9,500,000₫
            </p>
            <!-- end price -->
            <p class="des-short">
               Ngày nay, nhiều hãng giày khi bán hàng cho khách thường đựng giày trong một chiếc hộp rất đẹp, có kèm cả túi chống ẩm. Khi mua hàng về, bạn đừng vứt hộp đi. Chẳng...
            </p>
            <!-- end short des -->
            <hr>
            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
               <meta itemprop="priceCurrency" content="VND">
               <link itemprop="availability" href="http://schema.org/InStock">
               <form action="{{url('cart/order/'.$slug)}}" method="post" enctype="multipart/form-data" id="AddToCartForm" class="form-vertical">
                  <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <div class="junoVariants">
                     <select name="id" id="productSelect" class="product-single__variants">
                        <option  selected="selected"  data-sku="" value="1007900386">Default Title - 8,000,000 VND</option>
                     </select>
                  </div>
                  <label for="Quantity" class="quantity-selector">Số lượng</label>
                  <input type="number" id="Quantity" name="quantity" value="1" min="1" class="quantity-selector">
                  <button type="submit" name="add" id="AddToCart" class="btn btn--secondary">
                  <i class="fa fa-shopping-cart"></i>
                  <span id="AddToCartText">Thêm vào giỏ</span>
                  </button>
                  <a class="btn wishlist  awe-button product-quick-whistlist" href="/account/login" data-toggle="tooltip" title="Add to whistlist">
                  <i class="fa fa-heart"></i>
                  </a>
               </form>
            </div>
            <div class="add-this">
            </div>
         </div>
      </div>
      <div class="product-tabs">
         <!-- Nav tabs -->
         <ul class="nav nav-tabs tab-v7" role="tablist">
            <li role="presentation" class="active"><a href="#product-detail" aria-controls="home" role="tab" data-toggle="tab">Miêu tả</a></li>
            <!-- <li role="presentation">
               <a href="#product-shipping"  data-toggle="tab">Chính sách vận chuyển</a>
            </li> -->
         </ul>
         <!-- Tab panes -->
         <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="product-detail">
               <div class="product-description rte" itemprop="description">
                  {!! $content !!}
               </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="product-shipping">
               <div class="rte">
                  <!-- đây là chính sach -->
               </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="product-reviews">
               <div id="haravan-product-reviews" data-id="1002754002"></div>
            </div>
         </div>
      </div>

       <!-- Widget 9999999999a -->
         {!!showWidget('widget9999999999a')!!}
      <!-- End Widget 9999999999a -->




   </div>
   <script src='//hstatic.net/0/0/global/option_selection.js' type='text/javascript'></script>
   <script>
      var selectCallback = function(variant, selector) {
        if (variant) {
          if (variant.available) {
            // Selected a valid variant that is available.
            $('#AddToCart').removeClass('disabled').removeAttr('disabled').val('Add to Cart').fadeTo(200,1);
          } else {
            // Variant is sold out.
            $('#AddToCart').val('Sold Out').addClass('disabled').attr('disabled', 'disabled').fadeTo(200,0.5);
          }
          // Whether the variant is in stock or not, we can update the price and compare at price.
          if ( variant.compare_at_price > variant.price ) {
            $('#ProductPrice').html('<span class="product-price on-sale">'+ Haravan.formatMoney(variant.price, "") +'</span>'+'&nbsp;<s class="product-compare-price">'+Haravan.formatMoney(variant.compare_at_price, '{{$priceNew}}₫')+ '</s>');
          } else {
            $('#ProductPrice').html('<span class="product-price">'+ Haravan.formatMoney(variant.price, '{{$priceNew}}₫') + '</span>' );
          }
        } else {
          // variant doesn't exist.
          $('#AddToCart').val('Unavailable').addClass('disabled').attr('disabled', 'disabled').fadeTo(200,0.5);
        }
      }
      jQuery(function($) {
        new Haravan.OptionSelectors('productSelect', {
          product: {"available":true,"compare_at_price_max":950000000.0,"compare_at_price_min":950000000.0,"compare_at_price_varies":false,"compare_at_price":950000000.0,"content":null,"description":"<p>Ngày nay, nhiều hãng giày khi bán hàng cho khách thường đựng giày trong một chiếc hộp rất đẹp, có kèm cả túi chống ẩm. Khi mua hàng về, bạn đừng vứt hộp đi. Chẳng hạn, đôi giày đó bạn chỉ đi vào mùa lạnh, thì khi không dùng nữa, hãy nhét giấy vụn vào trong giày để giữ cho giầy không bị biến dạng, rồi bỏ giày vào hộp cùng gói hút ẩm. Như vậy, đôi giày của bạn sẽ yên vị trong hộp nhiều tháng trời mà không ảnh hưởng tới chất lượng của da.</p><p>- Làm mềm giày da Đôi giày da để trong xó tủ nào đó, bỗng một ngày nọ bạn muốn dùng đến nó nhưng da đã bị cứng, co lại, khi đi có cảm giác đau chân. Để làm mềm da, hãy thoa một lớp kem vaseline lên giày trước khi đánh xi, giày sẽ mềm trở lại. Hoặc sau khi lấy giày trong tủ ra, bạn dùng giẻ mềm thấm nước vắt khô, lau toàn bộ đôi giày rồi để sau một đêm, da giày sẽ mềm hơn. Để da giày bền lâu, bạn hạn chế làm ướt giày. Khi giày bị ướt không nên hơ trước ngọn lửa hoặc phơi nắng, nó sẽ làm giày bị cứng và co lại, chỉ nên phơi giày ướt ở nơi râm mát, sau khi giày khô thì đánh xi để làm cho da mềm trở lại.</p><p>- Khử mùi hôi trong giày Giày dùng cả ngày thường bị mồ hôi làm ẩm ướt, gây mùi hôi. Nên đặt túi đựng viên chống ẩm vào trong giày để hút ẩm và rắc phấn rôm để khử mùi. Để hạn chế mùi hôi và sự ẩm ướt, hãy chọn tất chân loại tốt, có khả năng hút ẩm cao. Dùng lót giày khử mùi cũng là một phương pháp tốt.</p>","featured_image":"http://hstatic.net/030/1000104030/1/2016/7-29/25_f1db371c-471a-40bd-5f62-cb348b4931fc.jpeg","handle":"may-tinh-samsung-3","id":1002754002,"images":["http://hstatic.net/030/1000104030/1/2016/7-29/25_f1db371c-471a-40bd-5f62-cb348b4931fc.jpeg","http://hstatic.net/030/1000104030/1/2016/7-29/26_10d2fcb5-d85d-4507-9750-8389359e3f59_d3099f0e-3d0a-4cca-57f5-3b2612c69280.jpeg"],"options":["Tiêu đề"],"price":800000000.0,"price_max":800000000.0,"price_min":800000000.0,"price_varies":false,"tags":["≤1tr","dealday","blue","black"],"template_suffix":null,"title":"Máy tính xách tay lenovo","type":"Điện tử","url":"/products/may-tinh-samsung-3","pagetitle":"Máy tính dell","metadescription":null,"variants":[{"id":1007900386,"barcode":null,"available":true,"price":800000000.0,"sku":null,"option1":"Default Title","option2":"","option3":"","options":["Default Title"],"inventory_quantity":1,"old_inventory_quantity":1,"title":"Default Title","weight":0.0,"compare_at_price":950000000.0,"inventory_management":null,"inventory_policy":"deny","selected":false,"url":null,"featured_image":null}],"vendor":"Khác","published_at":"2016-07-29T06:48:55.584Z","created_at":"2016-07-29T07:23:22.734Z"},
          onVariantSelected: selectCallback,
          enableHistoryState: true
        });
      
        // Add label if only one product option and it isn't 'Title'. Could be 'Size'.
        
          $('.selector-wrapper:eq(0)').prepend('<label for="productSelect-option-0">Ti&#234;u đề</label>');
        
      
        // Hide selectors if we only have 1 variant and its title contains 'Default'.
        
          $('.selector-wrapper').hide();
        
      });
   </script>
</main>

  
@stop
       
      
     