@extends('frontend.giaodien5.layouts.default')
@section('content')   
<div class="mt60">
   <div id="layout-page" class="container clearfix">
      <h1>Đăng nhập</h1>
      <div id="customer-login">
         <div id="login" class="userbox contact">
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
             <form accept-charset="UTF-8" action="{{ url('customer/login') }}" id="customer_login" method="post">
            <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
               <input name="form_type" type="hidden" value="customer_login">
               <input name="utf8" type="hidden" value="✓">
               <div class="clearfix large_form">
                  <input  type="email" value="" name="email" id="email" placeholder="Email" class="text">
               </div>
               <div class="clearfix large_form">
                  <input  type="password" value="" name="password" id="password" placeholder="Mật khẩu" class="text" size="16">      
               </div>
               <div class="action_bottom">
                  <button type="submit" class="message-btn">Đăng nhập</button>
               </div>
               <div class="req_pass">
                  <a href="{{url('customer/register')}}" title="Đăng ký">Đăng ký</a>
               </div>
            </form>
         @endif
            
         </div>
         <div id="recover-password" style="display:none;" class="userbox contact">
            <div class="accounttype">
               <h2>Phục hồi mật khẩu</h2>
            </div>
            <form accept-charset="UTF-8" action="/account/recover" method="post">
               <input name="form_type" type="hidden" value="recover_customer_password">
               <input name="utf8" type="hidden" value="✓">
               <input type="email" value="" size="30" name="email" placeholder="Email" id="recover-email" class="text">
               <div class="action_bottom">
                  <button type="submit" class="message-btn">Gửi</button>
               </div>
               <div class="req_pass">
                  <a href="#" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>   
  
@stop