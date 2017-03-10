@extends('frontend.giaodien17.layouts.default')
@section('content')


<div class="fvc" style="float:left;width:100%;">
   <div class="banner_page_list">
      <h1>Tìm Kiếm</h1>
   </div>
   <div class="breadcrumbs">
      <div class="container">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ &nbsp;</a></li>
            <li><strong>can  - Mendover Theme</strong></li>
         </ul>
      </div>
   </div>
   <section class="no-bg-color-parallax parallax-black theme-section">
      <div class="container">
         <div class="row">
            <div class="col-lg-12" style="margin:15px 0px;">
               <h3 class="text-uppercase paralax-header"> 		
                  <strong>Tìm kiếm</strong>
               </h3>
            </div>
         </div>
      </div>
   </section>
   <div class="main-container col2-right-layout">
      <div class="main container">
         <div class="row">
            <section class="col-main col-sm-12">
               <div class="my-account">
                  <div class="sort-select" style="padding: 0px;">
                     <form action="{{url('collections')}}" method="get" class="search-form" role="search">
                        <p>
                           <input style="height: 43px; margin-bottom: 0px; padding-left: 15px;width: 65%; max-width:300px;" type="text" name="search" value="{{$query}}">
                           <input type="submit" style="background:#222; color:#fff;height: 44px; border-radius:0px;" value="Tìm kiếm" class="btn">
                        </p>
                     </form>
                  </div>
                  <div class="my-wishlist" style="margin-top:30px;">
                      
<!--                         <div class="alert alert-warning fade in green-alert" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            Không có sản phẩm nào trong danh mục này.
                         </div>-->
                  @if(count($posts)!=0)
                     @foreach($posts as $post)
                        <div class="single-product">
                              <div class="col-lg-3 col-md-3 col-sm-3">
                                 <div class="product-img">
                                    <a href="{{url('collections/'.$post['post_slug'])}}" title="{{$post['post_title']}}">
                                    <img src="{{ loadFeatureImage($post['post_featured_image']) }}" class="primary-image" alt="{{$post['post_title']}}">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9 stl_search" style="margin-bottom: 15px;">
                                 <div class="product-info">
                                    <h2 class="product-name">
                                       <a href="{{url('collections/'.$post['post_slug'])}}">{{$post['post_title']}}</a>
                                    </h2>
                                    <div class="price-box-small" style="font-size: 21px;">
                                       <span class="special-price">
                                       {{number_format($post['price_new'],0,'.','.')}}₫
                                       </span>
                                    </div>
                                    <div class="product-desc">
                                       <p style="font-size: 16px;"> {{$post['post_excerpt']}}</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     @endforeach
                  @endif
                  
               </div>
                  <div class="shop-pag">
                     <div class="tzpagenavi-shop">
                        <ul>
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
            </section>
         </div>
      </div>
   </div>
   <style>
      .breadcrumbs{display:none;}
   </style>
</div>

@stop