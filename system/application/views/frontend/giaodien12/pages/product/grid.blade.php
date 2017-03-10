@extends('frontend.giaodien12.layouts.default')
@section('content')

<section class="mtb25">
<div class="container">
<div class="row">
           <!--dong o left-->
<div class="megamenu-right col-md-9 col-md-push-3">
   <div class="row">
      
      <div class="section-collection-title">
         <h1 class="section-collection-title-heading">Tất cả sản phẩm</h1>
      </div>
      <div class="col-xs-12">
         <div class="filter-right">
            <div class="pull-left">
               <div class="product-filter filter-item">
                  <div class="options">
                     <div class="button-group display" data-toggle="buttons-radio"><button class="active" id="grid" rel="tooltip" title="Dạng Lưới" onclick="display('grid');loadisotope();"><i class="fa fa-th-large"></i></button> <button id="list" rel="tooltip" title="Dạng Danh sách" onclick="display('list');"><i class="fa fa-th-list"></i></button></div>
                  </div>
               </div>
               <div class="filter-item">
               <form id="filter_product" class="filter-xs" method="GET">
                  <span>Lọc theo:</span>
                      <select id="sortBy" name= "sortBy" class="sort sort-by selectpicker bs-select-hidden">
                        <option selected="" value="default">Mặc định</option>
                        <option value="price-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''}}>Giá tăng dần</option>
                        <option value="price-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''}}>Giá giảm dần</option>
                        <option value="alpha-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''}}>Từ A-Z</option>
                        <option value="alpha-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''}}>Từ Z-A</option>
                        <option value="created-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''}}>Mới đến cũ</option>
                        <option value="created-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''}}>Cũ đến mới</option>
                     </select>
                  </form>
               </div>
          
            </div>
         </div>
      </div>
      <!-- End. Filter 1-->
      <section class="section-products">
         <!-- End .section-title -->

         <!-- group list -->
         <div class="product-list-show" style="display: none">
            @if(count($posts)!=0)
                @foreach( $posts as $post )
                   <div class="product_item col-xs-12">
                     <form action="{{url('cart/order/'.$post['post_slug'])}}" id="form_order_{{$post['post_id']}}"class="product_item_form" method="post">
                        <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @if( $post['percent_discount']>0 )
                        <div class="sale_tag">-{{$post['percent_discount']}}%</div>
                        @endif
                        <div class="big-row-eq-height row row-eq-height">
                           <div class="col-sm-3 col-md-3">
                              <a class="product-img" href="{{url('collections/'.$post['post_slug'])}}"><img src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}"></a>
                           </div>
                           <div class="col-sm-9 col-md-9 righcontent">
                              <div class="col-sm-7 col-md-7">
                                 <h3 class="product-name"><a href="{{url('collections/'.$post['post_slug'])}}">{{$post['post_title']}}</a></h3>
                                 <div class="description">{{$post['post_excerpt']}}</div>
                              </div>
                              <div class="col-sm-5 col-md-5">
                                 <span class="product-price">
                                 @if($post['price_old']>0)
                                 <del>{{number_format($post['price_old'],0,'.','.')}}₫</del>
                                 @endif
                                 <b class="productminprice">{{number_format($post['price_new'],0,'.','.')}}₫</b>
                                 </span>
                                 <div style="display:none">
                                    <select id="product-selectors" name="variantId" style="display:none">
                                       <option lỗi="" liquid:="" unknown="" operator="" roduct="" value="1816640">36 - 1.300.000₫</option>
                                       <option lỗi="" liquid:="" unknown="" operator="" roduct="" value="1816641">37 - 1.300.000₫</option>
                                       <option lỗi="" liquid:="" unknown="" operator="" roduct="" value="1816642">38 - 1.300.000₫</option>
                                    </select>
                                 </div>
                                 <!--số lượng-->
                                 <div style="display:none">
                                    <div class="input-group quantity">
                                       <input type="text" class="form-control" name="quantity" id="quantity_wanted" size="2" value="1">
                                    </div>
                                 </div>
                                 <div class="product-action-btn-list">
                                    <a class="btn btn-default btn-lg addtocart" onclick="order({{$post['post_id']}})" >Mua ngay</a>
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
         <!-- endgroup1 -->
         <!-- group grid -->
         <div class="product-grid-show">
            @if(count($posts)!=0)
                @foreach( $posts as $post )
                  <div class="col-xs-12 col-sm-6 col-md-4">
                     <div class="product_item">
                        <form action="{{url('cart/order/'.$post['post_slug'])}}" id="form_order_{{$post['post_id']}}"class="product_item_form" method="post">
                           <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                           @if( $post['percent_discount']>0 )
                           <div class="sale_tag">- {{$post['percent_discount']}}%</div>
                           @endif
                           <div class="product-gird">
                              <a class="product-img" href="{{url('collections/'.$post['post_slug'])}}" title="{{$post['post_title']}}"><img src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}"></a>
                              <h3 class="product-name"><a href="{{url('collections/'.$post['post_slug'])}}" title="{{$post['post_title']}}">{{$post['post_title']}}</a></h3>
                              <span class="product-price">
                              @if( $post['price_old']>0 )
                                 <del>{{number_format($post['price_old'],0,'.','.')}}₫</del>
                              @endif
                              <b class="productminprice">{{number_format($post['price_new'],0,'.','.')}}₫</b>
                              </span>
                              <div style="display:none">
                                 <select id="product-selectors" name="variantId" style="display:none">
                                    <option lỗi="" liquid:="" unknown="" operator="" roduct="" value="1816640">36 - 1.300.000₫</option>
                                    <option lỗi="" liquid:="" unknown="" operator="" roduct="" value="1816641">37 - 1.300.000₫</option>
                                    <option lỗi="" liquid:="" unknown="" operator="" roduct="" value="1816642">38 - 1.300.000₫</option>
                                 </select>
                              </div>
                              <!--số lượng-->
                              <div style="display:none">
                                 <div class="input-group quantity">
                                    <input type="text" class="form-control" name="quantity" id="quantity_wanted" size="2" value="1">
                                 </div>
                              </div>
                              <div class="product-action-btn">
                                 <a class="btn btn-default btn-lg addtocart" onclick="order({{$post['post_id']}})" >Mua ngay</a>
                              </div>
                           </div>
                           <!-- End .product-gird -->
                        </form>
                     </div>
                  </div>
                @endforeach
            @endif
         </div>
      <!-- endgroup grid -->
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

<!-- left -->

<div class="megamenu-left col-md-3 col-md-pull-9">
    <div class="cd-dropdown-wrapper">
       <!-- Widget 111111 -->
        {!!showWidget('widget111111')!!}
        <!-- End Widget 111111 -->

    </div>
    <!-- .cd-dropdown-wrapper -->
    
       <!-- Widget 222222 -->
         {!!showWidget('widget222222')!!}
       <!-- End Widget 222222 -->

       <!-- Widget 333333 -->
         {!!showWidget('widget333333')!!}
       <!-- End Widget 333333 -->
   
    <!-- Widget 666666 -->
    {!!showWidget('widget666666')!!}
    <!-- End Widget 666666 -->
 </div>
<!--dong right-->
<!-- End Left -->


</div>
</div>
 </section>  

<!-- endleft -->
<script type="text/javascript">
  function order(i)
    {
         $("#form_order_"+i).submit();   
    }

   $("#sortBy").change(function(){
           $("#filter_product").submit();
    });
</script>
@stop