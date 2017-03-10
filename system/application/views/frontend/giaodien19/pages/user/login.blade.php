@extends('frontend.giaodien19.layouts.default')
@section('content')


<section class="main-container col1-layout">
   <div class="main container">
      <div class="account-login">
         <div class="page-title">
            <h2>Đăng nhập</h2>
         </div>
         <fieldset class="col2-set">
            <legend>Đăng nhập hoặc tạo mới tài khoản</legend>
            <div class="col-1 new-users">
               <strong>Đăng ký tài khoản</strong>
               <div class="content">
                  <p>Bằng cách tạo một tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể di chuyển thông qua các quy trình kiểm tra nhanh hơn, lưu trữ nhiều địa chỉ gửi hàng, xem và theo dõi đơn đặt hàng của bạn trong tài khoản của bạn và nhiều hơn nữa.</p>
                  <div class="buttons-set">
                     <a href="{{url('user/register')}}" class="button create-account" type="button"><span>Đăng ký ngay</span></a>
                  </div>
               </div>
            </div>
            <div class="col-2 registered-users">
               <div id="login" style="display: block;">
                  <strong>Đăng nhập</strong>
                  <div class="content">
                     <div class="form-list">
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
                        <form accept-charset="UTF-8" action="{{ url('user/login') }}" id="customer_login" method="post">
                           <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                           <input name="utf8" type="hidden" value="✓">
                           <div class="clearfix large_form">
                              <label for="email">Nhập Email <span class="required">*</span></label>
                              <label for="customer_email" class="icon-field"><i class="icon-login icon-envelope "></i></label>
                              <input required="" type="email" value="" name="email" id="customer_email" placeholder="Email" class="text input-text required-entry">
                           </div>
                           <div class="clearfix large_form">
                              <label for="pass">Nhập mật khẩu <span class="required">*</span></label>
                              <label for="customer_password" class="icon-field"><i class="icon-login icon-shield"></i></label>
                              <input required="" type="password" value="" name="password" id="customer_password" placeholder="Mật khẩu" class="text input-text required-entry validate-password" size="16">      
                           </div>
                           <div class="action_bottom">
                              <button id="send2" name="send" type="submit" class="button login"><span>Đăng nhập</span></button>
                           </div>
                           <!-- <div class="req_pass">
                              <a href="#" class="forgot-word" onclick="showRecoverPasswordForm();return false;">Quên mật khẩu?</a>
                           </div> -->
                        </form>
                     @endif
                     </div>
                  </div>
               </div>
               <div id="recover-password" style="display: none;" class="userbox">
                  <div class="accounttype">
                     <strong>Phục hồi mật khẩu</strong>
                  </div>
                  <div class="content">
                     <div class="form-list">
                        <form accept-charset="UTF-8" action="/account/recover" method="post">
                           <input name="form_type" type="hidden" value="recover_customer_password">
                           <input name="utf8" type="hidden" value="✓">
                           <label for="email">Nhập Email <span class="required">*</span></label>
                           <label for="email" class="icon-field"><i class="icon-login icon-envelope "></i></label>
                           <input type="email" value="" size="30" name="email" placeholder="Email" id="recover-email" class="text input-text required-entry">
                           <div class="action_bottom">
                              <button type="submit" class="button login"><span>Gửi</span></button>
                           </div>
                           <div class="req_pass">
                              <a href="#" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </fieldset>
      </div>
   </div>
</section>

<script>
function showRecoverPasswordForm() {
	document.getElementById('recover-password').style.display = 'block';
	document.getElementById('login').style.display='none';
}

function hideRecoverPasswordForm() {
	document.getElementById('recover-password').style.display = 'none';
	document.getElementById('login').style.display = 'block';
}

if (window.location.hash == '#recover') { showRecoverPasswordForm() }
</script>
@stop

          