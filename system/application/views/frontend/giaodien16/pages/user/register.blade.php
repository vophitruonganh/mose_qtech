@extends('frontend.giaodien16.layouts.default')
@section('content')

<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home"> <a title="Quay lại trang chủ" href="/">Trang chủ</a></li>
               <i class="fa fa-angle-double-right" aria-hidden="true"></i>
               <li><span class="brn">Đăng ký tài khoản</span></li>
            </ul>
         </div>
      </div>
   </div>
</div>

<section class="main-container">
   <div class="main container">
      <div class="account-login">
         <div class="page-title">
            <h2 class="fw_600 txt_u">Thông tin cá nhân</h2>
         </div>
         <fieldset class="col2-set">
            <div class="registered-users">
               <div class="content">
                  @if( count($errors) > 0 )
                       <ul>
                           @foreach( $errors->all() as $error )
                           <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   @endif
                  <form accept-charset="UTF-8" action="{{url('user/register')}}" id="customer_register" method="post">
                     <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <input name="FormType" type="hidden" value="customer_register">
                     <input name="utf8" type="hidden" value="true">            
                     <ul class="form-list">
                        <!--<div class="customer-name col-lg-6 col-md-6 col-sm-6 col-xs-12">-->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 input-box name-firstname">
                           <label for="firstname"> Họ và Tên <span class="required">*</span></label>
                           <input type="text" name="name" title="Họ và Tên" class="input-text" id="firstname" required="" requiredmsg="Nhập Họ và Tên" value="{{old('name')}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <label for="email">Địa chỉ Email<span class="required">*</span></label>
                           <input type="email" value="" class="input-text" title="Email" name="email" id="email" required="" requiredmsg="Nhập địa chỉ email" value="{{old('email')}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <label for="pass">Mật khẩu<span class="required">*</span></label>
                           <input type="password" value="" class="input-text" title="Mật khẩu" name="password" id="pass" required="" requiredmsg="Nhập mật khẩu">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <label for="pass_re">Nhập lại mật khẩu<span class="required">*</span></label>
                           <input type="password" value="" class="input-text" title="Nhập lại mật khẩu" name="password_confirmation" required="" requiredmsg="Nhập lại mật khẩu">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <label for="gender">Giới tính <span class="required"></span></label>
                           <select name="gender">
                                  <option value="choise">— Chọn giới tính —</option>
                                  <option value="1" @if( old('gender') == '1' )selected="selected"@endif >Nam</option>
                                  <option value="2" @if( old('gender') == '2' )selected="selected"@endif >Nữ</option>
                                  <option value="3" @if( old('gender') == '3' )selected="selected"@endif >Khác</option>
                           </select>
                        </div>
                     </ul>
                     <p style="color: #959595;"><input type="checkbox"> Đăng ký nhận thông tin qua email</p>
                     <div class="buttons-set">
                        <button id="send2" type="submit" class="button login"><span>Đăng ký</span></button>              
                        <!--hoặc <a href="/account/login">Đăng nhập</a> -->
                     </div>
                  </form>
               </div>
            </div>
         </fieldset>
      </div>
   </div>
</section>


@stop