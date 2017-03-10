@extends('frontend.giaodien15.layouts.default')
@section('content')



<main class="wrapper main-content" role="main">
   <!-- /snippets/breadcrumb.liquid -->
   <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
      <img src="//hstatic.net/033/1000104033/1000147703/bg-breadcrumb.jpg?v=55" alt="">
      <div class="inner">
         <div class="breadcrumb-list">
            <a href="/" title="Quay lại trang chủ">Trang chủ</a>
            <span aria-hidden="true">/</span>
            <span>Tài khoản</span>
         </div>
      </div>
   </nav>
   <!-- /templates/customers[login].liquid -->
   <div class="grid">
      <div class="grid__item large--one-third push--large--one-third text-center">
         <div class="note form-success" id="ResetSuccess" style="display:none;">
            Chúng tôi đã gửi cho bạn một email với một liên kết để cập nhật mật khẩu của bạn.
         </div>
         <div id="CustomerLoginForm" class="form-vertical">
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
               <input name="form_type" type="hidden" value="customer_login">
               <input name="utf8" type="hidden" value="✓">
               <h1>Đăng nhập</h1>
               <label for="CustomerEmail" class="hidden-label">Email</label>
               <input type="email" name="email" id="CustomerEmail" class="input-full" placeholder="Email" autocorrect="off" autocapitalize="off" autofocus="">
               <label for="CustomerPassword" class="hidden-label">Mật khẩu</label>
               <input type="password" value="" name="password" id="CustomerPassword" class="input-full" placeholder="Mật khẩu">
               <p>
                  <input type="submit" class="btn btn--full" value="Đăng nhập">
               </p>
               <p><a href="{{url('user/register')}}">Đăng ký tài khoản</a></p>
             
            </form>
            @endif
         </div>
         <div id="RecoverPasswordForm" style="display: none;">
            <h2>Đặt lại mật khẩu của bạn</h2>
            <p>Chúng tôi sẽ gửi cho bạn một email để đặt lại mật khẩu của bạn.</p>
            <div class="form-vertical">
               <form accept-charset="UTF-8" action="/account/recover" method="post">
                  <input name="form_type" type="hidden" value="recover_customer_password">
                  <input name="utf8" type="hidden" value="✓">
                  <label for="RecoverEmail" class="hidden-label">Email</label>
                  <input type="email" value="" name="email" id="RecoverEmail" class="input-full" placeholder="Email" autocorrect="off" autocapitalize="off">
                  <p>
                     <input type="submit" class="btn btn--full" value="Gửi">
                  </p>
                  <button type="button" id="HideRecoverPasswordLink" class="text-link">Thoát</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</main>


@stop


       