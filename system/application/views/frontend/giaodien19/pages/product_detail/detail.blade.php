@extends('frontend.giaodien19.layouts.default')
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

   <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="col-md-12 " >
                     <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
                        <li><a href="/" target="_self">Trang chủ</a></li>
                        <!--li><a href="/collections" target="_self">Danh mục</a></li-->
                        <li class="active"><span> {{$title}}</span></li>
                     </ol>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div  id="wrapper-detail" class="product-view clearfix">
                     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div id="surround">
                           <div class="new-label new-top-right">New</div>
                           <!--
                           <img class="product-image-feature" src="//hstatic.net/817/1000069817/1/2016/1-26/23_9686c49c-d787-4d5d-6c5b-490896c12532_large.jpg" alt="{{$title}}">
                           -->
                           <img class="product-image-feature" src="{{ $featureImage }}" alt="{{$title}}">

                           <div id="sliderproduct" class="">
                              <ul class="slides" >
                                 <li class="product-thumb">
                                    <a href="javascript:" data-image="//hstatic.net/817/1000069817/1/2016/1-26/23_9686c49c-d787-4d5d-6c5b-490896c12532_large.jpg" data-zoom-image="//hstatic.net/817/1000069817/1/2016/1-26/23_9686c49c-d787-4d5d-6c5b-490896c12532_large.jpg">
                                    <img alt="{{$title}}" data-image="//hstatic.net/817/1000069817/1/2016/1-26/23_9686c49c-d787-4d5d-6c5b-490896c12532_large.jpg" src="//hstatic.net/817/1000069817/1/2016/1-26/23_9686c49c-d787-4d5d-6c5b-490896c12532_small.jpg" >
                                    </a>
                                 </li>
                                 <li class="product-thumb">
                                    <a href="javascript:" data-image="//hstatic.net/817/1000069817/1/2016/1-26/18_08a781cc-4e5f-41af-63cf-a3f37d14139b_large.jpg" data-zoom-image="//hstatic.net/817/1000069817/1/2016/1-26/18_08a781cc-4e5f-41af-63cf-a3f37d14139b_large.jpg">
                                    <img alt="{{$title}}" data-image="//hstatic.net/817/1000069817/1/2016/1-26/18_08a781cc-4e5f-41af-63cf-a3f37d14139b_large.jpg" src="//hstatic.net/817/1000069817/1/2016/1-26/18_08a781cc-4e5f-41af-63cf-a3f37d14139b_small.jpg" >
                                    </a>
                                 </li>
                                 <li class="product-thumb">
                                    <a href="javascript:" data-image="//hstatic.net/817/1000069817/1/2016/1-26/19_a2ff42c5-7463-4210-5268-0ad56916039f_large.jpg" data-zoom-image="//hstatic.net/817/1000069817/1/2016/1-26/19_a2ff42c5-7463-4210-5268-0ad56916039f_large.jpg">
                                    <img alt="{{$title}}" data-image="//hstatic.net/817/1000069817/1/2016/1-26/19_a2ff42c5-7463-4210-5268-0ad56916039f_large.jpg" src="//hstatic.net/817/1000069817/1/2016/1-26/19_a2ff42c5-7463-4210-5268-0ad56916039f_small.jpg" >
                                    </a>
                                 </li>
                                 <li class="product-thumb">
                                    <a href="javascript:" data-image="//hstatic.net/817/1000069817/1/2016/1-26/20_496b595d-44e5-4299-4c86-1e4100d1022c_large.jpg" data-zoom-image="//hstatic.net/817/1000069817/1/2016/1-26/20_496b595d-44e5-4299-4c86-1e4100d1022c_large.jpg">
                                    <img alt="{{$title}}" data-image="//hstatic.net/817/1000069817/1/2016/1-26/20_496b595d-44e5-4299-4c86-1e4100d1022c_large.jpg" src="//hstatic.net/817/1000069817/1/2016/1-26/20_496b595d-44e5-4299-4c86-1e4100d1022c_small.jpg" >
                                    </a>
                                 </li>
                                 <li class="product-thumb">
                                    <a href="javascript:" data-image="//hstatic.net/817/1000069817/1/2016/1-26/21_88ec1869-24a1-48fe-6f2b-c8764f5e4d41_large.jpg" data-zoom-image="//hstatic.net/817/1000069817/1/2016/1-26/21_88ec1869-24a1-48fe-6f2b-c8764f5e4d41_large.jpg">
                                    <img alt="{{$title}}" data-image="//hstatic.net/817/1000069817/1/2016/1-26/21_88ec1869-24a1-48fe-6f2b-c8764f5e4d41_large.jpg" src="//hstatic.net/817/1000069817/1/2016/1-26/21_88ec1869-24a1-48fe-6f2b-c8764f5e4d41_small.jpg" >
                                    </a>
                                 </li>
                                 <li class="product-thumb">
                                    <a href="javascript:" data-image="//hstatic.net/817/1000069817/1/2016/1-26/22_3c63b6d8-179b-4035-5712-351771f5c78a_large.jpg" data-zoom-image="//hstatic.net/817/1000069817/1/2016/1-26/22_3c63b6d8-179b-4035-5712-351771f5c78a_large.jpg">
                                    <img alt="{{$title}}" data-image="//hstatic.net/817/1000069817/1/2016/1-26/22_3c63b6d8-179b-4035-5712-351771f5c78a_large.jpg" src="//hstatic.net/817/1000069817/1/2016/1-26/22_3c63b6d8-179b-4035-5712-351771f5c78a_small.jpg" >
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 product-shop">
                        <div class="product-name">
                           <h1>{{$title}}</h1>
                        </div>
                        <div class="product-price" id="price-preview">
                           <span>{{$priceNew}}₫</span>
                        </div>
                        <!-- <div class="ratings product">
                           <div class="rating-box">
                              <div style="width: 90%;" class="rating"></div>
                           </div>
                        </div> -->
                        <div class="des">
                           <div class="content-des">
                              <p class="miss-des">
                                {{$excerpt}}
                              </p>
                           </div>
                        </div>
                        <form id="form_order_{{$slug}}" action="{{url('cart/order/'.$slug)}}" method="post" class="variants clearfix">
                           <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                           <div class="select clearfix" style="display:none">
                              <select id="product-select" name="id" style="display:none">
                                 <option value="1005484136">Default Title - {{$priceNew}}₫</option>
                              </select>
                           </div>
                           <div class="select-wrapper">
                              <label>Số lượng</label>
                              <input id="quantity" type="number" name="quantity" min="1" value="1" class="tc item-quantity" />
                           </div>
                           <div class="row">
                              <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12 add-to-box">
                                 <a onclick="order('{{$slug}}')" class=" button btn-cart btn-detail add2cart btn-color-add btn-min-width btn-mgt" name="add"> 
                                 Thêm vào giỏ 
                                 </a>
                              </div>
                           </div>
                        </form>
                        <div class="box-information-more clearfix">
                           <div class=" box-wrapper clearfix">
                              <div class="box-left col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                 <p>
                                    SẼ CÓ TẠI NHÀ BẠN
                                 </p>
                                 <span>từ 1 đến 5 ngày làm việc</span>
                              </div>
                              <div class="box-right col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                 <ul>
                                    <li class="free-change"><img src="//hstatic.net/969/1000003969/10/2015/12-2/icon-detail-1.png"><span>Đổi trả miễn phí 90 ngày</span></li>
                                    <li class="free-give"><img src="//hstatic.net/969/1000003969/10/2015/12-2/icon-detail-2.png"><span>Giao hàng miễn phí</span></li>
                                    <li class="free-checkout"><img src="//hstatic.net/969/1000003969/10/2015/12-2/icon-detail-3.png"><span>Thanh toán khi nhận hàng</span></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                        <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                           <li class="active"> <a href="#product_tabs_description" data-toggle="tab">Chi tiết sản phẩm</a> </li>
                           <li><a href="#product_tabs_tags" data-toggle="tab">Bình luận</a></li>
                        </ul>
                        <div id="productTabContent" class="tab-content">
                           <div class="tab-pane fade in active" id="product_tabs_description">
                              <div class="std">
                                 {!! $content !!}

                              </div>
                           </div>
                           <div role="tabpanel" class="tab-pane" id="product_tabs_tags">
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
                     </div>
                  </div>
                  
                  <!-- Widget jjjjjjjjjj -->
                     {!!showWidget('widgetjjjjjjjjjj')!!}
                  <!-- End Widget jjjjjjjjjj -->
                  

               </div>
            </div>
         </div>









