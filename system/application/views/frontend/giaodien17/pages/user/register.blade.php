@extends('frontend.giaodien17.layouts.default')
@section('content')


<div class="fvc" style="float:left;width:100%;">
   <div class="banner_page_list">
      <h1>Đăng ký tài khoản</h1>
   </div>
   <div class="breadcrumbs">
      <div class="container">
         <ul>
            <li class="home"> <a href="{{url('/')}}" title="Trang chủ">Trang chủ &nbsp;</a></li>
            <li><strong>Đăng ký tài khoản</strong></li>
         </ul>
      </div>
   </div>
   <section class="tzpage-default">
      <h3 class="tz-title-bold-3">ĐĂNG KÝ THÔNG TIN TÀI KHOẢN</h3>
      <div class="container">
         <div class="joom-login">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  @if( count($errors) > 0 )
                       <ul>
                           @foreach( $errors->all() as $error )
                           <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   @endif
                  <form accept-charset="UTF-8" action="{{url('user/register')}}" id="tzrgister" class="shopform" method="post">
                     <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <input placeholder="Họ tên: *" type="text" name="name" id="name" value="{{old('name')}}">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <!-- <label for="gender">Giới tính <span class="required"></span></label> -->
                           <select name="gender">
                                  <option value="choise">— Chọn giới tính —</option>
                                  <option value="1" @if( old('gender') == '1' )selected="selected"@endif >Nam</option>
                                  <option value="2" @if( old('gender') == '2' )selected="selected"@endif >Nữ</option>
                                  <option value="3" @if( old('gender') == '3' )selected="selected"@endif >Khác</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <input placeholder="Email: *" type="text" name="email" id="email" value="{{old('email')}}">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <input placeholder="Mật khẩu: *" type="password" name="password" id="creat_password">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <input placeholder="Xác nhận mật khẩu: *" type="password" name="password_confirmation" id="creat_password">
                        </div>
                     </div>
                     <div class="submit-form">
                        <button type="submit"><span>ĐĂNG KÝ</span></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

@stop