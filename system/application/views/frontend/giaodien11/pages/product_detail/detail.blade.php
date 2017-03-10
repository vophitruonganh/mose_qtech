<?php 
        $product_id = $product['product_id'];
        $title     = $product['product_title'];
        $slug      = $product['product_slug'];
        $excerpt   = $product['product_excerpt'];
        $content   = $product['product_content'];
        $featureImage = get_image_url($product['product_image_id']);
        $comment_status = $product['comment_status'];
        $priceNew  = number_format($product['price_new'], 0, ',', '.');
        $priceOld  = ($product['price_old'] == 0) ? 0 : number_format($product['price_old'], 0, ',', '.');
        $list_post_image = decode_serialize($product['product_image']);

    
?>
@extends('frontend.giaodien11.layouts.default')
@section('content')
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ</a><span>|</span></li>
            <li><a href="{{url('collections')}}"> Sản phẩm</a><span>|</span></li>
            <li><strong>{{$title}}</strong>
            <li>
         </ul>
      </div>
   </div>
</div>
<section class="main-container col1-layout" itemscope itemtype="http://schema.org/Product">
   <div class="main container">
      <div class="col-main">
         <div class="row">
            <div class="product-view">
               <div class="product-essential">
                  <form action="{{url('cart/order/'.$slug)}}" method="post" enctype="multipart/form-data" id="product_addtocart_form">
                  <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <input type="hidden" id="product_id" name="product_id" value="{{$product_id}}">
                     <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
                        <div class="large-image">
                           <ul class="moreview" id="moreview">
                              @if(count($list_post_image)>0)
                                @foreach($list_post_image as $img)
                                    <li class="moreview_thumb">
                                      <img class="moreview_thumb_image" src="{{get_image_url($img)}}" alt="{{$title}}"> 
                                      <img class="moreview_small_image_fake" style="display:none;" src="{{get_image_url($img)}}" alt="{{$title}}">
                                      <img class="moreview_source_image" src="{{get_image_url($img)}}" alt="{{$title}}"> 
                                      <!--<span class="roll-over">Di chuột vào ảnh để xem chi tiết</span> -->
                                      <img  class="zoomImg" src="{{get_image_url($img)}}" alt="{{$title}}">
                                    </li>
                                @endforeach
                              @endif
                           </ul>
                        </div>
                        <div class="moreview-control"> 
                           <a href="javascript:void(0)" class="moreview-prev"></a>
                           <a href="javascript:void(0)" class="moreview-next"></a>
                        </div>
                     </div>
                     <div class="product-shop col-lg-7 col-sm-7 col-xs-12">
                        <div class="product-name">
                           <h1 itemprop="name">{{$title}}</h1>
                        </div>
                        <div class="variant">
                            @if(count($list_variant_id)>1)
                                <?php $i=1; ?>
                                @foreach($list_variant_name as $variant_name)
                                    <?php $list_variant_value = get_variant_meta_product_detail( $variant_name , $product_id ) ?>
                                    @if(count($list_variant_value)>1)
                                    <div class="variant-name">{{$variant_name}}</div>
                                    <input type="hidden" value="{{$variant_name}}" id="variant_name_{{$i}}">
                                    <select name="variant_option_{{$i}}" id="variant_option_{{$i}}">
                                        @foreach($list_variant_value as $value)
                                             <option @if(in_array($value->variant_value,$list_variant_meta_value)) selected @endif value="{{$value->variant_value}}">{{$value->variant_value}}</option>
                                        @endforeach
                                    </select>
                                    <?php $i++; ?>
                                    @endif
                                    
                                @endforeach
                            @endif
                        </div>
                        <div class="price-block">
                           <div class="price-box">
                              <p class="special-price" itemprop="price"> <span id="product-price-48" class="price" itemprop="price"> {{$priceNew}}&#8363; </span> </p>
                              @if($priceOld)
                              <p class="old-price"> <span id="old-price-48" class="price"> {{$priceOld}}&#8363; </span> </p>
                              @endif
                           </div>
                        </div>
                        <div class="short-description">
                           <p> {{$excerpt}}</p>
                        </div>
                        <div class="add-to-box">
                           <div class="add-to-cart" style=" float: left; width: 100%;">
                              <div class="pull-left" style=" float: left; width: 100%;">
                                 <input type="hidden" name="variantId" value="1850772" />
                              </div>
                           </div>
                           <div class="add-to-cart">
                              <label for="qty">Số lượng:</label>
                              <div class="pull-left">
                                 <div class="custom pull-left">
                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                    <input onkeypress="isAlphaNum(event);"  type="text" title="Qty" value="1" maxlength="12" id="qty" name="quantity" class="input-text qty"  oninput="validity.valid||(value='');" >
                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="social">
                           <button class="button btn-cart  add_to_cart" title="Thêm vào giỏ hàng" type="submit"><span>Thêm vào giỏ hàng</span></button>
                        </div>
                        <!--<div class="social" style="border-top:none;">
                           <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5269ddad0d5cefd6" async="async"></script>
                           <div class="addthis_native_toolbox"></div>
                           </div>-->
                        <input type="hidden" id="variant_id" name="variant_id" value="">
                     </div>
                  </form>
               </div>
               <div class="product-collateral">
                  <div class="col-sm-12">
                     <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                        <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Chi tiết sản phẩm </a> </li>
                        <li><a href="#product_tabs_tags" data-toggle="tab">Tags sản phẩm</a></li>
                        
                     </ul>
                     <div id="productTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="product_tabs_description">
                           <div class="std">
                            {!!$content!!}
                           </div>
                        </div>
                        <div class="tab-pane fade" id="product_tabs_tags">
                           <div class="box-collateral box-tags">
                                <div class="tags">
                                   <?php $taxs = get_taxonomy_product_detail( 'product_tag', $slug) ?>
                                    @if($taxs)
                                     <ul>
                                        @foreach($taxs as $tax)
                                         <li><a href="{{url('collections/'.$tax->taxonomy_slug)}}" title='{{$slug}}'>{{$tax->taxonomy_name}}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                             </div>
                        </div>
                       
                     </div>
                  </div>
                   @if($comment_status=='yes') 
                   <div class="comment">
                       <div class="fb-comments" data-href="{{url('collections/'.$slug)}}" data-width="100%" data-numposts="5"></div>
                   </div>
                   @endif
                  <div class="col-sm-12">
                     <div class="box-additional">
                        <div class="related-pro">
                           <div class="slider-items-products">
                              <?php $product_relateds = get_product_related('product_category', $slug, 10 ) ?>
                              @if($product_relateds)
                              <div class="slider-items-products">
                              <div class="new_title center">
                                 <h2>Sản phẩm liên quan</h2>
                              </div>
                              <div id="related-products-slider" class="product-flexslider hidden-buttons ">
                                 <div class="slider-items slider-width-col4 hidden_btn_cart">
                                  @foreach($product_relateds as $product)  
                   
                                    <div class="item">
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
                                             <form action="{{url('cart/order/'.$product['product_slug'])}}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                                                <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                
                                                <input type="hidden" name="quantity" value="1" />
                                                <div class="hover_fly">
                                                   <a class="exclusive ajax_add_to_cart_button btn-cart add_to_cart" onclick="order({{$product['product_id']}})" title="Cho vào giỏ hàng">
                                                      <div><i class="icon-shopping-cart"></i><span>Mua hàng</span></div>
                                                   </a>
                                                   <input type="hidden" name="variantId" value="1850762" />
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
                                                         <span class="price">{{number_format($product['price_new'],0,'.','.')}}&#8363;</span> 
                                                      </p>
                                                      @if($product['price_old'])
                                                      <p class="old-price"> 
                                                         <span class="price-sep">-</span> 
                                                         <span class="price">{{number_format($product['price_old'],0,'.','.')}}&#8363;</span> 
                                                      </p>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="button_mobile hidden-lg hidden-md">
                                                   <form action="{{url('cart/order/'.$product['product_slug'])}}" method="post" class="variants" id="product-actions-1195907" enctype="multipart/form-data">
                                                      <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                      <input type="hidden" name="quantity" value="1" />
                                                      <div class="actions">
                                                         <input type="hidden" name="variantId" value="1850762" />
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

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--End main-container --> 
<script src='//bizweb.dktcdn.net/assets/themes_support/option-selectors.js?16052016' type='text/javascript'></script>
<style>
   .add-to-cart .selector-wrapper label{
   float: left !important;
   margin-right: 15px;
   }
