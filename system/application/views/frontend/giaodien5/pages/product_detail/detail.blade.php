<?php 
        $product_id = $product['product_id'];
        $title     = $product['product_title'];
        $slug      = $product['product_slug'];
        $excerpt   = $product['product_excerpt'];
        $content   = $product['product_content'];
        $featureImage = get_image_url($product['product_image_id']);
        $comment_status = $product['comment_status'];
        $priceNew  = number_format($product['price_new'], 0, ',', '.');
        $priceOld  = ($product['price_old'] == 0) ? 0 : number_format($product['price_old'], 0, ',', '.') ;
        $list_post_image = decode_serialize($product['product_image']);

    
?>

@extends('frontend.giaodien5.layouts.default')
@section('content')
<div id="products" class="products mt60 clearfix">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-9">
            <div id="wrapper-detail">
               <div class="row">
                  <div class="col-sm-6 col-xs-12">
                     <div id="surround">
                        <div class="img-product">
                           <img class=" product-image-feature hidden-xs" src="{{ $featureImage }}" alt="{{$title}}">
                        </div>
                        <div class="thumb-mt20">
                           <div id="sliderproduct" class="clearfix hidden-xs">
                           @if(count($list_post_image)>0)
                                   @foreach($list_post_image as $img)
                                    <div class="item product-thumb">
                                       <div class="item product-thumb">
                                          <a href="javascript:void(0)" data-image="{{get_image_url($img)}}" data-zoom-image="{{get_image_url($img)}}" class="">
                                          <img class="change-image" alt="Thép hình" data-image="{{get_image_url($img)}}" src="{{get_image_url($img)}}">
                                          </a>
                                       </div>
                                    </div>
                                   @endforeach
                           @endif
                           </div>
                           <div id="sliderproduct-mobile" class="visible-xs">
                              <div class="slider-container ">
                                 <div class="leo-viewport" style="overflow: hidden; position: relative;">
                                    <ul class="slides clearfix" style="width: 1000%; transition-duration: 0s; transform: translate3d(-100px, 0px, 0px);">
                                       @if(count($list_post_image)>0)
                                               @foreach($list_post_image as $img)
                                                <li class="item product-thumb clone" aria-hidden="true" style="width: 0px; float: left; display: block;">
                                                   <a href="javascript:void(0)" data-image="{{get_image_url($img)}}" data-zoom-image="{{get_image_url($img)}}">
                                                   <img alt="Thép hình" data-image="{{get_image_url($img)}}" src="{{get_image_url($img)}}" draggable="false">
                                                   </a>
                                                </li>
                                               @endforeach
                                       @endif
                                    </ul>
                                 </div>
                                 <ol class="leo-control-nav leo-control-paging">
                                    <li><a class="leo-active">1</a></li>
                                    <li><a>2</a></li>
                                    <li><a>3</a></li>
                                 </ol>
                                 <ul class="leo-direction-nav">
                                    <li><a class="leo-prev" href="#">Previous</a></li>
                                    <li><a class="leo-next" href="#">Next</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-xs-12 fix-mobile">
                     <div class="product-title">
                        <h1>{{ $title }}</h1>
                        <!-- <p class="product-vendor">
                           Ngành hàng : <strong><a title="Show type" href="/collections/types?q=san-pham-thep">{{ $title }}</a></strong>
                        </p> -->
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
                     </div>

                     <div class="product-price price-detail" id="price-preview">
                        <span>{{ $priceNew }}</span>
                     </div>
                     <p class="inventory">
                        Tình trạng : <strong>Còn hàng</strong>
                     </p>
                     <form id="add-item-form" action="{{ url('cart/order/'.$slug) }}" method="post" class="variants clearfix">
                        <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" id="variant_id" name="variant_id" value="">
                        <input type="hidden" id="product_id" name="product_id" value="{{$product_id}}">
                        <div class="select clearfix">
                           <select id="product-select" name="id" style="display:none">
                              <option data-nums="1" data-op1="Default Title" data-op2="" data-op3="" value="1007674659">Default Title - 799,000₫</option>
                           </select>
                        </div>
                        <div class="select-wrapper">
                           <label>Số lượng : </label>
                           <input id="quantity" type="number" name="quantity" min="1" value="1" class="item-quantity">
                        </div>
                        <div class="actions-btn">
                           <button id="add-to-cart" class=" btn-add-cart btn-fix" name="add"> 
                           Thêm vào giỏ
                           </button>
                        </div>
                     </form>
                     
                  </div>
                  <div class="col-xs-12">
                     <div class="product-comment">
                        <h4>
                           <span>Mô tả</span>
                        </h4>
                        <div id="mota">{!!$content!!}</div>
                        @if($comment_status=='yes')
                        <div id="binhluan">
                           <h4>
                              <span>Bình luận</span>
                           </h4>
                           <div class="bl-mobile">
                              <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid" data-href="{{url('collections/'.$slug)}}" data-numposts="5" width="100%" data-colorscheme="light" fb-xfbml-state="rendered"><span style="height: 173px;"><iframe id="f173c35cdd59dc8" name="f38c787d04bf1f" scrolling="no" title="Facebook Social Plugin" class="fb_ltr fb_iframe_widget_lift" src="https://www.facebook.com/plugins/comments.php?api_key=&amp;channel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fbz-D0tzmBsw.js%3Fversion%3D42%23cb%3Df39c0bba3e43168%26domain%3Dcompany-plus.myharavan.com%26origin%3Dhttps%253A%252F%252Fcompany-plus.myharavan.com%252Ff3f5b7723bb57d%26relation%3Dparent.parent&amp;colorscheme=light&amp;href=http%3A%2F%2Fcompany-plus.myharavan.com%2Fproducts%2Fthep-hinh&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;skin=light&amp;version=v2.4&amp;width=100%25" style="border: none; overflow: hidden; height: 173px; width: 100%;"></iframe></span></div>
                              <!-- script comment fb -->
                           </div>
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-3">
            <?php $list_cat = get_taxonomy_product('product_category', '' ) ?>
            @if($list_cat)
            <div class="widget category">
               <h4 class="title">
                  Danh mục sản phẩm
               </h4>
               <ul class="list">
                  @foreach ($list_cat as $cat)
                     <li><a href="{{url('collections/'.$cat->taxonomy_slug)}}"><i class="fa fa-angle-right"></i>{{$cat->taxonomy_name}}</a></li>
                  @endforeach
               </ul>
            </div>
            @endif
               <!-- Sản phẩm bán chạy -->
               <?php $product_cats = get_product_tax_limit('product_group', 'san-pham-noi-bat','4' ) ?>
               @if($product_cats)
               <div class="widget category">
               <h4 class="title">
                  Sản phẩm nổi bật
               </h4>
               <div class="mini-products-list">
                  @foreach($product_cats as $product_cat)
                     <div class="item clearfix">
                        <div class="item-img">
                           <a class="product-image img-small" href="{{url('collections/'.$product_cat['product_slug'])}}" title="{{$product_cat['product_title']}}">
                           <img src="{{get_image_url($product_cat['product_image_id'])}}" alt="{{$product_cat['product_title']}}">
                           </a>
                        </div>
                        <div class="item-info">
                           <div class="item-title">
                              <a href="{{url('collections/'.$product_cat['product_slug'])}}" title="{{$product_cat['product_title']}}">{{$product_cat['product_title']}}</a>
                           </div>
                           <div class="special-price">
                              <span class="price">{{number_format($product_cat['price_new'],0,'.','.')}}&#8363;</span>
                           </div>
                        </div>
                     </div>
                  @endforeach
                 
                  </div>
               </div>
               @endif
               
            <!-- End sản phẩm bán chạy -->
         </div>
      </div>
      <div class="list-like">
         <?php $product_related = get_product_related( 'product_category', $slug,4) ?>
         @if($product_related)
            <div id="like" class="products-grid clearfix">
               <div class="title-line">
                  <h4><span>Sản phẩm liên quan</span></h4>
               </div>
               <div class="row clearfix content-product-list">
                  @foreach($product_related as $product_rel)
                  <div class="item col-md-3 col-sm-6 col-xs-12">
                     <div class="product-loop">
                        <!-- Add code html -->
                        <div class="product-thumbnail-preview">
                           <div class="product-thumbnail">
                              <div class="centered">
                                 <a href="{{url('collections/'.$product_rel['product_slug'])}}">
                                    <img src="{{ get_image_url($product_rel['product_image_id']) }}" alt="{{ $product_rel['product_title'] }}">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <!-- End -->
                        <!--
                        <a href="{{url('collections/'.$product_rel['product_slug'])}}">
                        <img src="{{get_image_url($product_rel['product_image_id'])}}" alt="{{$product_rel['product_title']}}">
                        </a>
                        -->
                        <div class="product-info clearfix">
                           <h3><a href="{{url('collections/'.$product_rel['product_slug'])}}">{{$product_rel['product_title']}}</a></h3>
                           <p class="price ">
                              <span class="new-price">{{number_format($product_rel['price_new'],0,'.','.')}}&#8363;</span>
                           </p>
                           <form action="{{url('cart/order/'.$product_rel['product_slug'])}}" method="post">
                              <!-- Begin product options -->
                              <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <input type="hidden" name="quantity" value="1" />
                              <button type="submit" class="add-to-cart btn-fix" name="add">Giỏ Hàng</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  @endforeach

               </div>
         </div>
         @endif
     
      </div>
   </div>
