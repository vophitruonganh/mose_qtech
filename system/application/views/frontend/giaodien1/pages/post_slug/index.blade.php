@extends('frontend.giaodien1.layouts.default')
@section('content')
  <?php
    $key = 0;
    foreach( $background_page as $k => $v )
    {
      if( $v['url'] == Request::fullUrl() )
      {
        $key = $k;
        break;
      }
    }
  ?>
          <section class="collection">
                <div class="page-heading" style="background-image: url({{ $background_page[$key]['image'] }});">
                    <div class="container">
                            <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h1>{{$slug_name}}</h1>
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
                                <li class="active breadcrumb-title">{{$slug_name}}</li>
                                <!-- current_tags -->
                             </ul>
                          </div>
                           
                          <div class="col-lg-3 sidebar">
                             
                              <!-- Menu Left -->
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
                          <!-- End Menu Left -->
                            
                          </div>
                            <div class="col-lg-9 right">
                               <div class="collection-toolbar">
                                 
                               </div>
                                <?php $i=0; ?>
                               <div class="collection-products">
                                <div class="row">
                                      @foreach($dataNews as $data) 
                                      <?php 
                                            $date     = date('d-m-Y',$data->post_date); 
                                       ?> 
                                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="school-item">
                                           <div class="school-item-thumbnail">
                                              <img src="{{get_image_url($data->post_image)}}" alt="{{$data->post_title}}">
                                              <a href="{!! url($data->post_slug) !!}">Xem chi tiết</a>
                                           </div>
                                           <a href="{!! url($data->post_slug) !!}" class="shool-item-name">
                                              <h3>{{$data->post_title}}</h3>
                                           </a>
                                           <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>{{$date}}</p>
                                           <p class="cultural-item-summary"><p style="text-align: justify;">{{!empty($data->post_excerpt ) ? get_excerpt($data->post_excerpt,20) : get_excerpt($data->post_content,20)}}</p></p>
                                           
                                           <div class="school-item-buttons">
                                              <a href="{{url($data->post_slug)}}" class="school-item-view">Xem chi tiết</a>
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
                                 {{ $dataNews->render()}}
                                  
                               </div>
                            </div> <!-- end ms-9-->
                        
                       </div> <!-- end row-->
                    </div> <!-- end container-->
                 </div>
          </section>
          
          
   @stop