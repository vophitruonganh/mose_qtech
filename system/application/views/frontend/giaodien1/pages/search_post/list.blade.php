@extends('frontend.giaodien1.layouts.default')
@section('content')
        
          <section class="collection">
                <div class="page-heading" style="background-image: url(http://store.moseplus.com/template/giaodien1/images/bg-collection-heading.jpg);">
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
                            <!-- Widget d -->
                            <div class="box">
                              <div class="box-heading">
                                 <h2>Danh mục bài viết</h2>
                              </div>
                              <div class="box-content">
                                 <nav class="nav-sidebar">
                                    <ul>
                                    <?php $list_cat = get_taxonomy_post('post_category') ?>
                                    @if(count($list_cat)>0)
                                      @foreach( $list_cat as $cat)
                                         <li><a href="{{url($cat->taxonomy_slug)}}">{{$cat->taxonomy_name}}</a></li>
                                      @endforeach
                                    @endif
                                        </ul>
                                     </nav>
                                  </div>
                              </div>
                            <div class="box">
                                <div class="box-heading">
                                   <h2>Nhãn bài viết</h2>
                                </div>
                                <div class="box-content">
                                   <nav class="nav-sidebar">
                                      <ul>
                                      <?php $list_cat = get_taxonomy_post('post_tag') ?>
                                      @if(count($list_cat)>0)
                                        @foreach( $list_cat as $cat)
                                           <li><a href="{{url($cat->taxonomy_slug)}}">{{$cat->taxonomy_name}}</a></li>
                                        @endforeach
                                      @endif
                                      </ul>
                                   </nav>
                                </div>
                            </div>
                           <!-- End Widget d -->
                        </div>
                        
                        @if(count($posts))
                          <div class="col-lg-9">
                             <div class="collection-toolbar">
                                <div class="row">
                                   <div class="col-lg-6">
                                      <div class="toolbar-views">
                                         <a href="{{(!isset($_GET['view']) || $_GET['view']=='grid')? 'javascript:void(0);' : url('index?search='.$search.'&&view=grid')}}" class="{{(!isset($_GET['view']) || $_GET['view']=='grid')? 'active' : ''}}" >
                                      <i class="fa fa-th"></i>
                                      </a> 

                                            <a href="{{(isset($_GET['view']) && $_GET['view']=='list')? 'javascript:void(0);' : url('index?search='.$search.'&&view=list')}}" class="{{(isset($_GET['view']) && $_GET['view']=='list')? 'active' : ''}}">
                                      
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
                             <div class="collection-products collection-products-list">
                                <div class="row">
                                   @foreach($posts as $post)
                                   <?php $date     = date('d-m-Y',$post->post_date); ?> 
                                   
                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                      <div class="school-item">
                                         <div class="school-item-thumbnail">
                                            <img src="{{get_image_url($post->post_image)}}" alt="{{$post->post_title}}">
                                            <a href="{{url($post->post_slug)}}">Xem chi tiết</a>
                                         </div>
                                         <a href="{{url($post->post_slug)}}" class="shool-item-name">
                                            <h3>{{$post->post_title}}</h3>
                                         </a>
                                         <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>{{$date}}</p>
                                         <p class="cultural-item-summary"><p style="text-align: justify;">{{!empty($post->post_excerpt ) ? get_excerpt($post->post_excerpt,20) : get_excerpt($post->post_content,20)}}</p></p>
                                         
                                         <div class="school-item-buttons">
                                            
                                            <a href="{{url($post->post_slug)}}">Xem chi tiết</a>
                                         </div>
                                      </div>
                                   </div>
                                    @endforeach()
                                </div>
                                
                               
                                 
                                {{$posts->appends(['search' => $search,'view' => $view])->render()}}
                             </div>
                          </div>                           
                        @else
                          Không tìm thấy kết quả
                        @endif
                        <!-- end ms-9-->
                       </div> <!-- end row-->
                    </div> <!-- end container-->
                 </div>
          </section>
          
          
  @stop