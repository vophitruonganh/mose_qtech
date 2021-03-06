@extends('frontend.giaodien6.layouts.default')
@section('content')

<main class="padding-top-mobile">
   <div class="header-navigate">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
               <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="/" target="_self">Trang chủ</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li><a href="/account" target="_self">Tài khoản</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li class="active"><span>Đăng nhập</span></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <section class="layout-account">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <div id="login" class="userbox">
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
                  <form accept-charset="UTF-8" action="{{ url('customer/login') }}" id="customer_login" method="post">
                  <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <input name="form_type" type="hidden" value="customer_login">
                     <input name="utf8" type="hidden" value="✓">
                     <div class="input-group input-account mb15">
                        <label class="input-group-addon">
                        <i class="icon-envelope"></i>
                        </label>
                        <input required="" type="email" name="email" id="customer_email" placeholder="Email" class="form-control">
                     </div>
                     <div class="input-group input-account mb15">
                        <label class="input-group-addon">
                        <i class="icon-shield"></i>
                        </label>
                        <input required="" type="password" name="password" id="customer_password" placeholder="Mật khẩu" class="form-control" size="16">      
                     </div>
                     <div class="action_bottom mb15">
                        <input class="btn btn-signin" type="submit" value="Đăng nhập">
                     </div>
                     <div class="req_pass" >
                        <a style="display: none" href="#" onclick="showRecoverPasswordForm();return false;">Quên mật khẩu?</a>
                        <a href="{{url('customer/register')}}" title="Đăng ký">Đăng ký</a>
                     </div>
                  </form>
               @endif   
                 
               </div>
               <div id="recover-password" style="display:none;" class="userbox">
                  <h1>Phục hồi mật khẩu</h1>
                  <form accept-charset="UTF-8" action="/account/recover" method="post">
                     <input name="form_type" type="hidden" value="recover_customer_password">
                     <input name="utf8" type="hidden" value="✓">
                     <div class="input-group input-account mb15">
                        <label class="input-group-addon">
                        <i class="icon-envelope"></i>
                        </label>						
                        <input type="email" name="email" id="recover-email" placeholder="Email" class="form-control" size="30">
                     </div>
                     <div class="action_bottom mb15">
                        <input class="btn" type="submit" value="Gửi">
                     </div>
                     <div class="req_pass">
                        <a href="#" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
                     </div>
                  </form>
               </div>
            </div>
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
</main>
            

@stop                      