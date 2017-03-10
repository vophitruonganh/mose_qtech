@extends('frontend.giaodien17.layouts.default')
@section('content')
<div class="fvc" style="float:left;width:100%;">
   <div class="banner_page_list">
      <h1>{{$title_name}}</h1>
   </div>
   <div class="breadcrumbs">
      <div class="container">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ &nbsp;</a></li>
            <li><strong>{{$title_name}}</strong></li>
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
                  <!-- ALL-PRODUCT-TOP-ROW START-->
                  <div class="row">
                     <div class="col-lg-12 col-md-12">
                        <div class="box_tool">
                           <!-- TOOLBAR START-->
                           <!-- <div class="result-short pull-left">
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
                           </div> -->
                           <div class="view-mode">
                              <a href="{{url('collections/'.$slug.'?view=grid')}}" class="switch-view" >
                              <i class="fa fa-th"></i>
                              </a>
                              <a href="{{url('collections/'.$slug.'?view=list')}}" class="active">
                              <i class="fa fa-bars"></i>
                              </a> 
                           </div>
                        </div>
                     </div>
                     <!-- TOOLBAR END-->
                  </div>
               </div>
               <div class=" multi-columns-row list_page_product ">
               @if(count($posts)!=0)
                     @foreach( $posts as $post )
                        <div class="row stl_box_list">
                           <div class="laster-shop-item row">
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stl_full_width no_pad">
                                 <div class="laster-thumb ">
                                    <div class="shop-icon-data">
                                    </div>
                                    <a href="{{url('collections/'.$post['post_slug'])}}"><img src="{{ loadFeatureImage($post['post_featured_image']) }}" alt="{{$post['post_title']}}"></a>
                                 </div>
                              </div>
                              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 stl_full_width no_pad">
                                 <div class="">
                                    <h3><a href="{{url('collections/'.$post['post_slug'])}}">{{$post['post_title']}}</a></h3>
                                    <small>{{number_format($post['price_new'],0,'.','.')}}₫</small>
                                    <div class="list_stl_hide">
                                       <div class="desc_product">
                                          <p style="text-align: justify;">{{$post['post_excerpt']}}</p>
                                       </div>
                                       <div class="action-button-hiden">
                                          <form action="{{url('cart/order/'.$post['post_slug'])}}" method="post" class="variants" id="form_order_{{$post['post_id']}}" enctype="multipart/form-data">
                                             <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                             <input type="hidden" name="quantity" value="1" />
                                             <div class="add-to-wishlist">
                                                <a class="color-tooltip" onclick="order({{$post['post_id']}})" title="Mua ngay">Mua ngay</a>
                                             </div>
                                             <div class="quickviewbtn">
                                                <a class="color-tooltip" data-toggle="tooltip" href="{{url('collections/'.$post['post_slug'])}}" title="Xem chi tiết">Chi tiết</a>
                                             </div>
                                          </form>
                                       </div>
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
   <!--end class tzblog-wrap-->
   
   
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