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
                  <h4 style="text-transform:uppercase; margin-top: 60px; color:#252525;margin-bottom: 30px;">Liên hệ với chúng tôi</h4>
                  <div class="form-group">
                     <label for="name">Họ và tên <span class="required">*</span></label>
                     <input id="name" name="name" type="text" value="{{old('name')}}" class="form-control">
                  </div>
                  <div class="form-group">
                     <label>Địa chỉ Email <span class="required">*</span></label>
                     <input id="email" name="email" class="form-control" type="email" value="{{old('email')}}">
                  </div>
                   <div class="form-group">
                     <label for="name">Số điện thoại<span id="required"></span></label>
                     <input placeholder="Điện thoại" id="phone" name="phone" type="text" value="{{old('phone')}}" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputEmail1">Viết bình luận <span class="required">*</span></label>
                     <textarea id="message" name="message" style="height: 120px;" class="form-control" rows="7">{{old('message')}}</textarea>
                  </div>
                  <div class="form-group">
                     <button style="margin: 15px 0;border-radius: 0px;padding: 15px 30px;background:#bda87f;color: #fff;border: none;text-transform:uppercase;" type="submit" class="btn btn-default stl_btn_reg">Gửi liên hệ</button>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-md-5">
            <h4 style="text-transform:uppercase; margin-top: 60px; color:#252525;margin-bottom: 15px;"></h4>
            <a class="logo" href="//mendover-theme-1.bizwebvietnam.net">
            <img alt="Mendover Theme" src="//bizweb.dktcdn.net/100/069/071/themes/139176/assets/logo_mobile.png?1472090442121">
            </a>
            <p style="font-size:15px;color: #000; margin-bottom: 10px; margin-top:45px;">QM-Tech là một trong những Công ty cung cấp dịch vụ về nhà ở chất lượng và uy tín nhất
               tại HCM với hơn 10 năm kinh nghiệm trong lĩnh vực công nghệ thông tin.
            </p>
            <ul class="cnt_contact" style="list-style:none; margin:0px;">
               <li style="margin-top: 20px;margin-bottom: 10px;">
                  <i style="color:#fff;" class="fa fa-map-marker"> </i> {{ $storeSetting['address'] }}
               </li>
               <li>
                  <i style="color:#fff;" class="fa fa-mobile"> </i><span>{{ $storeSetting['telephone'] }}</span>
               </li>
               <li>
                  <i style="color:#fff;" class="fa fa-envelope-o"> </i><span>{{ $storeSetting['email'] }}</span>
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