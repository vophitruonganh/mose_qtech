@extends('frontend.giaodien16.layouts.default')
@section('content')
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="inner">
            <ul>
               <li class="home"> <a title="Quay lại trang chủ" href="/">Trang chủ</a></li>
               <i class="fa fa-angle-double-right" aria-hidden="true"></i>
               <li><span class="brn">Đăng nhập tài khoản</span></li>
            </ul>
         </div>
      </div>
   </div>
</div>

<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login_area form_area">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="content">
                @if( count($errors) > 0 )
                    <ul>
                        @foreach( $errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
               @endif
               @if( Session::has('loginFrontend') )
                        Bạn đã đăng nhập
               @else
               <form accept-charset="UTF-8" action="{{ url('user/login') }}" id="customer_login" method="post" style="display: block;">
                  <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <input name="FormType" type="hidden" value="customer_login">
                  <input name="utf8" type="hidden" value="true">
                  <h4 class="fw_600 txt_u">Thông tin cá nhân</h4>
                  <ul class="form-list">
                     <li>
                        <label for="email">Email của bạn<span class="required">*</span></label>
                        <input type="email" class="input-text" value="" title="email" name="email" id="email" required="" requiredmsg="Bạn cần nhập email">
                     </li>
                     <li>
                        <label for="pass">Mật khẩu <span class="required">*</span></label>
                        <input type="password" value="" class="input-text" title="Mật khẩu" name="password" id="pass" required="" requiredmsg="Bạn cần nhập password">
                     </li>
                  </ul>
                  <div class="buttons-set">
                     <button id="send2" type="submit" class="button login" type="submit"><span>Đăng nhập</span></button>              
                     <!-- <a href="#recover" onclick="showRecoverPasswordForm();return false;" id="RecoverPassword">Quên mật khẩu?</a> -->
                  </div>
               </form>
               @endif
               <div id="recover_password" style="display: none;">
                  <h4 class="fw600">Đặt lại mật khẩu</h4>
                  <p>Chúng tôi sẽ gửi cho bạn một email để kích hoạt việc đặt lại mật khẩu.</p>
                  <form accept-charset="UTF-8" action="/account/recover" id="recover_customer_password" method="post">
                     <input name="FormType" type="hidden" value="recover_customer_password">
                     <input name="utf8" type="hidden" value="true">
                     <ul class="form-list">
                        <li>
                           <label for="email">Email<span class="required">*</span></label>
                           <br>                
                           <input type="email" class="input-text" value="" title="email" name="email" id="recover-email" placeholder="Email" required="" requiredmsg="Bạn cần nhập email chính xác">   
                        </li>
                     </ul>
                     <div class="buttons-set">
                        <input type="submit" class="button" value="Gửi"> hoặc <a href="#" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 div_reg_area">
            <h4>Bạn chưa có tài khoản</h4>
            <p>Đăng ký tài khoản ngay để có thể mua hàng nhanh chóng và dễ dàng hơn ! Ngoài ra còn có rất nhiều chính sách và ưu đãi cho các thành viên</p>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <button class="btn_black" onclick="location.href='{{url('user/register')}}'"><span>Đăng ký</span></button>
            </div>
         </div>
      </div>
   </div>
</section>

<script>  
	function showRecoverPasswordForm() {
		document.getElementById('recover_password').style.display = 'block';
		document.getElementById('customer_login').style.display='none';
	}
	function hideRecoverPasswordForm() {
		document.getElementById('recover_password').style.display = 'none';
		document.getElementById('customer_login').style.display = 'block';
	}
	// Allow deep linking to the recover password form
	if (window.location.hash == '#recover') { showRecoverPasswordForm() }
</script>



@stop
      