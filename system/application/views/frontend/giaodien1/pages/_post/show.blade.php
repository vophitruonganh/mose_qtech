@extends('frontend.giaodien1.layouts.default')
@section('content')
          <section class="collection">
                <div class="page-heading">
                    <div class="container">
                            <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h1>Tin tức</h1>
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
                                <li class="active breadcrumb-title">Tin tức</li>
                                <!-- current_tags -->
                             </ul>
                          </div>
                           
                          <div class="col-lg-3 sidebar">
                             <?php
                             /*
                              <!-- Menu Left -->
                              <div class="box">
                                <div class="box-heading">
                                   <h2>Danh sách các nước</h2>
                                </div>
                                <div class="box-content">
                                   <nav class="nav-sidebar">
                                      <ul>
                                         <li class="active"><a href="#">Danh sách các trường</a></li>
                                         <li><a href="#">Các trường mới</a></li>
                                         <li><a href="#">Các trường nổi bẩt</a></li>
                                         <li><a href="#">Du học Mỹ</a></li>
                                         <li><a href="#">Du học Anh</a></li>
                                         <li><a href="#">Du học Úc</a></li>
                                         <li><a href="#">Du học Canada</a></li>
                                         <li><a href="#">Du học Singapore</a></li>
                                         <li><a href="#">Du học Nhật Bản</a></li>
                                         <li><a href="#">Các nước khác</a></li>
                                      </ul>
                                   </nav>
                                </div>
                            </div>

                            <div class="box">
                                <div class="box-heading">
                                   <h2>Tìm theo châu lục</h2>
                                </div>
                                <div class="box-content">
                                   <nav class="nav-sidebar">
                                      <ul>
                                         <li><a href="#">Châu Á</a></li>
                                         <li><a href="#">Châu Âu</a></li>
                                         <li><a href="#">Châu Úc</a></li>
                                         <li><a href="#">Châu Mỹ</a></li>
                                      </ul>
                                   </nav>
                                </div>
                            </div>
                          <!-- End Menu Left -->
                          */
                          ?>

                          <!-- Các trường nổi bật-->
                            <div class="box">
                                <!-- Widget d -->
                                {!!showWidget('widgetd')!!}
                                <!-- End Widget d -->
                           </div>

                          <!-- End các trường nổi bật-->
                            
                          </div>
                            <div class="col-lg-9 right">
                               <div class="collection-toolbar">
                                 
                               </div>
                                <?php $i=0; ?>
                               <div class="collection-products">
                                <div class="row">
                                      @foreach($dataNews as $data) 
                                      <?php $date     = date('d-m-Y',$data->post_date); ?> 
                                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="school-item">
                                           <div class="school-item-thumbnail">
                                              <img src="{{ asset('template/giaodien1/images/singapore6.jpg') }}" alt="Học viện Quản lý Châu Á Thái Bình Dương APMI Singapore">
                                              <a href="{!! url('news/'.$data->post_slug.'.html') !!}">Xem chi tiết</a>
                                           </div>
                                           <a href="{!! url('news/'.$data->post_slug.'.html') !!}" class="shool-item-name">
                                              <h3>{{$data->post_title}}</h3>
                                           </a>
                                           <p class="on-item-info"><i class="fa fa-calendar-minus-o"></i>{{$date}}</p>
                                           
                                           <div class="school-item-buttons">
                                              <a href="/hoc-vien-quan-ly-chau-a-thai-binh-duong-apmi-singapore" class="school-item-register">Đăng ký</a>
                                              <a href="/hoc-vien-quan-ly-chau-a-thai-binh-duong-apmi-singapore" class="school-item-view">Xem chi tiết</a>
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