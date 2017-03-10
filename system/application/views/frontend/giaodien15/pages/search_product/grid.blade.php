@extends('frontend.giaodien15.layouts.default')
@section('content')



<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <img src="//hstatic.net/033/1000104033/1000147703/bg-breadcrumb.jpg?v=55" alt="">
      <div class="inner">
         <div class="breadcrumb-list">
            <a href="/" title="Quay lại trang chủ">Trang chủ</a>
            <span aria-hidden="true">/</span>
            <span>{{$query}} </span>
         </div>
      </div>
   </nav>
   <!-- /templates/search.liquid -->
   <div class="grid">
      <div class="grid__item large--two-thirds push--large--one-sixth">
          <!--khong tim thay ket qua-->
          <!--<h1 class="text-center">Tìm kiếm của bạn "t" không có kết quả.</h1>-->
          
         <h1 class="text-center">Tìm kiếm của bạn "{{$query}}" tất cả kết quả:</h1>
         <!-- /snippets/search-bar.liquid -->
         <form action="{{url('collections')}}" method="get" class="input-group search-bar" role="search">
            <input type="search" name="searcg" value="{{$query}}" placeholder="Nhập vào tìm kiếm" class="input-group-field" aria-label="Nhập vào tìm kiếm">
            <span class="input-group-btn">
            <button type="submit" class="btn icon-fallback-text">
            <i class="fa fa-search" aria-hidden="true"></i>
            <span class="fallback-text">Tìm kiếm</span>
            </button>
            </span>
         </form>
         <hr class="hr--clear">
         <div class="grid-uniform">
            <!-- begin grid search results-->
            <!-- /snippets/product-grid-item.liquid -->
            @if(count($posts)>0)
               <?php $i=0; ?>
                @foreach( $posts as $post )
                  <div class="grid__item  large--one-third medium--one-third ">
                     <div class="product-container" data-publish-date="02/08/2016 2:59:20 SA">
                        <div class="product-image ">
                           <div class="product-thumbnail">
                              <a href="{{url('collections/'.$post['post_slug'])}}" title="">
                              <img class="product-featured-image" src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}">
                              <img class="back-img" src="//hstatic.net/033/1000104033/1/2016/8-2/product_66_grande.jpg" alt="">
                              </a>
                           </div>
                           <!-- /.product-thumbnail -->
                           @if($post['percent_discount']>0)
                           <span class="label on-sale">Giảm</span>
                           @endif
                        </div>
                        <!-- /.product-image -->
                        <div class="product-meta">
                           <h4 class="product-name">
                              <a href="{{url('collections/'.$post['post_slug'])}}" title="{{$post['post_title']}}">{{$post['post_title']}}</a>
                           </h4>
                           <!-- /.product-product -->
                           <div class="product-price">
                              <span class="amout">
                              @if($post['price_old']>0)
                                 <del class="sale-price">{{number_format($post['price_old'],0,'.','.')}}₫</del> 
                              @endif
                              <span>{{number_format($post['price_new'],0,'.','.')}}₫</span>
                              </span>
                           </div>
                           <!-- /.product-price -->
                           <span class="haravan-product-reviews-badge" data-id="1002812892"></span> <!-- end rating -->
                        </div>
                        <!-- /.product-meta -->
                        <div class="product-actions">
                           <form method="post" action="{{url('cart/order/'.$post['post_slug'])}}" class="add-to-cart">
                              <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                 <input type="hidden" name="quantity" value="1" />
                              <input type="hidden" name="id" value="1007973295">
                              <!-- <input type="submit" value="Buy now" class="btn" /> -->
                              <button type="submit" name="add" class="btn">
                              <span class="lnr lnr-cart "></span>
                              Thêm vào giỏ
                              </button>
                           </form>
                           <div class="add-links">
                              
                             
                              <a href="{{url('collections/'.$post['post_slug'])}}" class="btn product-quick-view btn-detail" title="Chi tiết">
                              <i class="fa fa-expand" aria-hidden="true"></i>
                              Chi tiết
                              </a>
                           </div>
                        </div>
                     </div>
                     <!-- product-container -->
                  </div>
                @endforeach
            @endif
 
            <!-- //grid search results-->
         </div>
         <div class="pagination">
            @if($posts->currentPage()!=1)
                <span>
                    <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">
                        <-
                    </a>
                </span>
                @endif
                @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                <span class="{{($posts->currentPage()==$i)? 'page current' : 'page'}}">
                    <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
                </span>
                @endfor
                @if($posts->currentPage()!=$posts->lastPage())
                <span>
                    <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">
                        ->
                    </a>
                </span>
             @endif
         </div>
      </div>
   </div>
</main>



@stop

       