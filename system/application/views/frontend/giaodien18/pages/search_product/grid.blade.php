@extends('frontend.giaodien18.layouts.default')
@section('content')


<div class="breadcrumb">
   <div class="container">
      <ul>
         <li><a href="/" target="_self">Trang chủ</a></li>
         <li class="active"><span>
            Tìm kiếm: "may - Smart"
            </span>
         </li>
      </ul>
   </div>
</div>

<div id="layout-page-search">
   <div class="container">
      <span class="header-search header-page clearfix">
         <h1 class="title-search">Tìm kiếm</h1>
      </span>
      <div class="content-page" id="search">
          
<!--   <div class="expanded-message">
                <h2 class="text-search-error">Không tìm thấy nội dung bạn yêu cầu</h2>
                <span class="subtext">
                Không tìm thấy  <strong>"toshiba"</strong> . Vui lòng tìm kiếm với từ khóa khác.
                </span>
             </div>-->
          
         <div class="col-md-12">
            <span class="subtext">
            Kết quả tìm kiếm cho  <strong>"{{$query}}"</strong>.
            </span>
         </div>
      </div>
      <div class="results content-page content-product-list product-list">
         @if(count($posts)>0)
            @foreach($posts as $post)
               <!-- Begin results -->
                  <div class="wrap-box-padding col-md-3 col-sm-4 col-xs-12">
                      <form id="form_order_{{$post['post_id']}}" action="{{url('cart/order/'.$post['post_slug'])}}" method="post" class="variants"  enctype="multipart/form-data">
                           <input id="page_token" type="hidden" name="_token" value="{{csrf_token()}}" />
                           <input type="hidden" name="quantity" value="1" />
                           <a href="{{url('collections/'.$post['post_slug'])}}">
                           </a>
                           <div class="wrap-border-content-center">
                              <a href="{{url('collections/'.$post['post_slug'])}}">
                                 <div class="list-content-center">
                                    <div class="img-product-home">
                                       <img alt="{{$post['post_title']}}" title="{{$post['post_title']}}" src="{{loadFeatureImage($post['post_featured_image'])}}" class="img-responsive">
                                       @if($post['percent_discount']>0)
                                          <div class="sales">
                                             <span>Giảm {{$post['percent_discount']}}%</span>
                                          </div>
                                       @endif
                                       <!--end .sales-->
                                    </div>
                                 </div>
                                 <!--end list-content-center-->
                              </a>
                              <div class="price-content-center">
                                 <a href="{{url('collections/'.$post['post_slug'])}}">
                                    <div class="wrap-price">
                                       <span>{{number_format($post['price_new'],0,'.','.')}}₫</span>
                                       @if($post['price_old']>0)
                                          <span><del>{{number_format($post['price_old'],0,'.','.')}}₫</del></span>
                                       @endif
                                    </div>
                                    <!--end .wrap-price-->
                                 </a>
                                 <div class="wrap-addcard">
                                    <a href="{{url('collections/'.$post['post_slug'])}}">
                                    </a>
                                    <h4><a href="{{url('collections/'.$post['post_slug'])}}"></a><a href="{{url('collections/'.$post['post_slug'])}}">{{$post['post_title']}}</a></h4>
                                    <span class="buy-home"><a onclick ="order({{$post['post_id']}})">Mua ngay</a></span>
                                 </div>
                                 <!--end .wrap-addcard-->                    
                              </div>
                              <!--end .price-content-center-->  
                           </div>
                     <!--end .wrap-border-content-center-->
                     </form>
                  </div>
            <!--end .wrap-box-padding-->
            @endforeach
         @endif
         
      
      </div>
      <!-- End results -->
      <div class="col-sm-12" id="wrap-pagination-default">
         <div class="clear"></div>
         <div class="text-center">
            <div class="pagination">
               <ul class="pagination-list">
               @if($posts->currentPage()!=1)
                  <li>
                     <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">< </a>
                  </li>
               @endif
               @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                  <li class="{{($posts->currentPage()==$i)? 'hidden-phone current' : 'hidden-phone'}}">
                     <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
                  </li>
               @endfor
               @if($posts->currentPage()!=$posts->lastPage())
                  <li>
                     <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">></a>
               </li>
               @endif
               </ul>
               <input type="hidden" name="limitstart" value="0">
            </div>
         </div>
      </div>
      <!-- /#search -->
   </div>
</div>
<script type="text/javascript">
       $("#sortBy").change(function(){
           $("#filter_product").submit();
      });

      function order(i)
      {
        $("#form_order_"+i).submit();   
      }
</script>
@stop

        
        
           
          
        