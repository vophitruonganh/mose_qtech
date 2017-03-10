@extends('frontend.giaodien10.layouts.default')
@section('content')
<div id="maincontainer">
<div class="container">
<section id="product">
    <!--  breadcrumb -->  
    <ul class="breadcrumb">
        <li><a href="{{ url('/') }}" target="_self">Trang chủ</a></li>
        <!--
        <li><a href="/collections/all" target="_self">Danh mục</a></li>
        -->
        <li class="active"><span>Tất cả sản phẩm</span></li>
    </ul>
    <div class="row">
    <!-- Sidebar Start-->
    <aside class="col-lg-3">
        <!-- Category-->
        <?php $list_cat = get_taxonomy_product( 'product_category')  ?>
        <div class="sidewidt">
            <h2 class="heading2"><span>Danh Mục sản phẩm</span></h2>
            <ul class="nav nav-list categories">
            @if($list_cat)
                @foreach ($list_cat as $cat)
                <li class="item  first">
                    <a href="{{url('collections/'.$cat->taxonomy_slug)}}"> {{$cat->taxonomy_name}}</a>
                </li>
                @endforeach
            @endif
            </ul>
        </div>

        <?php $tax_products = (get_product_tax_limit($product_type_3,$product_slug_3,'5')) ?>
        @if($tax_products)
            <div class="sidewidt">
             <div class="product-list clearfix ">
                <?php
                    $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                    if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                ?>
                <h2 class="heading2">{{ $headingText }}</h2>
                <ul class="bestseller">
                    @foreach($tax_products as $tax_product)
                        <li>
                          <img width="50" height="50"  src="{{ get_image_url($tax_product['product_image_id']) }}" alt="{{$tax_product['product_title']}}" />
                          <a class="productname" href="{{url('collections/'.$tax_product['product_slug'])}}" title="{{$tax_product['product_title']}}">{{$tax_product['product_title']}}</a>
                          <span class="price">{{ number_format($tax_product['price_new'],0,'.','.') }}₫</span>
                          @if($tax_product['price_old'])
                          <p class="priceold">{{ number_format($tax_product['price_old'],0,'.','.') }}₫</p>
                          @endif
                          <div class="clear"></div>
                       </li>
                    @endforeach
                </ul>
             </div>
          </div>
        @endif
        
        <!-- Widget 44444 -->
        <?php /* {!!showWidget('widget44444')!!} */ ?>
        <!--
        <div class="sidewidt">
             <h2 class="heading2"><span>Danh Mục sản phẩm</span></h2>
             <ul class="nav nav-list categories">
                <li class="item  first">
                   <a href="/collections/thoi-trang-nu"> Thời trang nữ</a>
                </li>
                <li class="item  ">
                   <a href="/collections/thoi-trang-nam"> Thời trang nam</a>
                </li>
                <li class="item  ">
                   <a href="/collections/cong-nghe-phu-kien"> Công nghệ phụ kiện</a>
                </li>
                <li class="item  last">
                   <a href="/collections/thoi-trang-be"> Thời trang bé</a>
                </li>
             </ul>
          </div>
        -->
        <!-- End Widget 44444 -->

        <!-- Best Seller-->
        <!-- Widget 22222 -->
        <?php /*{!!showWidget('widget22222')!!} */ ?>
        <!--
        <div class="sidewidt">
             <div class="product-list clearfix ">
                <h2 class="heading2">Sản phẩm bán chạy 1</h2>
                <ul class="bestseller">
                   <li>
                      <img width="50" height="50"  src="//hstatic.net/025/1000032025/1/2015/8-12/dam-duoi-ca_large.png" alt="" />
                      <a class="productname" href="/products/dam-cong-so-hoa-tiet-elly-1" title="Bộ set váy áo đính nút">Bộ set váy áo đính nút</a>
                      <span class="price">320,000₫</span>
                      <p class="priceold">750,000₫</p>
                      <div class="clear"></div>
                   </li>
                   <li>
                      <img width="50" height="50"  src="//hstatic.net/025/1000032025/1/2015/8-7/b1_large.png" alt="" />
                      <a class="productname" href="/products/product-name-here-5" title="Đầm chấm bi cổ V">Đầm chấm bi cổ V</a>
                      <span class="price">450,000₫</span>
                      <div class="clear"></div>
                   </li>
                   <li>
                      <img width="50" height="50"  src="//hstatic.net/025/1000032025/1/2015/8-13/untitled-3_large.png" alt="" />
                      <a class="productname" href="/products/dam-cong-so-hoa-tiet-elly" title="Đầm công sở họa tiết Elly">Đầm công sở họa tiết Elly</a>
                      <span class="price">320,000₫</span>
                      <p class="priceold">750,000₫</p>
                      <div class="clear"></div>
                   </li>
                </ul>
             </div>
          </div>
        -->
        <!-- End Widget 22222 -->
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
    <!-- Sidebar End-->
    <!-- Category-->
    <div class="col-lg-9">
        <!-- Category Products-->
        <section id="category">
            <h1 class="heading1">
                <span class="maintext">Tất cả sản phẩm</span>
            </h1>
            <!-- Sorting-->
            <div class="sorting well">
                <form id="filter_product" class=" form-inline pull-left">
                    Sắp xếp :
                    <select id="sortBy" name="sortBy" class="sort-by">
                        <option selected="" value="default">Mặc định</option>
                        <option value="alpha-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''}}>A → Z</option>
                        <option value="alpha-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''}}>Z → A</option>
                        <option value="price-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''}}>Giá tăng dần</option>
                        <option value="price-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''}}>Giá giảm dần</option>
                        <option value="created-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''}}>Hàng mới nhất</option>
                        <option value="created-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''}}>Hàng cũ nhất</option>
                    </select>
                    &nbsp;&nbsp;
                </form>
                <div class="btn-group pull-right">
                    <button class="btn" id="list"><i class="fa-th-list"></i>
                    </button>
                    <button class="btn btn-orange" id="grid"><i class="fa-th icon-white"></i></button>
                </div>
            </div>
            <!-- Category-->
            <section id="categorygrid">
                @if( count($products)>0 )
                <ul class="thumbnails grid row">
                    <?php $i=0; ?>
                    @foreach( $products as $product )
                    <?php $i++; ?>
                    <li class="col-lg-4 col-sm-6">
                        <a class="prdocutname" href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">{{ $product['product_title'] }}</a>
                        <div class="thumbnail">
                        @if($product['check_discount'])
                            <span class="sale tooltip-test"></span>
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
                            <img alt="{{ $product['product_title'] }}"
                                src="{{ get_image_url($product['product_image_id']) }}"/>
                            </a>
                            -->
                            <div class="pricetag">
                                <span class="spiral"></span><a href="#" onclick="order({{ $product['product_id'] }})" class="productcart">Mua ngay</a>
                                <div class="price">
                                    <div class="pricenew">{{ number_format($product['price_new'],0,'.','.') }}₫</div>
                                    @if($product['price_old']>0)
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
                    @if( $i%3==0 )
                    <li class="clearfix"></li>
                    @endif
                    @endforeach
                </ul>
                @endif
                @if( count($products)>0 )
                <ul class="thumbnails list row">
                    @foreach( $products as $product )
                    <li>
                        <div class="thumbnail">
                        <div class="col-lg-4 col-sm-4">
                            <span class="offer tooltip-test" data-original-title="" title="">Offer</span>
                            <a class="img-product" href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                                <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}"  />
                            </a>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <a class="prdocutname" href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">{{ $product['product_title'] }}</a>
                            <div class="productdiscrption">
                                {{ get_excerpt($product['product_excerpt'],30) }}
                                <div class="clear"></div>
                                <div class="pricetag mar35t">
                                    <span class="spiral"></span><a href="#" onclick="order({{ $product['product_id'] }})" class="productcart">Mua ngay</a>
                                    <div class="price">
                                        <div class="pricenew">{{ number_format($product['price_new'],0,'.','.') }}₫</div>
                                        @if($product['price_old'] >0)
                                        <div class="priceold">{{ number_format($product['price_old'],0,'.','.') }}₫</div>
                                        @endif
                                    </div>
                                    <form id="formOrder{{ $product['product_id'] }}" action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="quantity" value="1" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
                
                <div class="pull-right">
                    {{ $products->render() }}
                </div>
                <?php
                /*
                <ul class="pagination pull-right">
                    @if($products->currentPage()!=1)
                    <li>
                        <a class="prev fa fa-angle-left" href="{{ str_replace('/?','?',$products->url($products->currentPage()-1)) }}"><span>Trang trước</span></a>
                    </li>
                    @endif
                    <li>
                    @for($i=1;$i<=$products->lastPage();$i=$i+1)
                        @if( $products->currentPage() == $i )
                        <span class="page-node current">{{ $i }}</span>
                        @else
                        <a class="page-node" href="{{ str_replace('/?','?',$products->url($i)) }}">{{ $i }}</a>
                        @endif
                    @endfor
                    </li>
                    @if($products->currentPage()!=$products->lastPage())
                    <li class="">
                        <a href="{{ str_replace('/?','?',$products->url($products->currentPage()+1)) }}">Trang sau</a>
                    </li>
                    @endif
                </ul>
                */
                ?>
                
            </section>
        </section>
        </div>
        </div>
</section>
</div>
</div>
<script type="text/javascript">



    $("#sortBy").change(function(){
           $("#filter_product").submit();
    });
</script>

@stop