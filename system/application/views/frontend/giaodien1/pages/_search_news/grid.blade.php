@extends('frontend.giaodien1.layouts.default')
@section('content')
          <section class="collection">
                <div class="page-heading">
                    <div class="container">
                            <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h1>Kết quả tìm kiếm</h1>
                                    </div>
                            </div>
                    </div>
                </div>
              
                <div class="collection-page">
                    <div class="container">
                       <div class="row">
                          <div class="col-lg-12">
                             <ul class="breadcrumb">
                                <li><a href="/">Trang chủ</a></li>
                                <!-- blog -->
                                <li class="active breadcrumb-title">Kết quả tìm kiếm</li>
                                <!-- current_tags -->
                             </ul>
                          </div>
                           
                        <div class="col-lg-3 sidebar">
                            <div class="box">
                                <!-- Widget d -->
                                {!!showWidget('widgetd')!!}
                                <!-- End Widget d -->
                           </div>
                        </div>
                           @if(count($posts)>0)
                            <div class="col-lg-9 right">
                               <div class="collection-toolbar">
                                  <div class="row">
                                     <div class="col-lg-6">
                                        <div class="toolbar-views">

                                           <a href="{{(!isset($_GET['view']) || $_GET['view']=='grid')? 'javascript:void(0);' : url('/search_news/search.html?query='.$query.'&&view=grid')}}" class="{{(!isset($_GET['view']) || $_GET['view']=='grid')? 'active' : ''}}" >
                                      <i class="fa fa-th"></i>
                                      </a> 

                                            <a href="{{(isset($_GET['view']) && $_GET['view']=='list')? 'javascript:void(0);' : url('/search_news/search.html?query='.$query.'&&view=list')}}" class="{{(isset($_GET['view']) && $_GET['view']=='list')? 'active' : ''}}">
                                      
                                      <i class="fa fa-th-list"></i>
                                      </a> 
                                        </div>
                                     </div>
                                     <!-- <div class="col-lg-6">
                                        <div class="toolbar-sortby">
                                           <label>Sắp xếp theo</label>
                                           <select class="sort-by">
                                              <option value="default">Mặc định</option>
                                              <option value="price-asc">Giá tăng dần</option>
                                              <option value="price-desc">Giá giảm dần</option>
                                              <option value="alpha-asc">Từ A-Z</option>
                                              <option value="alpha-desc">Từ Z-A</option>
                                              <option value="created-asc">Mới đến cũ</option>
                                              <option value="created-desc">Cũ đến mới</option>
                                           </select>
                                        </div>
                                     </div> -->
                                  </div>
                               </div>

                                <?php $i=0; ?>
                               <div class="collection-products">
                                
                                <div class="row">
                                      @foreach($posts as $post)
                                      <?php $date     = date('d-m-Y',$post->post_date); ?> 

                                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="school-item">
                                           <div class="school-item-thumbnail">
                                              <img src="//bizweb.dktcdn.net/thumb/large/100/062/789/products/singapore6.jpg?v=1457338636620" alt="Học viện Quản lý Châu Á Thái Bình Dương APMI Singapore">
                                              <a href="{{url('news/'.$post->post_slug.'.html')}}">Xem chi tiết</a>
                                           </div>
                                           <a href="{!! url('news/'.$post->post_slug.'.html') !!}" class="shool-item-name">
                                              <h3>{{$post->post_title}}</h3>
                                           </a>
                                           <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>{{$date}}</p>
                                           
                                           <div class="school-item-buttons">
                                              
                                              <a href="{{url('news/'.$post->post_slug.'.html')}}" class="school-item-view">Xem chi tiết</a>
                                           </div>
                                        </div>
                                     </div>
                                       <?php 
                                            if(($i+1)%3==0) 
                                              echo '<div class="clearfix"></div>';
                                            $i++;
                                           
                                        ?>
                                       @endforeach()
                                  </div>
      

                                  
                                  {{$posts->appends(['query' => $query, 'view' => $view])->render()}}
                                  
                                  
                                  
                               </div>
                            </div> <!-- end ms-9-->
                          @else
                            Không tìm thấy kết quả
                          @endif
                       </div> <!-- end row-->
                    </div> <!-- end container-->
                 </div>
          </section>
          
          
   @stop