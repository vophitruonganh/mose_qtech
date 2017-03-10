@extends('frontend.giaodien10.layouts.default')
@section('content')
<div class="container">
    <div class="" id="layout-page">
        <h1 class="heading1"><span class="maintext">Tìm kiếm</span></h1>
        @if( count($products) == 0 )
        <div class="col-md-12 expanded-message">
            <h2>Không tìm thấy nội dung bạn yêu cầu</h2>
            <span class="subtext">
                Không tìm thấy  <strong>"{{$search }}"</strong> . Vui lòng tìm kiếm với từ khóa khác.
            </span>
        </div>
        @else
        <div class="content-page" id="search">
            <div class="col-md-12">
                <span class="subtext">
                Kết quả tìm kiếm cho  <strong>"{{$search }}"</strong>.
                </span>
            </div>
        </div>
        <ul class="thumbnails grid">
            @foreach( $products as $product )
            <!-- Begin results -->
            <li class="col-lg-3 col-sm-3">
                <a class="prdocutname" href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">{{ $product['product_title'] }}</a>
                <div class="thumbnail">
                    @if($product['check_discount'])
                    <span class="sale tooltip-test" data-original-title="" title="">Sale</span>
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
                    <a href="{{ url('collections/'.$product['product_slug']) }}" title="{{ $product['product_title'] }}">
                        <img alt="{{ $product['product_title'] }}" src="{{ get_image_url($product['product_image_id']) }}">
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
                    </div>
                    <form id="formOrder{{ $product['product_id'] }}" action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="quantity" value="1" />
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
        @endif
        <!-- End results -->
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
        <!-- /#search -->
        <style>
            div#search {
            float: left;
            width: 100%;
            outline: none;
            }
            .search-field {
            width: 100%!important;
            }
            input#go {
            width: 34px!important;
            height: 34px!important;
            float: right!important;
            background: url(//hstatic.net/0/0/global/design/theme-default/icon-search.png) #53A1CC center no-repeat;
            margin: 0px!important;
            font-size: 0px;
            position: relative!important;
            top:0px!important;
            }
            #search .search_box
            {
            width: calc(100% - 34px)!important;
            float: left;
            outline: none;
            padding: 0px 0px 0px 10px;
            }
        </style>
    </div>
</div>
@stop