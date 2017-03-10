@extends('frontend.giaodien17.layouts.default')
@section('content')

<div class="fvc" style="float:left;width:100%;">
   <div class="banner_page_list">
      <h1>Tất cả sản phẩm</h1>
   </div>
   <div class="breadcrumbs">
      <div class="container">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ &nbsp;</a></li>
            <li><strong>Tất cả sản phẩm</strong></li>
         </ul>
      </div>
   </div>
   <div class="tzcategory-shop-wrap">
      <div class="container">
         <div class="row">
            
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 tzshop-aside">
                  <!-- Widget ddddddddd -->
                     {!!showWidget('widgetddddddddd')!!}
                  <!-- End Widget ddddddddd -->   
               
                  <!-- Widget eeeeeeeee -->
                     {!!showWidget('widgeteeeeeeeee')!!}
                  <!-- End Widget eeeeeeeee -->
              
               <div class="banner_collection visible-lg visible-md">
                  <a href=""><img src="//bizweb.dktcdn.net/100/069/071/themes/139176/assets/banner.jpg?1472090442121" alt="Mendover Theme"></a>
               </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
               <div class="all-product-area">
                  <div class="row">
                     <div class="col-lg-12 col-md-12">
                        <div class="box_tool">
                           <div class="result-short pull-left">
                              <p class="result-count"> Sắp xếp : </p>
                              <form class="filter-xs" method="POST" id="filter_product">
                                 <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                 <div class="orderby-wrapper">
                                    <select name="sortBy" id="sortBy" class="selectBox" style="padding: 0px 10px; height: 30px;">
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
                           <div class="view-mode"> 
                              <a href="{{url('collections?view=grid')}}" class="active">
                              <i class="fa fa-th"></i>
                              </a> 
                              <a href="{{url('collections?view=list')}}" class="switch-view" >
                              <i class="fa fa-bars"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row multi-columns-row">
                   @if(count($posts)!=0)
                     @foreach( $posts as $post )
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                           <div class=" laster-shop-item row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 stl_full_width">
                                 <div class="laster-thumb row" >
                                 @if($post['percent_discount']>0)   
                                    <div class="shop-icon-data">                                
                                       <span class="hv_price">
                                       -7%
                                       </span>
                                    </div>
                                 @endif
                                    <a href="{{url('collections/'.$post['post_slug'])}}"><img src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}"></a>
                                    <form action="{{url('cart/order/'.$post['post_slug'])}}" method="post" class="variants" id="form_order_{{$post['post_id']}}" enctype="multipart/form-data">
                                       <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                       <input type="hidden" name="quantity" value="1" />
                                       <span class="tz-shop-meta">
                                       <a onclick="order({{$post['post_id']}})" class="tzshopping add_to_cart add-cart" title="Mua ngay">
                                       Mua ngay
                                       </a>
                                       <a href="{{url('collections/'.$post['post_slug'])}}" class="tzheart">
                                       Chi tiết
                                       </a>
                                       </span>
                                    </form>
                                 </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 stl_full_width">
                                 <div class="row">
                                    <div class="left_cnt_product">
                                       <h3><a href="{{url('collections/'.$post['post_slug'])}}">{{$post['post_title']}}</a></h3>
                                       <div class="desc_product">
                                          <p>{{$post['post_excerpt']}}</p>
                                       </div>
                                    </div>
                                    <div class="right_cnt_product">
                                       <small>
                                       {{number_format($post['price_new'],0,'.','.')}}₫
                                      @if($post['price_old']>0) 
                                       <em>{{number_format($post['price_old'],0,'.','.')}}₫</em>
                                      @endif
                                       </small>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endforeach
                   @endif
               </div>
               
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
      </div>
   </div>
</div>
<script type="text/javascript">
       $("#sortBy").change(function(){
           $("#filter_product").submit();
      });

      function order(i)
      {
        $("#form_order_"+i).submit();   
      }
</script>
@stop