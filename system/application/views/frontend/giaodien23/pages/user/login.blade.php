@extends('frontend.giaodien9.layouts.default')
@section('content')

<div id="customer-login" class="page wrapper">
   <header class="page-header">
      <h1 class="page-title">Đăng nhập</h1>
   </header>
   <div class="entry-content page-content">
      <div id="login" class="login-form userbox">
      @if( Session::has('loginFrontend') )
                  Bạn đã đăng nhập
               @else
                   <h1>
                     Đăng nhập
                  </h1>
                  @if( count($errors) > 0 )
                    <ul>
                        @foreach( $errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  @endif
         <form accept-charset="UTF-8" action="{{ url('user/login') }}" id="customer_login" method="post">
            <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input name="form_type" type="hidden" value="customer_login">
            <input name="utf8" type="hidden" value="✓">
            <p class="icon-title"><span class="fa fa-user"></span></p>
            <p class="field">
               <label class="icon-field" for="customer_email">
               <i class="fa fa-envelope"></i>
               </label>
               <input type="email" value="" name="email" id="customer_email" class="text" placeholder="Email">
            </p>
            <p class="field">
               <label class="icon-field" for="customer_password">
               <i class="fa fa-lock"></i>
               </label>
               <input type="password" value="" name="password" id="customer_password" class="text" placeholder="Mật khẩu">
            </p>
            <div class="action_bottom">
               <input class="btn" type="submit" value="Đăng nhập">
            </div>
            <span class="note">
            <a href="{{url('user/register')}}" title="Đăng ký mới">Đăng ký mới</a>
            </span>
         </form>
      @endif
      </div>
      <div id="recover-password" style="display:none;" class="userbox">
         <h2>Khôi phục mật khẩu</h2>
         <p class="note">Điền địa chỉ email để khôi phục mật khẩu</p>
         <form accept-charset="UTF-8" action="/account/recover" method="post">
            <input name="form_type" type="hidden" value="recover_customer_password">
            <input name="utf8" type="hidden" value="✓">
            <p class="field">
               <label class="icon-field" for="customer_email">
               <i class="fa fa-envelope"></i>
               </label>
               <input type="email" value="" size="30" name="email" id="recover-email" class="text" placeholder="Email">
            </p>
            <div class="action_bottom">
               <input class="btn" type="submit" value="Khôi phục mật khẩu">
               <span class="note"> hoặc <a href="#" onclick="hideRecoverPasswordForm();return false;">Hủy</a></span>
            </div>
         </form>
      </div>
   </div>
</div>

<script type="text/javascript">
  function showRecoverPasswordForm() {
    document.getElementById('recover-password').style.display = '';
    document.getElementById('login').style.display='none';
  }

  function hideRecoverPasswordForm() {
    document.getElementById('recover-password').style.display = 'none';
    document.getElementById('login').style.display = '';
  }

  if (window.location.hash == '#recover') { showRecoverPasswordForm() }
</script>

@stop