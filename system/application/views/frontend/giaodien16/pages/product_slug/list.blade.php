@extends('frontend.giaodien16.layouts.default')
@section('content')
 

<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home"> <a title="Quay lại trang chủ" href="/">Trang chủ</a></li>
               <i class="fa fa-angle-double-right" aria-hidden="true"></i>
               <li><span class="brn"> {{$title_name}}</span></li>
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
               <h4 class="txt_u fw_600 pull-left">{{$title_name}}</h4>
            </div>
            <div class="toolbar">
               <div class="sorter">
                  <div class="view-mode"> 
                     <a href="{{url('collections/'.$slug.'?view=grid')}}" title="Lưới" class="collection_btn"><i class="fa fa-th" aria-hidden="true"></i></a>
                     <span title="Danh sách" class="collection_btn active"><i class="fa fa-th-list" aria-hidden="true"></i></span> 
                  </div>
               </div>
              <!--  <div id="sort-by">
                  <label class="left">Sắp xếp: </label>
                  <form class="form-inline form-viewpro"  id="filter_product" method="POST">
                     <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <div class="form-group">
                        <select class="sort-by-script" name="sortBy" id="sortBy">
                           <option selected="" value="default">Mặc định</option>
                           <option value="price-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''}}>Giá tăng dần</option>
                           <option value="price-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''}}>Giá giảm dần</option>
                           <option value="alpha-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''}}>Từ A-Z</option>
                           <option value="alpha-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''}}>Từ Z-A</option>
                           <option value="created-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''}}>Cũ đến mới</option>
                           <option value="created-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''}}>Mới đến cũ</option>
                        </select>
                     </div>
                  </form>
               </div> -->
            </div>
         </div>
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 list-items">
            @if(count($posts)>0)
                @foreach( $posts as $post )
                     <div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item_loop_list">
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 item_loop_list_img">
                              <a href="{{url('collections/'.$post['post_slug'])}}"><img src="{{ loadFeatureImage($post['post_featured_image']) }}" title="{{$post['post_title']}}" alt="{{$post['post_title']}}"></a>
                           </div>
                           <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 item_loop_list_info">
                              <div class="item_loop_list_title fs15">
                                 <h4 class="fw_600">{{$post['post_title']}}</h4>
                              </div>
                              <div class="item_loop_list_price cl_red fw_600 fs15">
                                 <div class="price-box">
                                 @if($post['price_old']>0)
                                    <p class="old-price"> 
                                       <span class="price-label">Giá cũ:</span> 
                                       <span class="price" id="old-price">{{number_format($post['price_old'],0,'.','.')}}₫</span> 
                                    </p>
                                 @endif
                                    <p class="special-price"> 
                                       <span class="price-label">Giá khuyến mại</span> 
                                       <span class="price">{{number_format($post['price_new'],0,'.','.')}}₫</span> 
                                    </p>
                                 </div>
                              </div>
                              <div class="item_loop_list_content">
                                 <p>{{$post['post_excerpt']}}</p>
                              </div>
                              <div class="btns-list">
                                 <div class="actions">
                                    <form action="{{url('cart/order/'.$post['post_slug'])}}" method="post" class="variants" id="product-actions-2815560" enctype="multipart/form-data">
                                       <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                       <input type="hidden" name="quantity" value="1" />
                                       <button class="btn_muangay_list btn_item_loop_list" title="Mua ngay" type="submit"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua ngay</span></button>
                                    </form>
                                 </div>
                                 <button class="btn_item_loop_list btn_xemchitiet" title="Xem chi tiết" onclick="location.href='{{url('collections/'.$post['post_slug'])}}'"><span>Xem chi tiết</span></button>
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