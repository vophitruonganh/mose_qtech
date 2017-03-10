@extends('frontend.giaodien12.layouts.default')
@section('content')

<div class="header-breadcrumb">
   <div class="container">
      <div class="row ">
         <div class="col-xs-12">
            <ol class="breadcrumb">
               <li><a href="/" title="Trang chủ">Trang chủ</a>
               </li>
               <!-- blog -->
               <li class="active breadcrumb-title">a - Sport</li>
               <style>
                  .breadcrumb-title {
                  text-transform: capitalize;
                  }
               </style>
               <!-- list_collections -->
               <!-- current_tags -->
            </ol>
         </div>
      </div>
   </div>
</div>  


<section class="mtb25">
<div class="container">
<div class="row">
           <!--dong o left-->
           
<div class="megamenu-right col-md-9 col-md-push-3">
   <div class="row">
      <div class="col-xs-12 search_padding">
         <p style="padding: 15px 0px 0px 0px;font-size: 14px;color: #666;">
            Có 50 kết quả tìm kiếm với từ khóa <span class="keysearch">"{{$query}}"</span>:
         </p>
      </div>
      <div class="col-xs-12 search_padding">
         <form action="{{url('collections')}}" method="get">
            <div class="input-group search_form_action">
               <input type="text" class="form-control" maxlength="70" name="search" id="search" value="{{$query}}" placeholder="Nhập từ khóa tìm kiếm...">
               <span class="input-group-btn">
               <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
               </span>
            </div>
            <!-- /input-group -->
         </form>
      </div>
      <div class="col-xs-12">
         <div class="filter-right">
            <div class="pull-left">
               <div class="product-filter filter-item">
                  <div class="options">
                     <div class="button-group display" data-toggle="buttons-radio"><button class="active" id="grid" rel="tooltip" title="Dạng Lưới" onclick="display('grid');loadisotope();"><i class="fa fa-th-large"></i></button> <button id="list" rel="tooltip" title="Dạng Danh sách" onclick="display('list');"><i class="fa fa-th-list"></i></button></div>
                  </div>
               </div>
            </div>
            <div class="collection-pagination pull-right pagination-wrapper">
               <span class="mr20">Pages:</span>
               <ul class="pagination">
                  @if($posts->currentPage()!=1)
                    <li>
                        <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">
                            Trang trước
                        </a>
                    </li>
                    @endif
                    @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                        @if($posts->currentPage()==$i)
                            <li class="active"><span>{{$i}}</span></li>
                        @else
                            <li><a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a></li>
                        @endif
                    <!-- <li class="current"><a href="#" style="pointer-events:none">1</a></li>
                    <li><a href="/collections/all?page=2">2</a></li> -->
                    @endfor
                    <!-- <li><a href="/collections/all?page=3">3</a></li>
                    <li><a href="/collections/all?page=4">4</a></li> -->
                    @if($posts->currentPage()!=$posts->lastPage())
                    <li>
                        <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">
                            Trang sau
                        </a>
                    </li>
                    @endif
                  
               </ul>
            </div>
         </div>
      </div>
      <!-- End. Filter 1-->
      <section class="section-products">
         <!-- End .section-title -->

         <div class="product-list-show" style="display: none">
            @if(count($posts)>0)
                @foreach($posts as $post)
                    <div class="product_item col-xs-12">
                       <form action="{{url('cart/order/'.$post['post_slug'])}}" class="product_item_form" method="post">
                          <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                          <div class="big-row-eq-height row row-eq-height">
                             <div class="col-sm-3 col-md-3">
                                <a class="product-img" href="{{url('collections/'.$post['post_slug'])}}"><img src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}"></a>
                             </div>
                             <div class="col-sm-9 col-md-9 righcontent">
                                <div class="col-sm-7 col-md-7">
                                   <h5 class="product-name"><a href="{{url('collections/'.$post['post_slug'])}}">{{$post['post_title']}}</a></h5>
                                   <div class="description"> {{$post['post_excerpt']}}</div>
                                </div>
                                <div class="col-sm-5 col-md-5">
                                   <span class="product-price">
                                   <b class="productminprice">{{number_format($post['price_new'],0,'.','.')}}₫</b>
                                   </span>
                                   <div style="display:none">
                                      <input type="hidden" name="variantId" value="1896489">
                                   </div>
                                   <!--số lượng-->
                                   <div style="display:none">
                                      <div class="input-group quantity">
                                         <input type="text" class="form-control" name="quantity" id="quantity_wanted" size="2" value="1">
                                      </div>
                                   </div>
                                   <div class="product-action-btn-list">
                                      <button class="product-action btn-red addtocart add-to-cart btn btn-default btn-lg" type="submit" id="button-cart">Mua hàng</button>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <!-- End . -->
                       </form>
                    </div>
                @endforeach
            @endif
        
         </div>

         <div class="product-grid-show">
            @if(count($posts)>0)
                @foreach($posts as $post)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                       <div class="product_item">
                          <form action="{{url('cart/order/'.$post['post_slug'])}}" class="product_item_form" method="post">
                            <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                             <div class="product-gird">
                                <a class="product-img" href="{{url('collections/'.$post['post_slug'])}}" title="{{$post['post_title']}}"><img src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}"></a>
                                <h3 class="product-name"><a href="{{url('collections/'.$post['post_slug'])}}" title="{{$post['post_title']}}">{{$post['post_title']}}</a></h3>
                                <span class="product-price">
                                <b class="productminprice">{{number_format($post['price_new'],0,'.','.')}}₫</b>
                                </span>
                                <div style="display:none">
                                   <input type="hidden" name="variantId" value="1896491">  
                                </div>
                                <!--số lượng-->
                                <div style="display:none">
                                   <div class="input-group quantity">
                                      <input type="text" class="form-control" name="quantity" id="quantity_wanted" size="2" value="1">
                                   </div>
                                </div>
                                <div class="product-action-btn">
                                   <button class="product-action btn-red addtocart add-to-cart btn btn-default btn-lg" type="submit" id="button-cart">Mua hàng</button>
                                </div>
                             </div>
                             <!-- End .product-gird -->
                          </form>
                       </div>
                    </div>
                @endforeach
            @endif
         </div>

      </section>
      <div class="col-xs-12">
         <div class="filter-right">
            <div class="collection-pagination pull-right pagination-wrapper">
               <span class="mr20">Pages:</span>
               <ul class="pagination">
                  @if($posts->currentPage()!=1)
                    <li>
                        <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">
                            Trang trước
                        </a>
                    </li>
                    @endif
                    @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                        @if($posts->currentPage()==$i)
                            <li class="active"><span>{{$i}}</span></li>
                        @else
                            <li><a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a></li>
                        @endif
                    <!-- <li class="current"><a href="#" style="pointer-events:none">1</a></li>
                    <li><a href="/collections/all?page=2">2</a></li> -->
                    @endfor
                    <!-- <li><a href="/collections/all?page=3">3</a></li>
                    <li><a href="/collections/all?page=4">4</a></li> -->
                    @if($posts->currentPage()!=$posts->lastPage())
                    <li>
                        <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">
                            Trang sau
                        </a>
                    </li>
                    @endif
               </ul>
            </div>
         </div>
      </div>
      <!-- End. Filter 2-->
   </div>
