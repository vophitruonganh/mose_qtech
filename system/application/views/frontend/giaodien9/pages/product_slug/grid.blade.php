@extends('frontend.giaodien9.layouts.default')
@section('content')

<section id="collection" class="archive archive-product wrapper">
   <div class="fix-width home-section ">
      <div id="primary">
         <!-- Begin collection info -->
         <!-- Begin breadcrumb -->
         <div class="breadcrumb clearfix">
            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{url('/')}}" title="LKT-Business" itemprop="url"><span itemprop="title">Trang chủ</span></a></span>
            <span class="arrow-space">&gt;</span>
            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{url('collections')}}" title="{{$title_name}}" itemprop="url"><span itemprop="title">{{$title_name}}</span></a></span>
            <span class="arrow-space">&gt;</span> <strong></strong>
         </div>
         <!-- End breadcrumb -->
         <!-- Begin sort collection -->
         <header class="archive-header">
            <h1 class="collection-title archive-title">{{$title_name}}</h1>
            <div class="meta-tools">
               <div class="change-layout grid">
                  <span class="layout select" data-name="grid"><i class="fa fa-th"></i></span>
                  <span class="layout" data-name="row"><i class="fa fa-th-list"></i></span>
               </div>
            </div>
         </header>
         <!-- End sort collection -->
         <!-- Begin collection description -->
         <!-- End collection description -->
         <!-- End collection info -->
         <div class="products clearfix change-layout grid">
            @if(count($posts)>0)
               @foreach($posts as $post)
                  <div class="product project clear">
                     <a href="{{url('collections/'.$post['post_slug'])}}" class="thumb">
                     <img src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}">
                     </a>
                     <div class="details">
                        <h4 class="title"><a href="{{url('collections/'.$post['post_slug'])}}">
                           {{$post['post_title']}}
                        </a>
                        </h4>
                        <p class="product-price">
                           <span class="price"><span class="contact">{{number_format($post['price_new'],0,'.','.')}}đ</span></span>
                        </p>
                        <p class="product-description">
                        </p>
                        <form action="{{url('cart/order/'.$post['post_slug'])}}" method="post" class="variants clearfix form-add-to-cart">
                           <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                           <!-- Begin product options -->
                           <input type="hidden" name="id" value="1004984987">
                           <input id="quantity" type="hidden" name="quantity" value="1" class="tc item-quantity">
                           <button type="submit" class="add-to-cart btn addtocart" name="add" value="fav_HTML">Giỏ Hàng</button>
                           <div class="cart-animation">1</div>
                           <!-- End product options -->
                        </form>
                        <a class="readmore button" href="{{url('collections/'.$post['post_slug'])}}">
                        Chi tiết
                        </a>
                        <span class="haravan-product-reviews-badge" data-id="1001418214"></span>
                     </div>
                  </div>
               @endforeach
            @endif
            

         </div>
         <div class="navigation clearfix">
               @if($posts->currentPage()!=1)
                       <a class="prev" href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">
                           Trang trước
                       </a>
               @endif
               @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                  @if($posts->currentPage()==$i)
                     <span class="page-node page-number current">{{$i}}</span>
                    
                  @else
                     <a class="{{($posts->currentPage()==$i)? 'page-node page-number current' : ''}}" href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
                  @endif
               @endfor
                 
               @if($posts->currentPage()!=$posts->lastPage())
                 <a class="next" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">
                     Trang sau
                 </a>
               @endif
         </div>
      </div>
      <div id="secondary" class="sidebar">
         <!-- Widget 5555 -->
            {!!showWidget('widgeteeeee')!!}
         <!-- End Widget 5555 -->
         
         <!-- Widget 6666 -->
            {!!showWidget('widgetfffff')!!}
         <!-- End Widget 6666 -->
         

      </div>
   </div>
</section>


@stop     