<script>
$(".product-thumb img").click(function(){
   $(".product-thumb").removeClass('active');
   $(this).parents('li').addClass('active');
   $(".product-image-feature").attr("src",$(this).attr("data-image"));
   $(".product-image-feature").attr("data-zoom-image",$(this).attr("data-zoom-image"));
});

$(".product-thumb").first().addClass('active');

</script>




                        
<script>
$(document).ready(function(){
   if($(".slides .product-thumb").length>4){
      $('#sliderproduct').flexslider({
         animation: "slide",
         controlNav: false,
         animationLoop: false,
         slideshow: false,
         itemWidth:95,
         itemMargin: 10,
      });
   }
   if($(window).width() > 960){
      jQuery(".product-image-feature").elevateZoom({
         gallery:'sliderproduct',
         scrollZoom : true
      });
   } else {

   }
   jQuery('.slide-next').click(function(){
      if($(".product-thumb.active").prev().length>0){
         $(".product-thumb.active").prev().find('img').click();
      }
      else{
         $(".product-thumb:last img").click();
      }
   });
   jQuery('.slide-prev').click(function(){
      if($(".product-thumb.active").next().length>0){
         $(".product-thumb.active").next().find('img').click();
      }
      else{
         $(".product-thumb:first img").click();
      }
   });
});
</script> 

<script type="text/javascript">

      function order(i)
      {
        $("#form_order_"+i).submit();   
      }
</script>
@stop
          