</div>      
           
<script type="text/javascript">
function display(view) {
    if (view == 'grid') {
        $('.product-grid-show').show();
        $('.product-list-show').hide();
        $('.display').html('<button class="active" id="grid" rel="tooltip" title="Dạng Lưới" onclick="display(\'grid\');loadisotope();"><i class="fa fa-th-large"></i></button> <button id="list" rel="tooltip" title="Dạng Danh sách" onclick="display(\'list\');"><i class="fa fa-th-list"></i></button>');
        localStorage.setItem('display', 'grid');
    } else {
        $('.product-grid-show').hide();
        $('.product-list-show').show();
        $('.display').html('<button id="grid" rel="tooltip" title="Dạng Lưới" onclick="display(\'grid\');loadisotope();"><i class="fa fa-th-large"></i></button> <button class="active" id="list" rel="tooltip" title="Dạng Danh sách" onclick="display(\'list\');"><i class="fa fa-th-list"></i></button>');
        localStorage.setItem('display', 'list');
    }
}
if (localStorage.getItem('display') == 'list') {
    display('list');
} else {
    display('grid');
}
</script>
<!-- Left -->
<div class="megamenu-left col-md-3 col-md-pull-9">
    <div class="cd-dropdown-wrapper">
        <!-- Danh mục sản phẩm -->
        <!-- Widget 111111 -->
        {!!showWidget('widget111111')!!}
        <!-- End Widget 111111 -->
        <!-- .cd-dropdown -->
    </div>
    <!-- .cd-dropdown-wrapper -->

    <!-- Nhà sản xuất -->
    <!-- Widget 222222 -->
    {!!showWidget('widget222222')!!}
    <!-- End Widget 222222 -->
    
    <!-- Sản phẩm nổi bật -->
    <!-- Widget 333333 -->
    {!!showWidget('widget333333')!!}
    <!-- End Widget 333333 -->
    
    <!-- Video -->
    <!-- Widget 666666 -->
    {!!showWidget('widget666666')!!}
    <!-- End Widget 666666 -->
</div>
</div>
</div>
</section>
<!--dong right-->
<!-- End Left -->


@stop
