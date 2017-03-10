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
            <span>Danh sách sản phẩm</span>
         </div>
         <h3 class="page_name">Tất cả sẩn phẩm</h3>
      </div>
   </nav>
   <!-- /templates/collection.liquid -->
   <div class="grid--rev">
      <div class="grid__item large--three-quarters collection-grid">
         <header class="collection__info section-header">
            <div class="rte rte--header space-10">
            </div>
         </header>
         <div class="collection__sort section-header">
            <div class="section-header__right">
               <!-- /snippets/collection-sorting.liquid -->
               <div class="form-horizontal">
                  <label for="SortBy">Sắp xếp bởi</label>
                  <?php $view = isset($_GET['view'])? $_GET['view']: 'grid' ?>
                  <form id="filter_product" class="filter-xs"  method="POST">
                     <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <select name="sortBy" id="sortBy">
                        <option value="default">Mặc định</option>
                        <option value="alpha-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''}}>Theo thứ tự, A-Z</option>
                        <option value="alpha-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''}}>Theo thứ tự, Z-A</option>
                        <option value="price-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''}}>Giá, từ thấp đến cao</option>
                        <option value="price-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''}}>Giá, Từ cao đến thấp</option>
                        <option value="created-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''}}>Ngày, mới đến cũ</option>
                        <option value="created-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''}}>Ngày, cũ đến mới</option>
                     </select>
                  </form>
               </div>
               <div class="collection-view left">
                  <button type="button" title="Lưới xem" class="change-view change-view--active" data-view="grid">
                  <span class="icon-fallback-text">
                  <span class="icon icon-grid-view" aria-hidden="true"></span>
                  <span class="fallback-text">Lưới xem</span>
                  </span>
                  </button>
                  <button type="button" title="Danh sách xem" class="change-view" data-view="list">
                  <span class="icon-fallback-text">
                  <span class="icon icon-list-view" aria-hidden="true"></span>
                  <span class="fallback-text">Danh sách xem</span>
                  </span>
                  </button>
               </div>
            </div>
         </div>
         <div class="grid-uniform">
            @if(count($posts)!=0)
                @foreach( $posts as $post )
                  <!-- /snippets/product-grid-item.liquid -->
                     <div class="grid__item  large--one-third medium--one-third ">
                        <div class="product-container" data-publish-date="">
                           <div class="product-image ">
                              <div class="product-thumbnail">
                                 <a href="{{url('collections/'.$post['post_slug'])}}" title="">
                                 <img class="product-featured-image" src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}">
                                 <img class="back-img" src="//hstatic.net/033/1000104033/1/2016/8-2/product_66_grande.jpg" alt="">
                                 </a>
                              </div>
                              <!-- /.product-thumbnail -->
                               @if( $post['percent_discount']>0 )
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
         </div>
         <div class="pagination">
            <!--<span class="prev"><a href="/collections/all?page=1" title="">←</a></span>-->
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
       
       
      <div class="sidebar grid__item large--one-quarter">
         <div class="collection-sidebar">
           <!-- /snippets/collection-sidebar.liquid -->
               <!-- Widget cccccccc -->
                  {!!showWidget('widgetcccccccc')!!}
               <!-- End Widget cccccccc -->
            
            <!-- end category sidebar -->
            <!-- Widget dddddddd -->
                  {!!showWidget('widgetdddddddd')!!}
               <!-- End Widget dddddddd -->
            <!-- end widget 1 -->

         </div>
         <em>
         </em>
      </div>
      <em>
      </em>
   </div>
   <em>
   </em>
</main>




<script type="text/javascript">

    $("#sortBy").change(function(){
           $("#filter_product").submit();
    });
</script>



@stop

       