@extends('frontend.giaodien20.layouts.default')
@section('content')

<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <div class="inner">
         <a href="/" title="Quay lại trang chủ">Trang chủ</a>
         <span aria-hidden="true">/</span>
         <span>{{$query}}</span>
      </div>
   </nav>
   <!-- /templates/search.liquid -->
   <div class="grid">
      <div class="grid__item large--two-thirds push--large--one-sixth">
          <!--<h1 class="text-center">Tìm kiếm của bạn "haha huhu" không có kết quả.</h1>-->
         <h1 class="text-center">Tìm kiếm của bạn "{{$query}}" tất cả kết quả:</h1>
         <!-- /snippets/search-bar.liquid -->
         <form action="{{url('collections')}}" method="get" class="input-group search-bar" role="search">
            <input type="search" name="search" value="{{$query}}" placeholder="Nhập vào tìm kiếm" class="input-group-field" aria-label="Nhập vào tìm kiếm">
            <span class="input-group-btn">
            <button type="submit" class="icon-fallback-text">
            <i class="fa fa-search" aria-hidden="true"></i>
            <span class="fallback-text">Tìm kiếm</span>
            </button>
            </span>
         </form>
         <hr class="hr--clear">
         <div class="grid-uniform">
            @if(count($posts)!=0)
               @foreach( $posts as $post )
                  <!-- begin grid search results-->
            <!-- /snippets/product-grid-item.liquid -->
            <div class="grid__item  large--one-quarter medium--one-third ">
               <div class="product-container" data-publish-date="29/07/2016 6:48:55 SA">
                  <div class="product-image ">
                     <div class="product-thumbnail">
                        <a href="{{url('collections/'.$post['post_slug'])}}" title="">
                        <img class="product-featured-image" src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}">
                        <img class="back-img" src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}">
                        </a>
                     </div>
                     <!-- /.product-thumbnail -->
                      @if($post['percent_discount'])
                           <span class="label on-sale">Giảm</span>
                     @endif
                  </div>
                  <!-- /.product-image -->
                  <div class="product-meta">
                     <h4 class="product-name">
                        <a href="{{url('collections/'.$post['post_slug'])}}" title="{{$post['post_title']}}">{{$post['post_title']}}</a>
                     </h4>
                     <!-- /.product-product -->
                     <p class="description"></p>
                     <div class="product-price">
                        <span class="amout">
                         @if($post['price_old']>0)
                           <del class="sale-price">{{number_format($post['price_old'],0,'.','.')}}₫</del> 
                         @endif
                        <span>{{number_format($post['price_new'],0,'.','.')}}₫</span>
                        </span>
                     </div>
                     <!-- /.product-price -->
                     <form method="post" action="{{url('cart/order/'.$post['post_slug'])}}" class="add-to-cart">
                        <input id="page_token" type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" name="quantity" value="1" />
                        <!-- <input type="submit" value="Buy now" class="btn" /> -->
                        <button type="submit" name="add" class="btn">
                        <i class="fa fa-shopping-cart"></i>Thêm vào giỏ
                        </button>
                     </form>
                  </div>
                  <!-- /.product-meta -->
                 
               </div>
               <!-- product-container -->
            </div>
            <!-- //grid search results-->
          
               @endforeach
            @endif
         
        
            
         </div>
         <div class="pagination">
         @if(count($posts)!=0)
            @if($posts->currentPage()!=1)
               <span class="prev">
                  <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">←</a>
              </span>
            @endif
            @for($i=1;$i<=$posts->lastPage();$i=$i+1)

               <span class="{{($posts->currentPage()==$i)? 'page current' : 'page'}}">
                  <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
               </span>
            @endfor
            @if($posts->currentPage()!=$posts->lastPage())
               <span class="next">
                  <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">→</a>
               </span>
            @endif
         @endif
         </div>
      </div>
   </div>
</main>

@stop

