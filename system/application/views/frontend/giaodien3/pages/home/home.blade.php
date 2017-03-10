@extends('frontend.giaodien3.layouts.default')
@section('content')
@include('frontend.giaodien3.includes.slider')
<!-- ROW 1 -->
 <div class="product-area">
    <div class="container">
        <div class="row">
            <div class="box_left col-xs-12 col-sm-5">
                <div class="menu_index_left side_collection">
                    <!-- Widget 7 -->
                    <?php $list_tax = get_taxonomy_product('product_category') ?>
                    @if($list_tax)
                    <h2 class="menu_title icon_title_1">
                        Danh Mục Sản Phẩm
                        <div class="show_nav_bar1 hidden-lg hidden-md"><i class="fa fa-bars"></i></div>
                    </h2>
                    <ul class="menu_index_lv1 show1">
                        @foreach($list_tax as $tax)
                            <li class="li_lv1  icon1"><a href="{{url('collections/'.$tax->taxonomy_slug)}}">{{$tax->taxonomy_name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                    <!-- End Widget 7 -->
                </div>
            </div>
            <div class="box_right col-xs-12 col-sm-7">
                <!-- Widget 1 -->
                <?php $products = get_product_tax_limit($product_type_1,$product_slug_1,'8') ?>
                @if($products)
                <div class="title-tab-menu">
                </div>
                <div class="fvc">
                    <div class="tab-content">
                        <!-- tab_pr1-begin -->
                        <div class="tab-pane fade in active" id="nav_tab_pr1">
                            <div class="product-carusol-9 product-carusol-tab">
                                <!-- for -->
                                @foreach($products as $product)
                                <div class="pad_tab_pr">
                                    <!-- SINGLE-PRODUCT START-->
                                    <div class="single-product">
                                        @if($product['check_discount'])
                                        <span class="onsale">
                                        <span class="sale-bg"></span>
                                        <span class="sale-text">-{{$product['percentage']}}%</span>
                                        </span>
                                        @endif
                                        <div class="product-img">
                                            <!-- Add code html -->
                                            <div class="image-product-thumbnail-preview">
                                               <div class="image-product-thumbnail">
                                                     <div class="centered">
                                                        <a href="{{url('collections/'.$product['product_slug'])}}">
                                                           <img src="{{get_image_url($product['product_image_id'])}}" alt="{{$product['product_title']}}">
                                                        </a>
                                                     </div>
                                                </div>
                                            </div>
                                            <!-- End -->
                                            <!--
                                            <a href="{{url('collections/'.$product['product_slug'])}}" title="{{$product['product_title']}}">
                                            <img src="{{ get_image_url($product['product_image_id']) }}" class="primary-image" alt="{{$product['product_title']}}"> 
                                            <img class="secondary-image" alt="{{$product['product_title']}}" src="{{ get_image_url($product['product_image_id']) }}"> 
                                            </a>
                                            -->
                                            <div class="action-button">
                                                <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="product-actions-1536121" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <input type="hidden" name="quantity" value="1" />
                                                    <div class="add-to-wishlist">
                                                        <input type="hidden" name="variantId" value="2383507">
                                                        <button class="button color-tooltip btn-cart add_to_cart" title="MUA NGAY"><i class="fa fa-shopping-basket"></i>&nbsp;MUA NGAY</button>
                                                    </div>
                                                    <div class="quickviewbtn">
                                                        <a class="color-tooltip" data-toggle="tooltip" href="{{url('collections/'.$product['product_slug'])}}" title="" data-original-title="Chi tiết"><i class="fa fa-retweet"></i></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-name-ratting">
                                            <h3 class="product-name">
                                                <a href="{{url('collections/'.$product['product_slug'])}}" title="{{$product['product_title']}}">{{$product['product_title']}}</a>
                                            </h3>
                                            <div class="price-box-small">
                                                @if($product['price_old'])
                                                <span class="old-price">
                                                {{ number_format($product['price_old'],0,'.','.') }}₫
                                                </span>
                                                 @endif
                                                <span class="special-price">
                                                 {{ number_format($product['price_new'],0,'.','.') }}₫
                                                </span>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <!-- SINGLE-PRODUCT END-->
                                </div>
                                @endforeach
                                <!--end for-->
                            </div>
                            <!--
                            <div class="banner_tab_pr">
                                <a href="https://">
                                <img alt="1" src="images/layer-18.jpg?1459504100932" />
                                </a>
                            </div>
                            -->
                            <div class="banner_tab_pr">
                                <a href="{{ $firstBanner['url'] }}"><img src="{{ $firstBanner['image'] }}" /></a>
                            </div>
                        </div>
                        <!-- tab_pr1-end -->
                    </div>
                </div>
                @endif
                
                <!-- End Widget 1 -->
                
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ROW 1 -->
<!-- ROW 2 -->
 <div class="product-area">
    <div class="container">
        <div class="row">
            <div class="box_left col-xs-12 col-sm-5">
                <div class="menu_index_left menu_index2_left">
                    <!-- Widget 8 -->
                    
                    <?php $list_tax = get_taxonomy_product('product_group') ?>
                    @if($list_tax)
                    <h2 class="menu_title icon_title_2">
                        Nhóm sản phẩm
                        <div class="show_nav_bar2 hidden-lg hidden-md"><i class="fa fa-bars"></i></div>
                    </h2>
                    <ul class="menu_index_lv1 show2">
                        @foreach($list_tax as $tax)
                            <li class="li_lv1  icon1"><a href="{{url('collections/'.$tax->taxonomy_slug)}}">{{$tax->taxonomy_name}}</a></li>
                        @endforeach
                    </ul>
                    <!--
                    <div class="banner_tab_left hidden-xs hidden-sm">
                        <a href="https://">
                        <img alt="Office 365" src="images/layer-21.jpg?1459504100932" />
                        </a>
                    </div>
                    -->
                    <div class="banner_tab_left hidden-xs hidden-sm">
                        <a href="{{ $secondBanner['url'] }}"><img src="{{ $secondBanner['image'] }}" /></a>
                    </div>
                    @endif
                    
                    <!-- End Widget 8 -->
                </div>
            </div>
            <div class="box_right col-xs-12 col-sm-7">
                <?php $products = get_product_tax_limit($product_type_2,$product_slug_2,'16') ?>
                @if($products)
                <?php $i=0; ?>
                <div class="title-tab-menu">
                </div>
                <div class="fvc">
                    <div class="tab-content">
                        <!---TAB2-Begin -->
                        <div class="tab-pane fade in active" id="nav_tab2_pr1">
                            <div class="product-carusol-9 product-carusol-tab2">
                                <!--    product list 1-->
                                    <!--for-->
                                    @foreach($products as $product)
                                    @if($i%8==0)
                                        <div class="product-grid-slide  multi-columns-row">
                                    @endif
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 no_pad">
                                        <!-- SINGLE-PRODUCT START-->
                                        <div class="single-product">
                                            @if($product['check_discount'])
                                            <span class="onsale">
                                            <span class="sale-bg"></span>
                                            <span class="sale-text">-{{$product['percentage']}}%</span>
                                            </span>
                                            @endif
                                            <div class="product-img">
                                                <!-- Add code html -->
                                                <div class="image-product-thumbnail-preview">
                                                   <div class="image-product-thumbnail">
                                                         <div class="centered">
                                                            <a href="{{url('collections/'.$product['product_slug'])}}">
                                                               <img src="{{get_image_url($product['product_image_id'])}}" alt="{{$product['product_title']}}">
                                                            </a>
                                                         </div>
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!--
                                                <a href="{{url('collections/'.$product['product_slug'])}}" title="{{$product['product_title']}}">
                                                <img src="{{ get_image_url($product['product_image_id']) }}" class="primary-image" alt="{{$product['product_title']}}"> 
                                                <img class="secondary-image" alt="{{$product['product_title']}}" src="{{ get_image_url($product['product_image_id']) }}"> 
                                                </a>
                                                -->
                                                <div class="action-button">
                                                    <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="product-actions-1478221" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <input type="hidden" name="quantity" value="1" />
                                                        <div class="add-to-wishlist">
                                                            <input type="hidden" name="variantId" value="2298594">
                                                            <button class="button color-tooltip btn-cart add_to_cart" title="MUA NGAY"><i class="fa fa-shopping-basket"></i>&nbsp;MUA NGAY</button>
                                                        </div>
                                                        <div class="quickviewbtn">
                                                            <a class="color-tooltip" data-toggle="tooltip" href="{{url('collections/'.$product['product_slug'])}}" title="" data-original-title="Chi tiết"><i class="fa fa-retweet"></i></a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="product-name-ratting">
                                                <h3 class="product-name">
                                                    <a href="{{url('collections/'.$product['product_slug'])}}" title="{{$product['product_title']}}">{{$product['product_title']}}</a>
                                                </h3>
                                                <div class="price-box-small">
                                                    @if($product['price_old'])
                                                    <span class="old-price">
                                                    {{ number_format($product['price_old'],0,'.','.') }}₫
                                                    </span>
                                                    @endif
                                                    <span class="special-price">
                                                    {{ number_format($product['price_new'],0,'.','.') }}₫
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- SINGLE-PRODUCT END-->
                                        </div>
                                        <?php $i++; ?>
                                    @if($i%8==0)
                                    </div>
                                    @endif
                                    @endforeach
                                    
                                    <!--end for-->
                                <!--end product list 2-->
                            </div>
                        </div>
                        <!---TAB2-END -->
                    </div>
                </div>
                <!-- End Widget 2 -->
            </div>
                @endif
                <!-- Widget 2 -->
                
        </div>
    </div>
</div>
<!-- END ROW 2 -->
<!-- ROW 3 -->
<div class="new-featured-product">
    <div class="container">
        <div class="row">
            <div class="over_width">
                <!-- Sản phẩm nổi bật -->
                <?php
                    $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                    if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                ?>
                <?php $product_taxs = get_product_tax_limit($product_type_3,$product_slug_3,'6') ?>
                @if($product_taxs)
                <?php $i=0; 
                      $count = count($product_taxs);//Kiếm tra để đóng div 3 sản phẩm
                ?>
                <div class="col-lg-4 col-md-4">
                    <h2 class="area-headding"><span>{{ $headingText }}</span></h2>
                    <div class="row">
                        <!-- NEW-PRODUCT START-->
                        <div class="new-product new-product_1">
                        @foreach($product_taxs as $product_tax)
                            @if($i%3==0)
                            <div class="product-grid-thumb">
                            @endif
                                <!--for-->
                                <div class="col-lg-12 col-md-12 list_item">
                                    <!-- SINGLE-PRODUCT START-->
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{url('collections/'.$product_tax['product_slug'])}}">
                                            <img class="primary-image" alt="{{$product_tax['product_title']}}" src="{{get_image_url($product_tax['product_image_id'])}}">
                                            </a>
                                        </div>
                                        <div class="product-name-price">
                                            <h3>
                                                <a href="{{url('collections/'.$product_tax['product_slug'])}}" title="{{$product_tax['product_title']}}">{{$product_tax['product_title']}}</a>
                                            </h3>
                                            <div class="price-box-small">
                                                @if($product_tax['price_old'])
                                                <span class="old-price"> {{number_format($product_tax['price_old'],0,'.','.')}}₫</span>
                                                @endif
                                                <span class="special-price">
                                                 {{number_format($product_tax['price_new'],0,'.','.')}}₫
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- SINGLE-PRODUCT END-->
                                </div>

                            <?php $i++; ?>    
                            @if($i%3==0)
                            </div>
                            @endif
                        @endforeach

                        @if($count%3 !=0 )
                            </div>
                        @endif
                        </div>
                        <!-- NEW-PRODUCT END-->
                    </div>
                </div>
                @endif
                <!-- End sản phẩm nội bật -->
                <!-- Sản phẩm xem nhiều -->
                <?php
                    $headingText = get_taxonomy_name($product_type_4,$product_slug_4);
                    if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                ?>
                <?php $product_taxs = get_product_tax_limit($product_type_4,$product_slug_4,'6' ) ?>
                @if($product_taxs)
                <?php $i=0 ;
                     $count = count($product_taxs);//Kiếm tra để đóng div 3 sản phẩm
                ?>
                <div class="col-lg-4 col-md-4">
                    <h2 class="area-headding"><span>{{ $headingText }}</span></h2>
                    <div class="row">
                        <!-- NEW-PRODUCT START-->
                        <div class="new-product new-product_2">
                        @foreach($product_taxs as $product_tax)
                            @if($i%3==0)
                            <div class="product-grid-thumb">
                            @endif
                                <!--for-->
                                <div class="col-lg-12 col-md-12 list_item">
                                    <!-- SINGLE-PRODUCT START-->
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{url('collections/'.$product_tax['product_slug'])}}">
                                            <img class="primary-image" alt="{{$product_tax['product_title']}}" src="{{get_image_url($product_tax['product_image_id'])}}">
                                            </a>
                                        </div>
                                        <div class="product-name-price">
                                            <h3>
                                                <a href="{{url('collections/'.$product_tax['product_slug'])}}" title="{{$product_tax['product_title']}}">{{$product_tax['product_title']}}</a>
                                            </h3>
                                            <div class="price-box-small">
                                                @if($product_tax['price_old'])
                                                <span class="old-price"> {{number_format($product_tax['price_old'],0,'.','.')}}₫</span>
                                                @endif
                                                <span class="special-price">
                                                 {{number_format($product_tax['price_new'],0,'.','.')}}₫
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- SINGLE-PRODUCT END-->
                                </div>

                            <?php $i++; ?>    
                            @if($i%3==0)
                            </div>
                            @endif
                        @endforeach


                        @if($count%3 !=0 )
                            </div>
                        @endif
                        </div>

                        <!-- NEW-PRODUCT END-->
                    </div>
                </div>
                @endif
                <!-- End sản phẩm xem nhiều -->

                <!-- Khuyến mãi trong tuần -->
                <?php
                    $headingText = get_taxonomy_name($product_type_5,$product_slug_5);
                    if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                ?>
                <?php $product_taxs = get_product_tax_limit($product_type_5,$product_slug_5,'6') ?>
                @if($product_taxs)
                <?php $i=0 ;
                     $count = count($product_taxs);//Kiếm tra để đóng div 3 sản phẩm
                ?>
                <div class="col-lg-4 col-md-4">
                    <h2 class="area-headding"><span>{{ $headingText }}</span></h2>
                    <div class="row">
                        <!-- NEW-PRODUCT START-->
                        <div class="new-product new-product_3">
                        @foreach($product_taxs as $product_tax)
                            @if($i%3==0)
                            <div class="product-grid-thumb">
                            @endif
                                <!--for-->
                                <div class="col-lg-12 col-md-12 list_item">
                                    <!-- SINGLE-PRODUCT START-->
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{url('collections/'.$product_tax['product_slug'])}}">
                                            <img class="primary-image" alt="{{$product_tax['product_title']}}" src="{{get_image_url($product_tax['product_image_id'])}}">
                                            </a>
                                        </div>
                                        <div class="product-name-price">
                                            <h3>
                                                <a href="{{url('collections/'.$product_tax['product_slug'])}}" title="{{$product_tax['product_title']}}">{{$product_tax['product_title']}}</a>
                                            </h3>
                                            <div class="price-box-small">
                                                @if($product_tax['price_old'])
                                                <span class="old-price"> {{number_format($product_tax['price_old'],0,'.','.')}}₫</span>
                                                @endif
                                                <span class="special-price">
                                                 {{number_format($product_tax['price_new'],0,'.','.')}}₫
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- SINGLE-PRODUCT END-->
                                </div>

                            <?php $i++; ?>    
                            @if($i%3==0)
                            </div>
                            @endif
                        @endforeach


                        @if($count%3 !=0 )
                            </div>
                        @endif
                        </div>

                        <!-- NEW-PRODUCT END-->
                    </div>
                </div>
                @endif
                <!-- End khuyễn mãi trong tuần -->

            </div>
        </div>
    </div>
</div>
<!-- END ROW 3 -->
@stop