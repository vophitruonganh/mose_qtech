@extends('frontend.giaodien5.layouts.default')
@section('content')

<div id="collection" class="mt60">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-3">
            <?php $list_tax = get_taxonomy_product('product_category') ?>
            @if($list_tax)
            <div class="widget category">
               <h4 class="title">
                  Danh mục sản phẩm
               </h4>
               <ul class="list">
                  @foreach( $list_tax as $tax)
                  <li><a href="{{url('collections/'.$tax->taxonomy_slug)}}"><i class="fa fa-angle-right"></i>{{$tax->taxonomy_name}}</a></li>
                  @endforeach
               </ul>
            </div>
            @endif

            <?php $list_tax = get_taxonomy_product( 'product_group') ?>
            @if($list_tax)
            <div class="widget category">
               <h4 class="title">
                  Nhóm sản phẩm
               </h4>
               <ul class="list">
                  @foreach( $list_tax as $tax)
                  <li><a href="{{url('collections/'.$tax->taxonomy_slug)}}"><i class="fa fa-angle-right"></i>{{$tax->taxonomy_name}}</a></li>
                  @endforeach
               </ul>
            </div>
            @endif
         </div>

         <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
               <h1 class="pull-left">
                  {{$title_name}}
               </h1>

               <div class="browse-tags pull-right">
               <form id="filter_product" class="filter-xs" method="get">
                  <span class="hidden-xs">Sắp xếp theo:</span>
                  <select class="sort-by" name="sortBy" id="sortBy">
                      <option value="created-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''}}>Mới nhất</option>
                      <option value="created-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''}}>Cũ nhất</option>
                      <option value="price-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''}}>Giá: Tăng dần</option>
                      <option value="price-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''}}>Giá: Giảm dần</option>
                      <option value="alpha-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''}}>Tên: A-Z</option>
                      <option value="alpha-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''}}>Tên: Z-A</option>
                  </select>
                  </form>
               </div>
             </div>
            <div class="product-list">
               <div class="row content-product-list">
			    @if(count($products)>0)
			    	@foreach($products as $product)
			    		<div class="col-xs-12 col-sm-6 col-md-4">
		                     <div class="product-loop">
                            <!-- Add code html -->
                            <div class="product-thumbnail-preview">
                              <div class="product-thumbnail">
                                <div class="centered">
                                  <a href="{{url('collections/'.$product['product_slug'])}}">
                                    <img src="{{ get_image_url($product['product_image_id']) }}" alt="{{ $product['product_title'] }}">
                                  </a>
                                </div>
                              </div>
                            </div>
                            <!-- End -->

                            <!--
		                        <a href="{{ url('collections/'.$product['product_slug']) }}">
		                        <img src="{{ get_image_url($product['product_image_id'])}}" alt="{{$product['product_title']}}">
		                        </a>
                            -->

		                        <div class="product-info clearfix">
		                           <h3><a href="{{ url('collections/'.$product['product_slug']) }}">{{$product['product_title']}}</a></h3>
		                           <p class="price ">
		                              <span class="new-price">{{number_format($product['price_new'],0,'.','.')}}₫</span>
		                           </p>
		                           <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post">
		                              <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
		                              <input type="hidden" name="id" value="1007674664">
		                              <input id="quantity" type="hidden" name="quantity" value="1" class="tc item-quantity">
		                              <button type="submit" class="add-to-cart btn-fix" name="add">Giỏ Hàng</button>
		                           </form>
		                        </div>
		                     </div>
		                </div>
			    	@endforeach
			    @endif
               </div>
            </div>
            <div class="paginations">
              {{ $products->links() }}
            </div>
            <?php
            /*
                <div class="paginations">
                        <ul>
                            @if($products->currentPage()!=1)
                            <li>
                                <a href="{{str_replace('/?','?',$products->url($products->currentPage()-1))}}">
                                    Trang trước
                                </a>
                            </li>
                            @endif
                            @for($i=1;$i<=$products->lastPage();$i=$i+1)
                            <li class="{{($products->currentPage()==$i)? 'current' : ''}}">
                                <a href="{{str_replace('/?','?',$products->url($i))}}">{{$i}}</a>
                            </li>
                            <!-- <li class="current"><a href="#" style="pointer-events:none">1</a></li>
                            <li><a href="/collections/all?page=2">2</a></li> -->
                            @endfor
                            <!-- <li><a href="/collections/all?page=3">3</a></li>
                            <li><a href="/collections/all?page=4">4</a></li> -->
                            @if($products->currentPage()!=$products->lastPage())
                            <li>
                                <a class="next-arrow" href="{{str_replace('/?','?',$products->url($products->currentPage()+1))}}" title="2">
                                    Trang sau
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
            */
            ?>
                </div>
             </div>
             
       
          
        
          
          
      </div>
   </div>
   <!-- End no products -->
</div>   
  <script type="text/javascript">
    $("#sortBy").change(function(){
           $("#filter_product").submit();
    });
</script>

   
@stop