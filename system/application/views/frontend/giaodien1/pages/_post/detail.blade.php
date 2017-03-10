@extends('frontend.giaodien1.layouts.default')
@section('content')
         <section class="product"  itemscope itemtype="#">
            <div class="page-heading">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1>{{$post->post_title}}</h1>
                     </div>
                  </div>
               </div>
            </div>
            <div class="product-page">
               <div class="container">
                  <div class="row">
                      
                     <div class="col-lg-12">
                        <ul class="breadcrumb">
                           <li><a href="#">Trang chủ</a></li>
                           <!-- blog -->
                           <!-- <li><a href="#">Các nước khác</a></li> -->
                           <li class="active breadcrumb-title">{{$post->post_title}}</li>
                           <!-- search -->
                           <!-- current_tags -->
                        </ul>
                     </div>
                    
                    
                     <div class="col-lg-6">

                        <div id="sync1" class="owl-carousel large-image">
                            <div class="item">
                                <img class="sp-image" src="{{ asset('template/giaodien1/images/anh-san-pham-2.png') }}" alt="Trường Nhật ngữ Quốc tế Sendai, Nhật Bản" alt="mo ta" />
                            </div>
                            <div class="item">
                                <img class="sp-image" src="{{ asset('template/giaodien1/images/anh-san-pham-2.png') }}" alt="Trường Nhật ngữ Quốc tế Sendai, Nhật Bản"  alt="mo ta" />
                            </div>
                            <div class="item">
                                <img class="sp-image" src="{{ asset('template/giaodien1/images/anh-san-pham-2.png') }}" alt="Trường Nhật ngữ Quốc tế Sendai, Nhật Bản" alt="mo ta" />
                            </div>
                             <div class="item">
                                <img class="sp-image" src="{{ asset('template/giaodien1/images/anh-san-pham-2.png') }}" alt="Trường Nhật ngữ Quốc tế Sendai, Nhật Bản" alt="mo ta" />
                            </div>
                        </div>
                        <div id="sync2" class="owl-carousel">
                            <div class="item">
                                <img src="{{ asset('template/giaodien1/images/anh-san-pham-2.png') }}" alt="Trường Nhật ngữ Quốc tế Sendai, Nhật Bản" alt="mo ta" />        
                            </div>
                            <div class="item">
                                <img src="{{ asset('template/giaodien1/images/anh-san-pham-2.png') }}" alt="Trường Nhật ngữ Quốc tế Sendai, Nhật Bản" alt="mo ta" />
                            </div>
                            <div class="item">
                                  <img src="{{ asset('template/giaodien1/images/anh-san-pham-2.png') }}" alt="Trường Nhật ngữ Quốc tế Sendai, Nhật Bản" alt="mo ta" />
                            </div>
                            <div class="item">
                                  <img src="{{ asset('template/giaodien1/images/anh-san-pham-2.png') }}" alt="Trường Nhật ngữ Quốc tế Sendai, Nhật Bản" alt="mo ta" />
                            </div>
                        </div>
                     </div>
                      
                      
                      
                     
                     <div class="col-lg-6">
                        <h2 class="product-name" itemprop="name">{{$post->post_title}}</h2>
                        <div class="product-summary">
                           <p style="text-align: justify;">{{$post->post_excerpt}}</p>
                        </div>
                        <div class="product-prices">
                           <!-- <p class="product-price" itemprop="price">Học phí: <span>19.000.000&#8363;</span>/ năm</p> -->
                        </div>
                        <div class="product-form">
                           <!-- <a href="/lien-he" class="product-submit">Đăng ký</a> -->
                        </div>
                     </div>
                     
                      
                     <!--khoa hoc lien quan--> 
                    <!-- Widget e -->
                    {!!showWidget('widgete')!!}
                    <!-- End Widget e -->
              

                     <!--end khoa hoc lien quan--> 
                  </div>
               </div>
            </div>
         </section>
        @stop