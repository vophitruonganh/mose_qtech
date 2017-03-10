@extends('frontend.giaodien12.layouts.default')
@section('content') 
          
<div id="site-content">
   <div id="main">
      <div class="header-breadcrumb">
         <div class="container">
            <div class="row ">
               <div class="col-xs-12">
                  <ol class="breadcrumb">
                     <li><a href="/" title="Trang chủ">Trang chủ</a>
                     </li>
                     <!-- blog -->
                     <li class="active breadcrumb-title">Liên hệ</li>
                     <!-- current_tags -->
                  </ol>
               </div>
            </div>
         </div>
      </div>
    
       <div class="ggmap" id="ggmap">
       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7838.395792463968!2d106.653963!3d10.796150000000003!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752935e97b0445%3A0xa4b83f2f98a593fe!2zMTU3LTE1OSBYdcOibiBI4buTbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2sus!4v1470990067457" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
       </div>
      <section class="section-contact">
         <div class="container">
            <div class="row">
               <div class="col-md-4 col-md-push-8">
                  <div class="widget-item">
                     <a href="#" class="contact-logo"><img src="//bizweb.dktcdn.net/100/048/137/themes/61830/assets/logo_grey.png?1470122713917" alt=""></a>
                     <ul class="widget-menu">
                        <li class="widget-address"><span>Sport thành lập năm 2008 bởi Mr. Win Lee. Là tập đoàn bán lẻ hàng đầu Châu Á. Có mặt trên 20 quốc gia ...</span></li>
                        <li class="widget-address"><i class="fa fa-map-marker"></i><span>{{ $storeSetting['address'] }}</span></li>
                        <li><i class="fa fa-phone"></i><span>{{ $storeSetting['telephone'] }}</span></li>
                        <li><i class="fa fa-envelope"></i><span>{{ $storeSetting['email'] }}</span></li>
                     </ul>
                     <!-- End .widget-menu -->
                     <!--   -->
                     <ul class="menu-contact">
                        <!--  -->
                        <li><a href="http://www.facebook.com/#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <!--  -->
                        <!--   -->
                        <li><a href="http://www.facebook.com/#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <!--  -->
                        <!--    -->
                        <li><a href="https://twitter.com/#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <!--  -->
                        <!--  -->
                        <li><a href="http://www.youtube.com/#" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                        <!--  -->
                     </ul>
                     <!--   -->
                  </div>
                  <!-- End .widget-item -->
               </div>
               <div class="col-md-8 col-md-pull-4">
                  <div class="section-article contactpage">
                     @if( count($errors) > 0 )
                   <ul>
                       @foreach( $errors->all() as $error )
                       <li>{{ $error }}</li>
                       @endforeach
                   </ul>
                   @endif
                     <form accept-charset="UTF-8" action="{{url('pages/contact')}}" id="contact" method="post">
                        <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input name="FormType" type="hidden" value="contact">
                        <input name="utf8" type="hidden" value="true">
                        <!--form-errors-custom-->
                        <div class="notification_contact">
                           <p>Gửi liên hệ thành công!</p>
                        </div>
                        <!--End. form-errors-custom-->
                        <div class="form-inline form-comment">
                           <div class="form-group">
                              <label for="name">Họ tên<span id="required">*</span></label>
                              <input id="name" name="name" type="text" value="{{old('name')}}" class="form-control">
                           </div>
                           <div class="form-group">
                              <label for="email">Email<span id="required">*</span></label>
                              <input id="email" name="email" class="form-control" type="email" value="{{old('email')}}" required="">
                           </div>
                           <div class="form-group">
                              <label for="email">Điện thoại</label>
                               <input id="name" name="phone" type="text" value="{{old('phone')}}" class="form-control">
                           </div>
                           <div class="form-group">
                              <label for="message">Lời nhắn<span id="required">*</span></label>
                              <textarea id="message" name="message" class="form-control custom-control" rows="3" required="">{{old('message')}}</textarea>
                           </div>
                           <button type="submit" id="submitlienhe" class="btn btn-default">Gửi nhận xét</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>

@stop