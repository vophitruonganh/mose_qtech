@extends('frontend.giaodien19.layouts.default')
@section('content')

<div class="container">
   <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12 t-search" id="layout-page">
         <div class="block-title search"> Tìm kiếm </div>
         <div class="content-page clearfix" id="search">
<!--             <div class="col-md-12 expanded-message">
                    <span class="subtext">
                            Không tìm thấy  <strong>"a"</strong> . Vui lòng tìm kiếm với từ khóa khác.
                    </span>
            </div>-->
            <div class="col-md-12">
               <span class="subtext">
               Kết quả tìm kiếm cho  <strong>"{{$query}}"</strong>.
               </span>
            </div>
         </div>
         <div class="results content-page content-product-list product-list clearfix">
            <!-- Begin results -->
         @if(count($posts)>0)
            @foreach( $posts as $post )
                      <div class="item col-md-3 col-sm-4 col-xs-6">
                         <form id="form_order_{{$post['post_id']}}" action="{{url('cart/order/'.$post['post_slug'])}}" method="post" class="variants"  enctype="multipart/form-data">
                           <input id="page_token" type="hidden" name="_token" value="{{csrf_token()}}" />
                           <input type="hidden" name="quantity" value="1" />
                           <div class="col-item">
                           @if($post['percent_discount']>0)
                              <div class="sale-label sale-top-right">-{{$post['percent_discount']}}<sup>%</sup></div>
                           @endif
                              <!-- <div class="new-label new-top-right">New</div> -->
                              <div class="images-container">
                                 <a class="product-image" title="Sample Product" href="{{url('collections/'.$post['post_slug'])}}"> 
                                 <img src="{{ loadFeatureImage($post['post_featured_image']) }}" class="img-responsive" alt="{{$post['post_title']}}">   </a>
                                 <div class="actions">
                                    <div class="actions-inner">
                                       <a onclick ="order({{$post['post_id']}})" class="button btn-cart add-cart" data-variantid="1005436547" title="Thêm vào giỏ"><span>Thêm vào giỏ</span></a>
                                       
                                    </div>
                                 </div>
                                 <div class="qv-button-container">
                                    <a href="{{url('collections/'.$post['post_slug'])}}" class="qv-e-button btn-quickview-1" title="Xem nhanh" data-handle=""><span><span>Quick View</span></span></a>
                                 </div>
                              </div>
                              <div class="info">
                                 <div class="info-inner">
                                    <div class="item-title">
                                       <a title=" Sample Product" href="{{url('collections/'.$post['post_slug'])}}">{{$post['post_title']}}</a>
                                    </div>
                                    <!--item-title-->
                                    <div class="item-content">
                                       <div class="ratings">
                                         <!--  <div class="rating-box">
                                             <div style="width: 80%;" class="rating"></div>
                                          </div> -->
                                       </div>
                                       <div class="price-box">
                                          <p class="pro-price">{{number_format($post['price_new'],0,'.','.')}}₫
                                          @if($post['price_old']>0)
                                          <del class="compare-price">{{number_format($post['price_old'],0,'.','.')}}₫</del>
                                          @endif
                                          </p>
                                       </div>
                                    </div>
                                    <!--item-content-->
                                 </div>
                                 <!--info-inner-->
                                 <!--actions-->
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </form>
                     </div>
            @endforeach
         @else
            "Không tìm thấy sản phẩm nào"
         @endif

         </div>
         <!-- End results -->
         <div id="pagination" class="clearfix">
            <ul class="pagination">
              @if($posts->currentPage()!=1)
                  <li>
                     <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">Trước </a>
                  </li>
               @endif
               @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                  <li class="{{($posts->currentPage()==$i)? 'active' : ''}}">
                     <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
                  </li>
               @endfor
               @if($posts->currentPage()!=$posts->lastPage())
                  <li>
                     <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">Sau</a>
               </li>
               @endif
            </ul>
         </div>
         <!-- /#search -->
      </div>
   </div>
</div>

<style>
	div#search {
	float: left;
	width: 100%;
	outline: none;
	margin-bottom: 20px;
	}
	.search-field {
	width: 100%!important;
	}
	input#go {
	width: 100px!important;
	height: 40px!important;
	float: right!important;
	background: url(//hstatic.net/0/0/global/design/theme-default/icon-search.png) #AD0800 center no-repeat;
	margin: 0px!important;
	font-size: 0px;
	position: relative!important;
	top:0px!important;
	border: none;
	}
	#search .search_box
	{
	width: calc(100% - 100px)!important;
	float: left;
	outline: none;
	padding: 0px 0px 0px 10px;
	}
	span.subtext {
	padding: 10px;
	display: block;
	font-size: 15px;
	}
	.empty {
	margin-top: 20px !important;
	float: none !important;
	}
</style>
<script type="text/javascript">
     
      function order(i)
      {
         $("#form_order_"+i).submit();   
      }
</script>
@stop

          