</div>

<script>
   $(".product-thumb img").click(function(){
   	$(".product-image-feature").attr("src",$(this).attr("data-image"));
   	$(".product-image-feature").attr("data-zoom-image",$(this).attr("data-zoom-image"));
   }); 
   
   
   var selectCallback = function(variant, selector) {
   	if(variant!=null && variant.featured_image!=null)
   	{
   		$(".product-thumb img[data-image='"+Haravan.resizeImage(variant.featured_image.src,'master')+"']").click();
   	}
   
   	if (variant && variant.available) {
   		jQuery('#add-to-cart').removeAttr('disabled').removeClass('disabled').html("Thêm vào giỏ");
   		jQuery('.inventory').html("Tình trạng : <strong>Còn hàng</strong>");
   		if(variant.price < variant.compare_at_price){
   			 jQuery('#price-preview').html("<del>" + Haravan.formatMoney(variant.compare_at_price, "{{$priceNew}}") + "</del><span>" + Haravan.formatMoney(variant.price, "{{$priceNew}}") + "</span>");
   		} else {
   			 jQuery('#price-preview').html("<span>" + Haravan.formatMoney(variant.price, "{{$priceNew}}" + "</span>"));
   		}
   
   	} else {
   		jQuery('#add-to-cart').addClass('disabled').attr('disabled', 'disabled').html("Hết hàng");
   		jQuery('.inventory').html("Tình trạng : <strong>Hết hàng</strong>");
   	}
   };
   
   jQuery(document).ready(function($){
   	
   	
   
   			 });
   			 
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
                $('.price-box-small').html('<span class="old-price">'+product_meta['price_old']);
                $('.product-price').html('<span>'+product_meta['price_new']+'</span>');
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
                          $('.product-image-feature').attr('src','');
                          $('.social').html('<button class="button btn-cart  add_to_cart" title="Hết hàng" type="button"><span>Hết hàng</span></button>');
                          $('.productpageprice').html('<span class="spiral"></span>0');
                          $('.price-detail').html('<span id="product-price-48" class="price" itemprop="price">0đ'); 
                          $('.old-price').html('<span id="old-price-48" class="price" display="none">');
                      }else{
                          $('.change-image').attr('data-image',data.image);
                          $('.product-image-feature').attr('src',data.image);
                          $('.old-price').html('<span id="old-price-48" class="price">'+data.price_old); 
                          $('.price-detail').html('<span id="product-price-48" class="price" itemprop="price">'+data.price_new); 
                          $('.social').html('<button class="button btn-cart  add_to_cart" title="Thêm vào giỏ hàng" type="submit"><span>Thêm vào giỏ hàng</span></button>');
                          $('#variant_id').val(data.variant_id);
                      }    
                  },
              });
      });
          
  </script>    
@stop