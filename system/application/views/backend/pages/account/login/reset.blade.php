@extends('backend.layouts.login')
@section('titlePage','Thiết lập mật khẩu mới')
@section('content')
<div class="section-login">
	<div class="login-wrap login-block">
		<div class="login-inner">
			<div class="logo"><a href="{{url('admin')}}"><img src="{{ $cdn_domain_image }}/logo.png" class="img-100" /></a></div>
			<div class="login-body">
				<div class="login-title">Thiết lập mật khẩu mới</div>
                @if($error) 
                <div class="form-alerts"> 
					<div class="alert alert-danger m-b-1" role="alert">{{ $error }}</div>
				</div>
				<div class="text-xs-center"><a href="{{ url('admin/login') }}" class="btn btn-link p-a-0"><u>Quay lại</u></a></div>
                @else
                <div class="form-alerts">@include('backend.includes.showErrorValidator')</div>
				<form action="{{ url('admin/reset-password/'.$token_reset) }}" method="post" data-parsley-validate>
                    @include('backend.includes.token')
					<div class="form-group">
						<div class="fg-line">
							<label class="sr-only">Nhập mật khẩu mới</label>
							<input type="password" class="form-control" id="password" placeholder="Mật khẩu mới" name="password" required minlength="8" data-parsley-trigger="change focusout" data-parsley-minlength-message="Mật khẩu ngắn thường dễ đoán. Hãy thử mật khẩu có ít nhất 8 ký tự." data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" />
					    </div>
					</div>
					<div class="form-group m-b-2">
						<div class="fg-line">
						    <label class="sr-only">Xác nhận mật khẩu mới</label>
						    <input type="password" class="form-control" id="password_confirmation" placeholder="Xác nhận mật khẩu" name="password_confirmation" required data-parsley-equalto="#password" data-parsley-trigger="change focusout" data-parsley-equalto-message="Các mật khẩu này không khớp. Thử lại?" data-parsley-required-message="Bạn không được để trống trường này" data-parsley-required="true" />
					    </div>
					</div>
					<div class="clearfix">
					    <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
						<a href="{{ url('admin/login') }}" class="btn btn-link">Hủy</a>
					</div>
				</form>
                @endif
			</div>
		</div>
	</div>
</div>
@stop