</style>

<script type="text/javascript">

  function order(i)
    {
         $("#form_order_"+i).submit();   
    }
</script>

 <script>
        function get_variant(product_id, variant_id){
                 $.ajax({
                   async: false,
                   method: 'get',
                   url: '/collections/'+product_id+'/'+variant_id,
                   success: function(data) {
                   product_meta = data;
                 }});
                 //number_format($product['price_new'], 0, ',', '.');
                $('.special-price').html('<span id="product-price-48" class="price" itemprop="price">'+product_meta['price_new']);
                $('.old-price').html('<span id="old-price-48" class="price">'+product_meta['price_old']);   
                $('#variant_id').val(variant_id);   
            }
 </script>
<script>
      $('#variant_option_1, #variant_option_2, #variant_option_3').change(function(){
             var data = {};
             var product_id   = $('#product_id').val();
             var token      = $('input[name="_token"]').val();
             var variant_value_1 = $('select[name="variant_option_1"]').val(); 
             var variant_value_2 = $('select[name="variant_option_2"]').val(); 
             var variant_value_3 = $('select[name="variant_option_3"]').val();
             var variant_name_1 = $('#variant_name_1').val(); 
             var variant_name_2 = $('#variant_name_2').val(); 
             var variant_name_3 = $('#variant_name_3').val(); 
             
             if(variant_value_1 != 'undefined' && variant_value_1 != undefined){
                  data[variant_name_1] = variant_value_1;
             }
             if(variant_value_2 != 'undefined' && variant_value_2 != undefined ){
                  data[variant_name_2] = variant_value_2;
             }
             if(variant_value_3 != 'undefined' && variant_value_3 != undefined ){
                  data[variant_name_3] = variant_value_3;
             }
             $.ajax({
                  type      : "POST",
                  url       : '/collections/get_variant_price',
                  dataType  : 'json',
                  data      : {"_token" : token,"variant_meta" : data, 'product_id': product_id},
                  success: function(data){
                      product_meta = data;
                      if(data ==0){
                          $('.social').html('<button class="button btn-cart  add_to_cart" title="Hết hàng" type="button"><span>Hết hàng</span></button>');
                          $('.productpageprice').html('<span class="spiral"></span>0');
                          $('.special-price').html('<span id="product-price-48" class="price" itemprop="price">0đ'); 
                          $('.old-price').html('<span id="old-price-48" class="price" display="none">');
                      }else{
                          $('.old-price').html('<span id="old-price-48" class="price">'+data.price_old); 
                          $('.special-price').html('<span id="product-price-48" class="price" itemprop="price">'+data.price_new); 
                          $('.social').html('<button class="button btn-cart  add_to_cart" title="Thêm vào giỏ hàng" type="submit"><span>Thêm vào giỏ hàng</span></button>');
                          $('#variant_id').val(data.variant_id);
                      }    
                  },
              });
      });
          
  </script>


@stop