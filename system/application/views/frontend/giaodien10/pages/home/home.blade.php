@extends('frontend.giaodien10.layouts.default')
@section('content')
<div id="maincontainer">
   <div class="container">
      <div class="row">
         <!-- San pham moi nhat -->
         <div class="col-lg-9">
            <!-- Slider Start-->
            <section class="slider">
               <div class="c-carousel">
                  <div id="sliderindex5">
                     <?php $slider = isset($slider) ? $slider: []; ?>
                     @foreach( $slider as $row )
                     <div>
                        <a href="{{ $row['url'] }}">
                           <img src="{{ $row['image'] }}" />
                        </a>
                     </div>
                     @endforeach
                  </div>
                  <div id="pager" class="sliderindex5pager">
                     @foreach( $slider as $row )
                     <a href="#" class=""><span></span></a>
                     @endforeach
                  </div>
               </div>
            </section>
            <!-- Slider End-->
            <!-- Slider -->
            <?php
            /*
            {!! showWidget('Block left top content 1') !!}
            */
            ?>
            <!-- End -->
            <!-- Widget 33333 -->
            <?php
            /*
            {!! showWidget('Block left bottom content 1') !!}
            */
            ?>
            <!-- End Widget 33333 -->
            <section class="row mt30" id="featured">
               <?php
                  $headingText = get_taxonomy_name($product_type_1,$product_slug_1);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
               ?>
               <h1 class="heading1"><span class="maintext">{{ $headingText }}</span></h1>
               <ul class="thumbnails">
                  <?php $product_new = get_product_tax_limit($product_type_1,$product_slug_1,6); ?>
                  @foreach( $product_new as $product )
                  <li class="col-lg-4 col-sm-6">
                     <a class="prdocutname" href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">{{ $product['product_title'] }}</a>
                     <div class="thumbnail">
                        @if($product['check_discount'])
                        <span class="sale tooltip-test">Sale</span>
                        @endif
                        <!-- Add code html -->
                        <div class="image-thumbnail-preview">
                           <div class="image-thumbnail">
                                 <div class="centered">
                                    <a class="img-product" href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                       <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}"/>
                                    </a>
                                 </div>
                            </div>
                        </div>
                        <!-- End -->
                        <!--
                        <a class="img-product" href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                           <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}"/>
                        </a>
                        -->
                        <div class="pricetag">
                           <span class="spiral"></span><a href="#" onclick="order({{ $product['product_id'] }})" class="productcart">Mua ngay</a>
                           <div class="price">
                              <div class="pricenew">{{ number_format($product['price_new'],0,'.','.') }}₫</div>
                              @if($product['price_old'])
                              <div class="priceold">{{ number_format($product['price_old'],0,'.','.') }}₫</div>
                              @endif
                           </div>
                           <form id="formOrder{{ $product['product_id'] }}" action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <input type="hidden" name="quantity" value="1" />
                          </form>
                        </div>
                     </div>
                  </li>
                  @endforeach
               </ul>
               <div class="row">
                  <div class="col-lg-12 pull-center">
                  </div>
               </div>
            </section>
            <!-- Nhom san pham -->
            <section class="row mt30" id="featured">
               <?php
                  $headingText = get_taxonomy_name($product_type_2,$product_slug_2);
                  if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
               ?>
               <h1 class="heading1"><span class="maintext">{{ $headingText }}</span></h1>
               <ul class="thumbnails">
                  <?php $products = get_product_tax_limit($product_type_2,$product_slug_2,6); ?>
                  @foreach( $products as $product )
                  <li class="col-lg-4 col-sm-6">
                     <a class="prdocutname" href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">{{ $product['product_title'] }}</a>
                     <div class="thumbnail">
                        @if($product['check_discount'])
                        <span class="sale tooltip-test">Sale</span>
                        @endif
                        <!-- Add code html -->
                        <div class="image-thumbnail-preview">
                           <div class="image-thumbnail">
                                 <div class="centered">
                                    <a class="img-product" href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                       <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}"/>
                                    </a>
                                 </div>
                            </div>
                        </div>
                        <!-- End -->
                        <!--
                        <a class="img-product" href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                           <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}"/>
                        </a>
                        -->
                        <div class="pricetag">
                           <span class="spiral"></span><a href="#" onclick="order({{ $product['product_id'] }})" class="productcart">Mua ngay</a>
                           <div class="price">
                              <div class="pricenew">{{ number_format($product['price_new'],0,'.','.') }}₫</div>
                              @if($product['price_old'])
                              <div class="priceold">{{ number_format($product['price_old'],0,'.','.') }}₫</div>
                              @endif
                           </div>
                           <form id="formOrder{{ $product['product_id'] }}" action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <input type="hidden" name="quantity" value="1" />
                          </form>
                        </div>
                     </div>
                  </li>
                  @endforeach
               </ul>
               <div class="row">
                  <div class="col-lg-12 pull-center">
                  </div>
               </div>
            </section>
         <!-- End -->
         </div>
         <!-- End -->
         <aside class="col-lg-3">
            <!-- Category-->
             <?php  $list_cat = get_taxonomy_product( 'product_category') ?>
             @if($list_cat)
               <div class="sidewidt">
               <h2 class="heading2"><span>Danh Mục sản phẩm</span></h2>
               <ul class="nav nav-list categories">
               @foreach($list_cat as $cat)
                  <li class="item  first">
                     <a href="{{url('collections/'.$cat->taxonomy_slug)}}">{{$cat->taxonomy_name}}</a>
                  </li>
               @endforeach
               </ul>
            </div>
               
             @endif

            <?php $product_new = (get_product_tax_limit($product_type_3,$product_slug_3,'5')) ?>
            @if($product_new)
               <div class="sidewidt">
                  <div class="product-list clearfix ">
                     <?php
                        $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                        if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                     ?>
                     <h2 class="heading2">{{ $headingText }}</h2>
                     <ul class="bestseller">
                        @foreach($product_new as $product)
                           <li>
                              <a class="productname" href="{{url('collections/'.$product['product_slug'])}}" title="{{$product['product_title']}}">
                                 <img width="50" height="50"  src="{{ get_image_url($product['product_image_id']) }}" alt="{{$product['product_title']}}" />
                              </a>
                              <a class="productname" href="{{url('collections/'.$product['product_slug'])}}" title="{{$product['product_title']}}">{{$product['product_title']}}</a>
                              <span class="price">{{ number_format($product['price_new'],0,'.','.') }}₫</span>
                              @if($product['price_old'])
                              <p class="priceold">{{ number_format($product['price_old'],0,'.','.') }}₫</p>
                              @endif
                              <div class="clear"></div>
                           </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
            @endif
            
            <!-- BMust Have-->
            <?php $miniSlider = isset($mini_slider) ? $mini_slider: []; ?>
            <div class="sidewidt mt20">
               <div class="flexslider" id="mainsliderside">
                  <ul class="slides">
                     @foreach( $miniSlider as $row )
                     <li>
                        <a href="{{ $row['url'] }}"><img src="{{ $row['image'] }}" ></a>
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </aside>
         <!--end right-->
      </div>
      <style>
         .c-carousel a{display:inline-block;}
      </style>
   </div>
</div>
@stop