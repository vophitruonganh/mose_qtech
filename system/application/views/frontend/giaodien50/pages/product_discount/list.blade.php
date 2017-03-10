@extends('frontend.giaodien3.layouts.default')
@section('content')
 <!--breadcrumbs-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="breadcrumbs">
                <ul>
                    <li class="home"> <a href="/" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                    <li><strong>Sản phẩm khuyến mãi</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumbs--> 
<!--  SHOP-CONTENT-AREA START-->
<div class="shop-content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-nopad-right" style="padding-right: 0px;">
                @include('frontend.giaodien3.includes.category_sidebar')
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-nopad-left" style="padding-left: 0px;">
                @include('frontend.giaodien3.includes.thirdBanner')
                <div class="all-product-area">
                    <!-- ALL-PRODUCT-TOP-ROW START-->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="box_tool">
                                <!-- TOOLBAR START-->
                                <div class="view-mode"> 
                                    <a href="{{(!isset($_GET['view']) || $_GET['view']=='grid')? 'javascript:void(0);' : url('collections/discount?view=grid')}}" class="{{(!isset($_GET['view']) || $_GET['view']=='grid')? 'active' : ''}}" >
                                    <i class="fa fa-th"></i>
                                    </a> 
                                    <!-- <a href="?view=list"> -->
                                    <a href="{{(isset($_GET['view']) && $_GET['view']=='list')? 'javascript:void(0);' : url('collections/discount?view=list')}}" class="{{(isset($_GET['view']) && $_GET['view']=='list')? 'active' : ''}}">
                                    
                                    <i class="fa fa-th-list"></i>
                                    </a>
                                </div>
                                <div class="result-short pull-right">
                                    <p class="result-count"> Sắp xếp : </p>
                                    <form id="filter_product" class="filter-xs" method="POST">
                                        <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class="orderby-wrapper">
                                            <select name="sortBy" id="sortBy" class="selectBox" style="padding: 0px 10px; height: 30px;">
                                                <option selected="" value="default">Mặc định</option>
                                                <option value="alpha-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''}}>A → Z</option>
                                                <option value="alpha-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''}}>Z → A</option>
                                                <option value="price-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''}}>Giá tăng dần</option>
                                                <option value="price-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''}}>Giá giảm dần</option>
                                                <option value="created-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''}}>Hàng mới nhất</option>
                                                <option value="created-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''}}>Hàng cũ nhất</option>
                                            </select>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ALL-PRODUCT-TOP-ROW END-->
                    @if(count($posts)!=0)
                    <div class="fvc">
                    <?php 
                        $i=0;   
                    ?>

                    @foreach( $posts as $post )
                        <!-- SINGLE-PRODUCT START-->
                        <div class="single-product">
                        
                            <div class="col-lg-3 col-md-3 col-sm-3 border_img">
                                
                            @if($post['percent_discount']!=0)
                           
                            <span class="onsale">
                            <span class="sale-bg"></span>
                            <span class="sale-text">-{{$post['percent_discount']}}%</span>
                            </span>
                            @endif
                                <div class="product-img">
                                    <a href="{{ url('collections/'.$post['post_slug']) }}" title="{{$post['post_title']}}">
                                    <img src="{{ asset('template/giaodien3/images/product-desktop-tape-dispenser-yellow-02-a.jpg') }}" class="primary-image" alt="{{$post['post_title']}}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 infor_pr_list">
                                <div class="product-info">
                                    <h3 class="product-name">
                                        <a href="{{ url('collections/'.$post['post_slug']) }}" title="{{$post['post_title']}}">{{$post['post_title']}}</a>
                                    </h3>
                                    <div class="product-desc">
                                        <p> {{$post['post_excerpt']}}
                                        </p>
                                    </div>
                                    <div class="price-box-small">
                                        @if($post['price_old']>0)
                                            <span class="old-price">
                                            {{number_format($post['price_old'],0,'.','.')}}₫
                                        </span>
                                        @endif
                                        <span class="special-price">
                                            {{number_format($post['price_new'],0,'.','.')}}₫
                                        </span>
                                    </div>
                                    <div class="action-buttons">
                                        <form action="{{ url('cart/order/'.$post["post_slug"]) }}" method="post" class="variants" id="product-actions-{{$post['product_code']}}" enctype="multipart/form-data">
                                            <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <div class="add-to-wishlist">
                                            <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="variantId" value="{{$post['post_id']}}">
                                                <button style="float:left;border: 1px solid #3BB2CB;color: #fff;background: #3BB2CB;" class="button color-tooltip btn-cart add_to_cart" data-toggle="tooltip" title="" data-original-title="MUA NGAY"><i class="fa fa-shopping-basket"></i>&nbsp;MUA NGAY</button>
                                            </div>
                                            <div class="quickviewbtn">
                                                <a class="color-tooltip" data-toggle="tooltip" href="{{ url('collections/'.$post['post_slug']) }}" title="" data-original-title="Chi tiết"><i class="fa fa-retweet"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- SINGLE-PRODUCT END-->
                    <!-- PAGINATION-START -->
                    <div class="fvc">
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <div class="paginations">
                        <ul>
                            @if($posts->currentPage()!=1)
                            <li>
                                <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">
                                    Trang trước
                                </a>
                            </li>
                            @endif
                            @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                            <li class="{{($posts->currentPage()==$i)? 'current' : ''}}">
                                <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
                            </li>
                            @endfor
                            @if($posts->currentPage()!=$posts->lastPage())
                            <li>
                                <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">
                                    Trang sau
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                        </div>
                        <!-- PAGINATION-START -->
                    </div>
                </div>
                @endif
            </div>
            <!-- ALL-PRODUCT-AREA END-->
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#sortBy").change(function(){
           $("#filter_product").submit();
    });
</script>
@stop