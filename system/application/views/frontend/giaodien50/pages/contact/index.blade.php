@extends('frontend.giaodien3.layouts.default')
@section('content')
 <!--breadcrumbs-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="breadcrumbs">
                <ul>
                    <li class="home"> <a href="/" title="Trang chủ">Trang chủ<i class="sp_arrow">/</i></a></li>
                    <li><strong>Liên hệ</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumbs--> 
<!--container-->
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="form_blog_comment">
                <!-- thông báo lỗi -->
                @if( count($errors) > 0 )
                <ul>
                    @foreach( $errors->all() as $error )
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <!-- end -->
                <form accept-charset="UTF-8" action="{{url('pages/contact')}}" id="contact" method="post">
                    <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input name="FormType" type="hidden" value="contact">
                    <input name="utf8" type="hidden" value="true">
                    <h4 style="text-transform:uppercase; margin-top: 60px; color:#3bb2ca;margin-bottom: 15px;">Thông tin liên hệ</h4>
                    <div class="form-group">
                        <label for="name">Họ và tên <span class="required">*</span></label>
                        <input id="name" name="name" type="text" value="{{old('name')}}" class="form-control">
                      
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ Email <span class="required">*</span></label>
                        <input id="email" name="email" class="form-control" type="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại " value="{{old('phone')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ý kiến <span class="required">*</span></label>
                        <textarea id="message" name="message" style="height: 120px;" class="form-control" rows="7" {{old('message')}}></textarea>
                    </div>
                    <div class="form-group">
                        <button style="border-radius: 0px;padding: 7px 30px;" type="submit" class="btn btn-default stl_btn_reg">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <h4 style="margin-top: 60px; color:#3bb2ca; margin-bottom: 30px;">LIÊN HỆ VỚI CHÚNG TÔI</h4>
            <a class="logo" href="{{ url('/') }}">
            <img src="{{ $about_contact['logo'] }}">
            </a>
            <p style="font-size:14px;color: #797979; margin-bottom: 20px; margin-top:20px;">{{ $about_contact['text'] }}</p>
            <ul style="list-style:none; margin:0px;">
                <li>
                    <p style="color:#797979">
                        <span style="color:#3bb2ca" class="glyphicon glyphicon-phone"></span> &nbsp; {{ $storeSetting['telephone'] }}
                    </p>
                </li>
                <li>
                    <p style="color:#797979">
                        <span style="color:#3bb2ca" class="glyphicon glyphicon-envelope"></span> &nbsp;<span style="color:#797979">{{ $storeSetting['email'] }}</span>
                    </p>
                </li>
            </ul>
        </div>
    </div>
</div>
@stop