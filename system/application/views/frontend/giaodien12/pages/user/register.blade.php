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
                            <li class="active breadcrumb-title">Đăng Ký</li>
                            <!-- current_tags -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-style form-login">
                            @if( count($errors) > 0 )
                            <ul>
                                @foreach( $errors->all() as $error )
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                            <form accept-charset="UTF-8" action="{{ url('user/register') }}" id="customer_register" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <!--
                                <input name="FormType" type="hidden" value="customer_register">
                                <input name="utf8" type="hidden" value="true">
                                -->
                                <h3 class="form-heading">Đăng ký tài khoản</h3>
                                <p class="form-description">Nếu bạn có một tài khoản, xin vui lòng chuyển qua trang đăng nhập.<br> Những trường có <span id="required">*</span> là bắt buộc</p>
                                <div class="row">
                                    <div class="col-md-1">
                                        <p>Họ và Tên<span id="required">*</span></p>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" value="{{ old('name') }}" name="name" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <p>Email<span id="required">*</span></p>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="email" value="{{ old('email') }}" name="email" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <p>Mật khẩu<span id="required">*</span></p>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="password" value="" name="password" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <p>Xác nhận mật khẩu<span id="required">*</span></p>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="password" value="" name="password_confirmation" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <p>Giới Tính<span id="required">*</span></p>
                                    </div>
                                    <div class="col-md-11">
                                        <select name="gender">
                                            <option value="choise">— Chọn giới tính —</option>
                                            <option value="1" @if( old('gender') == '1' )selected="selected"@endif >Nam</option>
                                            <option value="2" @if( old('gender') == '2' )selected="selected"@endif >Nữ</option>
                                            <option value="3" @if( old('gender') == '3' )selected="selected"@endif >Khác</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-11">
                                        <p><a href="{{url('user/login')}}">Đăng nhập</a></p>
                                        <button class="btn-cart">Đăng ký</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
</div>
@stop