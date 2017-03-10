@extends('frontend.giaodien17.layouts.default')
@section('content')
<div class="fvc" style="float:left;width:100%;">
   <div class="banner_page_list">
      <h1>Liên hệ</h1>
   </div>
   <div class="breadcrumbs">
      <div class="container">
         <ul>
            <li class="home"> <a href="/" title="Trang chủ">Trang chủ &nbsp;</a></li>
            <li><strong>Liên hệ</strong></li>
         </ul>
      </div>
   </div>
   <style>.form-control{border-radius:0px;}</style>
   <div class="container">
      <div class="fvc" style="margin-top:60px;">
         @foreach( $map as $row)
            <div class="google-map">
               <iframe src="{{$row['src']}}" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
         @endforeach
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-7">
            <div class="form_blog_comment">
                Cảm ơn bạn! Email đã được gửi đến nhà quản trị!
            </div>
         </div>
         <div class="col-md-5">
            <h4 style="text-transform:uppercase; margin-top: 60px; color:#252525;margin-bottom: 15px;"></h4>
            <a class="logo" href="//mendover-theme-1.bizwebvietnam.net">
            <img alt="Mendover Theme" src="//bizweb.dktcdn.net/100/069/071/themes/139176/assets/logo_mobile.png?1472090442121">
            </a>
            <p style="font-size:15px;color: #000; margin-bottom: 10px; margin-top:45px;">Mendover là một trong những Công ty cung cấp dịch vụ về nhà ở chất lượng và uy tín nhất
               tại Hà Nội với hơn 10 năm kinh nghiệm trong lĩnh vực bất động sản.
            </p>
            <ul class="cnt_contact" style="list-style:none; margin:0px;">
               <li style="margin-top: 20px;margin-bottom: 10px;">
                  <i style="color:#fff;" class="fa fa-map-marker"> </i> 442 Đội Cấn, Ba Đình, Hà Nội, Việt Nam
               </li>
               <li>
                  <i style="color:#fff;" class="fa fa-mobile"> </i><span>(04) 6674 2332 - (04) 3786 8904</span>
               </li>
               <li>
                  <i style="color:#fff;" class="fa fa-envelope-o"> </i><span>support@bizweb.vn</span>
               </li>
            </ul>
         </div>
      </div>
   </div>
  
   <style>
      .google-map {width:100%;}
      .google-map .map {width:100%; height:350px; background:#dedede}
   </style>
</div>

@stop