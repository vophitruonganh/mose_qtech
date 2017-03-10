@extends('frontend.giaodien16.layouts.default')
@section('content')

<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home"> <a title="Quay lại trang chủ" href="/">Trang chủ</a></li>
               <i class="fa fa-angle-double-right" aria-hidden="true"></i>
               <li><span class="brn">Kết quả</span></li>
            </ul>
         </div>
      </div>
   </div>
</div>


<section class="main-container col2-right-layout search_page">
   <div class="main container">
      <div class="row">
         <header class="page-header">
             <!--<h2>Không tìm thấy bất kỳ kết quả nào với từ khóa "giay the th".</h2>-->
            <h2>Kết quả tìm kiếm với từ khóa "{{$query}}":</h2>
         </header>
        
         <div class="product-list">
             @if(count($posts)!=0)
               @foreach($posts as $post)
                   <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 pd0">
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
                                             <span class="price">{{number_format($post['price_new'],0,'.','.')}}₫</span> 
                                          </p>
                                          @if($post['price_old']>0)
                                             <p class="old-price"> 
                                                <span class="price-label">Giá cũ:</span> 
                                                <span class="price" id="old-price">{{number_format($post['price_old'],0,'.','.')}}₫</span> 
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
   </div>
</section>
   

@stop
      