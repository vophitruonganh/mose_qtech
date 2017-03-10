@extends('frontend.giaodien16.layouts.default')
@section('content')

<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home"> <a title="Quay lại trang chủ" href="/">Trang chủ</a></li>
               <i class="fa fa-angle-double-right" aria-hidden="true"></i>
               <li><span class="brn"> Tất cả sản phẩm</span></li>
            </ul>
         </div>
      </div>
   </div>
</div>

<section class="collection_all">
   <div class="container">
      <aside class="col-lg-3 col-md-3 col-sm-3 hidden-xs sidebar-collection">
         <!-- Widget 11111111 -->
            {!!showWidget('widget11111111')!!}
         <!-- End Widget 11111111 -->
         
         <!-- Widget 22222222 -->
            {!!showWidget('widget22222222')!!}
         <!-- End Widget 22222222 -->
        
         <script type="text/javascript">
                  jQuery(document).ready(function() {
                     jQuery(".slideshowprobox").jCarouselLite({
                        auto: 1000,
                        speed: 5000,
                        visible: 4,
                        vertical: true,
                        hoverPause: 1
                     });
                  });
         </script>
         <div class="quangcao block">
            <img src="//bizweb.dktcdn.net/100/091/132/themes/139143/assets/banner.jpg?1472118628278" alt="Quảng cáo">
         </div>
      </aside>
      <article class="col-lg-9 col-md-9 col-sm-9 col-xs-12 article">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 collection_header">
            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
               <h2 class="txt_u fw_600 pull-left">Tất cả sản phẩm</h2>
            </div>
            <div class="toolbar">
               <div class="sorter">
                  <div class="view-mode"> 
                     <span title="Lưới" class="collection_btn active"><i class="fa fa-th" aria-hidden="true"></i></span>
                     <a href="{{url('collections?view=list')}}" title="Danh sách" class="collection_btn"><i class="fa fa-th-list" aria-hidden="true"></i></a> 
                  </div>
               </div>
               <div id="sort-by">
                  <label class="left">Sắp xếp: </label>
                  <form class="form-inline form-viewpro" id="filter_product" method="POST">
                  <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <div class="form-group">
                        <select class="sort-by-script" name="sortBy" id="sortBy">
                           <option selected="" value="default" >Mặc định</option>
                           <option value="price-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''}}>Giá tăng dần</option>
                           <option value="price-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''}}>Giá giảm dần</option>
                           <option value="alpha-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''}}>Từ A-Z</option>
                           <option value="alpha-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''}}>Từ Z-A</option>
                           <option value="created-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''}}>Cũ đến mới</option>
                           <option value="created-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''}}>Mới đến cũ</option>
                        </select>
                        
                     </div>
                  </form>
               </div>
            </div>
         </div>

         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 grid-items">
            @if(count($posts)!=0)
                @foreach( $posts as $post )
                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 loop-grid">
                     <div class="col-item product-loop-grid bd_red">
                        @if($post['percent_discount']>0)
                           <div class="sale-label sale-top-right">-{{$post['percent_discount']}}%</div>
                        @endif
                        <div class="item-inner">
                           <div class="product-wrapper">
                              <div class="thumb-wrapper loop-img">
                                 <a href="{{url('collections/'.$post['post_slug'])}}" class="thumb flip">
                                 <span class="face">
                                 <img src="{{ loadFeatureImage($post['post_featured_image']) }}" title="{{$post['post_title']}}" alt="{{$post['post_title']}}">
                                 </span>
                                 <span class="face back">
                                 <img src="{{ loadFeatureImage($post['post_featured_image']) }}" title="{{$post['post_title']}}" alt="{{$post['post_title']}}">
                                 </span>
                                 </a>
                                 <div class="view_buy hidden-xs hidden-sm">
                                    <div class="actions">
                                       <form action="{{url('cart/order/'.$post['post_slug'])}}" method="post" class="variants" id="product-actions-2815485" enctype="multipart/form-data">
                                          <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                          <input type="hidden" name="quantity" value="1" />
                                          <button class="btn-buy btn-cus" title="Mua ngay" type="submit"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua ngay</span></button>
                                       </form>
                                    </div>
                                    <button class="btn-view btn-cus" onclick="location.href='{{url('collections/'.$post['post_slug'])}}'" title="Xem sản phẩm"><span>Xem chi tiết</span></button>
                                 </div>
                              </div>
                           </div>
                           <div class="item-info">
                              <div class="info-inner">
                                 <h3 class="item-title"> <a href="{{url('collections/'.$post['post_slug'])}}" title="{{$post['post_title']}}">{{$post['post_title']}} </a> </h3>
                                 <div class="item-content">
                                    <div class="item-price">
                                       <div class="price-box">
                                          <p class="special-price"> 
                                             <span class="price-label">Giá khuyến mại</span> 
                                             <span class="price"> {{number_format($post['price_new'],0,'.','.')}}₫</span> 
                                          </p>
                                          @if($post['price_old']>0)
                                             <p class="old-price"> 
                                                <span class="price-label">Giá cũ:</span> 
                                                <span class="price" id="old-price"> {{number_format($post['price_old'],0,'.','.')}}₫</span> 
                                             </p>
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                @endforeach
            @endif
         </div>

         <div class="paginate-pages">
            <div class="pager">
               <div class="pages">
                  <ul class="pagination">
                    @if($posts->currentPage()!=1)
                          <li>
                              <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">
                                  <
                              </a>
                          </li>
                          @endif
                          @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                          <li class="{{($posts->currentPage()==$i)? 'active' : ''}}">
                              <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
                          </li>
                          @endfor
                          @if($posts->currentPage()!=$posts->lastPage())
                          <li>
                              <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">
                                  >
                              </a>
                          </li>
                          @endif
                  </ul>
               </div>
            </div>
         </div>
      </article>
   </div>
</section>

<script type="text/javascript">
    $("#sortBy").change(function(){
           $("#filter_product").submit();
    });
</script>

@stop
      