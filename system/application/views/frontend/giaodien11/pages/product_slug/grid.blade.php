@extends('frontend.giaodien11.layouts.default')
@section('content')

      
<div class="breadcrumbs">
<div class="container">
  <div class="row">
     <ul>
        <li class="home"> <a href="{{url('/')}}" title="Trang chủ">Trang chủ</a><span>|</span></li>
        <li><strong>{{$title_name}}</strong></li>
     </ul>
  </div>
</div>
</div> 
     

<div class="main-container col2-left-layout">
   <div class="main container">
      <div class="row">
      
        
            <section class="col-main col-sm-9 col-sm-push-3">
            <div class="category-description std">
               <div class="slider-items-products">
                  <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                     <div class="slider-items slider-width-col1" style="opacity: 0;"> 
                     </div>
                  </div>
               </div>
            </div>
            <div class="category-title">
               <h1>{{$title_name}}</h1>
            </div>
            <div class="category-products">
               <div class="toolbar">
                  <div class="sorter">
                     <div class="view-mode"> 
                        <span title="Grid" class="button-active"><i class="fa fa-th"></i></span>
                        <a href="{{url('collections/'.$slug.'/?view=list')}}" title="List" class=""><i class="fa fa-list"></i></a> 
                     </div>
                  </div>
                  <form id="filter_product" method="get">
                     
                     <div id="sort-by">
                        <label class="left" style="padding: 10px 0 2px 0px;">Sắp xếp theo: </label>
                        <select name="sortBy" id="sortBy" class="selectBox" style="padding: 0px 10px; height: 34px;">
                           <option selected="" value="default">Mặc định</option>
                           <option value="alpha-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''}}>A → Z</option>
                           <option value="alpha-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''}}>Z → A</option>
                           <option value="price-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''}}>Giá tăng dần</option>
                           <option value="price-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''}}>Giá giảm dần</option>
                           <option value="created-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''}}>Hàng mới nhất</option>
                           <option value="created-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''}}>Hàng cũ nhất</option>
                        </select>
                        
                     </div>
                  </form>
               </div>
               <ul class="products-grid hidden_btn_cart multi-columns-row">
                  @if(count($products)>0)
                     @foreach($products as $product)
                        <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 first-in-row">
                     <div class="col-item">
                     @if($product['check_discount']>0)
                         <div class="sale-label sale-top-right">-{{$product['percentage']}}%</div>
                     @endif
                      
                        <div class="product-image-area"> 
                           <a class="product-image" title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}"> 
                           <img src="{{get_image_url($product['product_image_id'])}}" class="img-responsive" alt="{{$product['product_title']}}"> 
                           </a>
                        </div>
                        <div class="hidden_mobile  hidden-sm hidden-xs">
                           <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                              <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <input type="hidden" name="quantity" value="1" />
                              <div class="hover_fly">
                                 <a class="exclusive ajax_add_to_cart_button" onclick="order({{$product['product_id']}})" title=" Chọn sản phẩm">
                                    <div><i class="icon-shopping-cart"></i><span> Chọn sản phẩm </span></div>
                                 </a>
                              </div>
                              <a href="{{url('collections/'.$product['product_slug'])}}" class="over_bg"></a>
                           </form>
                        </div>
                        <div class="info">
                           <div class="info-inner">
                              <div class="item-title">
                                 <h3><a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">{{$product['product_title']}}</a></h3>
                              </div>
                              <!--item-title-->
                              <div class="item-content">
                                 <div class="price-box">
                                    <p class="special-price"> 
                                       <span class="price">{{number_format($product['price_new'],0,'.','.')}}₫</span> 
                                    </p>
                                    @if($product['price_old']>0)
                                       <p class="old-price"> 
                                          <span class="price-sep">-</span> 
                                          <span class="price">{{number_format($product['price_old'],0,'.','.')}}₫</span> 
                                       </p>
                                    @endif
                                 </div>
                              </div>
                              <div class="button_mobile hidden-lg hidden-md">
                                 <form action="{{ url('cart/order/'.$product['product_slug']) }}" method="post" class="variants" id="form_order_{{$product['product_id']}}" enctype="multipart/form-data">
                                    <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="quantity" value="1" />
                                    <div class="actions">
                                       <button onclick="order($product['product_id'])" class="button btn-cart" title="Chọn sản phẩm " type="button"><span>Chọn sản phẩm </span></button>
                                    </div>
                                 </form>
                              </div>
                              <!--item-content--> 
                           </div>
                           <!--info-inner-->
                           <div class="clearfix"> </div>
                        </div>
                     </div>
                  </li>
                     @endforeach
                  @endif
               
               </ul>
                <div class="clearfix"></div>
                <div class="pull-right">
                  {{ $products->links() }}
                </div>
               <?php
               /*
               <div class="pager">
                  <div class="pages">
                     <ul class="pagination">
                        @if($products->currentPage()!=1)
                            <li>
                                <a href="{{str_replace('/?','?',$products->url($products->currentPage()-1))}}">
                                    Trang trước
                                </a>
                            </li>
                            @endif
                            @for($i=1;$i<=$products->lastPage();$i=$i+1)
                            <li class="{{($products->currentPage()==$i)? 'active' : ''}}">
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
<!--                         <li><a href="/collections/all?page=1" title="1">«</a></li>-->
                        
                     </ul>
                  </div>
               </div>
                */
               ?>
            </div>
         </section>


   <!-- Left -->
         <div class="col-left sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12 col-md-pull-9 col-lg-pull-9">
            <?php $list_cat = get_taxonomy_product('product_category') ?>
            @if($list_cat)
            <div class="box_collection_pr">
               <div class="title_st">
                  <h2>Danh mục sản phẩm</h2>
                  <span class="arrow_title visible-md visible-md"></span>
                  <div class="show_nav_bar hidden-lg hidden-md"></div>
               </div>
               <div class="list_item">
                  <ul>
                    @foreach($list_cat as $cat)
                    <li> <a href="{{url('collections/'.$cat->taxonomy_slug)}}">{{$cat->taxonomy_name}}</a> </li>
                    @endforeach
                  </ul>
               </div>
            </div>
            @endif

            <?php $products = get_product_tax_limit($product_type_3,$product_slug_3,'5'); ?>
            @if($products)
            <div class="popular-posts widget widget__sidebar stl_list_item">
               <div class="title_st">
                  <?php
                     $headingText = get_taxonomy_name($product_type_3,$product_slug_3);
                     if( $headingText == '' ) $headingText = 'Sản Phẩm Mới';
                  ?>
                  <h2>{{ $headingText }}</h2>
                  <span class="arrow_title"></span>
               </div>
               <div class="widget-content">
                  <ul class="posts-list unstyled clearfix">
                     @foreach($products as $product)
                     <li>
                        <figure class="featured-thumb" style="width:42%">
                           <a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">
                           <img alt="{{$product['product_title']}}"  src="{{get_image_url($product['product_image_id'])}}" style=" width: 100px;">
                           </a> 
                        </figure>
                        <!--featured-thumb-->
                        <h3><a title="{{$product['product_title']}}" href="{{url('collections/'.$product['product_slug'])}}">{{$product['product_title']}}</a></h3>
                        <div class="price-box">
                           <p class="special-price"> 
                              <span class="price">{{ number_format($product['price_new'],0,'.','.') }}₫</span> 
                           </p>
                           @if($product['price_old'])
                           <p class="old-price"> 
                              <span class="price-sep">-</span> 
                              <span class="price">{{ number_format($product['price_old'],0,'.','.') }}₫</span> 
                           </p>
                           @endif
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
               <!--widget-content--> 
            </div>
            @endif


         </div>

          <!-- end left -->
      </div>
   </div>
</div>
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