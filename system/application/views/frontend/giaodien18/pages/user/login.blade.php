@extends('frontend.giaodien18.layouts.default')
@section('content')

<div class="breadcrumb">
   <div class="container">
      <ul>
         <li><a href="/" target="_self">Trang chủ</a></li>
         <li><a href="/account" target="_self">Tài khoản</a></li>
         <li class="active">
            <span id="customer-login-breadcrumb">Đăng nhập</span>
            
         </li>
      </ul>
   </div>
</div>
<div id="layout-page-login">
   <div id="customer-login">
      <span class="header-contact header-page clearfix">
         <h1 class="title-customers" id="title-login">Đăng nhập</h1>
      </span>
      <div id="login" class="userbox">
         <div class="accounttype">
            <h2 class="title"></h2>
         </div>
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
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
               <input required="" type="email" value="" name="email" id="customer_email" placeholder="Email" class="text form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-lock"></i></span>
               <input required="" type="password" value="" name="password" id="customer_password" placeholder="Mật khẩu" class="text form-control" size="16">
            </div>
            <div class="action_bottom">
               <input class="btn btn-signin" type="submit" value="Đăng nhập">
            </div>
            <div class="req_pass">
               <a href="{{url('user/register')}}" title="Đăng ký">Đăng ký</a>
            </div>
         </form>
         @endif
      </div>
      <div id="recover-password" style="display:none;" class="userbox">
         <div class="accounttype">
            <h2 class="title-customers">Phục hồi mật khẩu</h2>
         </div>
         <form accept-charset="UTF-8" action="/account/recover" method="post">
            <input name="form_type" type="hidden" value="recover_customer_password">
            <input name="utf8" type="hidden" value="✓">
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
               <input required="" type="email" value="" name="email" id="recover-email" placeholder="Email" class="text form-control" aria-describedby="basic-addon1">
            </div>
            <div class="action_bottom">
               <input class="btn" type="submit" value="Gửi">
            </div>
            <div class="req_pass">
               <a href="#" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
   function showRecoverPasswordForm() {
   	document.getElementById('recover-password').style.display = 'block';
   	document.getElementById('login').style.display='none';
   	document.getElementById('title-login').style.display='none';
   
   }
   function hideRecoverPasswordForm() {
   	document.getElementById('recover-password').style.display = 'none';
   	document.getElementById('login').style.display = 'block';
   	document.getElementById('title-login').style.display='block';
   }
   if (window.location.hash == '#recover') { showRecoverPasswordForm() }
</script>

@stop

        
        
           
          
        