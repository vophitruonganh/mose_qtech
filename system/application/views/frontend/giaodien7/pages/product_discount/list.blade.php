@extends('frontend.giaodien7.layouts.default')
@section('content')

      <div class="breadcrumbs">
         <div class="container">
            <div class="row">
               <div class="inner">
                  <ul>
                     <li class="home">
                        <a title="Quay lại trang chủ" href="/">Trang chủ</a>
                     </li>
                     <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                     <li class="cl_breadcrumb" >{{$title_name}}</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <section class="collection_all">
         <div class="container">
            <div class="row">
           <!--left-->
               <div class="col-lg-3 col-md-3 hidden-sm hidden-xs left-panel">

                  <!-- Danh mục sản phẩm -->
                   <!-- Widget gggg -->
                        {!!showWidget('widgetgggg')!!}
                  <!-- End Widget gggg -->
                           <script>
                              var li_length = $('.block-content li.level0').length;
                              $(document).ready(function(){
                                if (li_length <=7 ){
                                    $(".xemthem").hide();
                                } else if (li_length >= 8){
                                    $(".xemthem").show();
                                }
                                $(".xemthem").click(function(){
                                    $(".xemthem").hide();
                                    $(".display_dinao").show();
                                });
                                $(".xoadi").click(function (){
                                    $(".display_dinao").hide();
                                    $(".xemthem").show();
                                });
                              });
                           </script>
                  <!-- end danh mục sản phẩm -->
                  
                  <!-- Sản phẩm bán chạy -->
                     <!-- Widget hhhh -->
                           {!!showWidget('widgethhhh')!!}
                     <!-- End Widget hhhh -->
                  <!-- end sản phẩm bán chạy -->

                  <div class="fanpage_facebook block mg_bt mg_top hidden-xs">
                     <div class="block-content">
                        <div class="fb-page" data-href="https://www.facebook.com/MOSEVN" data-tabs="timeline" data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                           <div class="fb-xfbml-parse-ignore">
                              <blockquote cite="https://www.facebook.com/MOSEVN">
                                 <a href="https://www.facebook.com/MOSEVN">Facebook</a>
                              </blockquote>
                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- tin tức -->
                     <!-- Widget iiii -->
                           {!!showWidget('widgetiiii')!!}
                     <!-- End Widget iiii -->
                  <!-- End tin tức -->
              </div>
              <!-- End left -->

                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 right-panel collections">
                       <div class="col-lg-12 col-md-12 col-sm- col-xs-12 collection_header">
                          <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 pd_0">
                             <h4 class="txt_u fw600 pd_0 pull-left">{{$title_name}}</h4>
                          </div>
                          <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12 toolbar pd_0 ">
                             <div id="sort-by">
                                <label class="left hidden-xs">Sắp xếp theo: </label>
                                <form class="form-inline form-viewpro" id="filter_product" method="POST">
                                <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                   <div class="form-group">
                                      <select class="sort-by-script" id="sortBy" name="sortBy">
                                         <option value="default">Mặc định</option>
                                         <option value="price-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-asc')? 'selected' : ''}}>Giá tăng dần</option>
                                         <option value="price-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='price-desc')? 'selected' : ''}}>Giá giảm dần</option>
                                         <option value="alpha-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-asc')? 'selected' : ''}}>Từ A-Z</option>
                                         <option value="alpha-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='alpha-desc')? 'selected' : ''}}>Từ Z-A</option>
                                         <option value="created-asc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-asc')? 'selected' : ''}}>Cũ đến mới</option>
                                         <option value="created-desc" {{(isset($_GET['sortBy']) && $_GET['sortBy']=='created-desc')? 'selected' : ''}}>Mới đến cũ</option>
                                      </select>
                                      
                                   </div>
                                </form>
                             </div>
                             <div class="sorter ">
                                <div class="view-mode"> 
                                   <a href="{{(!isset($_GET['view']) || $_GET['view']=='grid')? 'javascript:void(0);' : url('collections?view=grid')}}" title="Lưới" class="collection_btn"><i class="fa fa-th" aria-hidden="true"></i></a>
                                   <span title="Danh sách" class="active collection_btn"><a href="{{(isset($_GET['view']) && $_GET['view']=='list')? 'javascript:void(0);' : url('collections?view=list')}}" ><i class="fa fa-th-list" aria-hidden="true"></i></a></span>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd_0 mg_20_0 collection_view">
                           @if(count($posts)!=0)
                              @foreach( $posts as $post )
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd_0 mg_bt">
                                      <div class="prd-loop-list prd-loop-list-collection">
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 loop-img">
                                            <a href="{{url('collections/'.$post['post_slug'])}}">
                                            <img src="{{ asset('template/giaodien7/img/benro-a1681tb0-1-min.jpg') }}" alt="Benro A1681TB0">
                                            </a>
                                         </div>
                                         <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 loop-content">
                                            <div>
                                               <h3 class="item-name fw600"><a href="{{url('collections/'.$post['post_slug'])}}">{{$post['post_title']}}</a></h3>
                                               <p class="item-price cl_price fs18 mg_bt_10 fw600"><span>{{number_format($post['price_new'],0,'.','.')}}₫</span></p>
                                               <div class="prd_content cl_old"> Chân máy ảnh nhôm truyền thống của Benro sử dụng khung hợp kim magie giúp tăng cường chống rung và giảm nhẹ trọng lượng hơn so với hợp kim...</div>
                                               <div class="mg_20_0">
                                                  <div class="actions">
                                                     <form action="{{ url('cart/order/'.$post["post_slug"])  }}" method="post" class="variants" id="product-actions-2940268" enctype="multipart/form-data">
                                                     <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                         <input type="hidden" name="quantity" value="1" />
                                                        <input type="hidden" name="variantId" value="4711564">
                                                        <button class="btn btn-buy btn-cus" title="Mua ngay"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua ngay</span></button>
                                                     </form>
                                                  </div>
                                                  <button class="btn btn-view btn-cus" onclick="window.location.href='{{url('collections/'.$post['post_slug'])}}'">Xem chi tiết</button>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                              @endforeach
                           @endif
                        
                          
                      
              
                         
                 

                       </div>
                        <div class="paginate-pages">
                            <div class="pager">
                               <div class="pages">
                                  <ul class="pagination">
                                     @if($posts->currentPage()!=1)
                                        <li>
                                            <a href="{{str_replace('/?','?',$posts->url($posts->currentPage()-1))}}">
                                                Trang trước
                                            </a>
                                        </li>
                                     @endif
                                     @for($i=1;$i<=$posts->lastPage();$i=$i+1)
                                        <li class="{{($posts->currentPage()==$i)? 'active' : ''}}">
                                            <a href="{{str_replace('/?','?',$posts->url($i))}}">{{$i}}</a>
                                        </li>
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
         </div>
      </section>
      <script type="text/javascript">
          $("#sortBy").change(function(){
                 $("#filter_product").submit();
          });
      </script>
@stop