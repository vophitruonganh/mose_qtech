@extends('frontend.giaodien19.layouts.default')
@section('content')
<div id="collection">
   <!-- Begin collection info -->
   <!-- Content-->
   <div class="container">
      <div class="col-md-12 ">
         <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
            <li><a href="/" target="_self">Trang chủ</a></li>
            <!-- <li><a href="/collections" target="_self">Danh mục</a></li> -->
            <li class="active"><span>{{$title_name}}</span></li>
         </ol>
      </div>
      <div id="content-collection" class="row">
         <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="side-nav-categories">
               <!--block-title--> 
               <!-- BEGIN BOX-CATEGORY -->

               <div class="sidebar">
                     <!-- Widget hhhhhhhhhh -->
                        {!!showWidget('widgethhhhhhhhhh')!!}
                     <!-- End Widget hhhhhhhhhh -->

                     <!-- Widget iiiiiiiiii -->
                        {!!showWidget('widgetiiiiiiiiii')!!}
                     <!-- End Widget iiiiiiiiii -->
               
                     <div class="fangae-blog">
                     <div class="block-title"> Chúng tôi ở đây </div>
                     <div class="page-face">
                        <div class="fb-page" data-href="https://www.facebook.com/MOSEVN/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MOSEVN/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MOSEVN/">Mose - QMPLus</a></blockquote></div>
             
                     </div>
                    </div>
                  </div>
              
             
               <!--box-content box-category--> 
            </div>
         </div>
         <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="row">
               <div class="main-content">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                           <div class="block-title"> {{$title_name}} </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                           <div class="browse-tags">
                           <form class="filter-xs" method="POST" id="filter_product">
                                 <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                 <span>Sắp xếp theo:</span>
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
                        </div> -->
                     </div>
                  </div>
                  <div class="col-md-12 product-list">
                     <div class="row content-product-list">
                     @if(count($posts)>0)
                        @foreach($posts as $post)
                           <div class="item col-md-4  col-sm-4 col-xs-6">
                              <form id="form_order_{{$post['post_id']}}" action="{{url('cart/order/'.$post['post_slug'])}}" method="post" class="variants"  enctype="multipart/form-data">
                                 <input id="page_token" type="hidden" name="_token" value="{{csrf_token()}}" />
                                 <input type="hidden" name="quantity" value="1" />
                                 <div class="col-item">
                                 @if($post['percent_discount']>0)
                                    <div class="sale-label sale-top-right">-{{$post['percent_discount']}}<sup>%</sup></div>
                                 @endif
                                <!--     <div class="new-label new-top-right">New</div> -->
                                    <div class="images-container">
                                       <a class="product-image" title="Sample Product" href="{{url('collections/'.$post['post_slug'])}}"> 
                                       <img src="{{ loadFeatureImage($post['post_featured_image']) }}" class="img-responsive" alt="{{$post['post_title']}}">  </a>
                                       <div class="actions">
                                          <div class="actions-inner">
                                             <a onclick ="order({{$post['post_id']}})" class="button btn-cart add-cart" data-variantid="1005484130" title="Thêm vào giỏ"><span>Thêm vào giỏ</span></a>
                                             <!-- <ul class="add-to-links">
                                                <li><a href="/account/login" title="Yêu thích" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                                                <li><a href="{{url('collections/'.$post['post_slug'])}}" title="Xem chi tiết" class="link-compare "><span>Add to Compare</span></a></li>
                                             </ul> -->
                                          </div>
                                       </div>
                                       <div class="qv-button-container">
                                          <a href="{{url('collections/'.$post['post_slug'])}}" class="qv-e-button btn-quickview-1" title="Xem nhanh" data-handle=""><span><span>Quick View</span></span></a>
                                       </div>
                                    </div>
                                    <div class="info">
                                       <div class="info-inner">
                                          <div class="item-title">
                                             <a title=" Sample Product" href="{{url('collections/'.$post['post_slug'])}}">{{$post['post_title']}}</a>
                                          </div>
                                          <!--item-title-->
                                          <div class="item-content">
                                             <!-- <div class="ratings">
                                                <div class="rating-box">
                                                   <div style="width: 70%;" class="rating"></div>
                                                </div>
                                             </div> -->
                                             <div class="price-box">
                                                <p class="pro-price">{{number_format($post['price_new'],0,'.','.')}}₫
                                                @if($post['price_old']>0)
                                                <del class="compare-price">{{number_format($post['price_old'],0,'.','.')}}₫</del>
                                                @endif
                                                </p>
                                             </div>
                                          </div>
                                          <!--item-content-->
                                       </div>
                                       <!--info-inner-->
                                       <!--actions-->
                                       <div class="clearfix"></div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        @endforeach
                     @endif
                 
                        <script>
                           $(document).ready(function () {
                           	// $('a.btn-quickview-1').click(function (event) {
                           	// 	//console.log('abc')
                           	// 	event.preventDefault();
                           	// 	quickViewProduct($(this).attr('data-handle'));
                           	// })
                           })
                           $(document).ready(function(){
                           	$('.add-cart').click(function(){
                           		var variant_id = $(this).attr('data-variantid');
                           		var quantity = 1;//$('input[type="number"]').val();
                           		var params = {
                           			type: 'POST',
                           			url: '/cart/add.js',
                           			data: 'quantity=' + quantity + '&id=' + variant_id,
                           			dataType: 'json',
                           			success: function(line_item) { 
                           				window.location.href = '/cart';
                           			},
                           			error: function(XMLHttpRequest, textStatus) {
                           				Haravan.onError(XMLHttpRequest, textStatus);
                           			}
                           		};
                           		jQuery.ajax(params);
                           	});
                           
                           })
                        </script>
                     </div>
                  </div>
                  <div class="col-md-12 content_sortPagiBar pagi" style="display: block;">
                     <div id="pagination" class="clearfix">
                        <ul class="pagination">
                        @if($posts->currentPage()!=1)
                           <li>
                              <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">Trước </a>
                           </li>
                        @endif
                        @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                           <li class="{{($posts->currentPage()==$i)? 'active' : ''}}">
                              <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
                           </li>
                        @endfor
                        @if($posts->currentPage()!=$posts->lastPage())
                           <li>
                              <a class="next-arrow" href="{{str_replace('/?','?',$posts->url($posts->currentPage()+1))}}" title="2">Sau</a>
                        </li>
                        @endif
                          
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End collection info -->
   <!-- Begin no products -->
   <!-- End no products -->
</div>
<script type="text/javascript">
   

      function order(i)
      {
         $("#form_order_"+i).submit();   
      }
</script>
@stop

          