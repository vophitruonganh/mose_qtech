@extends('frontend.giaodien4.layouts.default')
@section('content')

<div class="container">
   <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
         <div class="col-lg-12 content-page" id="search">
            <span class="header-search header-page clearfix">
               <h1>Tìm kiếm</h1>
            </span>
            <span class="subtext">
            Kết quả tìm kiếm cho  <strong>{{$search}}</strong>.
            </span>
         </div>
         <div class="col-lg-12  results content-page content-product-list product-list">
            <div class="row">
               <!-- Begin results -->
               @if( count($products)>0 )
               <?php $i = 0; ?>
                  @foreach($products as $product)
                  <?php $i++; ?>
                  <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12 pro-loop">
                  <!--sử dụng  -->
                     <div class="product-block product-resize fixheight" style="height: 383px;">
                        <div class="product-img image-resize view view-third clearfix" style="height: 285px;">
                        @if ( $product['check_discount']>0 )
                           <div class="product-sale">
                              <span><label class="sale-lb">-</label> {{$product['percentage']}}%</span>
                           </div>
                        @endif
                           <a href="{{ url('collections/'.$product['product_slug']) }}" title="Tai nghe bluetooth thể thao 4.0 HBS HV-800">
                           <img alt="{{$product['product_title']}}" src="{{ get_image_url($product['product_image_id']) }}">
                           </a>
                        </div>
                        <div class="product-detail clearfix">
                           <h3 class="pro-name"><a href="{{ url('collections/'.$product['product_slug']) }}" title="{{$product['product_title']}}">{{$product['product_title']}}</a></h3>
                           <!-- sử dụng pull-left -->
                           <div class="content_price">
                              <p class="pro-price">{{number_format($product['price_new'],0,'.','.')}}₫</p>
                              <p class="pro-price-del"><del class="compare-price"> @if($product['price_old']>0)
                                            {{number_format($product['price_old'],0,'.','.')}}₫
                                        @endif</del>
                              </p>
                           </div>
                           <div class="actions clearfix">
                              <a class="btn-like mask-view"  href="{{ url('collections/'.$product['product_slug']) }}" data-handle="/products/tai-nghe-bluetooth-the-thao-4-0-hbs-hv-800"><i class="fa fa-bar-chart"></i><span>Xem nhanh</span></a>
                               <form id="form_order_{{$i}}"action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="product-actions-{{$product['product_id']}}" enctype="multipart/form-data">
                                        <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                       <input type="hidden" name="quantity" value="1" />
                                       <a class="btn-buy ajax_add_to_cart " data-variant="1004976322" onclick="order({{$i}})">
                                       <span> + Thêm vào giỏ </span> <i class="shoppping-cart"><img src="{{ asset('template/giaodien4/images/Capture.PNG') }}"></i></a> 
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                     
                <div class="col-lg-12 pagination-blog">
                  <div class="row">
                     <!-- Begin: Phân trang blog --> 
                     <div id="pagination" class="pw">
                     
                        @if ($products->lastPage() > 1)
                           @if($products->currentPage() != 1)
                                <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                 <a class="prev" href="{{ $products->url($products->currentPage()-1) }}"><span><i class=" fa fa-angle-left"></i>Trang trước  </span></a>
                            </div>
                           @endif
                            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-center">
                           @for ($i = 1; $i <= $products->lastPage(); $i++)
                                 @if($products->currentPage() == $i)
                                  <span class="page-node current">{{ $i }}</span>
                                 @else 
                                    <a class="page-node" href="{{ $products->url($i) }}">{{$i}}</a>
                                 @endif
                                   
                            @endfor
                             </div>

                           @if($products->currentPage() != $products->lastPage())
                              <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                 <a class="pull-right next" href="{{ $products->url($products->currentPage()+1) }}"><span>Trang sau <i class="fa fa-angle-right"></i></span></a>
                              </div>
                           @endif
                        @endif
                      </div>
                     
                     <!-- End: Phân trang blog --> 
                  </div>
               </div>
                
               @else
                  Không có kết quả 
               @endif
         
          
      
            </div>
         </div>
         <!-- End results -->
      </div>
      
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
         background: url(//hstatic.net/0/0/global/design/theme-default/icon-search.png) #f5f5f5 center no-repeat;
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
         div#search {
         background: #fff;
         margin-top: 20px;
         padding: 15px 10px;
         margin-bottom: 20px;
         }
         span.header-search h1 {
         margin-top: 20px;
         margin-bottom: 0;
         }
      </style>
   </div>
</div>
					
 <script type="text/javascript">
   
    function order(i)
    {
         $("#form_order_"+i).submit();   
    }
   </script>
@stop