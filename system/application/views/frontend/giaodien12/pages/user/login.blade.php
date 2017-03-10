@extends('frontend.giaodien12.layouts.default')
@section('content')
<div id="site-content">
    <div id="main">
        <div class="header-breadcrumb">
            <div class="container">
                <div class="row ">
                    <div class="col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/" title="Trang chủ">Trang chủ</a>
                            </li>
                            <!-- blog -->
                            <li class="active breadcrumb-title">Đăng nhập</li>
                            <!-- current_tags -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <h1 style="display:none;">Sport</h1>
        <!-- Main Content -->
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-style form-login">
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
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <!--
                                <input name="FormType" type="hidden" value="customer_login">
                                <input name="utf8" type="hidden" value="true">
                                -->
                                <h3 class="form-heading">Đăng nhập</h3>
                                <p class="form-description">Nếu bạn có một tài khoản, xin vui lòng đăng nhập.</p>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>Email <span id="required">*</span></p>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="email" value="" name="email" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>Mật khẩu<span id="required">*</span></p>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="password" value="" name="password" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-10">
                                        <p><a href="{{ url('user/register') }}">Đăng ký</a></p>
                                        <button class="btn-cart">Đăng nhập</button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                    <!--
                    <div class="col-md-6">
                        <div class="form-style form-login">
                            <form accept-charset="UTF-8" action="/account/recover" id="recover_customer_password" method="post">
                                <input name="FormType" type="hidden" value="recover_customer_password">
                                <input name="utf8" type="hidden" value="true">
                                <h3 class="form-heading">Quên mật khẩu</h3>
                                <p class="form-description">Bạn đã có một tài khoản nhưng không nhớ mật khẩu.</p>
                                <p>Hãy điền Email xuống phía dưới và nhận thông tin qua Email để có thể lấy lại mật khẩu.</p>
                                <p>Email</p>
                                <input type="email" value="" name="Email" required="">
                                <button class="btn-cart">Gửi thông tin</button>
                            </form>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
</div>
@stop