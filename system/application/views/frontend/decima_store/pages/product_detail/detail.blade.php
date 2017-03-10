@extends('frontend.decima_store.layouts.default')
@section('content')

<?php 
        $product_id = $product['product_id'];
        $product_code = $product['product_code'];
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

<!-- !container -->
<div class="full-width section-emphasis-1 page-header page-header-short">
  <div class="container">
    <header class="row">
      <div class="col-md-12">
        <!-- BREADCRUMBS -->
        <ul class="breadcrumbs list-inline pull-right">
          <li><a href="{{url('/')}}">Home</a></li>
          <!--
                                        -->
          <li><a href="{{url('collections')}}">Sản phẩm</a></li>
          <!--
                                        -->
          
          <!--
                                        -->
          <li>{{ $title}}</li>
        </ul>
        <!-- !BREADCRUMBS -->
      </div>
    </header>
  </div>
</div>
<!-- !full-width -->
<div class="container">
<!-- !FULL WIDTH -->
<!-- !SECTION EMPHASIS 1 -->

<article class="row shop-product-single">
<div class="col-md-6 space-right-20">

  <!-- thumbnailSlider -->
  <div class="thumbnailSlider">
    <div class="flexslider flexslider-thumbnails">
      <ul class="slides">
        @if(count($list_post_image)>0)
            @foreach($list_post_image as $img)
            <li>
              <a href="#" data-rel="prettyPhotoGallery[product]">
                <img src="{{ get_image_url($img) }}" class="product-image-feature" >
              </a>
            </li>
            @endforeach
        @endif
      </ul>
    </div>

    <ul class="smallThumbnails clearfix">
    @if(count($list_post_image)>0)
    <?php $i=0; ?>
        @foreach($list_post_image as $img)
        <li data-target="{{$i}}" class="active">
            <img src="{{ get_image_url($img) }}" alt=" ">
        </li>
        <?php $i++; ?>
        @endforeach
    @endif
    </ul>
  </div>
  <!-- / thumbnailSlider -->

</div>
<div class="clearfix visible-sm visible-xs space-30"></div>
<div class="col-md-6 space-left-20">
<header>
 

  <h1>
    {{ $title}}
  </h1>
  <span class="product-code">@if($product_code)Product Code: {{$product_code}} @endif</span><br><br>
  <span class="price-old productpageoldprice">@if($priceOld){{$priceOld}}đ @endif</span>&nbsp;&nbsp;
  <span class="price productpageprice">{{$priceNew}}đ</span>
</header>
<form role="form" class="shop-form form-horizontal" action="{{ url('cart/order/'.$slug) }}" method="post" novalidate>
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <input type="hidden" id="variant_id" name="variant_id" value="">
  <input type="hidden" id="product_id" name="product_id" value="{{$product_id}}">
  <div class="form-group">
        @if(count($list_variant_id)>1)
        <?php $i=1; ?>
        @foreach($list_variant_name as $variant_name)
            <?php $list_variant_value = get_variant_meta_product_detail( $variant_name , $product_id ) ?>
            <div class="variant-name">{{$variant_name}}</div>

            <input type="hidden" value="{{$variant_name}}" id="variant_name_{{$i}}">
            <select name="variant_option_{{$i}}" id="variant_option_{{$i}}">
                @foreach($list_variant_value as $value)
                     <option @if(in_array($value->variant_value,$list_variant_meta_value)) selected @endif value="{{$value->variant_value}}">{{$value->variant_value}}</option>
                @endforeach
            </select>
            <?php $i++; ?>
        @endforeach
    @endif

  </div>
  <div class="form-group">
      <div class="variant-name">Số lượng:</div>
      <input class="" name="quantity" id="quantity" type="number" value="1">
  </div>
  <button type="submit" class="btn btn-primary btn-submit">Mua hàng</button>
  <!--
                            -->
  
  <div class="clearfix"></div>
</form>
<div class="shop-product-single-social">
  <span class="social-label pull-left">Share this product</span>

  <div class="social-widget social-widget-mini social-widget-dark">
    <ul class="list-inline">
      <li>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{url('collections/'.$slug)}}"
           onclick="window.open(this.href, 'facebook-share','width=580,height=296'); return false;"
           rel="nofollow"
           title="Facebook"
           class="fb">
          <span class="sr-only">Facebook</span>
        </a>
      </li>
      <li>
        <a href="http://twitter.com/share?text=CreateIT&amp;url={{url('collections/'.$slug)}}"
           onclick="window.open(this.href, 'twitter-share', 'width=550,height=235'); return false;"
           rel="nofollow"
           title=" Share on Twitter"
           class="tw">
          <span class="sr-only">Twitter</span>
        </a>
      </li>
      <li>
        <a href="https://plus.google.com/share?url={{url('collections/'.$slug)}}"
           onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530'); return false;"
           rel="nofollow"
           title="Google+"
           class="gp">
          <span class="sr-only">Google+</span>
        </a>
      </li>
      
    </ul>
  </div>
</div>
<div class="tabs">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
    <li><a href="#info" data-toggle="tab">Additional info</a></li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane fade in active" id="description">
      <p>{{$excerpt}}</p>
      
    </div>
    <div class="tab-pane fade" id="info">
      <div class="table table-condensed">
        {!! $content !!}
      </div>
    </div>

  </div>
</div>
</div>
</article>
</div>
</section>

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
           data[variant_name_1] = variant_value_1;
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
                    console.log(data);
                    if(data ==0){
                        $('.productpageprice').html('0đ');
                        $('.productpageoldprice').html('');
                        $('.btn-submit').html('Hết hàng');
                        $('.btn-submit').attr('type','button');
                    }else{
                        $('.productpageprice').html(data.price_new);
                        $('.productpageoldprice').html(data.price_old);
                        $('#variant_id').val(data.variant_id);
                        $('.btn-submit').html('Mua hàng');
                        $('.btn-submit').attr('type','submit');
                    }    
                },
            });
    });
        
</script>

@stop