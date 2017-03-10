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
<section class="contact">
   <div class="page-heading" style="background-image: url({{ $background_page[$key]['image'] }});">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <h1>Liên hệ</h1>
            </div>
         </div>
      </div>
   </div>
   <div class="contact-page">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <ul class="breadcrumb">
                  <li><a href="{{ url('/') }}">Trang chủ</a></li>
                  <!-- blog -->
                  <li class="active breadcrumb-title">Liên hệ</li>
                  <!-- current_tags -->
               </ul>
            </div>
            <div class="col-lg-6">
               <div class="contact-infomation">
                  <div class="box">
                     <div class="box-heading">
                        <h2>Thông tin liên hệ</h2>
                     </div>
                     <div class="box-content">
                        <!--
                           <p class="contact-infomation-title">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.</p>
                           -->
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="ci-hotline">
                                 <div class="ci-icon">
                                    <i class="fa fa-phone"></i>
                                 </div>
                                 <div class="ci-content">
                                    <h3>Điện thoại</h3>
                                    <p>{{ $storeSetting['telephone'] }}</p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="ci-email">
                                 <div class="ci-icon">
                                    <i class="fa fa-envelope"></i>
                                 </div>
                                 <div class="ci-content">
                                    <h3>Email</h3>
                                    <p>{{ $storeSetting['email'] }}</p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="ci-address">
                                 <div class="ci-icon">
                                    <i class="fa fa-map-marker"></i>
                                 </div>
                                 <div class="ci-content">
                                    <h3>Địa chỉ</h3>
                                    <p>{{ $storeSetting['address'] }}</p>
                                 </div>
                              </div>
                           </div>
                           <!--
                           <div class="col-lg-12">
                              <div class="ci-social">
                                 <div class="ci-icon">
                                    <i class="fa fa-map-marker"></i>
                                 </div>
                                 <div class="ci-content">
                                    <h3>Kênh thông tin</h3>
                                    <ul>
                                       <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                       <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                       <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                       <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="contact-sent">
                  <div class="box">
                     <div class="box-heading">
                        <h2>Gửi tin nhắn nhận tư vấn</h2>
                     </div>
                     <div class="box-content">
                        <div class="style-form contact-form">
                              Cảm ơn bạn! Email đã được gửi đến ban quản trị.
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>         
@stop