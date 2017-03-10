@extends('frontend.giaodien18.layouts.default')
@section('content')

<div class="breadcrumb">
   <div class="container">
      <ul>
         <li><a href="/" target="_self">Trang chủ</a></li>
<!--          <li><a href="/collections" target="_self">Danh mục</a></li> -->
         <li class="active"><span>Tất cả sản phẩm</span></li>
      </ul>
   </div>
</div>

<section id="wrap-collection">
   <div class="container">
      <div class="col-md-3 col-sm-4 col-xs-12 side-collection-left">
         <!-- Widget 444444444 -->
            {!!showWidget('widget444444444')!!}
         <!-- End Widget 444444444 -->
         <script>
               $('.click-show-menu').click(function(e){
                  e.preventDefault();
                  ul = $(this).next('ul');
                  if(ul.is(':visible'))$(this).next('ul').slideUp();
                  else $(this).next('ul').slideDown();
               
               })
            </script>
         <!--end .box-side-collection-->
            <!-- Widget 555555555 -->
               {!!showWidget('widget555555555')!!}
             <!-- End Widget 555555555 -->
         <!--end .box-side-collection-->
        
      </div>
      <!--end .col-sm-4 col-xs-12 side-collection-left-->
      <div class="col-md-9 col-sm-8 col-xs-12 side-collection-right">
         <div class="slider-collection">
            <div id="accordion">
               <figure>
                  <a href="{{ $firstBanner['url'] }}">
               <img src="{{ $firstBanner['image'] }}"> 
               </a>
               </figure>
            </div>
         </div>
         <!--end .slider-collection-->
         <div class="top-content-collection">
            <div class="col-md-2 col-xs-12 list-left-top-collection">
               <ul class="choose-layout">
                  <li><a href="{{url('collections?view=grid')}}"><i class="fa fa-th"></i></a></li>
                  <li class="active"><a><i class="fa fa-th-list"></i></a></li>
               </ul>
            </div>
            <div class="col-md-6 col-xs-6 list-left-center-collection">
               <div class="browse-tags">
                  <span class="title-count-s">Sắp xếp theo:</span>
                  <form class="filter-xs" method="POST" id="filter_product">
                     <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <span class="custom-dropdown custom-dropdown--white">
                        <select class="sort-by custom-dropdown__select custom-dropdown__select--white" name="sortBy" id="sortBy">
                           <option selected="" value="default">Mặc định</option>
                           <option value="price-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''}}>Giá: Tăng dần</option>
                           <option value="price-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''}}>Giá: Giảm dần</option>
                           <option value="alpha-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''}}>Tên: A-Z</option>
                           <option value="alpha-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''}}>Tên: Z-A</option>
                           <option value="created-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''}}>Cũ nhất</option>
                           <option value="created-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''}}>Mới nhất</option>
                        </select>
                     </span>
                  </form>
               </div>
            </div>
            <div class="col-md-4 col-xs-6 list-left-right-collection">
               <div class="clear"></div>
               <div class="text-center">
                  <div class="pagination">
                     <ul class="pagination-list">
                        @if($posts->currentPage()!=1)
                           <li>
                              <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">< </a>
                           </li>
                        @endif
                        @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                           <li class="{{($posts->currentPage()==$i)? 'hidden-phone current' : 'hidden-phone'}}">
                              <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
                           </li>
                        @endfor
                        @if($posts->currentPage()!=$posts->lastPage())
                           <li>
                              <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">></a>
                           </li>
                        @endif
                     </ul>
                     <input type="hidden" name="limitstart" value="0">
                  </div>
               </div>
            </div>
         </div>
         <!--end .top-content-collection-->
         <div class="content-collection">
            <div class="product-colum-3">
               @if(count($posts)>0)
                  @foreach($posts as $post)
                     <div class="wrap-box-padding col-md-12">
                        <form id="form_order_{{$post['post_id']}}" action="{{url('cart/order/'.$post['post_slug'])}}" method="post" class="variants"  enctype="multipart/form-data">
                           <input id="page_token" type="hidden" name="_token" value="{{csrf_token()}}" />
                           <input type="hidden" name="quantity" value="1" />
                           <a href="{{url('collections/'.$post['post_slug'])}}">                        
                           </a>
                           <div class="col-md-3 col-xs-12 listing-img">
                              <a href="{{url('collections/'.$post['post_slug'])}}">
                              </a>
                              <a href="{{url('collections/'.$post['post_slug'])}}">
                                 <img alt="{{$post['post_title']}}" title="{{$post['post_title']}}" src="{{loadFeatureImage($post['post_featured_image'])}}" class="img-responsive">
                              @if($post['percent_discount']>0)
                                 <div class="sales-l">
                                    <span>Giảm {{$post['percent_discount']}}%</span>
                                 </div>
                              @endif
                              </a>
                           </div>
                           <div class="col-md-6 co-xs-12 listing-cotnent">
                              <h4 class="title-cotnent-listing"><a href="{{url('collections/'.$post['post_slug'])}}">{{$post['post_title']}}</a></h4>
                              <p style="    font-weight: 300; line-height: 25px;">{{$post['post_excerpt']}}</p>
                           </div>
                           <div class="col-md-3 col-xs-12 listing-price">                                    
                              <span class="price">{{number_format($post['price_new'],0,'.','.')}}₫</span>
                           @if($post['price_old']>0)
                              <span class="price-del"><del style=" font-weight: 300; font-style: italic; color:#b5b5b5 !important;">
                              {{number_format($post['price_old'],0,'.','.')}}₫</del></span>
                           @endif
                              <span class="buy"><a onclick ="order({{$post['post_id']}})">Mua ngay</a></span>                                   
                           </div>
                        </form>
                     </div>
                  @endforeach
               @endif

            
            </div>
            <!--end .product-colum-3-->				
         </div>
         <!--end .content-collection-->
      </div>
      <!--end .col-sm-8 col-xs-12 side-collection-left-->
   </div>
   <!--end .container-->
</section>
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
        
           
          
        