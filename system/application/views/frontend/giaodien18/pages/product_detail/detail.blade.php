@extends('frontend.giaodien18.layouts.default')
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

<div class="breadcrumb">
   <div class="container">
      <ul>
         <li><a href="/" target="_self">Trang chủ</a></li>
         <!--li><a href="/collections" target="_self">Danh mục</a></li-->
         <li class="active"><span> {{$title}}</span></li>
      </ul>
   </div>
</div>
<section id="wrap-product">
   <div class="container">
      <div class="col-sm-9 col-xs-12 box-product-left">
         <div class="wrap-box-product-left">
            <div class="col-sm-5 col-xs-12 product-slider-left">
               <div id="galleria" class="galleria">		
                  <!--
                  <img data-image=http://hstatic.net/385/1000031385/1/2015/7-30/sp_2_5_a55f3fde-fe4d-467c-6a94-c6028dc3814d_94ede3cf-b619-4fe3-4577-82b6949b0841.jpg src="//hstatic.net/385/1000031385/1/2015/7-30/sp_2_5_a55f3fde-fe4d-467c-6a94-c6028dc3814d_94ede3cf-b619-4fe3-4577-82b6949b0841_grande.jpg" alt="" />
                  -->
                  <img data-image="{{ $featureImage }}" src="//hstatic.net/385/1000031385/1/2015/7-30/sp_2_5_a55f3fde-fe4d-467c-6a94-c6028dc3814d_94ede3cf-b619-4fe3-4577-82b6949b0841_grande.jpg" alt="" />

                  <img data-image=http://hstatic.net/385/1000031385/1/2015/7-30/sp_2_2_a49a23da-39df-4494-5995-137351aacfe0_361cd6ca-5aac-4197-61ee-db961a920297.jpg src="//hstatic.net/385/1000031385/1/2015/7-30/sp_2_2_a49a23da-39df-4494-5995-137351aacfe0_361cd6ca-5aac-4197-61ee-db961a920297_grande.jpg" alt="" />		
                  <img data-image=http://hstatic.net/385/1000031385/1/2015/7-30/sp_2_1_ed3154bb-a7ff-4ec5-6cce-993fc0f36c77_4cc66521-6ab8-43e8-6b40-da78824ec3eb.jpg src="//hstatic.net/385/1000031385/1/2015/7-30/sp_2_1_ed3154bb-a7ff-4ec5-6cce-993fc0f36c77_4cc66521-6ab8-43e8-6b40-da78824ec3eb_grande.jpg" alt="" />		
                  <img data-image=http://hstatic.net/385/1000031385/1/2015/7-30/sp_2_3_62a8a775-44ac-4190-5f4b-797573555870_e469e806-8732-4470-4382-18c2254fbb84.jpg src="//hstatic.net/385/1000031385/1/2015/7-30/sp_2_3_62a8a775-44ac-4190-5f4b-797573555870_e469e806-8732-4470-4382-18c2254fbb84_grande.jpg" alt="" />		
                  <img data-image=http://hstatic.net/385/1000031385/1/2015/7-30/sp_2_6_2bcbd054-4c43-4df5-5aeb-8abe5d43ed14_8c0e75c7-a365-4845-749f-d5cc26c68cbe.jpg src="//hstatic.net/385/1000031385/1/2015/7-30/sp_2_6_2bcbd054-4c43-4df5-5aeb-8abe5d43ed14_8c0e75c7-a365-4845-749f-d5cc26c68cbe_grande.jpg" alt="" />		
               </div>
            </div>
            <div class="col-sm-7 col-xs-12 product-slider-right">
               <h4>{{$title}}</h4>
               <form action="{{url('cart/order/'.$slug)}}" method="post" enctype="multipart/form-data" id="addToCartForm">
                  <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                  
                  <ul class="list-variant">
                    <!--
                     <li><span class="title-info-variant">Sản phẩm: </span><span class="number-info-variant">
                        Còn
                        </span>
                     </li>
                     -->
                     <li>
                        <div id="wrap-number-quantily" class="LabelQuantityInput">
                           <label for="quantity" class="quantity-selector">Số lượng</label>
                           <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-selector quantity-input">
                        </div>
                     </li>
                  </ul>
                  
                   
                
                  <ul id="list-price-cart">
                     <li>
                        <div class="ProductPrice VariationProductPrice price">
                           <span id="our_price_display" class="price-detail">{{$priceNew}}₫ </span>
                        </div>
                     </li>
                     <li class="add-cart-wrap">
                        <div class="DetailRow">
                           <div class="Row AddCartButton ProductAddToCart">
                              <div id="BulkDiscount">
                                 <button type="submit" name="add" id="addToCart" class="btn">
                                 <span class="icon icon-cart"></span>
                                 <span id="addToCartText" class="BulkDiscount"><i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng</span>
                                 </button>
                                 <span id="variantQuantity" class="variant-quantity"></span>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </form>
            </div>
         </div>
         <div id="detail-des" class="row">
            <div class="col-lg-12 detail-des-left">
               <ul id="detail-tab-left" role="tablist">
                  <li role="presentation" class="active"><a href="#detail-des-content1" aria-controls="detail-des-content1" role="tabpanel" data-toggle="tab">Chi tiết sản phẩm</a></li>
                  <!-- <li role="presentation"><a href="#detail-des-content2" aria-controls="detail-des-content2" role="tabpane2" data-toggle="tab">Tags</a></li> -->
               </ul>
               <!-- Tab panes -->
               <div class="tab-content">
                  {!! $content !!}
               </div>
               <!--end .tab-content-->                   
            </div>
            <!--end .col-lg-8 col-md-8 col-sm-8 col-xs-12 detail-des-left-->
         </div>
         <!--end #detail-des--> 

         <div id="binhluan-product">
            <h3>Bình luận</h3>
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
         <!--end #binhluan-->
      </div>
      <!--end .col-sm-9 col-xs-12 box-product-left-->
         <!-- Widget 666666666 -->
            {!!showWidget('widget666666666')!!}
         <!-- End Widget 666666666 -->



   </div>
   <!--end .container-->
</section>



<!--end #wrap-product-->  
<script>
   // Load the classic theme
   Galleria.loadTheme("{{ asset('template/giaodien18/asset/js/galleria.classic.min.js') }}");
   Galleria.run('#galleria',{
      transition: 'slide',
      imageCrop: 'false',
      maxScaleRatio: 1,
      autoplay: false,
      responsive:true, 
      height: 1.2,
      lightbox: true,
      debug:false
   });
</script>

<script type="text/javascript">

      function order(i)
      {
        $("#form_order_"+i).submit();   
      }
</script>
       
@stop
        
           
          
        