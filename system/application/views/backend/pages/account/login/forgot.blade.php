@extends('backend.layouts.login')
@section('titlePage','Quên mật khẩu')
@section('content')
<div class="section-login">
	<div class="login-wrap login-block">
		<div class="login-inner">
			<div class="logo"><a href="{{url('admin')}}"><img src="{{ $cdn_domain_image }}/logo.png" class="img-100" /></a></div>
			<div class="login-body">
				<h1 class="login-title">Bạn quên mật khẩu?</h1>
				@if($suscess) 
				<div class="form-alerts"> 
					<div class="alert alert-success m-b-1" role="alert">{{ $suscess }}</div>
				</div>
				<div class="text-xs-center"><a href="{{ url('admin/login') }}" class="btn btn-link p-a-0"><u>Quay lại</u></a></div>
                @else
				<div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
				<form action="{{ url('admin/forgot-password') }}" method="post" data-parsley-validate>
					@include('backend.includes.token')
					<div class="form-group m-b-2">
						<div class="fg-line">
						    <label class="sr-only">Email</label>
						    <input type="email" class="form-control" placeholder="Email" name="email" value="" required data-parsley-trigger="change focusout" data-parsley-type-message="Địa chỉ Email không không hợp lệ" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" data-parsley-type="email" />
					    </div>
					    <small class="text-muted">Chúng tôi sẽ gửi bạn hướng dẫn về cách thiết lập lại mật khẩu.</small>
					</div>
					<div class="clearfix">
                        <button type="submit" class="btn btn-primary waves-effect">Gửi mail</button>
                        <a href="{{ url('admin/login') }}" class="btn btn-link">Hủy bỏ</a>
                    </div>
				</form>
				@endif
			</div>
		</div>
	</div>
</div>
@stop